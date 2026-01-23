<?php
/**
 * Post Functions
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define theme base path for includes.
define( 'RB_BLOG_ONE_POST_FUNCTIONS_PATH', get_template_directory() . '/inc/post-functions/' );

/**
 * Load theme includes if files exist.
 *
 * Keeping each functionality in separate files helps maintain clean code.
 */
$file_includes = array(
	'post-elements.php', // Post Title, Thumbnail and etc.
	'post-meta.php', // Post Meta related functions.
);

foreach ( $file_includes as $file ) {
	$filepath = RB_BLOG_ONE_POST_FUNCTIONS_PATH . $file;
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	}
}
