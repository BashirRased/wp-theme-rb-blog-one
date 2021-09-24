<?php
/**
 * The default template for displaying content
 *
 * Used for index.
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.8
 */
?>

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

                                            <div class="col-lg-5">
                                                <div class="rb-blog-one-post-img">
                                                    <?php if (has_post_thumbnail()) :
                                                    the_post_thumbnail('');
                                                    else : ?>
                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/no_image.jpg" alt="<?php the_title_attribute(); ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-7">
                                                <?php 	
                                                if (has_category()) : ?>
                                                <div class="rb-blog-one-post-cat">
                                                    <i class="fas fa-folder-open"></i>
                                                    <?php the_category(', '); ?>
                                                </div>
                                                <?php endif; ?>
                                                <h2 class="rb-blog-one-post-title">
                                                    <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(''); ?>
                                                    </a>
                                                </h2>
                                                <div class="rb-blog-one-post-meta">
                                                    <div class="rb-blog-one-post-author">
                                                        <i class="fas fa-user"></i>
                                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                                                    </div>
                                                    <div class="rb-blog-one-post-date">
                                                        <i class="fas fa-clock"></i>
                                                        <?php 
                                                            $rb_blog_one_archive_year  = get_the_time('Y'); 
                                                            $rb_blog_one_archive_month = get_the_time('m'); 
                                                            $rb_blog_one_archive_day   = get_the_time('d'); 
                                                        ?>
                                                        <?php the_date("j F Y","<a href='".esc_url( get_day_link( $rb_blog_one_archive_year, $rb_blog_one_archive_month, $rb_blog_one_archive_day) )."'>","</a>",true); ?>
                                                    </div>
                                                    <div class="rb-blog-one-post-comments">
                                                        <i class="fas fa-comments"></i>
                                                        <?php comments_popup_link(0, 1, '%', '', 'Comments Off'); ?>
                                                    </div>
                                                    <div class="rb-blog-one-post-edit">
                                                        <i class="fas fa-edit"></i>
                                                        <?php edit_post_link(__('Edit','rb-blog-one')); ?>
                                                    </div>
                                                </div>
                                                <div class="rb-blog-one-post-excerpt">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                                <div class="rb-blog-one-post-read-btn">
                                                    <a href="<?php the_permalink();?>"><?php echo esc_html__('read more','rb-blog-one');?></a>
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
                <div class="rb-blog-one-pagination-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="rb-blog-one-pagination">
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
