<?php 

function rb_theme_setup(){

	// Post Thumbnails
	add_theme_support('post-thumbnails');
	
	// Web Page Title Tag
	add_theme_support('title-tag');
	
	// Post Formats
	load_theme_textdomain( 'rb-blog-one', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	
	// Menu Registration
	register_nav_menu('rb_header-menu', __('Header Menu', 'rb-blog-one'));
}
add_action('after_setup_theme', 'rb_theme_setup');