<?php
	/*
	Template Name: Info page
	Template Post Type: page
	*/
	get_header(); 

	$tempArr = get_field('pages');

	$blocks = [];

	foreach ((array)$tempArr as $arr) : 
		$block = [
			'title'	=> $arr->post_title,
			'img'	=> get_the_post_thumbnail_url($arr->ID, 'medium'),
			'url'	=> get_the_permalink($arr->ID)
		];
		array_push($blocks, $block);
	endforeach;

	get_page_part('/page-parts/part-services', array(
  		'title' => get_the_title(), 
  		'blocks' => $blocks
  	)); 

  	get_footer(); 
?>