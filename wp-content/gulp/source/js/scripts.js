function homeInitSlider(){
	 if($('#init-slider').length > 0 ) {
		$('#init-slider').slick({
		  centerMode: true,
		  centerPadding: '4%',
		  slidesToShow: 1,
		  focusOnSelect: false,
		  variableWidth: true,
		  prevArrow: '<span class="slick-prev"></span>',
		  nextArrow: '<span class="slick-next"></span>',
		});
	 }
}

function showMenu() {
	$('nav.mobile-nav').slideToggle();
	$('body').addClass('no-scroll');
	$full_loc = $(location).attr('href');
	$loc = $full_loc.split('#');
	$top_loc = $loc[0];
	// $('.big-nav li a').each(function(){
	// 	if( $(this).attr('href') == $top_loc || $(this).attr('href') == $full_loc ){
	// 		$(this).addClass('active');
	// 	}
	// });
	$('.mobile-nav li a').each(function(){
		if( $(this).attr('href') == $full_loc ){
			$(this).addClass('active');
		}
		$('.mobile-nav li:has(.active)').addClass('active');

		$(this).on('click', function(){
			$('nav.mobile-nav').slideUp();
			$('body').removeClass('no-scroll');
		})
	});

	// switch the hamburger to an X or a green burger?
};
function showBigMenu() {
	$('nav.big-nav').slideToggle();
	$full_loc = $(location).attr('href');
	$loc = $full_loc.split('#');
	$top_loc = $loc[0];
	$('.big-nav li a').each(function(){
		if( $(this).attr('href') == $top_loc || $(this).attr('href') == $full_loc ){
			$(this).addClass('active');
		}
		$(this).on('click', function(){
			$('nav.big-nav').slideUp();
		})
	});
	// $('.mobile-nav li a').each(function(){
	// 	if( $(this).attr('href') == $top_loc || $(this).attr('href') == $full_loc ){
	// 		$(this).addClass('active');
	// 	}
	// });
	// switch the hamburger to an X or a green burger?
};
function excerpts(text){
	if( text.html().length > 140 ){
		shorter = text.html().substr(0,140);
		end = shorter.lastIndexOf(' ');
		shorter = shorter.substr(0, end);
		shorter += '...';
		text.html(shorter);
			}
};
function showSearch(){
	$('.searcher').css('display', 'inline-block');
	$('#search-standin').css('display', 'none');
};
function showMasterVideo(){
	$('#masterplan-overlay').css('display','flex');
	$('#masterplan-overlay').css('display', '-webkit-box');
	$('#masterplan-overlay').css('display', '-webkit-flex');
	$('#masterplan-overlay').css('display', '-ms-flexbox');
	$('body').css('overflow', 'hidden');
	$('#masterplan-overlay iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*'); 

}
function hideMasterVideo(){
	$('#masterplan-overlay').hide();
	$('body').css('overflow', 'auto');
	$('#masterplan-overlay iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
}
function showVideo(vid){
	$overlay = '#' + vid + '-overlay';
	$frame = $overlay + ' iframe';
	$( $overlay ).css('display','flex');
	$( $overlay ).css('display', '-webkit-box');
	$( $overlay ).css('display', '-webkit-flex');
	$( $overlay ).css('display', '-ms-flexbox');
	$('body').css('overflow', 'hidden');
	$( $frame )[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*'); 
}
function showVideoEmbed(vid){
	$overlay = '#' + vid + '-overlay';
	$frame = $overlay + ' iframe';
	$( $frame ).attr( 'src', function ( i, val ) { 
		return val; 
	})
	$( $overlay ).css('display','flex');
	$( $overlay ).css('display', '-webkit-box');
	$( $overlay ).css('display', '-webkit-flex');
	$( $overlay ).css('display', '-ms-flexbox');
	$('body').css('overflow', 'hidden');

}
function hideVideo(vid){
	$overlay = '#' + vid + '-overlay';
	$frame = $overlay + ' iframe';
	$( $overlay ).hide();
	$('body').css('overflow', 'auto');
	$( $frame )[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
}
function hideVideoEmbed(vid){
	$overlay = '#' + vid + '-overlay';
	$frame = $overlay + ' iframe';
	$( $overlay ).hide();
	$('body').css('overflow', 'auto');
	$( $frame ).attr('src', $($frame).attr('src'));
}



// about rules
// need to add .plus, .minus, and .bio-arrow children toggles
function bioShow(bio, box){
	// this needs to have a way to differentiate between the 3 team-member section!!!!!!!!!!!!
	$bio = '#bio' + bio;
	$box = '#biobox' + box;
	$baby = $box + ' ' + $bio;
	$show = $box + ' .member-bio';
	$plus = '#member-photo' + bio + ' .plus';
	$minus = '#member-photo' + bio + ' .minus';
	$arrow = '#member' + bio + ' .bio-arrow';
	$blockout = '#member' + bio + ' .blockout';
	$member = '#member' + bio;

	if( $($baby).length == 0){
		hideBio('box');

		// fade other headshots
		$($member).delay(253).addClass('white-out');
		$('.member').delay(253).addClass('hazed');

		// border-blocker
		$($blockout).delay(253).show();

		// +/-/> icons
		$($plus).delay(253).hide();
		$($minus).delay(253).show();
		$($arrow).delay(253).show();

		// 
		$($box).delay(260).html( $($bio).clone() );
		$($show).delay(259).show();
		$($box).delay(260).slideDown('slow', function(){
			$top = $('.member-bio:visible').attr('id');
			if($top){
				$top = $top.substring(3);
				$top = '#member' + $top;
				$top = $($top).offset()['top']+220;
				$('html, body').animate({scrollTop: $top});
			}
		});
	} else {
		hideBio($box);
		
	}

	$top = $('.member-bio:visible').attr('id');
	if($top){
		$top = $top.substring(3);
		$top = '#member' + $top;
		$top = $($top).offset()['top']+220;
		$('html, body').animate({scrollTop: $top});
	}
}

function hideBio(box){
	if(box !== 'box'){
		$top = $('.member-bio:visible').attr('id');
		if($top){
			$top = $top.substring(3);
			$top = '#member' + $top;
			$top = $($top).offset()['top']-220;
			$('html, body').animate({scrollTop: $top});
		}
	}
	$('.member').removeClass('white-out');
	$('.member').removeClass('hazed');

	$('.blockout').delay(250).hide();
	$('.biobox').slideUp(250);
	$('.member-bio').delay(251).hide();
	$('.biobox').delay(252).html('');
	
	$('.plus').show();
	$('.minus').hide();
	$('.bio-arrow').hide();
}

function showMobileBio(bio) {
	if ($(bio).is(':visible')) {
		$('.member-bio').slideUp();
		// $(bio).slideToggle('slow', function(){
		// 	$('html,body').animate({
	 //            scrollTop: ($(this).offset().top - 160)
	 //        }, 'slow')
		// console.log('okokokokok');
		// });
	} else {
		$('.member-bio').slideUp();
		$(bio).slideToggle('slow', function(){
			$('html,body').animate({
	            scrollTop: ($(this).offset().top - 120)
	        }, 'slow')
		console.log('nonono');
		});
	}
}

function hideMobileBio(bio) {
	console.log(bio);
	showa = bio + ' .member-bio';
	$(showa).slideToggle('slow', function(){
			$('html,body').animate({
	            scrollTop: ($(bio).offset().top - 80)
	        }, 'slow')
		});
}

function sizeBlocks(){
	if( $(window).width() > 1300 ){ 
		$pad = ($('#about-foundation .right-half').height()-$('#about-foundation .left-half').height())/2;
		$('#about-foundation .left-half').css('padding-top', $pad);

		$padder = ($('.about-hospital .right-half').height()-$('.about-hospital .left-half').height())/2;
		$('.about-hospital .left-half').css('padding-top', $padder);
	} else {
		$('#about-foundation .left-half').css('padding', '60px 5% 0');
		$('.about-hospital .left-half').css('padding', '10px 5% 10px');
		$('.about-hospital .left-half').css('padding-top', '10px');
	}

}
// /about rules


// event rules
function sizeVidTitles(){
	if( $(window).width() <= 940 ){
		$('.event-video h3').css('height', 'auto');
	} else {
		var maxHeight = 0;
		$('.event-video h3').height('auto');
		$('.event-video h3').each(function(){
		   maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
		});
		// maxHeight += ($('.news-box').outerHeight() - $('.news-box').height()) * 2;
		$('.event-video h3').css('height', maxHeight);
	}
}
// /event rules
function sizeEventItems(){
	if( $(window).width() <= 940 ){
		$('.event-vid').css('height', 'auto');
	} else {
		var maxHeight = 0;
		$('.event-vid').height('auto');
		$('.event-vid').each(function(){
		   maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
		});
		// maxHeight += ($('.news-box').outerHeight() - $('.news-box').height()) * 2;
		$('.event-vid').css('height', maxHeight);
	}
}



// NEWS SIZING
function sizeNews(){
	if( $(window).width() <= 760 ){
		$('.news-thumbnail').height('auto');
		$('.news-title').height('auto');
		$('.news-excerpt-block').height('auto');
		$('.recent-news-excerpt').height('auto');
	} else {
		$('.news-thumbnail').height('auto');
		$('.news-title').height('auto');
		$('.news-excerpt-block').height('auto');
		$('.recent-news-excerpt').height('auto');
		var XmaxHeight = 0;
		$('.news-thumbnail').each(function(){
		   XmaxHeight = $(this).height() > XmaxHeight ? $(this).height() : XmaxHeight;
		});
		$('.news-thumbnail').css('height', XmaxHeight);

		var YmaxHeight = 0;
		$('.news-title').each(function(){
		   YmaxHeight = $(this).height() > YmaxHeight ? $(this).height() : YmaxHeight;
		});
		$('.news-title').css('height', YmaxHeight);

		var ZmaxHeight = 0;
		$('.news-excerpt-block').each(function(){
		   ZmaxHeight = $(this).height() > ZmaxHeight ? $(this).height() : ZmaxHeight;
		});
		$('.news-excerpt-block').css('height', ZmaxHeight);

		var maxHeight = 0;
		$('.recent-news-excerpt').each(function(){
		   maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
		});
	}
}
//  / NEWS SIZING

(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away


	// show/hide mobile submenu
	$("li.show-sub:has(ul)").click(function(){
		$("ul",this).slideToggle();
	});




	$("#menu-main-nav").children('li').each(function(){
    	$(this).mouseover( function() { 
    		$('.stay-hovered').addClass('hold');
    		$('.hold').removeClass('stay-hovered');
    		$(this).addClass('hovered')});
        $(this).mouseout( function() { 
        	$('.hold').addClass('stay-hovered');
    		$('.stay-hovered').removeClass('hold');
        	$(this).removeClass('hovered')});
        });
	$('.sub-menu').each( function(){
		$(this).mouseover( function() { 
    		$(this).parent('li a').addClass('hovered')});
        $(this).mouseout( function() { 
        	$(this).parent('li a').removeClass('hovered')
        });
    if( $('.current-menu-item').hasClass('menu-item-has-children') ) {
    	$('.current-menu-item').addClass('stay-hovered');
    }
    $('li.current-menu-ancestor').addClass('stay-hovered');


	// show search bar when icon is clicked
	if($('#search-standin') != 'undefined') {
		$('#search-standin').click( function() {
			$('.searcher').show('slide', 'right', 'ease-in', 400);
			// $('#search-standin').delay(300).hide();
		});
	};

	$('.page-anchor').each(function() {
		  if( $(window).scrollTop() + 75 >= $(this).offset().top ) {
		      var id = $(this).attr('id');
		      // desktop
		      $('.sub-menu a').removeClass('active');
		      $('.sub-menu a[href="#'+ id +'"]').addClass('active');
		      // mobile
		      $('#mobile-navbar a').removeClass('active');
		      $('#mobile-navbar a[href="#'+ id +'"]').addClass('active');
		  }
		});
		
	});

    $(window).scroll(function () {
    	// highlight navbar on scroll
		$('.page-anchor').each(function() {
		  if( $(window).scrollTop() + 75 >= $(this).offset().top ) {
		      var id = $(this).attr('id');
		      // desktop
		      $('.sub-menu a').removeClass('active');
		      $('.sub-menu a[href="#'+ id +'"]').addClass('active');
		      // mobile
		      $('#mobile-navbar a').removeClass('active');
		      $('#mobile-navbar a[href="#'+ id +'"]').addClass('active');
		  }
		});
    });

			

		// show search bar when icon is clicked
		$(window).load( function() {
			$('#search-standin').click( function() {
				$('.search').show('slide', 'right',  400);
				// $('#search-standin').delay(300).hide();
			});
			
		});


		
		
	});
	
})(jQuery, this);


