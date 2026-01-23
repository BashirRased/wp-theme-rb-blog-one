<?php
/**
 * Load post content - audio posts.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );

// Only get ACF fields if function exists.
$audio_type   = function_exists( 'get_field' ) ? get_field( 'choose_audio_post' ) : '';
$audio_file   = function_exists( 'get_field' ) ? get_field( 'audio_file_url' ) : '';
$audio_iframe = function_exists( 'get_field' ) ? get_field( 'audio_file_iframe' ) : '';

do_action( 'rb_blog_one_content_default_before' );
do_action( 'rb_blog_one_content_default' );
if ( 'file' === $audio_type && ! empty( $audio_file ) ) {
	$audio_url = is_array( $audio_file ) && ! empty( $audio_file['url'] ) ? $audio_file['url'] : $audio_file;if ( ! empty( $audio_url ) ) {
		?>
		<audio controls>
			<source src="<?php echo esc_url( $audio_url ); ?>" type="audio/mp4">
		</audio>
		<?php
	}
} elseif ( 'iframe' === $audio_type && ! empty( $audio_iframe ) ) {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( $audio_iframe, rb_blog_one_allowed_html() );
}
do_action( 'rb_blog_one_content' );
do_action( 'rb_blog_one_content_default_after' );
