<?php /* Template Name: HOME */ get_header(); ?>

<style>
#content {
	margin-bottom: -2px;
}
ul {
	list-style: none;
}
</style>

<div id="content">
	<?php 
	$events = new WP_Query('post_type=>event'); 
	$upcoming = array();
	$past = array();
	// if( $upcoming !== '' ){
	?>
	
	<?php 
	
	while ( $events->have_posts() ) : $events->the_post();
		// prep events for sorting
		$today = date('Ymd');
		$todaytime = DateTime::createFromFormat('Ymd', $today);
		$date = get_field('date');
		$datetime = DateTime::createFromFormat( 'Ymd', $date);
		

		//compare today to event-date
			// sort posts into upcoming/past arrays.
		if($datetime >= $todaytime){
			array_push($upcoming, $post );
		} 
		// if($datetime < $todaytime){
		// 	array_push($past, $post );
		// };
	endwhile;
	?>

	<?php 
	$home = new WP_Query( 'page_id=18' );
			// The Loop
			while ( $home->have_posts() ) : $home->the_post(); ?>

				<?php 
				if (have_rows('slides') ): ?>

					<div id="home-slider">
						<ul>
							<?php
							while (have_rows('slides')): the_row();
								$image = '';
								$text = '';
								$link = '';
								$foreground_image ='';
								$mobile = '';
								$class = '';

								$image = get_sub_field('image');
								$mobile = get_sub_field('mobile_image');
								$foreground_image = get_sub_field('foreground_image');
								$foreground_image_mobile = get_sub_field('foreground_image_mobile');
								$text = get_sub_field('text');
								$link = get_sub_field('link-to');
								$class = get_sub_field('position');
								$classMobile = get_sub_field('text_position_mobile');
								$arrowClass = get_sub_field('arrow_position');
								$arrowClassMobile = get_sub_field('arrow_position_mobile');
								$anchor = get_sub_field('image_anchor');
								$mobile_anchor = get_sub_field('image_anchor_mobile');
						?>

							
			 					<li class="slide" >
			 						<div class="slide-block non-mobile <?php echo $anchor; ?>" style="background-image:url('<?php echo $image; ?>')">
			 							<a href="<?php echo $link; ?>">
				 						<div class="banner-text <?php echo $class; ?>">
				 							<?php 
				 							if( $text ){
				 								echo '<h3>' . $text . '</h3>';
			 								} elseif( $foreground_image ){ ?>
		 										<img src="<?php echo $foreground_image?>">
			 								<?php } ?>
				 						</div>
										</a>
										<a class="smoothScroll bounce animated" href="#home-content">
											<img class="down-arrow-scroll <?php echo $arrowClass; ?>" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
										</a>
									</div>

									<div class="slide-block mobile-only <?php echo $mobile_anchor; ?>" style="background-image:url('<?php echo $mobile; ?>')">
			 							<a href="<?php echo $link; ?>">
				 						<div class="banner-text non-mobile <?php echo $class; ?>">
				 							<?php 
				 							if( $text ){
				 								echo '<h3>' . $text . '</h3>';
			 								} if( $foreground_image ){ ?>
		 										<img src="<?php echo $foreground_image_mobile; ?>">
			 								<?php } ?>
				 						</div>
				 						<div class="banner-text mobile-only <?php echo $classMobile; ?>">
				 							<?php 
				 							if( $text ){
				 								echo '<h3>' . $text . '</h3>';
			 								} if( $foreground_image ){ ?>
		 										<img src="<?php echo $foreground_image_mobile; ?>">
			 								<?php } ?>
				 						</div>
										</a>

										<a class="smoothScroll bounce animated non-mobile" href="#home-content">
											<img class="down-arrow-scroll <?php echo $arrowClass; ?>" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
										</a>
										<a class="smoothScroll bounce animated mobile-only" href="#home-content">
											<img class="down-arrow-scroll <?php echo $arrowClassMobile; ?>" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
										</a>
									</div>
			 					</li>
			 				
							<?php endwhile; ?>
						</ul>

						

					</div>

				<?php endif; ?>
<style>
#home-slider .slide {
    /*height: 92vh;*/
    /*background-position: center;*/
        height: 100vh;
    margin-top: -50px;
}

