<?php
/**
 * The template for displaying the Header Style - One
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Header Top Cols.
if ( function_exists( 'rb_site_social_links_icon' ) ) {
	$header_left_col = 'col-lg-6';
} else {
	$header_left_col = 'col-lg-12';
}

// Site Title & Tagline.
$site_title   = '';
$site_tagline = '';
$site_title   = get_bloginfo( 'name' );
$site_tagline = get_bloginfo( 'description', 'display' );

// Header Top Template Load.
if ( function_exists( 'rbth_header_top' ) ) {
	rbth_header_top();
}

// Header Ads switch.
$header_ads_switch = (int) get_theme_mod( 'rbth_header_ads_switch', 0 );

// Header Ads image.
$header_ads     = get_theme_mod( 'rbth_header_ads', array() );
$header_ads_url = '';
$header_ads_alt = esc_attr__( 'Header Advertisement', 'rb-blog-one' );

// Get uploaded image URL (Kirki save_as => array).
if ( is_array( $header_ads ) && ! empty( $header_ads['url'] ) ) {
	$header_ads_url = $header_ads['url'];
}

// Fallback image (only if switch is ON).
if ( 1 === $header_ads_switch && empty( $header_ads_url ) ) {
	$header_ads_url = get_template_directory_uri() . '/assets/img/pexels-ads.jpg';
}

// Final boolean flag (clean logic).
$has_header_ads = ( 1 === $header_ads_switch && ! empty( $header_ads_url ) );
$branding_col   = $has_header_ads ? 'col-lg-6' : 'col-lg-12';

// Safety check.
if ( ! empty( $GLOBALS['rbth_show_header_top'] ) ) {
	?>
	<!--==================================
	===== Header Top Area Start Here =====
	===================================-->
	<div class="header-top-area">
		<div class="container">
			<div class="row">
				
				<!--===== Header Top Left =====-->
				<div class="<?php echo esc_attr( $header_left_col ); ?> d-flex align-items-center justify-content-lg-start justify-content-xl-start justify-content-xxl-start justify-content-center mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">
					<div class="header-top-left">
						<i class="fa-solid fa-calendar-days"></i>
						<span>
							<?php echo esc_html( date_i18n( 'l, jS F Y' ) ); ?>
						</span>
					</div>
				</div>

				<?php if ( function_exists( 'rb_site_social_links_icon' ) ) : ?>
					<!--===== Header Top Right =====-->
					<div class="col-lg-6 d-flex align-items-center justify-content-lg-end justify-content-xl-end justify-content-xxl-end justify-content-center">
						<div class="header-top-right">
							<?php
							rb_site_social_links_icon(
								'', // ul id.
								'', // ul class.
								'', // li class.
								'', // a class.
							);
							?>
						</div>
					</div>
				<?php endif; ?>
				
			</div><!-- .row -->
		</div><!-- .container -->
	</div>
	<!--================================
	===== Header Top Area End Here =====
	=================================-->
<?php } ?>

<!--============================================
===== Header Site Branding Area Start Here =====
=============================================-->
<div class="header-site-branding">
	<div class="container">
		<div class="row align-items-center">
			
			<?php if ( has_custom_logo() || display_header_text() ) : ?>
			<!-- Site Logo & Title-Tagline -->
			<div class="<?php echo esc_attr( $branding_col ); ?>">
				<div class="site-branding d-lg-flex align-items-lg-center d-sm-block d-md-block">
					<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">
						<?php the_custom_logo(); ?>
					</div>
					<?php endif; ?>

					<?php if ( display_header_text() ) : ?>
					<div class="site-title-tagline mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">

						<?php if ( $site_title ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php echo esc_html( $site_title ); ?>
							</a>
						</h1>
						<?php endif; ?>

						<?php if ( $site_tagline ) : ?>
							<p class="site-tagline">
								<?php echo esc_html( $site_tagline ); ?>
							</p>
						<?php endif; ?>

					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if ( $has_header_ads ) : ?>
				<div class="col-lg-6">
					<div class="header-ads">
						<img
							src="<?php echo esc_url( $header_ads_url ); ?>"
							alt="<?php echo esc_attr( $header_ads_alt ); ?>"
							loading="lazy"
						>
					</div>
				</div>
			<?php endif; ?>

		</div><!-- .row -->
	</div><!-- .container -->
</div>
<!--==========================================
===== Header Site Branding Area End Here =====
===========================================-->

<!--===================================
===== Header Menu Area Start Here =====
====================================-->
<div class="header-menu-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'header-menu',
							'container'       => 'nav',
							'container_id'    => 'site-navigation',
							'container_class' => 'header-menu-container',
							'menu'            => 'ul',
							'menu_class'      => 'header-menu',
							'fallback_cb'     => 'RB_Blog_One_Header_Menu_Walker::fallback',
							'walker'          => new RB_Blog_One_Header_Menu_Walker(),
						)
					);
					?>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->
</div>

<div class="mobile-menu"></div>
<!--=================================
===== Header Menu Area End Here =====
===================================-->