$(document).ready(function(){

	if( $('.page.initiatives').length > 0 ){
		initHack();
		console.log('initiatives');
	}

	$full_loc = $(location).attr('href');
	$loc = $full_loc.split('#');
	$top_loc = $loc[0];
	$('.big-nav li a').each(function(){
		if( $(this).attr('href') == $top_loc || $(this).attr('href') == $full_loc ){
			$(this).next('.sub-menu').find('li a').addClass('scrollme bounce animated');
		}
	})
	$('.show-sub.active').find('li a').addClass('scrollme bounce animated');
 	// add scrollme to submenu-items
 	if($('.page.initiatives').length == 0) {
		$('.current-menu-item .sub-menu li a').addClass('scrollme bounce animated');
		// $('.active').next('.sub-menu').find('li a').addClass('scrollme bounce animated');
	}

	// $('.mobile-nav .show-sub').each(function(){
	// 	if( ! $(this).hasClass('active') ){
	// 		console.log($(this));
	// 	} else {
	// 		$(this).children('.scrollme').addClass('scrollme');
	// 	}
	// })

	$('.scrollme').bind('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 800, function(){
	   
	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    } // End if
	});



	homeInitSlider();


	 if($('#home-slider').length > 0 ) {
	 	$('#home-slider .slide').css('display', 'none');
	 	$('#home-slider').on('init', function(slick){
		  console.log('init');
		  $('#home-slider .slide').css('display', 'inline-block');
		});
		$('#home-slider').slick({
		  autoplay: true,
		  autoplaySpeed: 4000,
		  speed: 600,
		  arrows: false,
		  variableWidth: false,
		  centerPadding: '0',
		  slidesToShow: 1,
		  slidesToScroll: 1
		});
		
	 }
	 // hack workaround to use template directory php
	 // initHack();


	 if($('.page.events').length > 0) {
	 	sizeEventItems();
		sizeVidTitles();
		// slider = $('#home-slider').unslider({
		// 	autoplay: true,
		// 	delay: 3500,
		// 	speed: 1000,
		// 	nav: false,
		// 	animation: 'fade',
		// 	infinite: true
		// });

		// remove empty slide
		$('.event-slide').each( function(){
			if( $(this).contents().length < 8) {
				$(this).remove();
			}
		});


		$(window).resize(function(){
			sizeVidTitles();
			sizeEventItems();
		})
	 }


	 if($('.page.employee-giving').length > 0) {
	 	mobileDonors();
	 }

	 if($('.page.giving').length > 0) {

		$('#menu-item-1142').addClass('current-menu-item');
		// console.log('<?php echo $pagename; ?>');
		// $('.menu-item a').each(function(){
		// 	if( $(this).attr('href').toLowerCase().indexOf('<?php echo $pagename; ?>') >= 0 ){
		// 		console.log($(this));
		// 		$(this).addClass('active');
		// 	};
		// });
	 }


	 if($('.page.news').length > 0) {
		// $('#article-slider ul').on('init', function(event, slick){
		// 	console.log(window.location.hash);
		// 	id = window.location.hash;
		// 	id = id.substr( 1 );
		// 	console.log(id);
		// 	$('#article-slider ul').slick('slickGoTo', id );
		// });
		$('#article-slider ul').slick({
		  autoplay: false,
		  arrows: true,
		  infinite: true,
		  swipe: false,
		  touchMove: false,
		  prevArrow: $(".nav-next"),
		  nextArrow: $(".nav-previous"),
		  variableWidth: false,
		  centerPadding: '0',
		  slidesToShow: 1,
		  slidesToScroll: 1
		});
		
		$('#article-slider ul').on('afterChange', function(event, slick, currentSlide, nextSlide){
			console.log(currentSlide);
			window.location.hash = currentSlide;
		});
		// $('#article-slider').unslider({
			// nav : false,
			// arrows: {
			// 		//  Unslider default behaviour
			// 		next: '<div class="read-more nav-previous alignleft non-mobile">Next Page <span class="carrot">&raquo;</span></div>',
			// 		prev: '<div class="read-more nav-next alignright non-mobile"><span class="carrot">&laquo;</span> Previous Page</div>'
			// 	}//,
			//animateHeight : true
			// pager : false,
			// speed : 700,
			// controls : true,
			// nextSelector : '.nav-next',
			// prevSelector : '.nav-previous',
			// prevText: 'Next Page <span class="carrot">&raquo;</span>',
			// nextText: '<span class="carrot">&laquo;</span> Previous Page',
			// minSlides : 1,
			// maxSlides : 1,
			// moveSlides : 1
		// });

		// remove empty slide
		$('.article-slide').each( function(){
			if( $(this).contents().length < 8) {
				$(this).remove();
			}
		});


		// $('#article-slider').on('unslider.change', function(event, index, slide) {
		// 	$slides = $('.article-slide');
		// 	$slides = $slides.length -1;
		// 	$('.nav-next').css('display', 'inline');
		// 	$('.nav-previous').css('display', 'inline');
		// 	if(index == 0) {
		// 		$('.nav-next').css('display', 'none');
		// 	}
		// 	if(index == $slides){
		// 		$('.nav-previous').css('display', 'none');
		// 	}

		// });
	}

	 if($('.page.partners').length > 0) {
		$wide = $('.left-col').width();
		
		// $('#article-slider').unslider({
		// 	nav : false,
		// 	arrows: {
		// 		//  Unslider default behaviour
		// 		next: '<div class="read-more nav-previous alignleft">Next Page <span class="carrot">&raquo;</span></div>',
		// 		prev: '<div class="read-more nav-next alignright"><span class="carrot">&laquo;</span> Previous Page</div>'
		// 	}
		// });
		$('.left-col hr:last-of-type').remove();
		console.log('ok');

		start = Math.floor( ( Math.random() * $('#home-slider li.slide').length ) );
		console.log(start);
		$('#article-slider ul').slick({
		  autoplay: false,
		  arrows: true,
		  infinite: true,
		  prevArrow: $(".nav-next"),
		  nextArrow: $(".nav-previous"),
		  variableWidth: false,
		  centerPadding: '0',
		  slidesToShow: 1,
		  slidesToScroll: 1
		});
		// $('#home-slider').unslider({
		// 	arrows: false,
		// 	nav: false,
		// 	index: start,
		// 	animation: 'fade'
		// });
	 }


 	// SOME CSS SETTING FOR AUTO-RESPONSIVENESS ON LOAD
 	
 	// $('.event-video iframe').height($('.event-video iframe').outerWidth()*0.75);

 	// size flex-boxes
	// $('.flex-center').height( $('.flex-height').outerHeight());

	if( $('#search-standin').length > 0 ){
		// safari fix - wtf just shows search bar always
			// var a = $('#search-standin')[0];
			// var evObj = document.createEvent('MouseEvents');
			// evObj.initMouseEvent('click', true, true, window);
			// a.dispatchEvent(evObj);

		// show search function
		$('#search-standin').on( 'click', function() {
			$('.searcher').css('display', 'inline-block');
			$('#search-standin').css('display', 'none');
		});
	};
	

 	// set member height
 	// $('.member').height($('.member').outerWidth()*1.5);

 	//set blockout bar width 
 	$('.blockout').width( $('.member').outerWidth() - 4 );
 	$('.blockout1').width( $('.member').outerWidth() );

	// if(  '<?php echo $pagename ?>' == '' && $(window).width() >= 380 ){
	//  	var maxHeightInit = 0;
	// 	$('.init-slide').height('auto');
	// 	$('.init-slide').each(function(){
	// 	   maxHeightInit = $(this).height() > maxHeightInit ? $(this).height() : maxHeightInit;
	// 	});
	// 	$('.init-slide').css('height', maxHeightInit);
	// } else {
	// 	$('.init-slide').css('height', 'auto');
	// }

