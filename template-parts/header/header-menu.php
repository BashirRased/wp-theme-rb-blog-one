<?php

// Header Fixed Menu
$fixed_menu = "";
$menu_fixed_class = "";
if ( function_exists('get_field') && get_field('rbth_menu_fixed_acf') ) {
    $fixed_menu = get_field( 'rbth_menu_fixed_acf' );
}
if ( $fixed_menu == 'on' ) {
    $menu_fixed_class = "header-fixed-active";
    $menu_fixed_class = " " . "header-fixed-active";
} else {
    if ( true == get_theme_mod ( 'rbth_menu_fixed' ) ) {
        $menu_fixed_class = "header-fixed-active";
        $menu_fixed_class = " " . "header-fixed-active";
    }
}

// Header Transparent Menu
$transparent_menu = "";
$menu_transparent_class = "";
if ( function_exists('get_field') && get_field('rbth_menu_transparent_acf') ) {
    $transparent_menu = get_field( 'rbth_menu_transparent_acf' );
}
if ( $transparent_menu == 'on' ) {
    $menu_transparent_class = " " ."header-transparent-menu";
} else {
    if ( true == get_theme_mod ( 'rbth_menu_transparent' ) ) {
        $menu_transparent_class = " " ."header-transparent-menu";
    }
}
?>

<!--===================================
===== Header Menu Area Start Here =====
====================================-->
<div class="header-menu-area<?php echo esc_attr($menu_fixed_class . $menu_transparent_class ); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php do_action( 'rb_blog_one_menu_navwalker' ); ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</div>

<div class="mobile-menu"></div>
<!--=================================
===== Header Menu Area End Here =====
===================================-->