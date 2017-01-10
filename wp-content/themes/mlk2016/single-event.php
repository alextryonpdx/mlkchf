<?php get_header(); ?>



	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<div id="content">

	<?php	if (have_rows('slides') ): ?>
		<div id="home-slider">
			<?php while (have_rows('slides')): the_row();
				$image = '';
				$text = '';
				$textMobile = '';
				$link = '';
				$foreground_image ='';
				$mobile = '';
				$class = '';

				$image = get_sub_field('image');
				$mobile = get_sub_field('mobile_image');
				$foreground_image = get_sub_field('foreground_image');
				$foreground_image_mobile = get_sub_field('foreground_image_mobile');
				$text = get_sub_field('text');
				$textMobile = get_sub_field('text_mobile');
				$link = get_sub_field('link-to');
				$class = get_sub_field('position');
				$classMobile = get_sub_field('text_position_mobile');
				$arrowClass = get_sub_field('arrow_position');
				$arrowClassMobile = get_sub_field('arrow_position_mobile');
				// $anchor = get_sub_field('image_anchor');
				// $mobile_anchor = get_sub_field('image_anchor_mobile');
				?>

				<div class="slide">
					<?php if($link) {?>
						<a href="<?php echo $link; ?>">
					<?php } ?>
					<img class="non-mobile" src="<?php echo $image; ?>">
					<img class="mobile-only" src="<?php echo $mobile; ?>">
					<div class="banner-text non-mobile-<?php echo $class; ?> mobile-<?php echo $classMobile; ?>">
						<div class="non-mobile">
							<?php 
							if( $text ){
								echo '<h3>' . $text . '</h3>';
							} elseif( $foreground_image ){ ?>
								<img src="<?php echo $foreground_image?>">
							<?php } ?>
						</div>
						<div class="mobile-only">
							<?php 
							if( $textMobile ){
								echo '<h3 style="padding:0 5%;">' . $textMobile . '</h3>';
							} if( $foreground_image_mobile ){ ?>
								<img src="<?php echo $foreground_image_mobile; ?>">
							<?php } ?>
						</div>
					</div>
					<?php if($link !== '') {?>
						</a>
					<?php } ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	<main role="main">
		<div class="centered">
			<!-- section -->
			<section>
				<a class="read-more" href="<?php echo get_permalink(16); ?>"><span class="carrot">&laquo;</span> Back to Events</a>
				<h1 class="green"><?php the_title(); ?></h1>
				<div class="single-sidebar">
					<hr>
					<?php $tags = the_tags();
					if ($tags){ ?>
						<p class="tag-line"> Tags:
							<?php foreach($tags as $tag): ?>
								<a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a>
							<?php endforeach; ?>
						</p> 
					<?php } ?>
					<hr>
					<h4>Share</h4>
					<?php
					// if(get_field('facebook-text')){
					// 	$fb = get_field('facebook-text');
					// } else {
					// 	$fb = get_the_title();
					// };
					// if(get_field('twitter-text')){
					// 	$tweet = get_field('twitter-text');
					// } else {
					// 	$tweet = get_the_title();
					// }; ?>
					<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo urlencode(the_field('tweet_text')) ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
					</a>
					<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
					</a>
				</div>
				<div class="single-col">
					<?php if (get_field('secondary-heading')){ ?>
					<h4><?php echo the_field('secondary-heading') ?></h4>
				<?php } ?>
				</div>
				<?php if (have_rows('content-block')): 
					while (have_rows('content-block')): the_row(); 
						$subheading = '';
						$content = '';
						$subheading = get_sub_field('sub-heading');
						$content = get_sub_field('content');
					?>
					<div class="single-col">
						<?php if ( $subheading !== '' && $subheading !== 'undefined') { ?>
							<h4><?php echo $subheading; ?></h4> 
						<?php };
						if ( $content !== '' && $content !== 'undefined') { 
							echo $content; 
						}; ?>
				</div>
				<?php endwhile;
				 if( get_field('rsvp_button') ): ?>
					 <div class="single-col">
				 		<div class="rsvp">
				 			<a target="_blank" href="<?php the_field('rsvp_link'); ?>">
				 				<img src="<?php the_field('rsvp_button'); ?>">
				 			</a>
				 		</div>
				 	</div>
			 	<?php endif; 
			endif; ?>
			</section>
 		</div>





 		


