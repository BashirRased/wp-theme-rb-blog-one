<?php
/**
 * Load post excerpt - gallery posts.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wp_post_id     = get_the_ID();
$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );
$post_item_col  = ( has_post_thumbnail() || true === $show_thumbnail ) ? 'col-lg-7' : 'col-lg-12';

// Get gallery images from ACF.
$gallery_images = array_filter(
	array(
		function_exists( 'get_field' ) ? get_field( 'gallery_image_1', $wp_post_id ) : '',
		function_exists( 'get_field' ) ? get_field( 'gallery_image_2', $wp_post_id ) : '',
		function_exists( 'get_field' ) ? get_field( 'gallery_image_3', $wp_post_id ) : '',
		function_exists( 'get_field' ) ? get_field( 'gallery_image_4', $wp_post_id ) : '',
		function_exists( 'get_field' ) ? get_field( 'gallery_image_5', $wp_post_id ) : '',
	)
);

do_action( 'rb_blog_one_excerpt_default_before' );
if ( post_password_required() ) :
	do_action( 'rb_blog_one_post_title' );
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( get_the_password_form() );
elseif ( ! empty( $gallery_images ) ) : ?>
	<div class="col-lg-12">
		<?php do_action( 'rb_blog_one_post_title' ); ?>
		<div class="post-gallery owl-carousel owl-theme">
			<?php
			foreach ( $gallery_images as $image ) :
				$image_url     = '';
				$image_alt     = get_the_title();
				$image_caption = '';

				if ( is_array( $image ) ) {
					$image_url     = $image['url'] ?? '';
					$image_alt     = $image['alt'] ?? $image_alt;
					$image_caption = $image['caption'] ?? '';
				} elseif ( is_numeric( $image ) ) {
					$image_url     = wp_get_attachment_url( $image );
					$image_caption = wp_get_attachment_caption( $image );
				} else {
					$image_url = $image;
				}
				if ( ! $image_url ) {
					continue;
				}
				?>
				<div class="item">
					<figure class="gallery-post-item">
						<img
							src="<?php echo esc_url( $image_url ); ?>"
							alt="<?php echo esc_attr( $image_alt ); ?>"
							loading="lazy"
						>

						<?php if ( $image_caption ) : ?>
							<figcaption class="gallery-post-caption">
								<?php echo esc_html( $image_caption ); ?>
							</figcaption>
						<?php endif; ?>
					</figure>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
else :
	do_action( 'rb_blog_one_excerpt_default' );
endif;
do_action( 'rb_blog_one_excerpt_default_after' );
