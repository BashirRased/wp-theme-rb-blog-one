<?php
/*==================================
===== Table of Theme Functions =====
====================================
	01. Preloader Template
    02. Header Top Template
    03. Site Branding Template
    04. Header Menu Template
    05. Breadcrumb Template
    06. Header Menu Nav Walker
    07. Breadcrumb Title
    08. Breadcrumb Description
    09. Breadcrumb Navbar
    10. Post thumbnail show permission
    11. Post thumbnail
    12. Category Meta
    13. Author Meta
    14. Date Meta
    15. Comments Meta
    16. Post Edit Meta
    17. Tag Meta
    18. Post Excerpt Length
    19. Read More Button
    20. Post Pagination
    21. Single Page Pagination
    22. Custom Comment Form
    23. Custom Comment List
    24. Footer Widget
    25. Footer Template
    26. Scroll To Top Template
    27. TGM Plugin Add
*/

// 01. Preloader Template
if ( !function_exists( 'rb_blog_one_preloader' ) ) {
	function rb_blog_one_preloader() {
        $preloader = "";
        if ( function_exists('get_field') && get_field('rbth_preloader_acf') ) {
            $preloader = get_field( 'rbth_preloader_acf' );
        }
        if ( $preloader == 'on' ) {
            get_template_part( 'template-parts/header/preloader' );
        } else {
            if ( true == get_theme_mod ( 'rbth_preloader' ) ) {
                get_template_part( 'template-parts/header/preloader' );
            }
        }
	}
    add_action ( 'rb_blog_one_header', 'rb_blog_one_preloader');
}

// 02. Header Top Template
if ( !function_exists( 'rb_blog_one_header_top' ) ) {
	function rb_blog_one_header_top() {
        $header_top = "";
        if ( function_exists('get_field') && get_field('rbth_header_top_acf') ) {
            $header_top = get_field( 'rbth_header_top_acf' );
        }        
        if ( $header_top == 'on' ) {
            get_template_part( 'template-parts/header/header-top' );
        } else {
            if ( true == get_theme_mod ( 'rbth_header_top_switch' ) ) {
                get_template_part( 'template-parts/header/header-top' );
            }
        }
	}
    add_action ( 'rb_blog_one_header', 'rb_blog_one_header_top');
}

// 03. Site Branding Template
if ( !function_exists( 'rb_blog_one_site_branding' ) ) {
	function rb_blog_one_site_branding() {
        get_template_part( 'template-parts/header/site-branding' );
	}
    add_action ( 'rb_blog_one_header', 'rb_blog_one_site_branding');
}

// 04. Header Menu Template
if ( !function_exists( 'rb_blog_one_header_menu' ) ) {
	function rb_blog_one_header_menu() {
        if ( has_nav_menu( 'header_menu' ) ) {
            get_template_part( 'template-parts/header/header-menu' );
        }
	}
    add_action ( 'rb_blog_one_header', 'rb_blog_one_header_menu');
}

// 05. Breadcrumb Template
if ( !function_exists( 'rb_blog_one_breadcrumb' ) ) {
	function rb_blog_one_breadcrumb() {
        $breadcrumb = "";
        if ( function_exists('get_field') && get_field('rbth_breadcrumb_acf') ) {
            $breadcrumb = get_field( 'rbth_breadcrumb_acf' );
        }
        if ( $breadcrumb == 'on' ) {
            get_template_part( 'template-parts/header/breadcrumb' );
        } else {
            if ( true == get_theme_mod ( 'rbth_breadcrumb_switch' ) ) {
                get_template_part( 'template-parts/header/breadcrumb' );
            }
        }
	}
    add_action ( 'rb_blog_one_header', 'rb_blog_one_breadcrumb');
}

