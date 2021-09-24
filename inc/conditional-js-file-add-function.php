<?php

function conditional_scripts(){

	wp_register_script('html5shiv', get_template_directory_uri().'/assets/js/html5shiv-printshiv-3.7.3.min.css', array(), '3.7.3', false);
	wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
	wp_enqueue_script('html5shiv');
	
	wp_register_script('respond', get_template_directory_uri().'/assets/js/respond-1.4.2.min.css', array(), '1.4.2', false);
	wp_script_add_data('respond', 'conditional', 'lt IE 9');
	wp_enqueue_script('respond');
}
add_action('wp_enqueue_scripts', 'conditional_scripts');