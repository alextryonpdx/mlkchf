<?php /* Template Name: NewsLetters */ get_header(); ?>


<div id="content" class="news-page">
	<main role="main">
		<!-- section -->
		<section>



			<div class="centered">
				<div class="clear" style="margin:10px 0;"></div>

				<div class="back-to-news">
					<a href="<?php the_permalink(22);?>"><span class="carrot">&laquo;</span> Back to All News</a>
				</div>

				<div class="left-col">

				<h2 style="margin:1em 0;"><?php echo the_field('heading'); ?></h2>

				<?php
					if( have_rows('newsletter') ):
						while( have_rows('newsletter') ): the_row();
							$image = null;
							$link = null;
							$excerpt = null;
							$title = null;
							$date = null;
							$link_text = null;

							$link_text = get_sub_field('link_text');
							$date = get_sub_field('date');
							$image = get_sub_field('image');
							$link = get_sub_field('link');
							$excerpt = get_sub_field('excerpt');
							$title = get_sub_field('title');
							?>
							<section class="featured-newsletter">

								<?php if( $image ) {
									if( $link ) {?>
									<a target="_blank" href="<?php echo $link ?>"><img class="newsletter-thumb" src="<?php echo $image; ?>"></a>
								<?php } else { ?>
									<h3><img class="newsletter-thumb" src="<?php echo $image; ?>"></h3>
									<?php } 
									}?>
								

								<div class="excerpt">

									<?php if( $link ) {?>
										<a target="_blank" href="<?php echo $link ?>"><h3><?php echo $title ?></h3></a>
									<?php } else { ?>
										<h3><?php echo $title ?></h3>
										<?php } ?>
									<h4><?php echo $date; ?></h4>
									<?php echo $excerpt ?>
									<?php if( $link ) {?>
										<a class="read-more" href="<?php echo $link ?>"><?php echo $link_text; ?> <span class="carrot">&raquo;</span></a>
									<?php } ?>
								</div>
							</section>
							
							<!-- <hr/> -->
						<?php
						endwhile;
					endif;
					?>
				</div>			
			</div>
		</section>
	</main>
</div>



<div class="clear" style="margin:10% 0;"></div>
<!-- end #content -->
<?php get_footer(); ?>

