<div class="minicart d-inline-flex">
  <a class="m-auto" href="<?php the_permalink(17) ?>">
    <svg class="icon-cart">
      <use xlink:href="#cart"></use>
    </svg>
  </a>
  <span class="text-white"><?php echo getCartQuantity() ?></span>
</div>