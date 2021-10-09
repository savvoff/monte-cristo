<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="theme-color" content="#fff">
  <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, shrink-to-fit=no">
  <title><?php bloginfo('name'); ?><?php wp_title() ?></title>
  <link rel="shortcut icon" href="<?php echo THEME_URI; ?>/dist/img/favicons/favicon.ico" type="image/x-icon">
  <link rel="icon" sizes="16x16" href="<?php echo THEME_URI; ?>/dist/img/favicons/favicon-16x16.png" type="image/png">
  <link rel="icon" sizes="32x32" href="<?php echo THEME_URI; ?>/dist/img/favicons/favicon-32x32.png" type="image/png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo THEME_URI; ?>/dist/img/favicons/apple-touch-icon-precomposed.png">
  <link rel="apple-touch-icon" href="<?php echo THEME_URI; ?>/dist/img/favicons/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo THEME_URI; ?>/dist/img/favicons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo THEME_URI; ?>/dist/img/favicons/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEME_URI; ?>/dist/img/favicons/apple-touch-icon-72x72.png">
  <?php wp_head(); ?>
  <script>
    var themePath = '<?php echo THEME_URI; ?>';
  </script>
  <noscript>
    <style>
      [data-simplebar] {
        overflow: auto;
      }
    </style>
  </noscript>
</head>

<body <?php body_class(); ?> off-style="overflow-y: hidden;">
  <?php if (function_exists('wp_body_open')) wp_body_open(); ?>
  <!-- Sprite -->
  <div id="svg-sprites" style="width: 0; height: 0; visibility: hidden;"></div>
  <!-- Sprite end -->

  <header class="site-header py-2">
    <button id="nav-toggle" class="btn burger-container bg-transparent d-lg-none">
      <div class="burger-bar"></div>
    </button>
    <div class="site-navigation content-wrap">
      <nav class="menu-main-container">
        <?php if (has_nav_menu('header-left')) :
            wp_nav_menu([
              'depth' => 1,
              'theme_location' => 'header-left',
              'container' => null,
              'items_wrap' => '<ul class="list-unstyled menu-left mb-0">%3$s</ul>']);
           endif; ?>
        <div class="menu menu-center mx-3">
          <div class="logo p-3">
            <a href="<?php echo home_url('/'); ?>">
              <?php $logo = get_field('header', 'option')['logo'] ?: THEME_URI . '/dist/img/logo.svg'; ?>
              <img class="img-fluid" src="<?php echo $logo; ?>" alt="<?php echo bloginfo('name'); ?>">
            </a>
          </div>
        </div>
        <?php if (has_nav_menu('header-right')) :
          wp_nav_menu([
            'depth' => 1,
            'theme_location' => 'header-right',
            'container' => null,
            'items_wrap' => '<ul class="list-unstyled menu-right mb-0">%3$s</ul>']);
          endif; ?>
      </nav>
      <div class="scroll-down d-block d-lg-none mt-n4">
        <?php _e('Scroll'); ?>
        <div class="icon-scroll"></div>
      </div>
    </div>
  </header>
  <main class="wrapper">
