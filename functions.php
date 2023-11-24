<?php
/**
 * RB Blog One functions and definitions
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.7
 * @since RB Blog One 1.1.7
 */

// After Theme Setup
if( file_exists( dirname ( __FILE__ ) . '/inc/after-theme-setup.php' ) ) {
	require_once ( dirname ( __FILE__ ) . '/inc/after-theme-setup.php' );
}

// Third Party Assets
if( file_exists( dirname( __FILE__ ) . '/inc/third-party-assets.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/third-party-assets.php' );
}

// Theme Assets
if( file_exists( dirname( __FILE__ ) . '/inc/theme-assets.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/theme-assets.php' );
}

// Theme Widgets
if( file_exists( dirname( __FILE__ ) . '/inc/widget-register.php') ) {
	require_once( dirname( __FILE__ ) . '/inc/widget-register.php' );
}

// Common Functions
if( file_exists ( dirname( __FILE__ ) . '/inc/common-functions.php' ) ) {
	require_once(dirname( __FILE__ ) . '/inc/common-functions.php' );
}

// Post Functions
if( file_exists ( dirname( __FILE__ ) . '/inc/post-functions.php' ) ) {
	require_once(dirname( __FILE__ ) . '/inc/post-functions.php' );
}

// Breadcrumbs
if( file_exists ( dirname( __FILE__ ) . '/inc/breadcrumbs.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/breadcrumbs.php' );
}

// Bootstrap NavWalker
if( file_exists( dirname( __FILE__ ) . '/lib/bootstrap-navwalker.php' ) ) {
	require_once( dirname( __FILE__ ) . '/lib/bootstrap-navwalker.php' );
}

// TGM Plugin Activation
if( file_exists( dirname( __FILE__ ) . '/lib/tgm-activation.php' ) ) {
	require_once( dirname( __FILE__ ) . '/lib/tgm-activation.php' );
}

// TGM Plugin Customization
if( file_exists( dirname(__FILE__) . '/inc/tgm-customization.php' ) ) {
	require_once(dirname(__FILE__) . '/inc/tgm-customization.php' );
}