#home-slider .slide-block {
    /*background-position: center left;*/
    background-size: cover;
    display: inline-block;
    position: relative;
    width:100%;
    height: 100%;
}

</style>

	<?php $head_bg = get_field('background_image', 18); ?>

	<div id="mission" style="background-image:url('<? echo $head_bg; ?>')">

			<a class="page-anchor" id="home-content"></a>

			<h2><?php the_field('header_text', 18); ?></h2>

			<h3><?php the_field('header_sub_text', 18); ?></h3>

			<!-- <a href="http://eepurl.com/NWoNj" target="_blank" id="mission-updated" class="stay-updated">Stay Updated</a> -->

	</div>



		<!-- if upcoming event -->
			<?php if($upcoming){ 

				foreach( $upcoming as $up ): setup_postdata($up); ?>

				<div class="upcoming-event green-back mobile-only" style='margin-top: 6px !important;'>

					<h5>Upcoming Events</h5>

				<!-- 	<img alt="upcoming event link" src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png"> -->

					<?php
						$date = get_field('date', $up->ID);
						$datetime = DateTime::createFromFormat( 'Ymd', $date);
						$date = $datetime->format('F j, Y');
					?>
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $up->ID )) ?>">

					<h4 style="margin: 15px 0 -15px !important;"><span class="bold event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php the_field('time', $up->ID); ?></h4>
					
					<?php $link =  get_field('link', $up->ID);
							if( $link ){ ?>
								<a href="<?php echo $link ?>"><h3 style="margin-bottom: 0 !important"><?php echo get_the_title($up->ID); ?></h3></a>
							<?php } else {?>
								<h3 style="margin-bottom: 0 !important;"><?php echo get_the_title($up->ID); ?></h3>
								<?php } ?>


				</div>

			<?php  wp_reset_postdata(); 
			 
			endforeach; } ; ?>





























			



<div id="news-events-home" style="display;inline-block;">

	<div class="centered">

		<h2 style="margin-top:10px"><?php the_field('news_header', 18); ?></h2>

		<div class="left-col">

			

			<a  style="margin:0 0 10px 0"class="read-more" href="http://mlk-chf.org/category/news/">All News <span class="carrot">»</span></a>

			<?php 

				$featured = get_field('featured_news', 18);
				$omit = array();
				if( $featured ):
					foreach( $featured as $article )	:	
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $article->ID ), 'single-post-thumbnail' );
						$linkto = get_permalink( $article->ID );
						$title = get_the_title( $article->ID );
						$content = get_post_field( 'post_content', $article->ID );
						$tags = get_the_tags( $article->ID );
						array_push($omit, $article->ID);
			?>

						<section class="partner-spotlight">

							<img src="<?php echo $image[0]; ?>">

							<div class="partner-excerpt">

								<a href="<?php echo $linkto ?>">
									<h3><?php echo $title ?></h3>
								</a>

								<p><?php echo $content ?></p>

								<a class="read-more" href="<?php echo $linkto ?>">Read More <span class="carrot">&raquo;</span></a>


								<?php //print_r($tags); ?>
								
								<?php // if($tags){ ?>
									<!-- <p class="tag-line"> Tags:  -->
									<?php //foreach($tags as $tag): ?>
										<!-- <a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a> -->
									<?php //endforeach; ?>
									<!-- </p> -->
								<?php //} ?>
							</div>

						</section>

						<hr class="non-mobile">
				<?php
					endforeach;
				endif;
				?>

<?php endwhile; ?>

<?php $hospital_news = get_field('hospital_news', 18);

// NEED TO ITERATE THROUGH HOSPITAL NEWS ITEMS AND ADD TO THE OMIT ARRAY
if( $hospital_news ): 
foreach ($hospital_news as $article) :
	array_push($omit, $article);
