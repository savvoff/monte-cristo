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

          <?php $content = get_the_content();
           if ($content): ?>
            <div class="bg-lighten-dark mb-5">
              <div class="p-3">
                <div class="border border-white py-5">
                  <article class="text-gray">
                    <?php echo wpautop($content); ?>
                  </article>
                </div>
              </div>
            </div>
          <?php endif; ?>

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
  <?php if (get_field('global_gallery')): ?>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12 bg-lighten-dark py-5">
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
