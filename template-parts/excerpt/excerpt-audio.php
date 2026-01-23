<?php
/**
 * Load post excerpt - audio posts.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );
$post_item_col  = ( has_post_thumbnail() || true === $show_thumbnail ) ? 'col-lg-7' : 'col-lg-12';

// Only get ACF fields if function exists.
$audio_type   = function_exists( 'get_field' ) ? get_field( 'choose_audio_post' ) : '';
$audio_file   = function_exists( 'get_field' ) ? get_field( 'audio_file_url' ) : '';
$audio_iframe = function_exists( 'get_field' ) ? get_field( 'audio_file_iframe' ) : '';

do_action( 'rb_blog_one_excerpt_default_before' );

if ( post_password_required() ) {
	do_action( 'rb_blog_one_post_title' );
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( get_the_password_form() );
} elseif ( 'file' === $audio_type && ! empty( $audio_file ) ) {
	// Handle both Array and URL return types.
	$audio_url = is_array( $audio_file ) && ! empty( $audio_file['url'] ) ? $audio_file['url'] : $audio_file;
	if ( ! empty( $audio_url ) ) :
		?>
		<div class="col-lg-12">
			<?php do_action( 'rb_blog_one_post_title' ); ?>
			<audio controls>
				<source src="<?php echo esc_url( $audio_url ); ?>" type="audio/mp4">
			</audio>
		</div>
		<?php
	endif;
} elseif ( 'iframe' === $audio_type && ! empty( $audio_iframe ) ) {
	?>
	<div class="col-lg-12">
	<?php
	do_action( 'rb_blog_one_post_title' );
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( $audio_iframe, rb_blog_one_allowed_html() );
	?>
	</div>
	<?php
} else {
	do_action( 'rb_blog_one_excerpt_default' );
}
do_action( 'rb_blog_one_excerpt_default_after' );
