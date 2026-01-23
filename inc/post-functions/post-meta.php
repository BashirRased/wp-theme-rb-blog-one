<?php
/**
 * Post Functions - Post Meta
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ============================
 * ----- CONTENT OF TABLE -----
 * ============================
 * +++++ 01. Post Category Meta
 * +++++ 02. Post Author Meta
 * +++++ 03. Post Comment Meta
 * +++++ 04. Post Date Meta
 * +++++ 05. Post Category Meta
 * +++++ 06. Post Tag Meta
 * +++++ 07. Post View Meta
 * +++++ 08. Post Read Meta
 * +++++ 09. Post Edit Meta
 */

/**
 * 01. Post Category Meta
 */
if ( ! function_exists( 'rb_blog_one_category_meta_top_output' ) ) {
	/**
	 * Output blog post category meta.
	 *
	 * Displays the post categories at the top of a single blog post
	 * when the "Separate Category Meta" option is enabled in Customizer
	 * and the post has assigned categories.
	 *
	 * @return void
	 */
	function rb_blog_one_category_meta_top_output() {
		$cat_meta_status = get_theme_mod( 'rbth_cat_meta_blog', false );
		if ( has_category() && true === $cat_meta_status ) :
			?>
			<div class="post-meta-top">
				<div class="cat-post-meta">
					<i class="fa-regular fa-folder-open"></i>
					<?php the_category( ', ' ); ?>
				</div>
			</div>
			<?php
		endif;
	}
	add_action( 'rb_blog_one_category_meta_top', 'rb_blog_one_category_meta_top_output' );
}

/**
 * 02. Post Author Meta
 */
if ( ! function_exists( 'rb_blog_one_author_meta_output' ) ) {
	/**
	 * Display post author meta with icon.
	 *
	 * Outputs the author name with a user icon.
	 * Respects RTL layouts for proper ordering.
	 *
	 * @return void
	 */
	function rb_blog_one_author_meta_output() {
		$author_icon      = '<i class="fa-regular fa-user"></i>';
		$meta_url         = get_author_posts_url( get_the_author_meta( 'ID' ) );
		$author_name      = get_the_author_meta( 'display_name' );
		$author_name_html = sprintf(
			'<a href="%1$s" rel="author">%2$s</a>',
			esc_url( $meta_url ),
			esc_html( $author_name )
		);
		$allowed_html     = array(
			'a' => array(
				'href' => true,
				'rel'  => true,
			),
			'i' => array(
				'class' => true,
			),
		);

		// Output respecting RTL.
		if ( is_rtl() ) {
			printf(
				'<div class="author-post-meta">%1$s %2$s</div>',
				wp_kses( $author_name_html, $allowed_html ),
				wp_kses( $author_icon, $allowed_html )
			);
		} else {
			printf(
				'<div class="author-post-meta">%1$s %2$s</div>',
				wp_kses( $author_icon, $allowed_html ),
				wp_kses( $author_name_html, $allowed_html )
			);
		}
	}
	add_action( 'rb_blog_one_author_meta', 'rb_blog_one_author_meta_output' );
}

/**
 * 03. Post Comment Meta
 */
if ( ! function_exists( 'rb_blog_one_comment_meta_output' ) ) {
	/**
	 * Display post comment meta with icon.
	 *
	 * Outputs the comment name with a user icon.
	 * Respects RTL layouts for proper ordering.
	 *
	 * @return void
	 */
	function rb_blog_one_comment_meta_output() {
		$meta_icon = '<i class="fa-regular fa-comments"></i>';
		?>
		<div class="comments-post-meta">
			<?php
			$comments_meta_class = 'comment-meta-text';
			if ( ! comments_open() ) {
				$comments_meta_class = 'comment-meta-off-text';
			}

			if ( is_rtl() ) {
				comments_popup_link(
					esc_html__( 'No Comment', 'rb-blog-one' ),
					esc_html__( '1 Comment', 'rb-blog-one' ),
					esc_html__( '% Comments', 'rb-blog-one' ),
					$comments_meta_class,
					esc_html__( 'Comments Off', 'rb-blog-one' )
				);
				echo wp_kses_post( $meta_icon );
			} else {
				echo wp_kses_post( $meta_icon );
				comments_popup_link(
					esc_html__( 'No Comment', 'rb-blog-one' ),
					esc_html__( '1 Comment', 'rb-blog-one' ),
					esc_html__( '% Comments', 'rb-blog-one' ),
					$comments_meta_class,
					esc_html__( 'Comments Off', 'rb-blog-one' )
				);
			}
			?>
		</div>
		<?php
	}
	add_action( 'rb_blog_one_comment_meta', 'rb_blog_one_comment_meta_output' );
}

