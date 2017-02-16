<?php

add_action('init', 'main_menu');

function main_menu()
{
    register_nav_menu('main_menu', 'Menu principal');
}

function theme_styles() {
    wp_enqueue_style('main_font', get_template_directory_uri().'/styles/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style('main_style', get_template_directory_uri().'/styles/css/app.css');

	wp_enqueue_script('main_toto', get_template_directory_uri().'/scripts/js/script.js');
}

add_action('wp_enqueue_scripts','theme_styles');

add_theme_support('post-thumbnails');


function drawMenu()
{
    wp_nav_menu(array(
        'theme_location' => 'main_menu',
        'menu' => 'main_menu',
        'container' => '',
        'container_class' => false,
        'container_id' => false,
        'menu_class' => 'font-robot _pull-right ',
        'menu_id' => '',
        'echo' => true,
        'fallback_cb' => 'wp_page_menu',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul id="%1$s" class="%2$s _container-flex navbar">%3$s</ul>',
        'depth' => 0,
        'walker' => ''
    ));
}

function drawBurger(){
    wp_nav_menu(array(
        'theme_location' => 'main_menu',
        'menu' => 'main_menu',
        'container' => '',
        'container_class' => false,
        'container_id' => false,
        'menu_class' => 'font-robot',
        'menu_id' => '',
        'echo' => true,
        'fallback_cb' => 'wp_page_menu',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul id="%1$s" class="%2$s _hide mobile-menu">%3$s</ul>',
        'depth' => 0,
        'walker' => ''
    ));
}
















?>