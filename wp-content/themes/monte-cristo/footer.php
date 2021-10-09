  <?php $footer = get_field('footer', 'option'); ?>
  <footer class="site-footer py-4 pt-lg-6">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12 col-lg-5">
        <?php $contact_left = $footer['contact_left']; ?>
          <div class="d-flex mb-4">
            <span class="icon-footer text-secondary">
              <?php echo $contact_left['icon']; ?>
            </span>
            <div class="text-uppercase ms-4">
              <p class="h3 lh-sm"><?php echo $contact_left['title']; ?></p>
              <a class="border-bottom py-2" href="<?php echo $contact_left['link']['url']; ?>" rel="noindex, nofollow" target="<?php echo $contact_left['link']['target'] ?: '_self' ?>"><?php echo $contact_left['link']['title']; ?></a>
            </div>
          </div>
        </div>
        <div class="col d-none d-lg-block text-center">
          <div class="vr h3"></div>
        </div>
        <div class="col-12 col-lg-5">
        <?php $contact_right = $footer['contact_right']; ?>
          <div class="d-flex justify-content-lg-end mb-4">
            <span class="icon-footer text-secondary">
            <?php echo $contact_right['icon']; ?>
            </span>
            <div class="text-uppercase ms-4">
              <p class="h3 lh-sm"><?php echo $contact_right['title']; ?></p>
              <a class="border-bottom py-2" href="<?php echo $contact_right['link']['url']; ?>" rel="noindex, nofollow" target="<?php echo $contact_right['link']['target'] ?: '_self' ?>"><?php echo $contact_right['link']['title']; ?></a>

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
  <button class="btn-to-top h3" type="button" role="button" aria-describedby="To top button"></button>
</main>
<?php wp_footer(); ?>
</body>
</html>
