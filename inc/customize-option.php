<?php

function rb_customize_menu($rb_customize){

	$rb_customize->add_section('social_links',array(
		'title'	=> 'Social Media Links',
		'priority'	=> 60
	));

	// Facebook Links
	$rb_customize->add_setting('facebook_links',array(
		'default'	=> 'https://www.facebook.com/bashir.rased',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('facebook_links',array(
		'section'	=> 'social_links',
		'label'	=> 'Facebook Link:',
		'type'	=> 'text'
	));
	
	// Twitter Links
	$rb_customize->add_setting('twitter_links',array(
		'default'	=> 'https://twitter.com/BashirRased',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('twitter_links',array(
		'section'	=> 'social_links',
		'label'	=> 'Twitter Link:',
		'type'	=> 'text'
	));
	
	// LinkedIn Links
	$rb_customize->add_setting('linkedin_links',array(
		'default'	=> 'https://www.linkedin.com/in/bashir-rased-a28306a4/',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('linkedin_links',array(
		'section'	=> 'social_links',
		'label'	=> 'LinkedIn Link:',
		'type'	=> 'text'
	));
	
	// Instagram Links
	$rb_customize->add_setting('instagram_links',array(
		'default'	=> 'https://www.instagram.com/md.rashedmollik/',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('instagram_links',array(
		'section'	=> 'social_links',
		'label'	=> 'Instagram Link:',
		'type'	=> 'text'
	));
	
	// Pinterest Links
	$rb_customize->add_setting('pinterest_links',array(
		'default'	=> 'https://www.pinterest.com/bashir4907/',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('pinterest_links',array(
		'section'	=> 'social_links',
		'label'	=> 'Pinterest Link:',
		'type'	=> 'text'
	));
	
	
	/* Contact Page */
	$rb_customize->add_section('contact_info',array(
		'title'	=> 'Contact Info',
		'priority'	=> 60
	));

	// Phone Number-1
	$rb_customize->add_setting('phone_1',array(
		'default'	=> '+88 01934 109870',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('phone_1',array(
		'section'	=> 'contact_info',
		'label'	=> 'Phone Number-1:',
		'type'	=> 'text'
	));
	
	// Phone Number-2
	$rb_customize->add_setting('phone_2',array(
		'default'	=> '+88 01841 109870',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('phone_2',array(
		'section'	=> 'contact_info',
		'label'	=> 'Phone Number-2:',
		'type'	=> 'text'
	));
	
	// Email Address-1
	$rb_customize->add_setting('email_address_1',array(
		'default'	=> 'info@bashir-rased.com',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('email_address_1',array(
		'section'	=> 'contact_info',
		'label'	=> 'Email Address-1:',
		'type'	=> 'text'
	));
	
	// Email Address-2
	$rb_customize->add_setting('email_address_2',array(
		'default'	=> 'bashir.rased@gmail.com',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('email_address_2',array(
		'section'	=> 'contact_info',
		'label'	=> 'Email Address-2:',
		'type'	=> 'text'
	));
	
	// Address Line-1
	$rb_customize->add_setting('address_line_1',array(
		'default'	=> 'Shonir Akhra, Jatrabari,',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('address_line_1',array(
		'section'	=> 'contact_info',
		'label'	=> 'Address Line-1:',
		'type'	=> 'text'
	));
	
	// Address Line-2
	$rb_customize->add_setting('address_line_2',array(
		'default'	=> 'Dhaka, Bangladesh.',
		'transport'	=> 'postMessage'
	));

	$rb_customize->add_control('address_line_2',array(
		'section'	=> 'contact_info',
		'label'	=> 'Address Line-2:',
		'type'	=> 'text'
	));

}
add_action('customize_register', 'rb_customize_menu');