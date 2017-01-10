<?php get_header(); ?>
<style>
#content {
    margin-top: 110px;
}
.centered {
	padding-top: 50px;
}
</style>

<div id="content">
	<main role="main">
		<!-- section -->
		<section>

			<div class="centered">

				<div class="search-bar">
					<img id="search-standin" src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png">
					<?php get_search_form(  ); ?>
				</div>


				<!-- <div class="left-col"> -->

					<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

 					<?php get_template_part('loop'); ?>

 					<?php get_template_part('pagination'); ?>

				<!-- </div> -->

			

			</div>

	
		</section>
		<!-- /section -->
	</main>


</div>

<div class="clear" style="margin:5% 0;"></div>

<?php get_footer(); ?>
