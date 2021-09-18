<?php
	/*
	Template Name: Main page
	Template Post Type: page
	*/

	get_header();

	get_page_part('/page-parts/part-hero', array(
	  'class' 	=> 'main is-100-height pb-6 pb-sm-0',
	  'title' 	=> '<b class="mx-sm-5"></b> '.get_field('title').' <br><b class="mx-sm-6"></b> <u>'.get_field('city').'</u>', 
	  'img' 	=>  get_field('background')['url']
	));
	
	get_footer(); 
?>