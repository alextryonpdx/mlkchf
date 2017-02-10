<?php /* Template Name: ABOUT  */ get_header(); 

// page id's
// 55 : About
// 12 : About the Foundation

?>

<div id="content" style="margin-bottom:30px;">

	<?php 
	$home = new WP_Query( 'page_id=55' ); // About

	// The Loop
	while ( $home->have_posts() ) : $home->the_post();
		if (have_rows('slides') ): ?>
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
<?php endif; 
	endwhile; ?>

	<main role="main">

		<?php $head_bg = get_field('background_image', 55);
		$the_foundation = new WP_Query( 'page_id=12' );

		// The Loop
		while ( $the_foundation->have_posts() ) : $the_foundation->the_post(); ?>

			<!-- section -->
			<section>			
					
				<div id="about-foundation">

					<a class="page-anchor"  id="about-the-foundation"></a>

					<div class="row">

						<div class="">
							<!-- php the title -->
							<h5><?php echo get_field('top_row_small_heading'); ?></h5>

							<div class="content-block">

								<h2 style="line-height: 1em;"><?php echo get_field('top_row_large_heading'); ?></h2>
								<?php echo get_field('top_row_text'); ?>

							</div>

						</div>

						<!-- <div class="infographic-container">
							<img class="infographic" id="ladies" src="<?php echo get_field('half-wide_image'); ?>">
						</div> -->

					</div>
				</div>

				<div class="row infographic-container">
					<img class="infographic large" src="<?php the_field('top_row_image'); ?>">
				</div>

				<div class="content-block" id="urgent-need">

					<a class="page-anchor" id="our-community" style="padding-top: 230px; margin-top: -230px;"></a>
					<h5><?php echo get_field('second_row_small_heading'); ?></h5>
					<h2><?php echo get_field('second_row_large_heading'); ?></h2>
					<?php echo get_field('second_row_text'); ?>

				</div>

			</section>
			<!-- /section -->

		<?php endwhile; 

		wp_reset_postdata(); ?>



		<?php $the_hospital = new WP_Query( 'page_id=10' );

		// The Loop
		while ( $the_hospital->have_posts() ) : $the_hospital->the_post();
			$logo = get_field('logo');
			$contents = get_field('content-block'); 
			
			$mission = $contents[0]; 
			$vision = $contents[1]; ?>

			
			<section>

				<div class="">

					<div class="about-hospital">

						<div class="row infographic-container">
							<img class="infographic large" src="<?php the_field('infographic', 10); ?>">
						</div>

						<div class="content-block" id="about-hospital">
							<a class="page-anchor"  id="about-the-hospital"></a>
							<h5><?php the_title(); ?></h5>
							<h2><?php the_field('header_title', 10); ?></h2>
							<p><?php the_field('header_copy', 10); ?></p>

						</div>

						<div class="row infographic-container">
							<img class="infographic" src="<?php the_field('header_image', 10); ?>">
						</div>

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

				<!-- <?php // if (have_rows('photos')): 
				//$count = 0; ?>

				<!-- <div class="album green-back">

	 				<a id="pic-prev-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/left-arrow-initiative.png"></a>
					<a id="pic-next-arrow" class=""><img src="<?php echo get_template_directory_uri(); ?>/img/slider/right-arrow-initiative.png"></a>

			 		<div class="centered goverflow">

			 			<h4 class="bold gallery-head">Photo Gallery</h4>
						
				 		<div id="album" style="overflow:hidden">

							<div id="img-thumb-gallery" data-featherlight-gallery data-featherlight-filter=".event-img-thumb">
			 		     		<div class="page" style="display:block; float:left">
			 						<!-- build photo album w/pagination -->
			 						<!-- <?php //while (have_rows('photos')): the_row();  
			 							//$count++;
			 							//$image = get_sub_field('photo');
			 							
			 						// if counter%12 == 0, close the '.page' div and open a new one!!!!!!!!!!!
			 						//if( ($count-1)%12 == 0 && $count !== 1 ) {

			 							//echo '</div><div class="page">';
			 							//echo'<script>console.log("cut")</script>';
			 						//};?>
				 						<!-- make img thumbnails w/ open slide-show onclick -->
				 						<!--<div class="event-img-thumb" data-featherlight="#full<?php echo $count; ?>" id="thumb<?php echo $count; ?>">
				 							<img class="thumb" src="<?php echo $image['sizes']['medium']?>">			
				 						</div>

				 						<div class="event-img-full" id="full<?php echo $count; ?>">
				 							<img src="<?php echo $image['url']; ?>">
				 							<div class="event-caption-box">
				 								<p class="album-index"><?php echo $count ?>/<span class="total-pics"></span></p>
				 								<p class="img-caption"><?php echo get_sub_field('caption'); ?></p>
				 								
				 							</div>
				 						</div>
									<?php  //endwhile;?>
								</div>
							</div>
							
						</div>
						
					</div>

				</div> -->

				<?php //endif; ?>
				<!-- end photo album -->

			</section>
			<!-- /section -->

		<?php endwhile; 

		wp_reset_postdata(); ?>



		<!-- section -->
		<a class="page-anchor" id="about-our-team"></a>
		<section>

		<?php $the_team = new WP_Query( 'page_id=14' );

			// The Loop
			while ( $the_team->have_posts() ) : $the_team->the_post();
			 
			$team_spotlight = get_field('team-spotlight');
			$team_text = get_field('team-spotlight-text');
			$board_spotlight = get_field('board-spotlight');
			$board_text = get_field('board-spotlight-text');
			?>


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
</div>


