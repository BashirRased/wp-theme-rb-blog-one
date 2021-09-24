<!DOCTYPE HTML>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" >
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

	<!-- Preloader Area Strat Here -->
	<div class="rb-preloader">
	<!--preloader start-->
		<div class="preloader-box" id="preloader">
			<div class="preloader loading">
				<span class="slice"></span>
				<span class="slice"></span>
				<span class="slice"></span>
				<span class="slice"></span>
				<span class="slice"></span>
				<span class="slice"></span>
			</div><!--/.preloader-->
		</div><!--/.preloader-box-->
		<!--preloader end-->	
	</div>
	<!-- Preloader Area End Here -->
	
	<!-- Header Area Strat Here -->
	<header class="rb-header-area">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rb-blog-one' ); ?></a>
		<!-- Header Top Area Strat Here -->
		<div class="rb-header-top-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="rb-header-top-left">
							<?php echo esc_html(date_i18n( __( 'l, j F Y', 'rb-blog-one' ) )); ?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="rb-header-top-right float-right">
							<nav class="rb-header-social-links">
								<ul>
									<li><a href="<?php echo esc_attr(get_theme_mod('rb_facebook_links','https://www.facebook.com/bashir.rased')); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="<?php echo esc_attr(get_theme_mod('rb_twitter_links','https://twitter.com/BashirRased')); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
									<li><a href="<?php echo esc_attr(get_theme_mod('rb_linkedin_links','https://www.linkedin.com/in/bashir-rased-a28306a4/')); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
									<li><a href="<?php echo esc_attr(get_theme_mod('rb_instagram_links','https://www.instagram.com/md.rashedmollik/')); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
									<li><a href="<?php echo esc_attr(get_theme_mod('rb_pinterest_links','https://www.pinterest.com/bashir4907/')); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Top Area End Here -->
		
		<!-- Header Middle Area Strat Here -->
		<div class="rb-header-middle-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<h1 class="rb-blog-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>
						<div class="rb-blog-subtitle"><?php bloginfo('description'); ?></div>
					</div>
					<div class="col-lg-8">
						<div class="rb-header-ads-area">
							<?php dynamic_sidebar('rb_header-sidebar'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Middle Area End Here -->
		
		<!-- Header Menu Area Strat Here -->
		<div class="rb-header-menu-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					
						<div class="rb-mobile-menu">
							<div class="rb-mobile-menu-icon">
								<i class="fas fa-bars"></i>
							</div>
						</div>
						
						<nav class="rb-header-menu">
							<?php 
								wp_nav_menu(array(
									'theme_location'  => 'header-menu',
									'container'       => '',
									'fallback_cb'     => 'rb_default_header_menu'
								));
							 ?>							
						</nav>
						
					</div>
				</div>
			</div>
		</div>
		<!-- Header Menu Area End Here -->
		
	</header>
	<!-- Header Area End Here -->	