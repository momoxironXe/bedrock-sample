<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use App\Routes\SageNavRestAPI;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    // Separated Vue scripts to its own file
    wp_register_script('sage/sage-vue.js', asset_path('scripts/vue.js'), [], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    /**
     * Delete comment to use with Vue Navigation
     */
    // if (!is_admin()) {
    //     wp_enqueue_script('sage/sage-vue.js');
    //     /**
    //      * Endpoints:
    //      * Navigation with no children  get-nav
    //      * Navigation with children     get-nav-with-children
    //      *
    //      * @TODO Control this via the wp-admin via options page
    //      */
    //     $query_obj = get_queried_object();
    //     wp_localize_script('sage/sage-vue.js', 'NAV', [
    //         'api'      => rest_url('sage-endpoint/v1/get-nav-with-children'),
    //         'navID'    => 'primary-navigation',
    //         'pageSlug' => is_front_page() ? 'home' : ($query_obj->post_name ?: 'undefined'),
    //         'postId'   => $query_obj->ID,
    //         'siteName' => get_bloginfo('name'),
    //         'siteUrl'  => get_home_url(),
    //     ]);
    // }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus(
        [
            'primary_navigation' => __('Primary Navigation', 'sage'),
        ]
    );

    /**
     * Enable post thumbnails
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     *
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));

    // Register the SageNavRestAPI Class
    if (class_exists('App\Routes\SageNavRestAPI')) {
        new SageNavRestAPI();
    }
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ];
    register_sidebar(
        [
            'name' => __('Primary', 'sage'),
            'id'   => 'sidebar-primary',
        ] + $config
    );
    register_sidebar(
        [
            'name' => __('Footer', 'sage'),
            'id'   => 'sidebar-footer',
        ] + $config
    );
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Create options pages
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        [
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect'   => false,
            'post_id'    => 'theme_settings',
        ]
    );
}

/**
 * Disable Emoji's
 */
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    /**
     * Filter out the tinymce emoji plugin.
     */
    add_filter('tiny_mce_plugins', function ($plugins) {
        if (is_array($plugins)) {
            return array_diff($plugins, ['wpemoji']);
        } else {
            return [];
        }
    });


});
/**
 * 
 * Register post type
 */
add_action('init', function () {
    $args = array(
        'public'    => true,
        'label'     => __( 'Student activites', 'textdomain' ),
        'menu_icon' => 'dashicons-book',
        'supports' => array( 'title', 'editor', 'custom-fields','thumbnail','excerpt' )
    );
    register_post_type( 'student-activites', $args );
    $args = array(
        'public'    => true,
        'label'     => __( 'Games', 'textdomain' ),
        'menu_icon' => 'dashicons-book',
    );
    register_post_type( 'game', $args );
    $args = array(
        'label'        => __( 'Category', 'textdomain' ),
        'public'       => true,
        'rewrite'      => array( 'slug' => 'game-cat' ),
        'hierarchical' => true
    );
     
    register_taxonomy( 'game-cat', 'game', $args );
});

function  get_limit_excerpt($post_id, $source = null){

    $excerpt = $source == "content" ? get_the_content($post_id) : get_the_excerpt($post_id);
    $limit=40;
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));

    return $excerpt;
}