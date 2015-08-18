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


