<?php /* Template Name: INITIATIVES-simple  */ get_header(); 


?>
<style>
.initiative-block p,
.initiative-block p,
.initiative-block p {
  width: 760px;
  margin: 10px auto;
  text-align: center;
}
.initiative-block {
  background-color: #f4f7f9;
  padding: 50px 0 70px;
  text-align: center;
  display: inline-block;
  width: 100%;
}
.initiative-block h2 {
  margin: 20px 0 0px;
}
.infographic-container {
	margin: -5px 0;
}
@media screen and (max-width: 980px){
	.initiative-block {
		padding: 60px 10px;
		height: auto;
		text-align: left;
	}
	.initiative-block h2 {
    margin-top: 12px;
	}
	.initiative-block p {
	    width: auto;
	    text-align: left;
	    margin: 10px 0;
	  }
}
@media screen and (max-width: 760px) {
  .initiative-block {
    padding: 20px 10px;
    height: auto;
    text-align: left;
  }
}
</style>

<div id="content" style="margin-bottom:0px;">

	<?php 

	// The Loop
	while ( have_posts() ) : the_post();
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
		<?php 
		endif; 
	endwhile; ?>	

	<section>	

		<?php
		$initiatives = new WP_Query( array('post_type'=>'initiative',
											'orderby'=> 'menu_order') );
		// The Loop
		while ( $initiatives->have_posts() ) : $initiatives->the_post(); 
			$image = get_field('image');?>
			<div class="initiative-block">
				<a class="page-anchor"  id="<?php the_field('anchor_name'); ?>"></a>
				<div class="row">
					<div class="">
						<h2 style="line-height: 1em;"><?php the_field('title'); ?></h2>
						<div class="content-block">
							<?php the_field('body'); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row infographic-container">
				<img class="infographic large" src="<?php echo $image['url']; ?>">
			</div>

			<?php
		endwhile; ?>

	</section>

</div>


<?php get_footer(); ?>