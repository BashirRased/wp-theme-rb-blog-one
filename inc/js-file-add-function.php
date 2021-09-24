<?php 

function rb_scripts(){

	wp_enqueue_script('main', get_template_directory_uri().'/assets/js/custom.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'rb_scripts');