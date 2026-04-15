<?php
/**
 * Theme setup and helpers for RaajjeMV.
 *
 * @package RaajjeMV
 */

if (!defined('ABSPATH')) {
    exit;
}

function raajjemv_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'raajjemv'),
            'footer'  => __('Footer Menu', 'raajjemv'),
        )
    );
}
add_action('after_setup_theme', 'raajjemv_theme_setup');

function raajjemv_enqueue_assets(): void
{
    wp_enqueue_style(
        'raajjemv-google-fonts',
        'https://fonts.googleapis.com/css2?family=Newsreader:opsz,wght@6..72,400;6..72,700;6..72,800&family=Public+Sans:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'raajjemv-style',
        get_stylesheet_uri(),
        array('raajjemv-google-fonts'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'raajjemv_enqueue_assets');

function raajjemv_widgets_init(): void
{
    register_sidebar(
        array(
            'name'          => __('Left Rail', 'raajjemv'),
            'id'            => 'left-rail',
            'description'   => __('Widgets shown on the left rail.', 'raajjemv'),
            'before_widget' => '<section class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Right Rail', 'raajjemv'),
            'id'            => 'right-rail',
            'description'   => __('Widgets shown on the right rail.', 'raajjemv'),
            'before_widget' => '<section class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'raajjemv_widgets_init');

function raajjemv_fallback_thumbnail(string $size = 'large'): string
{
    if (has_post_thumbnail()) {
        return get_the_post_thumbnail(get_the_ID(), $size, array('loading' => 'lazy'));
    }

    $size_class = sanitize_html_class($size);
    return '<div class="thumb-placeholder thumb-' . esc_attr($size_class) . '" aria-hidden="true"></div>';
}