// 06. Header Menu Nav Walker
if ( !function_exists( 'rb_blog_one_menu_navwalker_custom' ) ) {
	function rb_blog_one_menu_navwalker_custom() {
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
	add_action( 'rb_blog_one_menu_navwalker', 'rb_blog_one_menu_navwalker_custom' );
}

// 07. Breadcrumb Title
if ( !function_exists( 'rb_blog_one_breadcrumb_title_custom' ) ) {

	function rb_blog_one_breadcrumb_title_custom() {
                
        // Front Page
        if( is_front_page() || is_home() ) {
            printf(
                /* translators: Breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Blog Page', 'rb-blog-one' )
            );
        }
        
        // Singlular Page
        elseif ( is_singular() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( get_the_title(), 'rb-blog-one' )
            );
        }

        // Search Page
        elseif ( is_search() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Search Page', 'rb-blog-one' )
            );
        }

        // 404 Page
        elseif ( is_404() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( '404 Page', 'rb-blog-one' )
            );
        }

        // Year Archive
        elseif ( is_year() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Year Archive', 'rb-blog-one' )
            );
        }

        // Month Archive
        elseif ( is_month() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Month Archive', 'rb-blog-one' )
            );
        }

        // Day Archive
        elseif ( is_day() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Day Archive', 'rb-blog-one' )
            );
        }

        // Author Page
        elseif ( is_author() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Author Page', 'rb-blog-one' )
            );
        }

        // Category Page
        elseif ( is_category() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Category Page', 'rb-blog-one' )
            );
        }

        // Tag Page
        elseif ( is_tag() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Tag Page', 'rb-blog-one' )
            );
        }

        // Taxonomy Page
        elseif ( is_tax() ) {
            printf(
                /* translators: breadcrumb Title. */
                '<h2 class="breadcrumb-title">%s</h2>',
                esc_html( 'Taxonomy Page', 'rb-blog-one' )
            );
        }
	}
    add_action ( 'rb_blog_one_breadcrumb_title', 'rb_blog_one_breadcrumb_title_custom');
}

// 08. Breadcrumb Description
if ( !function_exists( 'rb_blog_one_breadcrumb_description_custom' ) ) {
    function rb_blog_one_breadcrumb_description_custom() {
        $description = get_the_archive_description();
        if ( $description ) {
            // Author Page
            if ( is_author() ) {
                ?>
                <div class="breadcrumb-description">
                    <?php echo wp_kses_post($description); ?>
                </div>
                <?php
            }
            
            // Category Page
            elseif ( is_category() ) {
                ?>
                <div class="breadcrumb-description">
                    <?php echo wp_kses_post($description); ?>
                </div>
                <?php
            }

            // Tag Page
            elseif ( is_tag() ) {
                ?>
                <div class="breadcrumb-description">
                    <?php echo wp_kses_post($description); ?>
                </div>
                <?php
            }

            // Taxonomy Page
            elseif ( is_tax() ) {
                ?>
                <div class="breadcrumb-description">
                    <?php echo wp_kses_post($description); ?>
                </div>
                <?php
            }
        }
    }
    add_action ( 'rb_blog_one_breadcrumb_description', 'rb_blog_one_breadcrumb_description_custom');
}

// 09. Breadcrumb Navbar
if ( !function_exists( 'rb_blog_one_breadcrumb_nav_custom' ) ) {
	function rb_blog_one_breadcrumb_nav_custom() {
        if ( function_exists( 'bcn_display' ) ) { ?>
            <nav class="breadcrumb-nav">
                <ul>
                    <?php bcn_display(); ?>
                </ul>
            </nav>
        <?php
        }
    }
    add_action ( 'rb_blog_one_breadcrumb_nav', 'rb_blog_one_breadcrumb_nav_custom');
}

// 10. Post thumbnail show permission
if ( !function_exists( 'rb_blog_one_can_show_post_thumbnail' ) ) {
    function rb_blog_one_can_show_post_thumbnail() {
        return apply_filters(
            'rb_blog_one_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail()
        );
    }
}

// 11. Post thumbnail
if ( !function_exists( 'rb_blog_one_post_thumbnail_cutom' ) ) {
	function rb_blog_one_post_thumbnail_cutom() {
		if ( !rb_blog_one_can_show_post_thumbnail() ) {
			return;
		}
		?>
		<figure class="post-thumbnail">
			<?php
			// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
			the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
			if ( is_singular( 'attachment') ) :
				if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text">
						<?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() )); ?>
					</figcaption>
				<?php
				endif;
			endif;
			?>
		</figure><!-- .post-thumbnail -->
		<?php
	}
	add_action( 'rb_blog_one_post_thumbnail', 'rb_blog_one_post_thumbnail_cutom');
}

// 12. Category Meta
if ( !function_exists( 'rb_blog_one_cat_meta' ) ) {
	function rb_blog_one_cat_meta() {
        if ( has_category() ) : ?>
        <div class="cat-post-meta">
            <i class="fa-regular fa-folder-open"></i>
            <?php the_category( ', ' ); ?>
        </div>
    <?php
        endif;
	}
    add_action( "rb_blog_one_post_meta_top", "rb_blog_one_cat_meta" );
}