<?php
$pairs = get_field('grid_photo_pairs', 14);
if( count( $pairs ) > 0 ){
$slideCount = intval(count( $pairs ));
$index = rand(0, ($slideCount-1));
$photos = $pairs[$index];
?>

<div class="clear" style="height:80px;"></div>

<!-- <div id="photo-grid">
	<img src="<?php echo $photos['photo_a'] ?>">
	<img class="non-mobile" src="<?php echo $photos['photo_b'] ?>">
	<img class="mobile-only" src="<?php echo $photos['photo_b_mobile'] ?>">
</div> -->	

<div id="photo-grid">
	<img src="<?php echo $photos['photo_a'] ?>">
	<img src="<?php echo $photos['photo_b'] ?>">
</div>
<?php } ?>

				<div class="clear"></div>
<div class="centered">
				<div id="team-grid">

					<!-- TEAM MEMBERS -->
					<?php $biocount = 0;
					$counter = 1;
					$boxcounter = 1;

					$the_team = new WP_Query( array(
						'post_type'=>'memberbio',
						'orderby' => 'menu_order',
						'order'   => 'DESC',
						'posts_per_page' => '-1'
					) ); 
				
					// $team = get_field('team');
					if ($the_team->have_posts() ): ?>

						<div class="team-block" id="board-of-directors">

							<h2>Board of Directors</h2>

							<?php while ( $the_team->have_posts() ) : $the_team->the_post(); 

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
									
									<?php if( have_rows('spotlights') ):
										while ( have_rows('spotlights') ) : the_row();
										$spotlight = get_sub_field('article');
										$link = $spotlight[0]; ?>

										<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>
										<?php endwhile; endif;?>

									<div class="member-social">
										<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo urlencode(the_field('tweet_text')) ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
					</a> 
					<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
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
							}
									
							endwhile;
							// create a biobox container at the end of the list of people. if the list ends in %4=0, there is a harmless div
							echo "<div class='team-bottom'></div><div class='biobox' id='biobox" . $biocount . "'></div>"; ?>

						</div>
					
					<?php endif; 

					// endwhile;
					$biocount++ ?>

					<!-- TEAM MEMBERS -->
					<?php 
						$counter = 101;
						$boxcounter=101;
						$the_team = new WP_Query( array(
							'post_type'=>'memberbio',
							'orderby' => 'menu_order',
							'order'   => 'DESC',
							'posts_per_page' => '-1'
							) );
					
						// $team = get_field('team');
						if ($the_team->have_posts() ): ?>

					<div class="team-block" id="staff">

						<h2>Staff</h2>
						<?php while ( $the_team->have_posts() ) : $the_team->the_post();

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
											
								<?php if( have_rows('spotlights') ):

								    while ( have_rows('spotlights') ) : the_row();
									$spotlight = get_sub_field('article');
									$link = $spotlight[0];
									  
									 ?>
										
									<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

								<?php endwhile; endif;?>

								<?php /*<!-- 
									<div class="member-social">

											<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo urlencode(the_field('tweet_text')) ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
					</a> 
					<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
					</a>
										

										<!-- if link exists
										<?php if( $linkedin !== '' && $linkedin !== 'undefined') { ?>
											<a href="<?php echo sanitize_text_field( $linkedin ); ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/img/header/linkedin.png" alt="linkedin">
											</a>
										<?php } ?> -->

									<!-- </div> -->*/ ?>

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

						<?php $the_team = new WP_Query( array(
							'post_type'=>'memberbio',
							'orderby' => 'menu_order',
							'order'   => 'DESC',
							'posts_per_page' => '-1' 
							) );
							// The Loop
							// while ( $the_team->have_posts() ) : $the_team->the_post(); 
						if ($the_team->have_posts() ): ?>

						<div class="team-block" id="board-of-directors">

							<h2>Board of Directors</h2>

							<?php // $team = get_field('team');
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

									<?php /*<!-- <img class="bio-arrow" onclick="hideBio();"  alt="V" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow.png"> -->										
									<!-- <div class="headshot">

										<div onclick="bioShow(<?php echo $counter . ',' . $biocount; ?>)" class="member-photo" id="member-photo<?php echo $counter; ?>" data-biobox="<?php echo $biocount ?>">
											<img class="member-face" src="<?php echo $photo['url']; ?>">
											<img class="plus" id="bio-open<?php echo $counter; ?>" alt="+" src="<?php echo get_template_directory_uri(); ?>/img/icons/plus.png">
											<img class="minus" id="bio-collapse<?php echo $counter; ?>" alt="-" src="<?php echo get_template_directory_uri(); ?>/img/icons/minus.png">
										</div> -->*/ ?>

									<div onclick="showMobileBio('#bio<?php echo $counter; ?>');">

										<img class="mobile-headshot" src="<?php echo $photo; ?>">
										<h3  class="member-name"><?php echo $name ?></h3>
										
										<!-- if has a title -->
										<?php if( $title !== '' || $title !== 'undefined') { ?>
											<h4 class="member-title"><?php echo $title ?></h4>
										<?php } ?>

										<p class="member-info"><?php echo $credits ?></p>

									</div>
									
									<?php // <!-- </div> --> ?>

									<div class="member-bio" id="bio<?php echo $counter; ?>">

										<div class="bio-content">
											<?php echo $bio; ?>
										</div>
										
										<!-- if board spotlight tagged with their name -->

										<?php if( have_rows('spotlights') ):
										    while ( have_rows('spotlights') ) : the_row();
											$spotlight = get_sub_field('article');
											$link = $spotlight[0];
				  							?>
					
										<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

										<?php endwhile; endif;?>
													
										<div class="member-social">
											<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo urlencode(the_field('tweet_text')) ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
					</a> 
					<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
					</a>

										<div class="bio-bar">
											<a id="bio-collapse<?php echo $counter; ?>" onclick="hideMobileBio('#member<?php echo $counter; ?>');">
												<p>Collapse</p>
												<img class="x-icon" alt="| X |" src="<?php echo get_template_directory_uri(); ?>/img/icons/gx-icon-solid.png">
											</a>
										</div>

									</div>
								
								</div>

								</div>
								<?php $counter++;

								}	
							endwhile;
							endif;
							// endwhile;
							$biocount++ ?>
						</div>

						<?php $the_team = new WP_Query( array(
							'post_type'=>'memberbio',
							'orderby' => 'menu_order',
							'order'   => 'DESC',
							'posts_per_page' => '-1'
							) );

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
							
							<?php /*<!-- <img class="bio-arrow" onclick="hideBio();"  alt="V" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow.png"> -->										
								<!-- <div class="headshot">
								<div onclick="bioShow(<?php echo $counter . ',' . $biocount; ?>)" class="member-photo" id="member-photo<?php echo $counter; ?>" data-biobox="<?php echo $biocount ?>">
									<img class="member-face" src="<?php echo $photo['url']; ?>">
									<img class="plus" id="bio-open<?php echo $counter; ?>" alt="+" src="<?php echo get_template_directory_uri(); ?>/img/icons/plus.png">
									<img class="minus" id="bio-collapse<?php echo $counter; ?>" alt="-" src="<?php echo get_template_directory_uri(); ?>/img/icons/minus.png">
								</div> -->*/ ?>

								<div onclick="showMobileBio('#bio<?php echo $counter; ?>');">

									<img class="mobile-headshot" src="<?php echo $photo; ?>">
									<h3  class="member-name"><?php echo $name ?></h3>

									<!-- if has a title -->
									<?php if( $title !== '' || $title !== 'undefined') { ?>
										<h4 class="member-title"><?php echo $title ?></h4>
									<?php } ?>

									<p class="member-info"><?php echo $credits ?></p>

								</div>

								<?php // <!-- </div> --> */ ?>
								<div class="member-bio" id="bio<?php echo $counter; ?>">
									
									<div class="bio-content">
										<?php echo $bio; ?>
									</div>
									
									<!-- if board spotlight tagged with their name -->
									
									<?php if( have_rows('spotlights') ):

										while ( have_rows('spotlights') ) : the_row();
										$spotlight = get_sub_field('article');
										$link = $spotlight[0];
					  
					 					?>
						
									<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

									<?php endwhile; endif;?>
														
									<div class="member-social">

										<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo urlencode(the_field('tweet_text')) ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
					</a> 
					<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
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
							
							<?php $counter++;
							
								}
								
							endwhile; ?>

						</div>

						<?php endif; ?>
					
					</div>

				
				
			</div>

		</section>
		<!-- /section -->
	
		<script>
		// $(window).on('load', function() { 
		// 	sizeBlocks(); 
		// });
		// $(window).on('resize', function() {
		// 	sizeBlocks();
		// });
		</script>


	</main>

</div>
<!-- end #content -->

<div class="clear"></div>

<?php get_footer(); ?>

