<?php
/**
 * Displays the right sidebar area.
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.8
 */

if ( is_active_sidebar( 'rb-blog-one-right-sidebar' ) ) : ?>

<!--===== Right Sidebar Area Start Here =====-->
<div class="col-lg-4">
    <div class="rb-blog-one-sidebar-area">
        <?php dynamic_sidebar('rb-blog-one-right-sidebar'); ?>
    </div>
</div>
<!--===== Right Sidebar Area End Here =====-->

<?php endif; ?>
