
<?php /* Template Name: Hospital News */  get_header(); ?>
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



					<h1>Categories for Hospital News</h1>

 					
<!-- c/p the loop part of template -->

<?php 
$query =  new WP_Query( 'cat=91,13' );


$counter = 1;
$newsCount=0;

if ($query->have_posts()): while ($query->have_posts()) : $query->the_post(); ?>
	<?php 
	// $content = get_post_field( 'post_content' );
	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
	$preview = get_field('preview_text');
?>

		<section class="recent-news-tall">
			<?php if($image) {?>
					<a href="<?php echo get_the_permalink(); ?>"><img alt="" src="<?php echo $image[0]?>"></a>
				<?php } else {
					echo '<span class="img-filler"></span>';
				} ?>

			<div class="recent-news-excerpt full">

				<a href="<?php echo get_the_permalink(); ?>"><h3 style="color:#84B05F;"><?php echo get_the_title(); ?></h3></a>

				<?php 
				if($preview){
					echo $preview;
				} else {
					the_content();
				} ?>

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


 					<?php get_template_part('pagination'); ?>

				<!-- </div> -->

				<div class="search-bar">
					<img id="search-standin" src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png">
					<?php get_search_form(  ); ?>
				</div>

			</div>

	
		</section>
		<!-- /section -->
	</main>


</div>

<div class="clear" style="margin:5% 0;"></div>

<?php get_footer(); ?>

			</div>

	
		</section>
		<!-- /section -->
	</main>


</div>

<div class="clear" style="margin:5% 0;"></div>

<?php get_footer(); ?>
