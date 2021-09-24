<?php
/**
 * The default template for displaying content
 *
 * Used for index.
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog 1.0.4
 */

?>

<!--====================================
===== Website Body Area Start Here =====
=====================================-->
<div class="rb-website-body">
    <div class="container">
        <div class="row">

            <!--===== Website Body Left Area Start Here =====-->
            <div class="col-lg-8">

                <!--===== Blog Area Start Here =====-->
                <div class="rb-blog-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php 
                            if(have_posts()) : 
                                while(have_posts()) : the_post(); ?>

                                <!--===== Single Blog Area Start Here =====-->
                                <article id="post-<?php the_ID(); ?>" <?php post_class("rb-single-blog"); ?>>
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-lg-5">
                                                <div class="rb-post-img">
                                                    <?php if (has_post_thumbnail()) :
                                                    the_post_thumbnail('');
                                                    else : ?>
                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/no_image.jpg">
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-7">
                                                <?php 	
                                                if (has_category()) : ?>
                                                <div class="rb-post-cat">
                                                    <i class="fas fa-folder-open"></i>
                                                    <?php the_category(', '); ?>
                                                </div>
                                                <?php endif; ?>
                                                <h2 class="rb-post-title">
                                                    <a href="<?php echo esc_url(the_permalink()); ?>">
                                                    <?php the_title(''); ?>
                                                    </a>
                                                </h2>
                                                <div class="rb-post-meta">
                                                    <div class="rb-post-author">
                                                        <i class="fas fa-user"></i>
                                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                                                    </div>
                                                    <div class="rb-post-date">
                                                        <i class="fas fa-clock"></i>
                                                        <?php 
                                                            $rb_archive_year  = get_the_time('Y'); 
                                                            $rb_archive_month = get_the_time('m'); 
                                                            $rb_archive_day   = get_the_time('d'); 
                                                        ?>
                                                        <a href="<?php echo esc_url( get_day_link( $rb_archive_year, $rb_archive_month, $rb_archive_day) ); ?>"><?php echo esc_html( get_the_date('j F Y') ); ?></a>
                                                    </div>
                                                    <div class="rb-post-comments">
                                                        <i class="fas fa-comments"></i>
                                                        <?php comments_popup_link(0, 1, '%', '', 'Comments Off'); ?>
                                                    </div>
                                                    <div class="rb-post-edit">
                                                        <i class="fas fa-edit"></i>
                                                        <?php edit_post_link(__('Edit','rb-blog-one')); ?>
                                                    </div>
                                                </div>
                                                <div class="rb-post-excerpt">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                                <div class="rb-post-read-btn">
                                                    <a href="<?php esc_url(the_permalink());?>"><?php echo esc_html__('read more','rb-blog-one');?></a>
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

                <!--===== Pagination Area Start Here =====-->
                <div class="rb-pagination-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="rb-pagination">
                                    <?php the_posts_pagination( array(
                                        'mid_size'  => 1,
                                        'prev_text' => __('<i class="fas fa-chevron-left"></i>', 'rb-blog-one'),
                                        'next_text' => __('<i class="fas fa-chevron-right"></i>', 'rb-blog-one'),
                                    ) ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===== Pagination Area End Here =====-->

            </div>
            <!--===== Website Body Left Area End Here =====-->

            <?php get_sidebar(); ?>

        </div><!-- row end -->
    </div><!-- container end -->
</div>
<!--==================================
===== Website Body Area End Here =====
===================================-->
