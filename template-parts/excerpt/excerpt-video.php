<?php
/**
 * Load post excerpt - video posts.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );
$post_item_col  = ( has_post_thumbnail() || true === $show_thumbnail ) ? 'col-lg-7' : 'col-lg-12';

// Only get ACF fields if function exists.
$video_type   = function_exists( 'get_field' ) ? get_field( 'choose_video_post' ) : '';
$video_file   = function_exists( 'get_field' ) ? get_field( 'video_file_url' ) : '';
$video_iframe = function_exists( 'get_field' ) ? get_field( 'video_file_iframe' ) : '';

do_action( 'rb_blog_one_excerpt_default_before' );
if ( post_password_required() ) :
	do_action( 'rb_blog_one_post_title' );
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( get_the_password_form() );
elseif ( 'file' === $video_type && ! empty( $video_file ) ) : ?>
	<?php
	// Handle both Array and URL return types.
	$video_url = is_array( $video_file ) && ! empty( $video_file['url'] ) ? $video_file['url'] : $video_file;
	if ( ! empty( $video_url ) ) :
		?>
		<div class="col-lg-12">
			<?php do_action( 'rb_blog_one_post_title' ); ?>
			<video controls>
				<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
			</video>
		</div>
	<?php endif; ?>

<?php elseif ( 'iframe' === $video_type && ! empty( $video_iframe ) ) : ?>
	<div class="col-lg-12">
		<?php
		do_action( 'rb_blog_one_post_title' );
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo rb_blog_one_kses_post( $video_iframe, rb_blog_one_allowed_html() );
		?>
	</div>
	<?php
else :
	do_action( 'rb_blog_one_excerpt_default' );
endif;
do_action( 'rb_blog_one_excerpt_default_after' );
