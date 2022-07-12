<?php
/**
 * RB Blog One functions and definitions
 *
 * @package RB Free Theme
 * @subpackage RB Blog One
 * @version RB Blog One 1.1.5
 * @since RB Blog One 1.1.4
 */

// Prefix With File Directory
define('RB_BLOG_ONE_VERSION','1.1.5');
define('RB_BLOG_ONE_WP_CSS',get_stylesheet_uri());
define('RB_BLOG_ONE_URL',get_template_directory_uri());
define('RB_BLOG_ONE_CSS',RB_BLOG_ONE_URL.'/assets/css/');
define('RB_BLOG_ONE_JS',RB_BLOG_ONE_URL.'/assets/js/');
define('RB_BLOG_ONE_IMG',RB_BLOG_ONE_URL.'/assets/img/');

// after theme setup
if ( !function_exists('rb_blog_one_theme_setup') ) {
    function rb_blog_one_theme_setup(){

        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RB Blog One, use a find and replace
		 * to change 'rb-blog-one' to the name of your theme in all the template files.
		 */
        load_theme_textdomain( 'rb-blog-one', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Website Title-Slug
        add_theme_support('title-tag');

        // Feature Image
        add_theme_support('post-thumbnails');

        // Logo Image Register
        add_theme_support('custom-logo',array(
            'height'      => 80,
            'flex-height' => true
        ));

        // Menu Register
        register_nav_menu('header_menu', __('Header Menu','rb-blog-one'));

        // Set content-width.
        $GLOBALS['content_width'] = apply_filters( 'rb_blog_one_content_width', 667 );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        $editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

        // Force the editor styles to match the theme's UI.
        add_editor_style('/assets/css/style-editor.css');

        // Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
        
        // Add support for responsive embedded content.
		add_theme_support('responsive-embeds');
        
        // Add support for full and wide align images.
		add_theme_support('align-wide');
        
        // Custom header.
        $rb_blog_one_custom_header = array(
            'width'              => 1000,
            'height'             => 250,
            'flex-width'         => true,
            'flex-height'        => true,
        );
        add_theme_support("custom-header", $rb_blog_one_custom_header);
        
        // Custom background color.
        $rb_blog_one_custom_bg = array(
				'default-color' => 'd1e4dd',
			);
        add_theme_support("custom-background", $rb_blog_one_custom_bg);        
        
        add_theme_support("editor-color-palette");
        
        // Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
        
        /**
        * Add post-formats support.
        */
        add_theme_support(
            'post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );
        
        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        $rb_blog_one_html5 = array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets'
        );
        add_theme_support("html5", $rb_blog_one_html5);        
        
    }
}
add_action('after_setup_theme','rb_blog_one_theme_setup');

// Include CSS & JS Files
if ( !function_exists('rb_blog_one_css_js_files_add') ) {
    function rb_blog_one_css_js_files_add(){
    
        // Google Font v1.1.4
        wp_enqueue_style('google-font','//fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Roboto&display=swap','',RB_BLOG_ONE_VERSION,'all');
        
        // Font Awesome v6.1.1
        wp_enqueue_style('font-awesome',RB_BLOG_ONE_CSS.'font-awesome-6.1.1.min.css','','6.1.1','all');
        
        // Bootstrap 5 v5.2.0
        wp_enqueue_style('bootstrap',RB_BLOG_ONE_CSS.'bootstrap-5.2.0.min.css','','5.2.0','all');
        wp_enqueue_script('popper',RB_BLOG_ONE_JS.'popper-2.11.5.js',array('jquery'),'2.11.5',true);
        wp_enqueue_script('bootstrap',RB_BLOG_ONE_JS.'bootstrap-5.2.0.min.js',array('jquery'),'5.2.0',true);
        
        // Nicescroll v3.5.4
        wp_enqueue_script('jquery-nicescroll',RB_BLOG_ONE_JS.'jquery.nicescroll-3.5.4.js',array('jquery'),'3.5.4',true);
        
        // Normalize v8.0.1
        wp_enqueue_style('normalize',RB_BLOG_ONE_CSS.'normalize-8.0.1.css','','8.0.1','all');
        
        // Modernizr v2.8.3
        wp_enqueue_script('modernizr',RB_BLOG_ONE_JS.'modernizr-2.8.3.js',array('jquery'),'2.8.3',true);
        
        // html5shiv-printshiv conditional js
        wp_enqueue_script('html5shiv-printshiv',RB_BLOG_ONE_JS.'html5shiv-printshiv-3.7.3.js', array(),'3.7.3',false);
        wp_script_add_data('html5shiv-printshiv','conditional','lt IE 9');
        
        // respond conditional js
        wp_enqueue_script('respond',RB_BLOG_ONE_JS.'respond-1.4.2.js',array(),'1.4.2',false);
        wp_script_add_data('respond','conditional','lt IE 9');
        
        // Comment Reply v1.1.4    
        if ((! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script('comment-reply');
        }
        
        // Template CSS & JS v1.1.4
        wp_enqueue_style('rb-blog-one-style',RB_BLOG_ONE_CSS.'style.css','',RB_BLOG_ONE_VERSION,'all');
    
        wp_enqueue_style('rb-blog-one-responsive',RB_BLOG_ONE_CSS.'responsive.css','',RB_BLOG_ONE_VERSION,'all');
    
        wp_enqueue_script( 'rb-blog-one-skip-link-focus-fix',RB_BLOG_ONE_JS.'skip-link-focus-fix.js', array(),RB_BLOG_ONE_VERSION,true);
    
        wp_enqueue_script('rb-blog-one-custom',RB_BLOG_ONE_JS.'custom.js',array('jquery'),RB_BLOG_ONE_VERSION,true);
    
        // Main Style
        wp_enqueue_style('rb-blog-one-wp-stylesheet',RB_BLOG_ONE_WP_CSS,'',time(),'all');
        
    }
}
add_action('wp_enqueue_scripts','rb_blog_one_css_js_files_add');

// widget register
if ( !function_exists('rb_blog_one_sidebar_add') ) {
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
}
add_action('widgets_init', 'rb_blog_one_sidebar_add');

// post excerpt text setup
if ( !function_exists('rb_blog_one_excerpt_more') ) {
    function rb_blog_one_excerpt_more($rb_blog_one_more) {
        return false;
    }
}
add_filter( 'excerpt_more', 'rb_blog_one_excerpt_more' );

// post excerpt words setup
if ( !function_exists('rb_blog_one_custom_excerpt_length') ) {
    function rb_blog_one_custom_excerpt_length($rb_blog_one_length) {
        return 20;
    }
}
add_filter( 'excerpt_length', 'rb_blog_one_custom_excerpt_length', 999 );

//Comment Field Order
if ( !function_exists('rb_blog_one_comment_fields_custom_order') ) {
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
}
add_filter( 'comment_form_fields', 'rb_blog_one_comment_fields_custom_order' );

//Comment List collback function
if (!function_exists('rb_blog_one_comment_list')):
function rb_blog_one_comment_list($rb_blog_one_comment, $rb_blog_one_args, $rb_blog_one_depth){
?>

<ul>
    <li id="rb-blog-one-comment-<?php comment_ID(); ?>" class="rb-blog-one-comment-body">

        <!--===== Comment Author Left Area Start Here =====-->
        <div class="rb-blog-one-comment-author-left">
            <?php echo get_avatar($rb_blog_one_comment); ?>
        </div>
        <!--===== Comment Author Left Area End Here =====-->

        <!--===== Comment Author Right Area Start Here =====-->
        <div class="rb-blog-one-comment-author-right">
            <div class="rb-blog-one-comment-author-bio">

                <?php
                printf(
                /* translators: comment author */
                __('<h5 class="rb-blog-one-comment-author">%s</h5>', 'rb-blog-one'),
                    esc_html(get_comment_author())
                );
                ?>

                <div class="rb-blog-one-comment-reply">
                    <?php 
				// Display comment reply link
				comment_reply_link( array_merge( $rb_blog_one_args, array(
					'reply_text' => __('<i class="fas fa-reply"></i> Reply', 'rb-blog-one'),
					'depth'     => $rb_blog_one_depth,
					'max_depth' => $rb_blog_one_args['max_depth']
				)));  ?>
                </div>

            </div>

            <div class="rb-blog-one-comment-meta">

                <div class="rb-blog-one-comment-time">
                    <a href="<?php echo esc_url(get_comment_link()); ?>">
                        <span class="fas fa-calendar-alt"></span>
                        <span><?php comment_date('l, d F, Y H:i A'); ?></span>
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