<?php
/*
Single Post Template: Spotlight Article Template
Description: Template for Team/Member/Leadership Spotlight Articles
*/
?>


<?php get_header(); ?>



	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<div id="content">
	<main role="main">

		<div class="centered">


			<div class="left-col">

				<!-- section -->
				<section>

					

				<!-- 	<?php $parent = $post->post_parent;
						$crumbname = get_the_title($parent);
						$crumblink = get_the_permalink($parent);
						echo '<a href=' . $crumblink . '><p>Back to '. $crumbname . '</p></a>'; ?> -->

					<?php   
					$blockquote = get_field('block-quote');
					$excerpt = get_field('pre-break-content'); 
					$contents = get_field('content_block'); ?>

					<h2><?php the_title(); ?></h2>

 					<?php if (have_rows('content-block')): 
 						while (have_rows('content-block')): the_row(); ?>

 						<div class="single-col">

 							<?php if ( get_sub_field('sub_heading')) { 
 								$subheading = get_sub_field('sub_heading'); ?>

 								<h4><?php echo $subheading; ?></h4> <?php
 							};
 							if ( get_sub_field('content')) { 
 								$content = get_sub_field('content'); ?>

 								<p><?php echo $content; ?></p> <?php
 							};
 							?>

						</div>

						<?php endwhile;
						endif; ?>


			
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



<style>

.single-sidebar {
	width: 22%;
    float: left;
    display: inline-block;
    margin-right: 3%;
    font-size: 16px;
}

.single-sidebar h4 {
	font-weight: bold;
	margin-bottom: .75em;
}

.single-sidebar a {
	color: #ed864d;
}

.single-social {
	width: 30px;
	margin: 0 10px 0 0;
}

.single-col {
	 width: 75%;
    float: right;
}

.single-col:first-child {
	margin-top: 0;
}

.single-col img {
	width: 100%;
}

.single-col blockquote {
    margin: 0 0 0 -28%;
    width: 130%;
    color: #97bb60;
}

.single-col blockquote p {
	font-size: 30px;
}
</style>