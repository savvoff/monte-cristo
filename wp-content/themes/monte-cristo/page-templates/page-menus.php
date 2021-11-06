<?php
/*
  Template Name: Menus page
  Template Post Type: page
  */
get_header();
?>
<section class="page-section page-default">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10">
        <article class="bg-white py-4 py-xl-6">
        <h1 class="page-section__title h2 text-reset text-center"><?php the_title(); ?></h1>
          <?php $thumb = get_the_post_thumbnail_url();
          if ($thumb): ?>
          <figure class="px-4">
            <img class="img-fluid border border-middle border-15 mb-4" src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>">
            <?php $caption = get_post(get_post_thumbnail_id())->post_excerpt;
            if ($caption): ?>
            <figcaption class="text-gray w-75 mb-4 mx-auto">
                <?php echo $caption; ?>
            </figcaption>
            <?php endif; ?>
          </figure>
          <?php endif; ?>
          <?php if (get_field('menus')):
             printf('<a class="d-inline-block h3 fw-normal text-secondary px-3 mb-5 mx-3 mx-lg-5" href="#drinks">%s</a>', get_field('text_to_drinks', 'option'));
             foreach ((array)get_field('menus') as $menu): ?>
            <div <?php echo $menu['separator'] ? 'id="drinks"' : ''; ?>class="table-responsive<?php echo $menu['separator'] ? ' border-top border-secondary mt-4 pt-4' : ''; ?> mx-3 mx-lg-5">
              <table class="table table-borderless">
                <?php foreach ((array)$menu['menu'] as $idx => $row):
                if (!$idx): ?>
                <thead>
                  <tr>
                    <th scope="col"><?php echo $row['items']['content']; ?></th>
                    <th><?php echo $row['items']['content_2']; ?></th>
                  </tr>
                </thead>
                <tbody>
                <?php else: ?>
                <tr>
                  <td scope="col"><?php echo $row['items']['content']; ?></td>
                  <td><?php echo $row['items']['content_2']; ?></td>
                </tr>
                <?php endif; endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endforeach; endif; ?>
        </div>
      </div>
    </div>
    <?php if (get_field('global_gallery')): ?>
    <div class="container">
      <div id="gallery" class="row justify-content-center py-5">
        <div class="col-12 col-lg-10 text-center">
          <h2 class="page-section__title is-inverted"><?php the_field('global_gallery_title'); ?></h2>
          <p class="h5 fw-normal text-white lh-lg w-75 mx-auto"><?php the_field('global_gallery_caption'); ?></p>
        </div>
      </div>
    </div>
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12 bg-lighten-dark py-5">
          <?php
            get_template_part('page-parts/part', 'gallery', array(
              'slides' => get_field('global_gallery')
            ));
          ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
