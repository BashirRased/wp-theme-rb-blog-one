<?php

// including the styles
function rb_styles(){

	// bootstrap-4.0.0
	wp_register_style('rb_bootstrap', get_template_directory_uri().'/assets/css/bootstrap-4.0.0.css','','4.0.0','all');
	wp_enqueue_style('rb_bootstrap');
	
	// Preloader
	wp_register_style('rb_preloader', get_template_directory_uri().'/assets/css/preloader.css','','1.0.2','all');
	wp_enqueue_style('rb_preloader');
	
	// wp-edit
	wp_register_style('rb_wp-edit', get_template_directory_uri().'/assets/css/wp-edit.css','','1.0.2','all');
	wp_enqueue_style('rb_wp-edit');
	
	// theme-style
	wp_register_style('rb_theme-style', get_template_directory_uri().'/assets/css/style.css','','1.0.2','all');
	wp_enqueue_style('rb_theme-style');
	
	// theme-color
	wp_register_style('rb_theme-color', get_template_directory_uri().'/assets/css/theme-color.css','','1.0.2','all');
	wp_enqueue_style('rb_theme-color');
	
	// responsive
	wp_register_style('rb_responsive', get_template_directory_uri().'/assets/css/responsive.css','','1.0.2','all');
	wp_enqueue_style('rb_responsive');

	// main style
	wp_register_style('stylesheet', get_stylesheet_uri(),'','1.0.2','all');
	wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'rb_styles');