<?php
/**
 * Load post content - video posts.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );

// Only get ACF fields if function exists.
$video_type   = function_exists( 'get_field' ) ? get_field( 'choose_video_post' ) : '';
$video_file   = function_exists( 'get_field' ) ? get_field( 'video_file_url' ) : '';
$video_iframe = function_exists( 'get_field' ) ? get_field( 'video_file_iframe' ) : '';

do_action( 'rb_blog_one_content_default_before' );
do_action( 'rb_blog_one_content_default' );
if ( 'file' === $video_type && ! empty( $video_file ) ) {
	$video_url = is_array( $video_file ) && ! empty( $video_file['url'] ) ? $video_file['url'] : $video_file;if ( ! empty( $video_url ) ) {
		?>
		<video controls>
			<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
		</video>
		<?php
	}
} elseif ( 'iframe' === $video_type && ! empty( $video_iframe ) ) {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( $video_iframe, rb_blog_one_allowed_html() );
}
do_action( 'rb_blog_one_content' );
do_action( 'rb_blog_one_content_default_after' );
