<?php

// including the styles
function rb_styles(){

	// bootstrap-4.0.0
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap-4.0.0.min.css','','4.0.0','all');
	
	// Preloader
	wp_enqueue_style('preloader', get_template_directory_uri().'/assets/css/preloader.css');
	
	// wp-edit
	wp_enqueue_style('wp-edit', get_template_directory_uri().'/assets/css/wp-edit.css');
	
	// theme-style
	wp_enqueue_style('theme-style', get_template_directory_uri().'/assets/css/style.css');
	
	// theme-color
	wp_enqueue_style('theme-color', get_template_directory_uri().'/assets/css/theme-color.css');
	
	// responsive
	wp_enqueue_style('responsive', get_template_directory_uri().'/assets/css/responsive.css');

	// main style
	wp_enqueue_style('stylesheet', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'rb_styles');