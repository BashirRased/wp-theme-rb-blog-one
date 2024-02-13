<?php

// Site Branding Column
$site_branding_col = "";
if ( true == get_theme_mod ( 'rbth_ads' ) && has_custom_logo() ) {
    $site_branding_col = "col-lg-6";
} elseif ( true == get_theme_mod ( 'rbth_ads' ) && display_header_text() ) {
    $site_branding_col = "col-lg-6";
} else {
    $site_branding_col = "col-lg-12";
}

// Site Title & Tagline
$site_title    = "";
$site_tagline  = "";
$site_title    = get_bloginfo( 'name' );
$site_tagline  = get_bloginfo( 'description', 'display' );

// Advertisement
$the_ads_id = "";
$the_ads_id = get_theme_mod ( 'rbth_ads_id' );

if ( true == get_theme_mod ( 'rbth_ads' ) || has_custom_logo() || display_header_text() ) :
?>
<!--============================================
===== Header Site Branding Area Start Here =====
=============================================-->
<div class="header-site-branding">
    <div class="container">
        <div class="row align-items-center">
            
            <?php if ( has_custom_logo() || display_header_text() ) : ?>
            <!-- Site Logo & Title-Tagline -->
            <div class="<?php echo esc_attr($site_branding_col); ?>">
                <div class="site-branding d-lg-flex align-items-lg-center d-sm-block d-md-block">
                    <?php if ( has_custom_logo() ) : ?>
                    <div class="site-logo mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php endif; ?>

                    <?php if ( display_header_text() ) : ?>
                    <div class="site-title-tagline mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">

                        <?php if ( $site_title ): ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php echo esc_html( $site_title, 'rb-blog-one' ); ?>
                            </a>
                        </h1>
                        <?php endif; ?>

                        <?php if ( $site_tagline ) : ?>
                            <p class="site-tagline">
                                <?php echo esc_html( $site_tagline, 'rb-blog-one' ); ?>
                            </p>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ( true == get_theme_mod ( 'rbth_ads' ) ) : ?>
            <!-- Header Advertisement -->
            <div class="<?php echo esc_attr($site_branding_col); ?>">
                <div class="header-ads">
                    <?php
                    if ( function_exists( 'the_ad' ) && !empty ( $the_ads_id ) ) {
                        the_ad( $the_ads_id );
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