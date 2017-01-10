<?php /* Template Name: ABOUT  */ get_header(); ?>

<style>
#content {
	margin: 180px 0 0px;
}
.member-bio>img {
    width: 100%;
}
@media screen and (max-width: 1300px) {
	.about-hospital .left-half, 
	#about-foundation .left-half,
	.about-hospital .right-half, 
	#about-foundation .right-half {
		width: 100%;
	}
	.about-hospital .left-half img, 
	#about-foundation .left-half img,
	.about-hospital .right-half img, 
	#about-foundation .right-half img {
		width: 100%;
	}
}
@media screen and (max-width: 980px) {
	#content {
	    margin-top:90px;
	}
}

@media screen and (max-width: 680px) {
	#content {
		margin-top: 50px;
	}
}
</style>

<div id="content" style="margin-bottom:30px;">


	<?php 
	$home = new WP_Query( 'page_id=55' );
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
				 								echo '<h3 style="padding:0 5%;">' . $textMobile . '</h3>';
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

				<?php endif; 
				endwhile;?>
<style>
#home-slider .slide {
    height: 92vh;
    /*background-position: center;*/

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
</script>

	<main role="main">

		<?php $head_bg = get_field('background_image', 55); ?>

		<!-- <div id="about-header" style="background-image:url('<? echo $head_bg; ?>')">

				<h3 class="non-mobile"><?php the_field('header_text', 55); ?></h3>
				<h3 class="mobile-only"><?php the_field('header_text_mobile', 55); ?></h3>

				<a class="smoothScroll bounce animated" href="#about-the-foundation">
					<img src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
				</a>

		</div>
 -->
		
			<?php
			$the_foundation = new WP_Query( 'page_id=12' );
			$template_path = get_bloginfo( 'template_url' );


			// The Loop
			while ( $the_foundation->have_posts() ) : $the_foundation->the_post();
				 
				// $contents = get_field('content-block'); 
				// $header = $contents[0];
				// $community = $contents[1];
				// $image = $contents[2];

				// $urgent = $contents[3]; 
				?>




		<!-- section -->
		<section>
			
			<!-- <div id="foundation-header" class="green-back text-center">

				<div class="centered">

					
					<h3><?php // echo $header['content']; ?></h3>

				</div>

			</div> -->
			
				
			<div id="about-foundation">

				<a class="page-anchor"  id="about-the-foundation"></a>

				<div class="row">
					<div class="left-half">
						<!-- php the title -->
						<h5><?php echo get_field('top_row_small_heading'); ?></h5>

						<div class="content-block">
							<h2 style="line-height: 1em;"><?php echo get_field('top_row_large_heading'); ?></h2>

							<?php echo get_field('top_row_text'); ?>

						</div>
					</div>

					<div class="right-half infographic-container">
						<img class="infographic" id="ladies" src="<?php echo get_field('half-wide_image'); ?>">
					</div>

				<!-- 	<?php 
					$citation = get_field('citation'); ?> -->
				</div>
				<div class="row infographic-container">
					<img class="infographic large" src="<?php the_field('top_row_image'); ?>">
				</div>
			</div>

				<!-- 	<div class="stats">

						<?php 
						// if ( get_field('data_title') ){
						// 	echo '<h2>'. get_field('data_title') .'</h2>';
						// }
						
						// echo '<img src='. get_field('data_image') .'>';
						?>
						
						

					</div> -->
					<!-- end #stats -->
					

				<div class="content-block" id="urgent-need">

					<a class="page-anchor" id="our-community" style="padding-top: 230px; margin-top: -230px;"></a>

					<h5><?php echo get_field('second_row_small_heading'); ?></h5>

					<h2><?php echo get_field('second_row_large_heading'); ?></h2>

					<?php echo get_field('second_row_text'); ?>

				</div>

				<!-- <div id="urgent-needs-data" class="stats">
					<?php 
					// echo '<h2>'. get_field('uc_data_title') .'</h2>';
					// echo '<img src='. get_field('uc_data_image') .'>';
					?>
				</div> -->

			<?php endwhile; 
				wp_reset_postdata(); 
				?>



