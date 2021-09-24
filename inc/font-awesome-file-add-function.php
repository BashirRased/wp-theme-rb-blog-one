<?php

// including the styles
function rb_font_awesome(){
	
	// font-awesome-brands-5.10.2
	wp_register_style('rb_font-awesome-brands', get_template_directory_uri().'/assets/css/font-awesome-brands-5.10.2.css','','5.10.2','all');
	wp_enqueue_style('rb_font-awesome-brands');
	
	// font-awesome-solid-5.10.2
	wp_register_style('rb_font-awesome-solid', get_template_directory_uri().'/assets/css/font-awesome-solid-5.10.2.css','','5.10.2','all');
	wp_enqueue_style('rb_font-awesome-solid');
	
	// font-awesome-regular-5.10.2
	wp_register_style('rb_font-awesome-regular', get_template_directory_uri().'/assets/css/font-awesome-regular-5.10.2.css','','5.10.2','all');
	wp_enqueue_style('rb_font-awesome-regular');
	
	// font-awesome-5.10.2
	wp_register_style('rb_font-awesome', get_template_directory_uri().'/assets/css/font-awesome-5.10.2.css','','5.10.2','all');
	wp_enqueue_style('rb_font-awesome');
}
add_action('wp_enqueue_scripts', 'rb_font_awesome');