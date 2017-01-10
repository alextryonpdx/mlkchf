<?php /* Template Name: PARTNERS */ get_header(); ?>

<?php $partners = new WP_Query( 'page_id=24' ); 

$noShow = array();

while ( $partners->have_posts() ) : $partners->the_post(); 

?>
<style>
#content {
	margin: 180px 0 20px;
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
ul {
	list-style: none;
}
</style>
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
								$foreground_image_mobile = get_sub_field('foreground_image_mobile');
								$text = get_sub_field('text');
								$link = get_sub_field('link-to');
								$class = get_sub_field('position');
								$arrowClass = get_sub_field('arrow_position');
								$arrowClassMobile = get_sub_field('arrow_position_mobile');
								$anchor = get_sub_field('image_anchor');
								$anchor_mobile = get_sub_field('image_anchor_mobile');
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
										<a class="smoothScroll bounce animated" href="#partners-body">
											<img class="down-arrow-scroll <?php echo $arrowClass; ?>" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
										</a>
									</div>

									<div class="slide-block mobile-only <?php echo $mobile_anchor; ?>" style="background-image:url('<?php echo $mobile; ?>')">
			 							<a href="<?php echo $link; ?>">
				 						<div class="banner-text <?php echo $class; ?>">
				 							<?php 
				 							if( $text ){
				 								echo '<h3>' . $text . '</h3>';
			 								} if( $foreground_image ){ ?>
		 										<img src="<?php echo $foreground_image_mobile; ?>">
			 								<?php } ?>
				 						</div>
										</a>

										<a class="smoothScroll bounce animated non-mobile" href="#partners-body">
											<img class="down-arrow-scroll <?php echo $arrowClass; ?>" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
										</a>
										<a class="smoothScroll bounce animated mobile-only" href="#partners-body">
											<img class="down-arrow-scroll <?php echo $arrowClassMobile; ?>" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
										</a>
									</div>
			 					</li>
			 				
							<?php endwhile; ?>
						</ul>

						

					</div>

				<?php endif; ?>
<style>
/*#home-slider .slide,
#home-slider {
    height: 84vh;
    background-position: center;

}*/
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



	<main role="main">
		<!-- section -->
		<section>
<!-- 
		<?php $head_bg = get_field('background_image', 24);
		$head_bg_m = get_field('background_image_medium', 24);
		$head_bg_s = get_field('background_image_mobile', 24); ?>

		<div id="partners-header" style="background-image:url('<? echo $head_bg; ?>')">

				<h1><?php the_field('header_text', 24); ?></h1>

				<h3><?php the_field('header_sub_text', 24); ?></h3>

				<a class="smoothScroll bounce animated" href="#partners-body">
					<img src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow-white.png">
				</a>

		</div>
 --><!-- 

<div class="clear"></div> -->

	<div class="centered" style="padding-top: 50px;">

				

		<div class="left-col">

			

			<h2><?php echo the_field('spotlight_heading', 24); ?></h2>

			<a class="page-anchor" id="partners-body" style="padding-top: 250px;margin-top: -250px;"></a>

			<?php
	
	if( have_rows('spotlights') ):

	    while ( have_rows('spotlights') ) : the_row();
			
			$article = get_sub_field('article');
			$article = $article[0];
			// var_dump($article);

			array_push($noShow, $article);
			// var_dump($noShow);
			$image = '';
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $article ), 'single-post-thumbnail' );
			$linkto = get_permalink( $article );
			$title = get_the_title( $article );
			$content = get_post_field( 'post_content', $article );
			$tags = get_the_tags( $article );
		 ?>
			<section class="partner-spotlight">

				<?php if( $image ){ ?>
					<img src="<?php echo $image[0]; ?>">
				<?php }; ?>

				<div class="partner-excerpt <?php if( !$image ){ echo 'partner-excerpt-full'; }; ?>">

					<a href="<?php echo $linkto ?>">
						<h3><?php echo $title ?></h3>
					</a>

					<p><?php echo $content ?></p>

	<a href="<?php echo $linkto ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>
					<?php //print_r($tags); ?>

					<?php 
					// $tags = the_tags();
					// if ($tags){ ?>
					<!-- // 	<p class="tag-line"> Tags: -->
					<?php //foreach($tags as $tag):
					// ?>
					<!-- // <a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a> -->
					 <?php //endforeach; ?>
					 <!-- </p> <?php // } ?> -->
				</div>

			</section>
			<hr />
			
	<?php endwhile; endif;?>

			<script>
			$(document).ready( function(){
				$('.left-col hr:last-of-type').remove();
				console.log('ok');
			})
			
			</script>












			

						
				<?php

			endwhile;
			wp_reset_postdata();
				?>


