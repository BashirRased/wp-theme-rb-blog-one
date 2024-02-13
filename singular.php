<?php
get_header();

$post_area_col = "";
$sidebar_display = "";
$sidebar_acf = "";
$sidebar = "";

if ( function_exists('get_field') && get_field('rbth_choose_sidebar') ) {
    $sidebar_acf = get_field( 'rbth_choose_sidebar' );
}

$sidebar = get_theme_mod( 'rbth_sidebar_single' );
if ( $sidebar_acf == 'left-sidebar' ) {
    $post_area_col = "col-lg-8";
    $sidebar_display = "left";
}

elseif ( $sidebar_acf == 'right-sidebar' ) {
    $post_area_col = "col-lg-8";
    $sidebar_display = "right";
}

elseif ( $sidebar_acf == 'no-sidebar' ) {
    $post_area_col = "col-lg-12";
}

else {
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