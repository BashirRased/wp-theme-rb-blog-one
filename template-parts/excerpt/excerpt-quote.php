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
$quotation_text        = function_exists( 'get_field' ) ? get_field( 'quotation_text' ) : '';
$quotation_author      = function_exists( 'get_field' ) ? get_field( 'quotation_author' ) : '';
$quotation_author_link = function_exists( 'get_field' ) ? get_field( 'quotation_author_link' ) : '';

do_action( 'rb_blog_one_excerpt_default_before' );
if ( post_password_required() ) :
	do_action( 'rb_blog_one_post_title' );
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo rb_blog_one_kses_post( get_the_password_form() );
elseif ( ! empty( $quotation_text ) ) : ?>
	<div class="col-lg-12">
		<?php do_action( 'rb_blog_one_post_title' ); ?>

		<blockquote class="post-quote">
			<p><?php echo esc_html( $quotation_text ); ?></p>

			<?php if ( ! empty( $quotation_author ) ) : ?>
				<?php
				$author_url = ! empty( $quotation_author_link ) ? $quotation_author_link : '#';
				?>
				<a class="quote-author" href="<?php echo esc_url( $author_url ); ?>" target="_blank" rel="noopener noreferrer">
					<?php echo esc_html( $quotation_author ); ?>
				</a>
			<?php endif; ?>
		</blockquote>
	</div>
	<?php
else :
	do_action( 'rb_blog_one_excerpt_default' );
endif;
do_action( 'rb_blog_one_excerpt_default_after' );
