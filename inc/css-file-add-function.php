<?php

// including the styles
function rb_styles(){

	// bootstrap-4.0.0
	wp_register_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap-4.0.0.min.css','','4.0.0','all');
	wp_enqueue_style('bootstrap');
	
	// Preloader
	wp_register_style('preloader', get_template_directory_uri().'/assets/css/preloader.css','','1.0.1','all');
	wp_enqueue_style('preloader');
	
	// wp-edit
	wp_register_style('wp-edit', get_template_directory_uri().'/assets/css/wp-edit.css','','1.0.1','all');
	wp_enqueue_style('wp-edit');
	
	// theme-style
	wp_register_style('theme-style', get_template_directory_uri().'/assets/css/style.css','','1.0.1','all');
	wp_enqueue_style('theme-style');
	
	// theme-color
	wp_register_style('theme-color', get_template_directory_uri().'/assets/css/theme-color.css','','1.0.1','all');
	wp_enqueue_style('theme-color');
	
	// responsive
	wp_register_style('responsive', get_template_directory_uri().'/assets/css/responsive.css','','1.0.1','all');
	wp_enqueue_style('responsive');

	// main style
	wp_register_style('stylesheet', get_stylesheet_uri(),'','1.0.1','all');
	wp_enqueue_style('responsive');
}
add_action('wp_enqueue_scripts', 'rb_styles');