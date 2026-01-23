<?php
/**
 * Load general post excerpt.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

do_action( 'rb_blog_one_excerpt_default_before' );

if ( post_password_required() ) {
	do_action( 'rb_blog_one_post_title' );
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( get_the_password_form() );
} else {
	do_action( 'rb_blog_one_excerpt_default' );
}
do_action( 'rb_blog_one_excerpt_default_after' );
