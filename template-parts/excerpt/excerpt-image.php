<?php
$post_meta_list_blog = "";
$post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_blog' );

$img_file = "";
if ( function_exists('get_field') && get_field('rbth_post_img') ) {
    $img_file = get_field( 'rbth_post_img' );
}

if ( has_post_thumbnail() && empty( $img_file ) ) {
    $article_col = "col-lg-7";
}
else {
    $article_col = "col-lg-12";
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-list-item' ); ?>>
    <div class="row">

        <!-- Post Thumbnail -->
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="col-lg-5">
            <?php do_action ( 'rb_blog_one_post_thumbnail' ); ?>
        </div>
        <?php endif; ?>

        <div class="<?php echo esc_attr( $post_item_col ); ?>">

            <!-- Post Meta Top -->
            <?php if ( true == get_theme_mod( 'rbth_post_meta_blog_top' ) ) : ?>
                <div class="post-meta-top">
                    <?php do_action ( 'rb_blog_one_post_meta_top' ); ?>
                </div>
            <?php endif; ?>

            <!-- Post Title -->
            <?php the_title( sprintf( '<h2 class="post-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <!-- Enable/Disable Post Meta -->
            <?php if ( true == get_theme_mod( 'rbth_post_meta_blog' ) ) :

                // Post Meta List
                $post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_blog' );
                if ( $post_meta_list_blog ) :
                ?>
                <div class="post-meta">
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
            <?php endif; else: ?>
                <div class="post-meta">
                    <?php
                        do_action ( 'rb_blog_one_author_meta' );
                        do_action ( 'rb_blog_one_date_meta' );
                        do_action ( 'rb_blog_one_comments_meta' );
                        do_action ( 'rb_blog_one_edit_meta' );
                    ?>
                </div>
            <?php endif; ?>

            <!-- Post Excerpt -->
            <div class="post-excerpt">
                <?php if( !empty( $img_file ) ): ?>
                    <figure>
                        <img src="<?php echo esc_url($img_file['url']); ?>">
                    </figure>
                <?php else :
                    the_excerpt();
                endif;
                ?>
            </div>                

        </div>

    </div><!-- .row -->
</article>