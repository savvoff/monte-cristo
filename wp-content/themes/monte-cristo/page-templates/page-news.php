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
              'categories' => get_categories(),
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
  <?php if (get_field('global_gallery')): ?>
  <div class="container">
    <div id="gallery" class="row justify-content-center py-5">
      <div class="col-12 col-lg-10 text-center">
        <h2 class="page-section__title is-inverted"><?php the_field('global_gallery_title'); ?></h2>
        <p class="fs-5 fw-normal lh-lg w-75 mx-auto"><?php the_field('global_gallery_caption'); ?></p>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12 bg-main py-5">
        <?php
          get_template_part('page-parts/part', 'gallery', array(
            'slides' => get_field('global_gallery')
          ));
        ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
