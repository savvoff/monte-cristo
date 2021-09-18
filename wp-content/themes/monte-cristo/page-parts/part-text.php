<?php
  $title = $data['title'];
  $class = $data['class'];
  $text = $data['text'];
?>
<section class="page-section py-4 py-lg-6">
  <div class="container-fluid">
    <?php if ($title): ?> 
    <div class="row">
      <div class="col-12">
        <h1 class="h2 page-section__title text-center mb-3 mb-sm-5"><?php echo $title; ?></h1>
      </div>
    </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="article col">
            <?php
              echo $text;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>