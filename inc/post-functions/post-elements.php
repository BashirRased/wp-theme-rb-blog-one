<?php
/**
 * Post Functions - Post Elements
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
 * +++++ 01. Post Thumbnail
 * +++++ 02. Post Title
 * +++++ 03. Post Pagination
 */

/**
 * 01. Post Thumbnail
 */
if ( ! function_exists( 'rb_blog_one_post_thumbnail_output' ) ) {
	/**
	 * Check Post Permission
	 */
	function rb_blog_one_can_show_post_thumbnail() {
		return apply_filters(
			'rb_blog_one_can_show_post_thumbnail',
			! post_password_required() && ! is_attachment() && has_post_thumbnail()
		);
	}

	/**
	 * Output Post Thumbnail
	 */
	function rb_blog_one_post_thumbnail_output() {
		if ( ! rb_blog_one_can_show_post_thumbnail() ) {
			return;
		}
		?>
		<figure class="post-thumbnail">
			<?php
			// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
			the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
			if ( is_singular( 'attachment' ) ) :
				if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) :
					?>
					<figcaption class="wp-caption-text">
						<?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?>
					</figcaption>
					<?php
				endif;
			endif;
			?>
		</figure><!-- .post-thumbnail -->
		<?php
	}
	add_action( 'rb_blog_one_post_thumbnail', 'rb_blog_one_post_thumbnail_output' );
}

/**
 * 02. Post Title
 */
if ( ! function_exists( 'rb_blog_one_post_title_output' ) ) {
	/**
	 * Output post title.
	 *
	 * @return void
	 */
	function rb_blog_one_post_title_output() {
		$post_title    = get_the_title();
		$show_fallback = get_theme_mod( 'rbth_post_title_blog', false );
		$permalink     = get_permalink();
		$is_single     = is_single();

		// If post has a title.
		if ( ! empty( $post_title ) ) {
			if ( $is_single ) {
				the_title( '<h1 class="post-title">', '</h1>' );
			} else {
				the_title(
					sprintf(
						'<h2 class="post-title"><a href="%s">',
						esc_url( $permalink )
					),
					'</a></h2>'
				);
			}
			return;
		}

		// Fallback title if enabled.
		if ( true === $show_fallback ) {
			$fallback_title = esc_html__( 'No set post title', 'your-textdomain' );

			if ( $is_single ) {
				echo '<h1>' . esc_html( $fallback_title ) . '</h1>';
			} else {
				echo '<h2 class="post-title"><a href="' . esc_url( $permalink ) . '">' . esc_html( $fallback_title ) . '</a></h2>';
			}
		}
	}

	add_action( 'rb_blog_one_post_title', 'rb_blog_one_post_title_output' );
}

/**
 * 03. Post Pagination
 */
if ( ! function_exists( 'rb_blog_one_pagination_output' ) ) {
	/**
	 * Output post pagination.
	 *
	 * @return void
	 */
	function rb_blog_one_pagination_output() {
		if ( is_rtl() ) {
			$prev_btn = '<i class="fa-solid fa-chevron-right"></i>';
			$next_btn = '<i class="fa-solid fa-chevron-left"></i>';
		} else {
			$prev_btn = '<i class="fa-solid fa-chevron-left"></i>';
			$next_btn = '<i class="fa-solid fa-chevron-right"></i>';
		}
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => $prev_btn,
				'next_text' => $next_btn,
			)
		);
	}
	add_action( 'rb_blog_one_pagination', 'rb_blog_one_pagination_output' );
}