endforeach;
endif;
?>


		<?php 
			$recents = new WP_Query(array('category_name' => 'news',
				'post__not_in'=>$omit));
			if ( $recents->have_posts() ) :  $newsCount=0; ?>

				<!-- Add the pagination functions here. -->

				<!-- Start of the main loop. -->
				<?php while ( $recents->have_posts() ) : $recents->the_post();
				// $img = wp_get_attachment_image_src( get_post_thumbnail_id(  ), 'single-post-thumbnail');
				// 	$img = $img[0];  
				?>


				<div class="recent-news-excerpt" style="margin-bottom:40px;">

					<?php if( has_post_thumbnail() ){ ?>

						<img src="<?php the_post_thumbnail_url( 'large' ) ?>">

					<?php }; ?>

					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

					<?php the_content(); ?>

					<a href="<?php the_permalink(); ?>" class="read-more">Read More <span class="carrot">&raquo;</span></a>

					 <?php // if($tags){ ?>
									<!-- <p class="tag-line"> Tags:  -->
									<?php //foreach($tags as $tag): ?>
										<!-- <a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a> -->
									<?php //endforeach; ?>
									<!-- </p> -->
								<?php //} ?>
							

				</div>
				<!-- the rest of your theme's main loop -->

				<?php 
				$newsCount++;
				if($newsCount == 4) { break; } 

				endwhile; endif;?>
				<!-- End of the main loop -->
				<!-- <div class="clear" style="height:10px;"></div> -->

<div id="mobile-initiatives-box" class="mobile-only">
	<!-- <div class="centered"> -->
	<hr style="    margin: 0 0 60px;">
		<h2 class="text-center"> Our Initiatives</h2>		
		 <div id="mobile-init-slider" class="text-center">
			<?php
			$initiatives = new WP_Query( array('post_type'=>'initiative',
												'orderby'=> 'menu_order') );
			// The Loop
			while ( $initiatives->have_posts() ) : $initiatives->the_post(); 
			$image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ));
			$anchor = get_field('anchor');
			?>

				<div class="init-slide" style="margin:0;">
					<a href="<?php echo get_permalink(20) . '#' . $anchor ; ?>"><img src="<?php echo $image; ?>"></a>
					<div class="init-slide-body">
						<a href="<?php echo get_permalink(20) . '#' . $anchor ; ?>"><h2 class="orange"><?php the_title(); ?></h2></a>
						<p><?php the_content(); ?>
						<!-- this will be adjusted on deployment -->
						<a href="<?php echo get_permalink(20) . '#' . $anchor ; ?>" class="read-more">
							Learn More <span class="carrot">&raquo;</span>
						</a>
						</p>
					</div>
				</div>
			<?php 
			endwhile?>
		</div>
	<!-- </div> -->
	<hr style="    margin: 40px 0 -30px;">
