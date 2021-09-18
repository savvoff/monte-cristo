<?php
	/*
	Template Name: Services page
	Template Post Type: page
	*/
	get_header();

	$services = get_posts([
		'post_type'       => 'service',
	  'posts_per_page'  => -1
	]);

	$blocks = [];

	foreach ($services as $post) : setup_postdata($post);
	    $block = [
	    	'title' => get_the_title(),
	      	'img'   => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
	      	'url'   => get_the_permalink()
	    ];
	    array_push($blocks, $block);
	endforeach;
	wp_reset_postdata();

	get_page_part('/page-parts/part-services', array(
	    'title' => get_the_title(),
	    'blocks' => $blocks
	));

  get_footer();
?>
