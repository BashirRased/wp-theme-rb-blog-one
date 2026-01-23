<?php
/**
 * The single page/post template file.
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
				<div id="primary" class="<?php echo esc_attr( rb_blog_one_column_class() ); ?>">
					<?php
					if ( have_posts() ) {
						// Load posts loop.
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content/content', get_post_format() );
						}
					} else {
						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content/content', 'none' );
					}
					?>
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
