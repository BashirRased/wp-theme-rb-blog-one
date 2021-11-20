<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.1.2
 */

?>

<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    
    <?php wp_head();?>
</head>

<body <?php body_class();?> id="rb-blog-one-body">
    <?php wp_body_open(); ?>

    <?php get_template_part('template-parts/preloader'); ?>

    <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html ( 'Skip to content', 'rb-blog-one' ); ?></a>

    <?php get_template_part('template-parts/header-top'); ?>

    <!--===================================
    ===== Header Body Area Start Here =====
    ====================================-->
    <div class="rb-blog-one-header-body">
        <div class="container">
            <div class="row">

                <!--===== Header Body Left Area Start Here =====-->
                <div class="col-lg-12">
                    <div class="rb-blog-one-header-body-left text-center">
                        <?php
                            if (has_custom_logo()) : ?>
                        <div class="rb-blog-one-header-logo"><?php the_custom_logo(); ?></div>
                        <?php endif; ?>
                        <div class="rb-blog-one-header-title">
                            <h1>
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                            <p>
                                <?php bloginfo('description'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!--===== Header Body Left Area End Here =====-->

            </div><!-- row end -->
        </div><!-- container end -->
    </div>
    <!--=================================
    ===== Header Body Area End Here =====
    ==================================-->

    <?php
        get_template_part('template-parts/header-mobile-menu');
        get_template_part('template-parts/header-menu');
        get_template_part('template-parts/breadcrumbs');
    ?>
    
    <!--====================================
    ===== Website Body Area Start Here =====
    =====================================-->
    <div class="rb-blog-one-website-body">
        <div class="container">
            <div class="row">

                <!--===== Website Body Left Area Start Here =====-->
                <?php if (is_active_sidebar('rb-blog-one-right-sidebar')):
                    $rb_blog_one_site = "col-lg-8";
                else : 
                    $rb_blog_one_site = "col-lg-12";
                endif; ?>
                
                <div class="<?php echo wp_kses_post($rb_blog_one_site); ?>">       