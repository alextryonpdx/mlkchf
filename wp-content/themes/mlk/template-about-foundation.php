<?php /* Template Name: ABOUT  */ get_header(); ?>



<a id="about-the-foundation"></a>

<div id="content" style="margin-bottom:-70px;">

	<main role="main">

			<?php
			$the_foundation = new WP_Query( 'page_id=12' );
			$template_path = get_bloginfo( 'template_url' );


			// The Loop
			while ( $the_foundation->have_posts() ) : $the_foundation->the_post();
				 
				$contents = get_field('content-block'); 
				$header = $contents[0];
				$community = $contents[1];
				$image = $contents[2];
				$urgent = $contents[3]; 
				$statistics = get_field('statistics');?>




		<!-- section -->
		<section>
			
			<div id="foundation-header" class="green-back text-center">

				<div class="centered">

					<!-- cms headline -->
					<h4><?php echo sanitize_text_field($header['content']); ?></h4>

				</div>

			</div>
			
			<div class="centered about-foundation">
				
				<!-- php the title -->
				<h2><?php echo the_title(); ?></h2>


				<div class="content-block">
					<h4><?php echo sanitize_text_field($community['sub-heading']); ?></h4>

					<?php echo $community['content']; ?>

				</div>

				<div class="full-image">
					<?php echo $image['content']; ?>
				</div>

				<?php if( have_rows('statistics') ): 
				$citation = get_field('citation'); ?>

					<div id="stats">

						<?php while( have_rows('statistics') ): the_row();
							$graph = get_sub_field('graph');
							$stat = get_sub_field('stat');
							$description = get_sub_field('description'); 
							?>

							<!-- for each stat (add cms field with graph image, stat, and description) -->
							<div class="stat">

								<img src="<?php echo $graph['url']; ?>" alt="<?php echo $graph['alt']; ?>">

								<h2><?php echo sanitize_text_field($stat); ?></h2>
								<h4><?php echo sanitize_text_field($description); ?></h4>

							</div>

						<?php endwhile; ?>
						<div class="clear"></div>
						<p><?php echo sanitize_text_field($citation); ?></p>

					</div>
					<!-- end #stats -->

				<?php endif; ?>

				<div class="content-block">

					<h4><?php echo sanitize_text_field($urgent['sub-heading']); ?></h4>

					<?php echo $urgent['content']; ?>

			

			<?php endwhile; 
				wp_reset_postdata(); 
				?>

<a id="about-the-hospital"></a>

<?php
			$the_hospital = new WP_Query( 'page_id=10' );
			$template_path = get_bloginfo( 'template_url' );


			// The Loop
			while ( $the_hospital->have_posts() ) : $the_hospital->the_post();
				 
				$contents = get_field('content-block'); 
				$image = $contents[0];
				$mission = $contents[1]; 
				$vision = $contents[2]; ?>

				</div>

			</div>
			<!-- end .centered -->

		</section>
		<!-- /section -->

		<section>


			<div class="orange-back">

				<div class="centered about-hospital">
					
					<!-- (cms controlled?) second content block -->
					<h2><?php the_title(); ?></h2>

					<?php the_content(); ?>

					<div class="full-image">
						<?php echo $image['content']; ?>
					</div>

					<div class="text-center">

						<img id="mission-logo" alt="MLK CHF logo" src="<?php echo get_template_directory_uri(); ?>/img/header/header-logo-small.png">

						<h4 class="bold"><?php echo sanitize_text_field($mission['sub-heading']);?></h4>

						<h4><?php echo sanitize_text_field($mission['content']);?></h4>

						<h4 class="bold"><?php echo sanitize_text_field($vision['sub-heading']);?></h4>

						<h4><?php echo sanitize_text_field($vision['content']);?></h4>

					</div>

				</div>

			</div>

		<?php endwhile; 
				wp_reset_postdata(); 
				?>

		</section>
		<!-- /section -->

		<a id="about-our-team"></a>



		<?php
			$the_team = new WP_Query( 'page_id=14' );
			$template_path = get_bloginfo( 'template_url' );


			// The Loop
			while ( $the_team->have_posts() ) : $the_team->the_post();
				 
				$team_spotlight = get_field('team-spotlight');
				$board_spotlight = get_field('board-spotlight');
				?>


		<!-- section -->
		<section>

			<div class="centered">

				<div id="our-team">
			
					<h2>Our Team</h2>

					<?php $post = $board_spotlight[0]; ?>
					<?php setup_postdata( $post ); ?>

					<div class="half-col left spotlight">

						<h4>Board Spotlight</h4>

						<h3><?php the_title(); ?></h3>

						<?php the_content(); ?>

						<a href="<?php the_permalink(); ?>"><span class="read-more">Read More >></span></a>

						<p class="tags"><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); ?></p>

					</div>
					<?php wp_reset_postdata(); ?>


					<?php $post = $board_spotlight[0]; ?>
					<?php setup_postdata( $post ); ?>

					<div class="half-col left spotlight">

						<h4>Team Spotlight</h4>

						<h3><?php the_title(); ?></h3>

						<?php the_content(); ?>

						<a href="<?php the_permalink(); ?>"><span class="read-more">Read More >></span></a>

						<p class="tags"><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); ?></p>

					</div>
					<?php wp_reset_postdata(); ?>

				</div>
				<!-- end our team (spotlights) -->

			<?php endwhile; ?>
<style>

.member {
    width: 20%;
    position: relative;
    display: inline-block;
    float: left;
    margin-right: 5%;
}
}

