<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <meta name="description" content="<?php bloginfo('description'); ?>"> -->
		

		<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script> -->
		<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/unslider-min.js"></script> -->
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.galleriffic.js"></script> -->
		<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script> -->
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/featherlight.min.js"></script>	 -->
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/featherlight.gallery.min.js"></script>	 -->
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script> -->
		<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script> -->
		<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/helper-plugins/jquery.mousewheel.min.js"></script> -->
		<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/helper-plugins/jquery.touchSwipe.min.js"></script> -->
		<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/helper-plugins/jquery.transit.min.js"></script> -->
		<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script> -->
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script> -->
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.slides.js"></script> -->



		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> -->

		<!-- <script type="text/javascript" src="http://fast.fonts.net/jsapi/1354f56f-b540-443f-8426-003ca755f4d7.js"></script> -->
		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        // conditionizr.config({
        //     assets: '<?php echo get_template_directory_uri(); ?>',
        //     tests: {}
        // });
        
        </script>

        <script>
  // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  // })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  // ga('create', 'UA-38450107-2', 'auto');
  // ga('send', 'pageview');

</script>

<!-- 
		<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/style-cooked.css' media='all' /> -->
	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<div id="preload" style="
				opacity:1;
				position: fixed;
			    width: 100%;
			    top: 0;
			    left: 0;
			    right: 0;
			    bottom: 0;
			    display: flex;
			    display: none;
			    align-items: center;
			    justify-content: center;
			    background-color: rgba(256,256,256,.9);
			    z-index:  9999999999999999999;
			    ">
			    <img src="<?php echo get_template_directory_uri(); ?>/img/header/header-logo.png">
			</div>

			<!-- header -->
			<header class="header clear" role="banner">

				<div class="full-header">
					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/header-logo-mobile.png" alt="Logo" class="logo-mobile mobile-only">
							<img src="<?php echo get_template_directory_uri(); ?>/img/header/header-logo.png" alt="Logo" class="logo-large non-mobile">
						</a>
						
					</div>
					<!-- /logo -->

					<a onclick="showMenu()" style="cursor:pointer"><img id="hamburger" class="burger mobile-only" src="<?php echo get_template_directory_uri(); ?>/img/header/burger.png"></a>
					<a onclick="showBigMenu()" style="cursor:pointer"><img id="hamburger" class="burger non-mobile" src="<?php echo get_template_directory_uri(); ?>/img/header/burger.png"></a>
					<a onclick="showBigMenu()" style="cursor:pointer"><p class="init-only" style="cursor:pointer">MENU</p><img id="hamburgerWhite" class="burger" src="<?php echo get_template_directory_uri(); ?>/img/header/burger-white.png"></a>
					<a onclick="showMenu()" style="cursor:pointer"><!-- <p class="init-only mobile-only">MENU</p> --><img id="hamburgerWhiteMobile" class="burger" src="<?php echo get_template_directory_uri(); ?>/img/header/burger-white.png"></a>


					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php wp_nav_menu(); ?>
					</nav>
					<!-- /nav -->

					<!--  mobile nav -->
					<nav class="mobile-nav">
						<?php // wp_nav_menu( array( 'menu_class' => 'mobile-nav' ) ); ?>
						<ul class="mobile-nav">
								<li><a href="<?php the_permalink(18);?>">Home</a></li>
								<li class="show-sub">About
									<ul class="sub-menu">
										<li><a href="<?php the_permalink(55);?>">About Home</a></li>
										<li><a href="<?php the_permalink(55);?>#about-the-foundation">The Foundation</a></li>
										<li><a href="<?php the_permalink(55);?>#our-community">Our Community</a></li>
										<li><a href="<?php the_permalink(55);?>#about-the-hospital">The Hospital</a></li>
										<li><a href="<?php the_permalink(55);?>#about-our-team">Our Team</a></li>
									</ul>
								</li>
								<li class="show-sub">Initiatives
									<ul class="sub-menu">
										<li><a href="<?php the_permalink(20);?>#content">Spotlights & News</a></li>
										<li><a href="<?php the_permalink(20);?>#mlkch-primary-and-specialty-care-clinic">Advanced Care</a></li>
										<li><a href="<?php the_permalink(20);?>#inpatient-services">Inpatient Services</a></li>
										<li><a href="<?php the_permalink(20);?>#healthy-babies">Healthy Babies</a></li>
										<li><a href="<?php the_permalink(20);?>#learning-center">Learning Center</a></li>
										<li><a href="<?php the_permalink(20);?>#innovations">Innovations</a></li>
										<li><a href="<?php the_permalink(20);?>#art-fund">Art Fund</a></li>
									</ul>
								</li>
								<li class="show-sub">Partners
									<ul class="sub-menu">
										<li><a href="<?php the_permalink(24);?>">Partners Home</a></li>
										<li><a href="<?php the_permalink(24);?>#partners-body">Partner News</a></li>
										<li><a href="<?php the_permalink(24);?>#partners">Our Partners</a></li>
									</ul>
								</li>
								<li><a href="<?php the_permalink(22);?>">News</a></li>
								<li><a href="<?php the_permalink(16);?>">Events</a></li>
								<li class="show-sub">Giving
									<ul class="sub-menu">
										<li><a href="<?php the_permalink(1140);?>">Giving Home</a></li>
										<li><a href="http://secure.mlk-chf.org">Give Now</a></li>
										<li><a href="<?php the_permalink(2252);?>">Employee Giving</a></li>
										<li><a href="http://secure.mlk-chf.org/happy-birth-day">Happy Birthday Campaign</a></li>
									</ul>
								</li>
								<li id="give-now-drop"><a href="http://secure.mlk-chf.org">Give Now</a></li>
								<li>
									<div class="menu-search-bar clear" style="height:50px; margin-bottom:10px;">
										<!-- <img id="search-standin" src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png"> -->
										<?php get_search_form(  ); ?>
									</div>
								</li>
						</ul>
					</nav>



					<!--  big dropdown nav -->
					<nav class="big-nav">
						<ul class="big-nav">
								<div class="menu-col"><li><a href="<?php the_permalink(18);?>">Home</a></li>
									<li><a href="<?php the_permalink(55)?>">About</a>
										<ul class="sub-menu">
											<li><a href="<?php the_permalink(55);?>#about-the-foundation">The Foundation</a></li>
											<li><a href="<?php the_permalink(55);?>#our-community">Our Community</a></li>
											<li><a href="<?php the_permalink(55);?>#about-the-hospital">The Hospital</a></li>
											<li><a href="<?php the_permalink(55);?>#about-our-team">Our Team</a></li>
										</ul>
									</li>
								</div>
								<div class="menu-div"></div>
								<div class="menu-col">
								<li><a href="<?php the_permalink(20)?>">Initiatives</a>
										<ul class="sub-menu init-menu">
											<li><a href="<?php the_permalink(20);?>#spotlights-news">Spotlights & News</a></li>
											<li><a href="<?php the_permalink(20);?>#mlkch-primary-and-specialty-care-clinic">Advanced Care</a></li>
											<li><a href="<?php the_permalink(20);?>#inpatient-services">Inpatient Services</a></li>
											<li><a href="<?php the_permalink(20);?>#healthy-babies">Healthy Babies</a></li>
											<li><a href="<?php the_permalink(20);?>#learning-center">Learning Center</a></li>
											<li><a href="<?php the_permalink(20);?>#innovations">Innovations</a></li>
											<li><a href="<?php the_permalink(20);?>#art-fund">Art Fund</a></li>
										</ul>
									</li>
								</div>
								<div class="menu-div"></div>
								<div class="menu-col">
									<li><a href="<?php the_permalink(24)?>">Partners</a>
										<ul class="sub-menu">
											<li><a href="<?php the_permalink(24);?>#partners-body">Partner News</a></li>
											<li><a href="<?php the_permalink(24);?>#partners">Our Partners</a></li>
										</ul>
									</li>
									<li><a href="<?php the_permalink(22);?>">News</a></li>
									<li><a href="<?php the_permalink(16);?>">Events</a></li>
								</div>
								<div class="menu-div"></div>
								<div class="menu-col">
									<li><a href="<?php the_permalink(1140)?>">Giving</a>
										<ul class="sub-menu">
											<li><a href="http://secure.mlk-chf.org">Give Now</a></li>
											<li><a href="<?php the_permalink(2252);?>">Employee Giving</a></li>
											<li><a href="http://secure.mlk-chf.org/happy-birth-day">Happy Birthday Campaign</a></li>
										</ul>
									</li>
									<li>
										<div class="menu-search-bar clear" style="height:50px; margin-bottom:10px;">
											<!-- <img id="search-standin" src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png"> -->
											<?php get_search_form(  ); ?>
										</div>
									</li>
								</div>
						</ul>
					</nav>

				</div>
			</header>
			<!-- /header -->

<script>
// this is behaving odly @ initiatives vs about... INVESTIGATE
$(document).ready(function() {


});


// function headSpace() {
// 	if(<?php $pagename ?> == 'about' || <?php $pagename ?> == 'initiatives' ) {
// 		$('#content').addClass('sub-menu-page');
// 	}
// };



!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '170451716684092');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=170451716684092&ev=PageView&noscript=1"
/></noscript>


</script>



			
