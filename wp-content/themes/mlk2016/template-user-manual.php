<?php /* Template Name: User Manual */ 

// User Manual Shortcodes & functions

	add_shortcode('url', 'this_url'); 
	add_shortcode('adminblock', 'admin_block');
	add_shortcode('adminhead', 'admin_head');

	$rL = get_bloginfo('wpurl');

	function this_url() { return $rL; }

	function admin_block($atts) {
	    global $rL;
	    $id = $atts['id'];
	    $cor = get_post($id);
	    $tmp = get_page_template_slug( $id );

	    $str = '<div class="admin-block">';
	    $str .=     '<div class="admin-block-row">';
	    $str .=         '<div><a href="'.get_permalink($id).'" target="_blank">'.$cor->post_title.'</a></div>';
	    $str .=         '<div><a href="'.$rL.'/wp-admin/post.php?post='.$id.'&action=edit" target="_blank">edit page</a></div>';
	    $str .=         '<div>';
	    if($atts['post-type']) {
	    	$stb = 'balls';
	    	 if($atts['post-type'] != 'post') {
	    	 	$stb = $atts['post-type'] . ' posts';
	    	 } else {
	    	 	$stb = 'posts';
	    	 }
	    	$str .=         'see <a href="'.$rL.'/wp-admin/edit.php?post_type='.$atts['post-type'].'" target="_blank">'.$stb.'</a>';
	    } //else {
	    //$str .=             '<div></div>';
	    //}
	    $str .=         '</div>';
	    $str .=         '<div>'.$tmp.'</div>';    
	    $str .=     '</div>';
	    if($atts['children']) {
	        $kids = get_pages( array('child_of' => $id) );
	        //print_r($kids);
	        foreach($kids as $coun => $kid) :
	            $k_id = $kid->ID;
	        $str .=     '<div class="admin-block-row child-pages">';
	        $str .=         '<div> - '.$kid->post_title.'</div>';
	        $str .=         '<div></div>';
	        $str .=         '<div><a href="'.$rL.'/wp-admin/post.php?post='.$k_id.'&action=edit" target="_blank">edit section</a></div>';
	        $str .=         '<div></div>';
	        $str .=     '</div>';
	        endforeach;
	    }
	    $str .= '</div>';

	    return $str;
		}

	function admin_head($atts) {
	    $str = '<div class="admin-block head">';
	    $str .=     '<div class="admin-block-row">';
	    $str .=         '<div>page</div>';
	    $str .=         '<div>in dashboard</div>';
	    $str .=         '<div>post types / child pages</div>';
	    $str .=         '<div>template</div>';
	    $str .=     '</div>';
	    $str .= '</div>';
	    return $str;
		}

// Let there be DOC ?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<title><?php echo get_bloginfo('name'); ?> User Manual :: Admins Only</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php wp_head(); ?>
</head>
<body class="user-manual-doc" style="background: #f1f1f1;">
<div class="user-manual">
	<h1><?php echo get_bloginfo('name'); ?> User Manual</h1>
	<div><?php if(is_user_logged_in()) { 
		the_content();
	} else { ?>
		<div class="admin-block not-logged-in">You must be a <a href="<?php echo get_bloginfo('wpurl'); ?>/wp-login.php" target="_blank">logged in administrator</a> to use this feature.</div>
	<?php } ?></div>
</div>
<?php wp_footer(); ?>
<script>
$(function() {	// let's rock

	// we will need slugs
	function slugIt(Text) {
	    return Text
	        .toLowerCase()
	        .replace(/[^\w ]+/g,'')
	        .replace(/ +/g,'-')
	        ;
		}

    // manipulating h3 content to include icon
    $('.user-manual section h3').each(function() {

		// in progress
	    	// let's find my content
	    	// $con = $me.find('h3 + div');
	    	// let's see how tall my content is
	    	// $origH = $con.height();
	    	// now let's shrink me
	    	// $con.css('max-height',0);

    	// declare self
    	$me = $(this);
    	// grab my content
    	$con = $me.html();
    	// stamp parent with slugged version of title for ID
    	$me.parent().attr('id',slugIt($con));
    	// wrap content in span tag and add icon
    	// we do this to keep the content editor simple
    	$me.html('<span>'+$con+'</span><i class="fa fa-angle-right"></i>');

    	// now our click action
	    $me.bind('click', function() {
	    	// redeclare self, we are now in click function
	    	$ma = $(this).parent();
	    	// I need ID
	    	$id = $ma.attr('id');
	    	// am I open?
	    	if(!$ma.hasClass('open')) { // I'm not open
	    		// close the open
	    		$('.user-manual section.open').removeClass('open');
	    		// open me
	    		$ma.addClass('open');
	    		// rollit, delay amount must be longer than transition length defined in CSS
		        $('html, body').animate({
		        	// rolling to the top of the $me
		          	scrollTop: $ma.offset().top
		        }, 400, function() {
		        	// and then we set the location hash
		        	window.location.hash = $id;
		        });
		        // we done
		        return false;

	    	} else { // I'm open
	    		// close me
	    		$ma.removeClass('open');
	    	}
	    });

    	});

    // section things
    $('.user-manual section').each(function() {
    	// declare self
    	$me = $(this);


		});

	// get hash
	$h = window.location.hash;
	// if we have hash
	if($h) {
		// store relevant section to target
		$targ = $('.user-manual section'+$h);
		// add class to target
		$targ.addClass('open');		       
		// scroll to target after half second delay
		$('html, body').delay(500).animate({
          scrollTop: $targ.offset().top
        }, 400);
	  // Fragment exists
	} else {
		// default first section open
    	$('.user-manual section:first-child').addClass('open');
		}

});
</script>
</body>
</html>