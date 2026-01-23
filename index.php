<?php
/**
 * The main template file.
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
					<div class="post-list">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/excerpt/excerpt', get_post_format() );
							endwhile;
						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'template-parts/content/content', 'none' );
						endif;
						?>
					</div>
					<?php
					// Post Pagination.
					do_action( 'rb_blog_one_pagination' );
					?>
				</div><!-- #primary -->
				<?php
				if ( function_exists( 'rbth_right_sidebar' ) ) {
					rbth_right_sidebar();
				}
				?>

			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #page-content -->
</main>
<!--==================================
===== Site Content Area End Here =====
===================================-->

<?php

get_footer();
