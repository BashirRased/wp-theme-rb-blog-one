<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 * and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'rbth_transparent_header' ) ) {
	rbth_transparent_header();
}

if ( function_exists( 'rbth_sticky_header' ) ) {
	rbth_sticky_header();
}

global $transparent_header;
global $sticky_header;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<?php endif; ?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- Skip Link -->
	<a class="skip-link screen-reader-text" href="#page-content">
		<?php esc_html_e( 'Skip to content', 'rb-blog-one' ); ?>
	</a>

	<?php
	if ( function_exists( 'rbth_preloader' ) ) {
		rbth_preloader();
	}
	?>

<!--==============================
===== Header Area Start Here =====
===============================-->
<header class="site-header <?php echo esc_attr( $sticky_header . ' ' . $transparent_header ); ?>">
	<?php
	get_template_part( 'template-styles/header-styles/header-one' );
	?>
</header>
<!--============================
===== Header Area End Here =====
=============================-->

<?php
if ( function_exists( 'rbth_breadcrumbs' ) ) {
	rbth_breadcrumbs();
}
?>
