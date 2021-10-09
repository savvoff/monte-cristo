
<?php
  $array_defaults = array(
    'classes' => ' gallery-slider',
    'slides' => array()
  );

  $args = wp_parse_args($args, $array_defaults);
?>
<div class="swiper<?php esc_attr_e($args['classes']); ?>">
  <div id="lightgallery" class="swiper-wrapper">
    <?php foreach ((array)$args['slides'] as $slide): ?>
      <a href="<?php esc_attr_e($slide['url']); ?>" class="swiper-slide">
        <img class="w-100 h-100" data-src="<?php esc_attr_e($slide['sizes']['large']); ?>" data-placeholder-background="dimgray" alt="<?php esc_attr_e($slide['caption']); ?>">
      </a>
    <?php endforeach; ?>
  </div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>
