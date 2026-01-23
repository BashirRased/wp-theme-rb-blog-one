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
 * +++++ 01. Post Item Column Class for Blog Page
 * +++++ 02. Post Thumbnail
 * +++++ 03. Post Title
 * +++++ 04. Read More Button
 * +++++ 05. Post Pagination
 * +++++ 06. Post Excerpt Default Before
 * +++++ 07. Post Excerpt Default
 * +++++ 08. Post Excerpt Default After
 * +++++ 09. Post Content Default Before
 * +++++ 10. Post Content Default
 * +++++ 11. Post Content Default After
 * +++++ 12. Post Content
 */

/**
 * 01. Post Item Column Class for Blog Page
 */
if ( ! function_exists( 'rb_blog_one_column_class' ) ) {
	/**
	 * Get Bootstrap column class for blog content area.
	 *
	 * @return string Bootstrap column class.
	 */
	function rb_blog_one_column_class() {

		if ( function_exists( 'rbth_get_sidebar_position' ) ) {
			$sidebar_position = rbth_get_sidebar_position();

			if ( 'left-sidebar' === $sidebar_position || 'right-sidebar' === $sidebar_position ) {
				return 'col-lg-8';
			}
		}

		return 'col-lg-12';
	}
}

/**
 * 02. Post Thumbnail
 */
if ( ! function_exists( 'rb_blog_one_post_thumbnail_output' ) ) {
	/**
	 * Get default post thumbnail image URL.
	 *
	 * @return string
	 */
	function rb_blog_one_get_default_thumbnail_url() {
		return trailingslashit( get_template_directory_uri() ) . 'assets/img/no-image.png';
	}

	/**
	 * Check whether post thumbnail can be displayed.
	 *
	 * @return bool
	 */
	function rb_blog_one_can_show_post_thumbnail() {
		return apply_filters(
			'rb_blog_one_can_show_post_thumbnail',
			! post_password_required() && ! is_attachment()
		);
	}

	/**
	 * Output post thumbnail or fallback image.
	 *
	 * Outputs nothing if no image is available and fallback is disabled.
	 *
	 * @return void
	 */
	function rb_blog_one_post_thumbnail_output() {
		if ( ! rb_blog_one_can_show_post_thumbnail() ) {
			return;
		}
		$post_title     = get_the_title();
		$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );
		?>
		<figure class="post-thumbnail">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'loading' => false,
					)
				);

			} elseif ( true === $show_thumbnail ) {
				?>
				<img
					src="<?php echo esc_url( rb_blog_one_get_default_thumbnail_url() ); ?>"
					alt="<?php echo esc_attr( $post_title ); ?>"
					title="<?php echo esc_attr( $post_title ); ?>"
					loading="eager"
					class="rb-fallback-thumbnail"
				/>
				<?php
			}

			// Show caption for singular attachment with featured image.
			if ( is_singular( 'attachment' ) && has_post_thumbnail() ) {
				$caption = wp_get_attachment_caption( get_post_thumbnail_id() );

				if ( ! empty( $caption ) ) {
					?>
					<figcaption class="wp-caption-text">
						<?php echo wp_kses_post( $caption ); ?>
					</figcaption>
					<?php
				}
			}
			?>
		</figure><!-- .post-thumbnail -->
		<?php
	}
	add_action( 'rb_blog_one_post_thumbnail', 'rb_blog_one_post_thumbnail_output' );
}

/**
 * 03. Post Title
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
			$fallback_title = esc_html__( 'No set post title', 'rb-blog-one' );

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
 * 04. Read More Button
 */
if ( ! function_exists( 'rb_blog_one_read_more_output' ) ) {
	/**
	 * Output Read More button for blog posts.
	 */
	function rb_blog_one_read_more_output() {
		$read_more = get_theme_mod( 'rbth_read_more_btn', 'off' );
		// Check Customizer toggle.
		if ( $read_more ) {
			printf(
				// translators: %1$s: Post permalink. %2$s: Button text.
				'<div class="read-more-btn"><a class="theme-btn" href="%1$s">%2$s</a></div>',
				esc_url( get_permalink( get_the_ID() ) ),
				esc_html__( 'Read More', 'rb-blog-one' )
			);
		}
	}
	add_action( 'rb_blog_one_read_more', 'rb_blog_one_read_more_output' );
}

/**
 * 05. Post Pagination
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

/**
 * 06. Post Excerpt Default Before
 */
if ( ! function_exists( 'rb_blog_one_excerpt_default_before_output' ) ) {
	/**
	 * Output opening markup before excerpt default.
	 *
	 * @return void
	 */
	function rb_blog_one_excerpt_default_before_output() {
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-list-item' ); ?>>
			<div class="row">
		<?php
	}
	add_action( 'rb_blog_one_excerpt_default_before', 'rb_blog_one_excerpt_default_before_output' );
}

/**
 * 07. Post Excerpt Default
 */
