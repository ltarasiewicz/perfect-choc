<?php

add_action('wp_enqueue_scripts', 'chocoThemeEnqueueStyles');
add_action('nav_menu_css_class', 'chocAddIconToMenuItem', 10, 2);

function chocAddIconToMenuItem($classes, $item)
{
    if ($item->title == 'Limited Edition') {
        $classes[] = 'menu-item-icon';
    }

    return $classes;
}

function chocoThemeEnqueueStyles()
{
    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style)
    );

//    wp_enqueue_style('font-awesome',
//        get_stylesheet_directory_uri() . '/bower_components/fontawesome/css/font-awesome.min.css',
//        array('child-style')
//    );

    if (is_front_page()) {
        wp_enqueue_style('hp-style',
            get_stylesheet_directory_uri() . '/hp.css',
            array($parent_style)
        );
    }

    if ('product' == get_post_type()) {
        wp_enqueue_style('products-style',
            get_stylesheet_directory_uri() . '/products.css',
            array($parent_style, 'child-style')
        );
    }

    wp_enqueue_script('custom-css', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'));

    $data = [
        'images_path' => get_stylesheet_directory_uri() . '/images',
        'is_homepage' => is_front_page() ? true: false,
    ];

    wp_localize_script('custom-css', 'data', $data);

}