<style>
.rsvp{
	/*width: 100%;*/
	/*text-align: center;*/
	margin: 10px 0 0;
	float: left;
}
</style>






	<?php if (have_rows('links')):
		$linkCount = 0;
		// $videoCount++;
				?>
				<hr>

<!-- 		<div class="centered">
			<a class="read-more non-mobile all-vids-event" href="<?php echo get_permalink(824); ?>">All Videos <span class="carrot">&raquo;</span></a>
		</div> -->
		<div class="full vids non-mobile">
			<!-- <a id="link-next-arrow"><img src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow.png"></a> -->
		 	<!-- <a id="link-prev-arrow"><img src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow.png"></a> -->
			<div class="centered goverflow">
				<!-- <h4 class="bold gallery-head">Video Gallery</h4> -->
				<div id="link-thumb-gallery">	
 					<div class="page">
						<?php while (have_rows('links')): the_row(); 
		 						// if( $linkCount%3 == 0 && $linkCount !== 0 ) {

		 						// 	echo '</div><div class="page">';

		 						// } 
		 						$linkCount++ ;
		 						?>

		 						<?php if( get_sub_field('link_to') == 'Page' ){
		 							$link = get_sub_field('link');
		 							$target = '';
		 						} elseif( get_sub_field('link_to') == 'File' ){
		 							$link = get_sub_field('file_link');
		 							$target = '_blank';
		 						} else{
		 							$link = '';
		 						}
		 						?>
	 						
	 						<a class="event-vid" href="<?php echo $link; ?>" target="<?php echo $target; ?>">
								
									<img class="video-thumb" src="<?php echo the_sub_field('thumbnail'); ?>">
													
								<h3><?php echo get_sub_field('title'); ?></h3>
							</a>
						<?php endwhile;?>
					</div>
				</div>
			<?php	endif; ?>
			</div>
		</div>

		<?php if (have_rows('links')): ?>
		<div class="full vids mobile-only">
			<div class="centered goverflow">

			<?php
			while (have_rows('links')): the_row(); 
					?>
				
						<a class="event-vid" href="<?php the_sub_field('link'); ?>">
								
							<img class="video-thumb" src="<?php echo the_sub_field('thumbnail'); ?>">
												
							<h3><?php echo get_sub_field('title'); ?></h3>
						</a>
					
				
				 
				
		<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>















	<?php if (have_rows('videos')):
		$videoCount = 0;
		// $videoCount++;
				?>
				<hr>

