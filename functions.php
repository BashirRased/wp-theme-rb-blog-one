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


function rb_add_editor_style( $rb_stylesheet = 'custom-editor-style.css' ) {
    add_theme_support( 'editor-style' );
 
    if ( ! is_admin() ) {
        return;
    }
 
    global $rb_editor_styles;
    $rb_editor_styles = (array) $rb_editor_styles;
    $rb_stylesheet    = (array) $rb_stylesheet;
    if ( is_rtl() ) {
        $rb_rtl_stylesheet = str_replace( '.css', '-rtl.css', $stylesheet[0] );
        $rb_stylesheet[]   = $rb_rtl_stylesheet;
    }
 
    $rb_editor_styles = array_merge( $rb_editor_styles, $rb_stylesheet );
};

function rb_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'rb_skip_link_focus_fix' );