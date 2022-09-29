(function ($) {
"use strict";


/*=============================================
       =          Preloader             =
=============================================*/
function preloader() {
	$('#preloader').delay(0).fadeOut();
};

$(window).on('load', function () {
	preloader();
	mainSlider();
	wowAnimation();
});


/*=============================================
       =          One Page Nav         =
=============================================*/
$(document).ready(function () {
	$("html").css('scroll-behavior', 'auto');
});
var top_offset = $('.header-area').height() + 20;
$('.main-menu nav ul').onePageNav({
	currentClass: 'active',
	scrollOffset: top_offset,
	filter: ':not(.external)',
	changeHash: false,
	scrollThreshold: 0.5,
});


/*=============================================
       =          Sticky Header         =
=============================================*/
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$("#sticky-header").removeClass("sticky-menu");
		$('.scroll-to-target').removeClass('open');
	} else {
		$("#sticky-header").addClass("sticky-menu");
		$('.scroll-to-target').addClass('open');
	}
});


/*=============================================
	=    		 Scroll Up  	         =
=============================================*/
if ($('.scroll-to-target').length) {
	$(".scroll-to-target").on('click', function () {
		var target = $(this).attr('data-target');
		// animate
		$('html, body').animate({
			scrollTop: $(target).offset().top
		}, 1000);

	});
}

/*=============================================
       =          Menu Toggle         =
=============================================*/
$(".navbar-toggle").on('click', function () {
	$(".navbar-nav").addClass("mobile_menu");
});
$(".navbar-nav li a:not(.external)").on('click', function () {
	$(".navbar-collapse").removeClass("show");
});


/*=============================================
	=          Data Background               =
=============================================*/
$("[data-background]").each(function () {
	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
})


/*=============================================
       =          mainSlider         =
=============================================*/
function mainSlider() {
	var BasicSlider = $('.slider-active');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		autoplay: false,
		autoplaySpeed: 10000,
		dots: false,
		fade: true,
		arrows: false,
		rtl: true,
		responsive: [
			{ breakpoint: 767, settings: { dots: false, arrows: false } }
		]
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}


/*=============================================
       =         Slider BG Active        =
=============================================*/
$('.background-image-active').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	dots: false,
	arrows: false,
	rtl: true,
	infinite: true,
	autoplay: true,
	fade: true,
	autoplaySpeed: 5000,
	pauseOnHover: false,
});


/*=============================================
       =         Slider App Active        =
=============================================*/
$('.svn-slider-active').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	rtl: true,
	dots: false,
	arrows: false,
	infinite: true,
	autoplay: true,
	autoplaySpeed: 1400,
});


/*=============================================
       =          App Active         =
=============================================*/
$('.app-active').slick({
	slidesToShow: 5,
	slidesToScroll: 1,
	dots: false,
	arrows: false,
	infinite: true,
	rtl: true,
	centerMode: true,
	centerPadding: 0,
	autoplay: true,
	autoplaySpeed: 1200,
	responsive: [
		{
			breakpoint: 1500,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 1199,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 560,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
	]
});



/*=============================================
       =      Testimonial Active         =
=============================================*/
$('.testimonial-active').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	dots: true,
	arrows: true,
	prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-long-arrow-alt-right"></i></button>',
	nextArrow: '<button type="button" class="slick-next"><i class="fas fa-long-arrow-alt-left"></i></button>',
	infinite: true,
	rtl: true,
	autoplay: true,
	responsive: [
		{
			breakpoint: 1500,
			settings: {
				arrows: false,
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
     =      magnificPopup Active         =
=============================================*/
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
	  enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});


/*=============================================
     =           Countdown         =
=============================================*/
$('[data-countdown]').each(function () {
	var $this = $(this), finalDate = $(this).data('countdown');
	$this.countdown(finalDate, function (event) {
		$this.html(event.strftime('<div class="time-count">%D <span>Days</span></div><div class="time-count">%H <span>Hours</span></div><div class="time-count">%M <span>minutes</span></div><div class="time-count">%S <span>seconds</span></div>'));
	});
});


/*=============================================
     =           Youtube Video         =
=============================================*/
if ($(".video-bg").length > 0) {
	//Hide player on mobile
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		$(".player").hide();
		$(".player-controls").hide();
	}
	//Youtube player
	$(".player").mb_YTPlayer();

	//Player controls
	$("#play").on("click", function () {
		$(".player").playYTP();
	});

	$("#pause").on("click", function () {
		$(".player").pauseYTP();
	});
}


/*=============================================
     =           counterUp         =
=============================================*/
$('.count').counterUp({
	delay: 10,
	time: 2000
});


/*=============================================
     =           WOW Active         =
=============================================*/
function wowAnimation() {
	var wow = new WOW({
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 0,
		mobile: false,
		live: true,
	});
	wow.init();
}


})(jQuery);