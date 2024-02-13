<?php
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
===== breadcrumb Area Start Here =====
====================================-->
<div class='breadcrumb-area' style='background-image:url(<?php echo esc_url($breadcrumb_img); ?>);'>
    <div class="breadcrumb-content">
        <div class='container'>
            <div class='row d-flex align-items-center'>
                <div class='col-lg-6'>
                    <div class="breadcrumb-left-area">
                        <?php
                            do_action( "rb_blog_one_breadcrumb_title" );
                            do_action( "rb_blog_one_breadcrumb_description" );
                        ?>
                    </div>                
                </div>

                <div class='col-lg-6'>
                    <div class="breadcrumb-right-area float-end">
                        <?php do_action( "rb_blog_one_breadcrumb_nav" ); ?>
                    </div>                
                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </div>
</div>
<!--=================================
===== breadcrumb Area End Here =====
==================================-->