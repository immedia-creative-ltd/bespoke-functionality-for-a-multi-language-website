 jQuery(document).ready(function($) {
	 
	 
	 
	 /**
 * Disable WPCF7 button while it's submitting
 * Stops duplicate enquiries coming through
 */
document.addEventListener( 'wpcf7submit', function( event ) {
    
    // find only disbaled submit buttons
    var button = $('.wpcf7-submit[disabled]');

    // grab the old value
    var old_value = button.attr('data-value');

    // enable the button
    button.prop('disabled', false);

    // put the old value back in
    button.val(old_value);

}, false );

$('form.wpcf7-form').on('submit',function() {

    var form = $(this);
    var button = form.find('input[type=submit]');
    var current_val = button.val();

    // store the current value so we can reset it later
    button.attr('data-value', current_val);

    // disable the button
    button.prop("disabled", true);

    // tell the user what's happening
    button.val("Sending, please wait...");

});
	 
	 
	 
	 
  // Adding Bootstrap Modal to WordPress Menu
  $('.launch-main-modal').find('a').attr('data-toggle', 'modal');
  $('.launch-main-modal').find('a').attr('data-target', '#mainModal');
	 
//Animation for counters
$('.counter').counterUp({
	delay: 10,
	time: 3000
});


//Add class for animation to svg when waypoint is reached
//$('.lazy').each(function(){
//var $lazy = $(this);
//$lazy.waypoint(function() {
	//console.log('Waypoint!');
	//$lazy.addClass('animated wpb_left-to-right');
//}, {offset: 'bottom-in-view'});
//});


// Add play button to modal videos
$('.ult-modal-img, .testimonial-image, .full-video img').each(function(){
var $modalImage = $(this);
	$modalImage.after( '<div class="play-box"><i class="fas fa-play"></i>Play</div>' );
});

// Remove play button from slider modal and Design 2021
$('.photo-slide .ult-modal-img').next('.play-box').remove();

if ($(".page-template-design2021_2")[0] ){
$('.ult-modal-img, .testimonial-image, .full-video img').next('.play-box').remove();
}
if ($(".page-template-healthcare-professionals-design2021_2")[0]){
$('.ult-modal-img, .testimonial-image, .full-video img').next('.play-box').remove();
}

// Add play button to modal videos Design2021 2.0
$('body.page-template-design2021_2 .ult-modal-img').each(function(){
var $modalImage = $(this);
	$modalImage.after( '<img class="modal-play" src="/wp-content/uploads/2021/06/play.png" alt="play" />' );
});
$('body.page-template-healthcare-professionals-design2021_2 .ult-modal-img').each(function(){
var $modalImage = $(this);
	$modalImage.after( '<img class="modal-play" src="/wp-content/uploads/2021/06/play.png" alt="play" />' );
});

$('body.page-template-healthcare-professionals-design2021_2 .ult-modal-img').each(function(){
var $modalImage = $(this);
	$modalImage.after( '<img class="modal-play" src="/wp-content/uploads/2021/06/play.png" alt="play" />' );
});
$('body.page-template-healthcare-professionals-design2021_2 .ult-modal-img').each(function(){
var $modalImage = $(this);
	$modalImage.after( '<img class="modal-play" src="/wp-content/uploads/2021/06/play.png" alt="play" />' );
});


$('body.page-id-15581 .ult-modal-img').each(function(){
var $modalImage = $(this);
	$modalImage.after( '<img class="modal-play" src="/wp-content/uploads/2021/06/play.png" alt="play" />' );
});



// Add play button to play block
$('.play-content').each(function(){
$(this).before( '<div class="play-box"><i class="fas fa-play"></i>Play</div>' );
$(this).prev().addBack().wrapAll('<div class="play-block" />');
});

// Set heights
$(function() {
	$('.service-box').matchHeight();
	$('.catch-section').matchHeight();
	$('.match-height').matchHeight();
});

// Add slider tech to VC
// Normal slider
$(':not(.slider-item) + .slider-item, * > .slider-item:first-of-type').
     each(function() {
       $(this).
           nextUntil(':not(.slider-item)').
           addBack().
           wrapAll('<div class="standard-slider owl-carousel owl-theme" />');
     });

$('.slider-row > .wpb_column > .vc_column-inner > .wpb_wrapper').addClass('standard-slider owl-carousel owl-theme');

$('.standard-slider').owlCarousel({
	items:1,
    loop:true,
    nav:true,
	smartSpeed:2000,
	navText : ['<i class="fas fa-chevron-circle-left"></i>','<i class="fas fa-chevron-circle-right"></i>']
});

// slick slider (Design 2021)
$(':not(.slick-slide) + .slick-slide, * > .slick-slide:first-of-type').
     each(function() {
       $(this).
           nextUntil(':not(.slick-slide)').
           addBack().
           wrapAll('<div class="slick-slider owl-carousel owl-theme" />');
     });
$('.slick-slider').owlCarousel({
    loop:true,
	nav:true,
	dots:true,
	animateIn: 'fadeIn',
	animateOut: 'fadeOut',
	autoplay:true,
	smartSpeed:300,
	autoplayTimeout:8000,
	autoplayHoverPause:true,
	navText : ["<button type='button' data-role='none' class='slick-prev slick-arrow' aria-label='Previous' role='button' aria-disabled='false'>Previous</button>","<button type='button' data-role='none' class='slick-next slick-arrow' aria-label='Next' role='button' aria-disabled='false'>Next</button>"],
		responsive:{
		0 : {
			items:1,
			nav:false,
			margin:0
		},
		768 : {
			items:1,
			nav:true,
			margin:0
		},
		1024: {
			items:2,
			margin:20
		}
	}
});

// Photo slider (Design 2021)
$(':not(.photo-slide) + .photo-slide, * > .photo-slide:first-of-type').
     each(function() {
       $(this).
           nextUntil(':not(.photo-slide)').
           addBack().
           wrapAll('<div class="photo-slider owl-carousel owl-theme" />');
     });
$('.photo-slider').owlCarousel({
	items:1,
    loop:false,
    navRewind:false,
    nav:true,
	autoplay:false,
	smartSpeed:300,
	autoplayTimeout:8000,
	autoplayHoverPause:true,
	navText : ["<button type='button' data-role='none' class='slick-prev slick-arrow' aria-label='Previous' role='button' aria-disabled='false'>Previous</button>","<button type='button' data-role='none' class='slick-next slick-arrow' aria-label='Next' role='button' aria-disabled='false'>Next</button>"]
});

// Timeline slider
$(':not(.timeline-slide) + .timeline-slide, * > .timeline-slide:first-of-type').
     each(function() {
       $(this).
           nextUntil(':not(.timeline-slide)').
           addBack().
           wrapAll('<div class="timeline-slider owl-carousel owl-theme" />');
     });

$('.timeline-slider').owlCarousel({
    loop:false,
	autoplay:true,
	smartSpeed:300,
	autoplayTimeout:8000,
	autoplayHoverPause:true,
	navText : ["<button type='button' data-role='none' class='slick-prev slick-arrow' aria-label='Previous' role='button' aria-disabled='false'>Previous</button>","<button type='button' data-role='none' class='slick-next slick-arrow' aria-label='Next' role='button' aria-disabled='false'>Next</button>"],
		responsive:{
		0 : {
			items:1,
			margin:20,
	nav:false,
	dots:true,
		},
		768 : {
			items:2,
			margin:20,
	nav:true,
	dots:false,
		},
		1049 : {
			items:3,
			margin:20,
	nav:true,
	dots:false,
		},
		1336: {
			items:4,
			margin:20,
	nav:true,
	dots:false,
		}
	}
});

// Wrap centre elements within photo slider

$('.photo-slide .wpb_text_column').
     each(function() {
       $(this).next(".ult-modal-input-wrapper").andSelf().wrapAll('<div class="photo-slider_content" />');
     });

// Image slider
$(':not(.image-slide) + .image-slide, * > .image-slide:first-of-type').
     each(function() {
       $(this).
           nextUntil(':not(.image-slide)').
           addBack().
           wrapAll('<div class="image-slider owl-carousel owl-theme" />');
     });
$('.image-slider').owlCarousel({
	items:1,
    loop:true,
    nav:false,
	autoplay:true,
	smartSpeed:2500,
	autoplayTimeout:8000
});

// logo slider overrides
$('#lcs_logo_carousel_slider').owlCarousel({
	loop:true,
	autoWidth:false,
	responsiveClass:true,
	dots:false,
	autoplay:true,

	autoplayTimeout: 4000,
	autoplayHoverPause: false,
	dotData:true,
	dotsEach:false,
	slideBy:1,
	rtl:false,
	nav:true,
	navText : ['<i class="fas fa-chevron-circle-left"></i>','<i class="fas fa-chevron-circle-right"></i>'],
	smartSpeed: 1000,
	responsive:{
		0 : {
			items:2
		},
		500: {
			items:3
		},
		600 : {
			items:3
		},
		768:{
			items:4
		},
		1199:{
			items:5
		}
	}
});

// Testimonial slider
$(':not(.testimonial-item) + .testimonial-item, * > .testimonial-item:first-of-type').
     each(function() {
       $(this).
           nextUntil(':not(.testimonial-item)').
           addBack().
           wrapAll('<div class="testimonial-slider owl-carousel owl-theme" />');
     });
$('.testimonial-slider').owlCarousel({
    loop:true,
    nav:true,
	smartSpeed:2000,
	navText : ['<i class="fas fa-chevron-circle-left"></i>','<i class="fas fa-chevron-circle-right"></i>'],
	responsive:{
		0 : {
			items:1
		},
		991: {
			items:2
		}
	}
});


// Custom Tool Tips

$('.pulse-tool-tip .align-icon .aio-icon i').replaceWith( '<div class="button pulse"></div>' );

});

