<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rb_blog_one
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

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
    $preloader = "";
    if ( function_exists('get_field') && get_field('rbth_preloader_acf') ) {
        $preloader = get_field( 'rbth_preloader_acf' );
    }
    if ( $preloader == 'on' ) {
        get_template_part( 'template-parts/header/preloader' );
    } else {
        if ( true == get_theme_mod ( 'rbth_preloader' ) ) {
            get_template_part( 'template-parts/header/preloader' );
        }
    }
?>

<!--==============================
===== Header Area Start Here =====
===============================-->
<header class="site-header">
    <?php
        // Header Top Template
        $header_top = "";
        if ( function_exists('get_field') && get_field('rbth_header_top_acf') ) {
            $header_top = get_field( 'rbth_header_top_acf' );
        }        
        if ( $header_top == 'on' ) {
            get_template_part( 'template-parts/header/header-top' );
        } else {
            if ( true == get_theme_mod ( 'rbth_header_top_switch' ) ) {
                get_template_part( 'template-parts/header/header-top' );
            }
        }

        // Header Site Branding Template
        get_template_part( 'template-parts/header/site-branding' );

        // Header Menu Template
        get_template_part( 'template-parts/header/header-menu' );

        // Breadcrumbs Template
        $breadcrumb = "";
        if ( function_exists('get_field') && get_field('rbth_breadcrumb_acf') ) {
            $breadcrumb = get_field( 'rbth_breadcrumb_acf' );
        }
        if ( $breadcrumb == 'on' ) {
            get_template_part( 'template-parts/header/breadcrumbs' );
        } else {
            if ( true == get_theme_mod ( 'rbth_breadcrumb_switch' ) ) {
                get_template_part( 'template-parts/header/breadcrumbs' );
            }
        }
    ?>        
</header>
<!--============================
===== Header Area End Here =====
=============================-->