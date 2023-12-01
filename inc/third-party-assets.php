<?php
/**
 * The template for loaded all third party css & js files.
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 * 
 * The template loading under functions.php
 *
 * @package rb_blog_one
 */

/*=========================================
Table of Third Party Assets List Start Here
===========================================
	01. Prefix with file directory
	02. Font Awesome
    03. Bootstrap
    04. OwlCarousel2
    05. jQuery Nice Select
    06. jQuery meanMenu
    07. Browser Config Assets
    08. Conditional JS
=========================================
Table of Third Party Assets List End Here
=======================================*/

/*****************************************
***** 01. Prefix with file directory *****
*****************************************/
// Home Root
define( 'THEME_ROOT', get_template_directory_uri() );

// Font Awesome Root
define( 'FONT_AWESOME_CSS', THEME_ROOT . '/third-party/font-awesome/css/' );

// Bootstrap Root
define( 'BOOTSTRAP_ASSETS', THEME_ROOT . '/third-party/bootstrap/' );

// Swiper Root
define( 'SWIPER_ASSETS', THEME_ROOT . '/third-party/swiper/' );

// jQuery Nice Select Root
define( 'NICE_SELECT_ASSETS', THEME_ROOT . '/third-party/nice-select/' );

// jQuery meanMenu Root
define( 'MEAN_MENU_ASSETS', THEME_ROOT . '/third-party/mean-menu/' );

// Normalize Root
define( 'NORMALIZE_CSS', THEME_ROOT . '/third-party/normalize/' );

// Modernizr Root
define( 'MODERNIZR_JS', THEME_ROOT . '/third-party/modernizr/' );

// html5shiv Root
define( 'HTML5SHIV_JS', THEME_ROOT . '/third-party/html5shiv/' );

// Respond Root
define( 'RESPOND_JS', THEME_ROOT . '/third-party/respond/' );

/***************************
***** 02. Font Awesome *****
***************************/
function rb_blog_one_fontawesome_css() {    
	wp_enqueue_style( 'font-awesome', FONT_AWESOME_CSS .'font-awesome.css', '', '6.4.2', 'all' );
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_fontawesome_css' );

/************************
***** 03. Bootstrap *****
************************/
function rb_blog_one_bootstrap_assets() {    
    // Bootstrap CSS
	wp_enqueue_style( 'bootstrap', BOOTSTRAP_ASSETS . 'bootstrap.css', '', '5.3.2', 'all' );
    wp_enqueue_style( 'bootstrap', BOOTSTRAP_ASSETS . 'bootstrap.css', '', '5.3.2', 'all' );
    
    // Bootstrap JS
    wp_enqueue_script( 'bootstrap', BOOTSTRAP_ASSETS . 'bootstrap.js', array( 'jquery', 'popper' ), '5.3.2', true);
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_bootstrap_assets' );

/*********************
***** 04. Swiper *****
*********************/
function rb_blog_one_swiper_assets() {
    // Swiper CSS
	wp_enqueue_style( 'swiper-bundle', SWIPER_ASSETS . 'swiper-bundle.css', '', '11.0.4', 'all' );
    
    // Swiper JS
    wp_enqueue_script( 'swiper-bundle', SWIPER_ASSETS . 'swiper-bundle.js', array( 'jquery' ), '11.0.4', true);
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_swiper_assets' );

/*********************************
***** 05. jQuery Nice Select *****
*********************************/
function rb_blog_one_nice_select_assets() {    
    // Nice Select CSS
	wp_enqueue_style( 'nice-select', NICE_SELECT_ASSETS . 'nice-select.css', '', '1.1.0', 'all');

    // Nice Select JS
    wp_enqueue_script( 'jquery-nice-select', NICE_SELECT_ASSETS . 'jquery.nice-select.js', array( 'jquery' ), '1.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_nice_select_assets' );

/******************************
***** 06. jQuery meanMenu *****
******************************/
function rb_blog_one_mean_menu_assets() {    
    // Mean Menu
	wp_enqueue_style( 'meanmenu', MEAN_MENU_ASSETS . 'meanmenu.css', '', '2.0.7', 'all');

    // Mean Menu
    wp_enqueue_script( 'jquery-meanmenu', MEAN_MENU_ASSETS . 'jquery.meanmenu.js', array( 'jquery' ), '2.0.8', true );
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_mean_menu_assets' );

/************************************
***** 07. Browser Config Assets *****
************************************/
function rb_blog_one_browser_config_assets() {
    // Normalize
	wp_enqueue_style( 'normalize', NORMALIZE_CSS . 'normalize.css', '', '8.0.1', 'all' );

    // Modernizr
	wp_enqueue_script( 'modernizr', MODERNIZR_JS . 'modernizr.js', array( 'jquery' ), '2.8.3', true );
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_browser_config_assets' );

/*****************************
***** 08. Conditional JS *****
*****************************/
function rb_blog_one_conditional_assets() {
    // html5shiv Conditional JS
	wp_enqueue_script('html5shiv', HTML5SHIV_JS . 'html5shiv.js', '', '3.7.3', false);
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 11' );
	
    // respond Conditional JS
	wp_enqueue_script( 'respond', RESPOND_JS . 'respond.js', '', '1.4.2', false );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 11' );
}
add_action( 'wp_enqueue_scripts', 'rb_blog_one_conditional_assets' );