/*============================
Table of JS Content Start Here
==============================
	01. Preloader
	02. Header Sticky Menu
    03. MeanMenu
    04. Swiper
    05. Nice Select
    06. Scroll to Top
*/

(function ($) {
    'use strict';
    
    $(window).on("load", function () {
        /*=======================
        ===== 01. Preloader =====
        =======================*/
        $(".folding-cube").delay(700).fadeOut(),
        setTimeout(function () {
            setTimeout(function () {
                $("#preloader").hide()
            }, 1500)
        }, 800)
    });

    $(document).ready(function () {
        $(window).scroll(function(){
            /*================================
            ===== 02. Header Sticky Menu =====
            ================================*/
            if ($(window).scrollTop() >= 50) {
                $('.header-fixed-active').addClass('header-fixed-menu');
            }
            else {
                $('.header-fixed-active').removeClass('header-fixed-menu');
            }
        });

        /*======================
        ===== 03. MeanMenu =====
        ======================*/
        $('.header-menu-container').meanmenu({
			meanMenuContainer: '.header-menu-area .container',
			meanScreenWidth: "991",
			meanMenuOpen: '<span></span><span></span><span></span>',
		});

        /*====================
        ===== 04. Swiper =====
        ====================*/
        var swiper = new Swiper(".post-img-gallery", {
            autoplay: true,
            loop: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            pagination: {
              el: ".swiper-pagination",
            },
        });

        /*=========================
        ===== 05. Nice Select =====
        =========================*/
        $('select').niceSelect();

        /*===========================
        ===== 06. Scroll to Top =====
        ===========================*/
		/*===== 6.1 Scroll to Top Button Display =====*/
		$(window).scroll(function(){		  
			var scrollTopBtn = $(window).scrollTop();		  
			if( scrollTopBtn > 100 ){
				$(".scroll-to-top").fadeIn();
			}else {
				$(".scroll-to-top").fadeOut();
			}
		});
		  
		/*===== 6.2 Scroll to Top Button Clickable =====*/
		$(".scroll-to-top").on('click', function(){
			$("html, body").animate({'scrollTop' : 0}, 2000);
			return false;
		});

    });

}(jQuery));