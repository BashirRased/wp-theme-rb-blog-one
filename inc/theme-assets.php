<?php
/*===================
Table of Theme Assets
======================
	01. Prefix with file directory
	02. Google Fonts
	03. Custom Assets
	04. WordPress Assets
*/
 
// 01. Prefix with file directory
define( 'RB_BLOG_ONE_URL', get_template_directory_uri() );
define( 'RB_BLOG_ONE_CSS',RB_BLOG_ONE_URL.'/assets/css/' );
define( 'RB_BLOG_ONE_JS',RB_BLOG_ONE_URL.'/assets/js/' );

// 02. Google Fonts
add_editor_style( array(rb_blog_one_google_fonts() ) );
/**
 * Register Google fonts.
 */
function rb_blog_one_google_fonts() {
	$fonts_url = '';
	$font_families = array();
	$font_families[] = 'Josefin Sans:700';
	$font_families[] = 'Roboto:400';
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) )
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	return esc_url_raw( $fonts_url );
}

function rb_blog_one_google_font_add(){
    // Google Font
	wp_enqueue_style( 'rb-blog-one-google-font', rb_blog_one_google_fonts(), '', wp_get_theme()->get('Version'), 'all' );
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_google_font_add' );

// 03. Custom Assets
function rb_blog_one_theme_custom_assets(){
    // Theme Style CSS
    wp_enqueue_style( 'rb-blog-one-style', RB_BLOG_ONE_CSS . 'style.css', '', time(), 'all' );

    // Responsive CSS
    wp_enqueue_style( 'rb-blog-one-responsive', RB_BLOG_ONE_CSS . 'responsive.css', '', time(), 'all' );	

    // Theme Custom JS
    wp_enqueue_script( 'rb-blog-one-custom', RB_BLOG_ONE_JS . 'custom.js',array( 'jquery' ), time(), true );
}
add_action('wp_enqueue_scripts','rb_blog_one_theme_custom_assets');

// 04. WordPress Assets
function rb_blog_one_wp_assets() {
    // WP Required Style
	wp_enqueue_style('rb-blog-one-wp-style', get_stylesheet_uri(), '', time(), 'all');

    // Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' )) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_wp_assets' );