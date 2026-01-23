<?php
/**
 * Template Parts - Footer Text.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$copyright_switch = (int) get_theme_mod( 'rbth_copyright_switch', 0 );
$poweredby_switch = (int) get_theme_mod( 'rbth_poweredby_switch', 0 );

$copyright_text = trim( get_theme_mod( 'rbth_copyright_text', '' ) );
$poweredby_text = trim( get_theme_mod( 'rbth_poweredby_text', '' ) );

$has_copyright = ( 1 === $copyright_switch && ! empty( $copyright_text ) );
$has_poweredby = ( 1 === $poweredby_switch && ! empty( $poweredby_text ) );

// Column logic.
$footer_col_class           = ( $has_copyright && $has_poweredby ) ? 'col-lg-6' : 'col-lg-12';
$footer_powerby_right_class = ( $has_copyright && $has_poweredby ) ? 'float-lg-end' : '';
?>
<!--==============================
===== Footer Area Start Here =====
===============================-->
<footer class="site-footer">
	<div class="container">
		<div class="row">

			<?php if ( $has_copyright || $has_poweredby ) : ?>

				<?php if ( $has_copyright ) : ?>
					<div class="<?php echo esc_attr( $footer_col_class ); ?>">
						<div class="copyright-text">
							<?php echo wp_kses_post( $copyright_text ); ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $has_poweredby ) : ?>
					<div class="powered-by-text <?php echo esc_attr( $footer_col_class ); ?>">
						<?php echo wp_kses_post( $poweredby_text ); ?>
					</div>
				<?php endif; ?>

			<?php else : ?>

				<div class="col-lg-6">
					<?php
					$published_year = 2021;
					$this_year      = date_i18n( 'Y' );
					$wp_year        = $published_year . ( ( $published_year !== $this_year ) ? '-' . $this_year : '' );

					printf(
						'<p class="copyright-text">%1$s %2$s %3$s <a href="%4$s">%5$s</a> %6$s</p>',
						esc_html__( 'Copyright', 'rb-blog-one' ),
						esc_html( $wp_year ),
						esc_html__( 'by', 'rb-blog-one' ),
						esc_url( home_url( '/' ) ),
						esc_html( get_bloginfo( 'name' ) ),
						esc_html__( '| All rights reserved.', 'rb-blog-one' )
					);
					?>
				</div>

				<div class="col-lg-6">
					<?php
					printf(
						'<p class="powered-by-text float-lg-end">%1$s <a href="%2$s" target="_blank" rel="noopener noreferrer">%3$s</a>%4$s</p>',
						esc_html__( 'Powered by', 'rb-blog-one' ),
						esc_url( 'https://bashir-rased.com/' ),
						esc_html__( 'Bashir Rased', 'rb-blog-one' ),
						esc_html__( '.', 'rb-blog-one' )
					);
					?>
				</div>

			<?php endif; ?>

		</div>
	</div>
</footer>

<!--============================
===== Footer Area End Here =====
=============================-->
