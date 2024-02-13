<?php
/**
 * The main template file
 *
 * @package rb_blog_one
 */
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
                    <div class="post-list">
                    <?php
                        if ( have_posts() ) {
                            // Load posts loop.
                            while ( have_posts() ) {
                                the_post();
                                get_template_part( 'template-parts/excerpt/excerpt', get_post_format() );
                            }
                        } else {        
                            // If no content, include the "No posts found" template.
                            get_template_part( 'template-parts/content/content', 'none' );
                        }
                    ?>
                    </div>
                    <?php
                    // Post Pagination
                    do_action( 'rb_blog_one_pagination' );
                    ?>
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

<?php get_footer();