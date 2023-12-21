<?php
/**
 * The template for displaying single posts and pages.
 *
 * @package rb_blog_one
 */

get_header();
$sidebar_acf ="";
$sidebar = "";
$main_col = "";
$sidebar_display = "";

$sidebar_acf = get_field( 'rbth_choose_sidebar' );
$sidebar = get_theme_mod( 'rbth_sidebar_single' );
if ( $sidebar_acf == 'left-sidebar' ) {
    $main_col = "col-lg-8";
    $sidebar_display = "left";
}

elseif ( $sidebar_acf == 'right-sidebar' ) {
    $main_col = "col-lg-8";
    $sidebar_display = "right";
}

elseif ( $sidebar_acf == 'no-sidebar' ) {
    $main_col = "col-lg-12";
}

else {
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
                    <?php
                    if ( have_posts() ) {
                        // Load posts loop.
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( 'template-parts/content/content', get_post_format() );
                        }
                    } else {        
                        // If no content, include the "No posts found" template.
                        get_template_part( 'template-parts/content/content', 'none' );
                    }
                    ?>
                    </main><!-- .site-main -->

                    <?php if( has_tag() ) : ?>
                    <div class="entry-meta-footer">
                        <?php do_action( "rb_blog_one_tag_meta" ); ?>
                    </div>
                    <?php endif; ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>

                </div><!-- .content-area -->
            </div>

            <?php
            if ( $sidebar_display == 'right' ) {
                get_sidebar();
            }
            
get_footer();