<?php 

function rbtheme_setup(){

	// Post Thumbnails
	add_theme_support('post-thumbnails');
	
	// Web Page Title Tag
	add_theme_support('title-tag');
	
	// Post Formats
	
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	
	// Menu Registration
	register_nav_menu('header-menu', __('Header Menu', 'rb-blog-one'));
}
add_action('after_setup_theme', 'rbtheme_setup');