<?php
/**
 * Used for breadcrumbs.
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.1.0
 */
?>

<!--===================================
===== Breadcrumbs Area Start Here =====
====================================-->
<div class="rb-blog-one-breadcrumbs" style="background-image: url(<?php header_image(); ?>);">
    <div class="container">
        <div class="row">

            <!--===== Breadcrumbs Left Area Start Here =====-->
            <div class="col-lg-6">
                <div class="rb-blog-one-breadcrumbs-left">

                    <?php if (is_front_page() && is_home()): ?>
                    <h2><?php echo esc_html__('home page','rb-blog-one');?></h2>

                    <?php elseif (is_single()): ?>
                    <h2><?php echo esc_html__('single post','rb-blog-one');?></h2>

                    <?php elseif (is_page()): ?>
                    <h2><?php echo esc_html__('single page','rb-blog-one');?></h2>

                    <?php elseif (is_attachment()): ?>
                    <h2><?php echo esc_html__('attachment post','rb-blog-one');?></h2>

                    <?php elseif (is_singular()): ?>
                    <h2><?php echo esc_html__('singular page','rb-blog-one');?></h2>

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
                        <li><?php echo get_the_date("Y"); ?></li>

                        <?php elseif (is_month()): ?>
                        <li><i class="fas fa-long-arrow-alt-right"></i></li>
                        <li><?php echo get_the_date("F, Y"); ?></li>

                        <?php elseif (is_day()): ?>
                        <li><i class="fas fa-long-arrow-alt-right"></i></li>
                        <li><?php echo get_the_date("l, jS F, Y"); ?></li>

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