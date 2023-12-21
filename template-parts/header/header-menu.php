<?php
/**
 * The header menu template file loaded under header.php
 * 
 * @link https://developer.wordpress.org/themes/functionality/navigation-menus/
 *
 * @package rb_blog_one
 */
$header_menu_fixed_kirki = "";
$header_menu_fixed_acf = "";
$menu_fixed_class = "";

$header_menu_fixed_kirki = get_theme_mod ( 'rbth_menu_fixed' );
if ( $header_menu_fixed_kirki ) {
    if ( function_exists('get_field') && get_field('rbth_memu_fixed_disable') ) {
        $header_menu_fixed_acf = get_field( 'rbth_memu_fixed_disable' );
    } else {
        $menu_fixed_class = "header-fixed-area";
    }    
}

$header_menu_transparent_kirki = get_theme_mod ( 'rbth_menu_transparent' );
$menu_transparent_class = "";
if ( $header_menu_transparent_kirki ) {
    if ( function_exists('get_field') && get_field('rbth_memu_transparent_disable') ) {
        $header_menu_transparent_acf = get_field( 'rbth_memu_transparent_disable' );
    } else {
        $menu_transparent_class = "header-transparent-area";
    }    
}
?>

<!--===================================
===== Header Menu Area Start Here =====
====================================-->
<div class="header-menu-area <?php echo esc_attr($menu_fixed_class . ' ' . $menu_transparent_class); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php do_action( 'rb_blog_one_header_menu' ); ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!--=================================
===== Header Menu Area End Here =====
===================================-->