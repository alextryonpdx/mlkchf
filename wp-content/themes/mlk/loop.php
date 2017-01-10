

<!-- add <hr> and refine margins and whatnot -->
<style>
/*section.recent-news-tall:nth-of-type(odd) {
    margin-right: 4%;
    clear: left;
}*/
section.recent-news-tall {
    width: 30% !important;
    float: left;
    display: inline-block;
    margin: 20px 1.5% !important;
}
section.recent-news-tall:nth-of-type(3n-2) {
    margin-left: 0 !important;
    margin-right: 3% !important;
}
section.recent-news-tall:nth-of-type(3n) {
    margin-right: 0 !important;
    margin-left: 3% !important;
}
@media screen and (max-width: 980px ){
	section.recent-news-tall {
	    width: 47% !important;
	}
	 section.recent-news-tall:nth-of-type(3n-2),
	  section.recent-news-tall:nth-of-type(3n) {
	    margin-left: 1.5% !important;
	    margin-right: 1.5% !important;
	    width:47% !important;
	}
	.recent-news-tall img,
	.img-filler {
      height: 218px !important;
      min-width: 100% !important;
      width: auto !important;
      max-width: 200% !important;
  }
}
@media screen and (max-width: 680px ){
  	section.recent-news-tall {
	    width: 100% !important;
	    margin-left: 0 !important;
	    margin-right: 0 !important;
	}
	 section.recent-news-tall:nth-of-type(3n-2),
	  section.recent-news-tall:nth-of-type(3n) {
	    margin-left: 0 !important;
	    margin-right: 0 !important;
	    width:100% !important;
	}
	.recent-news-tall img,
	.img-filler {
      height: auto !important;
      min-width: 0 !important;
      width: 100% !important;
      max-width: 200% !important;
  }
}
@media screen and (max-width: 380px ){
	section.recent-news-tall {
	    width: 100% !important;
	    margin: 20px 0 !important;
	}
}

</style>


<?php 
$counter = 1;
$newsCount=0;
if (have_posts()): while (have_posts()) : the_post(); ?>
	<?php 
	// $content = get_post_field( 'post_content' );
	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );

?>

		<section class="recent-news-tall">
			<?php if($image) {?>
					<img alt="featured news thumb" src="<?php echo $image[0]?>">
				<?php } else {
					echo '<span class="img-filler"></span>';
				} ?>

			<div class="recent-news-excerpt full">

				<a href="<?php echo get_the_permalink(); ?>"><h3 style="color:#84B05F;"><?php echo get_the_title(); ?></h3></a>

				<?php the_content(); ?>

				<a href="<?php echo get_the_permalink(); ?>" class="read-more">Read More <span class="carrot">&raquo;</span></a>



			</div>
		</section> 


	<?php
	$counter ++; 
 ?>





	

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h3><?php _e( 'Sorry, no news about this topic.', 'html5blank' ); ?></h3>
	</article>
	<!-- /article -->

<?php endif; ?>
