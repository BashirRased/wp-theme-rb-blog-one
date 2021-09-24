<?php

// adding google fonts
	function rb_fonts(){
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
	wp_register_style('fonts', rb_fonts(),'','1.0.2','all');
	wp_enqueue_style('fonts');
	
}
add_action('wp_enqueue_scripts', 'rb_google_font_style');