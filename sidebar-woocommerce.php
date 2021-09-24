<?php
/**
 * The template for the sidebar containing the woocommerce widget area
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.5
 */

?>

<!--===== Website Body Right Area Start Here =====-->
<div class="col-lg-4">
    <div class="rb-blog-one-sidebar-area">
        <?php if(is_active_sidebar('rb-blog-one-right-sidebar')) : dynamic_sidebar('rb-blog-one-woocommerce-sidebar');
        else :  ?>
        <div class="rb-blog-one-single-widget">
            <div class="rb-blog-one-widget-title">
                <h4><?php echo esc_html__('about me','rb-blog-one'); ?></h4>
            </div>
            <div class="rb-blog-one-widget-content">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/Bashir-Rased-01-Thumbnail.jpg" alt="">
                <p><?php echo esc_html__('Hi! There, Welcome to my personal blog
                    Website. I’m Bashir Rased. I’m a full-time
                    freelancer. You can hire me for your next
                    project.','rb-blog-one'); ?></p>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<!--===== Website Body Right Area End Here =====-->
