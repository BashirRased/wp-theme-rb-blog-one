/*
Theme Name: RB Blog One
Theme URI: https://github.com/BashirRased/wp-theme-rb-blog-one
Text Domain: rb-blog-one
Version: 1.1.3
Requires at least: 5.3
Tested up to: 5.8
Requires PHP: 5.6
Description: This is a personal free blog website theme.
Tags: one-column, blog, custom-logo, custom-menu, featured-images, right-sidebar
Author: Bashir Rased
Author URI: http://bashir-rased.com/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*============================
Table of JS Content Start Here
==============================
	01.	Preloader
	02. Nice Scrollbar
    03. Link Smooth Effect
    04. Class Add With Dropdown Menu Item
    05. Icon Add With Dropdown Menu Item
    06. Mobile Menu
    07. Scroll to Top
============================
Table of JS Content End Here
==========================*/

(function ($) {
    'use strict';

    /*=========================================
    ===== 01. Preloader jQuery Start Here =====
    =========================================*/
    $(window).on("load", function () {
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

    $(document).ready(function () {        
        
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
        $('.rb-blog-one-scroll-top a').on("click", function (event) {
            event.preventDefault();
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top
            }, 3000);           
        });
        /*================================================
		===== 03. Link Smooth Effect jQuery End Here =====
        ================================================*/

        /*=================================================================
        ===== 04. Class Add With Dropdown Menu Item jQuery Start Here =====
        =================================================================*/
        $(".sub-menu .sub-menu").addClass("rb-blog-one-multi-dropdown-menu");
        $(".rb-blog-one-multi-dropdown-menu").removeClass("sub-menu");

        $(".sub-menu").addClass("rb-blog-one-dropdown-menu");
        $(".rb-blog-one-dropdown-menu").removeClass("sub-menu");
        /*===============================================================
        ===== 04. Class Add With Dropdown Menu Item jQuery End Here =====
        ===============================================================*/
        
        /*================================================================
        ===== 05. Icon Add With Dropdown Menu Item jQuery Start Here =====
        ================================================================*/
        $(".rb-blog-one-dropdown-menu").siblings("a").append('<i class="fas fa-chevron-down"></i>');

        $(".rb-blog-one-multi-dropdown-menu").siblings("a").append('<i class="fas fa-chevron-right"></i>');
        /*==============================================================
        ===== 05. Icon Add With Dropdown Menu Item jQuery End Here =====
        ==============================================================*/

        /*===========================================
        ===== 06. Mobile Menu jQuery Start Here =====
        ===========================================*/
        $('.rb-blog-one-mobile-menu').on("click", function (event) {
            event.preventDefault();
            $('.rb-blog-one-header-desktop-menu').toggleClass('rb-blog-one-menu-open');
        });

        $(".menu-item-has-children").children("a").append('<button><i class="fas fa-chevron-down"></i></button>');

        $('.menu-item-has-children button').on("click", function (event) {
            event.preventDefault();
            $(this).parent("a").siblings("ul").toggleClass('rb-blog-one-dropdown-menu-open');
        });
        /*=========================================
        ===== 06. Mobile Menu jQuery End Here =====
        =========================================*/

        /* ========================================
        ===== 07. Scroll to Top JS Start Here =====
        ======================================== */
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $(".rb-blog-one-scroll-top").fadeIn();
            } else {
                $(".rb-blog-one-scroll-top").fadeOut();
            }
        });
        /* ======================================
        ===== 07. Scroll to Top JS End Here =====
        ====================================== */

    });

}(jQuery));