<?php

function rb_customize_menu($rb_customize){

	$rb_customize->add_section('rb_social_links',array(
		'title'	=> 'Social Media Links',
		'priority'	=> 60
	));

	// Facebook Links
	$rb_customize->add_setting('rb_facebook_links',array(
		'default'	=> 'https://www.facebook.com/bashir.rased',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('rb_facebook_links',array(
		'section'	=> 'rb_social_links',
		'label'	=> 'Facebook Link:',
		'type'	=> 'text'
	));
	
	// Twitter Links
	$rb_customize->add_setting('rb_twitter_links',array(
		'default'	=> 'https://twitter.com/BashirRased',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('rb_twitter_links',array(
		'section'	=> 'rb_social_links',
		'label'	=> 'Twitter Link:',
		'type'	=> 'text'
	));
	
	// LinkedIn Links
	$rb_customize->add_setting('rb_linkedin_links',array(
		'default'	=> 'https://www.linkedin.com/in/bashir-rased-a28306a4/',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('rb_linkedin_links',array(
		'section'	=> 'rb_social_links',
		'label'	=> 'LinkedIn Link:',
		'type'	=> 'text'
	));
	
	// Instagram Links
	$rb_customize->add_setting('rb_instagram_links',array(
		'default'	=> 'https://www.instagram.com/md.rashedmollik/',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('rb_instagram_links',array(
		'section'	=> 'rb_social_links',
		'label'	=> 'Instagram Link:',
		'type'	=> 'text'
	));
	
	// Pinterest Links
	$rb_customize->add_setting('rb_pinterest_links',array(
		'default'	=> 'https://www.pinterest.com/bashir4907/',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('rb_pinterest_links',array(
		'section'	=> 'rb_social_links',
		'label'	=> 'Pinterest Link:',
		'type'	=> 'text'
	));

}
add_action('customize_register', 'rb_customize_menu');