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
$link_file = "";
$link_file = get_field( 'rbth_post_link' );
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
                    <?php
                    if( !empty( $link_file ) ):
                        $link_url = $link_file['url'];
                        $link_title = $link_file['title'];
                        $link_target = $link_file['target'] ? $link_file['target'] : '_self';
                    ?>
                        <a class="link-post" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
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