<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif; ?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <?php wp_body_open(); ?>

    <!-- Skip Link -->
    <a class="skip-link screen-reader-text" href="#page-content">
        <?php esc_html_e( 'Skip to content', 'rb-blog-one' ); ?>
    </a>

<!--==============================
===== Header Area Start Here =====
===============================-->
<header class="site-header">
    <?php do_action ( 'rb_blog_one_header' ); ?>
</header>
<!--============================
===== Header Area End Here =====
=============================-->