<?php /* Template Name: EVENTS */ get_header(); ?>


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
								echo  $text ;
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

	<div id="events-centered" class="centered">

		<div class="half-col left">

			<?php 
			$events = new WP_Query(array('post_type'=>'event', 
										'meta_key' => 'date', 
										'orderby'=>'meta_value_number', 
										'order' => 'DESC')); 
			$upcoming = array();
			$past = array();
			$all = array();

			//sort dy date --------FIX BEFORE USE
			// 'meta_key'=>'date',
			// 'orderby'=>'meta_value_number',
			// 'order'=>'ASC'

			while ( $events->have_posts() ) : $events->the_post();
				// prep events for sorting
				$today = date('Ymd');
				$todaytime = DateTime::createFromFormat('Ymd', $today);
				$date = get_field('date');
				$datetime = DateTime::createFromFormat( 'Ymd', $date);
				

			// print_r($todaytime); // THESE ARE FORMATTED FOR COMPARISON
			// echo '<br>event:';
			// print_r($datetime); // THESE ARE FORMATTED FOR COMPARISON
			// echo '<br>';
			// echo $date;
			// echo '<br>';
			// echo $datetime->format('F j, Y'); //THIS IS THE CORRECT DATE FORMAT FOR DISPLAY



				//compare today to event-date
					// sort posts into upcoming/past arrays.
				if($datetime >= $todaytime){
					array_push($upcoming, $post );
				} 
				if($datetime < $todaytime){
					array_push($past, $post );
				};
				array_push($all, $post);
				$breaker = 0;
			endwhile;


			// var_dump($past);
			// echo '<br>';
			// var_dump($upcoming);
			?>		

			<a class="page-anchor" id="home-content" style="padding-top: 126px; margin-top: -126px;"></a>

			<?php 
				if($upcoming){ ?>

				<div id="upcoming-events">
					<h4 class="bold" style="margin-bottom:0">Upcoming Events</h4>

				<?php
					foreach($upcoming as $event){
						setup_postdata($event);
						// create upcoming event boxes ?>
						<div class="event" class="green-back">

							<?php 
								$link = get_field('link', $event->ID);
								if( $link !== '' ){ 
								
								} else { 
									$link = get_the_permalink($event->ID);
								} 
							?>

							<div class="event-top">
								<a href="<?php echo $link; ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $event->ID )) ?>"></a>

								<div class="event-info">
									<?php
										$date = get_field('date', $event->ID);
										$datetime = DateTime::createFromFormat( 'Ymd', $date);
										$date = $datetime->format('F j, Y');
									?>



									<p><span class="event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php echo get_field('time', $event->ID); ?></p>

									<a href="<?php echo $link ?>"><h3><?php echo get_the_title($event->ID); ?></h3></a>

									<p class="location"><?php echo the_field('location', $event->ID); ?></p>

									<p class="address"><?php echo the_field('address', $event->ID); ?></p>

								</div>

							</div>

							<div class="event-description">

								<?php echo the_field('preview_text', $event->ID); ?>
								
							</div>

							<?php 
							$link = get_field('link', $event->ID);
							if( $link !== '' ){ ?>
								<a href="<?php echo $link ?>" class="stay-updated">Register</a>
							<?php } else { ?>
								<a href="<?php the_permalink($event->ID) ?>" class="stay-updated">See Event</a>
							<?php } ?>

						</div>
						<!-- end single event -->
					<?php
					$breaker ++;
					} ?>
				</div>
			<?php
				} ?>


				<?php 
				if($past){ ?>

				<div id="past-events">
					<h4 style="margin-bottom:9px" class="bold ">Past Events</h4>
					<a style="margin-bottom:-12px;" href="<?php echo get_post_type_archive_link( 'event' ); ?>"><h4 style="margin: 0 0 -14px;" class="read-more">All Past Events <span class="carrot">&raquo;</span></h4></a>

				<?php
				// $breaker = 0;
					foreach($past as $event){
						setup_postdata($event);
						// create past event boxes 
						$link =  get_permalink($event->ID);
						?>
						<div class="event" class="green-back">
							
							<div class="event-top">
								<a href="<?php echo $link ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $event->ID )) ?>"></a>

								<div class="event-info">
									<?php
										$date = get_field('date', $event->ID);
										$datetime = DateTime::createFromFormat( 'Ymd', $date);
										$date = $datetime->format('F j, Y');
									?>

									<p><span class="event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php echo get_field('time', $event->ID); ?></p>

									<a href="<?php echo $link ?>"><h3><?php echo get_the_title($event->ID); ?></h3></a>

									<p class="location"><?php echo the_field('location', $event->ID); ?></p>

									<p class="address"><?php echo the_field('address', $event->ID); ?></p>

								</div>

							</div>

							<div class="event-description">

								<?php echo the_field('preview_text', $event->ID); ?>
								
							</div>

							
								<a href="<?php echo $link ?>" class="stay-updated">View Gallery</a>
							

						</div>
						<!-- end single event -->
					<?php
					if($breaker == 2){
						break;
					};
					$breaker ++;

					} ?>
				</div>
			<?php
				} ?>

				

		</div>

		<div class="mobile-only ">
			<a href="<?php the_permalink(1136); ?>"><h4 class="read-more">All Past Events <span class="carrot">&raquo;</span></h4></a>
		</div>

	<!-- </div> -->

	<!-- <div class="centered"> -->

		<div class="half-col right">

			<div id="event-videos">


	<?php 
	?>
			<?php 
			// $events = new WP_Query('post_type=>event'); 
			// $upcoming = array();
			// $past = array();

			// while ( $events->have_posts() ) : $events->the_post();
			// 	// prep events for sorting
			// 	$today = date('Ymd');
			// 	$todaytime = DateTime::createFromFormat('Ymd', $today);
			// 	$date = get_field('date');
			// 	$datetime = DateTime::createFromFormat( 'Ymd', $date);
				

			// 	//compare today to event-date
			// 		// sort posts into upcoming/past arrays.
			// 	if($datetime >= $todaytime){
			// 		array_push($upcoming, $post );
			// 	} 
			// 	if($datetime < $todaytime){
			// 		array_push($past, $post );
			// 	};
			// endwhile;


			//if($past){ 
			if( have_rows('videos', 16) ):
			?>
			<h4 style="margin-bottom: 0;" class="bold">Event Videos</h4>
			<a style="margin: 8px 0 6px;" class="read-more" href="<?php echo get_permalink(824); ?>">All Videos <span class="carrot">&raquo;</span></a>
			<?php
				// $videoCount = 0;
				// foreach( $past as $p ): 
				// 	setup_postdata($p);
				// echo '<br>ID:'. $p->ID . '<br>';
				// var_dump($p);
					// if (have_rows('videos', $p->ID) ): ?>
						
						<?php // while (have_rows('videos', $p->ID)): the_row(); 
						// $videoCount ++; 
						?>  
						<?php 
				
					$videoCount = 0;
					while( have_rows('videos', 16) ): the_row();
						$vid = get_sub_field('video_code');
						$title = get_sub_field('title');
						$link = get_sub_field('link');
						$copy = get_sub_field('description');
						?>

					<div class="event-video">
						<?php 
						if( get_sub_field('override') ){ ?>
							<div class="player">
							<img class="video-thumb" 
								src="<?php echo the_sub_field('thumbnail'); ?>"
								onclick="showVideoEmbed(<?php echo $videoCount; ?>)">
						</div>
						<?php 
						} else { ?>
							<div class="player">
							<img class="video-thumb" 
								src="<?php echo the_sub_field('thumbnail'); ?>"
								onclick="showVideo(<?php echo $videoCount; ?>)">
							</div>
						<?php } ?>
						<!-- full width video -->
						<!-- <iframe width="560" height="315" src="<?php echo get_sub_field('video'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe> -->
						<!-- <div class="player">
							<img class="video-thumb" 
								src="<?php echo the_sub_field('thumbnail'); ?>"
								onclick="showVideo(<?php echo $videoCount; ?>)">
						</div> -->

						<div id="<?php echo $videoCount; ?>-overlay" class="video-overlay">
							<?php 
							if( get_sub_field('override') ){ ?>
								<a class="vidcloseIcon" onclick="hideVideoEmbed(<?php echo $videoCount; ?>);">X</a>
							<?php 
							} else {?>
								<a class="vidcloseIcon" onclick="hideVideo(<?php echo $videoCount; ?>);">X</a>
							<?php } ?>
							
							<?php 
							if(get_sub_field('override')){
								echo the_sub_field('video_embed');
							} else { ?>
							<iframe width="560" height="315" 
							src="<?php echo $vid ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
							frameborder="0" allowfullscreen></iframe>
							<!-- <h3><?php echo get_sub_field('title'); ?></h3> -->
							<?php } ?>
						</div>

						<div class="event-video-info">
							<?php 
							if( $link ){ ?>
								<a href="<?php echo $link ?>"><h3><?php echo $title ?></h3></a>
							<?php } else {?>
							<?php 
							if( get_sub_field('override') ){ ?>
								<h3 onclick="showVideoEmbed(<?php echo $videoCount; ?>)"><?php echo $title ?></h3>
							<?php } else { ?>
								<h3 onclick="showVideo(<?php echo $videoCount; ?>)"><?php echo $title ?></h3>
							<?php } ?>
								

							<?php };

							if( $copy ){ ?>
								<?php 
								if( get_sub_field('override') ){ ?>
									<p onclick="showVideoEmbed(<?php echo $videoCount; ?>)"><?php echo $copy; ?></p>
								<?php } else { ?>
									<p onclick="showVideo(<?php echo $videoCount; ?>)"><?php echo $copy; ?></p>
								<?php } ?>
								
							<?php } ?>

							<!-- <a href="<?php echo $link; ?>"class="read-more">View More <span class="carrot">&raquo;</span></a> -->
							<!-- title -->
							<!-- <a href="<?php echo get_permalink($event->ID);?>"><h3 style="font-size:20px;"><?php echo get_sub_field('title'); ?></h3></a> -->

							<!-- view more link-->
							<!-- <a href="<?php echo get_permalink($event->ID);?>"class="read-more">View More <span class="carrot">&raquo;</span></a> -->
						</div>

					</div>
						<?php	
						$videoCount++;
						endwhile;
					endif;
				// endforeach ; 
			// };
							
							?>
			

		
				






			

			

				<?php $eventsNews = new WP_Query( array( 'category_name'=>'news',
														'category_name'=>'events',
														'posts_per_page'=>'2',
														'orderby'=>'menu_order')); 
				if($eventsNews->have_posts()) : ?>
					<div id="event-news-section">

						<hr />

						<h4 class="bold">Event News</h4>

						<hr />

						<?php
					while( $eventsNews->have_posts() ) : $eventsNews->the_post();

					?>
					<div class="event-news">
						<a href="<?php echo get_the_permalink();?>"><h3 class="orange"><?php echo get_the_title(); ?></h3></a>

						<?php the_content(); ?>

						<a class="read-more" href="<?php echo get_the_permalink(); ?>">Read More <span class="carrot">&raquo;</span></a>

								<?php 
								// $tags = the_tags();
								// if ($tags){ ?>
									<!-- <p class="tag-line"> Tags: -->
								<?php //foreach($tags as $tag):
								?>
								<!-- <a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a> -->
								<?php //endforeach; ?>
								<!-- </p> <?php // } ?> -->
					</div>

					

				<?php endwhile; ?>

				<hr />

				
				

			</div>
		<?php endif; ?>

		</div>

	</div>
