<?php
/**
 * Breadcrumbs for this theme
 * 
 * The file loading under functions.php
 *
 * @package RB Blog One
 * @version RB Blog One 1.1.7
 * @since RB Blog One 1.1.7
 */

/*============================================
Table of Breadcrumbs Functions List Start Here
==============================================
	01. Breadcrumbs Description
	02. Breadcrumbs Title
	03. Breadcrumbs Navbar
============================================
Table of Breadcrumbs Functions List End Here
==========================================*/

/**************************************
***** 01. Breadcrumbs Description *****
**************************************/
if ( !function_exists( 'rb_blog_one_archive_description_custom' ) ) {
    function rb_blog_one_archive_description_custom() {
        $description = get_the_archive_description();
        if ( $description ) {
            // Author Page
            if ( is_author() ) {
                ?>
                <div class="breadcrumbs-description">
                    <?php echo esc_html ( $description, 'rb-blog-one' ); ?>
                </div>
                <?php
            }
            
            // Category Page
            elseif ( is_category() ) {
                ?>
                <div class="breadcrumbs-description">
                    <?php echo esc_html ( $description, 'rb-blog-one' ); ?>
                </div>
                <?php
            }

            // Tag Page
            elseif ( is_tag() ) {
                ?>
                <div class="breadcrumbs-description">
                    <?php echo esc_html ( $description, 'rb-blog-one' ); ?>
                </div>
                <?php
            }

            // Taxonomy Page
            elseif ( is_tax() ) {
                ?>
                <div class="breadcrumbs-description">
                    <?php echo esc_html ( $description, 'rb-blog-one' ); ?>
                </div>
                <?php
            }
        }
    }
    add_action ( 'rb_blog_one_archive_description', 'rb_blog_one_archive_description_custom');
}

/********************************
***** 02. Breadcrumbs Title *****
********************************/
if ( !function_exists( 'rb_blog_one_breadcrumbs_title_custom' ) ) {

	function rb_blog_one_breadcrumbs_title_custom() {
                
        // Front Page
        if( is_front_page() || is_home() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Blog Page', 'rb-blog-one' )
            );
        }
        
        // Singlular Page
        elseif ( is_singular() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( get_the_title(), 'rb-blog-one' )
            );
        }

        // Search Page
        elseif ( is_search() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Search Page', 'rb-blog-one' )
            );
        }

        // 404 Page
        elseif ( is_404() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( '404 Page', 'rb-blog-one' )
            );
        }

        // Year Archive
        elseif ( is_year() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Year Archive', 'rb-blog-one' )
            );
        }

        // Month Archive
        elseif ( is_month() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Month Archive', 'rb-blog-one' )
            );
        }

        // Day Archive
        elseif ( is_day() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Day Archive', 'rb-blog-one' )
            );
        }

        // Author Page
        elseif ( is_author() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Author Page', 'rb-blog-one' )
            );
        }

        // Category Page
        elseif ( is_category() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Category Page', 'rb-blog-one' )
            );
        }

        // Tag Page
        elseif ( is_tag() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Tag Page', 'rb-blog-one' )
            );
        }

        // Taxonomy Page
        elseif ( is_tax() ) {
            printf(
                /* translators: Breadcrumbs Title. */
                '<h2 class="breadcrumbs-title">%s</h2>',
                esc_html( 'Taxonomy Page', 'rb-blog-one' )
            );
        }
	}
    add_action ( 'rb_blog_one_breadcrumbs_title', 'rb_blog_one_breadcrumbs_title_custom');
}

/*********************************
***** 03. Breadcrumbs Navbar *****
*********************************/
if ( !function_exists( 'rb_blog_one_breadcrumbs_nav_custom' ) ) {
	function rb_blog_one_breadcrumbs_nav_custom() {
        if ( function_exists( 'bcn_display' ) ) { ?>
            <nav class="breadcrumbs-nav">
                <ul>
                    <?php bcn_display(); ?>
                </ul>
            </nav>
        <?php
        }
    }
    add_action ( 'rb_blog_one_breadcrumbs_nav', 'rb_blog_one_breadcrumbs_nav_custom');
}