<?php
  /*
  Template Name: Team page
  Template Post Type: page
  */
  get_header(); 

  global $post;

  get_page_part('/page-parts/part-hero', array(
    'class'   => 'text-center',
    'title'   => $post->post_title, 
    'desc'    => get_field('subtitle'),
    'img'     => get_field('image')['url'],
    'img_mob' => get_field('image_mob')['url']
  ));
  
  get_page_part('/page-parts/part-text', array(
    'class' => '',
    'title' => get_field('weare'), 
    'text'  => wpautop(get_field('text'))
  ));
?>

<section class="page-section bg-secondary py-4 py-lg-6">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <div class="row text-center">
          <div class="col-12">
            <p class="h2 page-section__title text-white mb-3 mb-sm-5">Кто мы</p>
          </div>
        </div>
        <div class="row">
          <?php foreach ((array)get_field('team') as $member) : ?>
          <div class="col-12 col-md-6 col-xl-4 mt-6">
            <div class="bg-white shadow-lg-darken rounded text-center p-3">
              <figure class="img-fit img-fit_bottom img-fit_contain mt-n6">
                <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo $member['photo']['sizes']['medium_large'] ?>" width="" height="" alt="<?php echo $member['photo']['alt']; ?>">
              </figure>
              <p class="page-section__desc text-secondary m-0"><?php echo $member['name'] ?></p>
              <p class="btn btn-secondary text-uppercase py-1 px-3 my-1"><?php echo $member['position'] ?></p>
              <p class="h6 text-primary font-weight-normal"><?php echo $member['text'] ?></p>
            </div>
          </div>
          <?php endforeach; ?>
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

  get_footer('alt');
?>