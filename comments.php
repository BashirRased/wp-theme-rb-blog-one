<?php
/**
 * The template file for displaying the comments and comment form for the
 * RB Blog One theme.
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.1.1
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
    
if (post_password_required()) :
	return;
endif;

if (comments_open() || pings_open()) : ?>

<div class="rb-blog-one-comment-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!--===== Comment Count Area Start Here =====-->
                <div class="rb-blog-one-comment-count">
                    <h3>
                        <?php
                            $rb_blog_one_comments_number = absint(get_comments_number());
                            if (! have_comments()) :
                                /* translators: %s: Post title. */
                                printf(_x('0 comment on %s','comments title','rb-blog-one'), get_the_title() );
                            elseif (1 === $rb_blog_one_comments_number) :
                                /* translators: %s: Post title. */
                                printf(_x('1 comment on %s','comments title','rb-blog-one'), get_the_title() );
                            else :
                                printf(
                                    /* translators: 1: Number of comments, 2: Post title. */
                                    _nx(
                                        '%1$s comment on %2$s',
                                        '%1$s comments on %2$s',
                                        $rb_blog_one_comments_number,
                                        'comments title',
                                        'rb-blog-one'
                                    ),
                                    number_format_i18n($rb_blog_one_comments_number),
                                    get_the_title()
                                );                        
                            endif;
                        ?>
                    </h3>
                </div>
                <!--===== Comment Count Area End Here =====-->

                <!--===== Comment List Area Start Here =====-->
                <div class="rb-blog-one-comment-list">
                    <?php wp_list_comments('callback=rb_blog_one_comment_list'); ?>
                </div>
                <!--===== Comment List Area End Here =====-->

                <?php if(get_comment_pages_count()>1 && get_option('page_comments')): ?>
                <!--===== Comment Pagination Area Start Here =====-->
                <div class="rb-blog-one-comment-pagination">
                    <?php paginate_comments_links(array(
                        'mid_size'  => 1,                    
                        'prev_text'=> '<i class="fas fa-chevron-left"></i>',
                        'next_text'=> '<i class="fas fa-chevron-right"></i>'
                    )); ?>
                </div>
                <!--===== Comment Pagination Area End Here =====-->
                <?php endif; ?>

                <!--===== Comment Form Area Start Here =====-->
                <div class="rb-blog-one-comment-form">
                    <?php
                // If comments are closed and there are comments, let's leave a little note, shall we?
                if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
                    <p class="rb-blog-one-comment-off"><?php echo esc_html('Comments are closed.', 'rb-blog-one' ); ?></p>
                    <?php endif; ?>
                    <?php
                    comment_form(array(
                        'label_submit' => __('comment','rb-blog-one'),
                        'title_reply' => __('Write a comment','rb-blog-one'),
                        'fields' => apply_filters( 'comment_form_default_fields',array(
                                'author' => sprintf('<input class="rb-blog-one-comment-box" placeholder="%s"></input>',esc_attr("Name*","rb-blog-one")),

                                'email' => sprintf('<input class="rb-blog-one-comment-box" placeholder="%s"></input>',esc_attr("E-mail*","rb-blog-one")),
                                
                                'url' => sprintf('<input class="rb-blog-one-comment-box" placeholder="%s"></input>',esc_attr("Website","rb-blog-one"))
                            )),
                        'comment_field' => sprintf('<textarea class="rb-blog-one-comment-box" placeholder="%s" rows="5"></textarea>',
                        esc_attr("Write your comment here...","rb-blog-one"))
                    ));
                    ?>
                </div>
                <!--===== Comment Form Area End Here =====-->

            </div>
        </div><!-- row end -->
    </div><!-- container end -->
</div>

<?php endif; ?>
