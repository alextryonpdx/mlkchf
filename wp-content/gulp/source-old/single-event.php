<?php /* Template Name: STRIPPED */ get_header(); ?>



	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<div id="content">
	<main role="main">

		<div class="centered">


			<!-- <div class="left-col"> -->

				<!-- section -->
				<section>

					

				<!-- 	<?php $parent = $post->post_parent;
						$crumbname = get_the_title($parent);
						$crumblink = get_the_permalink($parent);
						echo '<a href=' . $crumblink . '><p>Back to '. $crumbname . '</p></a>'; ?> -->

					<a class="read-more" href="<?php echo get_permalink(16); ?>"><span class="carrot">&laquo;</span> Back to Events</a>

					<!-- <h2><?php the_title(); ?></h2>

					<div class="single-sidebar">
						<hr>

								<?php 
								$tags = the_tags();
								if ($tags){ ?>
									<p class="tag-line"> Tags:
								<?php foreach($tags as $tag):
								?>
								<a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a>
								<?php endforeach; ?>
								</p> <?php } ?>
						<hr>

						<h4> Share</h4>

						<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?status=<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
						</a> 
						<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()); ?>&t=<?php echo urlencode(the_title()); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
						</a>

					</div>



 					<div class="single-col">
 						<?php the_content(); ?>
 					</div> -->




 					<!-- USED CODE FROM SINGLE.PHP -->

					<h1 class="green"><?php the_title(); ?></h1>

					<div class="single-sidebar">
						<hr>

								<?php 
								$tags = the_tags();
								if ($tags){ ?>
									<p class="tag-line"> Tags:
								<?php foreach($tags as $tag):
								?>
								<a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a>
								<?php endforeach; ?>
								</p> <?php } ?>
						<hr>

						<h4>Share</h4>

						<?php
						if(get_field('facebook-text')){
							$fb = get_field('facebook-text');
						} else {
							$fb = get_the_title();
						};
						if(get_field('twitter-text')){
							$tweet = get_field('twitter-text');
						} else {
							$tweet = get_the_title();
						};
						?>

						<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?status=<?php echo wp_get_shortlink(); echo urlencode(html_entity_decode($tweet, ENT_COMPAT, 'UTF-8')); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
						</a> 
						<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()); ?>&t=<?php echo urlencode($fb); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
						</a>

					</div>


