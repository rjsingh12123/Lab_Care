(function ($) {
	"use strict";

	// Page Loaded...
	$(document).ready(function () {

		/*==========  Responsive Navigation  ==========*/
		$('.main-nav').children().clone().appendTo('.responsive-nav');
		$('.responsive-menu-open').on('click', function(event) {
			event.preventDefault();
			$('body').addClass('no-scroll');
			$('.responsive-menu').addClass('open');
			return false;
		});
		$('.responsive-menu-close').on('click', function(event) {
			event.preventDefault();
			$('body').removeClass('no-scroll');
			$('.responsive-menu').removeClass('open');
			return false;
		});

		/*==========  Home Slider  ==========*/
		$('#home-slider').flexslider({
			selector: '.slides > .slide',
			controlNav: true,
			directionNav: false,
			pauseOnHover: false,
			smoothHeight: true
		});

		/*==========  Middle Slider  ==========*/
		$('#middle-slider').flexslider({
			selector: '.slides > .slide',
			controlNav: true,
			directionNav: true,
			pauseOnHover: false,
			smoothHeight: true
		});

		/*==========  Departments Slider  ==========*/
		$('.departments-slider').owlCarousel({
			loop:true,
			nav:true,
			dots: false,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsive:{
				0:{
					items:1
				},
				768:{
					items:3
				},
				1200:{
					items:6
				}
			}
		});

		/*==========  Awards Carousel  ==========*/
		$('.awards-carousel').owlCarousel({
			loop:true,
			nav:true,
			dots: false,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsive:{
				0:{
					items:3,
					margin: 12
				},
				600:{
					items:4,
					margin: 24
				},
				1000:{
					items:6,
					margin: 36
				}
			}
		});

		/*==========  service-slider  ==========*/
		$('.service-slider').owlCarousel({
			loop:true,
			nav:true,
			dots: false,
			navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
			margin: 12,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:4
				}
			}
		});

		/*==========  Accordion  ==========*/
		$('.panel-heading a').on('click', function() {
			if ($(this).parents('.panel-heading').hasClass('active')) {
				$('.panel-heading').removeClass('active');
				$('.panel-heading .icon .fa-minus').removeClass('fa-minus').addClass('fa-plus');
			} else {
				$('.panel-heading').removeClass('active');
				$(this).parents('.panel-heading').addClass('active');
				$('.panel-heading .icon .fa-minus').removeClass('fa-minus').addClass('fa-plus');
				$(this).find('.icon i').addClass('fa-minus');
			}
		});

		/*==========  Testimonial Slider  ==========*/
		$('.testimonial-slider').owlCarousel({
			loop:true,
			nav:true,
			dots: false,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:4
				}
			}
		});

		/*==========  Large Testimonial Slider  ==========*/
		$('.large-testimonial-slider').owlCarousel({
			loop:true,
			nav:true,
			dots: false,
			navText: ['<i></i>','<i></i>'],
			items: 1
		});

		/*==========  Testimonial Slider Image  ==========*/
		$('.testimonial-slider-image').owlCarousel({
			loop:true,
			nav:true,
			dots: false,
			navText: ['<i></i>','<i></i>'],
			items: 1
		});

		/*==========  Testimonial Slider Box  ==========*/
		$('.testimonial-slider-box').owlCarousel({
			loop:true,
			nav:true,
			dots: false,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			items: 1
		});

		$('.progress-bar').each(function(index) {
			var progress_bar = $(this);
			progress_bar.waypoint(function() {
				progress_bar.css("width", progress_bar.attr("aria-valuenow") + "%");
			}, {
				offset: 'bottom-in-view'
			});
		});

		$('.countTo').each(function(index) {
			var countTo = $(this);
			countTo.waypoint(function() {
				countTo.countTo({
					speed: 600
				});
			}, {
				offset: 'bottom-in-view'
			});
		});

		/* COUNTDOWN */
		$("#countdown").countdown({
			date: "1 Jan 2017 00:00:00", // Put your date here
			format: "on"
		});

		/*==========  Blog Post Slider  ==========*/
		$('.blog-post-slider').owlCarousel({
			loop:true,
			nav:true,
			dots: false,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			items: 1
		});

		/*==========  Range Sliders  ==========*/
		$('#distance-slider').noUiSlider({
			behaviour: 'tap',
			start: [2],
			step: 2,
			connect: 'lower',
			range: {
				'min': 0,
				'max': 20
			}
		});
		$('#distance-slider').Link('lower').to($('#distance'), null, wNumb({
			decimals: 0
		}));

		/*==========  Portfolio Fifths  ==========*/
		var $galleryThirdsContainer = $('#gallery-thirds').imagesLoaded(function() {
			$galleryThirdsContainer.isotope({
				itemSelector: '.item',
				layoutMode: 'masonry',
				percentPosition: true,
				masonry: {
					columnWidth: $galleryThirdsContainer.find('.portfolio-sizer')[0]
				}
			});
			return false;
		});
		$('#gallery-thirds-filters').on('click', 'button', function() {
			$('#gallery-thirds-filters button').removeClass('active');
			$(this).addClass('active');
			var filterValue = $(this).attr('data-filter');
			$galleryThirdsContainer.isotope({filter: filterValue});
		});

		/*==========  Events Grid  ==========*/
		var $eventsGridContainer = $('#events-grid').imagesLoaded(function() {
			$eventsGridContainer.isotope({
				itemSelector: '.item',
				layoutMode: 'masonry',
				masonry: {
					columnWidth: 282,
					gutter: 2
				}
			});
			return false;
		});

		/*==========  Twitter  ==========*/
		$('#tweets').twittie({
			username: 'EnvatoMarket',
			count: 1,
			template: '{{tweet}}',
			apiPath: './scripts/Tweetie/api/tweet.php'
		});

		$('.close-popup').on('click', function(event) {
			event.preventDefault();
			$('.popup-wrapper').fadeOut();
		});
		$(document).click(function(event) { 
			if (!$(event.target).closest('.popup').length) {
				$('.popup-wrapper').fadeOut();
			}
		});

		// color switcher
		$('.color-switcher-wrapper .trigger').on('click', function(event) {
			event.preventDefault();
			$(this).parent().toggleClass('open');
		});

		$('.color-switcher-wrapper .color').each(function(index) {
			$(this).on('click', function(event) {
				event.preventDefault();
				var style = $(this).attr('data-style');

				$('.header .logo img').attr('src', 'images/logo-' + style + '.png');
				$('.header-image .logo img').attr('src', 'images/logo-image-' + style + '.png');
				$('.header-simple .logo img').attr('src', 'images/logo-simple-' + style + '.png');
				$('.header-large .logo img').attr('src', 'images/logo-large-' + style + '.png');
				$('.header-transparent .logo img').attr('src', 'images/logo-white.png');
				$('.header-transparent.simple .logo img').attr('src', 'images/logo-transparent.png');

				$('.badge-img').attr('src', 'images/badge-' + style + '.png');
				
				if ($('#color-switcher').length) {
					$('#color-switcher').attr('href', 'css/' + style + '.css');
				}
			});
		});

	});
	
	/*==========  Validate Email  ==========*/
	function validateEmail($validate_email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if( !emailReg.test( $validate_email ) ) {
			return false;
		} else {
			return true;
		}
		return false;
	}

	/*==========  Newsletter Form  ==========*/
	var $form = $('#mc-embedded-subscribe-form');
	$form.submit(function() {
		$('#newsletter-error').fadeOut();
		$('#newsletter-success').fadeOut();
		$('#newsletter-loading').fadeOut();
		$('#newsletter-info').fadeOut();
		$('#newsletter-loading').fadeIn();
		if (validateEmail($('#mce-EMAIL').val()) && $('#mce-EMAIL').val().length !== 0) {
			$.ajax({
				type: $form.attr('method'),
				url: $form.attr('action'),
				data: $form.serialize(),
				cache: false,
				dataType: 'json',
				contentType: 'application/json; charset=utf-8',
				error: function(err) {
					$('#newsletter-error').fadeOut();
					$('#newsletter-success').fadeOut();
					$('#newsletter-loading').fadeOut();
					$('#newsletter-info').fadeOut();
					$('#newsletter-error .message').html(err.msg);
					$('#newsletter-error').fadeIn();
				},
				success: function(data) {
					if (data.result !== 'success') {
						$('#newsletter-error').fadeOut();
						$('#newsletter-success').fadeOut();
						$('#newsletter-loading').fadeOut();
						$('#newsletter-info').fadeOut();
						$('#newsletter-info .message').html(data.msg);
						$('#newsletter-info').fadeIn();
					} else {
						$('#newsletter-error').fadeOut();
						$('#newsletter-success').fadeOut();
						$('#newsletter-loading').fadeOut();
						$('#newsletter-info').fadeOut();
						$('#newsletter-success .message').html(data.msg);
						$('#newsletter-success').fadeIn();
					}
				}
			});
		} else {
			$('#newsletter-error').fadeOut();
			$('#newsletter-success').fadeOut();
			$('#newsletter-loading').fadeOut();
			$('#newsletter-info').fadeOut();
			$('#newsletter-error .message').html('Please enter a valid email.');
			$('#newsletter-error').fadeIn();
		}
		return false;
	});

	/*==========  Footer Map  ==========*/
	var full_width_map;
	function initialize_full_width_map() {
		if ($('.full-width-map').length) {
			var myLatLng = new google.maps.LatLng(-37.814199, 144.961560);
			var mapOptions = {
				zoom: 12,
				center: myLatLng,
				scrollwheel: false,
				panControl: false,
				zoomControl: true,
				scaleControl: true,
				mapTypeControl: false,
				streetViewControl: false,
				styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
			};
			full_width_map = new google.maps.Map(document.getElementById('full-width-map'), mapOptions);
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: full_width_map,
				title: 'Envato',
				icon: './images/marker.png'
			});
		} else {
			return false;
		}
		return false;
	}
	google.maps.event.addDomListener(window, 'load', initialize_full_width_map);

	/*==========  Map  ==========*/
	var map;
	function initialize_map() {
		if ($('.map').length) {
			var myLatLng = new google.maps.LatLng(-37.814199, 144.961560);
			var mapOptions = {
				zoom: 12,
				center: myLatLng,
				scrollwheel: false,
				zoomControl: true,
				zoomControlOptions: {
					position:google.maps.ControlPosition.LEFT_CENTER
				},
				scaleControl: false,
				mapTypeControl: false,
				streetViewControl: false,
				styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]
			};
			map = new google.maps.Map(document.getElementById('map'), mapOptions);
		} else {
			return false;
		}
		return false;
	}
	google.maps.event.addDomListener(window, 'load', initialize_map);

	/*==========  Background Map  ==========*/
	var map_background;
	function initialize_map_background() {
		if ($('.map-background').length) {
			var myLatLng = new google.maps.LatLng(-37.814199, 144.961560);
			var mapOptions = {
				zoom: 12,
				center: myLatLng,
				scrollwheel: false,
				zoomControl: true,
				zoomControlOptions: {
					position:google.maps.ControlPosition.LEFT_CENTER
				},
				scaleControl: false,
				mapTypeControl: false,
				streetViewControl: false,
				styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]
			};
			map_background = new google.maps.Map(document.getElementById('map-background'), mapOptions);
		} else {
			return false;
		}
		return false;
	}
	google.maps.event.addDomListener(window, 'load', initialize_map_background);

	$('.color-switcher-wrapper').fadeIn('slow');

})(jQuery);