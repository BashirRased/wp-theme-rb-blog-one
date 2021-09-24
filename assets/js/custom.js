(function($){

	/* Website Preloader */
	$(window).on("load",function (){
		$(".preloader").delay(100).fadeOut(),
		setTimeout(function(){$("#preloader").addClass("loading-end"),
		setTimeout(function(){$("#preloader").hide()},1500)},800)
	});
	/* End */
  
	jQuery(document).ready(function(){
	  
		/* Scroll To Top Show/Hide */
		jQuery(window).scroll(function(){		  
		  var RBScroll = jQuery(window).scrollTop();		  
		  if( RBScroll > 100 ){
			  jQuery(".rb-scroll-to-top").fadeIn();
		  }else {
			  jQuery(".rb-scroll-to-top").fadeOut();
		  }
		});
		/* End */
	
		/* Scroll To Top Click */
		jQuery(".rb-scroll-to-top").on('click', function(){
			jQuery("html, body").animate({'scrollTop' : 0}, 500);
			return false;
		});
		/* End */
	
		/* Scroll Menu Bar */
		 $(window).scroll(function () {
			if ($(this).scrollTop() > 400) {
				$('.rb-header-menu-area').addClass("rb-scroll-header-menu");
			} else {
				$('.rb-header-menu-area').removeClass("rb-scroll-header-menu");
			}
		});
		/* End */
		
		/* Mobile Menu */
		jQuery(".rb-mobile-menu-icon").click(function(){
			jQuery(".rb-header-menu").slideToggle();
		});
		/* End */
	
		/* Icon Add With Dropdown Menu */
		jQuery(".rb-header-menu ul ul:first").parent("li").children("a").append(' <i class="fas fa-chevron-down"></i>');
		/* End */
	
		/* Icon Add With Multi-Dropdown Menu */
		jQuery(".rb-header-menu ul ul ul").parent("li").children("a").append(' <i class="fas fa-long-arrow-alt-right"></i>');
		/* End */
	
		/* Menu Resize Close/Open */
		jQuery(window).resize(function(){
			var RBMenu = jQuery(window).width();
			
			if(RBMenu > 992){
				jQuery(".rb-header-menu").show();
				
			}
			else{
				jQuery(".rb-header-menu").hide();			
			}
		});
		/* End */
	
	/* Menu Resize Close/Open */
	var url = window.location.href;
    var activePage = url;
    $('.rb-header-menu-area a').each(function () {
        var linkPage = this.href;

        if (activePage == linkPage) {
            $(this).addClass("rb-header-active-menu");
        }
    });
	/* End */
	
  });
  
}(jQuery))