			
		

			<!-- footer -->
			<footer class="footer text-center" role="contentinfo">
				<div id="updated-footer" style="background-image:url('<?php the_field('background', 1086) ?>')">
					<div id="footer-update-text">
						<h3><?php the_field('update_text', 1086);?></h3>
						<a target="_blank" href="http://eepurl.com/NWoNj" target="_blank" class="stay-updated">Stay Updated</a>
					</div>
				</div>
				
				<a href="https://www.google.com/maps/place/Martin+Luther+King,+Jr.+Community+Hospital/@33.9239277,-118.2473415,17z/data=!4m13!1m7!3m6!1s0x80c2cbb620f73fc3:0x4d2f67634499ca23!2s1680+E+120th+St,+Los+Angeles,+CA+90059!3b1!8m2!3d33.9239277!4d-118.2451528!3m4!1s0x80c2cbb620132975:0x85af8f1abacc44c9!8m2!3d33.9228403!4d-118.2434462
" target="_blank" class="address"><?php the_field('address_a', 1086);?><br/>
						<?php the_field('address_b', 1086);?></a>

				<p class="footer-contact"><?php the_field('phone', 1086);?>   &nbsp;|&nbsp;   
					<a target="_blank" style="color:#ffffff;" href="mailto:<?php the_field('email', 1086);?>"><?php the_field('email', 1086);?></a>
				</p>
				

				<div id="social-footer">
					<a target="_blank" href="<?php the_field('twitter_link', 1086);?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/twitter.png"></a>
					<a target="_blank" href="<?php the_field('facebook_link', 1086);?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/facebook.png"></a>
					<a target="_blank" href="<?php the_field('linkedin_link', 1086);?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/linkedin.png"></a>				
				</div>
				<!-- copyright -->
				<p class="copyright white">
					&copy; <?php echo date('Y'); ?> <?php the_field('copyright', 1086);?> <br class="mobile-only"><a target="_blank" href="<?php the_permalink(1089); ?>" class="underline white">Privacy Statement</a>
				</p>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

			

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		// (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		// (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		// l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		// ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		// ga('send', 'pageview');
		</script>


<script>

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
	if($('.page.initiatives').length == 0) {
		goHash();
	}
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

// ADDED 7/26
function goHash(){
	hash = window.location.hash;
	if ( hash.length > 1 ){
		$('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800);
		}
}


		</script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/smoothscroll.js"></script>
	</body>
</html>
		