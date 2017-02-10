<?php /* Template Name: NEWS */ get_header(); ?>

<style>
</style>
<div id="content" class="news-page">
	<main role="main">
		<!-- section -->
		<section>



<div class="centered">

	


<?php
$news = new WP_Query( 'page_id=22' );
$noShow = array();

// var_dump($news);
while ( $news->have_posts() ) : $news->the_post(); 

$featured = get_field('featured_news');
// var_dump($featured);

$sub = get_field('sub_featured_news');
// var_dump($sub);
endwhile;
?>



		<!-- <div class="clear" style="margin:20px 0;"></div> -->

		<div class="left-col">

			<div class="search-bar clear mobile-only" style="height: 50px;margin-top: 24px;margin-bottom: -48px;">
				<img id="search-standin" onclick="showSearch()" src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png">
				<?php get_search_form(  ); ?>
			</div>

			<h2><?php echo the_field('news_heading', 22); ?></h2>

			<?php
				if( $featured):
					foreach($featured as $item):
						array_push($noShow, $item->ID);
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'single-post-thumbnail' );
						$content = get_post_field( 'post_content', $item->ID );
				?>

			<!-- featured news section -->
			<section class="featured-news">
				<?php if($image) {?>

					<a href="<?php echo get_the_permalink($item->ID); ?>">
						<img alt="featured news thumb" src="<?php echo $image[0]?>">
					</a>

					<div class="featured-news-excerpt">

				<?php } else { ?>

				<div class="featured-news-excerpt-full">

					<?php } ?>

					<a href="<?php echo get_the_permalink($item->ID); ?>"><h3><?php echo get_the_title($item->ID); ?></h3></a>

					<p><?php echo $content ?></p>

					<a href="<?php echo get_the_permalink($item->ID); ?>" class="read-more">Read More <span class="carrot">&raquo;</span></a>

					<?php 
								//$tags = get_the_tags();
								//if ($tags){ ?>
									<!-- <p class="tag-line"> Tags: -->
								<?php //foreach($tags as $tag):
								?>
								<!-- <a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php //echo $tag->name ?></a> -->
								<?php //endforeach; ?>
								<!-- </p> <?php //} ?> -->
						
				</div>

				

			</section>
			<!-- /featured news section -->

			<hr class="non-mobile"/>



				<?php 
				if( $sub): 
					$index = 0 ?>
				 <?php
					foreach($sub as $r):
						$content = get_post_field( 'post_content', $r->ID );
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $r->ID ), 'single-post-thumbnail' );
						array_push($noShow, $r->ID);
					?>
				<section class="recent-news-tall">
					<a href="<?php echo get_the_permalink($r->ID); ?>">
						<img alt="featured news thumb" src="<?php echo $image[0]?>">
					</a>

					<div class="recent-news-excerpt full">

						<a href="<?php echo get_the_permalink($r->ID); ?>"><h3><?php echo get_the_title($r->ID); ?></h3></a>

						<p><?php echo $content ?></p>

						<a href="<?php echo get_the_permalink($r->ID); ?>" class="read-more">Read More <span class="carrot">&raquo;</span></a>

						<?php 
								//$tags = get_the_tags();
								//if ($tags){ ?>
									<!-- <p class="tag-line"> Tags: -->
								<?php //foreach($tags as $tag):
								?>
								<!-- <a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php //echo $tag->name ?></a> -->
								<?php //endforeach; ?>
								<!-- </p> <?php //} ?> -->

					</div>
				</section> 
					<?php unset($sub[$index]);
						$index++;
						endforeach;?>

				<hr class="non-mobile">
				<?php endif;?>



					<?php
				endforeach; endif;?>







		<?php 
		wp_reset_postdata();
		// var_dump($noShow);
		$grants = new WP_Query(array('cat' => 25));
		if( $grants->have_posts() ): 
			while ($grants->have_posts()) : $grants->the_post();
				$ID = get_the_ID();
				array_push($noShow, $ID); 
			endwhile; 
		endif;

		wp_reset_postdata();

			// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$archive = new WP_Query(array(
				'cat' => 13,
				'orderby'=> 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => '-1',
				// 'category__not_in' => 25 ,  
				'post__not_in' => $noShow
				));
			if ( $archive->have_posts() ) :  
				$newsCount=0; 
			// var_dump($archive);
			// var_dump($noShow)?>

			<div id="article-slider">
				<ul>
					<li class="article-slide">

						<!-- Start of the main loop. -->
						<?php 
						while ( $archive->have_posts() ) : $archive->the_post(); 
							$postid = get_the_ID();
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' );
							
							
						?>
								<div class="recent-news-excerpt <?php if($newsCount%2 != 0) {echo ' righter';}?>">

									<?php if($image){?>
										<a class="news-thumbnail" style="display:inline-block" href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $image[0]?>"></a>
									<?php } ?>

									<a class="news-title" style="display:inline-block" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

									<div class="news-excerpt-block"><?php the_content(); ?></div>

									<a href="<?php the_permalink(); ?>" class="read-more">Read More <span class="carrot">&raquo;</span></a>

							<?php //$tags = get_the_tags();
								//if ($tags){ ?>
									<!-- <p class="tag-line"> Tags: -->
								<?php //foreach($tags as $tag):
								?>
								<!-- <a class="tag-link" href="<?php echo get_tag_link($tag); ?>"><?php //echo $tag->name ?></a> -->
								<?php //endforeach; ?>
								<!-- </p> <?php //} ?> -->									
								</div>
						

								<?php 
								$newsCount++;
								if($newsCount == 2) { ?> 
									<div class="clear"></div> <!-- <hr> -->
									<?php 
								};
								if($newsCount == 4) { ?> 
									<hr  style="margin:0" class="non-mobile"></li><li class="article-slide">
									<?php $newsCount = 0; 
								};
							
						endwhile; ?>
						<!-- End of the main loop -->


					<hr class="non-mobile"></li>
				</ul>
				
				<div class="read-more nav-previous alignleft non-mobile">Next Page <span class="carrot">&raquo;</span></div>
				<div class="read-more nav-next alignright non-mobile"><span class="carrot">&laquo;</span> Previous Page</div>
			</div>

			<a class="read-more mobile-only" style="margin: 0 0 20px;" href="<?php echo get_category_link( 13 ); ?>">All News <span class="carrot">&raquo;</span></a>

			<?php 
		endif; ?>

	</div>


		<div class="right-col" >

			<div class="search-bar clear non-mobile" style="height: 50px;margin-top: 44px;margin-bottom: 24px;">
				<img id="search-standin" onclick="showSearch()" src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png">
				<?php get_search_form(  ); ?>
			</div>


			<h4 class="bold" style="width:100%;"><?php the_field('grants_heading', 22); ?></h4>
			<?php $grants = new WP_Query( array(
										// 'category_name'=>'news',
										'posts_per_page'=>2,
										'category_name'=>'grants',
										'orderby'=>'menu_order')); 
				while( $grants->have_posts() ) : $grants->the_post();
					?>
					<div class="sorted-news green-back">
						<a  href="<?php echo get_the_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3></a>				
						<a class="read-more" href="<?php echo get_the_permalink(); ?>"> Read More <span class="carrot">&raquo;</span></a>
					</div>
				<?php 
				endwhile; ?>

				<a href="<?php echo home_url(); ?>/?s=grants" class="read-more indent">All Grant News <span class="carrot">&raquo;</span></a>




			<h4 class="bold" style="width:100%;"><?php the_field('newsletters_heading', 22); ?></h4>

			<?php $newsletters = get_field('newsletter' , 1346);
			if($newsletters): 
				$newsCount = 0;
				foreach ($newsletters as $n) :?>
					<div class="past-event green-back" style="padding: 0 0 10px;">
						<a target="_blank" href="<?php echo $n['link'] ?>"><img src="<?php echo $n['image'] ?>"></a>
						<a target="_blank" href="<?php echo $n['link'] ?>"><h3 style="margin: 15px 10px 0 10px !important"><?php echo $n['title'] ?></h3></a>
						<a style="margin-left:10px; " class="read-more" target="_blank" href="<?php echo $n['link'] ?>">Read More <span class="carrot">&raquo;</span></a>
					</div>
				<?php $newsCount++;
					break;
				endforeach;
			endif; ?>

			<a href="<?php the_permalink(1346); ?>" class="read-more indent">All Newsletters <span class="carrot">&raquo;</span></a>


			<?php 
			$events = new WP_Query('post_type=>event'); 
			$upcoming = array();
			$past = array();

			while ( $events->have_posts() ) : $events->the_post();
				// prep events for sorting
				$today = date('Ymd');
				$todaytime = DateTime::createFromFormat('Ymd', $today);
				$date = get_field('date');
				$datetime = DateTime::createFromFormat( 'Ymd', $date);
				

				//compare today to event-date
					// sort posts into upcoming/past arrays.
				if($datetime >= $todaytime){
					array_push($upcoming, $post );
				} 
				if($datetime < $todaytime){
					array_push($past, $post );
				};
			endwhile;


			if($past){ ?>
			<h4 class="bold" style="width:100%;"><?php the_field('videos_heading', 22); ?></h4>
			<?php
				$videoCount = 0;
				foreach( $past as $p ): 
					setup_postdata($p);
				// echo '<br>ID:'. $p->ID . '<br>';
				// var_dump($p);
					if (have_rows('videos', $p->ID) ): ?>
						
						<?php while (have_rows('videos', $p->ID)): the_row(); 
						$videoCount ++; 
						?>  

						<!-- most recent past event video + link -->
						<div class="past-event video green-back">
							<?php 
							if( get_sub_field('override') ){ ?>
								<div class="player">
								<img class="video-thumb" 
									src="<?php echo the_sub_field('thumbnail'); ?>"
									onclick="showVideoEmbed(<?php echo $videoCount; ?>)">
							</div>
							<?php 
							} else { ?>
								<div class="player">
								<img class="video-thumb" 
									src="<?php echo the_sub_field('thumbnail'); ?>"
									onclick="showVideo(<?php echo $videoCount; ?>)">
								</div>
							<?php } ?>
						

						<div id="<?php echo $videoCount; ?>-overlay" class="video-overlay">
							<?php 
							if( get_sub_field('override') ){ ?>
								<a class="vidcloseIcon" onclick="hideVideoEmbed(<?php echo $videoCount; ?>);">X</a>
							<?php 
							} else {?>
								<a class="vidcloseIcon" onclick="hideVideo(<?php echo $videoCount; ?>);">X</a>
							<?php } ?>
							
							<?php 
							if(get_sub_field('override')){
								echo the_sub_field('video_embed');
							} else { ?>
							<iframe width="560" height="315" 
							src="<?php the_sub_field('video') ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
							frameborder="0" allowfullscreen></iframe>
							<!-- <h3><?php echo get_sub_field('title'); ?></h3> -->
							<?php } ?>
						</div>

							<h5>Past Event Video:</h5>

							<?php //$link =  get_the_permalink($p->ID);
							// if( $link ){ ?>
								<!-- <a href="<?php echo $link ?>"><h3><?php echo get_sub_field('title', $p->ID); ?></h3></a> -->
							<?php // } else {?>
							<?php 
							if( get_sub_field('override') ){ ?>
								<a onclick="showVideoEmbed(<?php echo $videoCount; ?>)"><h3><?php echo get_sub_field('title', $p->ID); ?></h3></a>
							<?php } else { ?>
								<a onclick="showVideo(<?php echo $videoCount; ?>)"><h3><?php echo get_sub_field('title', $p->ID); ?></h3></a>
							<?php } ?>
								<?php //};
								?> 
						</div>
							<?php
							if ($videoCount > 1) {
								break 2;
							}
						endwhile;
					endif;
				endforeach ; 
			}
							
							?>
			<a href="<?php the_permalink(824); ?>" class="read-more indent" style="margin-bottom: 30px;">All Videos <span class="carrot">&raquo;</span></a>

						
		</div>



		</div>



	

	</div>
	<!--  end of centered column -->



	
		</section>
		<!-- /section -->
	</main>


</div>


<!-- end #content -->
<?php get_footer(); ?>
