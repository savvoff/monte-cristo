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
            'slides' => array(),
            'title' => 'Lorem ipsum',
            'subtitle' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero numquam officia quod.',
            'badge' => null
          ));
        ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="pt-4 pt-lg-6">
          <h2 class="page-section__title is-inverted text-center">Lorem, ipsum.</h2>
          <div class="row g-0">
          <?php
          for ($i = 0; $i < 9; $i++) {
            get_template_part('page-parts/part', 'card', array(
              'title' => 'Lorem ipsum dolor sit amet consectetur.',
              'subtitle' => 'Lorem ipsum'
            ));
          } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
