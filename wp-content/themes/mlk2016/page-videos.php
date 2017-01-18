<?php /* Template Name: VIDEOS PAGE*/  get_header(); ?>
<style>
#content {
    margin-top: 110px;
}
</style>

<div id="content">
	<main role="main">
		<!-- section -->
		<section>

			<div class="centered">

				<h4 class="bold">All Videos</h4>

				<?php 
				if( have_rows('videos') ): 
					$videoCount = 0;
					while( have_rows('videos') ): the_row();
						$vid = get_sub_field('video_code');
						$title = get_sub_field('title');
						$link = get_sub_field('link');
						$copy = get_sub_field('description');

						if ($videoCount % 2 == 0 ) {
							$class = 'even';
						} else {
							$class = '';
						}
						?>
						<?php 
					if( get_sub_field('override') ){ ?>
						<div class="archive-video green-back <?php echo $class; ?>" onclick="showVideoEmbed(<?php echo $videoCount; ?>)">
					<?php 
					} else { ?>
						<div class="archive-video green-back <?php echo $class; ?>" onclick="showVideo(<?php echo $videoCount; ?>)">
					<?php } ?>
						
							<div class="player">
								<img class="video-thumb "src="<?php echo the_sub_field('thumbnail'); ?>">
							</div>

							<?php 
							if( $link ){ ?>
								<a href="<?php echo $link ?>"><h3><?php echo $title ?></h3></a>
							<?php } else {?>
								<h3><?php echo $title ?></h3>

							<?php };

							if( $copy ){ ?>
								<p><?php echo $copy; ?></p>
							<?php } ?>

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
							src="<?php echo $vid ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
							frameborder="0" allowfullscreen></iframe>
							<!-- <h3><?php echo get_sub_field('title'); ?></h3> -->
							<?php } 

							if( $copy ){ ?>
								<p><?php echo $copy; ?></p>
							<?php } ?>

				 		</div>

						<?php
						$videoCount ++;
					endwhile;
				endif;
				?>

			</div>

	
		</section>
		<!-- /section -->
	</main>


</div>

<div class="clear" style="margin:5% 0;"></div>

<?php get_footer(); ?>

				