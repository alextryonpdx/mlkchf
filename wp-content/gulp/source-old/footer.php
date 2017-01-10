			
		

			<!-- footer -->
			<footer class="footer text-center" role="contentinfo">
				<div id="updated-footer" style="background-image:url('<?php the_field('background', 1086) ?>')">
					<div id="footer-update-text">
						<h3><?php the_field('update_text', 1086);?></h3>
						<a target="_blank" href="http://eepurl.com/NWoNj" target="_blank" class="stay-updated">Stay Updated</a>
					</div>
				</div>
				
				<a href="https://www.google.com/maps/place/Martin+Luther+King,+Jr.+Community+Hospital/@33.9239277,-118.2473415,17z/data=!4m13!1m7!3m6!1s0x80c2cbb620f73fc3:0x4d2f67634499ca23!2s1680+E+120th+St,+Los+Angeles,+CA+90059!3b1!8m2!3d33.9239277!4d-118.2451528!3m4!1s0x80c2cbb620132975:0x85af8f1abacc44c9!8m2!3d33.9228403!4d-118.2434462
" target="_blank" class="address"><?php the_field('address_a', 1086);?><br/>
						<?php the_field('address_b', 1086);?></a>

				<p class="footer-contact"><?php the_field('phone', 1086);?>   &nbsp;|&nbsp;   
					<a target="_blank" style="color:#ffffff;" href="mailto:<?php the_field('email', 1086);?>"><?php the_field('email', 1086);?></a>
				</p>
				

				<div id="social-footer">
					<a target="_blank" href="<?php the_field('twitter_link', 1086);?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/twitter.png"></a>
					<a target="_blank" href="<?php the_field('facebook_link', 1086);?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/facebook.png"></a>
					<a target="_blank" href="<?php the_field('linkedin_link', 1086);?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/linkedin.png"></a>				
				</div>
				<!-- copyright -->
				<p class="copyright white">
					&copy; <?php echo date('Y'); ?> <?php the_field('copyright', 1086);?> <br class="mobile-only"><a target="_blank" href="<?php the_permalink(1089); ?>" class="underline white">Privacy Statement</a>
				</p>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

			

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		// (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		// (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		// l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		// ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		// ga('send', 'pageview');
		</script> 

		<script>

		</script>
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/smoothscroll.js"></script> -->
	</body>
</html>
		