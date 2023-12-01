<?php
/**
 * The site braning template file loaded under header.php
 *
 * @package rb_blog_one
 */

$site_branding_class = "";
if ( true == get_theme_mod ( 'rbth_ads' ) && has_custom_logo() ) {
    $site_branding_class = "col-lg-6";
} elseif ( true == get_theme_mod ( 'rbth_ads' ) && display_header_text() ) {
    $site_branding_class = "col-lg-6";
}else {
    $site_branding_class = "col-lg-12";
}

$site_title    = get_bloginfo( 'name' );
$site_tagline  = get_bloginfo( 'description', 'display' );
if ( true == get_theme_mod ( 'rbth_ads' ) || has_custom_logo() || display_header_text() ) :
?>
<!--============================================
===== Header Site Branding Area Start Here =====
=============================================-->
<div class="header-site-branding">
    <div class="container">
        <div class="row">

            <?php if ( has_custom_logo() || display_header_text() ) : ?>
            <div class="<?php echo esc_attr($site_branding_class); ?>">
                <div class="site-branding-area">
                    <?php if ( has_custom_logo() ) : ?>
                    <div class="header-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php endif; ?>

                    <?php if ( display_header_text() ) : ?>
                    <div class="site-title-and-tagline">

                        <?php if ( $site_title ): ?>
                        <h1 class="header-site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php echo esc_html( $site_title, 'rb-blog-one' ); ?>
                            </a>
                        </h1>
                        <?php endif; ?>

                        <?php if ( $site_tagline ) : ?>
                            <p class="header-site-tagline">
                                <?php echo esc_html( $site_tagline, 'rb-blog-one' ); ?>
                            </p>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ( true == get_theme_mod ( 'rbth_ads' ) ) : ?>
            <div class="<?php echo esc_attr($site_branding_class); ?>">
                <div class="header-ads-area">
                    <?php
                    if ( function_exists( 'the_ad' ) ) {
                        the_ad( '2006' );
                    } else {
                        echo esc_html ( 'Add Advertisement', 'rb-blog-one');
                    }
                    ?>
                </div>
            </div>
            <?php endif; ?>

        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!--==========================================
===== Header Site Branding Area End Here =====
===========================================-->
<?php endif; ?>