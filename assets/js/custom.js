/*============================
Table of JS Content Start Here
==============================
	01. Preloader
	02. Header Sticky Menu
    03. Scroll to Top
	04. MeanMenu
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
                $('.sticky-header-enable').addClass('sticky-header');
            }
            else {
                $('.sticky-header-enable').removeClass('sticky-header');
            }
        });

        /*===========================
        ===== 03. Scroll to Top =====
        ===========================*/
		/*===== 3.1 Scroll to Top Button Display =====*/
		$(window).scroll(function(){		  
			var scrollTopBtn = $(window).scrollTop();		  
			if( scrollTopBtn > 100 ){
				$(".scroll-to-top").fadeIn();
			}else {
				$(".scroll-to-top").fadeOut();
			}
		});
		  
		/*===== 3.2 Scroll to Top Button Clickable =====*/
		$(".scroll-to-top").on('click', function(){
			$("html, body").animate({'scrollTop' : 0}, 2000);
			return false;
		});

		/*===============================
        ===== 04. Gallery Post Meta =====
        ===============================*/
		if ($('.post-gallery').length) {
			$('.post-gallery').owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			nav: true,
			dots: true,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: true,
			navText: [
				'<span class="owl-prev">&lsaquo;</span>',
				'<span class="owl-next">&rsaquo;</span>'
			],
				responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:1
				}
			}
			});
		}

        /*======================
        ===== 04. MeanMenu =====
        ======================*/
        $('.header-menu-container').meanmenu({
			meanMenuContainer: '.header-menu-area .container',
			meanScreenWidth: "991",
			meanMenuOpen: '<span></span><span></span><span></span>',
		});

    });

}(jQuery));