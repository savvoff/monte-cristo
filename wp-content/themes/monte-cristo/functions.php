<?php

define('THEME_URI', get_template_directory_uri());
define('THEME_DIR', get_template_directory());

$theme_includes = [
  '/includes/theme-support.php',                    // Theme support options
  '/includes/cleanup.php',                          // Clean up default theme includes
  '/includes/enqueue-scripts.php',                  // Enqueue styles and scripts
  '/includes/protocol-relative-theme-assets.php',   // Protocol (http/https) relative assets path
];

foreach ($theme_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'mc'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}

function getYoutubeID($url)
{
  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

  return $match[1];
}

function sanitizePhone($phone)
{
  return preg_replace('/[^0-9+]+/', '', $phone);
}

function custom_excerpt_length($length)
{
  $length = 15;
  return $length;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function mc_custom_redirect()
{
  if (is_404()) {
    wp_redirect(get_home_url(), 302);
    exit;
  }
}
add_action('template_redirect', 'mc_custom_redirect', 99);

add_filter('ACFFA_always_enqueue_fa', '__return_true');
