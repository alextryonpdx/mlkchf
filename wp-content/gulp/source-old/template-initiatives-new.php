<?php /* Template Name: INITIATIVES SLIDER PAGE*/ get_header(); ?>

<style>
p {
    letter-spacing: -1px !important;
    line-height: 1.25em;
    margin: 10px 0;
}
.sub-menu {
	height: 80px
}
nav.big-nav {
    top: 180px;
}
.init-only{
    display: inline-block;
    position: absolute;
    right: 30px;
    height: 60px;
    top: 90px;
    z-index: 999;
    font-weight: bold;
    color: #ffffff;
}
body {
    height: 100vh;
    overflow: hidden;
}
#content {
	margin: 85px 0 0;
}
header {
	margin-top: -90px;
}
img#hamburgerWhite,
img#hamburgerWhiteMobile {
	width: 40px;
    position: absolute;
    right: 30px;
    top: 125px;
    z-index: 9;
}
img#hamburgerWhite {
    display: inline-block !important;
}
img#hamburgerWhiteMobile {
	display: none;
}
/*page specific stuff*/
ul.sub-menu {
    padding: 0 250px 0 200px;
}
.menu li, .sub-menu li {
    display: inline-block;
    margin: 0 auto;
}
li#menu-item-38 a, 
li.menu-item-38 a {
    color: #44acc4 !important;
}
li#menu-item-38 {
	position: absolute;
    right: 95px;
    top: 125px;
    background-color: #ffffff;
    color: #44acc4 !important;
}
footer.footer {
	display: none;
}

#white-logo {
    width: 150px;
    height: auto;
    display: inline-block;
    position: fixed;
    z-index: 99999;
    top: 24px;
    left: 24px;
}

img.logo-mobile.mobile-only {
    display: none !important;
}
.initiative-slide-mobile img {
    width: 150% !important;
    max-width: 150% !important;
    margin-left: -25%;
}

@media screen and ( max-width: 1400px ) {
	ul.sub-menu {
	    padding: 0 200px 0 250px;
	}
    #menu-item-28 .sub-menu {
    	-webkit-flex-wrap:wrap;
    	    -ms-flex-wrap:wrap;
    	        flex-wrap:wrap;
	    -webkit-box-pack: start;
	    -webkit-justify-content: flex-start;
	        -ms-flex-pack: start;
	            justify-content: flex-start;
	    -webkit-box-align: center;
	    -webkit-align-items: center;
	        -ms-flex-align: center;
	            align-items: center;
    }
    #menu-item-28 .sub-menu li {
	    min-width: 20%;
	    text-align: left;
	    float: left;
	    margin-right: 5%;
	    margin-left: 0;
	}
    li#menu-item-38 {
        display: inline-block;
    }
    li#menu-item-38 a {
        display: inline !important;
    }
    header {
    	height: 180px;
	    background-color: #44ACC4;
    }
    .initiative-support {
		display: none !important;
	}
	/*.initiative-content {
	    height: 100% !important;
	    padding: 0 5% !important;
	}*/
	#content {
		margin-top: 85px;
	}
}

