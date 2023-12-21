<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rb_blog_one
 */

$post_meta_list_blog = "";
$post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_single' );

$quote_text = "";
$quote_text = get_field( 'rbth_post_quote_text' );

$quote_author = "";
$quote_author = get_field( 'rbth_post_quote_author' );

$quote_author_url = "";
$quote_author_url = get_field( 'rbth_post_quote_author_url' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-item' ); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="entry-feature">
                        <?php do_action ( 'rb_blog_one_post_thumbnail' ); ?>
                    </div>
                <?php endif; ?>

                <header class="entry-header">

                    <?php if ( true == get_theme_mod( 'rbth_post_meta_single_top' ) ) : ?>
                    <div class="entry-meta-top">
                        <?php do_action ( 'rb_blog_one_cat_meta' ); ?>
                    </div>
                    <?php endif; ?>

                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <?php
                        if ( true == get_theme_mod( 'rbth_post_meta_single' ) ) :
                    ?>                    
                    <div class="entry-meta">
                    <?php
                        foreach ( $post_meta_list_blog as $post_meta_item_blog ) {
                            if( $post_meta_item_blog == "author-meta" ) {
                                do_action ( 'rb_blog_one_author_meta' );
                            }
                            if( $post_meta_item_blog == "date-meta" ) {
                                do_action ( 'rb_blog_one_date_meta' );
                            }
                            if( $post_meta_item_blog == "comments-meta" ) {
                                do_action ( 'rb_blog_one_comments_meta' );
                            }
                            if( $post_meta_item_blog == "edit-meta" && is_user_logged_in() && current_user_can( 'edit_posts' ) ) {
                                do_action ( 'rb_blog_one_edit_meta' );
                            }
                        }
                    ?>
                    </div>
                    <?php else : ?>
                    <div class="entry-meta">
                        <?php
                            do_action ( 'rb_blog_one_author_meta' );
                            do_action ( 'rb_blog_one_date_meta' );
                            do_action ( 'rb_blog_one_comments_meta' );
                            do_action ( 'rb_blog_one_edit_meta' );
                        ?>
                    </div>
                    <?php endif; ?>
                </header>

                <?php if ( get_the_content() ) : ?>
                    <div class="entry-content">
                    <?php if( !empty( $quote_text ) ): ?>
                        <blockquote>
                            <p><?php echo esc_html($quote_text, 'rb-blog-one'); ?></p>
                            <a class="quote-author" href="<?php echo esc_url($quote_author_url); ?>"><?php echo esc_html($quote_author, 'rb-blog-one'); ?></a>
                        </blockquote>
                    <?php the_content(); else :
                        the_content();
                    endif;                  
                    ?>
                    </div>
                <?php endif; ?>

                <?php do_action( 'rb_blog_one_single_post_pagination' ); ?>

            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</article>