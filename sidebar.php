<?php
/**
 * Displays the right sidebar area.
 *
 * @package rb_blog_one
 */

if ( is_active_sidebar( 'sidebar-1' ) ) {
    dynamic_sidebar( 'sidebar-1' );
}