/**
 * 04. Post Date Meta
 */
if ( ! function_exists( 'rb_blog_one_date_meta_output' ) ) {
	/**
	 * Display post date meta with icon.
	 *
	 * @return void
	 */
	function rb_blog_one_date_meta_output() {

		$post_date_html = function_exists( 'rbth_blogpage_date_format' )
			? rbth_blogpage_date_format()
			: get_the_date();

		$archive_year  = get_the_time( 'Y' );
		$archive_month = get_the_time( 'm' );
		$archive_date  = get_the_time( 'd' );

		$meta_icon = '<i class="fa-regular fa-clock"></i>';

		$meta_link = sprintf(
			'<a href="%1$s">%2$s</a>',
			esc_url( get_day_link( $archive_year, $archive_month, $archive_date ) ),
			esc_html( $post_date_html )
		);

		if ( is_rtl() ) {
			printf(
				'<div class="date-post-meta">%1$s %2$s</div>',
				wp_kses_post( $meta_link ),
				wp_kses_post( $meta_icon )
			);
		} else {
			printf(
				'<div class="date-post-meta">%1$s %2$s</div>',
				wp_kses_post( $meta_icon ),
				wp_kses_post( $meta_link )
			);
		}
	}
	add_action( 'rb_blog_one_date_meta', 'rb_blog_one_date_meta_output' );
}

/**
 * 05. Post Category Meta
 */
if ( ! function_exists( 'rb_blog_one_category_meta_output' ) ) {
	/**
	 * Display post category meta with icon.
	 *
	 * Outputs the category link with a user-category icon.
	 * Respects RTL layouts for proper ordering.
	 *
	 * @return void
	 */
	function rb_blog_one_category_meta_output() {
		$cats_list = get_the_category_list( ', ' );
		if ( has_category() ) {
			?>
			<div class="cat-post-meta">
				<?php if ( is_rtl() ) : ?>
					<?php echo wp_kses_post( $cats_list, 'rb-blog-one' ); ?>
					<i class="fa-regular fa-folder-open"></i>
				<?php else : ?>
					<i class="fa-regular fa-folder-open"></i>
					<?php echo wp_kses_post( $cats_list, 'rb-blog-one' ); ?>
				<?php endif; ?>
			</div>
			<?php
		}
	}
	add_action( 'rb_blog_one_category_meta', 'rb_blog_one_category_meta_output' );
}

/**
 * 06. Post Tag Meta
 */
if ( ! function_exists( 'rb_blog_one_tag_meta_output' ) ) {
	/**
	 * Display post tag meta with icon.
	 *
	 * Outputs the tag link with a user-tag icon.
	 * Respects RTL layouts for proper ordering.
	 *
	 * @return void
	 */
	function rb_blog_one_tag_meta_output() {
		$tags_list = get_the_tag_list( '', ', ' );
		if ( has_tag() ) {
			?>
			<div class="tag-post-meta">
				<?php if ( is_rtl() ) : ?>
					<?php echo wp_kses_post( $tags_list, 'rb-blog-one' ); ?>
					<i class="fa-solid fa-tags"></i>
				<?php else : ?>
					<i class="fa-solid fa-tags"></i>
					<?php echo wp_kses_post( $tags_list, 'rb-blog-one' ); ?>
				<?php endif; ?>
			</div>
			<?php
		}
	}
	add_action( 'rb_blog_one_tag_meta', 'rb_blog_one_tag_meta_output' );
}

/**
 * 07. Post View Meta
 */
