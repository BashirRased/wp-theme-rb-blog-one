<?php
/**
 * functions and definitions
 */

// Common Functions
if( file_exists ( dirname( __FILE__ ) . '/inc/common-functions.php' ) ) {
	require_once(dirname( __FILE__ ) . '/inc/common-functions.php' );
}

// Third Party Assets
if( file_exists( dirname( __FILE__ ) . '/inc/third-party-assets.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/third-party-assets.php' );
}

// Theme Assets
if( file_exists( dirname( __FILE__ ) . '/inc/theme-assets.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/theme-assets.php' );
}

// Theme Functions
if( file_exists ( dirname( __FILE__ ) . '/inc/theme-functions.php' ) ) {
	require_once(dirname( __FILE__ ) . '/inc/theme-functions.php' );
}

// WP Bootstrap Navwalker
if( file_exists( dirname( __FILE__ ) . '/lib/bootstrap-navwalker.php' ) ) {
	require_once( dirname( __FILE__ ) . '/lib/bootstrap-navwalker.php' );
}

// TGM Plugin Activation
if( file_exists( dirname( __FILE__ ) . '/lib/class-tgm-plugin-activation.php' ) ) {
	require_once( dirname( __FILE__ ) . '/lib/class-tgm-plugin-activation.php' );
}