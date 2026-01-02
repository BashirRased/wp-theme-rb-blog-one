<?php
/**
 * After Theme Setup Functions
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
 * +++++  01. Theme Setup
 * +++++  02. Skip Link Focus
 * +++++  03. Allowed HTML
 */

/**
 * 01. Theme Setup
 */
if ( ! function_exists( 'rb_blog_one_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function rb_blog_one_theme_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'rb-blog-one', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'gallery',
				'image',
				'quote',
				'video',
				'audio',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Set content-width.
		$GLOBALS['content_width'] = apply_filters( 'rb_blog_one_content_width', 1080 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		$html = array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		);
		add_theme_support( 'html5', $html );

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		$custom_logo = array(
			'height'               => $logo_height,
			'width'                => $logo_width,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
		);
		add_theme_support( 'custom-logo', $custom_logo );

		// Custom header.
		$custom_header = array(
			'width'       => 1110,
			'height'      => 450,
			'flex-width'  => true,
			'flex-height' => true,
		);
		add_theme_support( 'custom-header', $custom_header );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Custom background color.
		$custom_bg = array(
			'default-color' => 'd1e4dd',
		);
		add_theme_support( 'custom-background', $custom_bg );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
}
add_action( 'after_setup_theme', 'rb_blog_one_theme_setup' );

/**
 * 02. Skip Link Focus
 */
if ( ! function_exists( 'rb_blog_one_focus_fix' ) ) {
	/**
	 * Skip Link
	 */
	function rb_blog_one_focus_fix() {
		// If SCRIPT_DEBUG is defined and true, print the unminified file.
		if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
			echo '<script>';
			include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
			echo '</script>';
		}

		// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
		</script>
		<?php
	}
	add_action( 'wp_print_footer_scripts', 'rb_blog_one_focus_fix' );
}

/**
 * 03. Allowed HTML
 */
if ( ! function_exists( 'rb_blog_one_allowed_html' ) ) {
	/**
	 * Allowed HTML for wp_kses()
	 *
	 * @return array
	 */
	function rb_blog_one_allowed_html() {
		$allowed_html = array(

			// Basic formatting.
			'strong'  => array(),
			'b'       => array(),
			'em'      => array(),
			'i'       => array(),
			'u'       => array(),
			'br'      => array(),
			'span'    => array(
				'class' => true,
				'style' => true,
			),
			'p'       => array(
				'class' => true,
				'style' => true,
			),

			// Links.
			'a'       => array(
				'href'   => true,
				'title'  => true,
				'rel'    => true,
				'target' => true,
				'class'  => true,
			),

			// Images.
			'img'     => array(
				'src'      => true,
				'alt'      => true,
				'width'    => true,
				'height'   => true,
				'class'    => true,
				'loading'  => true,
				'decoding' => true,
			),

			// Lists.
			'ul'      => array(
				'class' => true,
			),
			'ol'      => array(
				'class' => true,
			),
			'li'      => array(
				'class' => true,
			),

			// Div & containers.
			'div'     => array(
				'class' => true,
				'id'    => true,
				'style' => true,
			),
			'section' => array(
				'class' => true,
				'id'    => true,
				'style' => true,
			),

			// Iframe support (YouTube, Vimeo, Google Maps).
			'iframe'  => array(
				'src'             => true,
				'height'          => true,
				'width'           => true,
				'frameborder'     => true,
				'allow'           => true,
				'allowfullscreen' => true,
				'loading'         => true,
				'referrerpolicy'  => true,
			),

			// Video + audio.
			'video'   => array(
				'src'      => true,
				'width'    => true,
				'height'   => true,
				'class'    => true,
				'controls' => true,
				'loop'     => true,
				'autoplay' => true,
				'muted'    => true,
			),
			'audio'   => array(
				'src'      => true,
				'class'    => true,
				'controls' => true,
			),

			// Buttons.
			'button'  => array(
				'class' => true,
				'id'    => true,
				'type'  => true,
			),

			// Tables.
			'table'   => array(
				'class' => true,
				'style' => true,
			),
			'thead'   => array(),
			'tbody'   => array(),
			'tr'      => array(),
			'td'      => array(
				'class' => true,
				'style' => true,
			),
			'th'      => array(
				'class' => true,
				'style' => true,
			),
		);

		return $allowed_html;
	}
}
