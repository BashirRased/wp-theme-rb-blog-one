<?php
/**
 * Theme header menu walker.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RB_Blog_One_Header_Menu_Walker' ) ) {
	/**
	 * Custom Walker for Header Menu
	 */
	class RB_Blog_One_Header_Menu_Walker extends Walker_Nav_Menu {
		/**
		 * Start Level.
		 *
		 * @param string $output The HTML output.
		 * @param int    $depth  Depth of menu item.
		 * @param array  $args   Menu arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			if ( 0 === $depth ) {
				// 2nd <ul>
				$class = 'sub-menu';
			} else {
				// 3rd <ul> and deeper
				$class = 'sub-menu-2';
			}
			$output .= "\n$indent<ul class=\"" . esc_attr( $class ) . "\">\n";
		}

		/**
		 * End Level (close child <ul>).
		 *
		 * @param string $output The HTML output.
		 * @param int    $depth  Depth of menu item.
		 * @param array  $args   Menu arguments.
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "$indent</ul>\n";
		}

		/**
		 * Start Element.
		 *
		 * @param string $output The HTML output.
		 * @param object $item   Menu item.
		 * @param int    $depth  Depth of menu item.
		 * @param array  $args   Menu arguments.
		 * @param int    $id     Menu item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( 0 !== $depth ) ? str_repeat( "\t", $depth ) : '';

			$li_classes   = empty( $item->classes ) ? array() : (array) $item->classes;
			$has_children = in_array( 'menu-item-has-children', $li_classes, true );

			// Always add base li class.
			$li_classes[] = 'header-menu-item';

			// Add dropdown class if has children.
			if ( $has_children ) {
				$li_classes[] = 'dropdown';
			}

			$classes = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $li_classes ), $item ) );
			$classes = ' class="' . esc_attr( $classes ) . '"';

			$id_attr = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item );
			$id_attr = ' id="' . esc_attr( $id_attr ) . '"';

			$output .= $indent . '<li' . $id_attr . $classes . '>';

			$atts           = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
			$atts['href']   = ! empty( $item->url ) ? $item->url : '#';

			// Always add base link class.
			$atts['class'] = 'header-menu-link';

			// Add submenu helper class.
			if ( $has_children ) {
				$atts['class'] .= ' has-submenu';
			}

			$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
			$attributes = '';

			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$title = apply_filters( 'the_title', $item->title, $item->ID );
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

			$output .= '<a' . $attributes . '>' . $title . '</a>';
		}

		/**
		 * End Element.
		 *
		 * @param string $output The HTML output.
		 * @param object $item   Menu item.
		 * @param int    $depth  Depth of menu item.
		 * @param array  $args   Menu arguments.
		 */
		public function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$output .= "</li>\n";
		}
	}
}
