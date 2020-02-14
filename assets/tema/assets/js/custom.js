 (function($) {

 	"use strict";
	$(document).ready(function() {
	 
		//jQuery for page scrolling feature - requires jQuery Easing plugin
	
			$('a.page-scroll').on('click', function(event) {
				var $anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1500, 'easeInOutExpo');
				event.preventDefault();
			});
	

		
		//LightCase
		
			$('a[data-rel^=lightcase]').lightcase();
		

		//Js code for search box 
		
			$(".first_click").on("click", function(){
				$(".menu-right-option").addClass("search_box");	 
			});
			$(".second_click").on("click", function(){
				$(".menu-right-option").removeClass("search_box"); 
			});	
			
		
		//countdown 
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
		
		
			
		
		//Sponsors swiper
		
		var swiper = new Swiper('.sponsors-container', {
			pagination: '.swiper-pagination',
			slidesPerView: 4,
			spaceBetween: 20,
			autoplay: 3000,
			paginationClickable: true,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			 breakpoints: {
				1024: {
					slidesPerView: 3,
					spaceBetween: 20
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 30
				},
				640: {
					slidesPerView: 1,
					spaceBetween: 20
				},
				400: {
					slidesPerView: 1,
					spaceBetween: 10
				}
			}
		});
		
		
		//testimonial swiper
		
		var swiper = new Swiper('.testimonial-container', {
			pagination: '.swiper-pagination',
			slidesPerView: 3,
			spaceBetween: 20,
			autoplay: 3000,
			paginationClickable: true,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			 breakpoints: {
				1024: {
					slidesPerView: 3,
					spaceBetween: 20
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 30
				},
				640: {
					slidesPerView: 1,
					spaceBetween: 20
				},
				400: {
					slidesPerView: 1,
					spaceBetween: 10
				}
			}
		});
		
		
		//people say container swiper
		
		var swiper = new Swiper('.people-say-container', {
			pagination: '.swiper-pagination',
			slidesPerView: 1,
			spaceBetween: 25,
			autoplay: false,
			paginationClickable: true,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			 breakpoints: {
				1024: {
					slidesPerView: 1,
					spaceBetween: 20
				},
				768: {
					slidesPerView: 1,
					spaceBetween: 30
				},
				640: {
					slidesPerView: 1,
					spaceBetween: 20
				},
				400: {
					slidesPerView: 1,
					spaceBetween: 10
				}
			}
		});
		
		//Pre-Loader
	
			
			$("#loading").delay(2000).fadeOut(500);
			$("#loading-center").on("click",function() {
			$("#loading").fadeOut(500);
			});
		
		
		
		//Scroll Top Top 
		
		var link,
		toggleScrollToTopLink = function(){
			
			if($("body").scrollTop() > 0 || $("html").scrollTop() > 0){
				link.fadeIn(400);
			}else{
				link.fadeOut(400);
			}
			
		};
		
			link = $(".scroll-img");
			
			$(window).scroll(toggleScrollToTopLink);
			
			toggleScrollToTopLink();
			
			link.on("click", function(){
				
				$("body").animate({scrollTop: 0});
				$("html").animate({scrollTop: 0});
				
			});
	
		
		//Menu Fixed Top
		
			var fixed_top = $(".menu-scroll");

			$(window).on('scroll', function() {
				
				if( $(this).scrollTop() > 100 ){	
					fixed_top.addClass("menu-fixed animated fadeInDown");
				}
				else{
					fixed_top.removeClass("menu-fixed animated fadeInDown");
				}
				
			});
			
	
			//Pricing Slider
		
			$('.nstSlider').nstSlider({
				"left_grip_selector": ".leftGrip",
				"right_grip_selector": ".rightGrip",
				"value_bar_selector": ".bar",
				"value_changed_callback": function(cause, leftValue, rightValue) {
					$(this).parent().find('.leftLabel').text(leftValue);
					$(this).parent().find('.rightLabel').text(rightValue);
				}
			});

			
		
		
		
	//Flex Slider
			
		$(window).load(function() {
		  // The slider being synced must be initialized first
		  $('#carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 74,
			itemMargin: 5,
			asNavFor: '#slider'
		  });
		 
		  $('#slider').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel"
		  });
		});
		
		

	//nst Slider
	
		$('.nstSlider').nstSlider({
			"left_grip_selector": ".leftGrip",
			"right_grip_selector": ".rightGrip",
			"value_bar_selector": ".bar",
			"value_changed_callback": function(cause, leftValue, rightValue) {
				$(this).parent().find('.leftLabel').text(leftValue);
				$(this).parent().find('.rightLabel').text(rightValue);
			}
		});
        




    //Sidebar Menu
        $(".color-btn").on("click", function () {
            $(".box-style").toggleClass('open')
        });


        

        $(".boxed-btn").on("click", function () {
            $("body").addClass('boxed')
        });


        $(".wide-btn").on("click", function () {
            $("body").removeClass('boxed')
        });

        $(".rtl-btn").on("click", function () {
            $("body").addClass('rtl');
            var body = document.querySelector("body"); 
            body.setAttribute("dir", "rtl");
        });


        $(".ltl-btn").on("click", function () {
            $("body").removeClass('rtl');
            var body = document.querySelector("body"); 
            body.setAttribute("dir", "ltl");
        });




        jQuery(document).ready(function(){
	        jQuery(".bg-1").click(function(){            
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/01.jpg) no-repeat fixed","background-size":"cover" });
	            jQuery("body").addClass("boxed");
	        });
	        jQuery(".bg-2").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/02.jpg) no-repeat fixed","background-size":"cover"});
	        });
	        jQuery(".bg-3").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/03.jpg) no-repeat fixed","background-size":"cover" });
	        });
	        jQuery(".bg-4").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/04.jpg) no-repeat fixed","background-size":"cover"});
	        });
	        jQuery(".bg-5").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/05.jpg) no-repeat fixed","background-size":"cover"});
	        });
	        jQuery(".bg-6").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/06.jpg) no-repeat fixed","background-size":"cover"});
	        });
	        jQuery(".bg-7").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/07.jpg) no-repeat fixed","background-size":"cover"});
	        });   
	        jQuery(".bg-8").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/08.jpg) no-repeat fixed","background-size":"cover"});
	        });      
	    });

	    jQuery(document).ready(function(){      
	        jQuery(".pt-1").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/pt-image/01.png) repeat fixed"});
	        });
	        jQuery(".pt-2").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/pt-image/02.png) repeat fixed"});
	        });
	        jQuery(".pt-3").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/pt-image/03.png) repeat fixed" });
	        });
	        jQuery(".pt-4").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/pt-image/04.png) repeat fixed"});
	        });
	        jQuery(".pt-5").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/pt-image/05.png) repeat fixed"});
	        });
	        jQuery(".pt-6").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/pt-image/06.png) repeat fixed"});
	        });
	        jQuery(".pt-7").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/pt-image/07.png) repeat fixed"});
	        });
	        jQuery(".pt-8").click(function(){
	            jQuery("body").addClass("boxed");
	            jQuery("body").css({"background":"url(https://www.codexcoder.com/images/auror/pt-image/08.png) repeat fixed"});
	        });
	    });
        


		
	});	

})(jQuery);





	


