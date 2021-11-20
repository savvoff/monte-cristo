  <?php $footer = get_field('footer', 'option'); ?>
  <footer class="site-footer py-4 pt-lg-6">
    <div class="container">
      <div class="row mb-5">
        <?php $contacts = $footer['contacts'];
        foreach ($contacts as $key => $contact): ?>
        <div class="col">
          <div class="position-relative d-flex<?php echo count($contacts) - 1 == $key ? ' justify-content-lg-end' : ''; ?> mb-5">
            <span class="icon-footer text-secondary">
              <?php echo $contact['icon']; ?>
            </span>
            <div class="text-uppercase ms-4">
              <p class="h3 lh-sm"><?php echo $contact['title']; ?></p>
              <a class="fs-5 fw-normal stretched-link lh-lg py-2" href="<?php echo $contact['link']['url']; ?>" rel="noindex, nofollow" target="<?php echo $contact['link']['target'] ?: '_self' ?>"><?php echo $contact['link']['title']; ?></a>
            </div>
          </div>
        </div>
        <?php if (count($contacts) - 1 != $key): ?>
        <div class="col-1 d-none d-lg-block text-center">
          <div class="vr h3"></div>
        </div>
        <?php endif; endforeach; ?>
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
