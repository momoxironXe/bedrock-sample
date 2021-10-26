<?php

declare(strict_types = 1);

namespace App\Routes;

# Sage Classes
use App\Routes\Traits\RestRouteParams;

# Wordpress
use WP_Error;
use WP_HTTP_Response;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

/**
 * Class Name: SageNavRestAPI
 * Description: A basic class to parse and return the navigation items for Vue
 * Class SageNavRestAPI
 *
 * @package App\Routes\SageNavRestApi
 */
class SageNavRestAPI
{

    use RestRouteParams;

    /**
     * MoralesRestAPI constructor.
     */
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'registerRoutes',]);
    }

    /**
     * Creates the API Endpoing in Wordpress
     */
    public function registerRoutes()
    {
        $this->route = "$this->namespace/$this->version";

        /**
         * Grabs the navigation items
         */
        register_rest_route($this->route, '/get-nav', [
            'methods'  => WP_REST_Server::READABLE,
            'callback' => [$this, 'navWOChildren'],
            'permission_callback' => '__return_true',
        ]);

        register_rest_route($this->route, '/get-nav-with-children', [
            'methods'  => WP_REST_Server::READABLE,
            'callback' => [$this, 'navWithChildren'],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * Returns an array of navigation items without their children
     *
     * @param WP_REST_Request $request
     *
     * @return mixed|WP_Error|WP_HTTP_Response|WP_REST_Response
     */
    public function navWOChildren(WP_REST_Request $request)
    {
        $return_menu = [];

        // Used for changing the navigation array return if design calls for a unique layout on mobile/tablet
        $viewport = $request['viewport'];

        // Which navigation to get
        $nav_id   = $request['navID'];
        $get_menu = wp_get_nav_menu_items($nav_id);

        if (!is_wp_error($get_menu) && !empty($get_menu)) {
            $return_menu = collect($get_menu)
                ->map(function ($the_item) {
                    if ((int) $the_item->menu_item_parent === 0) {
                        return self::parseNavItem($the_item);
                    }
                    return '';
                })
                ->filter()
                ->values();
        }

        return rest_ensure_response($return_menu);
    }

    /**
     * Returns an array of navigation items with children
     *
     * @param WP_REST_Request $request
     *
     * @return mixed|WP_Error|WP_HTTP_Response|WP_REST_Response
     */
    public function navWithChildren(WP_REST_Request $request)
    {
        $return_menu = [];

        // Used for changing the navigation array return if design calls for a unique layout on mobile/tablet
        $viewport = $request['viewport'];

        // Which navigation to get
        $nav_id   = $request['navID'];
        $get_menu = wp_get_nav_menu_items($nav_id);

        if (!is_wp_error($get_menu) && !empty($get_menu)) {
            $parse_items = collect($get_menu)
                ->map(function ($item) {
                    return self::parseNavItem($item);
                })
                ->groupBy('parent');

            $return_menu = collect($parse_items)
                ->first()
                ->map(function ($the_item) use ($parse_items) {
                    $the_item['children'] = $parse_items[$the_item['id']] ?? [];
                    return $the_item;
                })
                ->toArray();
        }

        return rest_ensure_response($return_menu);
    }

    /**
     * Parses the menu item for return formatting
     *
     * @param object $item The menu item
     * @param array  $opts Any additional arguments to parse
     *
     * @return array
     */
    private function parseNavItem(object $item, array $opts = [])
    {
        $default_classes = [
            'menu-item',
            (int) $item->menu_item_parent === 0 ? 'menu-item-parent' : 'menu-item-child',
        ];
        $addt_class      = $opts['addt_class'] ?? '';
        $classes         = wp_parse_args($addt_class, $default_classes);

        return [
            'classes'   => implode(' ', $classes),
            'id'        => $item->ID, // The 'post id' of the item in nav_menu_item post type
            'objId'     => $item->object_id, // The 'post id' of the item's default post type
            'permalink' => $item->url,
            'target'    => $item->target,
            'title'     => $item->title,
            'parent'    => (int) $item->menu_item_parent,
        ];
    }
}
