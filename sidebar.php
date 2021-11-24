<?php
/**
 * Displays the right sidebar area.
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.1.3
 */

if (is_active_sidebar('rb-blog-one-right-sidebar')): ?>
    <div class="col-lg-4">
        <div class="rb-blog-one-sidebar-area">
            <?php dynamic_sidebar('rb-blog-one-right-sidebar'); ?>
        </div>
    </div>
<?php endif; ?>