@media screen and (max-width: 1030px) {
	nav.nav .sub-menu {
    	display: none !important;
    }
	.initiative-support {
		display: inline-block !important;
	}
	.mobile-only {
        display:inline-block;
    }
    .non-mobile {
        display: none !important;
    }
    .initiative-slide-mobile .initiative-content {
	    padding: 40px 10px 20px !important;
	}
    footer.footer {
    	display: inline-block;
    }
	#content {
	    margin-top:60px !important;
	}
	.header {
        height: 150px;
        background-color: #44acc4;
    }
    img#hamburgerWhiteMobile {
        top: 104px;
    }
    li#menu-item-38 {
	    display: none;
    }
    .init-arrow {
    	display: none;
    }

    img#hamburgerWhiteMobile {
	    display: inline-block !important;
	}
	img#hamburgerWhite {
	    display: none !important;
	}

	#initiative-news {
	    display: none;
	}
	#initiative-spotlights {
		width: 100%;
	    padding: 0;
	    margin: 0;
	}
	
	.header {
	    background-color: #44acc4;
	}
	.spotlight-img {
		width: 100%;
		height: 240px;
	}
	.spotlight-content {
		width: 100%;
	}
	#initiative-spotlights .spotlight {
		margin: 0 !important;
	}
	#initiative-spotlights .spotlight .news-box {
		box-shadow: none;
	}
	#initiatives-front-mobile .white {
	    text-align: center;
	    width: 100%;
	    margin-bottom: 60px;
        margin-top: 60px;
	}
	nav.mobile-nav {
	    top: 150px;
	}

	.mobile-only {
		display: inline-block !important;
	}

	body {
		height: auto;
		overflow: auto;
	}
	.nav {
		margin-top: -50px;
	}
	.init-only {
		display: none !important;
	}
	#white-logo {
		top: 10px;
		left: 20px;
	}
	.spotlight .news-box img {
	    width: 40%;
	}
	.spotlight .news-box-copy {
	    width: 50%;
	}
	.unslider {
		display: none;
	}
	.spotlight .news-box img {
	    width: 90%;
	    margin: 5%;
	}
	.spotlight .news-box-copy {
	    width: 90%;
	    margin: 5%;
	}
}
@media screen and (min-width: 940px) and (max-height: 800px ) {
	#initiative-spotlights {
	    margin: 2vh 0;
	}
	#initiatives-front h2 {
	    margin: 3vh auto 1vh;
	}
	#initiatives-front h2:last-of-type {
	    margin: 1vh 0;
	}
	#initiative-links {
		padding: 0 40px;
	}

}

.init-social {
    margin: 5px 0px 15px;
    padding: 0 10px 10px 10px;
    border-bottom: 1px solid #ffffff;
    width: 50px;
    height: 35px;
    display: none;
}
.init-social img {
    height: 100%;
    width: auto;
}

#social-col {
    position: absolute;
    right: 0px;
    top: 10px;
    width: 50px;
    text-align: center;
}

.footer {
	margin-top:0;
}
#content {
	margin-bottom:0 !important;
}

.unslider-arrow.next,
.unslider-arrow.prev {
	display: none;
}

.initiative-slide-mobile .initiative-content, 
.initiative-slide-mobile img, 
.initiative-slide-mobile .initiative-support {
    width: 100%;
    float: left;
    display: inline-block !important;
}

 .initiative-slide-mobile .initiative-support {
 	padding-bottom: 60px;
 }

 .init-content {
 	display: inline-block;
 	padding: 30px 60px;
 	height: auto;
 }

.img-block.taller {
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
}
.init-row {
    width: 100%;
    height: auto;
    min-height: 50%;
    display: inline-block;
    overflow: hidden;
    padding: 0 0;
    position: relative;
    margin: 0 0;
}
</style>

<script>
function sizeInitRow(){
	$('.init-row').each(function(){
		$(this).height( $(this).find('.init-content').outerHeight() ) ;
	})
}
</script>

<a id="white-logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/white-init-logo.png"></a>

