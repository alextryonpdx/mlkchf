<?php /* Template Name: STRIPPED */ get_header(); ?>


<div id="content">
	<main role="main">
		<!-- section -->
		<section>

	
		</section>
		<!-- /section -->
	</main>


</div>

<div class="clear"></div>
<!-- end #content -->
<?php get_footer(); ?>



<?php if ( have_posts() ):
				while ( have_posts() ): 
					the_post(); 

						// check if the repeater field has rows of data
						if( have_rows('events') ):
						 	// loop through the rows of data
						    while ( have_rows('events') ) : the_row();  


						endwhile;
						endif;




			endwhile;
			endif; ?>