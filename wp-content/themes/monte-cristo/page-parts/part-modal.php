<?php
  $title = $data['title'];
  $class = $data['class'];
  $to = get_field('email_address', get_the_ID());
?>
<section class="modal__wrapper row no-gutters simple-modal">
  <div class="modal modal-order col col-lg-5 col-xl-4 rounded shadow-lg m-auto">
    <div class="d-flex flex-column justify-content-center py-3 px-3 px-lg-5">
      <button class="btn-close d-inline-flex p-0 ml-auto" type="button" role="close">
        <svg class="icon-close m-auto">
          <use xlink:href="#close"></use>
        </svg>
      </button>
      <div class="text-center">
        <p class="h2 text-uppercase my-3"><?php _e($title); ?></p>
      </div>
      <form class="form simple-form">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="<?php echo __('Иван Иванов', 'kayak') ?>" name="name" required>
        </div>
        <div class="form-group">
          <input id="phone-mask" type="tel" class="form-control"  placeholder="38 (096) 000 00 00" name="phone" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="msg" rows="6" placeholder="<?php echo __('Комментарий', 'kayak') ?>"></textarea>
        </div>
        <?php wp_nonce_field('simple_action', 'simple_nonce') ?>
        <?php if ($to): ?>
          <input type="hidden" name="to" value="<?php esc_attr_e($to); ?>">
        <?php endif; ?>
        <div class="form-group text-center">
          <button class="btn btn-orange text-uppercase" type="submit" aria-label="Submit"><?php echo __('Отправить', 'kayak') ?></button>
        </div>
      </form>
    </div>
  </div>
  <input type="hidden" data-modal=".modal-order">
</section>