<!-- 		<div class="centered">
			<a class="read-more non-mobile all-vids-event" href="<?php echo get_permalink(824); ?>">All Videos <span class="carrot">&raquo;</span></a>
		</div> -->
		<div class="full vids non-mobile">
			<a id="vid-next-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow.png"></a>
		 	<a id="vid-prev-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow.png"></a>
			<div class="centered goverflow">
				<!-- <h4 class="bold gallery-head">Video Gallery</h4> -->
				<div id="vid-thumb-gallery">	
 					<div class="page">
						<?php while (have_rows('videos')): the_row(); 
		 						if( $videoCount%3 == 0 && $videoCount !== 0 ) {

		 							echo '</div><div class="page">';

		 						} 
		 						$videoCount++ ;
		 						?>
	 						<!-- embed videos -->
	 						<div class="event-vid" onclick="showVideo(<?php echo $videoCount; ?>)">
								<div class="player">
									<img class="video-thumb" src="<?php echo the_sub_field('thumbnail'); ?>">
								</div>					
								<h3><?php echo get_sub_field('title'); ?></h3>
							</div>
						<?php endwhile;?>
					</div>
				</div>
			<?php	endif; ?>
			</div>
		</div>

		<?php if (have_rows('videos')): ?>
		<a class="mobile-all-vids read-more mobile-only" href="<?php echo get_permalink(824); ?>">All Videos <span class="carrot">&raquo;</span></a>
		<div class="full vids ">
			<div class="centered goverflow">
				<!-- <h4 class="bold gallery-head mobile-only">Video Gallery</h4> -->
			<?php
			$videoCount = 0;
			while (have_rows('videos')): the_row(); 
				$videoCount++;
					?>
				
						<div class="event-vid mobile-only" onclick="showVideo(<?php echo $videoCount; ?>)">
								<h3><?php echo get_sub_field('title'); ?></h3>
								<div class="player">
									<img class="video-thumb" src="<?php echo the_sub_field('thumbnail'); ?>">
								</div>					
						</div>
					
				
				<div id="<?php echo $videoCount; ?>-overlay" class="video-overlay">
					<a class="vidcloseIcon" onclick="hideVideo(<?php echo $videoCount; ?>);">X</a>
					<iframe width="560" height="315" 
					src="<?php the_sub_field('video'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
					frameborder="0" allowfullscreen></iframe>
					<!-- <h3><?php echo get_sub_field('title'); ?></h3> -->
				</div>	 
				
		<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>




	 		<div class="album green-back">
		 		<div id="album" style="overflow:hidden">
					<?php $count = 0;
					if (have_rows('photos')):
						$gallery = array();
						$total = count(get_field('photos'));
					?>

					<div id="img-thumb-gallery">
 						<?php while (have_rows('photos')): the_row();
	 						$image = get_sub_field('photo');
 							$caption = get_sub_field('caption');
 							if(!$caption){
 								$caption = get_field('caption');
 							}
 							$count++;
 							if( $image['height'] > $image['width'] ){
 								$class = 'portrait';
 							} else {
 								$class = 'landscape';
 							}
 							$photo = array();
 							$photo = array($image['url'], $caption, $class, $count, get_the_title());
 							array_push($gallery, $photo);
 							?>
 							
	 						<!-- make img thumbnails w/ open slide-show onclick -->
	 						<!-- <div class="event-img-thumb" > -->
 							<a class="fancybox img" 
	 							href="<?php echo $image['url'] ?>"
	 							title="<?php echo $count; ?>/<?php echo $total?><br><?php echo $caption ?> | <?php echo get_the_title(); ?><br><hr id='fancyHR'><span id='playPause'></span>"
	 							data-index="<?php echo $count; ?>"
 								data-fancybox-group="gallery">
 								<img class="event-img-thumb <?php echo $class; ?>" 
	 							id="thumb<?php echo $count; ?>"
	 							src="<?php echo $image['sizes']['large']?>">	
	 						</a>		
	 						

							
	 						<!-- </div> -->
	 						<?php if ($count == 16){ ?>
	 							<div id="hidden-thumbs">
	 						<?php };?>
						<?php  endwhile;?>
						</div>
					</div>
					<a id="show-thumbs" onclick="showAllThumbs()" class="stay-updated mobile-only">Load More</a>


<!-- <a onclick="toggleSlideshow()" id="playShow">pause</a> -->
<div id="fakeboxNav">
	<a class="fakebox-nav fakebox-prev" onclick="$.fancybox.prev()"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/next_white.svg"></a>
	<a class="fakebox-nav fakebox-next" onclick="$.fancybox.next()"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/next_white.svg"></a>
</div>
<style>
#photoshow {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0,0,0,.6);
    z-index: 999;
}


#fakeboxNav {
	display: none;
}
.fancybox-title-float-wrap {
    position: relative; 
    margin-bottom: 0;
}
.fancybox-title-float-wrap .child {
    color: #6b6764;
    margin-top: 10px;
    background: transparent !important;
    text-shadow: none;
    font-family: 'FrutigerLTW01-45Light',Verdana,Helvetica Neue,Helvetica,Arial,sans-serif;
}

