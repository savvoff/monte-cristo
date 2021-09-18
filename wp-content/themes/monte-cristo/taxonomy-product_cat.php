<?php
  get_header(); 

  $term = get_queried_object();

  $args = [
    'posts_per_page'  => -1,
    'post_type'       => 'product',
    'product_cat'	  => $term->slug
  ];

  $posts = get_posts($args);

  $states = get_terms([
    'taxonomy'  => 'product_state'
  ]);

  $categories = get_terms([
  	'taxonomy'	=> 'product_cat'
  ]);

?>

<section class="page-section py-4">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <div class="row">
          <div class="col-12">
            <h1 class="h2 page-section__title text-center mb-3 mb-sm-5"><?php echo $term->name ?></h1>
          </div>
        </div>
        <div class="row">
          <div class="form-inline col-12">               
            <div class="form-group mb-3 mr-3" id="category-select">
              <select class="form-control justselect" name="category">
                <option selected disabled value="">Вид</option>

                <?php foreach ((array)$categories as $cat) : ?>
                <option value="<?php echo get_term_link($cat->term_id) ?>"><?php echo $cat->name ?></option>
            	<?php endforeach; ?>
              </select>
            </div>
            <div class="form-group mb-3 mr-3" id="state-select">
              <select class="form-control justselect" name="state">
                <option selected disabled value="">Состояние</option>
                
                <?php foreach ((array)$states as $state) : ?>
                <option value="state-<?php echo $state->slug ?>"><?php echo $state->name ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group mb-3 mr-3" id="price-select">
              <select class="form-control justselect" name="price">
                <option selected disabled value="">Сортировка по цене</option>
                <option value="desc">По убыванию</option>
                <option value="asc">По возрастанию</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-lg-7 col-xl-5" id="product-content">

            <?php 
            	if (count($posts) > 0) : 
            		foreach ((array)$posts as $post) : setup_postdata($post); 
            			get_template_part('page-parts/part-product');
        			endforeach; 
        			wp_reset_postdata(); 
        		else :
        			echo __('Не найдено товаров в данной категории');
        		endif;
        	?>
          </div>

          <!-- Preloader -->
          <div class="col-12" hidden="true">
            <div class="spinner-border text-secondary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
          <!-- end -->
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  get_template_part('/page-parts/part', 'minicart');
  get_footer(); 
?>