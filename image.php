<?php
/**
 * The template for displaying image attachment.
 *
 * @package rb_blog_one
 */

get_header();

$sidebar_acf = "";
$sidebar = "";
$main_col = "";
$sidebar_display = "";
$sidebar_acf = get_field( 'rbth_choose_sidebar' );
$sidebar = get_theme_mod( 'rbth_sidebar_blog' );
if( $sidebar == "left-sidebar" ) {
    $main_col = "col-lg-8";
    $sidebar_display = "left";
}
elseif( $sidebar == "right-sidebar" ) {
    $main_col = "col-lg-8";
    $sidebar_display = "right";
}
else {
    $main_col = "col-lg-12";
}
?>

<!--====================================
===== Site Content Area Start Here =====
=====================================-->
<div id="content" class="site-content">        
    <div class="container">
        <div class="row">

            <?php
            if ( $sidebar_display == 'left' ) {
                get_sidebar();
            }
            ?>

            <div class="<?php echo esc_attr( $main_col ); ?>">
                <div class="content-area">

                    <main id="primary" class="site-main">
                        <article class="single-post-item">
                            <div class="container">
                                <div class="row">
                                    <figure class="wp-block-image">
                                    <?php echo wp_get_attachment_image( get_the_ID(), '' );
                                        if ( wp_get_attachment_caption() ) : ?>
                                            <figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption() ); ?></figcaption>
                                        <?php endif; ?>
                                    </figure><!-- .wp-block-image -->

                                    <header class="entry-header">
                                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                    </header>
                                </div><!-- .row -->
                            </div><!-- .container -->
                        </article>
                        
                    </main><!-- .site-main -->

                </div><!-- .content-area -->
            </div>

            <?php
            if ( $sidebar_display == 'right' ) {
                get_sidebar();
            }

get_footer();