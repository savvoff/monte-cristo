
<?php
  $array_defaults = array(
    'classes' => ' hero-slider',
    'slides' => array(),
    'title' => '',
    'subtitle' => '',
  );

  $args = wp_parse_args($args, $array_defaults);
?>
<div class="swiper<?php esc_attr_e($args['classes']); ?>">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <img class="swiper-lazy w-100 h-100" data-src="//placeimg.com/1920/650" alt="">
      <div class="swiper-lazy-preloader"></div>
    </div>
    <div class="swiper-slide">
      <img class="swiper-lazy w-100 h-100" data-src="//placeimg.com/1920/650" alt="">
      <div class="swiper-lazy-preloader"></div>
    </div>
    <div class="swiper-slide">
      <img class="swiper-lazy w-100 h-100" data-src="//placeimg.com/1920/650" alt="">
      <div class="swiper-lazy-preloader"></div>
    </div>
  </div>
  <div class="swiper-pagination"></div>
  <?php if ($args['title'] || $args['subtitle']): ?>
  <div class="hero-slider__content text-center">
    <h1 class="hero-slider__title lh-1"><?php echo $args['title']; ?></h1>
    <h2 class="h5"><?php echo $args['subtitle']; ?></h2>
    <strong class="d-inline-block bg-danger text-uppercase py-2 px-3">Novie</strong>
  </div>
  <?php endif; ?>
</div>
