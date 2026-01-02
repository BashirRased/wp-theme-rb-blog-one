<?php
    get_template_part( 'template-parts/footer/footer' );
	if ( function_exists( 'rbth_scroll_to_top' ) ) {
		rbth_scroll_to_top();
	}
    wp_footer();
?>

</body>
</html>