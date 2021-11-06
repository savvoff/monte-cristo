<?php
/*
  Template Name: Restaurant page
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
    <div class="row py-4 py-lg-5">
      <div class="d-flex flex-wrap justify-content-center col">
        <?php foreach ((array)get_field('buttons') as $button):
          if ($button): ?>
        <a class="btn btn-outline-middle btn-link text-uppercase text-dark m-2" href="<?php echo esc_url($button['link']['url']); ?>"><?php esc_html_e($button['link']['title']); ?></a>
        <?php endif; endforeach; ?>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 bg-lighten-dark">
        <div class="p-3">
          <div id="about" class="row border border-white px-3 px-lg-6 py-5 mb-3">
            <div class="col-12">
              <h2 class="page-section__title is-inverted text-center"><?php the_field('content_title'); ?></h2>
              <article class="text-gray">
                <?php the_content(); ?>
              </article>
            </div>
          </div>
          <div class="row border border-white px-3 px-lg-5 pt-5">
            <?php foreach ((array)get_field('advantages') as $advantage): ?>
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="d-flex mb-5">
                <!-- <img class="icon-contact me-3" src="<?php //esc_attr_e($advantage['image']['url']); ?>" alt="<?php //esc_attr_e($advantage['image']['alt']); ?>"> -->
                <span class="text-secondary m-1"><?php echo $advantage['icon']; ?></span>
                <div class="py-1 px-2">
                  <p class="h5 fw-normal text-uppercase"><?php esc_html_e($advantage['title']); ?></p>
                  <p class="text-gray m-0"><?php print($advantage['desc']); ?></p>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div id="gallery" class="row justify-content-center py-5">
      <div class="col-12 col-lg-10 text-center">
        <h2 class="page-section__title is-inverted"><?php the_field('gallery_title'); ?></h2>
        <p class="h5 fw-normal lh-lg w-75 mx-auto"><?php the_field('gallery_caption'); ?></p>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12 bg-lighten-dark py-5">
        <?php
          get_template_part('page-parts/part', 'gallery', array(
            'slides' => get_field('gallery')
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
</section>

<?php get_footer(); ?>