// Enable bootstrap tooltips

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

/*jQuery(document).ready(function($) {
	set_country_state();
	
$(".countries").change(function(){
	set_country_state();
});
	
		function set_country_state(){
		if($("select.states").length>0) {
var country = $(".countries").children("option:selected").attr('data-id');
 jQuery.ajax({
            url : get_state_ajax.ajaxurl,
            type : 'post',
	        dataType : "json",
            data : {action: "get_states_by_ajax",nonce_ajax : get_state_ajax.nonce,country:country},
            success : function( response ) {
				if(response != ''){
					$(".states").show();
					$(".states").html('<option value="">Select State</option>');
					for(i=0;i<response.length;i++) {
						var st_id=response[i]['id'];
						var st_name=response[i]['name'];
						var opt="<option data-id='"+st_id+"' value='"+st_name+"'>"+st_name+"</option>";				
						$(".states").append(opt);		
					}
				} else {
					$(".states").hide();
				}
            }
        });
}
	}
});*/


jQuery(document).ready(function($) {
	set_country_state();
	
$(".countries").change(function(){
	set_country_state();
});
	
	function set_country_state(){

var country = $(".countries").children("option:selected").attr('data-id');
 jQuery.ajax({
            url : get_state_ajax.ajaxurl,
            type : 'post',
	        dataType : "json",
            data : {action: "get_states_by_ajax",nonce_ajax : get_state_ajax.nonce,country:country},
            success : function( response ) {
            	// console.log(response);
				if(response != ''){
					/*$(".states").show();
					$(".states").attr("required", true);*/
					$(".state_div").html(response);
					/*for(i=0;i<response.length;i++) {
						var st_id=response[i]['id'];
						var st_name=response[i]['name'];
						var opt="<option data-id='"+st_id+"' value='"+st_name+"'>"+st_name+"</option>";				
						$(".states").append(opt);		
					}*/
				} else {
					$(".state_div").html('');
				}
            }
        });
 //}
	}
});

