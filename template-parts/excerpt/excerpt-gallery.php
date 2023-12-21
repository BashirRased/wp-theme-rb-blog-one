<?php
/**
 * Template part for displaying post items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rb_blog_one
 */

$post_meta_list_blog = "";
$post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_blog' );

$gallery_img_1 = "";
$gallery_img_1 = get_field( 'rbth_post_gallery_img_1' );

$gallery_img_2 = "";
$gallery_img_2 = get_field( 'rbth_post_gallery_img_2' );

$gallery_img_3 = "";
$gallery_img_3 = get_field( 'rbth_post_gallery_img_3' );

$gallery_img_4 = "";
$gallery_img_4 = get_field( 'rbth_post_gallery_img_4' );

$gallery_img_5 = "";
$gallery_img_5 = get_field( 'rbth_post_gallery_img_5' );

if ( $gallery_img_1 || $gallery_img_2 || $gallery_img_3 || $gallery_img_4 || $gallery_img_5 ) {
    $gallery_img = "1";
} else {
    $gallery_img = "0";
}

if ( has_post_thumbnail() && $gallery_img == "0" ) {
    $article_col = "col-lg-7";
}
else {
    $article_col = "col-lg-12";
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-item' ); ?>>
    <div class="container">
        <div class="row">

            <?php if ( has_post_thumbnail() && $gallery_img == "0" ) : ?>
            <div class="col-lg-5">
                <div class="entry-feature">
                    <?php do_action ( 'rb_blog_one_post_thumbnail' ); ?>
                </div>            
            </div>
            <?php endif; ?>

            <div class="<?php echo esc_attr( $article_col ); ?>">

                <header class="entry-header">

                    <?php if ( true == get_theme_mod( 'rbth_post_meta_blog_top' ) ) : ?>
                    <div class="entry-meta-top">
                        <?php do_action ( 'rb_blog_one_cat_meta' ); ?>
                    </div>
                    <?php endif; ?>

                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                    <?php
                        if ( true == get_theme_mod( 'rbth_post_meta_blog' ) ) {
                        if ( $post_meta_list_blog ) {
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
                    <?php } } else { ?>
                    <div class="entry-meta">
                        <?php
                            do_action ( 'rb_blog_one_author_meta' );
                            do_action ( 'rb_blog_one_date_meta' );
                            do_action ( 'rb_blog_one_comments_meta' );
                            do_action ( 'rb_blog_one_edit_meta' );
                        ?>
                    </div>
                    <?php } ?>

                </header>

                <div class="entry-content">
                    <?php if( $gallery_img == "1" ) : ?>
                    <div class="swiper post-img-gallery">
                        <div class="swiper-wrapper">
                            <!-- Gallery Image 01 -->
                            <?php if( !empty ( $gallery_img_1 ) ) : ?>
                                <figure class="swiper-slide">
                                    <img src="<?php echo esc_url($gallery_img_1['url']); ?>" alt="<?php echo esc_attr($gallery_img_1['alt']); ?>" />
                                </figure>
                            <?php endif; ?>

                            <!-- Gallery Image 02 -->
                            <?php if( !empty ( $gallery_img_2 ) ) : ?>
                                <figure class="swiper-slide">
                                    <img src="<?php echo esc_url($gallery_img_2['url']); ?>" alt="<?php echo esc_attr($gallery_img_2['alt']); ?>" />
                                </figure>
                            <?php endif; ?>

                            <!-- Gallery Image 03 -->
                            <?php if( !empty ( $gallery_img_3 ) ) : ?>
                                <figure class="swiper-slide">
                                    <img src="<?php echo esc_url($gallery_img_3['url']); ?>" alt="<?php echo esc_attr($gallery_img_3['alt']); ?>" />
                                </figure>
                            <?php endif; ?>

                            <!-- Gallery Image 04 -->
                            <?php if( !empty ( $gallery_img_4 ) ) : ?>
                                <figure class="swiper-slide">
                                    <img src="<?php echo esc_url($gallery_img_4['url']); ?>" alt="<?php echo esc_attr($gallery_img_4['alt']); ?>" />
                                </figure>
                            <?php endif; ?>   
                            
                            <!-- Gallery Image 05 -->
                            <?php if( !empty ( $gallery_img_5 ) ) : ?>
                                <figure class="swiper-slide">
                                    <img src="<?php echo esc_url($gallery_img_5['url']); ?>" alt="<?php echo esc_attr($gallery_img_5['alt']); ?>" />
                                </figure>
                            <?php endif; ?>
                        </div>                        

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <?php endif; ?>

                    <?php
                        if( $gallery_img == "0" ) {
                            the_excerpt();
                        }
                    ?>
                </div>

            </div>

        </div><!-- .row -->
    </div><!-- .container -->
</article>