if ( ! function_exists( 'rb_blog_one_excerpt_default_output' ) ) {
	/**
	 * Output post excerpt default.
	 *
	 * @return void
	 */
	function rb_blog_one_excerpt_default_output() {
		// Check if thumbnail should show.
		$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );

		// Set column width based on thumbnail.
		if ( has_post_thumbnail() || true === $show_thumbnail ) {
			$post_item_col = 'col-lg-7';
		} else {
			$post_item_col = 'col-lg-12';
		}
		?>
		<?php if ( has_post_thumbnail() || true === $show_thumbnail ) : ?>
			<!-- Post Thumbnail -->
			<div class="col-lg-5">
				<?php do_action( 'rb_blog_one_post_thumbnail' ); ?>
			</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr( $post_item_col ); ?>">
			<?php
			do_action( 'rb_blog_one_category_meta_top' );
			do_action( 'rb_blog_one_post_title' );

			if (
				function_exists( 'rbth_render_post_meta' )
				&& 1 === (int) get_theme_mod( 'rbth_meta_list_on_off', 0 )
				&& ! empty( get_theme_mod( 'rbth_meta_list', array() ) )
			) {
				echo '<div class="post-meta">';
				rbth_render_post_meta();
				echo '</div>';
			} else {
				echo '<div class="post-meta">';
				do_action( 'rb_blog_one_author_meta' );
				do_action( 'rb_blog_one_date_meta' );
				do_action( 'rb_blog_one_comment_meta' );
				do_action( 'rb_blog_one_edit_meta' );
				echo '</div>';
			}

			$excerpt = get_the_excerpt();
			$excerpt = trim( wp_strip_all_tags( $excerpt ) );
			if ( ! empty( $excerpt ) ) {
				echo '<div class="post-excerpt">';
				the_excerpt();
				do_action( 'rb_blog_one_read_more' );
				echo '</div>';
			}
			?>
		</div>
		<?php
	}
	add_action( 'rb_blog_one_excerpt_default', 'rb_blog_one_excerpt_default_output' );
}

/**
 * 08. Post Excerpt Default After
 */
if ( ! function_exists( 'rb_blog_one_excerpt_default_after_output' ) ) {
	/**
	 * Output opening markup after excerpt default.
	 *
	 * @return void
	 */
	function rb_blog_one_excerpt_default_after_output() {
		?>
			</div><!-- .row -->
		</article><!-- .post-list-item -->
		<?php
	}
	add_action( 'rb_blog_one_excerpt_default_after', 'rb_blog_one_excerpt_default_after_output' );
}

/**
 * 09. Post Content Default Before
 */
if ( ! function_exists( 'rb_blog_one_content_default_before_output' ) ) {
	/**
	 * Output opening markup before content default.
	 *
	 * @return void
	 */
	function rb_blog_one_content_default_before_output() {
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single-item' ); ?>>
			<div class="row">
		<?php
	}
	add_action( 'rb_blog_one_content_default_before', 'rb_blog_one_content_default_before_output' );
}

/**
 * 10. Post Content Default
 */
if ( ! function_exists( 'rb_blog_one_content_default_output' ) ) {
	/**
	 * Output post content default.
	 *
	 * @return void
	 */
	function rb_blog_one_content_default_output() {
		// Check if thumbnail should show.
		$show_thumbnail = get_theme_mod( 'rbth_post_img_blog', false );
		echo '<div class="col-lg-12">';
		if ( has_post_thumbnail() || true === $show_thumbnail ) {
			do_action( 'rb_blog_one_post_thumbnail' );
		}
		do_action( 'rb_blog_one_category_meta_top' );
		do_action( 'rb_blog_one_post_title' );

		if (
			function_exists( 'rbth_render_post_meta' )
			&& 1 === (int) get_theme_mod( 'rbth_meta_list_on_off', 0 )
			&& ! empty( get_theme_mod( 'rbth_meta_list', array() ) )
		) {
			echo '<div class="post-meta">';
			rbth_render_post_meta();
			echo '</div>';
		} else {
			echo '<div class="post-meta">';
			do_action( 'rb_blog_one_author_meta' );
			do_action( 'rb_blog_one_date_meta' );
			do_action( 'rb_blog_one_comment_meta' );
			do_action( 'rb_blog_one_edit_meta' );
			echo '</div>';
		}
		echo '</div>';
	}
	add_action( 'rb_blog_one_content_default', 'rb_blog_one_content_default_output' );
}

/**
 * 11. Post Content Default After
 */
if ( ! function_exists( 'rb_blog_one_content_default_after_output' ) ) {
	/**
	 * Output opening markup after content default.
	 *
	 * @return void
	 */
	function rb_blog_one_content_default_after_output() {
		?>
			</div><!-- .row -->
		</article><!-- .post-single-item -->
		<?php if ( has_tag() ) : ?>
			<!-- Post Meta Bottom -->
			<div class="post-meta-bottom">
				<?php do_action( 'rb_blog_one_tag_meta' ); ?>
			</div>
			<?php
		endif;
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
	add_action( 'rb_blog_one_content_default_after', 'rb_blog_one_content_default_after_output' );
}

/**
 * 12. Post Content
 */
if ( ! function_exists( 'rb_blog_one_content_output' ) ) {
	/**
	 * Output post content.
	 *
	 * @return void
	 */
	function rb_blog_one_content_output() {
		$content = get_the_content();
		$content = trim( wp_strip_all_tags( $content ) );
		if ( ! empty( $content ) ) {
			echo '<div class="post-content">';
			the_content();
			echo '</div>';
		}
	}
	add_action( 'rb_blog_one_content', 'rb_blog_one_content_output' );
}
