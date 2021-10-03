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
        <article class="text-uppercase bg-white py-4 py-xl-5">
          <h1 class="page-section__title h2 text-reset text-center">Lorem, ipsum.</h1>
          <figure class="px-4">
            <img class="img-fluid border border-middle border-15" src="//placehold.it/1280x640" alt="">
            <figcaption class="text-gray w-75 py-4 mx-auto">
              <small>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Harum voluptas saepe, fugiat molestias temporibus obcaecati! Necessitatibus incidunt quia enim quidem voluptatibus porro laudantium adipisci est ipsa? Eum atque harum corporis.
            </small>
            </figcaption>
          </figure>
          <table class="table table-hover w-75 mx-auto">
            <thead>
            <tr>
              <th scope="col">№</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-12">
        <div class="py-4 py-lg-6">
          <h2 class="page-section__title is-inverted text-center">Lorem, ipsum.</h2>
          <div class="row g-0">
          <?php
          for ($i = 0; $i < 3; $i++) {
            get_template_part('page-parts/part', 'card', array(
              'title' => 'Lorem ipsum dolor sit amet consectetur.',
              'subtitle' => 'Lorem ipsum'
            ));
          } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