<?php
			$the_hospital = new WP_Query( 'page_id=10' );
			$template_path = get_bloginfo( 'template_url' );


			// The Loop
			while ( $the_hospital->have_posts() ) : $the_hospital->the_post();
				$logo = get_field('logo');
				$contents = get_field('content-block'); 
				
				$mission = $contents[0]; 
				$vision = $contents[1]; ?>

				


		</section>
		<!-- /section -->
<a class="page-anchor"  id="about-the-hospital"></a>
		<section>


			<div class="">

				<div class="about-hospital">

					<div class="row infographic-container">
						<img class="infographic large" src="<?php the_field('infographic', 10); ?>">
					</div>

					<div class="content-block" id="about-the-hospital">

					

							<h5><?php the_title(); ?></h5>

							<h2><?php the_field('header_title', 10); ?></h2>

							<p><?php the_field('header_copy', 10); ?></p>

			

						

					</div>

					<div class="row infographic-container">

						<img class="infographic" src="<?php the_field('header_image', 10); ?>">

					</div>
					
					<!-- <div id="hospital-data" class="stats">
						<?php 
						// echo '<h2>'. get_field('data_title') .'</h2>';
						// echo '<img src='. get_field('data_image') .'>';
						?>
					</div> -->

					<?php $bg = get_field('background_image', 10); ?>

					<div class="non-mobile" id="mission-vision" style="background-image:url('<? echo $bg; ?>')">

						<div class="text-center">

							<img id="mission-logo" alt="MLK CHF logo" src="<?php echo $logo; ?>">

							<div class="mission-bit">
								<h2><?php echo sanitize_text_field($mission['sub-heading']);?></h2>

								<h3><?php echo sanitize_text_field($mission['content']);?></h3>
							</div>

							<div class="mission-bit">
								<h2><?php echo sanitize_text_field($vision['sub-heading']);?></h2>

								<h3><?php echo sanitize_text_field($vision['content']);?></h3>
							</div>

						</div>

					</div>

					<?php $bgm = get_field('background_image_mobile', 10); ?>

					<div class="mobile-only" id="mission-vision" style="background-image:url('<? echo $bgm; ?>')">

						<div class="text-center">

							<img id="mission-logo" alt="MLK CHF logo" src="<?php echo $logo; ?>">

							<div class="mission-bit">
								<h2><?php echo sanitize_text_field($mission['sub-heading']);?></h2>

								<h3><?php echo sanitize_text_field($mission['content']);?></h3>
							</div>

							<div class="mission-bit">
								<h2><?php echo sanitize_text_field($vision['sub-heading']);?></h2>

								<h3><?php echo sanitize_text_field($vision['content']);?></h3>
							</div>

						</div>

					</div>


				</div>

			</div>
			<?php if (have_rows('photos')):
							$count = 0;
						?>

			<div class="album green-back">
 			<a id="pic-prev-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow-initiative.png"></a>
			<a id="pic-next-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow-initiative.png"></a>

	 		<div class="centered goverflow">

	 			<h4 class="bold gallery-head">Photo Gallery</h4>
				
			 		<div id="album" style="overflow:hidden">
						

						<div id="img-thumb-gallery" data-featherlight-gallery data-featherlight-filter=".event-img-thumb">
		 		     		<div class="page" style="display:block; float:left">
		 					<!-- build photo album w/pagination -->
		 						<?php while (have_rows('photos')): the_row(); 
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
			 								<p class="img-caption"><?php echo get_sub_field('caption'); ?></p>
			 								
			 							</div>
			 						</div>
								<?php  endwhile;?>
							</div>
						</div>
						
					</div>
				

			</div>

		</div>
		<?php	endif; ?>
		<!-- end photo album -->

		<?php endwhile; 
				wp_reset_postdata(); 
				?>

	</section>
		<!-- /section -->