.fakebox-prev {
    left: -40px;
}
.fakebox-next {
    right: -40px;
}
.fakebox-nav {
    position: fixed;
    top: calc(50vh - 40px);
    height: 80px;
    width: 80px;
    z-index: 99999999;
}
.fakebox-prev {
	/*background-image: url('<?php echo get_template_directory_uri(); ?>/img/icons/next_white.svg');*/
	/*background-position: 0;*/
	/*background-size: cover;*/
	padding: 40px;
	width: 140px;
	height: 140px;
	visibility: visible;
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}
.fakebox-next {
	/*background-image: url('<?php echo get_template_directory_uri(); ?>/img/icons/next_white.svg');*/
	/*background-position: 0;*/
	/*background-size: cover;*/
	padding: 40px;
	width: 140px;
	height: 140px;
	visibility: visible;
}

.fancybox-title-float-wrap .child {
	white-space: normal;
	max-width: 100%;
}

/*#playShow {
    position: fixed;
    bottom: 20px;
    width: 100px;
    text-align: center;
    font-size: 24px;
    left: calc(50% - 50px);
    color: #fff;
    cursor: pointer;
    z-index: 999999;
    display: none;
}*/


#playPause img {
    height: 20px;
    margin-top: 2px;
    margin-right: 4px;
    float: left;
}
#playShow {
    position: relative;
    margin-top: 16px;
    /* width: 100px; */
    text-align: center;
    font-size: 18px;
    /* left: calc(50% - 50px); */
    color: #6b6764;
    cursor: pointer;
    z-index: 999999;
    display: inline-block;
    /* display: none; */
}
.fancybox-close {
    position: absolute;
    top: 0;
    right: 0;
    width: 36px;
    height: 30px;
    padding: 8px 0;
    text-align: center;
    cursor: pointer;
    z-index: 8040;
    background: rgba(255, 255, 255, 0.5);
}

hr#fancyHR {
    margin: 10px 0 60px -10%;
    width: 120%;
}
span#playPause {
    display: inline-block;
    margin-top: -56px;
    width: 100%;
    float: left;
}

@media screen and (max-width: 768px ){
	/*#playShow {
		bottom: 7px;
		position: fixed;
	}*/
	hr#fancyHR {
	    margin: 10px 0 50px 10%;
	    width: 80% !important;
	}
	.fakebox-prev,
	.fakebox-next {
		bottom: 0;
		width: 30px;
		height: 30px;
	}
	.fakebox-prev{
		left: -40;
	}
	.fakebox-next{
		right: -40;
	}
	.fakebox-prev {
	    left: -30px;
	    bottom: -25px;
	    top: auto;
	    height: 110px;
	    width: 110px;
	    position: fixed;
	}
	.fakebox-next {
	    right: -30px;
	    bottom: -25px;
	    top: auto;
	    height: 110px;
	    width: 110px;
	    position: fixed;
	}
}
@media screen and (min-width: 1300px){
	.fakebox-prev {
	    left: 5%;
	}
	.fakebox-next {
	    right: 5%;
	}
}


</style>




<script>


// var fancyControlMode = "play";

// function fancyPlay(){
//   $.fancybox.play();
//   $('.fancybox-title #playShow').html('play');
//   fancyControlMode = "stop";
// }

// function fancyStop(){
//   $.fancybox.play();
//   $('.fancybox-title #playShow').html('pause');
//   fancyControlMode = "play";
// }

// function fancyButton() {
//   if (fancyControlMode === "play") {
//     $('.fancybox-title').append('<a id="playShow">play</a>');
//     $('.fancyControl').toggle(fancyStop, fancyPlay);
//   } else {
//     $('.fancybox-title .child').append('<a id="playShow">pause</a>');
//     $('.fancyControl').toggle(fancyPlay, fancyStop);
//   }
// }



var playMode = 'playing';