.headshot {
	position: relative;
	width: 100%;
    display: inline-block;
}



.plus,
.minus {
	position: absolute;
	bottom: 0;
	right: 0;
}

.minus {
	display:none;
}

.member-face {
	width: 100%;
	position: relative;
}

.member-photo {
	position: relative;
}

.bio-bar {
	text-align: right;
    width: 100%;
    background-color: #ED864D;
    padding: 10px 20px;
    margin: 10px 0;
}

.bio-bar a p {
	display: inline;
	color: #ffffff;
	margin: 0 1em 0 0;
	text-decoration: underline;
}



#board-of-directors {
     position: relative; 
    display: block;
    clear: both;
    margin: 10% 0;
}

.member-bio {
	width: 467%;
	display: none;
}

</style>

	<div class="clear"></div>

	<?php
			$the_team = new WP_Query( 'page_id=14' );
			// The Loop
			while ( $the_team->have_posts() ) : $the_team->the_post(); ?>

	<div id="board-of-directors">

		<h2> Board of Directors</h2>

				<?php


				// $team = get_field('team');
				if (have_rows('team') ): 
 						while (have_rows('team')): the_row();

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


 							$photo = get_sub_field('photo');
 							$name = get_sub_field('name');
 							$title= get_sub_field('title');
 							$credits = get_sub_field('credits');
 							$team_type = get_sub_field('team_type');
 							$bio = get_sub_field('bio');
 							$twitter = get_sub_field('twitter_link');
 							$facebook = get_sub_field('facebook_link');
 							$linkedin = get_sub_field('linkedin_link');
 							$spotlight = get_sub_field('spotlight');

 							$biocount = 0;
 							$counter = 1;


							if ($team_type == 'board') { ?>


							<!-- maby try to us :after to generate this in javascript? -->
								<?php //if( $counter == 4) {
									//$counter = 0;
									?>

								<!-- 	<div id="board-biodome<?php echo $biocount ?>" class="biodome">
										<hr>
									</div>
									//something about $biocount ++
 -->

									

									<div class="member">

										<div class="headshot">

											<div class="member-photo" id="member-photo<?php echo $counter; ?>">

												<img alt="member-photo" class="member-face" src="<?php echo $photo['url']; ?>">

												<img class="plus" id="bio-open<?php echo $counter; ?>" alt="+" src="<?php echo get_template_directory_uri(); ?>/img/icons/plus.png">
												<img class="minus" id="bio-collapse<?php echo $counter; ?>" alt="-" src="<?php echo get_template_directory_uri(); ?>/img/icons/minus.png">

											</div>

											<h3 class="member-name"><?php echo $name ?></h3>

											<!-- if has a title -->
											<?php if( $title !== '' || $title !== 'undefined') { ?>

												<h4 class="member-title"><?php echo $title ?></h4>

											<?php } ?>

											<p class="member-info"><?php echo $credits ?></p>

											<img class="bio-arrow" alt="V" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow.png">

										</div>


										<div class="member-bio" id="bio<?php echo $counter; ?>">

											

											<?php echo $bio; ?>



									<!-- if board spotlight tagged with their name -->
									<?php if( $spotlight !== '' || $spotlight !== 'undefined') {

											 $spotlight = $spotlight[0]; 
											 ?>
												
												<a href="<?php the_permalink(); ?>" class="read-more">Board Spotlight >></a>

											

										<?php } ?>



											<div class="member-social">

												<!-- if link exists -->
												<?php if( $twitter !== '' || $twitter !== 'undefined') { ?>
													<a href="<?php echo sanitize_text_field( $twitter ); ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="twitter">
													</a>
												<?php } ?>

												<!-- if link exists -->
												<?php if( $facebook !== '' || $facebook !== 'undefined') { ?>
													<a href="<?php echo sanitize_text_field( $facebook ); ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="facebook">
													</a>
												<?php } ?>

												<!-- if link exists -->
												<?php if( $linkedin !== '' || $linkedin !== 'undefined') { ?>
													<a href="<?php echo sanitize_text_field( $linkedin ); ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/img/header/linkedin.png" alt="linkedin">
													</a>
												<?php } ?>

											</div>

											<div class="bio-bar">
												<a id="bio-collapse<?php echo $counter; ?>">
													<p>Collapse</p>
													<img class="x-icon" alt="| X |" src="<?php echo get_template_directory_uri(); ?>/img/icons/x-icon.png">
												</a>
											</div>

										</div>

									

								</div>

						<?php 	
						

											}
											else{ ?>


											<div class="clear">passed</div>

											<?php

											} ;
						endwhile;
					endif;
				endwhile;
				?>




			</div>

				<div id="staff">

				</div>





			</div>
	
		</section>
		<!-- /section -->



	</main>


</div>
<!-- end #content -->

<div class="clear"></div>
<?php get_footer(); ?>

<script>



// open/close bios... change +/- icon
// need to replace with foreach on each bio with '#' not '.'
// maybe pull out 'open' and 'close' as specific functions with argument to specify which member
// also need to attach the close functionality to the collapse bar
$(window).load( function() {
	$('.plus').click( function(){
		$('.member-bio').slideDown();
		$('.plus').hide();
		$('.minus').show();
		$('.bio-arrow').show();
	});

	$('.minus').click( function(){
		$('.member-bio').slideUp();
		$('.minus').hide();
		$('.bio-arrow').hide();
		$('.plus').show();
	});
});

</script>