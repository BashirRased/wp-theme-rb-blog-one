<?php
// Header Top Column
$header_top_col = "";
if ( true == get_theme_mod ( 'rbth_date_show' ) && true == get_theme_mod ( 'rbth_social_link' ) ) {
    $header_top_col = "col-lg-6";
    $align_right_class = "text-lg-end";
} else {
    $header_top_col = "col-lg-12";
    $align_right_class = "text-lg-end";
}
?>

<!--==================================
===== Header Top Area Start Here =====
===================================-->
<div class="header-top-area">
    <div class="container">
        <div class="row">
            
            <?php if ( true == get_theme_mod ( 'rbth_date_show' ) ) : ?>
            <!--===== Header Top Left =====-->
            <div class="<?php echo esc_attr( $header_top_col ); ?> d-flex align-items-center justify-content-lg-start justify-content-xl-start justify-content-xxl-start justify-content-center mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">
                <div class="header-top-left">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>
                        <?php echo esc_html( date_i18n( 'l, jS F Y' ), 'rb-blog-one' ); ?>
                    </span>
                </div>
            </div>
            <?php endif; ?>

            <?php if ( true == get_theme_mod ( 'rbth_social_link' ) ) : ?>
            <!--===== Header Top Right =====-->
            <div class="<?php echo esc_attr( $header_top_col ); ?> d-flex align-items-center justify-content-lg-end justify-content-xl-end justify-content-xxl-end justify-content-center">
                <div class="header-top-right">
                    <ul>
                        <?php do_action( 'rbth_social_links' ); ?> 
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!--================================
===== Header Top Area End Here =====
=================================-->