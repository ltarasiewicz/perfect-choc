<?php

add_action('wp_enqueue_scripts', 'chocoThemeEnqueueStyles');
//add_action('widgets_init', 'chocoRegisterWidgets');

function chocoThemeEnqueueStyles()
{
    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style)
    );

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

//function chocoRegisterWidgets()
//{
//    register_sidebar([
//        'name'          =>  'Footer text area',
//        'id'            =>  'footer-text-widget',
//        'before_widget' =>  '<div>',
//        'after_widget'  =>  '</div>'
//    ]);
//}


