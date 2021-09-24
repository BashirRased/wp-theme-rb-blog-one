<?php 

function rb_scripts(){

	wp_register_script('rb_custom', get_template_directory_uri().'/assets/js/custom.js', array('jquery'), '1.0.2', true);
	wp_enqueue_script('rb_custom');
}
add_action('wp_enqueue_scripts', 'rb_scripts');