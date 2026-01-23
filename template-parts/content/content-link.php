<?php
/**
 * Load post content - link posts.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );

// Only get ACF fields if function exists.
$link_url  = function_exists( 'get_field' ) ? get_field( 'link_url' ) : '';
$link_text = function_exists( 'get_field' ) ? get_field( 'link_text' ) : '';

do_action( 'rb_blog_one_content_default_before' );
do_action( 'rb_blog_one_content_default' );
if ( ! empty( $link_url ) ) {
	$link_target = '_blank';
	$link_title  = ! empty( $link_text ) ? $link_text : $link_url;
	?>
	<div class="post-link">
		<i class="fa-solid fa-link"></i>
		<a
			class="link-post"
			href="<?php echo esc_url( $link_url ); ?>"
			target="<?php echo esc_attr( $link_target ); ?>"
			rel="noopener noreferrer"
		>
			<?php echo esc_html( $link_title ); ?>
		</a>
	</div>
	<?php
}
do_action( 'rb_blog_one_content' );
do_action( 'rb_blog_one_content_default_after' );
