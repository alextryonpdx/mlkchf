<?php /* Template Name: Privacy */ get_header(); ?>


<div id="content">
	<main role="main">

		<div class="centered" style="min-height: 45.75vh;">

			<h1 class="green"><?php the_title(); ?></h1>

			<?php if (have_rows('content-block')): 
 						while (have_rows('content-block')): the_row(); 
 							$subheading = '';
 							$content = '';
 							$subheading = get_sub_field('sub-heading');
 							$content = get_sub_field('content');
 						?>

 						<!-- <div class="single-col"> -->

 							<?php if ( $subheading !== '' && $subheading !== 'undefined') { 
 								 ?>

 								<h4 class="bold"><?php echo $subheading; ?></h4> <?php
 							};
 							if ( $content !== '' && $content !== 'undefined') { 
 								 ?>

 								<?php echo $content; 
 							};
 							?>

						<!-- </div> -->

						<?php endwhile;
					endif; ?>

			
		</div>

	</main>


</div>


<div class="clear" class="margin: 5% 0;"></div>

<!-- end #content -->
<?php get_footer(); ?>
