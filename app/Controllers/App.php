<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{

    /**
     * ACF Field Values
     *
     * @var string[]
     */
    protected $acf = [];

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            $homepage = get_option('page_for_posts', true);
            if ($homepage) {
                return get_the_title($homepage);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }
}
