<?php
  /*
  Template Name: Cart page
  Template Post Type: page
  */
  get_header(); 
  $products = $_SESSION['products'];
?>


<section class="page-section cart py-4">
  <?php get_template_part('page-parts/part-modal', 'cart'); ?>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-xl-10">
        <div class="row">
          <div class="col-12">
            <h1 class="h2 page-section__title text-center mb-3 mb-sm-5"><?php the_title() ?></h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-7 col-xl-8 mb-5">
            <div class="rounded shadow-lg py-3 py-lg-5 pl-3 pl-lg-5 pr-3 pr-lg-0">
              <ul class="list-unstyled mb-0">
                <?php
                  if ($products) :
                    foreach ($products as $id => $q) :
                      $product = get_post($id);
                ?>
                <li class="position-relative row mb-3">
                  <div class="col-12 col-sm-6">
                    <a href="<?php echo get_the_permalink($id) ?>" class="d-block rounded border overflow-hidden mb-3 mb-sm-0">
                      <figure class="img-fit img-fit_contain ratio-4x3 bg-white w-100 m-0">
                        <img class="position-absolute img-fluid" src="<?php echo get_field('gallery', $id)[0]['sizes']['medium_large'] ?>" width="" height="" alt="<?php echo get_field('gallery', $id)[0]['alt']; ?>">
                      </figure>
                    </a>
                  </div>
                  <div class="d-flex flex-column col-12 col-sm-6">
                    <p class="h3"><?php echo $product->post_title ?></p>
                    <p class="h5 font-weight-normal"><?php echo $q ?> шт</p>
                    <p class="page-section__desc text-secondary mt-auto mb-0"><?php echo get_field('price', $id).' '.get_field('currency', 'option') ?></p>
                  </div>
                  <span class="btn-clear d-inline-flex" data-id="<?php echo $id ?>">
                    <svg class="icon-delete m-auto">
                      <use xlink:href="#delete"></use>
                    </svg>
                  </span>
                </li>
                <hr class="border-light-blue my-4">
                <?php
                    endforeach;
                  else :
                    echo __('Нет товаров в корзине', 'kayak');
                  endif;
                ?>
              </ul>
            </div>
          </div>
          <div class="col-12 col-lg-5 col-xl-4 mb-5">
            <div class="rounded shadow-lg py-3 py-lg-5 pl-3 pl-lg-5 pr-0">
              <p class="h3 font-weight-normal mb-5">Сумма заказа:</p>
              <p class="h3 amount mb-5"><?php echo getCartSummary().' '.get_field('currency', 'option') ?></p>
              <button class="btn btn-orange text-uppercase" type="submit" aria-label="Submit" data-modal=".modal-cart"<?php echo (int)getCartSummary() ? '' : ' disabled'; ?>>Оформить заказ</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>