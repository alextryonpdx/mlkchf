<?php /* Template Name: STRIPPED */ get_header(); ?>
<style>
#content {
	margin-top: 160px;
}
</style>


	<?php if (have_posts()): while (have_posts()) : the_post(); 
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
 							?>


<div id="content">
	<main role="main">

		<div class="centered">


			<div class="centered">

				<!-- section -->
				<section>
					<?php //if(function_exists('simple_breadcrumb')) {simple_breadcrumb();} ?>
					<a style="margin: 16px 0" class="read-more" href="<?php the_permalink(55)?>#about-our-team"><span class="carrot">&laquo;</span> Meet the whole team</a>

					<div class="single-sidebar">

						<img class="member-face" src="<?php echo $photo; ?>">

						<hr>

							<?php 
							$tags = the_tags();
							if ($tags){ ?>
								<p class="tag-line"> Tags:
							<?php foreach($tags as $tag):
							?>
							<a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a>
							<?php endforeach; ?>
							</p> <?php } ?>

						<hr>
						
						<div class="member-social" style="margin: 20px 0;">

							<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(html_entity_decode($twitter, ENT_COMPAT, 'UTF-8'));; echo ' http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%23board-of-directors'; ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/header/gtwitter.png" alt="twitter">
							</a>
		
							<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $facebook ; ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/header/gfacebook.png" alt="facebook">
							</a>

						</div>



					</div>

					<div class="single-col">

					<h1 class="green" style="margin-top:-10px"><?php echo $name; ?></h1>

					<?php if($title){ echo '<h3 class="green">' . $title . '</h3>'; } ?>

					<?php if($credits){ echo '<h3 class="green">' . $credits . '</h3>'; } ?>




 					
 				<?php echo $bio?>

 					

						<?php
	
	if( have_rows('spotlights') ):

	    while ( have_rows('spotlights') ) : the_row();
		$spotlight = get_sub_field('article');
		$link = $spotlight[0];
		  
		 ?>
			
			<a href="<?php echo get_the_permalink($link); ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

	<?php endwhile; ?>
			
			
	
	<?php endif;?>
	</div>
				</section>
				<!-- /section -->

			</div>

		</div>

	</main>


</div>

<?php endwhile;
	endif; ?>

<div class="clear" class="margin: 5% 0;"></div>

<!-- end #content -->
<?php get_footer(); ?>
