<?php
	$title = $data['title'];
	$desc = $data['desc'];
  $info = $data['info'];
	$class = $data['class'];
	$img = $data['img'];
	$img_mob = $data['img_mob'];
	$order = $data['order'];
?>
<section class="page-section hero <?php echo $class ?: ''; ?> h-100">
  <figure class="<?php echo $img_mob ? 'ratio-11x4 d-none d-md-block ': ''; ?>img-fit m-0">
    <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="position-absolute img-fluid" data-src="<?php echo $img; ?>" width="" height="" alt="<?php echo get_home_url(); ?>">
  </figure>
  <?php if ($img_mob): ?>
  <figure class="ratio-4x3 img-fit d-block d-md-none m-0">
    <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="position-absolute img-fluid" data-src="<?php echo $img_mob; ?>" width="" height="" alt="<?php echo get_home_url(); ?>">
  </figure>
  <?php endif; ?>
  <div class="page-section_center container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <?php if ($title): ?>
        <h1 class="page-section__title">
         <?php echo $title; ?>
        </h1>
        <?php endif; ?>
        <?php if ($desc): ?>
        <h2 class="h4 font-weight-normal">
          <?php echo $desc; ?>
        </h2>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if ($info || $order): ?>
  <div class="container-fluid mt-n4 mt-lg-n6">
    <div class="row justify-content-center">
      <?php
      if (!empty($info)) : ?>
      <div class="col-11 col-sm-10">
        <div class="bg-white rounded shadow p-2">
          <div class="border rounded text-left py-2 py-lg-4 px-3 px-lg-5">
          <?php echo $info; ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <?php
      if (!empty($order) && $order['url'] && $order['url'] != '#') : ?>
      <div class="col-12 col-sm-5">
        <a class="btn btn-block btn-orange text-uppercase mt-4 mt-sm-5" href="<?php echo esc_url($order['url']); ?>" target="_blank" style="z-index:1">
          <?php _e($order['title'], 'kayak') ?>
        </a>
      </div>
      <?php else: ?>
      <div class="col-12 col-sm-5">
        <button class="btn btn-block btn-orange text-uppercase mt-4 mt-sm-5" type="button" aria-label="Order" data-modal=".modal-order" style="z-index:1">
          <?php _e($order['title'], 'kayak') ?>
        </button>
      </div>
    <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
</section>
