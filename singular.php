<?php
/**
 * The template for displaying single posts and pages.
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.8
 */

get_header();
get_template_part('template-parts/content','single');
printf(
		/* translators: %s: Author name. */
		esc_html__( 'By %s', 'rb-blog-one' ),
		get_the_author()
	);
get_footer();