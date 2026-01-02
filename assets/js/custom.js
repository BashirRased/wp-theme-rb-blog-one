/*============================
Table of JS Content Start Here
==============================
	01. Preloader
	02. Header Sticky Menu
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
                $('.sticky-header-enable').addClass('sticky-header');
            }
            else {
                $('.sticky-header-enable').removeClass('sticky-header');
            }
        });

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