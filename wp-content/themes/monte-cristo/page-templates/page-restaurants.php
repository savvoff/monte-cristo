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
            'slides' => array(),
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
          <div class="row">
          <?php
          for ($i = 0; $i < 8; $i++) {
            get_template_part('page-parts/part', 'card-alt', array(
              'title' => 'Lorem ipsum dolor',
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
