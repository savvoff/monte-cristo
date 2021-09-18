<?php
  $type = $data['type'];
?>
<section class="page-section bg-secondary py-4 py-lg-6">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">

        <?php if ($type == 'cost') : ?>
        <div class="row text-center">
          <div class="col-12">
            <p class="h2 page-section__title text-white mb-3 mb-sm-5"><?php the_sub_field('title') ?></p>
          </div>
        </div>
        <div class="row mb-3 mb-sm-5">
          <div class="col-12">
            <div class="angle bg-light-blue p-4 py-md-5 px-md-6">
              <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                  <?php
                    $els = get_sub_field('elements');

                    $delim = (count($els) % 2 == 0) ? count($els)/2 : ceil(count($els)/2) - 1;

                    foreach ((array)$els as $key => $item) :
                      if ($key == $delim)
                        echo '</div><div class="col-12 col-md-6">';
                  ?>
                  <p class="h4 border-white border-bottom py-3"><?php echo $item['text'] ?></p>
                  <?php
                    endforeach;
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>


        <?php if ($type == 'prices_columns') : ?>
        <div class="row text-center">
          <div class="col-12">
            <p class="h2 page-section__title text-white mb-3 mb-sm-5"><?php the_sub_field('title') ?></p>
          </div>
        </div>
        <div class="row justify-content-center">
           <?php
            foreach ((array)get_sub_field('elements') as $key => $item) :
              $class        = ($key == 1) ? 'bg-orange'     : 'bg-white';
              $textClass    = ($key == 1) ? 'text-orange'   : 'text-secondary';
              $borderClass  = ($key == 1) ? 'border-orange' : '';

           ?>
           <div class="col-4">
             <div class="price-block d-flex flex-column text-center h-100 rounded p-sm-4">
              <figure class="img-fit img-fit_contain text-center rounded <?php echo $class ?> shadow-lg ratio-1x1 mx-md-3 mx-lg-5 mx-2xl-6">
                <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="position-absolute img-fluid mb-3" data-src="<?php echo $item['image']['sizes']['medium'] ?>" width="" height="" alt="<?php echo $item['image']['alt'] ?>">
              </figure>
              <p class="page-section__text"><?php echo $item['name'] ?></p>
              <div class="mt-auto">
                <strong class="h5 d-inline-block <?php echo $textClass ?> border <?php echo $borderClass ?> rounded p-2 px-sm-3">
                  <?php echo $item['price'] ?>
                </strong>
              </div>
             </div>
           </div>
           <?php
            endforeach;
           ?>

            <?php
              $order = get_sub_field('order');

              if (!empty($order)) :
            ?>
           <div class="col-12 col-sm-5 text-center mx-auto">
             <a class="btn btn-block btn-orange text-uppercase mt-4 mt-sm-5" href="<?php echo $order ?>" target="_blank">
              <?php echo __('Заказать', 'kayak') ?>
             </a>
           </div>
           <?php
              else:
           ?>
           <div class="col-12 col-sm-5 text-center mx-auto">
             <button class="btn btn-block btn-orange text-uppercase mt-4 mt-sm-5" type="button" aria-label="Order" data-modal=".modal-order">
              <?php echo __('Заказать', 'kayak') ?>
             </button>
           </div>
           <?php
              endif;
           ?>
        </div>
        <?php endif; ?>


        <?php if ($type == 'prices_left') : ?>
        <div class="row text-center">
          <div class="col-12">
            <p class="h2 page-section__title text-white mb-3 mb-sm-5"><?php the_sub_field('title') ?></p>
          </div>
        </div>

        <?php
          $product = get_sub_field('element');
        ?>
        <div class="row">
           <div class="col-12 col-lg-5">
              <figure class="img-fit img-fit_contain bg-white ratio-16x9 shadow-lg-darken rounded overflow-hidden">
               <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="position-absolute" data-src="<?php echo $product['image']['sizes']['medium_large'] ?>" width="" height="" alt="<?php echo $product['image']['alt'] ?>">
              </figure>
              <?php
                foreach ((array)$product['attrs'] as $attr) :
              ?>
              <p class="text-white font-weight-light text-center py-3">
                <?php echo $attr['text'] ?>
                <strong><?php echo $attr['value'] ?></strong><br/>
              <?php
                endforeach;
              ?>
              <?php echo __('Цена:', 'kayak') ?>
                <strong class="bg-white text-orange border border-orange rounded-sm p-1">
                  <?php echo $product['price'] ?>
                </strong>
              </p>
           </div>
           <div class="col-12 col-lg-7">
             <figure class="img-fit ratio-16x9 shadow-lg-darken rounded overflow-hidden">
               <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="position-absolute" data-src="<?php echo get_sub_field('image')['sizes']['large'] ?>" width="" height="" alt="<?php echo get_sub_field('image')['alt']; ?>">
             </figure>
           </div>
           <?php
            $order = get_sub_field('link');

            if (!empty($order)) :
           ?>
           <div class="col-12 col-sm-5 text-center mx-auto">
            <a class="btn btn-block btn-orange text-uppercase mt-4 mt-sm-5" href="<?php echo $order ?>" target="_blank">
             <?php echo __('Заказать', 'kayak') ?>
            </a>
           </div>
           <?php
              else:
           ?>
           <div class="col-12 col-sm-5 text-center mx-auto">
             <button class="btn btn-block btn-orange text-uppercase mt-4 mt-sm-5" type="button" aria-label="Order" data-modal=".modal-order">
              <?php echo __('Заказать', 'kayak') ?>
             </button>
           </div>
           <?php
            endif;
           ?>
        </div>
        <?php endif; ?>

        <?php if ($type == 'prices_regular') : ?>
        <div class="row text-center">
          <div class="col-12">
            <p class="h2 page-section__title text-white mb-3 mb-sm-5"><?php the_sub_field('title') ?></p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="border-white rounded p-3 py-md-4 px-md-5 mb-3 mb-sm-5" style="border-style:dashed;">
              <p class="h4 font-weight-normal text-white mb-0">
                <?php the_sub_field('text') ?>
              </p>
            </div>
          </div>
          <?php
            foreach ((array)get_sub_field('elements') as $key => $item) :
              $borderClass  = ($key == 1) ? 'border-orange' : '';
              $hrClass      = ($key == 1) ? 'border-pink'   : 'border-light-blue';
              $bgClass      = ($key == 1) ? 'bg-orange'     : 'bg-secondary';
          ?>
          <div class="col-12 col-lg-4">
            <div class="bg-white <?php echo $borderClass ?> rounded p-2 my-3">
              <div class="border rounded text-center px-1 py-3">
                <p class="h5"><?php echo $item['name'] ?></p>

                <?php foreach ((array)$item['list'] as $li) : ?>
                <hr class="<?php echo $hrClass ?>" style="border-style:dashed;">
                <p class="h5 font-weight-light"><?php echo $li['text'] ?></p>
                <?php endforeach; ?>

                <hr class="<?php echo $hrClass ?>" style="border-style:dashed;">
                <strong class="h5 d-inline-block <?php echo $bgClass ?> text-white rounded p-2 px-sm-3"><?php echo $item['price'] ?></strong>
              </div>
            </div>
          </div>
          <?php
            endforeach;
          ?>

          <?php
            $order = get_sub_field('order');

            if (!empty($order)) :
          ?>
          <div class="col-12 col-sm-5 text-center mx-auto">
            <a class="btn btn-block btn-orange text-uppercase mt-4 mt-sm-5" href="<?php echo $order ?>" target="_blank">
              <?php echo __('Заказать', 'kayak') ?>
            </a>
          </div>
          <?php
              else:
           ?>
           <div class="col-12 col-sm-5 text-center mx-auto">
             <button class="btn btn-block btn-orange text-uppercase mt-4 mt-sm-5" type="button" aria-label="Order" data-modal=".modal-order">
              <?php echo __('Заказать', 'kayak') ?>
             </button>
           </div>
          <?php
            endif;
          ?>
        </div>
        <?php endif; ?>

        <?php if ($type == 'prices_vip') : ?>
        <div class="row text-center">
          <div class="col-12">
            <p class="h2 page-section__title text-white mb-3 mb-sm-5"><?php the_sub_field('title') ?></p>
          </div>
        </div>
        <div class="row justify-content-center">
          <?php
            foreach ((array)get_sub_field('elements') as $key => $item) :

              $hrClass      = ($key == 0) ? 'border-pink'   : 'border-light-blue';
              $textClass    = ($key == 0) ? 'text-orange'   : '';
              $borderClass  = ($key == 0) ? 'border-orange' : '';
          ?>
          <div class="col-12 col-lg-6">
            <div class="bg-white rounded p-2 my-3">
              <div class="border <?php if ($key == 0) echo 'border-orange' ?> rounded text-center p-3">
                <p class="h4 mb-4"><?php echo $item['name'] ?></p>
                <div class="text-left">
                  <?php
                    foreach ((array)$item['list'] as $li) :
                  ?>
                  <p class="h5 d-flex align-items-center font-weight-light">
                    <svg class="icon-check <?php if (!$li['enabled']) echo 'invisible' ?> mr-3">
                      <use xlink:href="#check"></use>
                    </svg>
                    <span><?php echo $li['text'] ?></span></p>
                  <hr class="<?php echo $hrClass ?>" style="border-style:dashed;">
                  <?php
                    endforeach;
                  ?>
                </div>

                <?php if (!empty($item['price'])) : ?>
                <p class="my-3">
                  <strong class="h5 d-inline-block <?php echo $textClass ?> border <?php echo $borderClass ?> rounded p-2 px-sm-3">
                    <?php echo $item['price'] ?>
                  </strong>
                </p>
                <?php endif; ?>

                <?php
                  if (!empty($item['order'])) :
                ?>
                <a class="btn btn-orange text-uppercase" href="<?php echo $item['order'] ?>" target="_blank">
                  <?php echo __('Заказать', 'kayak') ?>
                </a>
                <?php
              else:
              ?>
                <button class="btn btn-block btn-orange text-uppercase" type="button" aria-label="Order" data-modal=".modal-order">
                  <?php echo __('Заказать', 'kayak') ?>
                </button>
                <?php
                  endif;
                ?>
              </div>
            </div>
          </div>
          <?php
            endforeach;
          ?>

        </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
