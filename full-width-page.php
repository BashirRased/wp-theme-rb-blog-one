<?php
/**
 * Template Name: Full Width Page
 * Template Post Type: post, page
 */

get_header();
?>

<!--====================================
===== Site Content Area Start Here =====
=====================================-->
<main class="site-content">
    <div id="page-content">
        <div class="container">
            <div class="row">

                <div id="primary" class="col-lg-12">
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

            </div><!-- .row -->
        </div><!-- .container -->
    </div>
</main>
<!--==================================
===== Site Content Area End Here =====
===================================-->
            
<?php get_footer();