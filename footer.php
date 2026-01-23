<?php
/**
 * Theme footer template part.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part( 'template-parts/footer/footer' );
if ( function_exists( 'rbth_scroll_to_top' ) ) {
	rbth_scroll_to_top();
}
	wp_footer();
?>

</body>
</html>
