<?php
/**
 * The 404 error template file.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

get_header();

// Site Column & Sitebar Display.
$sidebar_display = '';
$sidebar         = get_theme_mod( 'rbth_sidebar_blog' );
if ( $sidebar == 'left-sidebar' ) {
	$post_area_col   = 'col-lg-8';
	$sidebar_display = 'left';
} elseif ( $sidebar == 'right-sidebar' ) {
	$post_area_col   = 'col-lg-8';
	$sidebar_display = 'right';
} else {
	$post_area_col = 'col-lg-12';
}
?>

<!--====================================
===== Site Content Area Start Here =====
=====================================-->
<main class="site-content">
	<div id="page-content">
		<div class="container">
			<div class="row">

				<?php
				if ( $sidebar_display == 'left' ) {
					get_sidebar();
				}
				?>

				<div id="primary" class="<?php echo esc_attr( $post_area_col ); ?>">
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
				if ( $sidebar_display == 'right' ) {
					get_sidebar();
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
