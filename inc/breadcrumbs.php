<?php
/**
 * Theme Functions - Breadcrumbs.
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
 * +++++ 01. Breadcrumbs Title
 * +++++ 02. Breadcrumbs Description
 * +++++ 03. Breadcrumbs Navbar
 */

/**
 * 01. Breadcrumbs Title
 */
if ( ! function_exists( 'rb_blog_one_breadcrumbs_title_output' ) ) {
	/**
	 * Display dynamic breadcrumbs title
	 */
	function rb_blog_one_breadcrumbs_title_output() {
		// Default WordPress pages.
		if ( empty( $title ) ) {
			if ( is_front_page() && is_home() ) {
				$title = esc_html__( 'Home', 'rb-blog-one' );
			} elseif ( is_front_page() ) {
				$title = esc_html__( 'Home', 'rb-blog-one' );
			} elseif ( is_home() ) {
				$title = esc_html__( 'Blog', 'rb-blog-one' );
			} elseif ( is_404() ) {
				$title = esc_html__( '404 Error', 'rb-blog-one' );
			} elseif ( is_search() ) {
				$title = sprintf(
					/* translators: %s: Search query. */
					esc_html__( 'Search results for: %s', 'rb-blog-one' ),
					get_search_query()
				);
			} elseif ( is_singular() ) {
				$title = get_the_title();
			} elseif ( is_post_type_archive() ) {
				$post_type     = get_query_var( 'post_type' );
				$post_type_obj = get_post_type_object( $post_type );

				if ( $post_type_obj && ! empty( $post_type_obj->labels->name ) ) {
					$title = $post_type_obj->labels->name;
				} else {
					$title = esc_html__( 'Archives', 'rb-blog-one' );
				}
			} elseif ( is_category() ) {
				$title = sprintf(
					/* translators: %s: category name. */
					esc_html__( 'Category: %s', 'rb-blog-one' ),
					single_cat_title( '', false ) ?? ''
				);
			} elseif ( is_tag() ) {
				$title = sprintf(
					/* translators: %s: tag name. */
					esc_html__( 'Tag: %s', 'rb-blog-one' ),
					single_tag_title( '', false ) ?? ''
				);
			} elseif ( is_tax() ) {
				// Handle any custom taxonomy term page.
				$term  = get_queried_object();
				$title = $term ? $term->name : esc_html__( 'Archives', 'rb-blog-one' );
			} elseif ( is_author() ) {
				$author = get_queried_object();
				$title  = sprintf(
					/* translators: %s: Author name. */
					esc_html__( 'Author: %s', 'rb-blog-one' ),
					$author->display_name ?? ''
				);
			} elseif ( is_archive() ) {
				$title = get_the_archive_title();
			} else {
				$title = get_bloginfo( 'name' );
			}
		}
		// Remove any HTML tags from other sources, just in case.
		$title = wp_strip_all_tags( $title );
		echo '<h2 class="breadcrumb-title">' . esc_html( $title ) . '</h2>';
	}
	add_action( 'rb_blog_one_breadcrumbs_title', 'rb_blog_one_breadcrumbs_title_output' );
}

/**
 * 02. Breadcrumbs Description
 */
if ( ! function_exists( 'rb_blog_one_breadcrumbs_description_output' ) ) {
	/**
	 * Display dynamic breadcrumbs description.
	 *
	 * @return void
	 */
	function rb_blog_one_breadcrumbs_description_output() {
		$description = get_the_archive_description();

		if ( $description ) {
			if ( is_author() ) {
				?>
				<div class="breadcrumb-description">
					<?php echo wp_kses_post( $description ); ?>
				</div>
				<?php
			} elseif ( is_category() ) {
				?>
				<div class="breadcrumb-description">
					<?php echo wp_kses_post( $description ); ?>
				</div>
				<?php
			} elseif ( is_tag() ) {
				?>
				<div class="breadcrumb-description">
					<?php echo wp_kses_post( $description ); ?>
				</div>
				<?php
			} elseif ( is_tax() ) {
				?>
				<div class="breadcrumb-description">
					<?php echo wp_kses_post( $description ); ?>
				</div>
				<?php
			}
		}
	}
	add_action( 'rb_blog_one_breadcrumb_description', 'rb_blog_one_breadcrumbs_description_output' );
}

