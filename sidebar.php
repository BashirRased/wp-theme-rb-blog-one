<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog 1.0.4
 */

?>

<!--===== Website Body Right Area Start Here =====-->
<div class="col-lg-4">
    <div class="rb-sidebar-area">
        <?php if(is_active_sidebar('rb-right-sidebar')) : dynamic_sidebar('rb-right-sidebar');
        else :  ?>
        <div class="rb-single-widget">
            <div class="rb-widget-title">
                <h4>about me</h4>
            </div>
            <div class="rb-widget-content">
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
