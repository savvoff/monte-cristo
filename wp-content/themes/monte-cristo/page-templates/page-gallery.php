<?php
  /*
  Template Name: Gallery page
  Template Post Type: page
  */
  get_header(); 

  $cats = get_terms([
    'taxonomy'  => 'gallery_cat'
  ]);

  $locations = get_terms([
    'taxonomy'  => 'location'
  ]);

?>
<!-- Datepicker deps -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
<!-- end -->
<section class="page-section gallery py-4">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <div class="row">
          <div class="col-12">
            <h1 class="h2 page-section__title text-center mb-3 mb-sm-5"><?php the_title() ?></h1>
          </div>
        </div>
        <div class="row">
          <div class="form-inline col-12">               
            <div class="form-group mb-3 mr-3">
              <input class="form-control date" name="" value="Дата" size="12">
              <i></i>
            </div>
            <div class="form-group mb-3 mr-3" id="gal-cat-select">
              <select class="form-control justselect" name="" id="">
                <option selected disabled value="">Все категории</option>
                <?php
                  if ($cats) :
                    foreach ((array)$cats as $cat) :
                ?>
                <option value="<?php echo $cat->slug ?>"><?php echo $cat->name ?></option>
                <?php
                    endforeach;
                  endif;
                ?>
              </select>
              <input type="hidden" name="gallery_cat">
            </div>
            <div class="form-group mb-3 mr-3" id="loc-select">
              <select class="form-control justselect" name="" id="">
                <option selected disabled value="">Локация</option>
                <?php
                  if ($locations) :
                    foreach ((array)$locations as $location) :
                ?>
                <option value="<?php echo $location->slug ?>"><?php echo $location->name ?></option>
                <?php
                    endforeach;
                  endif;
                ?>
              </select>
              <input type="hidden" name="location">
            </div>
          </div>
          <section id="gallery-part" class="col-12">
            <?php 
              $post = get_posts([
                'post_type'       => 'gallery',
                'posts_per_page'  => 1
              ]);

              if ($post) : 
                setup_postdata($post);
                get_template_part('page-parts/gallery-part');
                wp_reset_postdata();
              endif;
            ?>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  jQuery(function($) {            
    $(".date").flatpickr({
      locale: "ru",  // locale for this instance only
      disableMobile: "true"
    });
  });
</script>
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