<?php
/**
 * The default template for displaying content
 *
 * Used for single.
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.6
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

                                            <div class="col-lg-12">
                                                <div class="rb-blog-one-post-img rb-blog-one-single-page">
                                                    <?php the_post_thumbnail('');?>
                                                </div>
                                                <?php 	
                                                if (has_category()) : ?>
                                                <div class="rb-blog-one-post-cat">
                                                    <i class="fas fa-folder-open"></i>
                                                    <?php the_category(', '); ?>
                                                </div>
                                                <?php endif; ?>
                                                <h2 class="rb-blog-one-post-title">
                                                    <?php the_title(''); ?>
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
                                                        <a href="<?php echo esc_url( get_day_link( $rb_blog_one_archive_year, $rb_blog_one_archive_month, $rb_blog_one_archive_day) ); ?>"><?php echo get_the_date('j F Y'); ?></a>
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
                                                <div class="rb-blog-one-post-content">
                                                    <?php the_content(); ?>
                                                    <?php
                                                    wp_link_pages(
                                                        array(
                                                            'before'            => '<div class="rb-next-page">',
                                                            'after'             => '</div>',
                                                            'previouspagelink'  => __('<i class="fas fa-arrow-left"></i> previous page','rb-blog-one'),
                                                            'nextpagelink'      => __('next page <i class="fas fa-arrow-right"></i>','rb-blog-one')
                                                            )
                                                        ); 
                                                    ?>
                                                </div>
                                                <?php 	
                                                if (has_tag()) : ?>
                                                <div class="rb-blog-one-post-tag">
                                                    <i class="fas fa-tags"></i>
                                                    <?php the_tags('',', '); ?>
                                                </div>
                                                <?php endif; ?>
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

                <!--===== Comment Area Start Here =====-->
                <?php if (is_singular(array('post','attachment'))):
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open()||get_comments_number()):comments_template();endif; endif;
                ?>
                <!--===== Comment Area End Here =====-->

            </div>
            <!--===== Website Body Left Area End Here =====-->

            <?php get_sidebar(); ?>

        </div><!-- row end -->
    </div><!-- container end -->
</div>
<!--==================================
===== Website Body Area End Here =====
===================================-->
