
<?php
  $array_defaults = array(
    'classes' => ' gallery-slider',
    'slides' => array()
  );

  $args = wp_parse_args($args, $array_defaults);
?>
<div class="swiper<?php esc_attr_e($args['classes']); ?>">
  <div id="lightgallery" class="swiper-wrapper">
    <a href="//placeimg.com/1920/650" class="swiper-slide">
      <img class="swiper-lazy w-100 h-100" data-src="//placeimg.com/1920/650" alt="">
      <div class="swiper-lazy-preloader"></div>
    </a>
    <a href="//placeimg.com/1920/650" class="swiper-slide">
      <img class="swiper-lazy w-100 h-100" data-src="//placeimg.com/1920/650" alt="">
      <div class="swiper-lazy-preloader"></div>
    </a>
    <a href="//placeimg.com/1920/650" class="swiper-slide">
      <img class="swiper-lazy w-100 h-100" data-src="//placeimg.com/1920/650" alt="">
      <div class="swiper-lazy-preloader"></div>
    </a>
  </div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>
