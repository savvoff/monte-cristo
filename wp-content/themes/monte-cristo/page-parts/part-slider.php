
<?php
  $array_defaults = array(
    'classes' => ' hero-slider',
    'slides' => array(),
    'title' => '',
    'subtitle' => '',
    'badge' => null
  );

  $args = wp_parse_args($args, $array_defaults);
?>
<div class="swiper<?php esc_attr_e($args['classes']); ?>">
  <div class="swiper-wrapper">
    <?php foreach ($args['slides'] as $slide): ?>
      <div class="swiper-slide">
        <img class="w-100 h-100" data-src="<?php esc_attr_e($slide['image']['url']); ?>" data-placeholder-background="dimgray" alt="<?php esc_attr_e($slide['image']['alt']); ?>">
      </div>
    <?php endforeach; ?>
  </div>
  <div class="swiper-pagination"></div>
  <?php if ($args['title'] || $args['subtitle']): ?>
  <div class="hero-slider__content text-center">
    <h1 class="hero-slider__title lh-1"><?php echo $args['title']; ?></h1>
    <h2 class="h5"><?php echo $args['subtitle']; ?></h2>
    <?php if (!empty($args['badge'])): ?>
      <strong class="d-inline-block bg-danger text-uppercase py-2 px-3"><?php _e('New'); ?></strong>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</div>