<?php 
			// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts(array('category_name'=>'partner-spotlight',
				// 'category__not_in'=>25 , 
				'orderby'=> 'menu_order',
				'post__not_in'=>$noShow));
			if ( have_posts() ) :  
				$newsCount=0; ?>

			<div id="article-slider">
				<ul>
					<li class="article-slide">

						<!-- Start of the main loop. -->
						<?php 
						while ( have_posts() ) : the_post(); 
							$postid = get_the_ID();
						
						?>
								<div class="recent-news-excerpt">

									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

									<?php the_content(); ?>

									<a href="<?php the_permalink(); ?>" class="read-more">Read More <span class="carrot">&raquo;</span></a>

										<?php 
										// $tags = the_tags();
										// if ($tags){ ?>
											<!-- <p class="tag-line"> Tags: -->
											<?php 
												// foreach($tags as $tag): ?>
												<!-- 	<a class="tag-link" href="<?php echo get_tag_link($tag); ?>">
														<?php // echo $tag->name ?>
													</a> -->
											<?php 
												// endforeach; ?>
											 <!-- </p> --> <?php 
										// } ?>											
								</div>
						

								<?php 
								$newsCount++;
								if($newsCount == 2) { ?> 
									<div class="clear"></div> <!-- <hr> -->
									<?php 
								};
								if($newsCount == 4) { ?> 
									</li><li class="article-slide">
									<?php $newsCount = 0; 
								};
							
						endwhile; ?>
						<!-- End of the main loop -->

						<!-- <hr /> -->

						<!-- Add the pagination functions here. -->



					

					</li>
				</ul>
			</div>
			<script>
			$('#home-slider').unslider({
					arrows: false,
					nav: false
				});

			$(document).ready(function(){
				

				$wide = $('.left-col').width();
				
				$('#article-slider').unslider({
					nav : false,
					arrows: {
							//  Unslider default behaviour
							next: '<div class="read-more nav-previous alignleft">Next Page <span class="carrot">&raquo;</span></div>',
							prev: '<div class="read-more nav-next alignright"><span class="carrot">&laquo;</span> Previous Page</div>'
						}
				});
				$('.left-col hr:last-of-type').remove();
				console.log('ok');
				
				
			});



			</script>
			<?php 
		endif; ?>

	</div>


				<div class="right-col" style="    margin-top: 34px;">

					<h4 class="bold" >Grant News</h4>

					<?php $grants = new WP_Query( array( 'category_name'=>'grants',
											'orderby'=>'menu_order',
											'posts_per_page'=>'2')); 
						while( $grants->have_posts() ) : $grants->the_post();

						?>
						<div class="sorted-news green-back">
							<a href="<?php echo get_the_permalink(); ?>"><h3 class="orange"><?php echo get_the_title(); ?></h3></a>

							<?php // the_content(); ?>

							<a class="read-more" href="<?php echo get_the_permalink(); ?>">Read More <span class="carrot">&raquo;</span></a>

						</div>

					<?php endwhile; 
					wp_reset_postdata();?>

					<a class="read-more" href="<?php echo get_category_link(25); ?>">All Grant News <span class="carrot">&raquo;</span></a>

				</div>

			</section>





	</div>
	<!--  end of centered column -->




<div class="clear"></div>
<?php $partners = new WP_Query( 'page_id=24' ); 

	while ( $partners->have_posts() ) : $partners->the_post(); 

	?>
		<a class="page-anchor" id="partners" style="padding-top: 150px;margin-top: -150px;"></a>
			<div id="our-partners" class="green-back text-center">

				<div class="centered">

					<h2><?php echo the_field('partners_heading'); ?></h2>

					<div id="partners-grid">

						 <?php 
						
						if (have_rows('partner_logo')): while (have_rows('partner_logo')) : the_row(); ?>

							<?php 
							$logo = '';
		 					$link = '';
		 					$width = '';
		 					$width = get_sub_field('width');
		 					$logo = get_sub_field('logo');
		 					$link = get_sub_field('link');
		 					?>
		 					<?php if( $link!== '' ){ ?>
		 						<a class="<?php echo $width; ?>" href="<?php echo $link; ?>"><img src="<?php echo $logo; ?>"></a>
	 						<?php } else{ ?>
								<img class="<?php echo $width; ?>" src="<?php echo $logo; ?>">
							<?php }; ?>
						
						<?php endwhile; endif; ?>

					</div>

				</div>

			</div>

		<?php endwhile; ?>

	
		</section>
		<!-- /section -->
	</main>


</div>

<script>
// $(document).ready(function(){
	// top = $('#home-slider li.slide').length;
	start = Math.floor( ( Math.random() * $('#home-slider li.slide').length ) );
	console.log(start);
	$('#home-slider').unslider({
		arrows: false,
		nav: false,
		index: start,
		animation: 'fade'
	});
// })

</script>

<!-- end #content -->
<?php get_footer(); ?>

