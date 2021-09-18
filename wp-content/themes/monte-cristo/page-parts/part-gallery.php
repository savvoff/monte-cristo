<?php
	$title   = $data['title'];
	$class   = $data['class'];
  $gallery = $data['gallery'];
?>
<section class="page-section bg-secondary <?php esc_attr_e($class); ?> py-4 py-lg-6">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <div class="row text-center">
          <div class="col-12">
            <p class="h2 page-section__title text-white mb-3 mb-sm-5"><?php echo $title; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="slider slider-gallery mb-3 mb-sm-4">
              <div class="swiper-wrapper">
                <?php foreach ((array)$gallery as $item) : ?>
                <div class="swiper-slide rounded overflow-hidden">
                  <div class="swiper-lazy w-100 h-100" data-background="<?php echo $item['sizes']['large'] ?>">
                    <div class="swiper-lazy-preloader"></div>
                  </div> 
                </div>    
                <?php endforeach; ?>            
              </div>
            </div>            
            <!-- If we need navigation buttons -->
            <div class="gallery-button__group">
              <div class="gallery-button-prev bg-white rounded-circle">
                <svg class="icon-arrow">
                  <use xlink:href="#arrow"></use>
                </svg>
              </div>
              <div class="gallery-pagination mx-3 mx-lg-5"></div>
              <div class="gallery-button-next bg-white rounded-circle">
                <svg class="icon-arrow">
                  <use xlink:href="#arrow"></use>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>