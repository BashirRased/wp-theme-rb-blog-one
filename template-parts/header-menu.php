<?php
/**
 * Used for header menu.
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.1.3
 */
?>

<!--===========================================
===== Header Desktop Menu Area Start Here =====
============================================-->
<div class="rb-blog-one-header-menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!--===== Header Mobile Menu Area Start Here =====-->
                <div class="rb-blog-one-mobile-menu-area">
                    <button class="rb-blog-one-mobile-menu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>                
                <!--===== Header Mobile Menu Area End Here =====-->

                <nav id="site-navigation" class="rb-blog-one-header-desktop-menu">
                    <?php
                    if (has_nav_menu('header_menu')) {
                        wp_nav_menu(array(
                            'theme_location'  => 'header_menu'
                        ));
                    }
                    ?>
                </nav>

            </div>
        </div><!-- row end -->
    </div><!-- container end -->
</div>
<!--=========================================
===== Header Desktop Menu Area End Here =====
==========================================-->