<?php
/**
 * The default template for displaying checkout content
 *
 * Used for single.
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

                <!--===== Blog Area Start Here =====-->
                <div class="rb-blog-one-blog-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php 
                                if(have_posts()) : 
                                while(have_posts()) : the_post(); ?>

                                <!--===== Single Blog Area Start Here =====-->
                                <article id="post-<?php the_ID(); ?>" <?php post_class("rb-blog-one-single-blog"); ?>>
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="rb-blog-one-checkout-content">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>

                                        </div><!-- row end -->
                                    </div><!-- container end -->
                                </article>
                                <!--===== Single Blog Area End Here =====-->

                                <?php	endwhile;
                                    else:
                                    echo esc_html__('No Posts Found','rb-blog-one');
                                endif;
                            ?>
                            </div>
                        </div><!-- row end -->
                    </div><!-- container end -->
                </div>
                <!--===== Blog Area End Here =====-->

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
