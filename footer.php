<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.8
 */
?>
   
    <!--==============================
    ===== Footer Area Start Here =====
    ===============================-->
    <div class="rb-blog-one-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rb-blog-one-copyright-text">
                    <p><?php
					printf(
					/* translators: %s: Copyright Text. */
					esc_html__( '&copy; Copyright %s By %s. All Right Reserved.','rb-blog-one'),
					wp_kses_post(date_i18n("Y")),
					'<a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo("name").'</a>'
					);
					?></p>
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
    <div class="rb-blog-one-scroll-top"><a href="#rb-blog-one-body"><i class="fas fa-chevron-up"></i></a></div>
    <!--===================================
    ===== Scroll To Top Area End Here =====
    ====================================-->

    <?php wp_footer();?>
</body>

</html>
