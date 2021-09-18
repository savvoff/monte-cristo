<?php
  global $post;
?>
<div class="col-12">
  <p class="h6 text-uppercase font-weight-normal text-center mb-4">
    <?php the_field('text', $post[0]->ID); ?>
  </p>
</div>
<div class="col-12">
  <div class="slider slider-gallery mb-3 mb-sm-4">
    <div class="swiper-wrapper">
      <?php
        foreach ((array)get_field('gallery', $post[0]->ID) as $item) :
      ?>
        <div class="swiper-slide rounded border overflow-hidden">
          <div class="swiper-lazy w-100 h-100" data-background="<?php echo $item['url'] ?>">
            <div class="swiper-lazy-preloader"></div>
          </div>
        </div>
      <?php
        endforeach;
      ?>
    </div>
  </div>
  <!-- If we need navigation buttons -->
  <div class="gallery-button__group">
    <div class="gallery-button-prev bg-secondary rounded-circle">
      <svg class="icon-arrow">
        <use xlink:href="#arrow"></use>
      </svg>
    </div>
    <div class="gallery-pagination mx-3 mx-lg-5"></div>
    <div class="gallery-button-next bg-secondary rounded-circle">
      <svg class="icon-arrow">
        <use xlink:href="#arrow"></use>
      </svg>
    </div>
  </div>
</div>
<div class="col-12 d-flex justify-content-center mt-4 mt-sm-5">
 <a href="<?php the_field('url', $post[0]->ID); ?>" class="btn btn-orange text-uppercase my-3<?php get_field('size', $post[0]->ID) ? ' ml-lg-6': ''; ?>" type="button" aria-label="Order" target="_blank">Посмотреть все фото</a>
 <?php if (get_field('size', $post[0]->ID)): ?>
  <p class="text-secondary my-auto ml-3"><?php the_field('size', $post[0]->ID); ?></p>
 <?php endif; ?>
</div>
