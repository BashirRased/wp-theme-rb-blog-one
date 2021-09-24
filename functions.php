<?php
/**
 * RB Blog One functions and definitions
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog One 1.0.6
 */

// Prefix With File Directory
define('RB_BLOG_ONE_VERSION','1.0.6');
define('RB_BLOG_ONE_WP_CSS',get_stylesheet_uri());
define('RB_BLOG_ONE_URL',get_template_directory_uri());
define('RB_BLOG_ONE_CSS',RB_BLOG_ONE_URL.'/assets/css/');
define('RB_BLOG_ONE_JS',RB_BLOG_ONE_URL.'/assets/js/');
define('RB_BLOG_ONE_IMG',RB_BLOG_ONE_URL.'/assets/img/');

// after theme setup
if (!function_exists('rb_blog_one_theme_setup')) :
function rb_blog_one_theme_setup(){
    
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');
    
    // Website Title-Slug
	add_theme_support('title-tag');
    
    // Feature Image
	add_theme_support('post-thumbnails');
    
    // Logo Image Register
	add_theme_support('custom-logo',array(
		'height'      => 80,
        'flex-height' => true,
        'header-text' => array('site-title','site-description')
	));
    
    // Menu Register
    register_nav_menus(array(
        'social_icons_menu'  => __('Social Icons Menu','rb-blog-one'),
        'header_menu' => __('Header Menu','rb-blog-one')
    ));
    
    // Set content-width.
	$GLOBALS['content_width'] = apply_filters( 'rb_blog_one_content_width', 667 );
    
    // Force the editor styles to match the theme's UI.
    add_editor_style();
}
endif;
add_action('after_setup_theme','rb_blog_one_theme_setup');

