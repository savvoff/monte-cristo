<?php
/*
  Template Name: Basic template
  Template Post Type: page
  */
get_header();
?>
<section class="page-section page-default">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10">
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
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente facilis inventore aperiam excepturi vel repellendus unde eligendi ratione voluptate praesentium, similique necessitatibus minus beatae a magni tempore impedit temporibus? Voluptate!
          Cum, possimus. Aspernatur, quos eum? Dolores corrupti molestias voluptate eligendi aut. Dicta nulla quam quia dolores laboriosam, praesentium aspernatur, voluptates nisi dolore, maxime nobis unde quasi porro corporis harum expedita!
          Similique quasi incidunt iste magni dolores necessitatibus eum aut dignissimos neque dolor saepe quis omnis deleniti quibusdam vitae id, libero facilis, soluta in! Sed, ab. Error consequatur deserunt nam harum?
          Quia eaque aliquid ex recusandae delectus, distinctio ducimus eligendi. Magnam perferendis tenetur libero hic provident sapiente deleniti, eius qui aliquid quisquam quaerat dolorum adipisci itaque dicta ab. Nesciunt, ipsum dolorum!
          Asperiores cum minima culpa, id magnam laudantium eligendi amet repellat dolore earum impedit repudiandae quis quidem, enim vel recusandae quod officia quia eum labore aliquid deserunt ea. Repellat, doloribus vero!
          Sint reiciendis nihil velit unde recusandae labore amet inventore dicta quos? Id deleniti dolore facere consequuntur temporibus sapiente voluptatibus aliquam quas laboriosam? Omnis nihil ex illo? Voluptas quod vel magni?
          Atque quasi qui reiciendis suscipit magnam laboriosam distinctio culpa. Nulla dignissimos nobis voluptatum repudiandae fuga, nihil beatae laborum. Veritatis tenetur obcaecati enim dignissimos, voluptatibus voluptates error animi harum maxime quos!
          Pariatur veritatis corrupti unde commodi accusantium modi nostrum architecto consectetur ullam atque? Quas eaque, inventore quia, enim corporis eveniet consectetur ex temporibus, odio blanditiis reiciendis error veritatis voluptatem expedita nulla!
          Iusto quibusdam ipsum cum qui itaque sapiente quasi voluptate nemo omnis natus magni, inventore eaque velit voluptatibus repellendus. Qui reprehenderit ipsa illo quibusdam nemo tempore nisi suscipit dolor repellat aliquam.
          Laborum ut natus similique pariatur, accusamus qui reprehenderit, corporis quasi culpa cupiditate excepturi voluptatem magnam eveniet in nemo reiciendis amet? Ab iure nesciunt unde quis voluptatibus? Impedit voluptate error rem!
          Praesentium saepe quos voluptatibus, quidem quia alias. Quasi asperiores velit, possimus sint iure quibusdam assumenda sunt hic eos tempore illo perspiciatis quos? Vitae aperiam obcaecati, neque sint porro sunt beatae?
          Dolorem exercitationem nesciunt provident cupiditate, ipsum recusandae, iure nemo adipisci et esse id qui in maiores voluptatibus labore ullam consequatur. Quasi sapiente nam dignissimos est dolorem recusandae repellendus quisquam quas!
          Nobis id magnam fugit optio dicta. Magnam inventore reprehenderit similique corrupti sint molestias dolore ab libero nihil, animi sunt eum sequi aliquid, obcaecati numquam unde, asperiores adipisci qui atque aspernatur?
          Perferendis quod sequi rerum est consequatur expedita nobis nostrum eos recusandae architecto natus minima assumenda illum sint veniam, quibusdam corporis enim numquam hic, doloribus voluptatum. Neque id recusandae ipsam error.
        </p>
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
