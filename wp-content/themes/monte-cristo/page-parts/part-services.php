<?php
  $title  = $data['title'];
  $blocks = $data['blocks'];
?>
<section class="page-section is-70-height py-4">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <div class="row text-center">
          <div class="col-12">
            <h1 class="h2 page-section__title mb-3 mb-sm-5"><?php echo $title; ?></h1>
          </div>
        </div>
        <div class="row">
          <?php foreach ($blocks as $block): ?>
          <div class="col-6 col-lg-3 mb-4">
            <a class="d-block h-100" href="<?php echo $block['url'] ?>">
              <figure class="img-fit text-center bg-light-blue rounded shadow h-100 py-3 mb-0">
                <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="position-relative img-fluid w-auto h-auto mb-3" data-src="<?php echo $block['img']; ?>" width="" height="" alt="<?php echo get_home_url(); ?>">
                <figcaption class="h6 border-top border-white text-secondary pt-2 pt-sm-3 px-sm-4 mb-0"><?php echo $block['title']; ?></figcaption>
              </figure>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>