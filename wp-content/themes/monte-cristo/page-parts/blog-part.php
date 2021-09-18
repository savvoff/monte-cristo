<div class="col-12 col-sm-6 col-lg-4 mb-4">
  <a class="d-block h-100 rounded border shadow overflow-hidden" href="<?php the_permalink() ?>">
    <figure class="img-fit h-100 mb-0">
      <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="position-relative img-fluid w-auto h-auto" data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?>" width="" height="" alt="<?php echo get_home_url(); ?>">
      <figcaption class="page-section__desc text-primary py-3 mb-0">
        <strong class="d-flex border-y px-3 py-2 mb-3">
          <?php the_title() ?>
          <svg class="icon-arrow ml-auto my-auto">
            <use xlink:href="#arrow"></use>
          </svg>
        </strong>
        <span class="d-block px-3"><?php echo get_the_excerpt() ?></span>
      </figcaption>
    </figure>
  </a>
</div>