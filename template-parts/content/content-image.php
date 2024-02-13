<?php
$post_meta_list_blog = "";
$post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_single' );
$img_file = "";
if ( function_exists('get_field') && get_field('rbth_post_img') ) {
    $img_file = get_field( 'rbth_post_img' );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single-item' ); ?>>

    <!-- Post Meta Top -->
    <?php if ( true == get_theme_mod( 'rbth_post_meta_blog_top' ) ) : ?>
        <div class="post-meta-top">
            <?php do_action ( 'rb_blog_one_post_meta_top' ); ?>
        </div>
    <?php endif; ?>

    <!-- Post Thumbnail -->
    <?php
        if ( has_post_thumbnail() ) {
            do_action ( 'rb_blog_one_post_thumbnail' );
        }
    ?>

    <!-- Post Title -->
    <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

    <!-- Enable/Disable Post Meta -->
    <?php if ( true == get_theme_mod( 'rbth_post_meta_single' ) ) :

    // Post Meta List
    $post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_single_post' );
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

    <!-- Post Content -->
    <?php if ( get_the_content() ) : ?>
        <div class="post-content">
            <?php if( !empty( $img_file ) ): ?>
                <figure>
                    <img src="<?php echo esc_url($img_file['url']); ?>">
                </figure>
            <?php
            endif;
            the_content();
            ?>
        </div>
    <?php endif; ?>

    <!-- Post Page List -->
    <?php do_action( 'rb_blog_one_single_page_pagination' );
    ?>

</article>

<?php if(has_tag()): ?>
<!-- Post Meta Bottom -->
<div class="post-meta-bottom">
    <?php do_action( 'rb_blog_one_post_meta_bottom' ); ?>
</div>
<?php endif; ?>

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
    comments_template();
}
?>