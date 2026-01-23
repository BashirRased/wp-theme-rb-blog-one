<?php
/**
 * Load post excerpt - link posts.
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
$link_url  = function_exists( 'get_field' ) ? get_field( 'link_url' ) : '';
$link_text = function_exists( 'get_field' ) ? get_field( 'link_text' ) : '';

do_action( 'rb_blog_one_excerpt_default_before' );
if ( post_password_required() ) :
	do_action( 'rb_blog_one_post_title' );
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( get_the_password_form() );
elseif ( ! empty( $link_url ) ) : ?>
	<?php
	$link_target = '_blank';
	$link_title  = ! empty( $link_text ) ? $link_text : $link_url;
	?>
	<div class="col-lg-12">
		<?php do_action( 'rb_blog_one_post_title' ); ?>

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
	</div>
	<?php
else :
	do_action( 'rb_blog_one_excerpt_default' );
endif;
do_action( 'rb_blog_one_excerpt_default_after' );
