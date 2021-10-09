<?php
/*
  Template Name: News page
  Template Post Type: page
  */
get_header();
?>
<section class="page-section page-news">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12">
        <?php
          get_template_part('page-parts/part', 'slider', array(
            'slides' => get_field('slider'),
            'title' => get_field('title'),
            'subtitle' => get_field('subtitle'),
            'badge' => get_field('badge')
          ));
        ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="pt-4 pt-lg-6">
          <h2 class="page-section__title is-inverted text-center"><?php the_field('text_above_news', 'option') ?></h2>
          <div class="row g-0">
          <?php
          $args = array(
            'numberposts' => -1,
            'post_type'   => 'post',
          );
          $posts = get_posts($args);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part('page-parts/part', 'card', array(
              'title' => get_the_title(),
              'subtitle' => get_the_excerpt(),
              'img' => get_the_post_thumbnail_url(),
              'link' => get_permalink()
            ));
          }
          wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
