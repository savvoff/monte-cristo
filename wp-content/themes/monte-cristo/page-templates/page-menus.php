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
      <div class="col-12">
        <article class="text-uppercase bg-white py-4 py-xl-6">
        <h1 class="page-section__title h2 text-reset text-center"><?php the_title(); ?></h1>
          <?php $thumb = get_the_post_thumbnail_url();
          if ($thumb): ?>
          <figure class="px-4">
            <img class="img-fluid border border-middle border-15 mb-4" src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>">
            <?php $caption = get_post(get_post_thumbnail_id())->post_excerpt;
            if ($caption): ?>
            <figcaption class="text-gray w-75 mb-4 mx-auto">
              <small>
                <?php echo $caption; ?>
              </small>
            </figcaption>
            <?php endif; ?>
          </figure>
          <?php endif; ?>
          <?php if (get_field('menus')):
             foreach ((array)get_field('menus') as $menu): ?>
            <div class="table-responsive mx-3 mx-lg-5">
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
      <div class="col-12">
        <div class="py-5 py-lg-6">
          <h2 class="page-section__title is-inverted text-center"><?php the_field('text_above_news', 'option') ?></h2>
          <div class="row g-0">
          <?php
          $args = array(
            'numberposts' => -1,
            'post_type'   => 'post'
          );
          $posts = get_posts($args);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part('page-parts/part', 'card', array(
              'title' => get_the_title(),
              'subtitle' => get_the_excerpt(),
              'categories' => get_categories(),
              'img' => get_the_post_thumbnail_url(),
              'link' => get_permalink()
            ));
          }
          wp_reset_postdata(); ?>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
