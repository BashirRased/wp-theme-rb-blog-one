<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.9
 */
?>

<!--===== Blog Area Start Here =====-->
 <div class="rb-blog-one-blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

            <?php if(have_posts()) : while(have_posts()) : the_post(); ?> 
                <!--===== Single Blog Area Start Here =====-->
                <article id="post-<?php the_ID(); ?>" <?php post_class("rb-blog-one-single-blog"); ?>>
                <div class="row">

                    <!--===== Single Blog Post Thumbnail Area Start Here =====-->
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="col-lg-5">
                        <div class="rb-blog-one-post-img">
                            <?php the_post_thumbnail(''); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!--===== Single Blog Post Thumbnail Area End Here =====-->

                    <!--===== Single Blog Post Content Area Start Here =====-->
                    <?php if (has_post_thumbnail()) :                           $rb_blog_one_content = "col-lg-7";
                        else : 
                    $rb_blog_one_content = "col-lg-12";
                    endif; ?>
                    <div class="<?php echo wp_kses_post($rb_blog_one_content); ?>">

                        <?php get_template_part('template-parts/post-meta'); ?>

                        <div class="rb-blog-one-post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <div class="rb-blog-one-post-read-btn">
                            <a href="<?php the_permalink();?>">
                                <?php echo esc_html__('read more','rb-blog-one');?>
                            </a>
                        </div>

                    </div>
                    <!--===== Single Blog Post Content Area End Here =====-->

                </div><!-- row end -->
                </article>
                <!--===== Single Blog Area End Here =====-->

            <?php endwhile;
            else: echo esc_html__('No Posts Found','rb-blog-one');
            endif; ?>

            </div>
        </div><!-- row end -->
    </div><!-- container end -->
</div>
<!--===== Blog Area End Here =====-->

<?php get_template_part('template-parts/pagination'); ?>
