"use strict";
	
jQuery(document).ready(function($){

	/*resp videos*/
	jQuery("body, .blogpostcategory").fitVids();
	
	/*category slider*/
	jQuery( ".category-slider" ).each(function() {	
		var id = jQuery(this).attr('value');
		jQuery('.'+id).bxSlider({
		  easing : 'easeInOutQuint',
		  captions: true,
		  speed: 800,
		  pagerCustom: '.bx-pager'
		});
	});
	
	/*blog hover image*/
	jQuery( ".blogpostcategory" ).each(function() {		
		var img = jQuery(this).find('img');
		var height = img.height();
		var width = img.width();
		var over = jQuery(this).find('a.overdefultlink');
		over.css({'width':width+'px', 'height':height+'px'});
		var margin_left = parseInt(width)/2 - 18
		var margin_top = parseInt(height)/2 - 18
		over.css('backgroundPosition', margin_left+'px '+margin_top+'px');
	});	
	
	/*resp menu*/
	jQuery('.resp_menu_button').click(function() {
	if(jQuery('.event-type-selector-dropdown').attr('style') == 'display: block;')
	jQuery('.event-type-selector-dropdown').slideUp({ duration: 500, easing: "easeInOutCubic" });
	else
	jQuery('.event-type-selector-dropdown').slideDown({ duration: 500, easing: "easeInOutCubic" });
	});	
	jQuery('.event-type-selector-dropdown').click(function() {
	jQuery('.event-type-selector-dropdown').slideUp({ duration: 500, easing: "easeInOutCubic" });
	});
	
	/*add submenu class*/
	jQuery('.menu > li').each(function() {
	if(jQuery(this).find('ul').size() > 0 ){
	jQuery(this).addClass('has-sub-menu');
	}
	});	
	
	/*animate menu*/
	jQuery('ul.menu > li').hover(function(){
	jQuery(this).find('ul').stop(true,true).fadeIn(300);
	},
	function () {
	jQuery(this).find('ul').stop(true,true).fadeOut(300);
	});	
	
	
	/*top src*/
	jQuery('.top-search-form i').click(function() {
		jQuery('.top-search-form input').slideToggle( "fast", function() {});
	});
	
	/*tabs*/
	$(function() {
	$( "#pmc-tabs" ).tabs( { hide: 'fadeOut', show: 'fadeIn' });
	});	
	/*jQuery('#pmc-tabs li a').click(function() {
	if(jQuery('.content.blog .pmc-tabs').attr('aria-hidden') == "false"){
		$(this).fadeOut();
	} else {
		$(this).fadeIn();
	}
	});*/

	jQuery('.tab1').click(function() {
	jQuery('.infinity-more').show();
	});

	jQuery('.tab2').click(function() {
	jQuery('.infinity-more').hide();
	});
	
	/*infinity scroll*/
	$('#tabs-1').infinitescroll({
	navSelector  : '.wp-pagenavi',    // selector for the paged navigation 
	nextSelector : '.wp-pagenavi a:first',  // selector for the NEXT link (to page 2)
	itemSelector : '#tabs-1',     // selector for all items you'll retrieve
	delay: 1000,
	loading: {
		finishedMsg: '',
		msgText: '',
		speed: 0,
	  },
	}
	);

	jQuery('.infinity-more').click(function() {
	jQuery('.infinity-more-loading').fadeIn();
	jQuery('.infinity-more').hide();	
	setTimeout(function(){ jQuery('.infinity-more-loading').fadeOut();	}, 1000);
	setTimeout(function(){ jQuery('.infinity-more').show();	}, 1700);
	});
	$(window).unbind('.infscr');

	$('.infinity-more').click(function(){	
	  $(document).trigger('retrieve.infscr');
	  $("body, .blogpostcategory").fitVids();
	  return false;
	});
	$(document).ajaxError(function(e,xhr,opt){
	  if (xhr.status == 404) $('.infinity-more').remove();
	});	
	
	var addthis_config = addthis_config||{};
	addthis_config.data_track_addressbar = false;	

	/*scroll menu*/
	var menu = jQuery('.mainmenu');
	jQuery( window ).scroll(function() {
	if(!menu.isOnScreen() && jQuery(this).scrollTop() > 350){ 
	jQuery(".totop").fadeIn(200);
	jQuery(".fixedmenu").slideDown(200);}
	else{
	jQuery(".fixedmenu").slideUp(200);
	jQuery(".totop").fadeOut(200);}
	});	
	
	// Select all links with hashes
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .not('[href="#tabs-1"]')
	  .not('[href="#tabs-2"]')
	  .not('[class="comment-reply-link"]')
	  .click(function(event) {
		// On-page links
		if (
		  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		  && 
		  location.hostname == this.hostname
		) {
		  // Figure out element to scroll to
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		  // Does a scroll target exist?
		  if (target.length) {
			// Only prevent default if animation is actually gonna happen
			event.preventDefault();
			$('html, body').animate({
			  scrollTop: target.offset().top-100
			}, 1000, function() {
			  // Callback after animation
			  // Must change focus!
			  var $target = $(target);
			  $target.focus();
			  if ($target.is(":focus")) { // Checking if the target was focused
				return false;
			  } else {
				$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
				$target.focus(); // Set focus again
			  };
			});
		  }
		}
	  });
	  $('.wprm-recipe-ingredient').click(function() {
		if($(this).hasClass('narya-recipe-selected')){
			$(this).removeClass('narya-recipe-selected');
		} else {
			$(this).addClass('narya-recipe-selected');
		}
	  });
});


jQuery.fn.isOnScreen = function(){
     
    var win = jQuery(window);
     
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
	if(this.offset()){
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
     
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
     }
};


