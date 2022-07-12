<?php
/**
 * Used for pagination.
 *
 * @package RB Free Theme
 * @subpackage RB Blog One
 * @version RB Blog One 1.1.5
 * @since RB Blog One 1.1.4
 */
?>

<!--===== Pagination Area Start Here =====-->
<div class="rb-blog-one-pagination-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="rb-blog-one-pagination">
                    <?php the_posts_pagination( array(
                        'mid_size'  => 1,
                        'prev_text' => '<i class="fas fa-chevron-left"></i>',
                        'next_text' => '<i class="fas fa-chevron-right"></i>'
                    ) ); ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!--===== Pagination Area End Here =====-->