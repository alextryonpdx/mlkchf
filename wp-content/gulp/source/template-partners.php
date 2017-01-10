<?php /* Template Name: PARTNERS */ get_header(); ?>

<?php $partners = new WP_Query( 'page_id=24' ); 

$noShow = array();

while ( $partners->have_posts() ) : $partners->the_post(); 

?>
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

				<a class="scrollme bounce animated" href="#partners-body">
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
				// $('.left-col hr:last-of-type').remove();
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
				
				<div class="read-more nav-previous alignleft non-mobile">Next Page <span class="carrot">&raquo;</span></div>
				<div class="read-more nav-next alignright non-mobile"><span class="carrot">&laquo;</span> Previous Page</div>
			
			</div>
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

<!-- end #content -->
<?php get_footer(); ?>

