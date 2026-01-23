<?php
/**
 * Load post excerpt - image posts.
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
$image_file = function_exists( 'get_field' ) ? get_field( 'image_post' ) : '';

do_action( 'rb_blog_one_excerpt_default_before' );
if ( post_password_required() ) :
	do_action( 'rb_blog_one_post_title' );
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( get_the_password_form() );
elseif ( ! empty( $image_file ) ) :
	// Resolve image data from all ACF return formats.
	$image_url     = '';
	$image_alt     = get_the_title();
	$image_caption = '';

	if ( is_array( $image_file ) ) {
		$image_url     = ! empty( $image_file['url'] ) ? $image_file['url'] : '';
		$image_alt     = ! empty( $image_file['alt'] ) ? $image_file['alt'] : $image_alt;
		$image_caption = ! empty( $image_file['caption'] ) ? $image_file['caption'] : '';
	} elseif ( is_numeric( $image_file ) ) {
		$image_url     = wp_get_attachment_url( $image_file );
		$image_caption = wp_get_attachment_caption( $image_file );
	} else {
		$image_url = $image_file;
	}
	if ( $image_url ) :
		?>
		<div class="col-lg-12">
			<?php do_action( 'rb_blog_one_post_title' ); ?>
			<figure class="post-image">
				<img
					src="<?php echo esc_url( $image_url ); ?>"
					alt="<?php echo esc_attr( $image_alt ); ?>"
					loading="lazy"
				>
				<?php if ( $image_caption ) : ?>
					<figcaption class="post-image-caption">
						<?php echo esc_html( $image_caption ); ?>
					</figcaption>
				<?php endif; ?>
			</figure>
		</div>
		<?php
endif;
else :
	do_action( 'rb_blog_one_excerpt_default' );
endif;
do_action( 'rb_blog_one_excerpt_default_after' );