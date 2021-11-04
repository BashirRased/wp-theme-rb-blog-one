<?php
/**
 * The default template for displaying content
 *
 * Used for 404.
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.3
 */

?>

<!--===== Error Area Start Here =====-->
<div class="rb-blog-one-error-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php echo esc_html__('404','rb-blog-one');?></h1>
                <h5><?php echo esc_html__('Sorry, Page not found.','rb-blog-one');?></h5>
                <p><?php echo esc_html__('Which page you are looking for might have been removed had its name changed or is temporarily unavailable','rb-blog-one');?></p>
                <div class="rb-blog-one-home-btn">
                    <a href="<?php echo esc_url(home_url('/'))?>"><?php echo esc_html__('go to home','rb-blog-one');?></a>
                </div>
                <?php get_search_form(); ?>
            </div>
        </div><!-- row end -->
    </div><!-- container end -->
</div>
<!--===== Error Area End Here =====-->