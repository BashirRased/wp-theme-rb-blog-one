<?php
/**
 * The template for the sidebar contain the header google ads
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.5
 */

?>
<div class="col-lg-6">
    <div class="rb-blog-one-header-body-right">
        <?php if(is_active_sidebar('rb-blog-one-header-sidebar')) : dynamic_sidebar('rb-blog-one-header-sidebar');
        else :  ?><p class="rb-blog-one-google-ads"><?php echo esc_html__('Add Advertisement','rb-blog-one'); ?></p><?php endif; ?>
    </div>
</div>
