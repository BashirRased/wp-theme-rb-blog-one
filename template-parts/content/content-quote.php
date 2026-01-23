<?php
/**
 * Load post content - link posts.
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
$quotation_text        = function_exists( 'get_field' ) ? get_field( 'quotation_text' ) : '';
$quotation_author      = function_exists( 'get_field' ) ? get_field( 'quotation_author' ) : '';
$quotation_author_link = function_exists( 'get_field' ) ? get_field( 'quotation_author_link' ) : '';

do_action( 'rb_blog_one_content_default_before' );
do_action( 'rb_blog_one_content_default' );
if ( ! empty( $quotation_text ) ) {
	?>
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
	<?php
}
do_action( 'rb_blog_one_content' );
do_action( 'rb_blog_one_content_default_after' );
