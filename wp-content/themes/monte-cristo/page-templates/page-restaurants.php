<?php
/*
  Template Name: Restaurants page
  Template Post Type: page
  */
get_header();
?>
<section class="page-section page-restaurant">
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
          <h2 class="page-section__title is-inverted text-center"><?php the_title(); ?></h2>
          <div class="row">
          <?php
          foreach (get_field('restaurants') as $card) {
            get_template_part('page-parts/part', 'card-alt', array(
              'img' => $card['image'],
              'title' => $card['title'],
              'subtitle' => $card['subtitle'],
              'link' => $card['link'],
            ));
          } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
