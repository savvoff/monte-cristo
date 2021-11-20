<?php
/*
  Template Name: Gallery page
  Template Post Type: page
  */
get_header();
?>
<section class="page-section page-gallery pt-4 pt-lg-6">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="pt-lg-4">
          <h2 class="page-section__title is-inverted text-center"><?php the_title(); ?></h2>
          <div id="lightgallery" class="row">
            <?php foreach ((array)get_field('gallery') as $item): ?>
              <a href="<?php echo esc_url($item['url']); ?>" class="col-12 col-md-6">
                <figure class="position-relative ratio ratio-5x3 mb-4">
                  <img data-src="<?php echo esc_url($item['sizes']['large']); ?>" data-placeholder-background="dimgray" alt="<?php echo $item['title']; ?>">
                </figure>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
