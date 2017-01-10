

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
	if( text.html().length > 200 ){
		shorter = text.html().substr(0,197);
		shorter += '...';
		text.html(shorter);
			}
}
function showSearch(){
	$('.searcher').css('display', 'inline-block');
	$('#search-standin').css('display', 'none');
}


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

 	// add smoothScroll to submenu-items
	 	$('.sub-menu li a').addClass('smoothScroll');


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

 // 	if(  '<?php echo $pagename ?>' == '' && $(window).width() >= 380 ){
	//  	var maxHeightInit = 0;
	// 	$('.init-slide').height('auto');
	// 	$('.init-slide').each(function(){
	// 	   maxHeightInit = $(this).height() > maxHeightInit ? $(this).height() : maxHeightInit;
	// 	});
	// 	$('.init-slide').css('height', maxHeightInit);
	// } else {
	// 	$('.init-slide').css('height', 'auto');
	// }



	sizeBoxes();
  });

$(window).load(function(){
	sizeBoxes();

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

	// make sure active page (sub-nav) is bold
	$('li a').each(function(){
	    if($(this).attr('href') == $(location).attr('href')){
		    $(this).css('font-weight', 'bold')
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
})

// $(window).load(function(){
// 	// $('#preload').css('opacity', 0);
// 	sizeBoxes();
// 	$('#preload').animate({	opacity: 0 }, 800, function(){ 
// 		$('#preload').hide();
// 		$('body').css('overflow', 'auto')
// 	});
// })

function showMasterVideo(){
	$('#masterplan-overlay').css('display','flex');
	$('#masterplan-overlay').css('display', '-webkit-box');
	$('#masterplan-overlay').css('display', '-webkit-flex');
	$('#masterplan-overlay').css('display', '-ms-flexbox');
	$('body').css('overflow', 'hidden');
}
function hideMasterVideo(){
	$('#masterplan-overlay').hide();
	$('body').css('overflow', 'auto');
	$('#masterplan-overlay iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
}

function showVideo(vid){
	$overlay = '#' + vid + '-overlay';
	// $frame = $overlay + ' iframe';
	$( $overlay ).css('display','flex');
	$( $overlay ).css('display', '-webkit-box');
	$( $overlay ).css('display', '-webkit-flex');
	$( $overlay ).css('display', '-ms-flexbox');
	$('body').css('overflow', 'hidden');
	// $( $frame )[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
}
function hideVideo(vid){
	$overlay = '#' + vid + '-overlay';
	$frame = $overlay + ' iframe';
	$( $overlay ).hide();
	$('body').css('overflow', 'auto');
	$( $frame )[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
}



function sizeBoxes(){
	if( '<?php echo $pagename ?>' == 'initiatives' && $(window).width() <= 940 ){
		$('.news-box-copy').css('height', 'auto');
	} else {
		var maxHeight = 0;
		$('.news-box-copy').height('auto');
		$('.news-box-copy').each(function(){
		   maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
		});
		// maxHeight += ($('.news-box').outerHeight() - $('.news-box').height()) * 2;
		$('.news-box-copy').css('height', maxHeight);
	}


	// if( '<?php echo $pagename ?>' == 'homepage' && $(window).width() <= 940 ){
	// 	$('.init-slide').css('height', 'auto');
	// } else {
	// 	var maxHeight = 0;
	// 	$('.init-slide').height('auto');
	// 	$('.init-slide').each(function(){
	// 	   maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
	// 	});
	// 	// maxHeight += ($('.news-box').outerHeight() - $('.news-box').height()) * 2;
	// 	$('.init-slide').css('height', maxHeight);
	// }


	if( $(window).width() >= 940 ){
		$('.flex-center').height( $('.flex-height').outerHeight());
	} else {
		$('.flex-center').height('auto');
	}

	if(  '<?php echo $pagename ?>' == '' && $(window).width() >= 680 ){
		console.log('home');
		var maxHeightNews = 0;
		$('.recent-news-excerpt').height('auto');
		$('.recent-news-excerpt').each(function(){
		   maxHeightNews = $(this).height() > maxHeightNews ? $(this).height() : maxHeightNews;
		});
		$('.recent-news-excerpt').css('height', maxHeightNews);
	}else {
		$('.recent-news-excerpt').css('height', 'auto');
	}
		

	if( $(window).width() >= 680 ){
		var maxHeightNewsTall = 0;
		$('.recent-news-tall').height('auto');
		$('.recent-news-tall').each(function(){
		   maxHeightNewsTall = $(this).height() > maxHeightNewsTall ? $(this).height() : maxHeightNewsTall;
		});
		$('.recent-news-tall').css('height', maxHeightNewsTall);
	} else {
		$('.recent-news-tall').css('height', 'auto');
	}

	// var maxHeightVid = 0;
	// $('.archive-video').height('auto');
	// $('.archive-video').each(function(){
	//    maxHeightVid = $(this).height() > maxHeightVid ? $(this).height() : maxHeightVid;
	// });
	// $('.archive-video').css('height', maxHeightVid);






}