/**
 * 03. Breadcrumbs Navbar
 */
if ( ! function_exists( 'rb_blog_one_breadcrumbs_navbar_output' ) ) {
	/**
	 * Display dynamic breadcrumbs menu.
	 */
	function rb_blog_one_breadcrumbs_navbar_output() {
		$home_url  = home_url( '/' );
		$home_icon = '<i class="fas fa-home"></i>';
		$separator = '<li><span class="fas fa-angle-right"></span></li>';
		$current   = '';
		$middle    = '';

		// Determine current page title.
		if ( is_front_page() ) {
			$current = esc_html__( 'Home', 'rb-blog-one' );
		} elseif ( is_404() ) {
			$current = esc_html__( '404 Error', 'rb-blog-one' );
		} elseif ( is_search() ) {
			$current = sprintf(
				/* translators: %s: search query. */
				esc_html__( 'Search results for: %s', 'rb-blog-one' ),
				get_search_query()
			);
		} elseif ( is_singular() ) {
			$post_type = get_post_type();

			// Custom post types (exclude normal pages).
			if ( $post_type && 'post' !== $post_type && 'page' !== $post_type ) {
				$post_type_obj = get_post_type_object( $post_type );
				if ( $post_type_obj ) {
					if ( ! empty( $post_type_obj->has_archive ) ) {
						$middle = '<li><a href="' . esc_url( get_post_type_archive_link( $post_type ) ) . '">' . esc_html( $post_type_obj->labels->name ) . '</a></li>';
					} else {
						$middle = '<li>' . esc_html( $post_type_obj->labels->name ) . '</li>';
					}
				}
			}

			// Current page title.
			$current = get_the_title();

		} elseif ( is_post_type_archive() ) {
			$post_type     = get_query_var( 'post_type' );
			$post_type_obj = get_post_type_object( $post_type );
			$current       = $post_type_obj && ! empty( $post_type_obj->labels->name )
				? $post_type_obj->labels->name
				: esc_html__( 'Archives', 'rb-blog-one' );
		} elseif ( is_category() ) {
			$current = sprintf(
				/* translators: %s: category name. */
				esc_html__( 'Category: %s', 'rb-blog-one' ),
				single_cat_title( '', false ) ?? ''
			);
		} elseif ( is_tag() ) {
			$current = sprintf(
				/* translators: %s: tag name. */
				esc_html__( 'Tag: %s', 'rb-blog-one' ),
				single_tag_title( '', false ) ?? ''
			);
		} elseif ( is_tax() ) {
			$term    = get_queried_object();
			$current = $term ? $term->name : esc_html__( 'Archives', 'rb-blog-one' );

		} elseif ( is_author() ) {
			$author  = get_queried_object();
			$current = sprintf(
				/* translators: %s: author name. */
				esc_html__( 'Author: %s', 'rb-blog-one' ),
				$author->display_name ?? ''
			);

		} elseif ( is_archive() ) {
			$current = wp_strip_all_tags( get_the_archive_title() );

		} else {
			$current = get_bloginfo( 'name' );
		}

		// Remove any leftover HTML tags just in case.
		$current = wp_strip_all_tags( $current );

		// Start breadcrumb output.
		echo '<nav class="breadcrumb-nav"><ul>';

		if ( ! is_front_page() ) {
			// Home link.
			echo '<li><a href="' . esc_url( $home_url ) . '">' . wp_kses_post( $home_icon ) . esc_html__( 'Home', 'rb-blog-one' ) . '</a></li>';
			echo wp_kses_post( $separator );

			// Only show middle link for custom post types (skip normal pages/posts).
			if ( ! empty( $middle ) ) {
				echo wp_kses_post( $middle );
				echo wp_kses_post( $separator );
			}

			// Current page.
			if ( ! empty( $current ) ) {
				echo '<li>' . esc_html( $current ) . '</li>';
			}
		} else {
			// On front page.
			echo wp_kses_post( $home_icon ) . '<li>' . esc_html__( 'Home', 'rb-blog-one' ) . '</li>';
		}

		echo '</ul></nav>';
	}

	add_action( 'rb_blog_one_breadcrumbs_navbar', 'rb_blog_one_breadcrumbs_navbar_output' );
}
