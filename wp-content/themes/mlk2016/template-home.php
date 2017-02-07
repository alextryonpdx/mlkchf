<?php /* Template Name: HOME */ get_header(); ?>

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

<?php	if (have_rows('slides') ): 
	$slides = get_field('slides');
	// var_dump($slides);
	$slideCount = intval(count( $slides ));
	// echo '<br><br>count: ' . $slideCount . '<br><br>';
	$index = rand(0, ($slideCount-1));
	// var_dump($index);
	$banner = $slides[$index];
	// var_dump( $photos );
	// var_dump($banner);
?>
	<div id="home-slider">
		<?php // while (have_rows('slides')): the_row();
			$image = '';
			$text = '';
			$textMobile = '';
			$link = '';
			$foreground_image ='';
			$mobile = '';
			$class = '';

			$image = $banner['image'];
			$mobile = $banner['mobile_image'];
			$foreground_image = $banner['foreground_image'];
			$foreground_image_mobile = $banner['foreground_image_mobile'];
			$text = $banner['text'];
			$textMobile = $banner['text_mobile'];
			$link = $banner['link-to'];
			$class = $banner['position'];
			$classMobile = $banner['text_position_mobile'];
			$arrowClass = $banner['arrow_position'];
			$arrowClassMobile = $banner['arrow_position_mobile'];
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
		<?php // endwhile; ?>
	</div>
<?php endif; ?>


<div id="home-trio">
	<img src="<?php the_field('three_up_header_image') ?>">
	<div class="trio-block">
		<div id="access" class="trio-slice">
			<h1>ACCESS</h1>
			<p><?php the_field('access_body') ?></p>
		</div>
		<div id="equity" class="trio-slice">
			<h1>EQUITY</h1>
			<p><?php the_field('equity_body') ?></p>
		</div>
		<div id="life" class="trio-slice">
			<h1>LIFE</h1>
			<p><?php the_field('life_body') ?></p>
		</div>
	</div>
</div>

<style>
#home-trio {
    text-align: center;
    display: block;
    width: 100%;
    max-width: 1240px;
    margin: 0 auto;
    position: relative;
}
#home-trio>img {
    width: 70%;
}
.trio-block {
    width: 100%;
    display: inline-block;
    clear: both;
    padding-bottom: 100px;
    margin-left: auto;
    margin-right: auto;
    max-width: 1240px;
    padding: 0 10% 80px;
}
.trio-slice {
    width: 33.333%;
    float: left;
    text-align: center;
}
.trio-slice h1 {
    /*font-weight: bold;*/
    letter-spacing: -2px;
    margin-bottom: 0;
    font-size: 56px;
}
#access h1 {
    color: #f47a36;
}
#equity h1 {
    color: #10afc9;
}
#life h1 {
    color: #7fb241;
}
.trio-slice p {
    padding: 0 11%;
    display: inline-block;
    width: 100%;
    max-width: 330px;
    font-size: 18px;
    /*font-weight: bold;*/
    margin-top: 5px;
    line-height: 1.5em;
}

#photo-grid img {
    width: 50%;
    float: left;
    display: inline-block;
    margin: 0 0;
    padding: 0 0;
}
#photo-grid {
    width: 100%;
    display: block;
    float: left;
}
@media screen and (max-width: 768px){
	#home-trio>img {
	    width: 90%;
	}
	.trio-slice {
	    width: 100%;
	}
	.trio-block {
		padding-bottom: 40px;
	}
	#photo-grid img {
		width: 100%;
	}
}
</style>
<?php 
$pairs = get_field('grid_photo_pairs');
// var_dump($pairs);
// $count = intval(count( $pairs ));
// echo 'count: ' . $count;
// $index = rand(0, ($count-1));
// var_dump($index);
$photos = $pairs[$index];
// var_dump( $photos );
?>
<div id="photo-grid">
	<img src="<?php echo $photos['photo_a'] ?>">
	<img class="non-mobile" src="<?php echo $photos['photo_b'] ?>">
	<img class="mobile-only" src="<?php echo $photos['photo_b_mobile'] ?>">
</div>	



<!-- 
	<?php $head_bg = get_field('background_image', 18); ?>

	<div id="mission" style="background-image:url('<? echo $head_bg; ?>')">

			<a class="page-anchor" id="home-content"></a>

			<h2><?php the_field('header_text', 18); ?></h2>

			<h3><?php the_field('header_sub_text', 18); ?></h3>

			<!-- <a href="http://eepurl.com/NWoNj" target="_blank" id="mission-updated" class="stay-updated">Stay Updated</a> -->

	<!-- </div> -->
 


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

					<h4 style="margin: 15px 0  -15px !important; width:100%; float:left;"><span class="bold event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php the_field('time', $up->ID); ?></h4>
					
					<?php $link =  get_field('link', $up->ID);
							if( $link ){ ?>
								<a href="<?php echo $link ?>"><h3 style="margin-bottom: 0 !important; width:100%; float:left;"><?php echo get_the_title($up->ID); ?></h3></a>
							<?php } else {?>
								<h3 style="margin-bottom: 0 !important; width:100%; float:left;"><?php echo get_the_title($up->ID); ?></h3>
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
					
					<?php $link =  get_field('link', $up->ID);
							if( $link ){ ?>
								<a href="<?php echo $link ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $up->ID )) ?>"></a>

								<a href="<?php echo $link ?>"><h4 style="margin: 15px 0 -15px !important; float:left; width:100%;"><span class="bold event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php the_field('time', $up->ID); ?></h4></a>
					
								<a href="<?php echo $link ?>"><h3 style="margin-bottom: 0 !important; float:left; width:100%;"><?php echo get_the_title($up->ID); ?></h3></a>
							<?php } else {?>

								<a href="<?php echo get_the_permalink($up->ID); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $up->ID )) ?>"></a>

								<a href="<?php echo get_the_permalink($up->ID); ?>"><h4 style="margin: 15px 0 -15px !important; float:left; width:100%;"><span class="bold event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php the_field('time', $up->ID); ?></h4></a>
								<a href="<?php echo get_the_permalink($up->ID); ?>"><h3 style="margin-bottom: 0 !important; float:left; width:100%;"><?php echo get_the_title($up->ID); ?></h3></a>
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
									src="<?php the_sub_field('video_code'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
									frameborder="0" allowfullscreen></iframe>
									<!-- <h3><?php echo get_sub_field('title'); ?></h3> -->
									<?php } ?>
								</div>
								<?php 
								if( get_sub_field('override') ){ ?>
		 							<a onclick="showVideoEmbed(<?php echo $videoCount; ?>)"><h3><?php echo get_sub_field('title'); ?></h3></a>
								<?php 
								} else {?>
		 							<a onclick="showVideo(<?php echo $videoCount; ?>)"><h3><?php echo get_sub_field('title'); ?></h3></a>
								<?php } ?>
	 							
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


<?php  $home = new WP_Query( 'page_id=18' );
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
			<a class="vidcloseIcon" onclick="hideMasterVideo();">X</a>
			
			<iframe width="560" height="315" src="<?php the_field('masterplan_video'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
		</div>

	</div>
	<!-- end masterplan -->
<?php endwhile; ?>
	<div class="clear"></div>

</div>
</div>
<!-- end #content -->


<?php get_footer(); ?>
