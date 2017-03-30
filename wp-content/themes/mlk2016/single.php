<?php get_header(); ?>
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

					<div class="non-mobile">
						<?php if(function_exists('simple_breadcrumb')) {simple_breadcrumb();} ?>
					</div>

					<h1 class="green"><?php the_title(); ?></h1>

					<div class="single-sidebar non-mobile">
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

						<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo urlencode(the_field('tweet_text')) ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
					</a>
						<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ; ?>">
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
 							$videoCount = 0;

 						?>

 						<div class="single-col">
 							<?php if(get_sub_field('embed_video') == true ){ ?>
 								<div class="player"  onclick="showVideo(<?php echo $videoCount; ?>)">
									<img class="video-thumb "src="<?php echo the_sub_field('video_thumbnail'); ?>">
								</div>
								<div id="<?php echo $videoCount; ?>-overlay" class="video-overlay">
					 				<?php 
									if( get_sub_field('override') ){ ?>
										<a class="vidcloseIcon" onclick="hideVideoEmbed(<?php echo $videoCount; ?>);">X</a>
									<?php 
									} else { ?>
										<a class="vidcloseIcon" onclick="hideVideo(<?php echo $videoCount; ?>);">X</a>
									<?php } ?>
							
									<?php 
									if(get_sub_field('override')){
										echo the_sub_field('video_embed');
									} else { ?>
									<iframe width="560" height="315" 
									src="<?php echo the_sub_field('video_embed_code') ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
									frameborder="0" allowfullscreen></iframe>
									<!-- <h3><?php echo get_sub_field('title'); ?></h3> -->
									<?php } 

									if( $copy ){ ?>
										<p><?php echo $copy; ?></p>
									<?php } ?>

						 		</div>
 							<?php } ?>

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

						<?php 
							$videoCount++;
						endwhile;
					endif; ?>


						<?php
	
	if( have_rows('spotlights') ):
		?>
	<div class="single-col related-articles">
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

				<div class="mobile-only mobile-article-sidebar">
						<?php if(function_exists('simple_breadcrumb')) {simple_breadcrumb();} ?>
					

					<div class="single-sidebar mobile">
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

						<h4 style="padding-left:0;">Share</h4>

						<a class="single-social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo urlencode(the_field('tweet_text')) ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="Logo">
					</a>
						<a class="single-social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ; ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="Logo">
						</a>

					</div>
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
