<?php
/**
 * The default template for displaying content
 *
 * Used for single.
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

                                            <div class="col-lg-12">
                                                <div class="rb-post-img rb-single-page">
                                                    <?php the_post_thumbnail('');?>
                                                </div>
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
                                                <div class="rb-post-content">
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
                                                <div class="rb-post-tag">
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