</div>
		<div class="clear">
			<hr>
		</div>

		<div class="row non-mobile">
		<div class="centered">

			<a href="<?php echo get_post_type_archive_link( 'event' ); ?>"><h4 style="margin: 8px 0 -4px;" class="read-more">All Past Events <span class="carrot">&raquo;</span></h4></a>

				<?php 
				if($past){ 
					$eventCount=0;?>

				<div id="rest-events">
					<ul style="list-style:none">
						<li class="event-slide">
							<?php
							foreach($past as $event){
								if ( $eventCount < 2 ){
									$eventCount++;
								} else {
									setup_postdata($event);
									// create past event boxes 
									$link =  get_permalink($event->ID);
									?>
									<div class="event" class="green-back">
										
										<div class="event-top">
											<a href="<?php echo $link ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $event->ID )) ?>"></a>
											<div class="event-info">
												<?php
													$date = get_field('date', $event->ID);
													$datetime = DateTime::createFromFormat( 'Ymd', $date);
													$date = $datetime->format('F j, Y');
												?>
												<p><span class="event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php echo get_field('time', $event->ID); ?></p>
												<a href="<?php echo $link ?>"><h3><?php echo get_the_title($event->ID); ?></h3></a>
												<p class="location"><?php echo the_field('location', $event->ID); ?></p>
												<p class="address"><?php echo the_field('address', $event->ID); ?></p>
											</div>
										</div>
										<!-- <div class="event-description">
											<?php the_content(); ?>						
										</div> -->
										<a href="<?php echo $link ?>" class="stay-updated">View Gallery</a>
									</div>
									<!-- end single event -->
									<?php
									
									if($eventCount%2 == 0) { ?> 
										</li><li class="event-slide">
										<?php 
									}; 
									$eventCount++;
								}
							} ?>
						</li>
					</ul>
				</div>

				

			<?php
				} ?>

		</div>
	</div>

	<div class="clear"></div>

