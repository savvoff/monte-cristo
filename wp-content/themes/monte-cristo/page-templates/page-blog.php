<?php
  /*
  Template Name: Blog page
  Template Post Type: page
  */
  get_header();
  global $post;

  get_page_part('/page-parts/part-hero', array(
    'class' => 'blog text-center',
    'title' => $post->post_title,
    'desc'  => $post->post_content,
    'img'   => has_post_thumbnail() ? get_the_post_thumbnail_url($post->ID, 'full') : KAYAK_URI . '/dist/img/blog-bg.jpg',
    'img_mob' => has_post_thumbnail() ? get_the_post_thumbnail_url($post->ID, 'full') : KAYAK_URI . '/dist/img/blog-bg.jpg')
  );


  $years = get_posts_years_array();
?>

<section class="page-section py-4 py-sm-6">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-11">
        <div class="row text-center">
          <div class="col-12">
            <h1 class="h2 page-section__title mb-3 mb-sm-5">Статьи</h1>
          </div>
        </div>
        <div class="row mb-4">
          <div class="form-inline col-12">
            <div class="form-group mb-3 mr-3" id="year-select">
              <select class="form-control justselect" name="" id="">
                <option selected disabled value="">Дата</option>

                <?php
                  foreach ($years as $year) :
                ?>
                <option value="<?php echo $year ?>"><?php echo $year ?></option>
                <?php
                  endforeach;
                ?>
              </select>
              <input type="hidden" name="year">
            </div>
            <div class="form-group mb-3 mr-3" id="category-select">
              <select class="form-control justselect" name="" id="">
                <option selected disabled value="">Рубрика</option>
                <?php
                  $locations = get_terms([
                    'taxonomy'  => 'category'
                  ]);

                  if ($locations) :
                    foreach ($locations as $loc) :
                ?>
                <option value="<?php echo $loc->term_id ?>"><?php echo $loc->name ?></option>
                <?php
                    endforeach;
                  endif;
                ?>
              </select>
              <input type="hidden" name="category">
            </div>
          </div>

          <section class="row m-0" id="blog-content">
          <?php

            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            $wp_query = new WP_Query([
              'posts_per_page'  => get_option('posts_per_page'),
              'paged'           => $paged
            ]);

            if ($wp_query->have_posts()) :

              while ($wp_query->have_posts()) : $wp_query->the_post();
                get_template_part('page-parts/blog-part');
              endwhile;
            endif;
          ?>
          </section>
        </div>


        <div class="row">
          <div class="col text-center">
            <?php
              bittersweet_pagination();
              wp_reset_query();
            ?>

          </div>

          <!-- Preloader -->
          <div class="col-12" hidden="true">
            <div class="spinner-border text-secondary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
          <!-- end -->

        </div>
      </div>
    </div>
  </div>
</section>

<?php
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

  get_footer();
?>
