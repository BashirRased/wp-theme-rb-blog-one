<?php
/**
 * Theme Functions - All assets.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ============================
 * ----- CONTENT OF TABLE -----
 * ============================
 * +++++ 01. Prefix with file directory
 * +++++ 02. Remove Elementor FontAwesome
 * +++++ 03. Google Fonts
 * +++++ 04. Third Party Assets
 * +++++ 05. WordPress Assets
 * +++++ 06. Theme Assets
 */

/**
 * 01. Prefix with file directory
 */
define( 'RB_BLOG_ONE_URL', get_template_directory_uri() );
define( 'RB_BLOG_ONE_CSS', RB_BLOG_ONE_URL . '/assets/css/' );
define( 'RB_BLOG_ONE_JS', RB_BLOG_ONE_URL . '/assets/js/' );
define( 'RB_BLOG_ONE_THIRD_PARTY_CSS', RB_BLOG_ONE_URL . '/assets/lib/css/' );
define( 'RB_BLOG_ONE_THIRD_PARTY_JS', RB_BLOG_ONE_URL . '/assets/lib/js/' );

/**
 * 02. Remove Elementor FontAwesome
 */
if ( ! function_exists( 'rb_blog_one_remove_elementor_font_awesome' ) ) {
	/**
	 * Remove Elementor default Font Awesome.
	 */
	function rb_blog_one_remove_elementor_font_awesome() {

		// Remove Elementor registered FA styles.
		wp_deregister_style( 'elementor-icons-fa-solid' );
		wp_deregister_style( 'elementor-icons-fa-regular' );
		wp_deregister_style( 'elementor-icons-fa-brands' );
		wp_deregister_style( 'elementor-icons-fa' );

		// Sometimes Elementor Pro uses this handle.
		wp_deregister_style( 'font-awesome' );
	}
	add_action( 'elementor/frontend/after_register_styles', 'rb_blog_one_remove_elementor_font_awesome', 5 );
}

/**
 * 03. Google Fonts
 */
if ( ! function_exists( 'rb_blog_one_google_fonts' ) ) {
	/**
	 * Enqueue Google Fonts dynamically from an array.
	 */
	function rb_blog_one_google_fonts() {
		$google_font_version = null;

		$google_font_path_start = 'https://fonts.googleapis.com/css2?';
		$google_font_path_end   = '&display=swap&subset=latin,latin-ext,cyrillic,cyrillic-ext,vietnamese';

		$google_font_family_path           = 'family=';
		$google_font_family_with_italic    = ':ital,wght@';
		$google_font_family_without_italic = ':wght@';

		$google_font_family_1_name        = 'Roboto';
		$google_font_family_1_weight_list = array( '400' );
		$google_font_family_1_weight      = implode( ',', $google_font_family_1_weight_list );
		$google_font_family_1             = $google_font_family_path . $google_font_family_1_name . $google_font_family_without_italic . $google_font_family_1_weight;

		$google_font_family_2_name        = 'Josefin+Sans';
		$google_font_family_2_weight_list = array( '700' );
		$google_font_family_2_weight      = implode( ';', $google_font_family_2_weight_list );
		$google_font_family_2             = $google_font_family_path . $google_font_family_2_name . $google_font_family_without_italic . $google_font_family_2_weight;

		$google_font_families = array( $google_font_family_1, $google_font_family_2 );
		$google_font_family   = implode( '&', $google_font_families );

		$google_font_path = $google_font_path_start . $google_font_family . $google_font_path_end;

		// Nunito, Figtree, Caveat with full weights and subsets.
		wp_enqueue_style(
			'rb-blog-one-google-fonts',
			$google_font_path,
			array(),
			$google_font_version // Using time() is okay for development, but remove in production for caching.
		);
	}
	add_action( 'wp_enqueue_scripts', 'rb_blog_one_google_fonts' );
}

/**
 * 04. Third Party Assets
 */
if ( ! function_exists( 'rb_blog_one_third_party_assets' ) ) {
	/**
	 * Enqueue third-party CSS & JS.
	 */
	function rb_blog_one_third_party_assets() {
		// Bootstrap CSS (RTL / LTR).
		if ( is_rtl() ) {
			wp_enqueue_style(
				'bootstrap',
				RB_BLOG_ONE_THIRD_PARTY_CSS . 'bootstrap.rtl.css',
				array(),
				'5.3.8',
				'all'
			);
		} else {
			wp_enqueue_style(
				'bootstrap',
				RB_BLOG_ONE_THIRD_PARTY_CSS . 'bootstrap.css',
				array(),
				'5.3.8',
				'all'
			);
		}

		// Third-party library CSS paths.
		$lib_css = array(
			'font-awesome'      => 'font-awesome.css',
			'owl-carousel'      => 'owl.carousel.css',
			'owl-theme-default' => 'owl.theme.default.css',
		);

		// Third-party library JS paths.
		$lib_js = array(
			'owl-carousel' => 'owl.carousel.js',
		);

		// Third-party library CSS & JS version.
		$lib_version = array(
			'owl-carousel'      => '2.3.4',
			'owl-theme-default' => '2.3.4',
		);

		// Third-party CSS.
		foreach ( $lib_css as $handle => $path ) {
			$version = isset( $lib_version[ $handle ] ) ? $lib_version[ $handle ] : time();
			wp_enqueue_style(
				$handle,
				RB_BLOG_ONE_THIRD_PARTY_CSS . $path,
				array(),
				$version,
				'all'
			);
		}

		// Third-party JS.
		foreach ( $lib_js as $handle => $path ) {
			$version = isset( $lib_version[ $handle ] ) ? $lib_version[ $handle ] : time();
			wp_enqueue_script(
				$handle,
				RB_BLOG_ONE_THIRD_PARTY_JS . $path,
				array( 'jquery' ),
				$version,
				true
			);
		}
	}
	add_action( 'wp_enqueue_scripts', 'rb_blog_one_third_party_assets' );
}

/**
 * 05. WordPress Assets
 */
if ( ! function_exists( 'rb_blog_one_wp_assets' ) ) {
	/**
	 * Enqueue WordPress core assets.
	 */
	function rb_blog_one_wp_assets() {

		// WP Required Style.
		wp_enqueue_style(
			'rb-blog-one-wp-style',
			get_stylesheet_uri(),
			array(),
			wp_get_theme()->get( 'Version' ),
			'all'
		);

		// Threaded comment reply script.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'rb_blog_one_wp_assets' );
}

/**
 * 06. Theme Assets
 */
if ( ! function_exists( 'rb_blog_one_theme_custom_assets' ) ) {
	/**
	 * Enqueue theme custom CSS & JS.
	 */
	function rb_blog_one_theme_custom_assets() {
		// Theme Style CSS.
		wp_enqueue_style(
			'rb-blog-one-style',
			RB_BLOG_ONE_CSS . 'style.css',
			array(),
			time(),
			'all'
		);

		// Responsive CSS.
		wp_enqueue_style(
			'rb-blog-one-responsive',
			RB_BLOG_ONE_CSS . 'responsive.css',
			array(),
			time(),
			'all'
		);

		// Theme Custom JS.
		wp_enqueue_script(
			'rb-blog-one-custom',
			RB_BLOG_ONE_JS . 'custom.js',
			array( 'jquery' ),
			time(),
			true
		);
	}
	add_action( 'wp_enqueue_scripts', 'rb_blog_one_theme_custom_assets' );
}
