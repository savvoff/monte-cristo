<?php
  $array_defaults = array(
    'classes' => ' text-uppercase p-4',
    'grid' => 'col-12 col-md-4',
    'img' => '//placehold.it/400x300',
    'title' => 'Title',
    'subtitle' => 'Subtitle',
  );

  $args = wp_parse_args($args, $array_defaults);
?>
<div class="<?php esc_attr_e($args['grid']); ?>">
  <div class="card<?php esc_attr_e($args['classes']); ?>">
    <figure class="ratio ratio-5x3">
      <img src="<?php echo esc_url($args['img']); ?>" alt="">
    </figure>
    <h3 class="text-reset lh-1"><?php echo $args['title']; ?></h3>
    <p class="h6 text-reset fw-normal"><?php echo $args['subtitle']; ?></p>
    <a class="btn btn-link btn-outline-dark stretched-link" href="">More info</a>
  </div>
</div>
