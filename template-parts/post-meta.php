<?php
/**
 * Used for blog post meta.
 *
 * @package WordPress
 * @subpackage RB Blog One
 * @since RB Blog One 1.1.3
 */

/* translators: Used between list items, there is a space after the comma. */
$rb_blog_one_categories_list = get_the_category_list(__(', ','rb-blog-one') );
if ($rb_blog_one_categories_list) {
    printf(
        /* translators: %s: List of categories. */
        '<div class="rb-blog-one-post-cat"><i class="fas fa-folder-open"></i>'.esc_html__('%s', 'rb-blog-one').'</div>',
        $rb_blog_one_categories_list // phpcs:ignore WordPress.Security.EscapeOutput
    );
}
?>

<?php
    the_title(
        sprintf('<h2 class="rb-blog-one-post-title"><a href="%s">',esc_url(get_permalink())),'</a></h2>'
    );
?>

<div class="rb-blog-one-post-meta">

    <div class="rb-blog-one-post-author">
        <?php
            printf(
                /* translators: %s: Author name. */
                esc_html__('%s','rb-blog-one'),
                '<a href="'.esc_url(get_author_posts_url(get_the_author_meta( 'ID'))).'"><i class="fas fa-user"></i> '.esc_html(get_the_author()).'</a>'
            );
        ?>
    </div>

    <div class="rb-blog-one-post-date">
        <i class="fas fa-clock"></i>
        <?php $rb_blog_one_archive_year  = get_the_time('Y'); $rb_blog_one_archive_month = get_the_time('m'); 
        $rb_blog_one_archive_day   = get_the_time('d'); ?>       
        <a href="<?php echo esc_url(get_day_link( $rb_blog_one_archive_year, $rb_blog_one_archive_month, $rb_blog_one_archive_day)); ?>">
           <?php echo get_the_date("j F Y"); ?>
        </a>
        
    </div>

    <div class="rb-blog-one-post-comments">
        <i class="fas fa-comments"></i>
        <?php
            comments_popup_link(
                __('No Comments','rb-blog-one'),
                __('1 Comment','rb-blog-one'),
                __('% Comments','rb-blog-one'),
                'rb-blog-one-comments-btn',
                __('Comments Off','rb-blog-one')
            );
        ?>
   </div>

    <div class="rb-blog-one-post-edit">
        
        <?php edit_post_link(__('<i class="fas fa-edit"></i> Edit','rb-blog-one')); ?>
   </div>

</div>