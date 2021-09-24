<?php
/**
 * The template for displaying the footer
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.7
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
                        <p>&copy;
                        <?php echo esc_html__(' Copyright ','rb-blog-one');?>
                        <?php echo date_i18n(__('Y','rb-blog-one')); ?>
                        <?php echo esc_html__(' By ','rb-blog-one');?>
                        <a href="<?php echo esc_url(home_url('/'));?>">
                            <?php bloginfo('name'); ?>
                        </a>
                        <?php echo esc_html__('. All Right Reserved.','rb-blog-one');?>
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
    <div class="rb-blog-one-scroll-top"><a href="#rb-blog-one-body"><i class="fas fa-chevron-up"></i></a></div>
    <!--===================================
    ===== Scroll To Top Area End Here =====
    ====================================-->

    <?php wp_footer();?>
</body>

</html>