// 13. Author Meta
if ( !function_exists( 'rb_blog_one_author_meta_custom' ) ) {
	function rb_blog_one_author_meta_custom() {
        $meta_icon = '<i class="fa-regular fa-user"></i>';
		printf(
			/* translators:
			 %1$s: meta icon.
			 %2$s: author url. 
			 */
			'<div class="author-post-meta">%1$s %2$s</div>',
            $meta_icon,
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author_meta('display_name'), 'rb-blog-one' ) . '</a>'
		);
	}
    add_action( "rb_blog_one_author_meta", "rb_blog_one_author_meta_custom" );
}

// 14. Date Meta
if ( !function_exists( 'rb_blog_one_date_meta_custom' ) ) {
	function rb_blog_one_date_meta_custom() {		
        $archive_year  = get_the_time( 'Y' );
		$archive_month = get_the_time( 'm' );
		$archive_date = get_the_time( 'd' );	
        $meta_icon = '<i class="fa-regular fa-clock"></i>';
		printf(
			/* translators:
			 %1$s: publish date url.
			 %2$s: publish date. 
			 */
			'<div class="date-post-meta">%1$s <a href="%2$s">%3$s</a></div>',
            $meta_icon,
			esc_url( get_day_link( $archive_year, $archive_month, $archive_date ) ),
			esc_html( get_the_time( get_option( 'date_format' ) ) )
		);	
	}
    add_action( "rb_blog_one_date_meta", "rb_blog_one_date_meta_custom" );
}

// 15. Comments Meta
if ( !function_exists( 'rb_blog_one_comments_meta_custom' ) ) {
    function rb_blog_one_comments_meta_custom() {
        $meta_icon = '<i class="fa-regular fa-comments"></i>';
        ?>
        <div class="comments-post-meta">
            <?php
                $comments_meta_class = "comment-meta-text";
                if(! comments_open()) {
                    $comments_meta_class = "comment-meta-off-text";
                }
                echo wp_kses_post($meta_icon);
                comments_popup_link(
                    __('No Comment','rb-blog-one'),
                    __('1 Comment','rb-blog-one'),
                    __('% Comments','rb-blog-one'),
                    $comments_meta_class,
                    __('Comments Off','rb-blog-one')
                );
            ?>
        </div>
        <?php
	}
    add_action( "rb_blog_one_comments_meta", "rb_blog_one_comments_meta_custom" );
}

// 16. Post Edit Meta
if ( !function_exists( 'rb_blog_one_edit_meta_custom' ) ) {
	function rb_blog_one_edit_meta_custom() {
        $meta_icon = '<i class="fa-solid fa-user-pen"></i> ';
		edit_post_link(
			sprintf(
				/* translators: %s: Post title. Only visible to screen readers. */
				esc_html__( 'Edit', 'rb-blog-one' )
			),
			'<div class="edit-post-meta">'.$meta_icon.'',
			'</div>'
		);
	}
    add_action( "rb_blog_one_edit_meta", "rb_blog_one_edit_meta_custom" );
}

// 17. Tag Meta
if ( !function_exists( 'rb_blog_one_tag_meta_custom' ) ) {
	function rb_blog_one_tag_meta_custom() {
		$tags_list = get_the_tag_list( '', ', ' );
		if ( has_tag() ) { 
            ?>
            <div class="tag-post-meta">
                <i class="fa-solid fa-tags"></i>
                <?php echo wp_kses_post( $tags_list, 'rb-blog-one' ); ?>
            </div>
            <?php
		}		
	}
    add_action( 'rb_blog_one_post_meta_bottom', 'rb_blog_one_tag_meta_custom' );
}

// 18. Post Excerpt Length
if ( !function_exists('rb_blog_one_custom_excerpt_length') ) {
    function rb_blog_one_custom_excerpt_length( $length ) {
		if ( true == get_theme_mod( 'rbth_excerpt' ) ) {
			$length = get_theme_mod( 'rbth_excerpt_word' );
			if ( $length ) {
				return $length;
			}
			else {
				return absint(20);
			}
		}
		else {
			$length = absint(20);
			return $length;
		}
	}
}
add_filter( 'excerpt_length', 'rb_blog_one_custom_excerpt_length', 999 );

// 19. Read More Button
function rb_blog_one_read_more_btn( $more ) {
    $more_text = '[...]';
	$more = sprintf(
		/* translators:
		%1$s: Slug of current post.
		%2$s: Button text.
		*/
		''.$more_text.'<div class="read-more-btn"><a class="theme-btn" href="%1$s">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		esc_html__( 'read more', 'rb-blog-one' )
	);
	return $more;
}
add_filter( 'excerpt_more', 'rb_blog_one_read_more_btn' );