<!-- IF content blocks...
IF subheading, subheading in h3?
 CONTENT  (img = 100%width, blockquote = over 100% and moved left and big and green-->
 					<div class="single-col">
 						<?php if (get_field('secondary-heading')){ 
 							 ?>
							<h4><?php echo the_field('secondary-heading') ?></h4>

						<?php } ?>

 						<?php // the_content(); ?>
 					</div>

 					<?php if (have_rows('content-block')): 
 						while (have_rows('content-block')): the_row(); 
 							$subheading = '';
 							$content = '';
 							$subheading = get_sub_field('sub-heading');
 							$content = get_sub_field('content');
 						?>

 						<div class="single-col">

 							<?php if ( $subheading !== '' && $subheading !== 'undefined') { 
 								 ?>

 								<h4><?php echo $subheading; ?></h4> <?php
 							};
 							if ( $content !== '' && $content !== 'undefined') { 
 								 ?>

 								<?php echo $content; 
 							};
 							?>

						</div>

						<?php endwhile;
						endif; ?>

 				</section>

 			<!-- </div> -->

 		</div>

 		<div class="album green-back">
 			<a id="pic-prev-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow.png"></a>
			<a id="pic-next-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow.png"></a>

	 		<div class="centered">

	 			<h4 class="bold gallery-head">Photo Gallery</h4>
				
			 		<div id="album" style="overflow:hidden">
						<?php if (have_rows('photos')):
							$count = 0;
						?>

						<div id="img-thumb-gallery"  data-featherlight-filter=".event-img-thumb">
		 		     		<div class="page" style="display:block; float:left">
		 					<!-- build photo album w/pagination -->
		 						<?php while (have_rows('photos')): the_row(); 
		 							$caption = '';
		 							$caption = get_sub_field('caption');
		 							if(!$caption){
		 								$caption = get_field('caption');
		 							}
		 							$count++;
		 							$image = get_sub_field('photo');
		 							
		 						// if counter%12 == 0, close the '.page' div and open a new one!!!!!!!!!!!
		 						if( ($count-1)%12 == 0 && $count !== 1 ) {

		 							echo '</div><div class="page">';
		 							echo'<script>console.log("cut")</script>';
		 						};?>
			 						<!-- make img thumbnails w/ open slide-show onclick -->
			 						<div class="event-img-thumb" data-featherlight="#full<?php echo $count; ?>" id="thumb<?php echo $count; ?>">
			 							<img class="thumb" src="<?php echo $image['sizes']['medium']?>">			
			 						</div>

			 						<div class="event-img-full" id="full<?php echo $count; ?>">
			 							<img src="<?php echo $image['url']; ?>">
			 							<div class="event-caption-box">
			 								<p class="album-index"><?php echo $count ?>/<span class="total-pics"></span></p>
			 								<p class="img-caption"><?php echo $caption; ?></p>
			 								<p class="event-name"><?php echo get_the_title(); ?></p>
			 							</div>
			 						</div>
								<?php  endwhile;?>
							</div>
						</div>
						<?php	endif; ?>
					</div>
				

			</div>

		</div>
		<!-- end photo album -->


	<?php if (have_rows('videos')):
		$videoCount = 0;
				?>
		<div class="centered">
			<a class="read-more non-mobile all-vids-event" href="<?php echo get_permalink(824); ?>">All Videos <span class="carrot">&raquo;</span></a>
		</div>
		<div class="green-back full vids non-mobile">
			<a id="vid-next-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow.png"></a>
		 	<a id="vid-prev-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow.png"></a>

				<div class="centered goverflow">
					<h4 class="bold gallery-head">Video Gallery</h4>
					<div id="vid-thumb-gallery"  >
	 					
	 					<div class="page">
	 			
						<?php while (have_rows('videos')): the_row(); 
								

			 						if( $videoCount%3 == 0 && $videoCount !== 0 ) {

			 							echo '</div><div class="page">';
			 							echo'<script>console.log("cut")</script>';
			 						} $videoCount++ ;
			 						?>

	 						<!-- embed videos -->
	 						<div class="event-vid" onclick="showVideo(<?php echo $videoCount; ?>)">
	 							<h3><?php echo get_sub_field('title'); ?></h3>
								<img class="video-thumb" src="<?php echo the_sub_field('thumbnail'); ?>">					
							</div>

						<?php endwhile;?>

					</div>

				</div>
				

			<?php	endif; ?>
		</div>
	</div>

	<?php if (have_rows('videos')): ?>
	<a class="mobile-all-vids read-more mobile-only" href="<?php echo get_permalink(824); ?>">All Videos <span class="carrot">&raquo;</span></a>
	<div class="green-back full vids ">
		<div class="centered goverflow">
			<h4 class="bold gallery-head mobile-only">Video Gallery</h4>
		<?php
		$videoCount = 0;
		while (have_rows('videos')): the_row(); 
			$videoCount++;
				?>
			
					<div class="event-vid mobile-only" onclick="showVideo(<?php echo $videoCount; ?>)">
							<h3><?php echo get_sub_field('title'); ?></h3>
						<img class="video-thumb" src="<?php echo the_sub_field('thumbnail'); ?>">					
					</div>
				
			
			<div id="<?php echo $videoCount; ?>-overlay" class="video-overlay">
				<img src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon.png" 
					onclick="hideVideo(<?php echo $videoCount; ?>);">
				<iframe width="560" height="315" 
				src="<?php the_sub_field('video'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
				frameborder="0" allowfullscreen></iframe>
				<h3><?php echo get_sub_field('title'); ?></h3>
			</div>	 
			
	<?php endwhile; ?>
		</div>
	</div>
		<?php endif; ?>

	</main>


</div>

<?php endwhile;
	endif; ?>

<div class="clear" class="margin: 5% 0;"></div>

<!-- end #content -->
<?php get_footer(); ?>



<style>
#content {
	margin-bottom: 0;
}
.green-back.full.vids {
    position: relative;
    display: block;
}
a#pic-prev-arrow,
a#vid-prev-arrow {
    position: absolute;
    left: 4%;
    top: 0;
    width: 40px;
}

a#pic-next-arrow,
a#vid-next-arrow {
    position: absolute;
    right: 4%;
    top: 0;
    width: 40px;
}
.green-back.full.vids {
    position: relative;
    display: block;
    margin-bottom: 0;
    padding-bottom: 40px;
}

.slick-active {
  display: -webkit-box !important;
  display: -webkit-flex !important;
  display: -ms-flexbox !important;
  display: flex !important;
  -webkit-flex-wrap: wrap;
      -ms-flex-wrap: wrap;
          flex-wrap: wrap;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}

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
$('div.event-img-thumb').featherlightGallery({
    previousIcon: '<img src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow.png">',
    nextIcon: '<img src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow.png">',
    galleryFadeIn: 300,
    openSpeed: 300,
    closeIcon:'<img src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon.png">',
    afterContent: function(){
    	total = <?php echo $count; ?>;
    	$('.total-pics').html(total);
    }
});

$('#img-thumb-gallery').slick({
	infinite: true,
	adaptiveHeight: true,
	focusOnSelect: false,
    prevArrow: '#pic-prev-arrow',
    nextArrow: '#pic-next-arrow'
});

$('#vid-thumb-gallery').slick({
	infinite: true,
	adaptiveHeight: true,
	focusOnSelect: false,
    prevArrow: '#vid-prev-arrow',
    nextArrow: '#vid-next-arrow'
});

function classImgs(){
	$('.event-img-full img').each(function(i){
		if(this.height > this.width ){
			console.log('portrait');
		}

	})
}
</script>