if ( ! function_exists( 'rb_blog_one_view_meta_output' ) ) {
	/**
	 * Increment post views count.
	 *
	 * @param int $post_id Post ID.
	 */
	function rb_blog_one_set_post_views( $post_id ) {
		$meta_key = 'post_views_count';
		$count    = (int) get_post_meta( $post_id, $meta_key, true );

		++$count;
		update_post_meta( $post_id, $meta_key, $count );
	}

	/**
	 * Retrieve post views count.
	 *
	 * @param int $post_id Post ID.
	 * @return int Views count.
	 */
	function rb_blog_one_get_post_views( $post_id ) {
		$meta_key = 'post_views_count';
		$count    = (int) get_post_meta( $post_id, $meta_key, true );

		if ( 0 === $count ) {
			delete_post_meta( $post_id, $meta_key );
			add_post_meta( $post_id, $meta_key, 0 );
		}

		return $count;
	}

	/**
	 * Count a view on single posts (front end only).
	 */
	function rb_blog_one_track_post_views() {
		if ( is_singular( 'post' ) && ! is_preview() && ! is_admin() ) {
			$post_id = get_the_ID();

			if ( $post_id ) {
				rb_blog_one_set_post_views( $post_id );
			}
		}
	}
	add_action( 'wp', 'rb_blog_one_track_post_views' );

	/**
	 * Display post views meta with icon.
	 *
	 * @return void
	 */
	function rb_blog_one_view_meta_output() {
		$views     = rb_blog_one_get_post_views( get_the_ID() );
		$icon_html = '<i class="fa-regular fa-eye"></i>';

		if ( 0 === (int) $views ) {
			$label = esc_html__( 'view', 'rb-blog-one' );
		} elseif ( 1 === (int) $views ) {
			$label = esc_html__( 'view', 'rb-blog-one' );
		} else {
			$label = esc_html__( 'views', 'rb-blog-one' );
		}

		$views_html = sprintf(
			'<span class="view-meta">%1$d %2$s</span>',
			(int) $views,
			esc_html( $label )
		);

		if ( is_rtl() ) {
			printf(
				'<div class="view-post-meta">%1$s %2$s</div>',
				wp_kses_post( $views_html ),
				wp_kses_post( $icon_html )
			);
		} else {
			printf(
				'<div class="view-post-meta">%1$s %2$s</div>',
				wp_kses_post( $icon_html ),
				wp_kses_post( $views_html )
			);
		}
	}
	add_action( 'rb_blog_one_view_meta', 'rb_blog_one_view_meta_output' );
}

/**
 * 08. Post Read Meta
 */
if ( ! function_exists( 'rb_blog_one_read_meta_output' ) ) {
	/**
	 * Display post reading time meta with icon
	 */
	function rb_blog_one_read_meta_output() {
		$content    = get_post_field( 'post_content', get_the_ID() );
		$word_count = str_word_count( wp_strip_all_tags( $content ) );
		$wpm        = (int) get_theme_mod( 'rbth_read_word', 200 );
		if ( $wpm ) {
			$minutes = ceil( $word_count / max( 1, $wpm ) );
		} else {
			$minutes = ceil( $word_count / 100 );
		}

		// Handle singular/plural labels.
		if ( 0 === (int) $minutes ) {
			$read_label = esc_html__( '0 minute', 'rb-blog-one' );
		} elseif ( 1 === (int) $minutes ) {
			$read_label = esc_html__( '1 minute', 'rb-blog-one' );
		} else {
			/* translators: %s: number of minutes */
			$read_label = sprintf( esc_html__( '%s minutes', 'rb-blog-one' ), $minutes );
		}

		// Prepare icon HTML.
		$icon_html = wp_kses_post( '<i class="fa-solid fa-book-open-reader"></i>' );

		// Wrap in span for styling.
		$read_html = sprintf(
			'<span class="read-post-meta-text">%s</span>',
			$read_label
		);

		// Allowed HTML tags.
		$allowed_tags = array(
			'span' => array(
				'class' => true,
			),
			'i'    => array(
				'class' => true,
			),
			'div'  => array(
				'class' => true,
			),
		);

		// RTL-aware output.
		if ( is_rtl() ) {
			echo '<div class="read-post-meta">';
			echo wp_kses( $read_html . $icon_html, $allowed_tags );
			echo '</div>';
		} else {
			echo '<div class="read-post-meta">';
			echo wp_kses( $icon_html . $read_html, $allowed_tags );
			echo '</div>';
		}
	}
	add_action( 'rb_blog_one_read_meta', 'rb_blog_one_read_meta_output' );
}

/**
 * 09. Post Edit Meta
 */
if ( ! function_exists( 'rb_blog_one_edit_meta_output' ) ) {
	/**
	 * Display post edit meta with icon.
	 *
	 * Outputs the edit link with a user-edit icon.
	 * Respects RTL layouts for proper ordering.
	 *
	 * @return void
	 */
	function rb_blog_one_edit_meta_output() {
		global $post;

		if ( ! $post || ! current_user_can( 'edit_post', $post->ID ) ) {
			return;
		}

		$edit_url  = get_edit_post_link( $post->ID );
		$icon_html = '<i class="fa-regular fa-pen-to-square"></i>';
		$link_html = sprintf(
			'<a href="%s">%s</a>',
			esc_url( $edit_url ),
			esc_html__( 'Edit Post', 'rb-blog-one' )
		);

		if ( is_rtl() ) {
			printf(
				'<div class="edit-post-meta">%1$s %2$s</div>',
				wp_kses_post( $link_html ),
				wp_kses_post( $icon_html )
			);
		} else {
			printf(
				'<div class="edit-post-meta">%1$s %2$s</div>',
				wp_kses_post( $icon_html ),
				wp_kses_post( $link_html )
			);
		}
	}
	add_action( 'rb_blog_one_edit_meta', 'rb_blog_one_edit_meta_output' );
}
