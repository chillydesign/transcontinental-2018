$(function() {


    	$(".header_slider").slick({
            infinite: true,
    		autoplay: true,
    		slidesToShow: 1,
            dots: false,
            arrows: false,
            fade: true,
            speed: 1000,
            autoplaySpeed: 3000
                
        });

	//Offers slider
	$(".home #offers_slider").slick({

		// normal options...
		infinite: true,
		autoplay: false,
		dots: false,
		slidesToShow: 3,

		// the magic
		responsive: [{

			breakpoint: 992,
			settings: {
				slidesToShow: 2,
			}

		}, {

			breakpoint: 568,
			settings: {
				slidesToShow: 1
			}

		}]
	});

	$("#gallery_slider").slick({

		// normal options...
		infinite: true,
		autoplay: true,
		speed: 500,
		dots: false,
		slidesToShow: 1,
		fade: true,
		cssEase: 'linear'
	});

	$('a#offre_slide').on('click', function(e){
		$offset = $('header').height() +50;
		console.log($offset);
		$("html, body").animate({ scrollTop: $('#reserver').offset().top - $offset }, 1000);
	});



	$(".img_gallery").justifiedGallery({
		rowHeight : 150,
		margins: 4,
		lastRow : 'justify'
	}).on('jg.complete', function () {
		$('a.gallery').featherlightGallery({
			previousIcon: '<',
			nextIcon: '>'
		});

	});


	// 	$(".img_gallery").justifiedGallery({
	// 	 rowHeight : 150,
	// 	 margins: 4,
	// 	 lastRow : 'justify'
	// }).on('jg.complete', function () {
	//     $(this).find('a').colorbox({
	//         maxWidth : '80%',
	//         maxHeight : '80%',
	//         overlayClose : true,
	//         opacity : 0.8,
	//         transition : 'elastic',
	//         current : ''
	//     });


	// });

	var $nav = $('#nav');


	var unslider = $('.slideshow').unslider({
		'animation': 'fade',
		'nav' : false,
		'arrows' : true,
		'autoplay' : true,
		'delay' : 6000
	});


	unslider.on('unslider.change', function(event, index, slide) {

		if(typeof map !== 'undefined'){
			// MOVE MAP CENTER TO NEW SLIDE LOCATION
			// var $lat_lon = $('#lat_lon');
			// var $lat_lon_current = slide[0].dataset.latlon;
			// $lat_lon.val(  $lat_lon_current );
			// console.log('current', $lat_lon_current);
		}

	});

	var $window = $(window);
	var $body = $('body');
	var $windowHeight = $window.height();
	var $header = $('header');
	var $social_bar = $('#social_bar');


	$window.scroll(function(){

		var windowScroll = $window.scrollTop();


		if (windowScroll > (300  ))  {
			$header.addClass('visible_header');
			$social_bar.addClass('visible_bar');
		} else {
			$header.removeClass('visible_header');
			$social_bar.removeClass('visible_bar');
		}



	});


	$('.offre_content .allbutlink').matchHeight();
	$('.reservation_box .allbutlink').matchHeight();
	$('.block h4').matchHeight();

	$('.iframe_link').on('click', function(e){
		e.preventDefault();
		var $this = $(this);

		var $placetoslide = $('#placetoslide');

		loadIframe($this);

		$("html, body").animate({ scrollTop: ( $placetoslide.offset().top  -100 )  }, 2000);

	});


	function loadIframe($element) {
		var $this = $element;
		var $url = $this.data('url');
		var $message = $this.data('message');
		var $piframe = $('#page_iframe');
		var $message_to_show = $('#message_to_show');
		$message_to_show.html('');

		if (typeof $url != 'undefined') {
			$piframe.attr({'src' :  $url  });
			setTimeout(function(){
				$piframe.css({'height': 700  });
			}, 1000);



		} else if (typeof $message != 'undefined') {
			var $piframe = $('#page_iframe').css({'height' : 0});
			$message_to_show.html($message);
		}

	}

	$firstiframelink = $('.offre_iframe .iframe_link').first();
	loadIframe( $firstiframelink );


	function iframeresize(){
		var $iframeheight = $('.iframecontained').height();
		$('.iframecontainer').css({'height' : $iframeheight});
	}
	iframeresize();


	$('.sidebar_inner').each(function(){
		$this = $(this);
		console.log($this.find('li').size());
		if ($this.find('li').size() < 2) {
			$this.hide();
		};
	})


	$('aside, #main_article').matchHeight();
	$('.iframe_links a').matchHeight();





	$('#show_nav_button').on('click', function(){
		$nav.find('ul.menu').toggle();
	});
	$('.menu-item-has-children').on('click', function(){
		$(this).children('ul.sub-menu').toggle();
		$(this).toggleClass('activenavli');
	});


	$('li', $nav).on('mouseover', function(){
		$this = $(this);
		$this.find('ul').addClass('ul_child_show');
	}).on('mouseout', function(){
		$this.find('ul').removeClass('ul_child_show');
	});



	$('.map_location').on('mouseover', function(){

		var $lat_lon = $('.unslider-active').data('latlon').split(',');
		var newLatlng = {lat: parseFloat($lat_lon[0]) , lng: parseFloat($lat_lon[1]) };
		map.setCenter( newLatlng   );

	});

	$('.map_location').featherlight('#mylightbox', {
		beforeOpen: function(){


			// resize if window resized
			$window = $(window);
			mapcontainer.css({width : $window.width() * 0.75});
			google.maps.event.trigger(map, 'resize');




		}
	} );



	var mapcontainer =  $('#googleMap');
	var myMapOptions = {
		zoom:8,
		mapTypeControl: false,
		scrollwheel: true
	};



	if ( mapcontainer.length > 0 ){
		// var $lat_lon = $('.unslider-active').data('latlon').split(',');
		//    var myLatlng = {lat: parseFloat($lat_lon[0]) , lng: parseFloat($lat_lon[1]) };
		var map = new google.maps.Map(mapcontainer.get(0), myMapOptions);
		var $window = $(window);
		mapcontainer.css({
			width : $window.width() * 0.75,
			height : 370
		})

		//	 map.setCenter( myLatlng   );

	}



	/// CONTACT ME AGENTS SLIDER
	$('.agent_section').hide();
	$('.agent_section:eq(0)').show();
	$agent_links = $('.agent_link');
	$agent_links.first().addClass('selected');

	$agent_links.on('click', function(e){
		$this = $(this);
		$id =  $this.data('id')
		$('.agent_section').hide();
		$('#' + $id).show();
		$agent_links.removeClass('selected');
		$this.addClass('selected');
		$('aside, #main_article').matchHeight();


	});

	$('.map_height').matchHeight();

	var map_container = $('#agencymap');
	map_container.css({
		width : '100%'
	})
	var agencymap = new google.maps.Map(map_container.get(0), {
		// center: {lat: latitude , lng: longitude  },
		zoom: 14,
		scrollwheel: false
	});

	var marker, i;
	var locations = [[46.192858, 6.162241, 'Agence Florissant'], [46.193973, 6.195679, 'Agence Chêne']]
	var bounds = new google.maps.LatLngBounds();
	var infowindow = new google.maps.InfoWindow({content: '...'});
	for (i = 0; i < locations.length; i++) {
		var location = locations[i];
		var latlng = new google.maps.LatLng(location[0], location[1]),
		marker = new google.maps.Marker({
			position: latlng,
			map: agencymap,
			title: location[2]
		});
		marker.addListener('click', function() {
			infowindow.setContent(  this.title);
			infowindow.open(agencymap, this);
		});
		bounds.extend(latlng);
	}

	agencymap.fitBounds(bounds);




});
