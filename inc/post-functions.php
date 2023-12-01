<?php
/**
 * Post functions for this theme
 * 
 * The template loading under functions.php
 *
 * @package rb_blog_one
 */

/*=====================================
Table of Post Functions List Start Here
=======================================
	01. Post Thumbnail Display Permission Check
	02. Post Thumbnail Display
    03. Post Author Meta Output
    04. Post Date Meta Output
	05. Post Category Meta Output
	06. Post Tag Meta Output
	07. Post Comments Meta Output
	08. Post Edit Meta Output
	09. Read More Button Output
	10. Post Pagination Output
	11. Single Post Pagination Output
=====================================
Table of Post Functions List End Here
===================================*/

/******************************************************
***** 01. Post Thumbnail Display Permission Check *****
******************************************************/
function rb_blog_one_can_show_post_thumbnail() {
	return apply_filters(
		'rb_blog_one_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail()
	);
}

/*************************************
***** 02. Post Thumbnail Display *****
*************************************/
if ( !function_exists( 'rb_blog_one_post_thumbnail_cutom' ) ) {
	function rb_blog_one_post_thumbnail_cutom() {
		if ( !rb_blog_one_can_show_post_thumbnail() ) {
			return;
		}
		?>
		<figure class="post-thumbnail">
			<?php
			// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
			the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
			if ( is_singular( 'attachment') ) :
				if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text">
						<?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() )); ?>
					</figcaption>
				<?php
				endif;
			endif;
			?>
		</figure><!-- .post-thumbnail -->
		<?php
	}
	add_action( 'rb_blog_one_post_thumbnail', 'rb_blog_one_post_thumbnail_cutom');
}

/**************************************
***** 03. Post Author Meta Output *****
**************************************/
if ( !function_exists( 'rb_blog_one_author_meta_custom' ) ) {
	function rb_blog_one_author_meta_custom() {
		printf(
			/* translators: %s: Author name. */
			'<span class="entry-author-meta"><i class="fa-regular fa-user"></i> %s</span>',
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author(), 'rb-blog-one' ) . '</a>'
		);
	}
    add_action( "rb_blog_one_author_meta", "rb_blog_one_author_meta_custom" );
}

/************************************
***** 04. Post Date Meta Output *****
************************************/
if ( !function_exists( 'rb_blog_one_date_meta_custom' ) ) {
	function rb_blog_one_date_meta_custom() {		
        $archive_year  = get_the_time( 'Y' );
		$archive_month = get_the_time( 'm' );
		$archive_date = get_the_time( 'd' );	

		printf(
			/* translators:
			 %1$s: Publish date url.
			 %2$s: Publish date. 
			 */
			'<span class="entry-date-meta"><i class="fa-regular fa-clock"></i><a href="%1$s">%2$s</a></span>',
			esc_url( get_day_link( $archive_year, $archive_month, $archive_date ) ),
			esc_html( get_the_time( get_option( 'date_format' ) ) )
		);	
	}
    add_action( "rb_blog_one_date_meta", "rb_blog_one_date_meta_custom" );
}

/****************************************
***** 05. Post Category Meta Output *****
****************************************/
if ( !function_exists( 'rb_blog_one_cat_meta_custom' ) ) {
	function rb_blog_one_cat_meta_custom() {
        if ( has_category() ) : ?>
        <span class="entry-cat-meta">
            <i class="fa-regular fa-folder-open"></i>
            <?php the_category( ', ' ); ?>
        </span>
    <?php
        endif;
	}
    add_action( "rb_blog_one_cat_meta", "rb_blog_one_cat_meta_custom" );
}

/***********************************
***** 06. Post Tag Meta Output *****
***********************************/
if ( !function_exists( 'rb_blog_one_tag_meta_custom' ) ) {
	function rb_blog_one_tag_meta_custom() {
		$tags_list = get_the_tag_list( '', ', ' );
		if ( has_tag() ) { 
            ?>
            <span class="entry-tag-meta">
                <i class="fa-solid fa-tags"></i>
                <?php echo wp_kses_post( $tags_list, 'rb-blog-one' ); ?>
            </span>
            <?php			
		}		
	}
    add_action( 'rb_blog_one_tag_meta', 'rb_blog_one_tag_meta_custom' );
}

/****************************************
***** 07. Post Comments Meta Output *****
****************************************/
if ( !function_exists( 'rb_blog_one_comments_meta_custom' ) ) {
    function rb_blog_one_comments_meta_custom() {
        ?>
        <span class="entry-comments-meta">
            <i class="fa-regular fa-comments"></i>
            <?php
                comments_popup_link(
                    __('No Comments','rb-blog-one'),
                    __('1 Comment','rb-blog-one'),
                    __('% Comments','rb-blog-one'),
                    '',
                    __('Comments Off','rb-blog-one')
                );
            ?>
        </span>
        <?php
	}
    add_action( "rb_blog_one_comments_meta", "rb_blog_one_comments_meta_custom" );
}

/************************************
***** 08. Post Edit Meta Output *****
************************************/
if ( !function_exists( 'rb_blog_one_edit_meta_custom' ) ) {
	function rb_blog_one_edit_meta_custom() {
		edit_post_link(
			sprintf(
				/* translators: %s: Post title. Only visible to screen readers. */
				esc_html__( 'Edit', 'rb-blog-one' )
			),
			'<span class="edit-meta"><i class="fa-solid fa-user-pen"></i> ',
			'</span>'
		);
	}
    add_action( "rb_blog_one_edit_meta", "rb_blog_one_edit_meta_custom" );
}

/**************************************
***** 09. Read More Button Output *****
**************************************/
if ( !function_exists('rb_blog_one_custom_excerpt_length') ) {
    function rb_blog_one_custom_excerpt_length( $length ) {
		if ( true == get_theme_mod( 'rbth_excerpt' ) ) {
			$length = get_theme_mod( 'rbth_excerpt_word' );
			if ( $length ) {
				return $length;
			}
			else {
				return absint(20);
			}
		}
		else {
			$length = absint(20);
			return $length;
		}
	}
}
add_filter( 'excerpt_length', 'rb_blog_one_custom_excerpt_length', 999 );

function rb_blog_one_custom_excerpt_more( $more ) {	
	$more2 = sprintf(
		/* translators:
		%1$s: Slug of current post.
		%2$s: Button text.
		*/
		'[...]<br><br><a class="theme-btn" href="%1$s">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		esc_html__( 'read more', 'rb-blog-one' )
	);
	return $more2;
}
add_filter( 'excerpt_more', 'rb_blog_one_custom_excerpt_more' );

/*************************************
***** 10. Post Pagination Output *****
*************************************/
if ( !function_exists( 'rb_blog_one_pagination_custom' ) ) {
    function rb_blog_one_pagination_custom() {
        the_posts_pagination( array (
            'mid_size'  => 2,
            'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
            'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
        ) );
    }
    add_action( 'rb_blog_one_pagination', 'rb_blog_one_pagination_custom' );
}

/********************************************
***** 11. Single Post Pagination Output *****
********************************************/
if ( !function_exists( 'rb_blog_one_single_post_pagination_custom' ) ) {
	function rb_blog_one_single_post_pagination_custom() {
		$page_link = array(
			'before' => '<div class="single-post-pagination">',
			'after' => '</div>',
			'echo' => 1
		);
		wp_link_pages( $page_link );
	}
	add_action( 'rb_blog_one_single_post_pagination', 'rb_blog_one_single_post_pagination_custom' );
}