// okokookokok
	sizeNews();
	sizeBoxes();
  });

$(window).load(function(){
	sizeBoxes();
	sizeNews();
	sizeEventItems();
	// shorten excerpts if too long
	$('.recent-news-excerpt p').each(function(){
		excerpts( $(this) );
	});
	$('.partner-excerpt p').each(function(){
		excerpts( $(this) );
	});
	$('.featured-news-excerpt p').each(function(){
		excerpts( $(this) );
	});
	$('.recent-news-tall p').each(function(){
		excerpts( $(this) );
	});
	goHash();
	// make sure active page (sub-nav) is bold
	$('li a').each(function(){
	    if($(this).attr('href') == $(location).attr('href')){
		    $(this).css('font-weight', 'bold');

		}
	})
	
})

$(window).resize(function(){
	$('.blockout').width( $('.member').outerWidth() - 4 );
 	$('.blockout1').width( $('.member').outerWidth() );
 	w = $('.event-video iframe').outerWidth();
 	$('.event-video iframe').height(w*0.75);
 	h = $('.slide a img').height();
	// $('#carousel').carouFredSel({
	// 			align                : false,
	// 			width                : '133%',
	// 			height               : h,
	// 	        items                : 3,
	// 	        infinite             : true,
	// 	        circular             : true,
	// 	        direction            : "left",
	// 	        responsive           : 'true',
	// 	        scroll : {
	// 	            items            : 1,
	// 	            duration        : 1000,
	// 	            pauseOnHover    : true
	// 	        },
	// 	        pagination           : { container: $('.nav-dots')}
	// 	    });
	// $('#slides-frame div').height($('.slide a img').height())

	// size flex-boxes
	// sizeInitRow();
	sizeBoxes();
	sizeNews();
})

// $(window).load(function(){
// 	// $('#preload').css('opacity', 0);
// 	sizeBoxes();
// 	$('#preload').animate({	opacity: 0 }, 800, function(){ 
// 		$('#preload').hide();
// 		$('body').css('overflow', 'auto')
// 	});
// })


// ADDED 7/26 - in footer
function goHash(){
	hash = window.location.hash;
	if ( hash.length > 1 ){
		$('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800);
		}
}

function mobileDonors(){
	donors = $('.mobile-only .donors').html();
	donors = donors.split('<br>');
	hidden = donors.slice(6);
	hidden = hidden.join('<br>');
	shown = donors.slice(0,6);
	shown = shown.join('<br>');
	donorList = shown + '<div class="hidden-donors">' + hidden + '</div>';
	$('.mobile-only .donors').html(donorList);
}


function showDonors(){
	$('.hidden-donors').slideDown(800, function(){
		$('#show-donors').hide();
		$('#hide-donors').show();
	});	
}
function hideDonors(){
	$('.hidden-donors').slideUp(800, function(){
		$('#show-donors').show();
		$('#hide-donors').hide();
	});
}

