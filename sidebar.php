<?php
/**
 * Displays the right sidebar area.
 *
 * @package RB Free Theme
 * @subpackage RB Blog One
 * @version RB Blog One 1.1.5
 * @since RB Blog One 1.1.4
 */

if (is_active_sidebar('rb-blog-one-right-sidebar')): ?>
    <div class="col-lg-4">
        <div class="rb-blog-one-sidebar-area">
            <?php dynamic_sidebar('rb-blog-one-right-sidebar'); ?>
        </div>
    </div>
<?php endif; ?>