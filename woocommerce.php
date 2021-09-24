<?php
/**
 * The default template for displaying content
 *
 * Used for index.
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.5
 */

get_header();?>

<!--====================================
===== Website Body Area Start Here =====
=====================================-->
<div class="rb-blog-one-website-body">
    <div class="container">
        <div class="row">

            <!--===== Website Body Left Area Start Here =====-->
            <div class="col-lg-8">

                <!--===== Product Area Start Here =====-->
                <div class="rb-blog-one-shop-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php woocommerce_content(); ?>
                            </div>
                        </div><!-- row end -->
                    </div><!-- container end -->
                </div>
                <!--===== Product Area End Here =====-->

            </div>
            <!--===== Website Body Left Area End Here =====-->

            <?php get_sidebar('woocommerce'); ?>

        </div><!-- row end -->
    </div><!-- container end -->
</div>
<!--==================================
===== Website Body Area End Here =====
===================================-->

<?php get_footer(); ?>
