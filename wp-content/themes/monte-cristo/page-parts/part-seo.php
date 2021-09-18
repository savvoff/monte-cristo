<?php
	$title = $data['title'];
	$class = $data['class'];
	$text = $data['text'];
?>
<section class="page-section py-4 py-lg-6">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <div class="row text-center">
          <div class="col-12">
            <p class="h2 page-section__title mb-3 mb-sm-5"><?php echo $title; ?></p>
          </div>
        </div>
        <div class="row">
          <article class="text-center content-expand col-12">
            <?php 
            	$limit = 300;
            	$isExpandActive = strlen($text) >= $limit ? true : false; ?> 
            <div class="text-left" aria-expanded="<?php echo $isExpandActive ? 'false' : 'true'; ?>">
              <?php echo $text; ?>
            </div>
            <?php if ($isExpandActive): ?>
              <a class="btn-expand h4" role="button"><u><?php echo __('Подробнее', 'kayak') ?></u></a>
            <?php endif; ?>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>