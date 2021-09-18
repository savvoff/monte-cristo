<?php
	/*
	Template Name: Shop page
	Template Post Type: page
	*/
	get_header(); 

	$blocks = [];

	$elements = get_field('elements');
	foreach ((array)$elements as $element) :
		$block = [
			'title'	=> $element['category']->name,
			'img'	=> $element['image']['sizes']['medium'],
			'url'	=> get_term_link($element['category']->term_id)
		];

		array_push($blocks, $block);
	endforeach;

	get_page_part('/page-parts/part-services', array(
  		'title' 	=> get_the_title(), 
  		'blocks' 	=> $blocks
  	)); 

  	get_footer(); ?>