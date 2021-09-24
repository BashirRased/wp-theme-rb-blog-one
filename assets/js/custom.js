/*
Theme Name: RB Blog One
Text Domain: rb-blog-one
Version: 1.0.8
Requires at least: 4.7
Tested up to: 5.5
Requires PHP: 5.2.4
Description: This is a personal free blog website.
Tags: one-column, blog, custom-logo, custom-menu, featured-images, right-sidebar
Author: Bashir Rased
Author URI: http://bashir-rased.com/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*============================
Table of JS Content Start Here
==============================
	01.	Preloader----------------------------->Line 33
	02. Nice Scrollbar------------------------>Line 51
    03. Link Smooth Effect-------------------->Line 67
    04. Icon Add With Dropdown Menu Item------>Line 81
    05. Mobile Menu--------------------------->Line 95
    06. Scroll to Top------------------------->Line 109
============================
Table of JS Content End Here
==========================*/

(function ($) {
    'use strict';

    /*=========================================
    ===== 01. Preloader jQuery Start Here =====
    =========================================*/
    jQuery(window).on("load", function () {
        $(".rb-blog-one-folding-cube").delay(700).fadeOut(),
            setTimeout(function () {
                $("#rb-blog-one-preloader").addClass("rb-blog-one-loading-end"),
                    setTimeout(function () {
                        $("#rb-blog-one-preloader").hide()
                    }, 1500)
            }, 800)
    });
    /*=======================================
    ===== 01. Preloader jQuery End Here =====
    =======================================*/

    jQuery(document).ready(function () {

        /*==============================================
        ===== 02. Nice Scrollbar jQuery Start Here =====
        ==============================================*/
        $("body").niceScroll({
            cursorwidth: 8,
            cursorcolor: '#f93601',
            cursorborder: "none",
            cursorborderradius: 15,
            zindex: 9999,
            autohidemode: false,
            cursorminheight: 200,
        });
        /*============================================
        ===== 02. Nice Scrollbar jQuery End Here =====
        ============================================*/

        /*==================================================
		===== 03. Link Smooth Effect jQuery Start Here =====
		==================================================*/
        $('.rb-blog-one-scroll-top a').on("click", function (e) {
            var anchor = jQuery(this);
            jQuery('html, body').stop().animate({
                scrollTop: jQuery(anchor.attr('href')).offset().top
            }, 3000);
            e.preventDefault();
        });
        /*================================================
		===== 03. Link Smooth Effect jQuery End Here =====
        ================================================*/

        /*================================================================
        ===== 04. Icon Add With Dropdown Menu Item jQuery Start Here =====
        ================================================================*/
        $(".rb-blog-one-header-desktop-menu .sub-menu:first").siblings("a").parent("li").prepend('<i class="fas fa-chevron-down"></i>');

        if ($(window).width() > 991) {
            $(".rb-blog-one-header-desktop-menu .sub-menu ul").siblings("a").parent("li").prepend('<i class="fas fa-chevron-right"></i>');
        } else {
            $(".rb-blog-one-header-desktop-menu .sub-menu ul").siblings("a").parent("li").prepend('<i class="fas fa-chevron-down"></i>');
        }
        /*==============================================================
        ===== 04. Icon Add With Dropdown Menu Item jQuery End Here =====
        ==============================================================*/

        /*===========================================
        ===== 05. Mobile Menu jQuery Start Here =====
        ===========================================*/
        $(".rb-blog-one-mobile-menu").click(function () {
            $(".rb-blog-one-header-menu").slideToggle();
        });

        $(".rb-blog-one-header-desktop-menu i").click(function () {
            $(this).siblings("ul").slideToggle();
        });
        /*=========================================
        ===== 05. Mobile Menu jQuery End Here =====
        =========================================*/

        /* ========================================
        ===== 06. Scroll to Top JS Start Here =====
        ======================================== */
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $(".rb-blog-one-scroll-top").fadeIn();
            } else {
                $(".rb-blog-one-scroll-top").fadeOut();
            }
        });
        /* ======================================
        ===== 06. Scroll to Top JS End Here =====
        ====================================== */

    });

}(jQuery));