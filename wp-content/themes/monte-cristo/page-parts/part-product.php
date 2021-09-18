<?php
  $states = get_the_terms(get_the_ID(), 'product_state');

  $states_str = '';
  if ($states) :
    foreach ($states as $st) 
      $states_str .= 'state-'.$st->slug;
  endif;

?>
<a href="<?php the_permalink() ?>" class="d-block bg-white rounded shadow-lg border overflow-hidden mb-4 <?php echo $states_str ?>">
  <figure class="img-fit img-fit_contain ratio-16x9">
    <img class="position-absolute" src="<?php echo get_field('gallery')[0]['sizes']['medium_large'] ?>" width="" height="" alt="<?php echo get_field('gallery')[0]['alt'] ?>">
  </figure>
  <div class="border-top p-4 px-lg-5 text-center">
    <p class="page-section__desc">
      <?php the_title() ?>
    </p>
    <p class="h6 text-primary font-weight-normal text-left">
      <?php echo get_the_excerpt() ?>
    </p>
    <button class="btn btn-orange" type="button" aria-label="More info">
      <?php echo get_field('price').' '.get_field('currency', 'option') ?>
    </button>
  </div>
</a>