function fancybox(){
	if( $(window).width() > 768 ){
		setMargin = [20, 20, 60, 20];
		setMaxWidth = '90%';
		setLock = false
	} else {
		setMargin = [0, 0, 40, 0];
		setMaxWidth = 100000000000;
		setLock = true
	}
	$(".fancybox").fancybox({
	    	autoPlay: true,
	    	arrows: false,
	    	padding: [0,0,15,0],
	    	prevEffect: 'fade',
	    	nextEffect: 'fade',
	    	margin: setMargin,
	    	maxWidth: setMaxWidth,
	    	loop: true,
	    	helpers: {
	            overlay: {
	                locked: setLock
	            },
	            buttons: {}
	        },
	    	afterShow: function () {
	    		$('.fancybox-close').html('X');
	            // $(".fancybox-outer").on("mouseenter", function () {
	            //     $.fancybox.play(false); // stops slideshow
	            //     console.log('enter');
	            // });
	            // $(".fancybox-outer").on("mouseleave", function () {
	            //     $.fancybox.play(true); // starts slideshow
	            //     console.log('leave');
	            // });
	            // $('#playShow').remove();
	        	if(playMode == 'playing'){
	        		$('#playPause').html('<a onclick="toggleSlideshow()" id="playShow"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/Pause.png">Pause</a>');
	        	} else {
	        		$('#playPause').html('<a onclick="toggleSlideshow()" id="playShow"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/Play.png">Play</a>');	
	        	}
	        },
	        beforeShow: function(){
	        	$('html').addClass('no-scroll');
	        	$('body').addClass('no-scroll');
	        	$('#fakeboxNav').show();
	        	// $('.fancybox-close').html('X');
	        	
	        },
	        beforeLoad: function(){
	        	// $('#playShow').show();
	        	$('.fancybox-close').html('X');
	        },
	        // beforeClose: function(){
	        // 	console.log('before close');
	        // },
	        afterClose: function(){
	        	console.log('after close');
	        	$('html').removeClass('no-scroll');
	        	$('body').removeClass('no-scroll');
	        	$('#playShow').remove();
	        	$('#fakeboxNav').hide();
	        }
	        
    });
}


function toggleSlideshow(){
	if(playMode == 'playing'){
		$.fancybox.play();
		playMode = 'paused';
		$('#playPause').html('<a onclick="toggleSlideshow()" id="playShow"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/Play.png">Play</a>');	
	} else {
		$.fancybox.play();
		$.fancybox.next()
		playMode = 'playing';
		$('#playPause').html('<a onclick="toggleSlideshow()" id="playShow"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/Pause.png">Pause</a>');
	}
	
}



$(document).ready(function(){
	fancybox();
})


function photoshow(){
	$('#gallery').slick({
		centerMode: true,
		centerPadding: 0,
		slidesToShow: 1,
		variableWidth: true,
		prevArrow: $('#slick-prev'),
		nextArrow: $('#slick-next'),
		// fade: true,
		// autoplay: true,
		autoplaySpeed: 3000,
		pauseOnHover: true,

	})
}


</script>
<!-- <div id="photoshow">
	<img class="slick-nav" id="slick-prev" src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow.png">
	<img class="slick-nav" id="slick-next" src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow.png">
<div id="gallery"> -->
<?php //foreach ($gallery as $photo) { ?>
	<!-- 	<div class="event-img-full" id="full<?php echo $photo[2]; ?>">
			<img class="<?php // echo $photo[2]; ?>" src="<?php echo $photo[0]; ?>">
			<div class="event-caption-box">
				<p class="album-index"><?php echo $photo[3] ?>/<span class="total-pics"></span></p>
				<p class="img-caption"><?php echo $photo[1]; ?></p>
				<p class="event-name"><?php echo $photo[4] ?></p>
			</div>
		</div> -->
<?php //} ?>
<!-- </div> -->
					<?php	endif; ?>
				</div>
			</div>
		<!-- end photo album -->


	</main>


</div>

<?php endwhile;
	endif; ?>

<?php if (have_rows('partner_group')): ?>
	<div class="row partner-block green-back text-center">
		<h2><?php the_field('partners_heading')?></h2>
		<?php  while (have_rows('partner_group')): the_row(); ?>
			<div class="row">
				<h2><?php the_sub_field('partner_subheading'); ?></h2>
				<div id="partners-grid" class="centered">
					<?php if (have_rows('partner_logo')): while (have_rows('partner_logo')) : the_row(); 
						$logo = '';
	 					$link = '';
	 					$width = '';
	 					$width = get_sub_field('width');
	 					$logo = get_sub_field('logo');
	 					$link = get_sub_field('link'); ?>

	 					<?php if( $link!== '' ){ ?>
	 						<a class="<?php echo $width; ?>" href="<?php echo $link; ?>"><img src="<?php echo $logo; ?>"></a>
 						<?php } else{ ?>
							<img class="<?php echo $width; ?>" src="<?php echo $logo; ?>">
						<?php }; ?>
					
					<?php endwhile; endif; ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div> 
