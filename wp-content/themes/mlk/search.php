<?php get_header(); ?>
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

				<div class="clear"></div>

				<div class="back-to-news">
					<a href="<?php the_permalink(22);?>"><span class="carrot">&laquo;</span> Back to All News</a>
				</div>

				<div class="search-bar" style="margin-bottom:-36px;margin-top:36px;margin-right:20px;">
					<img id="search-standin" src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png">
					<?php get_search_form(  ); ?>
				</div>

				<!-- <div class="left-col"> -->

					<h2 style="text-transform: lowercase;"><?php echo sprintf( __( 'Search Results: ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h2>

					<?php get_template_part('loop'); ?>

					<div class="clear"></div>

					<?php get_template_part('pagination'); ?>


				<!-- </div> -->

				<div class="clear"></div>

			

			</div>

	
		</section>
		<!-- /section -->
	</main>


</div>

<div class="clear" style="margin:5% 0;"></div>


<?php get_footer(); ?>
