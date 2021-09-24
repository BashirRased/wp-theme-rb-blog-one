<?php

function rb_conditional_scripts(){

	wp_register_script('rb_html5shiv', get_template_directory_uri().'/assets/js/html5shiv-printshiv-3.7.3.css', array(), '3.7.3', false);
	wp_script_add_data('rb_html5shiv', 'conditional', 'lt IE 9');
	wp_enqueue_script('rb_html5shiv');
	
	wp_register_script('rb_respond', get_template_directory_uri().'/assets/js/respond-1.4.2.css', array(), '1.4.2', false);
	wp_script_add_data('rb_respond', 'conditional', 'lt IE 9');
	wp_enqueue_script('rb_respond');
}
add_action('wp_enqueue_scripts', 'rb_conditional_scripts');