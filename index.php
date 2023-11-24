<?php
/**
 * The main template file
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.7
 * @since RB Blog One 1.1.7
 */

get_header();
?>

<!--====================================
===== Site Content Area Start Here =====
=====================================-->
<div id="page-content" class="site-content">        
    <div class="container">
        <div class="row">
            
            <div class="col-lg-8">
                <div class="content-area">

                    <main id="primary" class="site-main">
                    <?php
                        if ( have_posts() ) {
                            // Load posts loop.
                            while ( have_posts() ) {
                                the_post();
                                get_template_part( 'template-parts/content/content' );
                            }                        
                        } else {        
                            // If no content, include the "No posts found" template.
                            get_template_part( 'template-parts/content/content', 'none' );
                        }
                    ?>
                    </main><!-- .site-main -->

                    <?php do_action( "rb_blog_one_pagination" ); ?>
                    
                </div><!-- .content-area -->
            </div>

            <?php get_sidebar();            
get_footer();