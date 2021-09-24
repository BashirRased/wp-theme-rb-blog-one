<?php
/**
 * RB Blog One functions and definitions
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog 1.0.4
 */

// Prefix With File Directory
define('RB_WP_CSS',get_stylesheet_uri());
define('RB_URL',get_template_directory_uri());
define('RB_CSS',RB_URL.'/assets/css/');
define('RB_JS',RB_URL.'/assets/js/');
define('RB_IMG',RB_URL.'/assets/img/');

// after theme setup
function rb_theme_setup(){
    
    // Website Title-Slug
	add_theme_support('title-tag');
    
    // Feature Image
	add_theme_support('post-thumbnails');
    
    // RSS Link
    add_theme_support('automatic-feed-links');
    
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
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 667;
	}
    
    add_editor_style();
}
add_action('after_setup_theme','rb_theme_setup');

// Include CSS & JS Files
function rb_css_js_files_add(){
    
    // Google Font v1.0.4
	wp_enqueue_style('rb-google-fonts','href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Roboto&display=swap"','','1.0.4','all');
    
    // Normalize v8.0.1
	wp_enqueue_style('rb-normalize',RB_CSS.'normalize-8.0.1.min.css','','8.0.1','all');
    
    // Font Awesome v5.14.0
	wp_enqueue_style('rb-font-awesome-all',RB_CSS.'font-awesome-5.14.0.min.css','','5.14.0','all');
    wp_enqueue_style('rb-font-awesome-brands',RB_CSS.'font-awesome-brands-5.14.0.min.css','','5.14.0','all');
    wp_enqueue_style('rb-font-awesome-solid',RB_CSS.'font-awesome-solid-5.14.0.min.css','','5.14.0','all');
    
    // Bootstrap 5 v4.5.0
	wp_enqueue_style('rb-bootstrap',RB_CSS.'bootstrap-4.5.0.min.css','','4.5.0','all');
    
    // Template CSS v1.0.4
	wp_enqueue_style('rb-style',RB_CSS.'style.css','','1.0.4','all');
    wp_enqueue_style('rb-responsive',RB_CSS.'responsive.css','','1.0.4','all');

	// Main Style
	wp_enqueue_style('rb-wp-stylesheet',RB_WP_CSS,'','1.0.4','all');
    
    // html5shim conditional js
	wp_enqueue_script('rb-html5shim',RB_JS.'html5shiv-printshiv-3.7.3.min.js', array(),'3.7.3',false);
	wp_script_add_data('rb-html5shim','conditional','lt IE 9');
	
    // respond conditional js
	wp_enqueue_script('rb-respond',RB_JS.'respond-1.4.2.min.js',array(),'1.4.2',false);
	wp_script_add_data('rb-respond','conditional','lt IE 9');
    
    // Modernizr v2.8.3
	wp_enqueue_script('rb-modernizr',RB_JS.'modernizr-2.8.3.min.js',array('jquery'),'2.8.3',true);
    
    // Bootstrap 5 v4.5.0
	wp_enqueue_script('rb-popper',RB_JS.'popper-1.16.0.min.js',array('jquery'),'1.16.0',true);
    wp_enqueue_script('rb-bootstrap',RB_JS.'bootstrap-4.5.0.min.js',array('jquery'),'4.5.0',true);
    
    // Nrb-icescroll v3.5.4
	wp_enqueue_script('rb-nicescroll',RB_JS.'jquery.nicescroll-3.5.4.min.js',array('jquery'),'3.5.4',true);
    
    // Custom v1.0.4	
   wp_enqueue_script('rb-custom',RB_JS.'custom.js',array('jquery'),'1.0.4',true);
    
    // Comment Reply v1.0.4    
    if ((! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script('comment-reply');
	}
    
}
add_action('wp_enqueue_scripts','rb_css_js_files_add');

// widget register
function rb_sidebar_add(){
	register_sidebar(array(
		'name' 			=> __('Header Sidebar','rb-blog-one'),
		'description' 	=> __('Add your Header Sidebar Widgets Here', 'rb-blog-one'),
		'id' 			=> 'rb-header-sidebar',
		'before_widget' => '<div>',
		'after_widget' 	=> '</div>'
	));
    register_sidebar(array(
		'name' 			=> __('Right Sidebar','rb-blog-one'),
		'description' 	=> __('Add your Right Sidebar Widgets Here', 'rb-blog-one'),
		'id' 			=> 'rb-right-sidebar',
		'before_widget' => '<div class="rb-single-widget">',
		'after_widget' 	=> '</div>',
        'before_title' 	=> '<div class="rb-widget-title"><h4>',
		'after_title' 	=> '</h4></div>'
	));
}
add_action('widgets_init', 'rb_sidebar_add');

// post excerpt setup
function rb_custom_excerpt_length($length) {
    return 20;
}
add_filter( 'excerpt_length', 'rb_custom_excerpt_length', 999 );

//Comment Field Order
function rb_comment_fields_custom_order( $rb_fields ) {
    $rb_comment_field = $rb_fields['comment'];
    $rb_author_field = $rb_fields['author'];
    $rb_email_field = $rb_fields['email'];
    $rb_url_field = $rb_fields['url'];
    $rb_cookies_field = $rb_fields['cookies'];
    unset( $rb_fields['comment'] );
    unset( $rb_fields['author'] );
    unset( $rb_fields['email'] );
    unset( $rb_fields['url'] );
    unset( $rb_fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $rb_fields['author'] = $rb_author_field;
    $rb_fields['email'] = $rb_email_field;
    $rb_fields['url'] = $rb_url_field;
    $rb_fields['comment'] = $rb_comment_field;
    $rb_fields['cookies'] = $rb_cookies_field;
    // done ordering, now return the fields:
    return $rb_fields;
}
add_filter( 'comment_form_fields', 'rb_comment_fields_custom_order' );

//Comment List collback function
if (!function_exists('rb_comment_list')):
function rb_comment_list($comment, $args, $depth){
?>

<ul>
    <li id="rb-comment-<?php comment_ID(); ?>" class="rb-comment-body">

        <!--===== Comment Author Left Area Start Here =====-->
        <div class="rb-comment-author-left">
           <?php echo get_avatar($comment); ?>
        </div>
        <!--===== Comment Author Left Area End Here =====-->

        <!--===== Comment Author Right Area Start Here =====-->
        <div class="rb-comment-author-right">
            <div class="rb-comment-author-bio">

                <?php
                printf(
                /* translators: comment author */
                __('<h5 class="rb-comment-author">%s</h5>', 'rb-blog-one'),get_comment_author_link()
                );
                ?>

                <div class="rb-comment-reply">
                <?php 
				// Display comment reply link
				comment_reply_link( array_merge( $args, array(
					'reply_text' => __('<i class="fas fa-reply"></i> Reply', 'rb-blog-one'),
					'depth'     => $depth,
					'max_depth' => $args['max_depth']
				)));  ?>
                </div>

            </div>

            <div class="rb-comment-meta">
                
                <div class="rb-comment-time">
                    <a href="<?php echo esc_url(get_comment_link()); ?>">
                        <span class="fas fa-calendar-alt"></span>
                        <span><?php echo get_comment_date('l, d F, Y H:i A'); ?></span>
                    </a>
                </div>

                <?php edit_comment_link('<i class="fas fa-edit"></i> Edit', '<div class="rb-comment-edit">', '</div>'); ?>
            </div>

            <div class="rb-comment-desc">
                <?php comment_text(); ?>
                <?php
				// Display comment moderation text
				if ( $comment->comment_approved == '0' ) { ?>
					<div class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'rb-blog-one' ); ?></div><?php
				} ?>
            </div>

        </div>
        <!--===== Comment Author Right Area End Here =====-->

    </li>
</ul>

<?php
} endif;
