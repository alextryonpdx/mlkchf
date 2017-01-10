<?php /* Template Name: GoTo Parent */ 

header('Location: '.get_permalink(wp_get_post_parent_id( $post->ID )));
exit;