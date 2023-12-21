<?php
/**
 * The breadcrumbs template file loaded under header.php
 *
 * @package rb_blog_one
 */
$breadcrumb = "";
$breadcrumb_img = "";
$breadcrumb_img_array = "";

if ( function_exists('get_field') && get_field('rbth_breadcrumb_acf') ) {
    $breadcrumb = get_field( 'rbth_breadcrumb_acf' );
}

if ( $breadcrumb == 'on' ) {
    if ( function_exists('get_field') && get_field('rbth_breadcrumb_img_acf') ) {
        $breadcrumb_img_array = get_field( 'rbth_breadcrumb_img_acf' );
    }    
    $breadcrumb_img = $breadcrumb_img_array['url'];
}
else {
    if ( true == get_theme_mod ( 'rbth_breadcrumb_switch' ) && get_theme_mod ( 'rbth_breadcrumb_img' ) ) {
        $breadcrumb_img = get_theme_mod ( 'rbth_breadcrumb_img' );
    }
    else {
        $breadcrumb_img =  get_header_image();
    }
}
?>

<!--===================================
===== Breadcrumbs Area Start Here =====
====================================-->
<div class='breadcrumbs-area' style='background-image:url(<?php echo esc_url($breadcrumb_img); ?>);'>
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