<a class="page-anchor" id="about-our-team"></a>
		



		<?php
			$the_team = new WP_Query( 'page_id=14' );
			$template_path = get_bloginfo( 'template_url' );


			// The Loop
			while ( $the_team->have_posts() ) : $the_team->the_post();
				 
				$team_spotlight = get_field('team-spotlight');
				$team_text = get_field('team-spotlight-text');
				$board_spotlight = get_field('board-spotlight');
				$board_text = get_field('board-spotlight-text');
				?>


		<!-- section -->
		<section>

					


			<div class="centered">


				<div id="our-team">


					<h2>Our Team</h2>

					<?php $post = $board_spotlight[0]; ?>
					<?php setup_postdata( $post ); 
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'single-post-thumbnail');
					$img = $img[0]; ?>

					<div class="half-col left">

						<h4 class="bold"><?php echo $board_text; ?></h4>

						<div class="news-box">

							<?php if ($img) { ?>

							<div class="img-sizer">

								<img src="<?php echo $img; ?>">

							</div>
							
							<div class="news-box-copy">

								<a href="<?php the_permalink(); ?>"><h3 class="orange"><?php the_title(); ?></h3></a>

								<?php the_content(); ?>

								<a href="<?php the_permalink(); ?>"><span class="read-more">Read More <span class="carrot">&raquo;</span></span></a>
							</div>

							<? } else { ?>

								<a href="<?php the_permalink(); ?>"><h3 class="orange"><?php the_title(); ?></h3></a>

								<?php the_content(); ?>

								<a href="<?php the_permalink(); ?>"><span class="read-more">Read More <span class="carrot">&raquo;</span></span></a>
							
							<?php } 
							wp_reset_postdata(); ?>

						</div>

					</div>

					

					<?php wp_reset_postdata(); ?>


					<?php $post = $team_spotlight[0]; ?>
					<?php setup_postdata( $post ); 
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'single-post-thumbnail');
					$img = $img[0]; ?>

					<div class="half-col right">

						<h4 class="bold"><?php echo $team_text; ?></h4>

						<div class="news-box">

							<?php if ($img) { ?>

							<div class="img-sizer">

								<img src="<?php echo $img; ?>">

							</div>
							
							<div class="news-box-copy">

								<a href="<?php the_permalink(); ?>"><h3 class="orange"><?php the_title(); ?></h3></a>

								<?php the_content(); ?>

								<a href="<?php the_permalink(); ?>"><span class="read-more">Read More <span class="carrot">&raquo;</span></span></a>
							</div>

							<? } else { ?>

								<a href="<?php the_permalink(); ?>"><h3 class="orange"><?php the_title(); ?></h3></a>

								<?php the_content(); ?>

								<a href="<?php the_permalink(); ?>"><span class="read-more">Read More <span class="carrot">&raquo;</span></span></a>
							
							<?php } ?>

						</div>

					</div>
					<?php wp_reset_postdata(); ?>

				</div>
				<!-- end our team (spotlights) -->

			<?php endwhile; ?>
<style>

</style>

	<div class="clear"></div>



<div id="team-grid">

