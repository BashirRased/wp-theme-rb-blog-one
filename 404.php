<?php
/**
 * The 404 error template file.
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
					<div class="error-page">
						<h1 class="error-page-title">
							<?php esc_html_e( '404', 'rb-blog-one' ); ?>
						</h1>
						<h4 class="error-page-subtitle">
							<?php esc_html_e( 'Page Not Found', 'rb-blog-one' ); ?>
						</h4>
						<p class="error-page-text">
							<?php esc_html_e( 'Whoops, this is embarassing. Looks like the page you were looking for was not found.', 'rb-blog-one' ); ?>
						</p>
						<a class="theme-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php esc_html_e( 'Back To Home', 'rb-blog-one' ); ?>
						</a>
					</div>
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
