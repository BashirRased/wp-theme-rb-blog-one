<?php
/**
 * Load post content - image posts.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );

// Only get ACF fields if function exists.
$image_file = function_exists( 'get_field' ) ? get_field( 'image_post' ) : '';

do_action( 'rb_blog_one_content_default_before' );
do_action( 'rb_blog_one_content_default' );
if ( ! empty( $image_file ) ) {
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
	if ( $image_url ) {
		?>
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
		<?php
	}
}
do_action( 'rb_blog_one_content' );
do_action( 'rb_blog_one_content_default_after' );