<!-- TEAM MEMBERS -->
<?php $biocount = 0;
		$counter = 1;
		$boxcounter=1;
		?>

	<?php
			$the_team = new WP_Query( array('post_type'=>'memberbio',
											'orderby' => 'menu_order',
											'order'   => 'DESC',
											'posts_per_page' => '-1' ) ); 
			
			
				// $team = get_field('team');
				if ($the_team->have_posts() ): ?>

	<div class="team-block" id="board-of-directors">

		<h2>Board of Directors</h2>

				<?php

 
					
 						while ( $the_team->have_posts() ) : $the_team->the_post(); 

 								// reset all variables
 							$photo = '';
 							$name = '';
 							$title= '';
 							$team_type = '';
 							$bio = '';
 							$twitter = '';
 							$facebook = '';
 							$linkedin = '';
 							$spotlight = '';


 							$photo = get_field('photo');
 							$name = get_field('name');
 							$title= get_field('title');
 							$credits = get_field('credits');
 							$team_type = get_field('team_type');
 							$bio = get_field('bio');
 							$twitter = get_field('twitter_text');
 							$facebook = get_the_permalink();
 							$linkedin = get_field('linkedin_link');
 							$spotlight = get_field('spotlight');
 							$link_text =  get_field('spotlight_link_text');
 							


							if ($team_type == 'board') { ?>



									

									<div class="member" id="member<?php echo $counter; ?>">

										<img onclick="hideBio();" class="bio-arrow" alt="V" src="<?php echo get_template_directory_uri(); ?>/img/icons/gdown-arrow.png">

										<div class="blockout <?php echo 'blockout'.$boxcounter; ?>"></div>

										<?php if( $boxcounter !== 4 ){ 
												echo '<div class="member-middle"></div>';
												$boxcounter++;
												} else{
													$boxcounter = 1;
												}; ?>

										<div class="headshot">

											<div onclick="bioShow(<?php echo $counter . ',' . $biocount; ?>)" class="member-photo" id="member-photo<?php echo $counter; ?>" data-biobox="<?php echo $biocount ?>">

												<img class="member-face" src="<?php echo $photo; ?>">

												<img class="plus" id="bio-open<?php echo $counter; ?>" alt="+" src="<?php echo get_template_directory_uri(); ?>/img/icons/gplus.png">
												<img class="minus" id="bio-collapse<?php echo $counter; ?>" alt="-" src="<?php echo get_template_directory_uri(); ?>/img/icons/gminus.png">

											</div>

											<h3 onclick="bioShow(<?php echo $counter . ',' . $biocount; ?>)" class="member-name"><?php echo $name ?></h3>

											<!-- if has a title -->
											<?php if( $title !== '' || $title !== 'undefined') { ?>

												<h4 class="member-title"><?php echo $title ?></h4>

											<?php } ?>

											<p class="member-info"><?php echo $credits ?></p>

											
										</div>


										<div class="member-bio" id="bio<?php echo $counter; ?>">

											<div class="bio-content">
												<?php echo $bio; ?>
											</div>
									

									
<?php
	
	if( have_rows('spotlights') ):

	    while ( have_rows('spotlights') ) : the_row();
		$spotlight = get_sub_field('article');
		$link = $spotlight[0];
		  
		 ?>
			
			<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

	<?php endwhile; endif;?>


											<div class="member-social">

													<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(html_entity_decode($twitter, ENT_COMPAT, 'UTF-8'));; echo ' http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%23board-of-directors'; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/gtwitter.png" alt="twitter">
													</a>
												

												
													<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $facebook ; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/gfacebook.png" alt="facebook">
													</a>

											</div>

											<div class="bio-bar">
												<a id="bio-collapse<?php echo $counter; ?>" onclick="hideBio();">
													<p>Collapse</p>
													<img class="x-icon" alt="| X |" src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon-solid.png">
												</a>
											</div>

										</div>

									
									

								</div>

									<?php 
										// create a biobox container every fourth person.
										if( $counter%4 == 0){
											echo "<div class='biobox' id='biobox" . $biocount . "'></div>";
											$biocount++;
										};
										$counter++;
										?>

						<?php 	
						

											}
								
						endwhile;
						// create a biobox container at the end of the list of people. if the list ends in %4=0, there is a harmless div
						echo "<div class='team-bottom'></div><div class='biobox' id='biobox" . $biocount . "'></div>";

					endif;
				// endwhile;
				$biocount++
				?>




			</div>