<?php endif; ?>

<div class="clear" class="margin: 5% 0;"></div>


<!-- end #content -->
<?php get_footer(); ?>



<style>

/*.video-thumb:after {
  content: "";
  width: 80px;
  height: 80px;
  background-image: url('<?php echo get_template_directory_uri(); ?>/img/icons/play.svg');
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  position: absolute;
  filter: drop-shadow(0px 0px 6px black);
  -webkit-filter: drop-shadow(0px 0px 6px black);
  top: -moz-calc(50% - 40px);
  left: -moz-calc(50% - 40px);
  top: -webkit-calc(50% - 40px);
  left: -webkit-calc(50% - 40px);
  top: calc(50% - 40px);
  left: calc(50% - 40px);
  cursor: pointer;
  pointer-events: none;
}*/
@media screen and (max-width: 980px){
	a#pic-next-arrow, a#vid-next-arrow {
	    right: 0;
	  }
	a#pic-prev-arrow, a#vid-prev-arrow {
	    left: 0;
	  }
}
</style>

<script>
function initIMG(){
	$('.event-img-full').featherlightGallery({
	    previousIcon: '<img src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow.png">',
	    nextIcon: '<img src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow.png">',
	    galleryFadeIn: 300,
	    openSpeed: 300,
	    closeIcon:'<img src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon.png">',
	    // beforeOpen: function(event){
	    // 	thumb = event.target;
	    // 	full = $(thumb).attr('data-featherlight');
	    // 	full += ' img';
	    // 	src = $(full).attr('data-src');
	    // 	$(full).attr('src', src);
	    // },
	});
	total = $('.event-img-thumb').length;
	$('.total-pics').html(total);
}


function showAllThumbs(){
	$('#hidden-thumbs .event-img-thumb').show();
	masonize();
	$('#show-thumbs').remove();
}

function initVID(){
	$('#vid-thumb-gallery').slick({
		infinite: true,
		adaptiveHeight: true,
		focusOnSelect: false,
	    prevArrow: '#vid-prev-arrow',
	    nextArrow: '#vid-next-arrow'
	});
}


// function initLINK(){
// 	$('#link-thumb-gallery').slick({
// 		infinite: true,
// 		adaptiveHeight: true,
// 		focusOnSelect: false,
// 	    prevArrow: '#link-prev-arrow',
// 	    nextArrow: '#link-next-arrow'
// 	});
// }

// function classImgs(){
// 	$('.event-img-full img').each(function(i){
// 		if(this.height > this.width ){
// 			$(this).addClass('portrait');
// 		} else {
// 			$(this).addClass('landscape');
// 		}
// 	})
// 	$('.event-img-thumb').each(function(i){
// 		if(this.height > this.width ){
// 			$(this).addClass('portrait');
// 		} else {
// 			$(this).addClass('landscape');
// 		}
// 	})
// 	masonize();
// }
function sizeThumbs(){
	if( $(window).width() <= 760 ) {
		$('.event-img-thumb').width('49.4%');
	} else {
		$('.event-img-thumb').width('24.4%');
	}
	w = $('.event-img-thumb').width();
	$('.event-img-thumb').width(w);
	$('.portrait').height( '100%');
	$('.landscape').height( '100%');
	$('.portrait').height( w * 1.49926794 );
	$('.landscape').height( w * 0.66699219 );
}

function masonize(){
	// $('#img-thumb-gallery').height('auto');
	sizeThumbs();
	$('#img-thumb-gallery').masonry({
		  // options
		  itemSelector: '.event-img-thumb',
		  columnWidth: '.event-img-thumb',
		  gutter: 0,
	});
}
$(document).ready(function(){
	initIMG();
	initVID();
	// initLINK();
	masonize();
	console.log('masonize');
})
$(window).resize(function(){
	sizeThumbs();
})
</script>