jQuery(document).ready(function($) { 
 /*   $('.sf-form').submit(function() {
      var country = $( ".countries option:selected" ).val();
	  var state = $( ".states option:selected" ).val();
      if(country == ''){
		  $(".st-form-error").empty();
		  $(".st-form-error").append("<span style='color:red'>Please Select Country</span>");
		  return false;
	  }
	 if($('.states').is(':visible') && state == ''){
		  $(".st-form-error-state").empty();
		  $( ".st-form-error-state" ).append( "<span style='color:red'>Please Select State</span>" );
		  return false;
	  }
	});*/
});

jQuery(document).ready(function($) { 
$('.sf-form').on('submit', function(e) {
  if(grecaptcha.getResponse() == "") {
    e.preventDefault();
	  $('.captcha-error').text("Please verify captcha");
  } else {
     $('.captcha-error').text("");
  }
});
});

/* Add sticky to navigation on scroll */

/* viewport width */
function viewport() {
    var e = window,
        a = "inner";
    if (!("innerWidth" in window)) {
        a = "client";
        e = document.documentElement || document.body;
    }
    return {width: e[a + "Width"], height: e[a + "Height"]};
}

var handler = function () {
    var height_footer = jQuery("footer").height();
    var height_header = jQuery("header").height();

    var viewport_wid = viewport().width;
    var viewport_height = viewport().height;

    if (jQuery("header").length) {
        jQuery(window).scroll(function () {
            if (jQuery(window).scrollTop() > 50) {
                jQuery("header").addClass("fixed");
            } else {
                jQuery("header").removeClass("fixed");
            }
        });

        jQuery(window).load(function () {
            if (jQuery(window).scrollTop() > 50) {
                jQuery("header").addClass("fixed");
            } else {
                jQuery("header").removeClass("fixed");
            }
        });
    }
};
jQuery(window).bind("load", handler);
jQuery(window).bind("resize", handler);

//Set transparent logo
jQuery(document).ready(function($) { 

if ($(".home")[0]){
	$("#masthead .logo img").attr("src","/wp-content/uploads/2021/06/eXciteOSA-reverse-RGB-web.png");
}

});

// Swap logos on transparent menu scroll
if ($(".home")[0]){
jQuery(function($) {
  $(window).scroll(function() {
 var scrollPos = $(window).scrollTop();
   if($("#masthead").hasClass("fixed") && scrollPos > 50) {
      $("#masthead .logo img").attr("src","/wp-content/uploads/2020/09/eXciteOSA-primary-RGB-web.png");
   } else {
      $("#masthead .logo img").attr("src","/wp-content/uploads/2021/06/eXciteOSA-reverse-RGB-web.png");
   }
  });
});
}