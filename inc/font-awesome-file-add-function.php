<?php

// including the styles
function rb_font_awesome(){
	
	// font-awesome-brands-5.10.1
	wp_enqueue_style('font-awesome-brands', get_template_directory_uri().'/assets/css/font-awesome-brands-5.10.1.min.css','','5.10.1','all');
	
	// font-awesome-solid-5.10.1
	wp_enqueue_style('font-awesome-solid', get_template_directory_uri().'/assets/css/font-awesome-solid-5.10.1.min.css','','5.10.1','all');
	
	// font-awesome-5.10.1
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome-5.10.1.min.css','','5.10.1','all');
}
add_action('wp_enqueue_scripts', 'rb_font_awesome');