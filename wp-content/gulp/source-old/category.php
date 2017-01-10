
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

				<div class="search-bar">
					<img id="search-standin" src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png">
					<?php get_search_form(  ); ?>
				</div>


				<!-- <div class="left-col"> -->

					<h1><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h1>

 					<?php get_template_part('loop'); ?>

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
