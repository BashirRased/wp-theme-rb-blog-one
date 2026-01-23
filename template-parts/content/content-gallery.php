<?php
/**
 * Load post content - gallery posts.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

$wp_post_id     = get_the_ID();
$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );

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

do_action( 'rb_blog_one_content_default_before' );
do_action( 'rb_blog_one_content_default' );
if ( ! empty( $gallery_images ) ) {
	?>
	<div class="post-gallery owl-carousel owl-theme">
		<?php
		foreach ( $gallery_images as $image ) {
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
			<?php
		}
		?>
	</div>
	<?php
}
do_action( 'rb_blog_one_content' );
do_action( 'rb_blog_one_content_default_after' );
