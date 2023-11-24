<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.7
 * @since RB Blog One 1.1.7
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#page-content">
        <?php esc_html_e( 'Skip to content', 'rb-blog-one' ); ?>
    </a>

<?php
    // Preloader Template
    if ( function_exists( 'rbth_preloader_custom' ) ) {
        do_action( "rbth_preloader" );
    } else {
        get_template_part( 'template-parts/header/preloader' );
    }
?>

<!--==============================
===== Header Area Start Here =====
===============================-->
<header class="site-header">
    <?php
        // Header Top Template
        if ( function_exists( 'rbth_header_top_custom' ) ) {
            do_action( "rbth_header_top" );
        } else {
            get_template_part( 'template-parts/header/header-top' );
        }
        
        // Header Site Branding Template
        if ( function_exists( 'rbth_site_braning_custom' ) ) {
            do_action( "rbth_site_braning" );
        } else {
            get_template_part( 'template-parts/header/site-branding' );
        }

        // Header Menu Template
        get_template_part( 'template-parts/header/header-menu' );

        // Breadcrumbs Template
        if ( function_exists( 'rbth_breadcrumbs_custom' ) ) {
            do_action( "rbth_breadcrumbs" );
        } else {
            get_template_part( 'template-parts/header/breadcrumbs' );
        }
    ?>        
</header>
<!--============================
===== Header Area End Here =====
=============================-->