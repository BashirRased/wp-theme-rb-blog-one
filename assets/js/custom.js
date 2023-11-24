/*
Theme Name: RB Blog One
Theme URI: https://bashirrased.com/theme/rb-blog-one/
Text Domain: rb-blog-one
Version: 1.1.6
Requires at least: 6.1
Tested up to: 6.2
Requires PHP: 5.6
Description: RB Blog One is a responsive WordPress personal blog theme for WordPress. It is a WordPress theme specifically crafted for crafting professional blog websites. It is built upon the latest web technologies. Live Preview: https://bashirrased.com/theme/rb-blog-one/
Tags: blog, custom-background, custom-logo, custom-menu, featured-images, full-width-template, right-sidebar, one-column, sticky-post, threaded-comments
Author: Bashir Rased
Author URI: https://bashirrased.com/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

RB Blog One WordPress Theme, (C) 2021-2023 Bashir Rased.
RB Blog One is distributed under the terms of the GNU GPL.
*/

/*============================
Table of JS Content Start Here
==============================
	01. Preloader
	02. Header Memu
    03. Nice Select
    04. Scroll to Top
============================
Table of JS Content End Here
==========================*/

(function ($) {
    'use strict';

    /*=========================================
    ===== 01. Preloader jQuery Start Here =====
    =========================================*/
    $(window).on("load", function () {
        $(".folding-cube").delay(700).fadeOut(),
        setTimeout(function () {
            setTimeout(function () {
                $("#preloader").hide()
            }, 1500)
        }, 800)
    });
    /*=======================================
    ===== 01. Preloader jQuery End Here =====
    =======================================*/

    $(document).ready(function () {

        /*===========================================
        ===== 02. Header Memu jQuery Start Here =====
        ===========================================*/
        $('.header-menu-container').meanmenu({
			meanMenuContainer: '.header-menu-area .container',
			meanScreenWidth: "991",
			meanMenuOpen: '<span></span><span></span><span></span>',
		});
        /*=========================================
        ===== 02. Header Memu jQuery End Here =====
        =========================================*/

        /*===========================================
        ===== 03. Nice Select jQuery Start Here =====
        ===========================================*/
        $('select').niceSelect();
        /*=========================================
        ===== 03. Nice Select jQuery End Here =====
        =========================================*/

        /*=============================================
        ===== 04. Scroll to Top jQuery Start Here =====
        =============================================*/
		/*===== 4.1 Scroll to Top Button Display =====*/
		$(window).scroll(function(){		  
			var scrollTopBtn = $(window).scrollTop();		  
			if( scrollTopBtn > 100 ){
				$(".scroll-to-top").fadeIn();
			}else {
				$(".scroll-to-top").fadeOut();
			}
		});
		  
		/*===== 4.2 Scroll to Top Button Clickable =====*/
		$(".scroll-to-top").on('click', function(){
			$("html, body").animate({'scrollTop' : 0}, 1500);
			return false;
		});	  
		/*===========================================
        ===== 04. Scroll to Top jQuery End Here =====
        ===========================================*/

    });

}(jQuery));