</div>
<!-- end #content -->

<div class="clear"></div>

<?php get_footer(); ?>

<?php /*
<script>
$(document).ready(function($) {

	// slider = $('#events-slider').unslider({
	// 	arrows: {
	// 		//  Unslider default behaviour
	// 		prev: '<a class="unslider-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_white.svg"></a>',
	// 		next: '<a class="unslider-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg"></a>'
	// 	},
	// 	autoplay: true,
	// 	delay: 3000,
	// 	speed: 1000,
	// 	nav: false
	// });
	

	// slider.on('unslider.change', function(event, index, slide) {
	// 	console.log(slide);
	// 	console.log(index);
	// 	console.log($('li.slide').length);
	// 	if( index = $('li.slide').length-1 ){
	// 		console.log('end');
	// 	}
	// });

	// $('#rest-events').unslider({
	// 	nav : false,
	// 	arrows: {
	// 			//  Unslider default behaviour
	// 			next: '<div class="read-more nav-previous alignleft rest">Next Page <span class="carrot">&raquo;</span></div>',
	// 			prev: '<div class="read-more nav-next alignright rest"><span class="carrot">&laquo;</span> Previous Page</div>'
	// 		},
	// 	animateHeight : true
	// });
});

// $('#rest-events').on('unslider.change', function(event, index, slide) {
// 	$slides = $('.event-slide');
// 	$slides = $slides.length -1;
// 	$('.nav-next.rest').css('display', 'inline');
// 	$('.nav-previous.rest').css('display', 'inline');
// 	if(index == 0) {
// 		$('.nav-next.rest').css('display', 'none');
// 	}
// 	if(index == $slides){
// 		$('.nav-previous.rest').css('display', 'none');
// 	}

// });


// remove empty slide
// $('.event-slide').each( function(){
// 	if( $(this).contents().length < 8) {
// 		$(this).remove();
// 	}
// });


// $(window).resize(function(){
// 	sizeVidTitles();
// })




// function sizeVidTitles(){
// 	if( $(window).width() <= 940 ){
// 		$('.event-video h3').css('height', 'auto');
// 	} else {
// 		var maxHeight = 0;
// 		$('.event-video h3').height('auto');
// 		$('.event-video h3').each(function(){
// 		   maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
// 		});
// 		// maxHeight += ($('.news-box').outerHeight() - $('.news-box').height()) * 2;
// 		$('.event-video h3').css('height', maxHeight);
// 	}
// }

</script>

<style>

iframe {
	max-width: 100%;
}

<style> */ ?>