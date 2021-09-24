<?php

// after theme setup functions
if( file_exists( dirname( __FILE__ ) . '/inc/after-theme-setup.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/after-theme-setup.php' );
}

// Google Fonts
if( file_exists( dirname( __FILE__ ) . '/inc/google-font-add-function.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/google-font-add-function.php' );
}

// Font Awesome CSS Files
if( file_exists( dirname( __FILE__ ) . '/inc/font-awesome-file-add-function.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/font-awesome-file-add-function.php' );
}

// CSS Files
if( file_exists( dirname( __FILE__ ) . '/inc/css-file-add-function.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/css-file-add-function.php' );
}

// Conditional JS
if( file_exists( dirname( __FILE__ ) . '/inc/conditional-js-file-add-function.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/conditional-js-file-add-function.php' );
}

//  JS Files
if( file_exists( dirname( __FILE__ ) . '/inc/js-file-add-function.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/js-file-add-function.php' );
}

// Sidebar Add
if( file_exists( dirname( __FILE__ ) . '/inc/register_sidebar.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/register_sidebar.php' );
}

// Customize Option Add
if( file_exists( dirname( __FILE__ ) . '/inc/customize-option.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/customize-option.php' );
}

// Default Menu
if( file_exists( dirname( __FILE__ ) . '/inc/default-menu.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/default-menu.php' );
}

if ( ! isset( $content_width ) ) $content_width = 900;

function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );