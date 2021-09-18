<?php

define('MC_URI', get_template_directory_uri('mc'));
define('MC_DIR', get_template_directory('mc'));

$theme_includes = [
  '/includes/cleanup.php',                          // Clean up default theme includes
  '/includes/clear.php',
  '/includes/enqueue-scripts.php',                  // Enqueue styles and scripts
  '/includes/protocol-relative-theme-assets.php',   // Protocol (http/https) relative assets path
];

add_action('after_setup_theme', 'support_func');
function support_func()
{
  add_theme_support('post-thumbnails', array('service', 'page', 'post'));

  register_nav_menus([
    'header_menu' => 'Меню',
    'mobile_menu' => 'Мобильное меню'
  ]);
}

foreach ($theme_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'mc'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);

function getYoutubeID($url)
{
  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

  return $match[1];
}

add_filter('excerpt_length', 'custom_excerpt_length');
function sanitizePhone($phone)
{
  return preg_replace('/[^0-9+]+/', '', $phone);
}

function custom_excerpt_length($length)
{
  $length = 15;
  return $length;
}

add_action('template_redirect', 'mc_custom_redirect', 99);
function mc_custom_redirect()
{
  if (is_404()) {
    wp_redirect(get_home_url(), 302);
    exit;
  }
}
