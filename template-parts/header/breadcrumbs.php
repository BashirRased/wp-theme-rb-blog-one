<?php
/**
 * The breadcrumbs template file loaded under header.php
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.7
 * @since RB Blog One 1.1.7
 */
?>

<!--===================================
===== Breadcrumbs Area Start Here =====
====================================-->
<div class='breadcrumbs-area' style='background-image:url(<?php header_image(); ?>);'>
    <div class='container'>
        <div class='row'>

            <div class='col-lg-6'>
                <div class="breadcrumbs-left-area">
                    <?php
                        do_action( "rb_blog_one_breadcrumbs_title" ); do_action( "rb_blog_one_archive_description" );
                    ?>
                </div>                
            </div>

            <div class='col-lg-6'>
                <div class="breadcrumbs-right-area">
                    <?php do_action( "rb_blog_one_breadcrumbs_nav" ); ?>
                </div>                
            </div>

        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!--=================================
===== Breadcrumbs Area End Here =====
==================================-->