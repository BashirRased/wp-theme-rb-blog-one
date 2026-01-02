<?php
/**
 * Register theme menus
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'rb_blog_one_theme_menus' ) ) {
	/**
	 * Register theme menus.
	 */
	function rb_blog_one_theme_menus() {
		register_nav_menus(
			array(
				'header-menu' => esc_html__( 'Header Menu', 'rb-blog-one' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'rb_blog_one_theme_menus' );
