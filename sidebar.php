<?php
/**
 * Displays the right sidebar area.
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.6
 * @since RB Blog One 1.1.6
 */

if ( is_active_sidebar( 'sidebar-1' ) ) {
    dynamic_sidebar( 'sidebar-1' );
}