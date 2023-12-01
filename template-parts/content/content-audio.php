<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rb_blog_one
 */
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

                        // Post Meta List
                        $post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_single' );
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
                    $audio_post = get_field( 'rbth_post_audio_file_format' );
                    $audio_file = get_field( 'rbth_post_audio_file' );
                    $audio_oembed = get_field( 'rbth_post_audio_iframe' );

                    if ( $audio_post == 'file' ) : ?>
                        <audio controls>
                            <source src="<?php echo esc_url($audio_file['url']); ?>">
                        </audio>
                        <?php the_content();
                    elseif ( $audio_post == 'iframe' ) : echo wp_kses_post($audio_oembed); the_content(); ?>
                    <?php else :
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