<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.1.4
 */
?>

</div>
<!--===== Website Body Left Area End Here =====-->
                
<!--===== Right Sidebar Area Start Here =====-->
<?php if (is_active_sidebar('rb-blog-one-right-sidebar')){
    get_sidebar();
} ?>
<!--===== Right Sidebar Area End Here =====-->

        </div><!-- row end -->
    </div><!-- container end -->
</div>
<!--==================================
===== Website Body Area End Here =====
===================================-->
   
<!--==============================
===== Footer Area Start Here =====
===============================-->
<div class="rb-blog-one-footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rb-blog-one-copyright-text">
                    <p>
                        <?php printf(
                        /* translators: 1. %s: Copyright URL, 2. %s: Copyright Text, */
                        esc_html__( '&copy; Copyright 2019-%1$s By %2$s. All Right Reserved.','rb-blog-one'),
                        date('Y'),
                        '<a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo("name").'</a>'
                        ); ?>
                   </p>
                </div>
            </div>
        </div><!-- row end -->
    </div><!-- container end -->
</div>
<!--============================
===== Footer Area End Here =====
=============================-->    

<!--=====================================
===== Scroll To Top Area Start Here =====
======================================-->
<div class="rb-blog-one-scroll-top">
    <a href="#rb-blog-one-body">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!--===================================
===== Scroll To Top Area End Here =====
====================================-->

    </div>

<?php wp_footer();?>
</body>

</html>
