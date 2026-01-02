<?php
/**
 * Theme Functions - General.
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
 * +++++ 01. Header Menu Nav Walker
 * +++++ 02. Breadcrumb Title
 * +++++ 03. Breadcrumb Description
 * +++++ 04. Breadcrumb Navbar
 * +++++ 05. Post thumbnail show permission
 * +++++ 06. Post thumbnail
 * +++++ 07. Category Meta
 * +++++ 08. Author Meta
 * +++++ 05. Date Meta
 * +++++ 05. Comments Meta
 * +++++ 05. Tag Meta
 * +++++ 05. Post Excerpt Length
 * +++++ 05. Read More Button
 * +++++ 05. Post Pagination
 * +++++ 05. Single Page Pagination
 * +++++ 05. Custom Comment Form
 * +++++ 05. Custom Comment List
 * +++++ 05. TGM Plugin Add
 */

/**
 * 01. Prefix with file directory
 */
if ( ! function_exists( 'rb_blog_one_custom_excerpt_length' ) ) {
	function rb_blog_one_custom_excerpt_length( $length ) {
		if ( true == get_theme_mod( 'rbth_excerpt' ) ) {
			$length = get_theme_mod( 'rbth_excerpt_word' );
			if ( $length ) {
				return $length;
			} else {
				return absint( 20 );
			}
		} else {
			$length = absint( 20 );
			return $length;
		}
	}
}
add_filter( 'excerpt_length', 'rb_blog_one_custom_excerpt_length', 999 );

/**
 * 01. Prefix with file directory
 */
if ( ! function_exists( 'rb_blog_one_read_more_btn' ) ) {
	function rb_blog_one_read_more_btn( $more ) {
		$more_text = '[...]';
		$more      = sprintf(
			/*
			translators:
			%1$s: Slug of current post.
			%2$s: Button text.
			*/
			'' . $more_text . '<div class="read-more-btn"><a class="theme-btn" href="%1$s">%2$s</a></div>',
			esc_url( get_permalink( get_the_ID() ) ),
			esc_html__( 'read more', 'rb-blog-one' )
		);
		return $more;
	}
	add_filter( 'excerpt_more', 'rb_blog_one_read_more_btn' );
}

/**
 * 01. Prefix with file directory
 */
if ( ! function_exists( 'rb_blog_one_single_page_pagination_custom' ) ) {
	function rb_blog_one_single_page_pagination_custom() {
		$page_link = array(
			'before' => '<div class="single-page-pagination">',
			'after'  => '</div>',
			'echo'   => 1,
		);
		wp_link_pages( $page_link );
	}
	add_action( 'rb_blog_one_single_page_pagination', 'rb_blog_one_single_page_pagination_custom' );
}

/**
 * 01. Prefix with file directory
 */
if ( ! function_exists( 'rb_blog_one_custom_comment_form' ) ) {
}
function rb_blog_one_custom_comment_form( $fields ) {
	// What fields you want to control.
	$comment_field_author  = $fields['author'];
	$comment_field_email   = $fields['email'];
	$comment_field_url     = $fields['url'];
	$comment_field_massage = $fields['comment'];
	$comment_field_cookies = $fields['cookies'];

	// The fields you want to unset (remove).
	unset( $fields['author'] );
	unset( $fields['email'] );
	unset( $fields['url'] );
	unset( $fields['comment'] );
	unset( $fields['cookies'] );

	// Display the fields to your own taste.
	// The order in which you place them will determine in what order they are displayed.
	$fields['author']  = $comment_field_author;
	$fields['email']   = $comment_field_email;
	$fields['url']     = $comment_field_url;
	$fields['comment'] = $comment_field_massage;
	$fields['cookies'] = $comment_field_cookies;

	return $fields;
}
add_filter( 'comment_form_fields', 'rb_blog_one_custom_comment_form' );

/**
 * 01. Prefix with file directory
 */
if ( ! function_exists( 'rb_blog_one_comment_list' ) ) {
	function rb_blog_one_comment_list( $comment, $args, $depth ) {
		$GLOBAL['comment']  = $comment;
		$args['reply_text'] = 'Reply';
		$replayClass        = 'comment-depth-' . esc_attr( $depth );
		?>
			<li id="comment-<?php comment_ID(); ?>" class="comment-item">
				<div class="comments-box">
					<div class="comments-avatar">
						<?php echo get_avatar( $comment, '90' ); ?>
					</div>
					<div class="comments-text">

						<h5 class="avatar-name"><?php echo get_comment_author_link(); ?></h5>

						<div class="comments-meta">
							<span class="comments-meta-icon">
								<i class="fa-regular fa-calendar-days"></i>
							</span>
							<span>
								<?php comment_time( get_option( 'date_format' ) ); ?>
							</span>
							<span>
								<?php comment_time( get_option( 'time_format' ) ); ?>
							</span>
						</div>

						<div class="comments-content">
							<?php comment_text(); ?>
						</div>

						<div class="comments-replay">
							<?php
							comment_reply_link(
								array_merge(
									$args,
									array(
										'depth'     => $depth,
										'max_depth' => $args['max_depth'],
									)
								)
							);
							?>
						</div>

					</div>
				</div>
		<?php
	}
}
