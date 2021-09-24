<?php

function conditional_scripts(){

	wp_enqueue_script('html5shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), '', false);
	wp_script_add_data('html5shim', 'conditional', 'lt IE 9');
	
	wp_enqueue_script('respond', get_template_directory_uri().'/assets/js/respond-1.4.2.min.css', array(), '', false);
	wp_script_add_data('respond', 'conditional', 'lt IE 9');
}
add_action('wp_enqueue_scripts', 'conditional_scripts');