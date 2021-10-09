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
        <?php foreach (get_field('buttons') as $button): ?>
        <a class="btn btn-outline-middle btn-link text-uppercase text-dark m-2" href="<?php echo esc_url($button['link']['url']); ?>"><?php esc_html_e($button['link']['title']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 bg-lighten-dark">
        <div class="p-3">
          <div class="row border border-white px-3 px-lg-5 pt-5 mb-3">
            <?php foreach (get_field('advantages') as $advantage): ?>
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="d-flex mb-5">
                <img class="icon-contact me-3" src="<?php esc_attr_e($advantage['image']['url']); ?>" alt="<?php esc_attr_e($advantage['image']['alt']); ?>">
                <div class="py-1 px-2">
                  <h5 class="fw-normal text-uppercase"><?php esc_html_e($advantage['title']); ?></h5>
                  <p class="text-gray m-0"><?php esc_html_e($advantage['desc']); ?></p>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div id="about" class="row border border-white px-3 px-lg-6 py-5">
            <div class="col-12">
              <h2 class="page-section__title is-inverted text-center"><?php the_field('content_title'); ?></h2>
              <article class="text-gray">
                <?php the_content(); ?>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div id="gallery" class="row justify-content-center py-4 py-lg-5">
      <div class="col-12 col-lg-10 text-center">
        <h2 class="page-section__title is-inverted"><?php the_field('gallery_title'); ?></h2>
        <p class="fw-normal lh-lg w-75 mx-auto"><small><?php the_field('gallery_caption'); ?></small></p>
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
</section>

<?php get_footer(); ?>
