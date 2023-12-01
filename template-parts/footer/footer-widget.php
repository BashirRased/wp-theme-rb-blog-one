<?php
/**
 * The file loading under footer.php
 *
 * @package rb_blog_one
 */

$count = 1;
if ( is_active_sidebar( 'footer-1' ) ) {
    $count;
    $footer_widget_class = "footer-widget-col-" . $count;
}
if ( is_active_sidebar( 'footer-2' ) ) {
    $count++;
    $footer_widget_class = "footer-widget-col-" . $count;
}
if ( is_active_sidebar( 'footer-3' ) ) {
    $count++;
    $footer_widget_class = "footer-widget-col-" . $count;
}
if ( is_active_sidebar( 'footer-4' ) ) {
    $count++;
    $footer_widget_class = "footer-widget-col-" . $count;
}
if ( is_active_sidebar( 'footer-5' ) ) {
    $count++;
    $footer_widget_class = "footer-widget-col-" . $count;
}
?>

<!--=====================================
===== Footer Widget Area Start Here =====
======================================-->
<div class="footer-widget-area <?php echo esc_attr($footer_widget_class); ?>">
    <div class="container">
        <div class="row">
            <div class="footer-widget-list">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="footer-single-widget">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="footer-single-widget">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="footer-single-widget">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                <div class="footer-single-widget">
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
                <div class="footer-single-widget">
                    <?php dynamic_sidebar( 'footer-5' ); ?>
                </div>
                <?php endif; ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!--===================================
===== Footer Widget Area End Here =====
====================================--> 