</div>
			
		</div>




		<div class="right-col">

			

			<!-- if upcoming event -->
			<?php if($upcoming){ ?>
			<a class="read-more non-mobile" style="margin-bottom:0; margin-top:0;" href="<?php echo get_permalink(16); ?>">All Events <span class="carrot">»</span></a>
			<?
				foreach( $upcoming as $up ): setup_postdata($up); ?>

				<div class="upcoming-event green-back non-mobile" style='margin-top:40px'>

					<h5>Upcoming Events</h5>

				<!-- 	<img alt="upcoming event link" src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png"> -->

					<?php
						$date = get_field('date', $up->ID);
						$datetime = DateTime::createFromFormat( 'Ymd', $date);
						$date = $datetime->format('F j, Y');
					?>
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $up->ID )) ?>">

					<h4 style="margin: 15px 0 -15px !important;"><span class="bold event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php the_field('time', $up->ID); ?></h4>
					
					<?php $link =  get_field('link', $up->ID);
							if( $link ){ ?>
								<a href="<?php echo $link ?>"><h3 style="margin-bottom: 0 !important"><?php echo get_the_title($up->ID); ?></h3></a>
							<?php } else {?>
								<h3 style="margin-bottom: 0 !important;"><?php get_the_title($up->ID); ?></h3>
								<?php } ?>


				</div>

			<?php  wp_reset_postdata(); 
			// break ; 
			endforeach; } ; ?>


					<h4 class="bold"><?php echo the_field('news_heading', 18); ?></h4>

						<?php 
						
						// var_dump($news);
						if($hospital_news):
							foreach ($hospital_news as $post) :
								setup_postdata($post);
													?>
						<div class="sorted-news green-back">
							<a href="<?php echo get_the_permalink($post); ?>"><h3 class="orange"><?php echo get_the_title($post); ?></h3></a>

							<?php // the_content(); ?>

							<a class="read-more" href="<?php echo get_the_permalink($post); ?>">Read More <span class="carrot">&raquo;</span></a>

						</div>

						<?php endforeach; 
					wp_reset_postdata();
					endif;?>

					<a class="read-more" href="<?php echo get_category_link(13); ?>">All Hospital News <span class="carrot">&raquo;</span></a>


			<hr class="mobile-only" style="margin: 40px 0 20px;">

				
					<?php  while ( $home->have_posts() ) : $home->the_post();
					if (have_rows('videos')): 
						$videoCount = 0; ?>
					<div class="clear" style="height: 0px;"></div>
					<h4 class="bold"><?php echo the_field('sidebar_title'); ?></h4>
					<div class="past-event " style=" margin-top:10px;">
					<?php while (have_rows('videos')): the_row(); ?>
	 						<!-- embed videos -->
	 						<div class="sidebar-vid green-back" style=";">
	 							<div class="player">
		 							<img class="video-thumb" 
										src="<?php echo the_sub_field('thumbnail'); ?>"
										onclick="showVideo(<?php echo $videoCount; ?>)">
								</div>

								<div id="<?php echo $videoCount; ?>-overlay" class="video-overlay">
									<img src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon.png" 
										onclick="hideVideo(<?php echo $videoCount; ?>);">
									<iframe width="560" height="315" 
									src="<?php the_sub_field('video'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
									frameborder="0" allowfullscreen></iframe>
								</div>
	 							<a onclick="showVideo(<?php echo $videoCount; ?>)"><h3><?php echo get_sub_field('title'); ?></h3></a>
	 							
	 						</div>

						<?php $videoCount ++;
						endwhile; ?>
						<a class="read-more" href="<?php echo get_permalink(824); ?>">All Videos <span class="carrot">&raquo;</span></a>
						</div>
						<?php endif;
						endwhile; ?>



		</div>

	
	</div>
	<!--  end of centered column -->

</div>



<hr class="mobile-only" style="margin: 40px 0 20px;">



	<div id="initiatives-box" class="orange-back non-mobile">
	<!-- <div class="centered"> -->
		<h2 class="text-center"> Our Initiatives</h2>		
		 <div id="init-slider" class="text-center">
			<?php
			$initiatives = new WP_Query( array('post_type'=>'initiative',
												'orderby'=> 'menu_order') );
			// The Loop
			while ( $initiatives->have_posts() ) : $initiatives->the_post(); 
			$image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ));
			$anchor = get_field('anchor');
			?>

				<div class="init-slide" style="margin:0 10px;">
					<a href="<?php echo get_permalink(20) . '#' . $anchor ; ?>"><img src="<?php echo $image; ?>"></a>
					<div class="init-slide-body">
						<a href="<?php echo get_permalink(20) . '#' . $anchor ; ?>"><h2 class="orange"><?php the_title(); ?></h2></a>
						<p><?php the_content(); ?>
						<!-- this will be adjusted on deployment -->
						<a href="<?php echo get_permalink(20) . '#' . $anchor ; ?>" class="read-more">
							Learn More <span class="carrot">&raquo;</span>
						</a>
						</p>
					</div>
				</div>
			<?php 
			endwhile?>
		</div>
	<!-- </div> -->
</div>


<style>
.slick-slide {
	margin: 0 40px !important;
	width: 900px;
	background-color: #ffffff;
    padding-bottom: 30px;
	opacity: .4;
	-moz-transition: all 0.6s ease-in-out;
	-webkit-transition: all 0.6s ease-in-out;
	-o-transition: all 0.6s ease-in-out;
}
.slick-active{
	opacity: 1;
	-moz-transition: all 0.6s ease-in-out;
	-webkit-transition: all 0.6s ease-in-out;
	-o-transition: all 0.6s ease-in-out;
}
.init-slide-body {
    width: 70%;
    margin-left: auto;
    margin-right: auto;
}
.slick-arrow {
    display: inline;
    position: absolute;
    top: 26%;
    cursor: pointer;
    z-index: 99;
    width: 50px;
    height: 50px;
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
}

.slick-prev {
	right:auto;
	left:50%;
	margin-left: -510px;
	background-image: url("<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_blue.svg");
}
.slick-next {
	right:50%;
	margin-right: -510px;
	background-image: url("<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_blue.svg");
	left:auto;
}
.slick-slide img {
    width: 100%;
}

