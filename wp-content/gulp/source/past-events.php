<?php /* Template Name: PAST EVENTS MOBILE */ get_header(); ?>


<div id="content">

	<div class="">

		<div class="half-col left">

			<?php 
			$events = new WP_Query(array('post_type'=>'event', 
										'meta_key' => 'date', 
										'orderby'=>'meta_value_number', 
										'order' => 'DESC')); 
			$upcoming = array();
			$past = array();
			$all = array();

			//sort dy date --------FIX BEFORE USE
			// 'meta_key'=>'date',
			// 'orderby'=>'meta_value_number',
			// 'order'=>'ASC'

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
				array_push($all, $post);

			endwhile;

			if($past){ ?>

				<div id="past-events" class="centered">
					<h4 class="bold">Past Events</h4>

				<?php
					foreach($past as $event){
						setup_postdata($event);
						// create past event boxes 
						$link =  get_permalink($event->ID);
						?>
						<div class="event" class="green-back">
							
							<div class="event-top">
								<a href="<?php echo $link ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $event->ID )) ?>"></a>

								<div class="event-info">
									<?php
										$date = get_field('date', $event->ID);
										$datetime = DateTime::createFromFormat( 'Ymd', $date);
										$date = $datetime->format('F j, Y');
									?>

									<p><span class="event-date"><?php echo $date; ?></span> &nbsp;|&nbsp; <?php echo get_field('time', $event->ID); ?></p>

									<a href="<?php echo $link ?>"><h3><?php echo get_the_title($event->ID); ?></h3></a>

									<p class="location"><?php echo the_field('location', $event->ID); ?></p>

									<p class="address"><?php echo the_field('address', $event->ID); ?></p>

								</div>

							</div>

							<div class="event-description">

								<?php the_content(); ?>
								
							</div>

							
								<a href="<?php echo $link ?>" class="stay-updated">View Gallery</a>
							

						</div>
						<!-- end single event -->
					<?php
				
					} ?>
				</div>
			<?php
				} ?>
		</div>
	</div>
</div>
<!-- end #content -->

<div class="clear"></div>

<?php get_footer(); ?>