<?php
/**
 * The header top template file loaded under header.php
 *
 * @package rb_blog_one
 */

$header_top_class = "";
$align_right_class = "";
if ( true == get_theme_mod ( 'rbth_date_show' ) && true == get_theme_mod ( 'rbth_social_link' ) ) {
    $header_top_class = "col-lg-6";
    $align_right_class = "text-lg-end";
} else {
    $header_top_class = "col-lg-12";
    $align_right_class = "text-lg-end";
}
?>

<!--==================================
===== Header Top Area Start Here =====
===================================-->
<div class="header-top-area">
    <div class="container">
        <div class="row">

            <!--===== Header Top Left Area Start Here =====-->
            <?php if ( true == get_theme_mod ( 'rbth_date_show' ) ) : ?>
            <div class="<?php echo esc_attr($header_top_class); ?>">
                <div class="header-top-left">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>
                        <?php echo esc_html( date_i18n( 'l, jS F Y' ),'rb-blog-one' ); ?>
                </span>
                </div>
            </div>
            <?php endif; ?>
            <!--===== Header Top Left Area End Here =====-->

            <!--===== Header Top Right Area Start Here =====-->
            <?php if ( true == get_theme_mod ( 'rbth_social_link' ) ) :
                $facebook_link = get_theme_mod ( 'rbth_facebook_link' );
                $twitter_link = get_theme_mod ( 'rbth_twitter_link' );
                $instagram_link = get_theme_mod ( 'rbth_instagram_link' );
                $linkedin_link = get_theme_mod ( 'rbth_linkedin_link' );
                $pinterest_link = get_theme_mod ( 'rbth_pinterest_link' );
                $youtube_link = get_theme_mod ( 'rbth_youtube_link' );
                $behance_link = get_theme_mod ( 'rbth_behance_link' );
                $dribbble_link = get_theme_mod ( 'rbth_dribbble_link' );
                $github_link = get_theme_mod ( 'rbth_github_link' );
                $codepen_link = get_theme_mod ( 'rbth_codepen_link' );
            ?>
            <div class="<?php echo esc_attr( $header_top_class ); ?>">
                <div class="header-top-right">
                    <ul class="<?php echo esc_attr( $align_right_class ); ?>">

                        <!-- Facebook Link -->
                        <?php if ( !empty ($facebook_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($facebook_link); ?>">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- Twitter Link -->
                        <?php if ( !empty ($twitter_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($twitter_link); ?>">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- Instagram Link -->
                        <?php if ( !empty ($instagram_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($instagram_link); ?>">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- LinkedIn Link -->
                        <?php if ( !empty ($linkedin_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($linkedin_link); ?>">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- Pinterest Link -->
                        <?php if ( !empty ($pinterest_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($pinterest_link); ?>">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- YouTube Link -->
                        <?php if ( !empty ($youtube_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($youtube_link); ?>">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- Behance Link -->
                        <?php if ( !empty ($behance_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($behance_link); ?>">
                                <i class="fa-brands fa-behance"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- Dribbble Link -->
                        <?php if ( !empty ($dribbble_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($dribbble_link); ?>">
                                <i class="fa-brands fa-dribbble"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- Github Link -->
                        <?php if ( !empty ($github_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($github_link); ?>">
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <!-- Code Pen Link -->
                        <?php if ( !empty ($codepen_link) ) : ?>
                        <li>
                            <a href="<?php echo esc_url($codepen_link); ?>">
                                <i class="fa-brands fa-codepen"></i>
                            </a>
                        </li>
                        <?php endif; ?>

                    </ul>                
                </div>
            </div>
            <?php endif; ?>
            <!--===== Header Top Right Area End Here =====-->
            
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!--================================
===== Header Top Area End Here =====
=================================-->