<?php
  $array_defaults = array(
    'classes' => ' position-relative d-block text-uppercase p-3 mb-4',
    'grid' => 'col-12 col-md-6',
    'img' => THEME_URI . '/dist/img/placeholder_featured_image.svg',
    'link' => '#',
    'title' => 'Title',
    'subtitle' => 'Subtitle',
  );

  $args = wp_parse_args($args, $array_defaults);
  $args['img'] = $args['img'] ?: $array_defaults['img'];
?>
<div class="<?php esc_attr_e($args['grid']); ?>">
  <a href="<?php echo esc_url($args['link']); ?>" class="card<?php esc_attr_e($args['classes']); ?>">
    <figure class="ratio ratio-5x3 opacity-50 mb-0">
      <img data-src="<?php echo esc_url($args['img']['url']); ?>" data-placeholder-background="dimgray" alt="<?php esc_attr_e($args['img']['alt']); ?>">
    </figure>
    <div class="position-absolute top-50 translate-middle-y p-4 p-lg-5">
      <h2 class="text-reset lh-sm"><?php echo $args['title']; ?></h2>
      <p class="h4 text-reset fw-normal"><?php echo $args['subtitle']; ?></p>
    </div>
  </a>
</div>
