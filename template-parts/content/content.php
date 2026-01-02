<?php
/**
 * Load post and page content.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Check if sidebar is active.
if ( is_active_sidebar( 'sidebar-1' ) ) {
	$blog_list_col = 'col-lg-8';
} else {
	$blog_list_col = 'col-lg-12';
}
?>

<div id="primary" class="<?php echo esc_attr( $blog_list_col ); ?>">
	<div class="post-list">
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/excerpt/excerpt', get_post_format() );
			endwhile;
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
		?>
	</div>
	<?php
	// Post Pagination.
	do_action( 'rb_blog_one_pagination' );
	?>
</div><!-- #primary -->