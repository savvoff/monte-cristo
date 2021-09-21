<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="theme-color" content="#fff">
  <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, shrink-to-fit=no">
  <meta name="facebook-domain-verification" content="nmudqu4jhv8ftb7mw1v1btajrlz811" />
  <title><?php wp_title() ?></title>
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

  <main class="wrapper">
    <header class="site-header py-2">
      <button id="nav-toggle" class="btn burger-container d-lg-none">
        <div class="burger-bar"></div>
      </button>
      <div class="site-navigation content-wrap">
        <nav class="menu-main-container">
          <ul class="list-unstyled menu-left mb-0">
            <li class="menu-item hover-underline"><a href="/restaurant">Рестораны</a></li>
            <li class="menu-item hover-underline is-active"><a href="/page/about">О компании</a></li>
            <li class="menu-item hover-underline"><a href="/news">Новости</a></li>
          </ul>
          <div class="menu menu-center mx-3">
            <div class="logo p-3">
              <a href="<?php echo home_url('/'); ?>">
                <img class="img-fluid" src="<?php echo THEME_URI; ?>/dist/img/logo.svg" alt="<?php echo bloginfo('name'); ?>">
              </a>
            </div>
          </div>
          <ul class="list-unstyled menu-right mb-0">
            <li class="menu-item hover-underline"><a href="https://delivery.rappoport.restaurant/" target="_blank">Доставка</a></li>
            <li class="menu-item hover-underline"><a href="/media">СМИ</a></li>
            <li class="menu-item hover-underline"><a href="/site/contact">Контакты</a></li>
            <li class="menu-item lang"><a href="/en/page/about">EN</a></li>
          </ul>
        </nav>
        <div class="scroll-down d-inline-block d-lg-none">
          cкрольте вниз
          <div class="icon-scroll"></div>
        </div>
      </div>
    </header>
    <!-- <header class="page-header py-3 py-sm-4 px-sm-2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <a class="brand rounded-circle overflow-hidden" href="<?php echo home_url() ?>">
              <img class="position-relative img-fluid" src="<?php //echo get_field('logo','option')['sizes']['thumbnail']
                                                            ?>" width="" height="" alt="<?php //echo get_field('logo','option')['alt'];
                                                                                                                                                      ?>">
            </a>
            <div class="burger__wrapper">
              <button class="burger" type="button" aria-label="Menu toggler">
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
            <nav class="page-header__nav d-flex text-center">
              <ul class="list-unstyled text-secondary mx-auto mt-6">
                <ul class="lang-switcher d-flex justify-content-center list-unstyled mb-3">
                  <?php
                  $args = array(
                    'dropdown' => 0,
                    'show_names' => 1,
                    'display_names_as' => 'slug',
                    'show_flags' => 0,
                    'hide_if_empty' => 0,
                    'force_home' => 0,
                    'echo' => 1,
                    'hide_if_no_translation' => 0,
                    'hide_current' => 0,
                    'post_id' => null,
                    'raw' => 0
                  );
                  if (function_exists('pll_the_languages')) {
                    pll_the_languages($args);
                  }
                  ?>
                </ul>
                <?php
                wp_nav_menu([
                  'theme_location'  => 'header_menu',
                  'container'       => false,
                  'fallback_cb'     => '',
                  'menu_class'      => 'list-unstyled m-auto',
                  'items_wrap'      => '%3$s'
                ]); ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header> -->
