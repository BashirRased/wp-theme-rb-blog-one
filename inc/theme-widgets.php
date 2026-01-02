<?php
/**
 * Register theme widgets
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Widget
 */
if ( ! function_exists( 'rb_blog_one_theme_widget' ) ) {
	/**
	 * Register Sidebar.
	 */
	function rb_blog_one_theme_widget() {
		register_sidebar(
			array(
				'name'           => esc_html__( 'Sidebar 1', 'rb-blog-one' ),
				'description'    => esc_html__( 'Add your widgets in sidebar 1', 'rb-blog-one' ),
				'id'             => 'sidebar-1',
				'class'          => '',
				'before_sidebar' => '<aside id="secondary" class="widget-area col-lg-4">',
				'after_sidebar'  => '</aside>',
				'before_widget'  => '<div id="%1$s" class="widget %2$s">',
				'after_widget'   => '</div>',
				'before_title'   => '<h2 class="widget-title">',
				'after_title'    => '</h2>',
			)
		);
	}
	add_action( 'widgets_init', 'rb_blog_one_theme_widget' );
}
