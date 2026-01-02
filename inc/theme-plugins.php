<?php
/**
 * Required plugins
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'rb_blog_one_required_and_recommended_plugins' ) ) {
	/**
	 * Register required and recommended plugins.
	 *
	 * @return void
	 */
	function rb_blog_one_required_and_recommended_plugins() {
		$plugins = array(
			// Kirki Customizer Framework.
			array(
				'name'      => esc_html__( 'Kirki Customizer Framework', 'rb-blog-one' ),
				'slug'      => 'kirki',
				'recommend' => true,
			),

			// Advanced Custom Fields (ACF).
			array(
				'name'      => esc_html__( 'Advanced Custom Fields (ACF)', 'rb-blog-one' ),
				'slug'      => 'advanced-custom-fields',
				'recommend' => true,
			),

			// RB Theme Helper.
			array(
				'name'      => esc_html__( 'RB Theme Helper', 'rb-blog-one' ),
				'slug'      => 'rb-theme-helper',
				'recommend' => true,
			),

			// RB Site Social Links.
			array(
				'name'      => esc_html__( 'RB Site Social Links', 'rb-blog-one' ),
				'slug'      => 'rb-site-social-links',
				'recommend' => true,
			),
		);

		$config = array(
			'id'           => 'rb_blog_one',            // Unique ID for hashing notices.
			'default_path' => '',                   // Default path for bundled plugins.
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'is_automatic' => false,
			'message'      => '',
		);

		tgmpa( $plugins, $config );
	}
}
