<?php
/*=======================
Table of Common Functions
=========================
    01. Theme Setup
    02. Theme Widget
	03. Skip Link Focus
	04. Allowed HTML
*/

// 01. Theme Setup
if ( ! function_exists( 'rb_blog_one_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
    function rb_blog_one_theme_setup() {        
        /*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'rb-blog-one', get_template_directory(). '/languages' );

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

		// Menu Register
        register_nav_menu( 'header_menu', __( 'Header Menu', 'rb-blog-one' ) );

		// Set content-width.
        $GLOBALS['content_width'] = apply_filters( 'rb_blog_one_content_width', 1080  );

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
            'navigation-widgets'
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
            'width'              => 1110,
            'height'             => 450,
            'flex-width'         => true,
            'flex-height'        => true,
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

// 02. Theme Widget
function rb_blog_one_theme_widget() {
	// Blog Widget
	register_sidebar(array(
		'name' 			=> __( 'Sidebar 1', 'rb-blog-one' ),
		'description' 	=> __( 'Add your widgets in sidebar 1',  'rb-blog-one' ),
		'id' 			=> 'sidebar-1',
        'class'  		=> '',
        'before_sidebar'=> '<aside id="secondary" class="widget-area col-lg-4">',
		'after_sidebar' => '</aside>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class="widget-title">',
		'after_title' 	=> '</h2>'
	));

	// Footer Widgets
    for ( $num = 1; $num <= 5; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'rb-blog-one' ), $num ),
            'id'            => 'footer-' . $num,
            'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ] );
    }
}
add_action( 'widgets_init', 'rb_blog_one_theme_widget' );

// 03. Skip Link Focus
if ( !function_exists( 'rb_blog_one_focus_fix' ) ) {
    function rb_blog_one_focus_fix() {

        // If SCRIPT_DEBUG is defined and true, print the unminified file.
        if ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
            echo '<script>';
            include get_template_directory().'/assets/js/skip-link-focus-fix.js';
            echo '</script>';
        }
    
        // The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
        ?>
        <script>
        /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
        </script>
        <?php
    }
    add_action('wp_print_footer_scripts', 'rb_blog_one_focus_fix');
}

// 04. Allowed HTML
if ( !function_exists( 'rb_blog_one_allowed_html' ) ) {
	function rb_blog_one_allowed_html() {
		$allowed_html = array(
			'iframe' => array (
				'src'             => true,
				'height'          => true,
				'width'           => true,
				'frameborder'     => true,
				'allowfullscreen' => true,
			),
		);
		return $allowed_html;
	}
}
