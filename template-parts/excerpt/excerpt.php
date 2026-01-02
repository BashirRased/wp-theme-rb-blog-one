<?php
/**
 * Load general post excerpt.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Check if has post thumbnail.
if ( has_post_thumbnail() ) {
	$post_item_col = 'col-lg-7';
} else {
	$post_item_col = 'col-lg-12';
}
?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-list-item' ); ?>>
	<div class="row">

		<!-- Post Thumbnail -->
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-lg-5">
				<?php do_action( 'rb_blog_one_post_thumbnail' ); ?>
			</div>
		<?php endif; ?>

		<div class="<?php echo esc_attr( $post_item_col ); ?>">

			<?php
			do_action( 'rb_blog_one_category_meta_top' );
			do_action( 'rb_blog_one_post_title' );
			if ( function_exists( 'rbth_render_post_meta' ) ) {
				echo '<div class="post-meta">';
				rbth_render_post_meta();
				echo '</div>';
			} else {
				echo '<div class="post-meta">';
				do_action( 'rb_blog_one_author_meta' );
				echo '</div>';
			}
			?>

			<!-- Post Excerpt -->
			<div class="post-excerpt">
				<?php the_excerpt(); ?>
			</div>                

		</div>

	</div><!-- .row -->
</article>