.sidebar-vid {
	padding: 5% 6% 6%
}

@media screen and (max-width:1030px) {
	.slick-prev {
		right:auto;
		left:50%;
		margin-left: -375px;
		background-image: url("<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_white.svg");
	}
	.slick-next {
		right:50%;
		margin-right: -375px;
		left:auto;
		background-image: url("<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg");
	}
	.slick-arrow {
		top: 26%;
	}
}

@media screen and (max-width: 680px) {
	#mobile-init-slider .init-slide img {
	    width: 150% !important;
	    max-width: 150% !important;
	    margin-left: -25%;
	    margin-top: 30px;
	}
	#mobile-init-slider h2 {
		font-size: 28px;
	}
	.init-slide-body {
	    width: 100%;
	    text-align: left;
	}
	.sidebar-vid {
		padding: 0;
		background-color: transparent !important;
	}
	.sorted-news {
		background-color: transparent !important;
	}
	.sorted-news h3,
	.sorted-news a {
		padding: 0;
	}
}
</style>









<?php /* $home = new WP_Query( 'page_id=18' );
			// The Loop
			while ( $home->have_posts() ) : $home->the_post(); ?>

	<div class="masterplan">
		
		<div class="flex-center half-col left">
			<div class="masterplan-copy">
				<h2><?php echo the_field('masterplan_title', 18); ?></h2>
				<?php echo the_field('masterplan'); ?>
			</div>
		</div>
		
		<div class="half-col left masterplan masterplan-thumb flex-height player" 
			style="background-image:url(<?php echo the_field('masterplan_video_thumbnail'); ?>);
					width:50%; padding:20%; cursor:pointer;"
			onclick="showMasterVideo()">
		</div>

		<div id="masterplan-overlay">
			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon.png" onclick="hideMasterVideo();">
			<iframe width="560" height="315" src="<?php the_field('masterplan_video'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
		</div>

	</div>
	<!-- end masterplan -->
<?php endwhile;*/ ?>
	<div class="clear"></div>

</div>
</div>
<!-- end #content -->





<script>
$('#home-slider').unslider({
		// arrows: {
			//  Unslider default behaviour
			// prev: '<a class="unslider-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_white.svg"></a>',
			// next: '<a class="unslider-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg"></a>'
		// },
		arrows: false,
		nav: false
	});
$(document).ready(function() {

	$('#init-slider').slick({
	  centerMode: true,
	  centerPadding: '4%',
	  slidesToShow: 1,
	  focusOnSelect: false,
	  variableWidth: true,
	  prevArrow: '<span class="slick-prev"></span>',
	  nextArrow: '<span class="slick-next"></span>',
	});

	// $('.masterplan-thumb').height($('.masterplan-thumb').width());
	// $('.masterplan-copy').height($('.masterplan-copy').width());

	
	// wide = $(window).width();
	// wide = wide*0.75;

	$slider = $('#initiatives-slider').bxSlider({
		pager : false,
		speed : 700,
		controls : true,
		responsive : true,
		nextSelector : '.bxSlider-arrow.next',
		prevSelector : '.bxSlider-arrow.prev',
		prevText: '<img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_blue.svg">',
		nextText: '<img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_blue.svg">',
		minSlides : 1,
		maxSlides : 1,
		moveSlides : 1,
		slideWidth :  $(window).width()*0.75 ,
		slideMargin: 30,
		startSlide: -1,
		onSliderLoad: function(currentIndex){
		    console.log(currentIndex);
		    active = currentIndex - 1;
		    $('.initiative-slide').eq(active).addClass('activeSlide');
		},
		onSlideAfter: function($slideElement, oldIndex, newIndex){
			console.log($slideElement); 
			console.log(oldIndex); 
			console.log(newIndex);
			active = newIndex + 1;
			$('.initiative-slide').removeClass('activeSlide');
			$('.initiative-slide').eq(active).addClass('activeSlide');
		}
	});
});



$(window).on('resize', function(){
	// $('.masterplan-thumb').height($('.masterplan-copy').outerHeight());
});


</script>

<?php get_footer(); ?>
