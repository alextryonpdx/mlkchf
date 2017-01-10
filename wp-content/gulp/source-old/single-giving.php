<?php /* Template Name: GIVING PAGE */ get_header(); ?>
<style>
#content {
	margin: 180px 0 0px;
}
#home-slider .slide {
    height: 86vh;
    background-size: cover;
    background-position: center center;
}
@media screen and (max-width: 1030px) {
	#content {
	    margin-top:90px;
	}
	#home-slider .slide {
	    height: 96vh;
	}
}

@media screen and (max-width: 980px ){
	.non-mobile.half-col.left.giving.giving-thumb.flex-height {
		padding: 50% 20%;
	}
}
@media screen and (max-width: 680px) {
	#content {
		margin-top: 50px;
	}
}
ul {
	list-style: none;
}
</style>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<div id="content">

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
								$text = get_sub_field('text');
								$link = get_sub_field('link-to');
								$class = get_sub_field('position');
								$arrowClass = get_sub_field('arrow_position');
								$anchor = get_sub_field('image_anchor');
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

										<a class="smoothScroll bounce animated " href="#home-content">
											<img class="down-arrow-scroll <?php echo $arrowClass; ?>" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
										</a>
									</div>

									<div class="slide-block mobile-only" style="background-image:url('<?php echo $mobile; ?>')">
			 							<a href="<?php echo $link; ?>">
				 						<div class="banner-text <?php echo $class; ?>">
				 							<?php 
				 							if( $text ){
				 								echo '<h3>' . $text . '</h3>';
			 								} if( $foreground_image ){ ?>
		 										<img src="<?php echo $foreground_image?>">
			 								<?php } ?>
				 						</div>
										</a>

										<a class="smoothScroll bounce animated " href="#home-content">
											<img class="down-arrow-scroll <?php echo $arrowClass; ?>" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
										</a>
									</div>
			 					</li>
			 				
							<?php endwhile; ?>
			</ul>

			

		</div>

	<?php endif; ?>

<style>
#home-slider .slide {
    height: 86vh;
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

.slide-block.left-mid {
	background-position: left center;
}
.slide-block.right-mid {
	background-position: right center;
}
.slide-block.center-mid {
	background-position: center center;
}
.slide-block.left-low {
	background-position: left bottom ;
}
.slide-block.right-low {
	background-position: right bottom;
}
.slide-block.center-low {
	background-position: center bottom;
}
.slide-block.left-high {
	background-position:left top;
}
.slide-block.right-high {
	background-position: right top;
}
.slide-block.center-high {
	background-position: center top;
}


</style>


	<div class="giving">
<a id="home-content" style="    
	padding-top: 190px;
    margin-top: -190px;
    display: inline-block;
    height: 0;
    width: 0;"></a>
		
		<div class="non-mobile half-col left giving giving-thumb flex-height" 
			style="background-image:url(<?php echo the_field('half_image'); ?>);
					width:50%; padding:20%; background-size: cover;
					background-repeat:no-repeat;background-position: center;">
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
					background-repeat:no-repeat;background-position: center;">
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
	<?php if( have_rows('donors') ): ?>
		<div class="donors-block"
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
	<?php endif;?>

</div>

<?php endwhile; endif; ?>


<style>
.giving {
    width: 100%;
    margin: -8px 0 -3px 0;
    display: inline-block;
}
.giving-copy {
    padding: 20px;
}
.giving-copy p,
.giving-copy h2,
.giving-copy h5 {
    margin: 0;
}
.donation-block {
    display: inline-block;
    position: relative;
    width: 100%;
    margin-top:-5px;
}
.donate-buttons {
    position: absolute;
    top: 0;
    right: 10%;
    max-width: 150px;
    width: 15%;
    padding: 5% 0;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}
.donate-buttons a {
    width: 100%;
    display: inline-block; 
    margin: 5% auto;
}

.info-links {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap:wrap;
    padding: 0;
}
.info-links a {
    /*width: 30%;*/
    min-width: 160px;
    max-width: 240px;
    margin: 1.5% 5px;
}
.spotlight-block {
	background-color: #f4f7f9;
}
.donors-block,
.info-block,
.spotlight-block {
    display: inline-block;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    text-align: center;
    padding: 80px 4% 120px;
}
.info-block h2,
.spotlight-block h2 {
	margin: 60px auto;
}
.donors-block h3 {
    color: #97bb60;
    max-width: 680px;
    width: 80%;
    margin: 60px auto 40px;
}
.donors-block hr {
    width: 85%;
    max-width: 1000px;
    height: 1px;
    background-color: #97bb60;
    border: none;
    margin: 20px auto 60px !important;
     float: none; 
    clear: both;
}
.donors {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 85%;
    max-width: 900px;
    margin: 0 auto;
    flex-wrap: wrap;
    position: relative;
}
.donor-col {
    padding: 0 10px;
    min-width: 210px;
    font-size: initial;
    color: #ffffff;
    line-height: 1.5em;
    text-align: left;
    text-transform: uppercase;
}

.giving-icon {
    width: 30px;
    margin: 0 auto;
}

.spotlight-block .news-box-copy {
    width: 50%;
}
.spotlight-block .news-box img {
    width: 45%;
}
@media screen and (max-width: 680px) {
	.donate-buttons {
	    position: absolute;
	    top: auto;
	    bottom: 0;
	    left:0;
	    right: 0;
	    max-width: 100%;
	    width: 100%;
	    padding: 7.5% 20% !important;
	    height: 60%;
	    display: flex;
	    flex-wrap: wrap;
	    justify-content: center;
	    align-items: center;
	  }
}
</style>

<script>
$(document).ready(function() {
	$('#menu-item-1142').addClass('current-menu-item');
	// console.log('<?php echo $pagename; ?>');
	// $('.menu-item a').each(function(){
	// 	if( $(this).attr('href').toLowerCase().indexOf('<?php echo $pagename; ?>') >= 0 ){
	// 		console.log($(this));
	// 		$(this).addClass('active');
	// 	};
	// });
	$('#home-slider').unslider({
		// arrows: {
		// 	//  Unslider default behaviour
		// 	prev: '<a class="unslider-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_white.svg"></a>',
		// 	next: '<a class="unslider-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg"></a>'
		// },
		arrows: false,
		nav: false
	});
});
</script>
<!-- end #content -->
<?php get_footer(); ?>


