<?php
/**
 * The default template for displaying content
 *
 * Used for single.
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.1.4
 */
?>

<!--===== Blog Area Start Here =====-->
<div class="rb-blog-one-blog-area" id="content">
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

                                <?php get_template_part('template-parts/post-meta'); ?>

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

                                <?php if (has_tag()): ?>    
                                <div class="rb-blog-one-post-tag">
                                    <?php
                                    /* translators: Used between list items, there is a space after the comma. */
                                    $tags_list = get_the_tag_list('',__( ', ', 'rb-blog-one'));
                                    if ($tags_list) {
                                        printf(
                                            /* translators: %s: List of tags. */
                                            '<div class="rb-blog-one-post-tag"><i class="fas fa-tags"></i>'.esc_html__('  %s', 'rb-blog-one').'</div>',
                                            $tags_list // phpcs:ignore WordPress.Security.EscapeOutput
                                        );
                                    }
                                    ?>
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