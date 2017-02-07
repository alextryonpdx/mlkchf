			
		

			<!-- footer -->
			<footer class="footer text-center" role="contentinfo">
				<div id="updated-footer" style="background-image:url('<?php the_field('background', 1086) ?>')">
					<div id="footer-update-text">
						<h3><?php the_field('update_text', 1086);?></h3>
						<a target="_blank" href="http://eepurl.com/NWoNj" target="_blank" class="stay-updated">Stay Updated</a>
					</div>
				</div>
				
				<a href="https://www.google.com/maps/place/Martin+Luther+King,+Jr.+Community+Hospital/@33.9239277,-118.2473415,17z/data=!4m13!1m7!3m6!1s0x80c2cbb620f73fc3:0x4d2f67634499ca23!2s1680+E+120th+St,+Los+Angeles,+CA+90059!3b1!8m2!3d33.9239277!4d-118.2451528!3m4!1s0x80c2cbb620132975:0x85af8f1abacc44c9!8m2!3d33.9228403!4d-118.2434462" target="_blank" class="address"><?php the_field('address_a', 1086);?><br/>
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
<script>
console.log('pagename: <?php echo $pagename ?>');
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

}

function initHack(){
	if($('.page.initiatives').length > 0) {

		function sizeInitRow(){
			$('.init-row').each(function(){
				$(this).height( $(this).find('.init-content').outerHeight() ) ;
			})
		}
	
		sizeInitRow();
		$loc = $(location).attr('href').split('#');
		$loc = '#' + $loc[1];
		$slide = '.current-menu-item .sub-menu li a[href='+ $loc +']';
		$slide = $($slide)[0];
		$slides = $('.current-menu-item .sub-menu li a');
		$slideTo = $($slides).index($slide);
		$('#initiatives-page').unslider({'animate:' : $slideTo, nav: false });
		if($loc != ''){
			$('.current-menu-item .sub-menu li a').removeClass('active');
			$('.current-menu-item .sub-menu li a:eq(' + $slideTo + ')').addClass('active');
		} else{
			$('.current-menu-item .sub-menu li a:eq(0)').addClass('active');
		};
		$gogo = 'a[href$="' + '/initiatives/' + $loc + '"' + ']';
		$gogo = $($gogo)[0];
		$gogo = $($slides).index($gogo);
		$('#initiatives-page').unslider({
			nav : false,
			index : $gogo,
			infinite: true,
			loop: true,
			arrows : {
				prev: '<a class="init-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_white.svg"></a>',
				next: '<a class="init-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg"></a>'
			}//,
			// 'animate:' $gogo
		});


		// $('#initiatives-page').unslider({
		// 	nav : false,
		// 	index : $gogo,
		// 	arrows : {
		// 		prev: '<a class="init-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_white.svg"></a>',
		// 		next: '<a class="init-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg"></a>'
		// 	}		
		// });

		// start = $('.current-menu-item .sub-menu li a[href=#'+$loc+']').index( this );
		// console.log(start);
		// $('#initiatives-page').unslider('animate:' + start);

		$('.current-menu-item .sub-menu li a').each(function( index ){
			$(this).click( function(){
				console.log( $(this).attr('href') );
				slider = $('.current-menu-item .sub-menu li a').index( this );
				$('#initiatives-page').unslider('animate:' + slider);
			})
		})
		$('.init-menu.sub-menu li a').each(function( index ){
			$(this).click( function(){
				console.log( $(this).attr('href') );
				slider = $('.init-menu.sub-menu li a').index( this );
				$('#initiatives-page').unslider('animate:' + slider);
			})
		})
		$('#initiative-links a').each(function( index ){
			$(this).click( function(){
				console.log( $(this).attr('href') );
				slider = $('#initiative-links a').index( this );
				slider ++;
				$('#initiatives-page').unslider('animate:' + slider);
			})
		})
		$('#initiatives-page').on('unslider.change', function(event, index, slide) {
			$('.current-menu-item .sub-menu li a').removeClass('active');
			$('.current-menu-item .sub-menu li a:eq(' + index + ')').addClass('active');
			$hash = $('.current-menu-item .sub-menu li a:eq(' + index + ')').attr('href');
			window.history.pushState('move','Title', $hash);
			sizeInitRow();
		});
	 }

	
}
function cutSlides(){
	$('.article-slide').each( function(){
		if( $(this).contents().length < 8) {
			$(this).remove();
		}
	});
}
cutSlides();
</script>

<style>
	.player:after {
	  background-image: url('<?php echo get_template_directory_uri(); ?>/img/icons/play.svg');
	}
	input[type="submit"].search-submit {
		background-image: url('<?php echo get_template_directory_uri(); ?>/img/icons/search.png');
	}
</style>
		<?php wp_footer(); ?>
	</body>
</html>
		