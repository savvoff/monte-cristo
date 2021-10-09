  <footer class="site-footer py-4 pt-lg-6">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12 col-lg-5">
          <div class="d-flex mb-4">
            <svg class="icon-footer">
              <use xlink:href="#chatting"></use>
            </svg>
            <div class="text-uppercase ms-4">
              <p class="h3 lh-1">ПОДЕЛИТЕСЬ СВОИМИ ВПЕЧАТЛЕНИЯМИ</p>
              <a class="border-bottom py-2" href="">ОСТАВИТЬ ОТЗЫВ</a>
            </div>
          </div>
        </div>
        <div class="col d-none d-lg-block text-center">
          <div class="vr h3"></div>
        </div>
        <div class="col-12 col-lg-5">
          <div class="d-flex justify-content-lg-end mb-4">
            <svg class="icon-footer">
              <use xlink:href="#email"></use>
            </svg>
            <div class="text-uppercase ms-4">
              <p class="h3 lh-1">ПОДПИСКА НА НОВОСТИ</p>
              <a class="border-bottom py-2" href="">ПОДПИСАТЬСЯ НА РАССЫЛКУ</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      <?php if (has_nav_menu('footer')) :
          wp_nav_menu([
            'depth' => 1,
            'theme_location' => 'footer',
            'container' => null,
            'items_wrap' => '<ul class="d-flex flex-wrap justify-content-around list-unstyled text-uppercase px-5">%3$s</ul>']);
          endif; ?>
      </div>
    </div>
  </footer>
</main>
<?php wp_footer(); ?>
</body>
</html>