// Include CSS & JS Files
function rb_blog_one_css_js_files_add(){
    
    // Google Font v1.0.6
	wp_enqueue_style('google-fonts','http://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Roboto&display=swap','','1.0.6','all');
    
    // Font Awesome v5.14.0
	wp_enqueue_style('font-awesome',RB_BLOG_ONE_CSS.'font-awesome-5.14.0.min.css','','5.14.0','all');
    wp_enqueue_style('font-awesome-brands',RB_BLOG_ONE_CSS.'font-awesome-brands-5.14.0.min.css','','5.14.0','all');
    wp_enqueue_style('rb-font-awesome-solid',RB_BLOG_ONE_CSS.'font-awesome-solid-5.14.0.min.css','','5.14.0','all');
    
    // Bootstrap 5 v4.5.0
	wp_enqueue_style('bootstrap-css',RB_BLOG_ONE_CSS.'bootstrap-4.5.0.min.css','','4.5.0','all');
    wp_enqueue_script('popper-js',RB_BLOG_ONE_JS.'popper-1.16.0.min.js',array('jquery'),'1.16.0',true);
    wp_enqueue_script('bootstrap-js',RB_BLOG_ONE_JS.'bootstrap-4.5.0.min.js',array('jquery'),'4.5.0',true);
    
    // Nicescroll v3.5.4
	wp_enqueue_script('nicescroll-js',RB_BLOG_ONE_JS.'jquery.nicescroll-3.5.4.min.js',array('jquery'),'3.5.4',true);
    
    // Normalize v8.0.1
	wp_enqueue_style('normalize-css',RB_BLOG_ONE_CSS.'normalize-8.0.1.min.css','','8.0.1','all');
    
    // Modernizr v2.8.3
	wp_enqueue_script('modernizr-js',RB_BLOG_ONE_JS.'modernizr-2.8.3.min.js',array('jquery'),'2.8.3',true);
    
    // html5shim conditional js
	wp_enqueue_script('html5shim-js',RB_BLOG_ONE_JS.'html5shiv-printshiv-3.7.3.min.js', array(),'3.7.3',false);
	wp_script_add_data('html5shim-js','conditional','lt IE 9');
	
    // respond conditional js
	wp_enqueue_script('respond-js',RB_BLOG_ONE_JS.'respond-1.4.2.min.js',array(),'1.4.2',false);
	wp_script_add_data('respond-js','conditional','lt IE 9');
    
    // Comment Reply v1.0.6    
    if ((! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script('comment-reply');
	}
    
    // Template CSS & JS v1.0.6
	wp_enqueue_style('rb-blog-one-style',RB_BLOG_ONE_CSS.'style.css','',RB_BLOG_ONE_VERSION,'all');
    wp_enqueue_style('rb-blog-one-responsive',RB_BLOG_ONE_CSS.'responsive.css','',RB_BLOG_ONE_VERSION,'all');
    wp_enqueue_script('rb-blog-one-custom',RB_BLOG_ONE_JS.'custom.js',array('jquery'),RB_BLOG_ONE_VERSION,true);

	// Main Style
	wp_enqueue_style('rb-wp-stylesheet',RB_BLOG_ONE_WP_CSS,'','1.0.6','all');
    
}
add_action('wp_enqueue_scripts','rb_blog_one_css_js_files_add');

// widget register
function rb_blog_one_sidebar_add(){
	register_sidebar(array(
		'name' 			=> __('Right Sidebar','rb-blog-one'),
		'description' 	=> __('Add your Right Sidebar Widgets Here', 'rb-blog-one'),
		'id' 			=> 'rb-blog-one-right-sidebar',
		'before_widget' => '<div class="rb-blog-one-single-widget">',
		'after_widget' 	=> '</div>',
        'before_title' 	=> '<div class="rb-blog-one-widget-title"><h4>',
		'after_title' 	=> '</h4></div>'
	));
}
add_action('widgets_init', 'rb_blog_one_sidebar_add');

// post excerpt setup
function rb_blog_one_custom_excerpt_length($length) {
    return 20;
}
add_filter( 'excerpt_length', 'rb_blog_one_custom_excerpt_length', 999 );

//Comment Field Order
function rb_blog_one_comment_fields_custom_order( $rb_blog_one_fields ) {
    $rb_blog_one_comment_field = $rb_blog_one_fields['comment'];
    $rb_blog_one_author_field = $rb_blog_one_fields['author'];
    $rb_blog_one_email_field = $rb_blog_one_fields['email'];
    $rb_blog_one_cookies_field = $rb_blog_one_fields['cookies'];
    unset( $rb_blog_one_fields['comment'] );
    unset( $rb_blog_one_fields['author'] );
    unset( $rb_blog_one_fields['email'] );
    unset( $rb_blog_one_fields['url'] );
    unset( $rb_blog_one_fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $rb_blog_one_fields['author'] = $rb_blog_one_author_field;
    $rb_blog_one_fields['email'] = $rb_blog_one_email_field;
    $rb_blog_one_fields['comment'] = $rb_blog_one_comment_field;
    $rb_blog_one_fields['cookies'] = $rb_blog_one_cookies_field;
    // done ordering, now return the fields:
    return $rb_blog_one_fields;
}
add_filter( 'comment_form_fields', 'rb_blog_one_comment_fields_custom_order' );

//Comment List collback function
if (!function_exists('rb_blog_one_comment_list')):
function rb_blog_one_comment_list($comment, $args, $depth){
?>

<ul>
    <li id="rb-blog-one-comment-<?php comment_ID(); ?>" class="rb-blog-one-comment-body">

        <!--===== Comment Author Left Area Start Here =====-->
        <div class="rb-blog-one-comment-author-left">
            <?php echo get_avatar($comment); ?>
        </div>
        <!--===== Comment Author Left Area End Here =====-->

        <!--===== Comment Author Right Area Start Here =====-->
        <div class="rb-blog-one-comment-author-right">
            <div class="rb-blog-one-comment-author-bio">

                <?php
                printf(
                /* translators: comment author */
                __('<h5 class="rb-blog-one-comment-author">%s</h5>', 'rb-blog-one'),get_comment_author_link()
                );
                ?>

                <div class="rb-blog-one-comment-reply">
                    <?php 
				// Display comment reply link
				comment_reply_link( array_merge( $args, array(
					'reply_text' => __('<i class="fas fa-reply"></i> Reply', 'rb-blog-one'),
					'depth'     => $depth,
					'max_depth' => $args['max_depth']
				)));  ?>
                </div>

            </div>

            <div class="rb-blog-one-comment-meta">

                <div class="rb-blog-one-comment-time">
                    <a href="<?php echo esc_url(get_comment_link()); ?>">
                        <span class="fas fa-calendar-alt"></span>
                        <span><?php echo get_comment_date('l, d F, Y H:i A'); ?></span>
                    </a>
                </div>

                <?php edit_comment_link('<i class="fas fa-edit"></i> Edit', '<div class="rb-blog-one-comment-edit">', '</div>'); ?>
            </div>

            <div class="rb-blog-one-comment-desc">
               
                <?php comment_text(); ?>
                
                <?php
				// If comments are closed and there are comments, let's leave a little note, shall we?
		        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
                <div class="comment-awaiting-moderation">
                    <?php echo esc_html__( 'Your comment is awaiting moderation.', 'rb-blog-one' ); ?>
                </div>
                <?php endif; ?>
                
            </div>

        </div>
        <!--===== Comment Author Right Area End Here =====-->

    </li>
</ul>

<?php
} endif;

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function rb_blog_one_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'rb-blog-one' ) . '</a>';
}

add_action( 'wp_body_open', 'rb_blog_one_skip_link', 5 );