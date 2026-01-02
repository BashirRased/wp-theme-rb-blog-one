<?php
/**
 * Template Parts - Breadcrumbs.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!--===================================
===== breadcrumb Area Start Here =====
====================================-->
<div class='breadcrumb-area' style='background-image:url(<?php echo esc_url( get_header_image() ); ?>);'>
	<div class="breadcrumb-content">
		<div class='container'>
			<div class='row d-flex align-items-center'>
				<div class='col-lg-6'>
					<div class="breadcrumb-left-area">
						<?php
							do_action( 'rb_blog_one_breadcrumbs_title' );
							do_action( 'rb_blog_one_breadcrumb_description' );
						?>
					</div>                
				</div>

				<div class='col-lg-6'>
					<div class="breadcrumb-right-area float-end">
						<?php do_action( 'rb_blog_one_breadcrumbs_navbar' ); ?>
					</div>                
				</div>

			</div><!-- .row -->
		</div><!-- .container -->
	</div>
</div>
<!--=================================
===== breadcrumb Area End Here =====
==================================-->