<?php
/**
 * The single attach image file.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!--====================================
===== Site Content Area Start Here =====
=====================================-->
<main class="site-content">
	<div id="page-content">
		<div class="container">
			<div class="row">                

				<?php
				if ( function_exists( 'rbth_left_sidebar' ) ) {
					rbth_left_sidebar();
				}
				?>

				<div id="primary" class="<?php echo esc_attr( $post_area_col ); ?>">

				<figure class="wp-block-image">
				<?php
				echo wp_get_attachment_image( get_the_ID(), '' );
				if ( wp_get_attachment_caption() ) :
					?>
						<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption() ); ?></figcaption>
					<?php endif; ?>
				</figure><!-- .wp-block-image -->

				</div>

				<?php
				if ( function_exists( 'rbth_right_sidebar' ) ) {
					rbth_right_sidebar();
				}
				?>

			</div><!-- .row -->
		</div><!-- .container -->
	</div>
</main>
<!--==================================
===== Site Content Area End Here =====
===================================-->

<?php
get_footer();