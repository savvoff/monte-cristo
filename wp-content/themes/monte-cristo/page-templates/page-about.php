<?php
  /*
  Template Name: About page
  Template Post Type: page
  */
  get_header(); 

  global $post;

  get_page_part('/page-parts/part-hero', array(
    'class' => 'blog text-center',
    'title' => '<span class="text-white">'.get_the_title().'</span>', 
    'desc'  => '',
    'img'   => get_field('image')['url'],
    'img_mob'   => get_field('image_mob')['url']
  ));
  
  get_page_part('/page-parts/part-text', array(
    'class' => '',
    'title' => '', 
    'text' => wpautop($post->post_content)
  ));

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
    'title' => 'Услуги', 
    'blocks' => $blocks
  ));

  get_footer('alt'); 
?>