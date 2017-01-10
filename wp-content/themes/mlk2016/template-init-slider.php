<?php /* Template Name: INITIATIVES*/ get_header(); ?>

<a id="white-logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/white-init-logo.png"></a>

<div id="content" style="margin-bottom:30px;">

	<main role="main">

		<div id="initiatives-page" class="non-mobile">
			<ul>
				<li>
				<!-- start first slide -->
				<div id="initiatives-front" style="background-image:url(<?php the_field('cover_background', 20); ?>)">

					<!-- <div id="social-col"> -->
						<!-- <a href="http://twitter.com/share?text=<?php echo get_bloginfo('description'); ?>&url=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter-white.png" ></div></a> -->
						<!-- <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook-white.png" ></div></a> -->
						<!-- <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink(); ?>&title=<?php echo get_bloginfo('description'); ?>&summary=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin-white.png" ></div></a> -->
					<!-- </div> -->

					<?php

					

					$intro = new WP_Query( 'page_id=20' );
					while( $intro->have_posts() ) : $intro->the_post(); 
						// echo the_content();


						

			
						
						if( have_rows('initiative_link') ): ?>

						<h2 class="white"><?php the_field('initiatives_title'); ?></h2>

							<div id="initiative-links">
								
								

							<!-- <div id="initiative-news"> -->
								<?php
								while( have_rows('initiative_link')) : the_row();
								?>
									<a><img src="<?php the_sub_field('icon'); ?>"></a>
								<?php
								endwhile;
								?>

							</div>
						<?php 
						endif; ?>
						<?php
						echo '<h2 class="white">' . get_field('cover_title', 20) . '</h2>';
						if( have_rows('spotlights') ):

							?>
							<div id="initiative-spotlights">
								<?php
							    while ( have_rows('spotlights') ) : the_row(); 
									$article = get_sub_field('article');
									$article = $article[0];
									$linkto = get_permalink( $article );
									$title = get_the_title( $article );
									$content = get_post_field( 'post_content', $article );
									$tags = get_the_tags( $article );
									// $image = get_the_post_thumbnail( 149 );
									$img = wp_get_attachment_image_src( get_post_thumbnail_id( $article ), 'single-post-thumbnail');
									$img = $img[0];
									// var_dump(the_post($article));
									?>

									<div class='spotlight'>
										<div class="news-box">

											<?php if ($img) { ?>

												<img src="<?php echo $img; ?>">

												<div class="news-box-copy">

													<h5 class="mini-header"><?php echo the_sub_field('spotlight_text'); ?></h5>

													<a href="<?php echo $linkto; ?>"><h3><?php echo $title ?></h3></a>

													<p><?php echo $content; ?></p>

													<a href="<?php echo $linkto ?>">
														<span class="read-more">Read More <span class="carrot">&raquo;</span></span>
													</a>

												</div>

												<? } else { ?>

													<h5 class="mini-header"><?php echo the_sub_field('spotlight_text'); ?></h5>

													<a href="<?php echo $linkto; ?>"><h3><?php echo $title ?></h3></a>

													<p><?php echo $content; ?></p>

													<a href="<?php echo $linkto ?>">
														<span class="read-more">Read More <span class="carrot">&raquo;</span></span>
													</a>

												<?php } ?>

										</div>
									</div>

							   <?php  endwhile; ?>

							</div>

						<?php	
						endif; ?>
					<?php
					endwhile; ?>

					<a id="front-button" onclick="$('#initiatives-page').unslider('animate:1');">
						<h4 class="white"><?php the_field('button_text', 20 ); ?> <!-- <span class="carrot">&raquo;</span> -->
						</h4>
					</a>

					</div>
				
					
					<!-- end first slide -->
				</li>


				<?php
				$initiatives = new WP_Query( array('post_type'=>'initiative',
													'orderby'=> 'menu_order') );
				// The Loop
				while ( $initiatives->have_posts() ) : $initiatives->the_post(); 
				$imageTR = '';
				$imageBL = '';
				$supporters = '';
				$background = '';
				$background = get_field('background');
				$imageTR = get_field('image-tr');
				$imageBL = get_field('image-bl');
				$twitter_text = get_field('twitter_text');
				$anchor = get_field('anchor');
				 ?>

				<li>

					

					<div class="initiative-slide-init" id="initiative-<?php echo $post->post_name; ?>" style="background-image: url('<?php echo $background; ?>')">
						
						<div class="initiative-content taller">

							<!-- <div id="social-col"> -->
								<!-- <a href="https://twitter.com/intent/tweet?text=<?php  echo urlencode(html_entity_decode($twitter_text, ENT_COMPAT, 'UTF-8')); echo ' http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%23' . $anchor; ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter-white.png" ></div></a> -->
								<!-- <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook-white.png" ></div></a> -->
								<!-- <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink($post->ID); ?>&title=<?php echo get_bloginfo('description'); ?>&summary=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin-white.png" ></div></a> -->
							<!-- </div> -->
							<div class="init-content">
								<!-- <h5 class="init-header-mini"><?php echo the_field('top_title'); ?></h5> -->
								<h2><?php the_title(); ?></h2>
								<!-- <p><?php the_content(); ?></p> -->
								<?php the_field('text_block'); ?>

							<!-- </div> -->

							</div>
						</div>

						<div class="img-block-tall">

							<img src='<?php echo $imageTR; ?>'>

						</div>

						<div class="img-block-short">

							<img src='<?php echo $imageBL; ?>'>	

						</div>

						<a id="front-button" onclick="$('#initiatives-page').unslider('next');">
							<h4 class="white text-center"><?php the_field('next_slide_text'); ?><!-- <span class="carrot">&raquo;</span> --></h4>
						</a>

					</div>

					

				</li>

				<?php endwhile; ?>

			</ul>

		</div>

		<div id="initiatives-page-mobile" class="mobile-only">

				<!-- start first slide -->
				<div id="initiatives-front-mobile" style="background-image:url(<?php the_field('cover_background', 20); ?>)">
					<!-- <div id="social-col"> -->
						<!-- <a href="http://twitter.com/share?text=<?php echo get_bloginfo('description'); ?>&url=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter-white.png" ></div></a> -->
						<!-- <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook-white.png" ></div></a> -->
						<!-- <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink(); ?>&title=<?php echo get_bloginfo('description'); ?>&summary=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin-white.png" ></div></a> -->
					<!-- </div> -->

					<?php

					echo '<h2 class="white">' . get_field('cover_title', 20) . '</h2>';

					$intro = new WP_Query( 'page_id=20' );
					while( $intro->have_posts() ) : $intro->the_post(); 
						// echo the_content();


						if( have_rows('spotlights') ):

							?>
							<div id="initiative-spotlights">
								<?php
							    while ( have_rows('spotlights') ) : the_row(); 
									$article = get_sub_field('article');
									$article = $article[0];
									$linkto = get_permalink( $article );
									$title = get_the_title( $article );
									$content = get_post_field( 'post_content', $article );
									$tags = get_the_tags( $article );
									// $image = get_the_post_thumbnail( 149 );
									$img = wp_get_attachment_image_src( get_post_thumbnail_id( $article ), 'single-post-thumbnail');
									$img = $img[0];
									// var_dump(the_post($article));
									?>


									<div class='spotlight'>
										<div class="news-box">

											<?php if ($img) { ?>

												<img src="<?php echo $img; ?>">

												<div class="news-box-copy">

													<h5 class="mini-header"><?php echo the_sub_field('spotlight_text'); ?></h5>

													<a href="<?php echo $linkto; ?>"><h3><?php echo $title ?></h3></a>

													<p><?php echo $content; ?></p>

													<a href="<?php echo $linkto ?>">
														<span class="read-more">Read More <span class="carrot">&raquo;</span></span>
													</a>

												</div>

												<? } else { ?>

													<h5 class="mini-header"><?php echo the_sub_field('spotlight_text'); ?></h5>

													<a href="<?php echo $linkto; ?>"><h3><?php echo $title ?></h3></a>

													<p><?php echo $content; ?></p>

													<a href="<?php echo $linkto ?>">
														<span class="read-more">Read More <span class="carrot">&raquo;</span></span>
													</a>

												<?php } ?>

										</div>
									</div>

							   <?php  endwhile; ?>

							</div>

						<?php	
						endif;

			
						$news = get_field('initiative_news');
						if( $news ): ?>
							<div id="initiative-news">
								
								<h4 class="white bold">Initiative News</h4>

							<!-- <div id="initiative-news"> -->
								<?php
								foreach( $news as $p ):	?>

									
									<a class="mini-news" href="<?php echo get_permalink( $p ); ?>">
										<h4 class="white"><?php echo get_the_title( $p ); ?></h4>
										<span class="read-more white">Read More <span class="carrot">&raquo;</span></span>
									</a>
									

								<?php 
								endforeach;
								?>

								<a class="mini-news"  href="<?php echo get_tag_link(15); ?>">
									<span class="read-more white">More Initiative News <span class="carrot">&raquo;</span></span>
								</a>

							</div>
						<?php 
						endif; ?>
					<?php
					endwhile; ?>

						<a id="front-button" class="text-center">
							<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg"> -->
							<h4 class="white"><?php the_field('button_text', 20 ); ?> </h4>
						</a>

					</div>
				
					
					<!-- end first slide -->











				<?php
				$initiatives = new WP_Query( array('post_type'=>'initiative',
													'orderby'=> 'menu_order') );
				// The Loop
				while ( $initiatives->have_posts() ) : $initiatives->the_post(); 
				$imageTR = '';
				$imageBL = '';
				$supporters = '';
				$background = '';
				$info = '';
				$info = get_field('mobile_infographic');
				$twitter_text = get_field('twitter_text');
				$anchor = get_field('anchor');
				 ?>


					<div class="initiative-slide-mobile">

						<a class="page-anchor" id="<?php echo $anchor; ?>" style="padding-top: 65px; margin-top: -65px;"></a>
						
						<div class="initiative-content">
								<h2><?php the_title(); ?></h2>
								<?php the_field('text_block'); ?>
						</div>
						
						<img src='<?php echo $info; ?>'>
						
						
					

					</div>

				<?php endwhile; ?>

		</div>

	</main>


</div>

<div class="clear"></div>
<!-- end #content -->
<?php get_footer(); ?>
