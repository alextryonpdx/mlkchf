<?php /* Template Name: STRIPPED */ get_header(); ?>
<style>
#content {
	margin-top: 110px;
}
</style>


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>


<div id="content">
	<main role="main">

		<div class="centered">


			<div class="centered">

				<!-- section -->
				<section>

					

				<!-- 	<?php $parent = $post->post_parent;
						$crumbname = get_the_title($parent);
						$crumblink = get_the_permalink($parent);
						echo '<a href=' . $crumblink . '><p>Back to '. $crumbname . '</p></a>'; ?> -->
					<?php if(function_exists('simple_breadcrumb')) {simple_breadcrumb();} ?>

					<h1 class="green"><?php the_title(); ?></h1>

					<div class="single-sidebar">
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

						<h4>Share</h4>

						<?php
						if(get_field('facebook-text')){
							$fb = get_field('facebook-text');
						} else {
							$fb = get_the_title();
						};
						if(get_field('twitter-text')){
							$tweet = get_field('twitter-text');
						} else {
							$tweet = get_the_title();
						};
						?>

						<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?status=<?php echo urlencode(html_entity_decode(wp_get_shortlink(), ENT_COMPAT, 'UTF-8')); ?>&nbsp;<?php echo urlencode(html_entity_decode($tweet, ENT_COMPAT, 'UTF-8')); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
						</a> 
						<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()); ?>&t=<?php echo urlencode($fb); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
						</a>

					</div>


<!-- IF content blocks...
IF subheading, subheading in h3?
 CONTENT  (img = 100%width, blockquote = over 100% and moved left and big and green-->
 					<div class="single-col">
 						<?php if (get_field('secondary-heading')){ 
 							 ?>
							<h4><?php echo the_field('secondary-heading') ?></h4>

						<?php } ?>

 						<?php // the_content(); ?>
 					</div>

 					<?php if (have_rows('content-block')): 
 						while (have_rows('content-block')): the_row(); 
 							$subheading = '';
 							$content = '';
 							$subheading = get_sub_field('sub-heading');
 							$content = get_sub_field('content');
 						?>

 						<div class="single-col">

 							<?php if ( $subheading !== '' && $subheading !== 'undefined') { 
 								 ?>

 								<h4><?php echo $subheading; ?></h4> <?php
 							};
 							if ( $content !== '' && $content !== 'undefined') { 
 								 ?>

 								<?php echo $content; 
 							};
 							?>

						</div>

						<?php endwhile;
						endif; ?>


						<?php
	
	if( have_rows('spotlights') ):
		?>
	<div class="single-col">
		<?php
	    while ( have_rows('spotlights') ) : the_row();
	    $spotlight = '';
		$external_link = '';

		$spotlight = get_sub_field('article');
		$external_link = get_sub_field('external_link');
		if($spotlight !== '') {
			$link = $spotlight[0];
			$link = get_the_permalink($link);
			$target="";
		} else {
			$link = $external_link;
			$target="_blank";
		}; ?>
			
			<a target="<?php echo $target; ?>" href="<?php echo $link; ?>" class="read-more"><?php  echo the_sub_field('link_text'); ?> <span class="carrot">&raquo;</span></a>

	<?php endwhile; ?>
	</div>
	<?php endif;?>
	
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
