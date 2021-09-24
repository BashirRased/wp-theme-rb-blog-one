<?php
/**
 * The template file for displaying the comments and comment form for the
 * RB Blog One theme.
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog 1.0.4
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
    
if ( post_password_required() ) :
	return;
endif;

if ( comments_open() || pings_open() ) : ?>

<div class="rb-comment-area">
    <div class="container">
        <div class="row">
            <div class="container">

                <!--===== Comment Count Area Start Here =====-->
                <div class="rb-comment-count">
                    <h3>
                        <?php comments_number ('No Comments','1 Comment','% Comments');?>
                    </h3>
                </div>
                <!--===== Comment Count Area End Here =====-->

                <!--===== Comment List Area Start Here =====-->
                <div class="rb-comment-list">
                    <?php wp_list_comments('callback=rb_comment_list'); ?>
                </div>
                <!--===== Comment List Area End Here =====-->

                <?php if(get_comment_pages_count()>1 && get_option('page_comments')): ?>
                <!--===== Comment Pagination Area Start Here =====-->
                <div class="rb-comment-pagination">
                    <?php paginate_comments_links(array(
                        'mid_size'  => 1,                    
                        'prev_text'=> __('<i class="fas fa-chevron-left"></i>','rb-blog-one'),
                        'next_text'=> __('<i class="fas fa-chevron-right"></i>','rb-blog-one')
                    )); ?>
                </div>
                <!--===== Comment Pagination Area End Here =====-->
                <?php endif; ?>

                <!--===== Comment Form Area Start Here =====-->
                <div class="rb-comment-form">
                    <?php
                // If comments are closed and there are comments, let's leave a little note, shall we?
                if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
                    <p class="rb-comment-off"><?php echo esc_html('Comments are closed.', 'rb-blog-one' ); ?></p>
                    <?php endif; ?>
                    <?php
                    comment_form(array(
                        'label_submit' => __('comment','rb-blog-one'),
                        'title_reply' => __('Write a comment','rb-blog-one'),
                        'fields' => array(
                                'author' => '<input class="rb-comment-box" placeholder="Name*"></input>',
                                'email' => '<input class="rb-comment-box" placeholder="E-mail*"></input>',
                                'url' => '<input class="rb-comment-box" placeholder="Website"></input>',
                            ),
                        'comment_field' => '<textarea class="rb-comment-box" placeholder="Write your comment here..." rows="5"></textarea>',
                        ));
                    ?>
                </div>
                <!--===== Comment Form Area End Here =====-->

            </div>
        </div><!-- row end -->
    </div><!-- container end -->
</div>

<?php endif; ?>
