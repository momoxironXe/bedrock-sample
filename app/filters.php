<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * Custom Cache Endpoints for WP REST Cache plugin to include
 * The !isset is used to ensure that the endpoint is not already being cached natively
 */
add_filter('wp_rest_cache/allowed_endpoints', function (array $allowed_endpoints) {

    /**
     * Adds the Navigation Endpoint for Vue
     * Uncomment for whichever endpoint you want to use
     */
    if (!isset($allowed_endpoints[ 'navigation/v1' ])) {
        // $allowed_endpoints[ 'navigation/v1' ][] = 'get-nav';
        $allowed_endpoints[ 'navigation/v1' ][] = 'get-nav-with-children';
    }

    return $allowed_endpoints;
}, 10, 1);
add_filter('acfe/flexible/render/template', function ($acfe_flexible_render_template, $field, $layout, $is_preview) {
    return get_stylesheet_directory() . '/../index.php';
}, 10, 4);

add_action('acfe/flexible/render/before_template', function ($field, $layout, $is_preview) {
    $values = [];

    foreach ($layout['sub_fields'] as $field) {
        $values[ $field['name'] ] = get_sub_field($field['name']);
    }
    echo template('partials.flex_contents.' . str_replace('_', '-', $layout['name']), $values);
}, 10, 3);