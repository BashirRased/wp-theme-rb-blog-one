<?php
/**
 * The main template file.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

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
				if ( function_exists( 'rbth_content_with_sidebar' ) ) {
					do_action( 'rbth_content_with_sidebar' );
				} elseif ( is_rtl() ) {
					get_sidebar();
					get_template_part( 'template-parts/content/content' );
				} else {
					get_template_part( 'template-parts/content/content' );
					get_sidebar();
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