<div id="content" style="margin-bottom:30px;">

	<main role="main">

		<div id="initiatives-page" class="non-mobile">
			<ul>
				<li>
				<!-- start first slide -->
				<div id="initiatives-front" style="background-image:url(<?php the_field('cover_background', 20); ?>)">

					<div id="social-col">
						<a href="http://twitter.com/share?text=<?php echo get_bloginfo('description'); ?>&url=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter-white.png" ></div></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook-white.png" ></div></a>
						<!-- <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink(); ?>&title=<?php echo get_bloginfo('description'); ?>&summary=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin-white.png" ></div></a> -->
					</div>

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
				$imageBR = '';
				$supporters = '';
				$imageTR = get_field('image');
				$imageBL = get_field('image-bl');
				$imageBR = get_field('image-br');
				$twitter_text = get_field('twitter_text');
				$anchor = get_field('anchor');
				 ?>

				<li>

					

					<div class="initiative-slide-init" id="initiative-<?php echo $post->post_name; ?>">

						<div class="init-row">
							
							<div class="initiative-content taller">

								<div id="social-col">
									<a href="https://twitter.com/intent/tweet?text=<?php  echo urlencode(html_entity_decode($twitter_text, ENT_COMPAT, 'UTF-8')); echo ' http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%23' . $anchor; ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter-white.png" ></div></a>
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook-white.png" ></div></a>
									<!-- <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink($post->ID); ?>&title=<?php echo get_bloginfo('description'); ?>&summary=<?php echo the_permalink(); ?>" target="_blank"><div class="init-social"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin-white.png" ></div></a> -->
								</div>
								<div class="init-content">
									<!-- <h5 class="init-header-mini"><?php echo the_field('top_title'); ?></h5> -->
									<h2><?php the_title(); ?></h2>
									<!-- <p><?php the_content(); ?></p> -->
									<?php the_field('text_block'); ?>

								<!-- </div> -->

								</div>
							</div>

							<div class="img-block taller" style="background-image:url('<?php echo $imageTR; ?>')"></div>
						
						</div>

						<div class="img-block shorter" style="background-size:contain; background-image:url('<?php echo $imageBL; ?>')"></div>

						

						<?php
						if (have_rows('supporters') ) { ?>

							<div class="initiative-support shorter" style="background-color:<?php the_field( 'background_color' ); ?>">

								<h3>Supported By:</h3>	
									
								<div class="init-supporters">
				 					<?php while (have_rows('supporters')): the_row();
					 					$logo = '';
					 					$link = '';
					 					$logo = get_sub_field('logo');
					 					$link = get_sub_field('link');
					 					?>
					 					<div class="support-init">
						 					<?php if( $link!== '' ){ ?>
						 						<a href="<?php echo $link; ?>"><img src="<?php echo $logo; ?>"></a>
					 						<?php } else{ ?>
												<a><img src="<?php echo $logo; ?>"></a>
											<?php }; 
												$related = get_sub_field('related_link');
												$related_text = get_sub_field('related_link_text');
												if($related){ 
													echo '<a class="support-init-related" href="' . get_the_permalink($related[0]) . '">' . $related_text . ' <span class="carrot">&raquo;</span></a>';
												}
											?>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
								

							<?php 
						} else { ?>

								<div class="img-block shorter" style="background-image:url('<?php echo $imageBR; ?>')"></div>

						<?php }; ?>
						

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

						<a class="text-center" id="front-button">
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
				$imageBR = '';
				$supporters = '';
				$anchor='';
				$imageTR = get_field('image');
				$imageBL = get_field('image-bl');
				$imageBR = get_field('image-br'); 
				$anchor= get_field('anchor');?>


					<div class="initiative-slide-mobile">

						<a class="page-anchor" id="<?php echo $anchor; ?>" style="padding-top: 65px; margin-top: -65px;"></a>
						<?php if($imageTR){ ?>
							<img src='<?php echo $imageTR; ?>')>
						<?php }; ?>
						<div class="initiative-content">
							<h5 class="init-header-mini"><?php echo the_field('top_title'); ?></h5>
							<h2><?php the_title(); ?></h2>
							<!-- <p><?php the_content(); ?></p> -->
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

		 								<h4><?php echo $subheading; ?></h4> <?php
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
						<?php if($imageBL){ ?>
							<img src='<?php echo $imageBL; ?>'>
						<?php }; ?>
						<?php
						if (have_rows('supporters') ) { ?>

							<div class="initiative-support" style="background-color:<?php the_field( 'background_color' ); ?>">

								<h3>Supported By:</h3>	
									
								<div class="init-supporters">
				 					<?php while (have_rows('supporters')): the_row();
					 					$logo = '';
					 					$link = '';
					 					$logo = get_sub_field('logo');
					 					$link = get_sub_field('link');
					 					?>
					 					<div class="support-init">
						 					<?php if( $link!== '' ){ ?>
						 						<a href="<?php echo $link; ?>"><img src="<?php echo $logo; ?>"></a>
					 						<?php } else{ ?>
												<a><img src="<?php echo $logo; ?>"></a>
											<?php }; 
												$related = get_sub_field('related_link');
												$related_text = get_sub_field('related_link_text');
												if($related){ 
													echo '<a class="support-init-related" href="' . get_the_permalink($related[0]) . '">' . $related_text . ' <span class="carrot">&raquo;</span></a>';
												}
											?>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
								

							<?php 
						} else { ?>

								<div class="img-block" style="background-image:url('<?php echo $imageBR; ?>')"></div>

						<?php }; ?>
						</div>
					



				<?php endwhile; ?>

		</div>

	</main>


