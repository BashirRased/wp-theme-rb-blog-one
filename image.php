<?php
get_header();

// Site Column & Sitebar Display
$sidebar_display = "";
$sidebar = get_theme_mod( 'rbth_sidebar_blog' );
if( $sidebar == "left-sidebar" ) {
    $post_area_col = "col-lg-8";
    $sidebar_display = "left";
}
elseif( $sidebar == "right-sidebar" ) {
    $post_area_col = "col-lg-8";
    $sidebar_display = "right";
}
else {
    $post_area_col = "col-lg-12";
}
?>

<!--====================================
===== Site Content Area Start Here =====
=====================================-->
<main class="site-content">
    <div id="page-content">
        <div class="container">
            <div class="row">                

                <?php
                if ( $sidebar_display == 'left' ) {
                    get_sidebar();
                }
                ?>

                <div id="primary" class="<?php echo esc_attr( $post_area_col ); ?>">

                <figure class="wp-block-image">
                <?php echo wp_get_attachment_image( get_the_ID(), '' );
                    if ( wp_get_attachment_caption() ) : ?>
                        <figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption() ); ?></figcaption>
                    <?php endif; ?>
                </figure><!-- .wp-block-image -->

                </div>

                <?php
                if ( $sidebar_display == 'right' ) {
                    get_sidebar();
                }
                ?>

            </div><!-- .row -->
        </div><!-- .container -->
    </div>
</main>
<!--==================================
===== Site Content Area End Here =====
===================================-->

<?php
get_footer();