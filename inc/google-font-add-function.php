<?php

// adding google fonts
	function get_rb_fonts(){
	$fonts 		= array();
	$fonts[] 	= 'Roboto:400,700';

	$rb_fonts 	= add_query_arg(array(
					'family' => urlencode(implode('|', $fonts)),
					'subset' => 'sans-serif'
					),
	'https://fonts.googleapis.com/css');
	
	return $rb_fonts;
}

// including the styles
function rb_google_font_style(){

	// Google Fonts
	wp_enqueue_style('fonts', get_rb_fonts());
}
add_action('wp_enqueue_scripts', 'rb_google_font_style');