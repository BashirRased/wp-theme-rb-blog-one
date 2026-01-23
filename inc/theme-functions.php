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
 * +++++ 01. Single Page Pagination
 * +++++ 02. Custom Comment Form
 * +++++ 03. Custom Comment List
 * +++++ 04. Register custom block styles
 * +++++ 05. Register custom block patterns
 */

/**
 * 01. Single Page Pagination
 */
if ( ! function_exists( 'rb_blog_one_single_page_pagination_custom' ) ) {
	/**
	 * Output single page pagination for paginated posts.
	 *
	 * @return void
	 */
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
 * 02. Custom Comment Form
 */
if ( ! function_exists( 'rb_blog_one_custom_comment_form' ) ) {
	/**
	 * Customize the comment form field order.
	 *
	 * @param array $fields Default comment form fields.
	 * @return array Modified comment form fields.
	 */
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
}

/**
 * 03. Custom Comment List
 */
if ( ! function_exists( 'rb_blog_one_comment_list' ) ) {
	/**
	 * Custom comment list callback.
	 *
	 * @param WP_Comment $comment Comment object.
	 * @param array      $args    Comment arguments.
	 * @param int        $depth   Comment depth.
	 * @return void
	 */
	function rb_blog_one_comment_list( $comment, $args, $depth ) {
		?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'comment-item' ); ?>>
			<div class="comments-box">
				<div class="comments-avatar">
					<?php echo get_avatar( $comment, 90 ); ?>
				</div>

				<div class="comments-text">

					<h5 class="avatar-name">
						<?php echo esc_html( get_comment_author() ); ?>
					</h5>

					<div class="comments-meta">
						<span class="comments-meta-icon">
							<i class="fa-regular fa-calendar-days"></i>
						</span>
						<span><?php echo esc_html( get_comment_date() ); ?></span>
						<span><?php echo esc_html( get_comment_time() ); ?></span>
					</div>

					<div class="comments-content">
						<?php echo wp_kses_post( get_comment_text() ); ?>
					</div>

					<div class="comments-reply">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'reply_text' => esc_html__( 'Reply', 'rb-blog-one' ),
									'depth'      => $depth,
									'max_depth'  => $args['max_depth'],
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

/**
 * 04. Register custom block styles
 */
if ( ! function_exists( 'rb_blog_one_register_block_styles' ) ) {
	/**
	 * Register custom block styles.
	 */
	function rb_blog_one_register_block_styles() {
		register_block_style(
			'core/button',
			array(
				'name'  => 'rb-blog-one-button',
				'label' => esc_html__( 'RB Blog One Button', 'rb-blog-one' ),
			)
		);
	}
	add_action( 'init', 'rb_blog_one_register_block_styles' );
}

/**
 * 05. Register custom block patterns
 */
if ( ! function_exists( 'rb_blog_one_register_block_patterns' ) ) {
	/**
	 * Register custom block patterns.
	 */
	function rb_blog_one_register_block_patterns() {
		register_block_pattern(
			'rb-blog-one/button',
			array(
				'title'       => __( 'RB Blog One Button', 'rb-blog-one' ),
				'description' => __( 'A simple button block.', 'rb-blog-one' ),
				'content'     => '
					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-rb-blog-one-button"} -->
						<div class="wp-block-button is-style-rb-blog-one-button">
							<a class="wp-block-button__link" href="#">Click Here</a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				',
			)
		);
	}
	add_action( 'init', 'rb_blog_one_register_block_patterns' );
}
