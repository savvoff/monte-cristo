<?php
  $widget = get_field('widget', 'option');
?>
<section class="modal__wrapper row no-gutters">
  <div class="modal modal-price-widget col col-lg-10 col-xl-8 rounded shadow-lg m-auto">
    <div class="d-flex flex-column justify-content-center py-3 px-3 px-lg-5">
      <button class="btn-close d-inline-flex p-0 ml-auto" type="button" role="close">
        <svg class="icon-close m-auto">
          <use xlink:href="#close"></use>
        </svg>
      </button>
      <div class="text-center mb-4">
        <p class="h2 text-uppercase my-3"><?php echo $widget['title'] ?></p>
      </div>
      <div class="row">
        <div class="col-12 col-lg-4">
          <figure class="img-fit img-fit_contain bg-white ratio-4x3 border rounded overflow-hidden">
            <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="position-absolute" data-src="<?php echo $widget['image']['sizes']['medium'] ?>" width="" height="" alt="<?php echo get_home_url(); ?>">
          </figure>
          <p class="text-secondary"><?php echo $widget['label'] ?></p>
        </div>

        <div class="col-12 col-lg-8">
          <?php
            foreach ($widget['elements'] as $block) :
          ?>
          <p class="h4"><?php echo $block['subtitle'] ?></p>
          <div class="table-responsive-sm mb-3">
            <table class="table text-uppercase table-striped" style="border-spacing: 0.2rem;">
              <tbody>

                <tr class="text-secondary">
                <?php foreach ($block['table'] as $column) : ?>
                  <th class="font-weight-normal"><?php echo $column['time'] ?></th>
                <?php endforeach; ?>
                </tr>

                <tr class="text-secondary">
                <?php foreach ($block['table'] as $column) : ?>
                  <th class="font-weight-normal"><?php echo $column['price'] ?></th>
                <?php endforeach; ?>
                </tr>

              </tbody>
            </table>
          </div>
          <?php
            endforeach;
          ?>
        </div>
      </div>
      <div class="form-group text-center">
        <?php if ($widget['link']): ?>
          <a href="<?php echo $widget['link'] ?>" class="btn btn-orange text-uppercase"><?php echo __('Заказать', 'kayak') ?></a>
        <?php else: ?>
          <button class="btn btn-orange text-uppercase" type="button" aria-label="Order" data-modal=".modal-order">
            <?php echo __('Заказать', 'kayak') ?>
          </button>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <input type="hidden" data-modal=".modal-price-widget">
</section>