<!-- TEAM MEMBERS -->
<?php 
		$counter = 101;
		$boxcounter=101;
		?>

	<?php
			$the_team = new WP_Query( array('post_type'=>'memberbio',
											'orderby' => 'menu_order',
											'order'   => 'DESC',
											'posts_per_page' => '-1' ) );
			
			
				// $team = get_field('team');
				if ($the_team->have_posts() ): ?>
 




			<div class="team-block" id="staff">

				<h2>Staff</h2>



				<?php

 
					
 							while ( $the_team->have_posts() ) : $the_team->the_post();

 								// reset all variables
 							$photo = '';
 							$name = '';
 							$title= '';
 							$team_type = '';
 							$bio = '';
 							$twitter = '';
 							$facebook = '';
 							$linkedin = '';
 							$spotlight = '';


 							$photo = get_field('photo');
 							$name = get_field('name');
 							$title= get_field('title');
 							$credits = get_field('credits');
 							$team_type = get_field('team_type');
 							$bio = get_field('bio');
 							$twitter = get_field('twitter_text');
 							$facebook = get_the_permalink();
 							$linkedin = get_field('linkedin_link');
 							$spotlight = get_field('spotlight');
 							$link_text =  get_field('spotlight_link_text');
 							


							if ($team_type == 'staff') { ?>



									

									<div class="member" id="member<?php echo $counter; ?>">

										<img onclick="hideBio();" class="bio-arrow" alt="V" src="<?php echo get_template_directory_uri(); ?>/img/icons/gdown-arrow.png">

										<div class="blockout <?php echo 'blockout'.$boxcounter; ?>"></div>

										<?php if( $boxcounter !== 4 ){ 
												echo '<div class="member-middle"></div>';
												$boxcounter++;
												} else{
													$boxcounter = 1;
												}; ?>

										<div class="headshot">

											<div onclick="bioShow(<?php echo $counter . ',' . $biocount; ?>)" class="member-photo" id="member-photo<?php echo $counter; ?>" data-biobox="<?php echo $biocount ?>">

												<img class="member-face" src="<?php echo $photo; ?>">

												<img class="plus" id="bio-open<?php echo $counter; ?>" alt="+" src="<?php echo get_template_directory_uri(); ?>/img/icons/gplus.png">
												<img class="minus" id="bio-collapse<?php echo $counter; ?>" alt="-" src="<?php echo get_template_directory_uri(); ?>/img/icons/gminus.png">

											</div>

											<h3 onclick="bioShow(<?php echo $counter . ',' . $biocount; ?>)" class="member-name"><?php echo $name ?></h3>

											<!-- if has a title -->
											<?php if( $title !== '' || $title !== 'undefined') { ?>

												<h4 class="member-title"><?php echo $title ?></h4>

											<?php } ?>

											<p class="member-info"><?php echo $credits ?></p>

											
										</div>


										<div class="member-bio" id="bio<?php echo $counter; ?>">

											<div class="bio-content">
												<?php echo $bio; ?>
											</div>
									

									
<?php
	
	if( have_rows('spotlights') ):

	    while ( have_rows('spotlights') ) : the_row();
		$spotlight = get_sub_field('article');
		$link = $spotlight[0];
		  
		 ?>
			
			<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

	<?php endwhile; endif;?>

<!-- 
											<div class="member-social">

													<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $twitter; echo ' http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%23board-of-directors'; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/gtwitter.png" alt="twitter">
													</a>
												

												
													<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $facebook ; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/gfacebook.png" alt="facebook">
													</a>
												

												<!-- if link exists
												<?php if( $linkedin !== '' && $linkedin !== 'undefined') { ?>
													<a href="<?php echo sanitize_text_field( $linkedin ); ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/linkedin.png" alt="linkedin">
													</a>
												<?php } ?> -->

											<!-- </div> -->

											<div class="bio-bar">
												<a id="bio-collapse<?php echo $counter; ?>" onclick="hideBio();">
													<p>Collapse</p>
													<img class="x-icon" alt="| X |" src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon-solid.png">
												</a>
											</div>

										</div>

									
									

								</div>

									<?php 
										// create a biobox container every fourth person.
										if( $counter%4 == 0){
											echo "<div class='biobox' id='biobox" . $biocount . "'></div>";
											$biocount++;
										};
										$counter++;
										?>

						<?php 	
						

											}
								
						endwhile;
						// create a biobox container at the end of the list of people. if the list ends in %4=0, there is a harmless div
						echo "<div class='team-bottom'></div><div class='biobox' id='biobox" . $biocount . "'></div>";

					endif;
				// endwhile;
				$biocount++
				?>



			</div>

</div>

