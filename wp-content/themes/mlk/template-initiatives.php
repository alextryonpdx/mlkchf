<?php /* Template Name: INITIATIVES */ get_header(); ?>

<style>
#content {
	margin: 164px 0 0px;
}
@media screen and (max-width: 980px) {
	#content {
	    margin-top:75px;
	}
}
</style>

<div class="clear" id="initiatives-spacer"></div>

	<main role="main">

		<!-- <a id="support" href="https://secure.mlk-chf.org/"><img src="<?php  echo get_template_directory_uri(); ?>/img/support.png"></a> -->

<!-- 		<div class="centered">

			<div class="left-col"> -->
<?php
$intro = new WP_Query( 'page_id=20' );
while( $intro->have_posts() ) : $intro->the_post(); 
	echo the_content();



	if( have_rows('spotlights') ):

		?> <div id="initiative-spotlights"> <?php

				

				    while ( have_rows('spotlights') ) : the_row(); 
						$article = get_sub_field('article');
						$article = $article[0];

						$linkto = get_permalink( $article );
						$title = get_the_title( $article );
						$content = get_post_field( 'post_content', $article );
						$tags = get_the_tags( $article );
						// var_dump($article);
						?>


						<div class="half-col spotlight">
							

						<h4 class="bold"><?php echo the_sub_field('link_text'); ?></h4>

						<a href="<?php echo $linkto; ?>"><h3 class="orange"><?php echo $title ?></h3></a>

						<p><?php echo $content; ?></p>

						
								<?php 
								// $tags = get_the_tags($article->ID);
								if ($tags){ ?>
									<p class="tag-line"> Tags:
								<?php foreach($tags as $tag):
								?>
								<a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a>
								<?php endforeach; ?>
								</p> <?php } ?>

						<a href="<?php echo $linkto ?>"><span class="read-more">Read More <span class="carrot">&raquo;</span></span></a>

					</div>

				   <?php  endwhile; ?>

				</div>

				<hr style="margin-bottom:20px;">
			<?php	endif;


endwhile;


			$initiatives = new WP_Query( array('post_type'=>'initiative',
												'orderby'=> 'menu_order') );
			// The Loop
			while ( $initiatives->have_posts() ) : $initiatives->the_post(); 
			$image = get_field('image');
			$suporters = get_field('supporters');
			$stats = get_field('statistics');
			// $spotlight = get_field('partner_spotlight'); 
			// $linkText = get_field('spotlight_link_text');
			?>







				<?php
				?>

					


			<a class="page-anchor" id="<?php echo $post->post_name; ?>"></a>



			<div class="initiative">

				
				<h2><?php the_title(); ?></h2>

				<img src="<?php echo $image; ?>" style='margin-bottom:15px'>

				<?php if (get_field('secondary-heading')){ 
 							 ?>
					<h4 style="font-weight:bold;margin: 15px 0 -10px;"><?php echo the_field('secondary-heading') ?></h4>

				<?php } ?>

				

				<?php if (have_rows('content-block')): 
 						while (have_rows('content-block')): the_row(); 
 							$subheading = '';
 							$content = '';
 							$subheading = get_sub_field('sub-heading');
 							$content = get_sub_field('content');
 						
 						 if ( $subheading !== '' && $subheading !== 'undefined') { 
 								 ?>

 								<h4><?php echo $subheading; ?></h4> <?php
 							};
 							if ( $content !== '' && $content !== 'undefined') { 
 								 echo $content; 
 							};
 							?>
<?php endwhile;
						endif; ?>

				<?php
	
	if( have_rows('spotlights') ):

	    while ( have_rows('spotlights') ) : the_row();
		$spotlight = get_sub_field('article');
		$spotlight = $spotlight[0];
		$link = get_permalink( $spotlight );
		  
		 ?>
			
			<a href="<?php echo $link; ?>" class="read-more initiative-related"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

	<?php endwhile; endif;

				if (have_rows('supporters') ): ?>

					<div class="support">

						<h5 style="font-weight: bold;font-family: 'Frutiger LT W01 65 Bold'">Supported by</h5>
						
	 					<?php while (have_rows('supporters')): the_row();
	 					$logo = '';
	 					$link = '';
	 					$logo = get_sub_field('logo');
	 					$link = get_sub_field('link');
	 					?>
	 					<?php if( $link!== '' ){ ?>
	 						<a href="<?php echo $link; ?>"><img src="<?php echo $logo; ?>"></a>
 						<?php } else{ ?>
							<img src="<?php echo $logo; ?>">
						<?php }; ?>

						<?php endwhile; ?>

					</div>

				<?php endif ?>

					<div class="stats">

				<?php if (have_rows('statistics') ): ?>

					

						
						
	 					<?php while (have_rows('statistics')): the_row(); 
	 					$graph = get_sub_field('graph');
	 					$stat = get_sub_field('stat');
	 					$description = get_sub_field('description');
	 					?>

							<div class="stat">

								<img src="<?php echo $graph; ?>">

								<h2><?php echo $stat; ?></h2>
								<h4><?php echo $description; ?></h4>
							</div>

						<?php endwhile; ?>

					

				<?php endif ?>

				</div>

			</div>

			<div class="clear"></div>

		<?php endwhile ?>



			<!-- </div>

			<div class="right-col"> -->

					<h4 style="margin-left:10px" class="bold">Grant News</h4>

				<?php $grants = new WP_Query( array( 'category_name'=>'news',
											'tag'=>'initiatives',
											'posts_per_page'=>'3')); 
						while( $grants->have_posts() ) : $grants->the_post();

						?>
						<div class="sorted-news">
							<a href="<?php echo get_the_permalink(); ?>"><h3 class="orange"><?php echo get_the_title(); ?></h3></a>

							<p><?php the_excerpt(); ?></p>

							<a class="read-more" href="<?php echo get_the_permalink(); ?>">Read More <span class="carrot">&raquo;</span></a>

						</div>

						<hr>

					<?php endwhile; 
					wp_reset_postdata();?>

					<a class="read-more" href="<?php echo get_tag_link(10); ?>">More Initiative News <span class="carrot">&raquo;</span></a>

				<!-- </div> -->


		<!-- </div> -->

	</main>


</div>

<div class="clear"></div>
<!-- end #content -->
<?php get_footer(); ?>
