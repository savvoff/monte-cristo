<?php
  $currency = get_field('currency', 'option');
?>
<section class="modal__wrapper row no-gutters">
  <div class="modal modal-cart col col-lg-8 col-xl-7 rounded shadow-lg m-auto">
    <div class="d-flex flex-column justify-content-center py-3 px-3 px-lg-5">
      <button class="btn-close d-inline-flex p-0 ml-auto" type="button" role="close">
        <svg class="icon-close m-auto">
          <use xlink:href="#close"></use>
        </svg>
      </button>
      <form class="cart-form row mt-4">
        <div class="col-12 col-lg-7">
          <div class="form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Иван Иванов" required name="name">
            </div>
            <div class="form-group">
              <input id="phone-mask-cart" type="tel" class="form-control"  placeholder="38 (096) 000 00 00" required name="phone">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="6" placeholder="Комментарии" name="msg"></textarea>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5">
          <p class="h3 font-weight-normal">Итого:</p>
          <?php
            $delivery = (int)get_field('cost_delivery', 'option');

            if ($delivery > 0) :
              ?>
          <p class="h5 font-weight-normal amount">Сумма заказа: <span class="amount"><?php echo getCartSummary().' '.$currency ?></span></p>
          <p class="h5 font-weight-normal delivery">Доставка: <?php echo $delivery.' '.$currency ?></p>
          <?php
            endif;
            ?>
          <p class="h3 text-orange total">Всего: <span id="sum-total"><?php echo ((int)getCartSummary() + $delivery).' '.$currency ?></span></p>
          <button class="btn btn-orange text-uppercase mt-3" aria-label="Submit" id="fake-submit" type="button">Отправить</button>
          <input type="hidden" name="amount" value="<?php echo getCartSummary(); ?>">
          <input type="hidden" name="delivery" value="<?php echo $delivery; ?>">
          <input id="total" type="hidden" name="total" value="<?php echo ((int)getCartSummary() + $delivery); ?>">
          <?php wp_nonce_field('cart_action', 'cart_nonce') ?>
        </div>
      </form>
    </div>
  </div>
  <input type="hidden" data-modal=".modal-cart">
</section>
