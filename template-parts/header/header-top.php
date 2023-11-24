<?php
/**
 * The header top template file loaded under header.php
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.7
 * @since RB Blog One 1.1.7
 */
?>

<!--==================================
===== Header Top Area Start Here =====
===================================-->
<div class="header-top-area">
    <div class="container">
        <div class="row">

            <!--===== Header Top Left Area Start Here =====-->
            <div class="col-lg-12">
                <div class="header-top-left">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>
                        <?php echo esc_html( date_i18n( 'l, jS F Y' ),'rb-blog-one' ); ?>
                   </span>
                </div>
            </div>
            <!--===== Header Top Left Area End Here =====-->           

        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!--================================
===== Header Top Area End Here =====
=================================-->