<?php
/**
 * The site braning template file loaded under header.php
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.6
 * @since RB Blog One 1.1.6
 */

$site_title    = get_bloginfo( 'name' );
$site_tagline  = get_bloginfo( 'description', 'display' );

if ( has_custom_logo() || display_header_text() ) : 
?>

<!--============================================
===== Header Site Branding Area Start Here =====
=============================================-->
<div class="header-site-branding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

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
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!--==========================================
===== Header Site Branding Area End Here =====
===========================================-->

<?php endif; ?>