</div>

<div class="clear"></div>
<!-- end #content -->
<?php get_footer(); ?>


<script>
// function goSlide(slide) {
// 	$slide = slide;

// 	$('#initiatives-page').unslider('animate:' + );

// }


$('#initiatives-page ul li div.initiative-slide-init')

$(document).ready(function($) {
	
	sizeInitRow();
	$loc = $(location).attr('href').split('#');
	$loc = '#' + $loc[1];
	$slide = '.current-menu-item .sub-menu li a[href='+ $loc +']';
	$slide = $($slide)[0];
	$slides = $('.current-menu-item .sub-menu li a');
	$slideTo = $($slides).index($slide);
	$('#initiatives-page').unslider({'animate:' : $slideTo, nav: false });
	if($loc != ''){
		$('.current-menu-item .sub-menu li a').removeClass('active');
		$('.current-menu-item .sub-menu li a:eq(' + $slideTo + ')').addClass('active');
	} else{
		$('.current-menu-item .sub-menu li a:eq(0)').addClass('active');
	};
	$gogo = 'a[href$="' + '/initiatives/' + $loc + '"' + ']';
	$gogo = $($gogo)[0];
	$gogo = $($slides).index($gogo);
	$('#initiatives-page').unslider({
		nav : false,
		index : $gogo,
		infinite: true,
		loop: true,
		arrows : {
			prev: '<a class="init-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_white.svg"></a>',
			next: '<a class="init-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg"></a>'
		}//,
		// 'animate:' $gogo
	});


	// $('#initiatives-page').unslider({
	// 	nav : false,
	// 	index : $gogo,
	// 	infinite: true,
	// 	arrows : {
	// 		prev: '<a class="init-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_left_white.svg"></a>',
	// 		next: '<a class="init-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow_right_white.svg"></a>'
	// 	}		
	// });

	// start = $('.current-menu-item .sub-menu li a[href=#'+$loc+']').index( this );
	// console.log(start);
	// $('#initiatives-page').unslider('animate:' + start);

	$('.current-menu-item .sub-menu li a').each(function( index ){
		$(this).click( function(){
			console.log( $(this).attr('href') );
			slider = $('.current-menu-item .sub-menu li a').index( this );
			$('#initiatives-page').unslider('animate:' + slider);
		})
	})
	$('.init-menu.sub-menu li a').each(function( index ){
		$(this).click( function(){
			console.log( $(this).attr('href') );
			slider = $('.init-menu.sub-menu li a').index( this );
			$('#initiatives-page').unslider('animate:' + slider);
		})
	})
	$('#initiative-links a').each(function( index ){
		$(this).click( function(){
			console.log( $(this).attr('href') );
			slider = $('#initiative-links a').index( this );
			slider ++;
			$('#initiatives-page').unslider('animate:' + slider);
		})
	})
	$('#initiatives-page').on('unslider.change', function(event, index, slide) {
		$('.current-menu-item .sub-menu li a').removeClass('active');
		$('.current-menu-item .sub-menu li a:eq(' + index + ')').addClass('active');
		$hash = $('.current-menu-item .sub-menu li a:eq(' + index + ')').attr('href');
		window.history.pushState('move','Title', $hash);
		sizeInitRow();
	});


});



</script>

<style>

</style>