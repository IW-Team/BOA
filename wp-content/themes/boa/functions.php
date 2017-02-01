<?php

function theme_styles() {
	wp_enqueue_style('main_style', get_template_directory_uri().'/styles/css/app.css');

//	wp_enqueue_script('main_toto', get_template_directory_uri().'');

}

add_action('wp_enqueue_scripts','theme_styles');


















?>