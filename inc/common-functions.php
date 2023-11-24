<?php
/**
 * Common some functions for this theme
 * 
 * The file loading under functions.php
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.7
 * @since RB Blog One 1.1.7
 */

/*=======================================
Table of Common Functions List Start Here
=========================================
	01. 01. Skip Link Focus
	02. Post Excerpt Length
	03. Header Menu Navwalker
    04. Custom Comment Form
    05. Custom Comment List
=======================================
Table of Common Functions List End Here
=====================================*/

/******************************
***** 01. Skip Link Focus *****
*****************************/
if ( !function_exists( 'rb_blog_one_focus_fix' ) ) {
    function rb_blog_one_focus_fix() {

        // If SCRIPT_DEBUG is defined and true, print the unminified file.
        if ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
            echo '<script>';
            include get_template_directory().'/assets/js/skip-link-focus-fix.js';
            echo '</script>';
        }
    
        // The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
        ?>
        <script>
        /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
        </script>
        <?php
    }
    add_action('wp_print_footer_scripts', 'rb_blog_one_focus_fix');
}

/**********************************
***** 02. Post Excerpt Length *****
**********************************/
if ( !function_exists('rb_blog_one_custom_excerpt_length') ) {
    function rb_blog_one_custom_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}
		else {
			return absint(30);
		}
	}
}
add_filter( 'excerpt_length', 'rb_blog_one_custom_excerpt_length', 999 );

/************************************
***** 03. Header Menu Navwalker *****
************************************/
if ( !function_exists( 'rb_blog_one_header_menu_custom' ) ) {
	/**
	 * [rb_blog_one_header_menu_custom description]
	 * @return [type] [description]
	 */
	function rb_blog_one_header_menu_custom() {
		if ( has_nav_menu( 'header_menu' ) ) {
			wp_nav_menu( [
				'theme_location' 	=> 'header_menu',
				'container'      	=> 'nav',
				'container_id'   	=> 'site-navigation',
				'container_class'   => 'header-menu-container',
				'container'      	=> 'nav',
				'menu'   		 	=> 'ul',
				'menu_class'     	=> 'header-menu',
				'fallback_cb'    	=> 'RB_Blog_One_Navwalker_Class::fallback',
				'walker'         	=> new RB_Blog_One_Navwalker_Class,
			] );
		}		
	}
	add_action( 'rb_blog_one_header_menu', 'rb_blog_one_header_menu_custom' );
}

/**********************************
***** 04. Custom Comment Form *****
**********************************/
function rb_blog_one_custom_comment_form( $fields ) {
    // What fields you want to control.
    $comment_field_author = $fields['author'];
    $comment_field_email = $fields['email'];
	$comment_field_url = $fields['url'];
    $comment_field_massage = $fields['comment'];
    $comment_field_cookies = $fields['cookies'];

     // The fields you want to unset (remove).
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    unset($fields['comment']);
    unset($fields['cookies']);

	// Display the fields to your own taste.
    // The order in which you place them will determine in what order they are displayed.
    $fields['author'] = $comment_field_author;
    $fields['email'] = $comment_field_email;
    $fields['url'] = $comment_field_url;
	$fields['comment'] = $comment_field_massage;	
    $fields['cookies'] = $comment_field_cookies;

    return $fields;
}
add_filter( 'comment_form_fields', 'rb_blog_one_custom_comment_form' );

/**********************************
***** 05. Custom Comment List *****
**********************************/
if ( ! function_exists( 'rb_blog_one_comment_list' ) ) {
    function rb_blog_one_comment_list( $comment, $args, $depth ) {
        $GLOBAL['comment'] = $comment;
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr( $depth );
        ?>
            <li id="comment-<?php comment_ID();?>" class="comment-item">
                <div class="comments-box">
                    <div class="comments-avatar">
                        <?php echo get_avatar( $comment, '90' );?>
                    </div>
                    <div class="comments-text">

                        <h5 class="avatar-name"><?php echo get_comment_author_link();?></h5>

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
                            <?php comment_text();?>
                        </div>

                        <div class="comments-replay">
                            <?php comment_reply_link( array_merge( $args, [ 'depth' => $depth, 'max_depth' => $args['max_depth'] ] ) );?>
                        </div>

                    </div>
                </div>
        <?php
    }
}