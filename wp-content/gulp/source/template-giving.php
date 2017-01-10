<?php /* Template Name: GIVING PAGE */ get_header(); ?>
<style>
</style>
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

	<div class="giving">
		<a id="home-content"></a>
		
		<div class="non-mobile half-col left giving giving-thumb flex-height" 
			style="background-image:url(<?php echo the_field('half_image'); ?>);
					width:50%; ">
		</div>
		<div class="flex-center half-col left">
			<div class="giving-copy">
				<h5><?php echo the_field('heading_small'); ?></h5>
				<h2><?php echo the_field('heading_large'); ?></h2>
				<p><?php echo the_field('copy'); ?></p>
			</div>
		</div>
		<div class="mobile-only half-col left giving giving-thumb flex-height" 
			style="background-image:url(<?php echo the_field('half_image'); ?>);
					width:50%; padding:20%; background-size: cover;
					background-repeat:no-repeat;background-position: top center;">
		</div>
	</div>

	<?php 
	if( have_rows('donation_block') ): 
		while( have_rows('donation_block') ): the_row(); ?>
			<div class="donation-block">
				<img class="full-bg non-mobile" src="<?php the_sub_field('background'); ?>">
				<img class="full-bg mobile-only" src="<?php the_sub_field('background_mobile'); ?>">

				<?php if( have_rows('button') ): ?>
					<div class="donate-buttons">
						<?php while( have_rows('button') ): the_row(); ?>

							<a href="<?php the_sub_field('link'); ?>">
								<img src="<?php the_sub_field('button'); ?>">
							</a>

						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<?php if( have_rows('pill_button') ): ?>
					<div class="donate-buttons">
						<?php while( have_rows('pill_button') ): the_row(); ?>

							<a class="pill-button" href="<?php the_sub_field('link'); ?>"
								style="color:<?php the_sub_field('text_color'); ?>;
								background-color:<?php the_sub_field('pill_color'); ?>;"
								>
								<?php the_sub_field('text'); ?>
							</a>

						<?php endwhile; ?>
					</div>
				<?php endif; ?>

			</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('information') ): ?>
		<div class="info-block">
			<img class="giving-icon" src="<?php the_field('info_block_icon')?> "> 
			<h2><?php the_field('info_block_heading') ?></h2> 
			<?php
				echo '<div class="info-links">';
					while( have_rows('information') ): the_row(); ?>
						<a target="_blank" href="<?php the_sub_field('document'); ?>">
							<img src="<?php the_sub_field('button'); ?>">
						</a>
					<?php 
					endwhile;
				echo '</div>';?>
		</div>
	<?php endif; ?>

<!-- 	<div class="spotlight-block">
		<img class="giving-icon" src="<?php the_field('spotlights_icon')?> "> 
		<h2><?php the_field('spotlights_heading') ?></h2> 

			<div id="initiative-spotlights">
				<?php
				$spotlights = get_field('spotlights');
			    if( $spotlights ): foreach( $spotlights as $article ) :
					// $article = get_sub_field('article');
					// $article = $article[0];
					$linkto = get_permalink( $article );
					$title = get_the_title( $article );
					$content = get_post_field( 'post_content', $article );
					$tags = get_the_tags( $article );
					// $image = get_the_post_thumbnail( 149 );
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( $article ), 'single-post-thumbnail');
					$img = $img[0];
					// var_dump(the_post($article));
					?>
					<div class='spotlight'>
						<div class="news-box">
							<?php if ($img) { ?>
								<img src="<?php echo $img; ?>">
								<div class="news-box-copy">
									<h5 class="mini-header"><?php echo the_sub_field('spotlight_text'); ?></h5>
									<a href="<?php echo $linkto; ?>"><h3><?php echo $title ?></h3></a>
									<p><?php echo $content; ?></p>
									<a href="<?php echo $linkto ?>">
										<span class="read-more">Read More <span class="carrot">&raquo;</span></span>
									</a>
								</div>
								<? } else { ?>
									<div class="news-box-copy full">
										<h5 class="mini-header"><?php echo the_sub_field('spotlight_text'); ?></h5>
										<a href="<?php echo $linkto; ?>"><h3><?php echo $title ?></h3></a>
										<p><?php echo $content; ?></p>
										<a href="<?php echo $linkto ?>">
											<span class="read-more">Read More <span class="carrot">&raquo;</span></span>
										</a>
									</div>
								<?php } ?>
						</div>
					</div>
			   <?php  endforeach; 	
				endif; ?>
			</div>
	</div> -->
	<a class="page-anchor" id="donors"></a>
	<?php if( have_rows('donors') ): ?>
		<div class="donors-block non-mobile"
			style="background-image:url('<?php the_field("donors_background"); ?>');">
			<img class="giving-icon" src="<?php the_field('donors_icon')?> "> 
			<h3><?php the_field('donors_heading') ?></h3> 
			<hr class="green-back">
			<div class="donors">
				<?php
					while( have_rows('donors') ): the_row(); 
						echo '<div class="donor-col">';
								echo '<p>' . the_sub_field('donor_col') . '</p>';
							echo '</div>';?>
					<?php 
					endwhile;
					echo '</div>';
				?>
			</div>
		</div>

		<div class="donors-block mobile-only"
			style="background-image:url('<?php the_field("donors_background_mobile"); ?>');">
			<img class="giving-icon" src="<?php the_field('donors_icon')?> "> 
			<h3><?php the_field('donors_heading_mobile') ?></h3> 
			<hr class="green-back">
			<a id="show-donors" onclick="showDonors();">View All Supporters <span class="carrot">»</span></a>
			<a id="hide-donors" onclick="hideDonors();">Hide List <span class="carrot">»</span></a>
			<div class="donors">
				<?php
					while( have_rows('donors') ): the_row(); 
						echo the_sub_field('donor_col');
					endwhile;
					echo '</div>';
				?>
			</div>
		</div>

	<?php endif;?>

</div>

<?php endwhile; endif; ?>



<!-- end #content -->
<?php get_footer(); ?>