<div id="mobile-team">
<!-- MOBILE TEAM MEMBERS -->


	<?php
			$the_team = new WP_Query( array('post_type'=>'memberbio',
											'orderby' => 'menu_order',
											'order'   => 'DESC',
											'posts_per_page' => '-1' ) );
			// The Loop
			// while ( $the_team->have_posts() ) : $the_team->the_post(); 
			if ($the_team->have_posts() ): ?>

	<div class="team-block" id="board-of-directors">

		<h2>Board of Directors</h2>

				<?php


				// $team = get_field('team');
				
					
 						while ($the_team->have_posts() ) : $the_team->the_post();

 								// reset all variables
 							$photo = '';
 							$name = '';
 							$title= '';
 							$team_type = '';
 							$bio = '';
 							$twitter = '';
 							$facebook = '';
 							$linkedin = '';
 							$spotlight = '';


 							$photo = get_field('photo_mobile');
 							$name = get_field('name');
 							$title= get_field('title');
 							$credits = get_field('credits');
 							$team_type = get_field('team_type');
 							$bio = get_field('bio');
 							$twitter = get_field('twitter_text');
 							$facebook = get_field('facebook_link');
 							$linkedin = get_field('linkedin_link');
 							$spotlight = get_field('spotlight');
 							$link_text =  get_field('spotlight_link_text');
 							


							if ($team_type == 'board') { ?>

								<div class="mobile-member" id="member<?php echo $counter; ?>">

										<!-- <img class="bio-arrow" onclick="hideBio();"  alt="V" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow.png"> -->										

<!-- 										<div class="headshot">

											<div onclick="bioShow(<?php echo $counter . ',' . $biocount; ?>)" class="member-photo" id="member-photo<?php echo $counter; ?>" data-biobox="<?php echo $biocount ?>">

												<img class="member-face" src="<?php echo $photo['url']; ?>">

												<img class="plus" id="bio-open<?php echo $counter; ?>" alt="+" src="<?php echo get_template_directory_uri(); ?>/img/icons/plus.png">
												<img class="minus" id="bio-collapse<?php echo $counter; ?>" alt="-" src="<?php echo get_template_directory_uri(); ?>/img/icons/minus.png">

											</div> -->
										<div onclick="showMobileBio('#bio<?php echo $counter; ?>');">
											<img class="mobile-headshot" src="<?php echo $photo; ?>">
											<h3  class="member-name"><?php echo $name ?></h3>
											
											<!-- if has a title -->
											<?php if( $title !== '' || $title !== 'undefined') { ?>

												<h4 class="member-title"><?php echo $title ?></h4>

											<?php } ?>

											<p class="member-info"><?php echo $credits ?></p>

										</div>
											


										<!-- </div> -->


										<div class="member-bio" id="bio<?php echo $counter; ?>">
											
											
											<div class="bio-content">
												<?php echo $bio; ?>
											</div>


									<!-- if board spotlight tagged with their name -->
<?php
	
	if( have_rows('spotlights') ):

	    while ( have_rows('spotlights') ) : the_row();
		$spotlight = get_sub_field('article');
		$link = $spotlight[0];
		  
		 ?>
			
			<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

	<?php endwhile; endif;?>



											
											<div class="member-social">

													<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(html_entity_decode($twitter, ENT_COMPAT, 'UTF-8')); echo ' http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%23board-of-directors'; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/gtwitter.png" alt="twitter">
													</a>
												

												
													<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $facebook ; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/gfacebook.png" alt="facebook">
													</a>

											</div>

											<div class="bio-bar">
												<a id="bio-collapse<?php echo $counter; ?>" onclick="hideMobileBio('#member<?php echo $counter; ?>');">
													<p>Collapse</p>
													<img class="x-icon" alt="| X |" src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon-solid.png">
												</a>
											</div>

										</div>

									
									

								</div>

								

						<?php 	
						

						$counter++;
							}	
						endwhile;
					endif;
				// endwhile;
				$biocount++
				?>




			</div>





	<?php
			$the_team = new WP_Query( array('post_type'=>'memberbio',
											'orderby' => 'menu_order',
											'order'   => 'DESC',
											'posts_per_page' => '-1') );
			// The Loop
			// while ( $the_team->have_posts() ) : $the_team->the_post(); 
			if ($the_team->have_posts() ): ?>

			<div class="team-block" id="staff">

				<h2>Staff</h2>

				<?php


				// $team = get_field('team');
				// if (have_rows('team') ): 
						
 					while ( $the_team->have_posts() ) : $the_team->the_post(); 

 								// reset all variables
 							$photo = '';
 							$name = '';
 							$title= '';
 							$team_type = '';
 							$bio = '';
 							$twitter = '';
 							$facebook = '';
 							$linkedin = '';
 							$spotlight = '';


 							$photo = get_field('photo');
 							$name = get_field('name');
 							$title= get_field('title');
 							$credits = get_field('credits');
 							$team_type = get_field('team_type');
 							$bio = get_field('bio');
 							$twitter = get_field('twitter_text');
 							$facebook = get_field('facebook_link');
 							$linkedin = get_field('linkedin_link');
 							$spotlight = get_field('spotlight');

 							


							if ($team_type == 'staff') { ?>



									

									<div class="mobile-member" id="member<?php echo $counter; ?>">

				
										<!-- <img class="bio-arrow" onclick="hideBio();"  alt="V" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow.png"> -->										

<!-- 										<div class="headshot">

											<div onclick="bioShow(<?php echo $counter . ',' . $biocount; ?>)" class="member-photo" id="member-photo<?php echo $counter; ?>" data-biobox="<?php echo $biocount ?>">

												<img class="member-face" src="<?php echo $photo['url']; ?>">

												<img class="plus" id="bio-open<?php echo $counter; ?>" alt="+" src="<?php echo get_template_directory_uri(); ?>/img/icons/plus.png">
												<img class="minus" id="bio-collapse<?php echo $counter; ?>" alt="-" src="<?php echo get_template_directory_uri(); ?>/img/icons/minus.png">

											</div> -->
										<div onclick="showMobileBio('#bio<?php echo $counter; ?>');">
											<img class="mobile-headshot" src="<?php echo $photo; ?>">
											<h3  class="member-name"><?php echo $name ?></h3>

											<!-- if has a title -->
											<?php if( $title !== '' || $title !== 'undefined') { ?>

												<h4 class="member-title"><?php echo $title ?></h4>

											<?php } ?>

											<p class="member-info"><?php echo $credits ?></p>

										</div>
											


										<!-- </div> -->


										<div class="member-bio" id="bio<?php echo $counter; ?>">
											
											
											<div class="bio-content">
												<?php echo $bio; ?>
											</div>


									<!-- if board spotlight tagged with their name -->
<?php
	
	if( have_rows('spotlights') ):

	    while ( have_rows('spotlights') ) : the_row();
		$spotlight = get_sub_field('article');
		$link = $spotlight[0];
		  
		 ?>
			
			<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

	<?php endwhile; endif;?>



											
											<div class="member-social">

													<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(html_entity_decode($twitter, ENT_COMPAT, 'UTF-8')); echo ' http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%23board-of-directors'; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/gtwitter.png" alt="twitter">
													</a>
												

												
													<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $facebook ; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/gfacebook.png" alt="facebook">
													</a>

											</div>

											<div class="bio-bar">
												<a id="bio-collapse<?php echo $counter; ?>" onclick="hideMobileBio('#member<?php echo $counter; ?>');">
													<p>Collapse</p>
													<img class="x-icon" alt="| X |" src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon-solid.png">
												</a>
											</div>

										</div>

									
									

								</div>

								

						<?php 	
						

						$counter++;
								}
						endwhile;


					endif;
				
				?>




			</div>
</div>


			</div>
			<!-- end .centered -->
<script>

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

$(window).on('load', function() { 
	sizeBlocks(); 
});
$(window).on('resize', function() {
	sizeBlocks();
});
</script>


			</div>
	
		</section>
		<!-- /section -->



	</main>


</div>
<!-- end #content -->

<div class="clear"></div>
<?php get_footer(); ?>