// 20. Post Pagination
if ( !function_exists( 'rb_blog_one_pagination_custom' ) ) {
    function rb_blog_one_pagination_custom() {
        if ( is_rtl() ) {
            $prev_btn = '<i class="fa-solid fa-chevron-right"></i>';
            $next_btn = '<i class="fa-solid fa-chevron-left"></i>';
        } else {
            $prev_btn = '<i class="fa-solid fa-chevron-left"></i>';
            $next_btn = '<i class="fa-solid fa-chevron-right"></i>';
        }
        the_posts_pagination( array (
            'mid_size'  => 2,
            'prev_text' => $prev_btn,
            'next_text' => $next_btn,
        ) );
    }
    add_action( 'rb_blog_one_pagination', 'rb_blog_one_pagination_custom' );
}

// 21. Single Page Pagination
if ( !function_exists( 'rb_blog_one_single_page_pagination_custom' ) ) {
	function rb_blog_one_single_page_pagination_custom() {
		$page_link = array(
			'before' => '<div class="single-page-pagination">',
			'after' => '</div>',
			'echo' => 1
		);
		wp_link_pages( $page_link );
	}
	add_action( 'rb_blog_one_single_page_pagination', 'rb_blog_one_single_page_pagination_custom' );
}

// 22. Custom Comment Form
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

// 23. Custom Comment List
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

// 24. Footer Widget
if ( !function_exists( 'rb_blog_one_footer_widget' ) ) {
    function rb_blog_one_footer_widget() {
        $footer_widget = "";
        if ( function_exists('get_field') && get_field('rbth_footer_widget_acf') ) {
            $footer_widget = get_field( 'rbth_footer_widget_acf' );
        }
        if ( $footer_widget == 'on' ) {
            get_template_part( 'template-parts/footer/footer-widget' );
        } else {
            if ( true == get_theme_mod ( 'rbth_footer_widget' ) ) {
                get_template_part( 'template-parts/footer/footer-widget' );
            }
        }
    }    
    add_action( 'rb_blog_one_footer', 'rb_blog_one_footer_widget' );
}

// 25. Footer Template
if ( !function_exists( 'rb_blog_one_footer_template' ) ) {
    function rb_blog_one_footer_template() {
        get_template_part( 'template-parts/footer/footer' );
    }    
    add_action( 'rb_blog_one_footer', 'rb_blog_one_footer_template' );
}

// 26. Scroll To Top Template
if ( !function_exists( 'rb_blog_one_scroll_to_top' ) ) {
    function rb_blog_one_scroll_to_top() {
        $scroll_top = "";
        if ( function_exists('get_field') && get_field('rbth_scroll_top_acf') ) {
            $scroll_top = get_field( 'rbth_scroll_top_acf' );
        }
        if ( $scroll_top == 'on' ) {
            get_template_part( 'template-parts/footer/scroll-to-top' );
        } else {
            if ( true == get_theme_mod ( 'rbth_scroll_top' ) ) {
                get_template_part( 'template-parts/footer/scroll-to-top' );
            }
        }
    }    
    add_action( 'rb_blog_one_footer', 'rb_blog_one_scroll_to_top' );
}

// 27. TGM Plugin Add
function rb_blog_one_add_plugin() {

	$plugins = array(

		// Kirki Customizer Framework
		array(
			'name'      => __( 'Kirki Customizer Framework', 'rb-blog-one' ),
			'slug'      => 'kirki',
			'recommend'  => true,
		),

		// Advanced Custom Fields (ACF)
		array(
			'name'      => __( 'Advanced Custom Fields (ACF)', 'rb-blog-one' ),
			'slug'      => 'advanced-custom-fields',
			'recommend'  => true,
		),

		// One Click Demo Import
		array(
			'name'      => __( 'One Click Demo Import', 'rb-blog-one' ),
			'slug'      => 'one-click-demo-import',
			'recommend'  => true,
		),

		// RB Theme Helper
		array(
			'name'      => __( 'RB Theme Helper', 'rb-blog-one' ),
			'slug'      => 'rb-theme-helper',
			'recommend'  => true,
		),

		// Breadcrumb NavXT
		array(
			'name'      => __( 'Breadcrumb NavXT', 'rb-blog-one' ),
			'slug'      => 'breadcrumb-navxt',
			'recommend'  => true,
		),

		// Advanced Ads – Ad Manager & AdSense
		array(
			'name'      => __( 'Advanced Ads – Ad Manager & AdSense', 'rb-blog-one' ),
			'slug'      => 'advanced-ads',
			'recommend'  => true,
		),

	);

	$config = array(
		'id'           => 'tgmpa', 
		'default_path' => '', 
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php', 
		'capability'   => 'edit_theme_options',  
		'has_notices'  => true, 
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => ''
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'rb_blog_one_add_plugin' );