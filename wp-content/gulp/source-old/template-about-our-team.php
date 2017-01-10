<?php /* Template Name: ABOUT - OUR TEAM */ get_header(); ?>


<div id="content">
	<main role="main">
		<!-- section -->
		<section>

			<div class="centered">

				<div id="our-team">

					<h2>Our Team</h2>


					<div class="half-col left spotlight">

						<h4>Board Spotlight</h4>

						<h3>Steve Yslas, JD</h3>

						<p>Pellentesque auctor neque nec urna. Proin magna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.
							Morbi mattis ullamcorper velit. Vivamus consectetuer hendrerit lacus. Fusce fermentum odio nec arcu.</p>

						<span class="read-more">Read More >></span>

						<p>Tags: <a class="tags">Team Members</a></p> <!-- link for-each tag -->

					</div>


					<div class="half-col left spotlight">

						<h4>Team Spotlight</h4>

						<h3>Bruce Corwin</h3>

						<p>Pellentesque auctor neque nec urna. Proin magna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.
							Morbi mattis ullamcorper velit. Vivamus consectetuer hendrerit lacus. Fusce fermentum odio nec arcu.</p>

						<span class="read-more">Read More >></span>

						<p>Tags: <a class="tags">Team Members</a></p> <!-- link for-each tag -->

					</div>

				</div>
				<!-- end our team (spotlights) -->

				<div id="board-of-directors">

					<div class="member">

						<div class="member-photo" id="member-photo<?php echo $counter; ?>">

							<img alt="member-photo" class="member-face" src="<?php echo get_template_directory_uri(); ?>/img/board.png">

							<img class="plus" id="bio-open<?php echo $counter; ?>" alt="+" src="<?php echo get_template_directory_uri(); ?>/img/icons/plus.png">
							<img class="minus" id="bio-collapse<?php echo $counter; ?>" alt="-" src="<?php echo get_template_directory_uri(); ?>/img/icons/minus.png">

						</div>

						<h3 class="member-name">Candace Bond McKeever</h3>

						<!-- if has a title -->
						<h4 class="member-title">Board Chair</h4>

						<p class="member-info">President, United States of America</p>

						<div class="member-bio" id="bio<?php echo $counter; ?>">

							<img class="bio-arrow" alt="V" src="<?php echo get_template_directory_uri(); ?>/img/icons/down-arrow.png">

							<p>Pellentesque auctor neque nec urna. Proin magna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.
								Morbi mattis ullamcorper velit. Vivamus consectetuer hendrerit lacus. Fusce fermentum odio nec arcu.
								Pellentesque auctor neque nec urna. Proin magna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.
								Morbi mattis ullamcorper velit. Vivamus consectetuer hendrerit lacus. Fusce fermentum odio nec arcu.</p>
							<p>Pellentesque auctor neque nec urna. Proin magna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.
								Morbi mattis ullamcorper velit. Vivamus consectetuer hendrerit lacus. Fusce fermentum odio nec arcu.
								Pellentesque auctor neque nec urna. Proin magna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.
								Morbi mattis ullamcorper velit. Vivamus consectetuer hendrerit lacus. Fusce fermentum odio nec arcu.</p>
							<p>Pellentesque auctor neque nec urna. Proin magna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.
								Morbi mattis ullamcorper velit. Vivamus consectetuer hendrerit lacus. Fusce fermentum odio nec arcu.
								Pellentesque auctor neque nec urna. Proin magna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.
								Morbi mattis ullamcorper velit. Vivamus consectetuer hendrerit lacus. Fusce fermentum odio nec arcu.</p>

							<!-- if board spotlight tagged with their name -->
							<a class="read-more">Board Spotlight >></a>


							<div class="member-social">

								<!-- if link exists -->
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/img/header/twitter.png" alt="twitter">
								</a>

								<!-- if link exists -->
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/img/header/facebook.png" alt="facebook">
								</a>

								<!-- if link exists -->
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/img/header/linkedin.png" alt="linkedin">
								</a>

							</div>


							<div class="bio-bar">
								<a id="bio-collapse<?php echo $counter; ?>">
									<p>Collapse</p>
									<img class="x-icon" alt="| X |" src="<?php echo get_template_directory_uri(); ?>/img/icons/x-icon.png">
								</a>
							</div>

						</div>

					</div>


				</div>

				<div id="staff">

				</div>





			</div>
	
		</section>
		<!-- /section -->
	</main>


</div>

<div class="clear"></div>
<!-- end #content -->
<?php get_footer(); ?>


<style>




.member {
	width: 25%;
	float: left;
	margin: 0;
	padding: 5%;
	/*border-right: 2px solid grey;*/
	/*border-bottom: 2px solid grey;*/
}

.member:nth-of-type(4n) {
	border-right: none;
}


/*.member-bio {
	width: 700%;
}

.member-bio:nth-of-type(4n-3) {
    margin-left: -30%;
}

.member-bio:nth-of-type(4n-2) {
    margin-left: -60%;
}

.member-bio:nth-of-type(4n-1) {
    margin-left: -90%;
}

.member-bio:nth-of-type(4n) {
    margin-left: -120%;
}*/

.member-photo {
	width: 100%;
	position: relative;
}

.member-face {
	width: 100%;
}

.plus,
.minus {
	position: absolute;
    bottom: 0;
    right: 0;
}







.bio-bar {
	text-align: right;
    width: 100%;
    background-color: #ED864D;
    padding: 10px 20px;
    margin: 10px 0;
}

.bio-bar a p {
	display: inline;
	color: #ffffff;
	margin: 0 1em 0 0;
	text-decoration: underline;
}


</style>