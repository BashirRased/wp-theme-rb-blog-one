<?php 
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if (have_comments()) : ?>
<h3 class="total-comments">
	<?php
	$rb_blog_one_comment_count = get_comments_number();
	if (1 === $rb_blog_one_comment_count) {
		/* translators: %s: Post title. */
		printf( _x('1 comment on %s', 'comments title', 'rb-blog-one'), get_the_title());
	}
	else {
		printf(
			/* translators: 1: Number of comments, 2: Post title. */
			_nx(
				'<span class="comment-count">%1$s</span> comment on <span class="comment-title">&ldquo;%2$s&rdquo;</span>',
				'<span class="comment-count">%1$s</span> comments on <span class="comment-title">&ldquo;%2$s&rdquo;</span>',
				$rb_blog_one_comment_count,
				'comments title',
				'rb-blog-one'
			),
			number_format_i18n( $rb_blog_one_comment_count ),
			get_the_title()
		);
	}
	?>
</h3><!-- .comments-title -->
<?php endif; ?>

<div class="comments-form">
	<?php comment_form(); ?>
</div>

<div class="comments-list">
	<?php
		wp_list_comments( [
			'style'       => 'ul',
			'callback'    => 'rb_blog_one_comment_list',
			'avatar_size' => 90,
			'short_ping'  => true,
		] );
	?>
</div>

<div class="comments-pagination">
	<?php the_comments_pagination( array (
            'mid_size'  => 2,
            'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
            'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
        ) ); ?>
</div>
