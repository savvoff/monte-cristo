<?php
if (!function_exists('wp_start_cleanup')) {
  function wp_start_cleanup()
  {
    // Launching operation cleanup.
    add_action('init', 'wp_cleanup_head');
    // Remove WP version from RSS.
    add_filter('the_generator', 'wp_remove_rss_version');
    // Clean up comment styles in the head.
    add_action('wp_head', 'wp_remove_recent_comments_style', 1);
  }
  add_action('after_setup_theme', 'wp_start_cleanup');
}

// Theme editor
function disable_mytheme_actions()
{
  define('DISALLOW_FILE_EDIT', true);
  // define('EMPTY_TRASH_DAYS', false);
}
add_action('init', 'disable_mytheme_actions');

// Clean up head.

if (!function_exists('wp_cleanup_head')) {
  function wp_cleanup_head()
  {
    // EditURI link.
    remove_action('wp_head', 'rsd_link');
    // Category feed links.
    remove_action('wp_head', 'feed_links_extra', 3);
    // Post and comment feed links.
    remove_action('wp_head', 'feed_links', 2);
    // Windows Live Writer.
    remove_action('wp_head', 'wlwmanifest_link');
    // Index link.
    remove_action('wp_head', 'index_rel_link');
    // Previous link.
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    // Start link.
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    // Canonical.
    remove_action('wp_head', 'rel_canonical', 10, 0);
    // Shortlink.
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    // Links for adjacent posts.
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    // WP version.
    remove_action('wp_head', 'wp_generator');
    // Emoji styles.
    remove_action('wp_print_styles', 'print_emoji_styles');
  }
}

// Emojis
function disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'disable_emojis');

function disable_emojis_tinymce($plugins)
{
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}

function disable_embeds_code_init()
{
  // Remove the REST API endpoint.
  remove_action('rest_api_init', 'wp_oembed_register_route');
  // Turn off oEmbed auto discovery.
  add_filter('embed_oembed_discover', '__return_false');
  // Don't filter oEmbed results.
  remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
  // Remove oEmbed discovery links.
  remove_action('wp_head', 'rest_api_init');
  // Remove oEmbed-specific JavaScript from the front-end and back-end.
  remove_action('wp_head', 'wp_oembed_add_host_js');
  add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');
  // Remove all embeds rewrite rules.
  add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
  // Remove filter of the oEmbed result before any HTTP requests are made.
  remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
}
add_action('init', 'disable_embeds_code_init', 9999);

function disable_embeds_tiny_mce_plugin($plugins)
{
  return array_diff($plugins, array('wpembed'));
}

function disable_embeds_rewrites($rules)
{
  foreach ($rules as $rule => $rewrite) {
    if (false !== strpos($rewrite, 'embed=true')) {
      unset($rules[$rule]);
    }
  }
  return $rules;
}

// Comments
function disable_comments_post_types_support()
{
  $post_types = get_post_types();
  foreach ($post_types as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
}
add_action('admin_init', 'disable_comments_post_types_support');

// Remove WP version from RSS.
if (!function_exists('wp_remove_rss_version')) :
  function wp_remove_rss_version()
  {
    return '';
  }
endif;

// Close comments on the front-end
function disable_comments_status()
{
  return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

// Hide existing comments
function disable_comments_hide_existing_comments($comments)
{
  $comments = array();
  return $comments;
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);

// Remove menu pages
function disable_admin_menus()
{
  remove_menu_page('edit-comments.php');
  //remove_menu_page('edit.php');
}
add_action('admin_menu', 'disable_admin_menus');

// Redirect any user trying to access comments page
function disable_comments_admin_menu_redirect()
{
  global $pagenow;
  if ($pagenow === 'edit-comments.php') {
    wp_redirect(admin_url());
    exit;
  }
}
add_action('admin_init', 'disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function disable_comments_dashboard()
{
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');

// Remove comments links from admin bar
function disable_comments_admin_bar()
{
  if (is_admin_bar_showing()) {
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
  }
}
add_action('init', 'disable_comments_admin_bar');

function remove_comments()
{
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'remove_comments');

// Basic redirects
function wp_custom_redirect()
{
  if (is_author() || is_attachment()) {
    wp_redirect(get_home_url(), 301);
    exit;
  }
}
add_action('template_redirect', 'wp_custom_redirect');

//headers html for all wp_mail()
function wp_set_content_type()
{
  return "text/html";
}
add_filter('wp_mail_content_type', 'wp_set_content_type');

// Remove injected CSS from recent comments widget.
if (!function_exists('wp_remove_recent_comments_style')) :
  function wp_remove_recent_comments_style()
  {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
      remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
  }
endif;

// Remove inline width and height attributes for post thumbnails
function remove_thumbnail_dimensions($html)
{
  $html = preg_replace('/(width|height)=\"\d*\"\s/', '', $html);
  return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);
