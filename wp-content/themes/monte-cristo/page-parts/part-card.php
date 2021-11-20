<?php
  $array_defaults = array(
    'classes' => ' text-uppercase p-4',
    'grid' => 'col-12 col-md-4',
    'img' => THEME_URI . '/dist/img/placeholder_featured_image.svg',
    'title' => 'Title',
    'subtitle' => 'Subtitle',
    'link' => '#'
  );

  $args = wp_parse_args($args, $array_defaults);
  $args['img'] = $args['img'] ?: $array_defaults['img'];
?>
<div class="<?php esc_attr_e($args['grid']); ?>">
  <div class="card<?php esc_attr_e($args['classes']); ?>">
    <figure class="ratio ratio-5x3">
      <img data-src="<?php echo esc_url($args['img']); ?>" data-placeholder-background="dimgray" alt="<?php bloginfo('name'); ?>">
    </figure>
    <h3 class="text-reset lh-sm"><?php echo $args['title']; ?></h3>
    <p class="h6 hstack text-reset fw-normal"><?php
    foreach ((array)$args['categories'] as $key => $cat) {
      echo $key ?  '<span class="vr mx-2"></span>' . $cat->name : $cat->name;
    }
    //echo $args['subtitle'];
    ?></p>
    <a class="btn btn-link btn-outline-main stretched-link" href="<?php echo esc_url($args['link']); ?>"><?php the_field('read_more', 'option'); ?></a>
  </div>
</div>
