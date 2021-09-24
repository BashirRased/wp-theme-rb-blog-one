<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.8
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
    
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rb-blog-one' ); ?></a>

    <!--=================================
    ===== Preloader Area Start Here =====
    ==================================-->
    <div id="rb-blog-one-preloader">
        <div class="rb-blog-one-folding-cube">
            <div class="rb-blog-one-cube1 rb-blog-one-cube"></div>
            <div class="rb-blog-one-cube2 rb-blog-one-cube"></div>
            <div class="rb-blog-one-cube4 rb-blog-one-cube"></div>
            <div class="rb-blog-one-cube3 rb-blog-one-cube"></div>
        </div>
    </div>
    <!--===============================
    ===== Preloader Area End Here =====
    ================================-->

    <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html ( 'Skip to content', 'rb-blog-one' ); ?></a>

    <!--==================================
    ===== Header Top Area Start Here =====
    ===================================-->
    <div class="rb-blog-one-header-top">
        <div class="container">
            <div class="row">

                <!--===== Header Top Left Area Start Here =====-->
                <div class="col-lg-6">
                    <div class="rb-blog-one-header-top-left">
                        <span class="fas fa-calendar-alt"></span>
                        <span>
                            <?php
                                echo date_i18n(
                                    /* translators: today date, see https://www.php.net/date */
                                    _x( 'l, d F, Y', 'today', 'rb-blog-one' )
                                );
                            ?>
                       </span>
                    </div>
                </div>
                <!--===== Header Top Left Area End Here =====-->

                <!--===== Header Top Right Area Start Here =====-->
                <div class="col-lg-6">
                    <nav class="rb-blog-one-header-top-right float-right">
                        <?php
                    if (has_nav_menu('social_icons_menu')) :
                        wp_nav_menu(array(
                            'theme_location'  => 'social_icons_menu'
                        ));
                    elseif (!has_nav_menu('social_icons_menu') && is_user_logged_in()) : ?>
                        <ul>
                            <li class="rb-blog-one-logged-social-menu"><a href="<?php echo esc_url(admin_url('/nav-menus.php')); ?>"><?php echo esc_html__('add social icons menu','rb-blog-one') ?></a></li>
                        </ul>
                        <?php else : ?>
                        <ul>
                            <li>
                                <a href="<?php echo esc_url_raw('https://www.facebook.com/bashir.rased/'); ?>" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                        </ul>
                        <?php endif;
                    ?>
                    </nav>
                </div>
                <!--===== Header Top Right Area End Here =====-->

            </div><!-- row end -->
        </div><!-- container end -->
    </div>
    <!--================================
    ===== Header Top Area End Here =====
    =================================-->

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

    <!--==========================================
    ===== Header Mobile Menu Area Start Here =====
    ===========================================-->
    <div class="rb-blog-one-mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!--===== Header Mobile Menu Area Start Here =====-->
                    <div class="rb-blog-one-mobile-menu"><i class="fas fa-bars"></i></div>
                    <!--===== Header Mobile Menu Area End Here =====-->

                </div>
            </div><!-- row end -->
        </div><!-- container end -->
    </div>
    <!--========================================
    ===== Header Mobile Menu Area End Here =====
    =========================================-->

    <!--===========================================
    ===== Header Desktop Menu Area Start Here =====
    ============================================-->
    <div class="rb-blog-one-header-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="rb-blog-one-header-desktop-menu">
                        <?php
                    if (has_nav_menu('header_menu')) :
                        wp_nav_menu(array(
                            'theme_location'  => 'header_menu'
                        ));
                    elseif (!has_nav_menu('header_menu') && is_user_logged_in()) : ?>
                        <ul>
                            <li class="rb-blog-one-logged-header-menu"><a href="<?php echo esc_url(admin_url('/nav-menus.php')); ?>"><?php echo esc_html__('add header menu','rb-blog-one') ?></a></li>
                        </ul>
                        <?php else : ?>
                        <ul>
                            <li class="rb-blog-one-unset-header-menu">
                                <a href="<?php echo esc_url(home_url('/'));?>"><?php echo esc_html__('home','rb-blog-one') ?></a>
                            </li>
                        </ul>
                        <?php endif;
                    ?>
                    </nav>
                </div>
            </div><!-- row end -->
        </div><!-- container end -->
    </div>
    <!--=========================================
    ===== Header Desktop Menu Area End Here =====
    ==========================================-->

    <!--===================================
    ===== Breadcrumbs Area Start Here =====
    ====================================-->
    <div class="rb-blog-one-breadcrumbs">
        <div class="container">
            <div class="row">

                <!--===== Breadcrumbs Left Area Start Here =====-->
                <div class="col-lg-6">
                    <div class="rb-blog-one-breadcrumbs-left">

                        <?php if (is_front_page() && is_home()): ?>
                        <h2><?php echo esc_html__('home page','rb-blog-one');?></h2>
                        
                        <?php elseif (is_singular()): ?>
                        <h2><?php echo esc_html__('single page','rb-blog-one');?></h2>

                        <?php elseif (is_404()): ?>
                        <h2><?php echo esc_html__('error page','rb-blog-one');?></h2>

                        <?php elseif (is_search()): ?>
                        <h2><?php echo esc_html__('search page','rb-blog-one');?></h2>

                        <?php elseif (is_category()): ?>
                        <h2><?php echo esc_html__('category page','rb-blog-one');?></h2>

                        <?php elseif (is_tag()): ?>
                        <h2><?php echo esc_html__('tag page','rb-blog-one');?></h2>

                        <?php elseif (is_author()): ?>
                        <h2><?php echo esc_html__('author page','rb-blog-one');?></h2>

                        <?php elseif (is_year()): ?>
                        <h2><?php echo esc_html__('year page','rb-blog-one');?></h2>

                        <?php elseif (is_month()): ?>
                        <h2><?php echo esc_html__('month page','rb-blog-one');?></h2>

                        <?php elseif (is_day()): ?>
                        <h2><?php echo esc_html__('day page','rb-blog-one');?></h2>

                        <?php endif ; ?>
                    </div>
                </div>
                <!--===== Breadcrumbs Left Area End Here =====-->

                <!--===== Breadcrumbs Right Area Start Here =====-->
                <div class="col-lg-6">
                    <div class="rb-blog-one-breadcrumbs-right float-right">
                        <ul>
                           
                            <li>
                                <a href="<?php echo esc_url(home_url('/'));?>"><?php echo esc_html__('Home','rb-blog-one');?></a>
                            </li>

                            <?php if (is_singular()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <?php the_title("<li>","</li>",true); ?>

                            <?php elseif (is_404()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <li><?php echo esc_html__('404','rb-blog-one');?></li>

                            <?php elseif (is_search()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <li><?php the_search_query(); ?></li>

                            <?php elseif (is_category()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <li><?php single_cat_title(); ?></li>

                            <?php elseif (is_tag()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <li><?php single_tag_title(); ?></li>

                            <?php elseif (is_author()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <li><?php the_author(); ?></li>

                            <?php elseif (is_year()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <?php the_date("Y","<li>","</li>",true); ?>

                            <?php elseif (is_month()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <?php the_date("F, Y","<li>","</li>",true); ?>

                            <?php elseif (is_day()): ?>
                            <li><i class="fas fa-long-arrow-alt-right"></i></li>
                            <?php the_date("l, jS F, Y","<li>","</li>",true); ?>

                            <?php endif ; ?>
                        </ul>
                    </div>
                </div>
                <!--===== Breadcrumbs Right Area End Here =====-->

            </div><!-- row end -->
        </div><!-- container end -->
    </div>
    <!--=================================
    ===== Breadcrumbs Area End Here =====
    ==================================-->
