<?php
/**
 * Functions and definitions for this theme
 *
 * Sets up theme defaults, registers support for WordPress features,
 * and loads additional files to extend functionality.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define theme base path for includes.
define( 'HELPEST_INC_PATH', get_template_directory() . '/inc/' );
define( 'HELPEST_LIB_PATH', get_template_directory() . '/assets/lib/php/' );

/**
 * Load theme includes if files exist.
 *
 * Keeping each functionality in separate files helps maintain clean code.
 */
$file_includes = array(
	'theme-setup.php', // Core setup and supports.
	'theme-assets.php',    // Styles and scripts.
	'theme-widgets.php',   // Widget areas.
	'theme-menus.php',   // Theme menus.
	'theme-plugins.php', // Required plugins.
	'breadcrumbs.php', // Breadcrumbs.
	'post-functions.php', // Post functions.
);

foreach ( $file_includes as $file ) {
	$filepath = HELPEST_INC_PATH . $file;
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	}
}

/**
 * Load the required library.
 */
$file_libs = array(
	'class-rb-blog-one-header-menu-walker.php', // Header Menu Nav Walker.
	'class-tgm-plugin-activation.php', // TGM Plugin.
);

foreach ( $file_libs as $file ) {
	$filepath = HELPEST_LIB_PATH . $file;
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	}
}
