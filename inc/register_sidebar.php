<?php

function rb_sidebar_add(){
	register_sidebar(array(
		'name' 			=> __('Right Sidebar', 'rb-blog-one'),
		'description' 	=> __('You may add your Right Sidebar Widgets Here', 'rb-blog-one'),
		'id' 			=> 'rb_right-sidebar',
		'before_widget' => '<div class="rb-sidebar-item">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="rb-sidebar-item-title">',
		'after_title' 	=> '</h4>'
	));
	register_sidebar(array(
		'name' 			=> __('Header Ads Sidebar', 'rb-blog-one'),
		'description' 	=> __('You may add your Header Ads Sidebar Widgets Here', 'rb-blog-one'),
		'id' 			=> 'rb_header-sidebar',
		'before_widget' => '<div class="rb-header-ads">',
		'after_widget' 	=> '</div>'
	));
}
add_action('widgets_init', 'rb_sidebar_add');