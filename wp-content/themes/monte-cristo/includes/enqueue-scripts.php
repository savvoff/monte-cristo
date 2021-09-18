<?php

/**
 * Enqueue all styles and scripts.
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style}
 */
if (!function_exists('custom_scripts')) :
  function custom_scripts()
  {

    // Enqueue the main Stylesheet.
    wp_enqueue_style('main-stylesheet', get_stylesheet_directory_uri() . '/dist/styles/main.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('app', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0', 'all');

    // Deregister the jquery version bundled with WordPress.
    wp_deregister_script('jquery');

    // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', false);

    wp_enqueue_script('imask', '//unpkg.com/imask', null, '6.0.7', false);
    wp_enqueue_script('lazyload', '//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js', array('jquery'), '1.7.9', false);
    // wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
    // Enqueue the main JS file.
    wp_enqueue_script('vendor-js', get_stylesheet_directory_uri() . '/dist/js/vendor.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/dist/js/main.min.js', array('vendor-js'), '1.0.0', true);

    wp_localize_script('main-javascript', 'site_urls', [
      'ajax_url' => admin_url('admin-ajax.php')
    ]);
    wp_localize_script('main-javascript', 'home_urls', [
      'home_url' => esc_url(home_url('/'))
    ]);

    // Comments reply script
    if (is_singular() && comments_open()) :
      wp_enqueue_script('comment-reply');
    endif;
  }
  add_action('wp_enqueue_scripts', 'custom_scripts');
endif;

// Custom JS in footer

function custom_scripts()
{
  ?>
  <script>
    jQuery(function($) {
      $('[data-src]').Lazy();
    });
    var mask = '{38}(000)000-00-00';
    var phoneMask = IMask(
      document.getElementById('phone-mask'), {
        mask: mask
    });
    var phoneMaskCart = IMask(
      document.getElementById('phone-mask-cart'), {
        mask: mask
    });
  </script>
  <?php
}

add_action('wp_footer', 'custom_scripts');

function admin_additional_scripts()
{
  ?>
  <script type='text/javascript'>
    jQuery(function($) {
      // Disable mouse scroll when mouseover
      // need to loop through all number fields
      // in order to add a flag to enable/disable the mousewheel
      $('input[type="number"]').each(function(index, element) {
        // disable mousewheel by default on all number fields
        $(element).data('disable-mousewheel', true);
        // test if mousewheel is disabled, if it is prevent changing number field
        $(element).on('mousewheel', function(e) {
          if ($(element).data('disable-mousewheel')) {
            e.preventDefault();
          }
        }); // end on mousewheel
        // only enable the mousewheel when the mouse enters the number field
        $(element).on('mouseenter', function(e) {
          $(element).data('disable-mousewheel', false);
        }); // end on mouseenter
        // disable the mousewheel when the mouse leaves the number field
        $(element).on('mouseleave', function(e) {
          $(element).data('disable-mousewheel', true);
        }); // end on mouseleave
      }); // end each number element
    }); // end doc ready
  </script>
<?php
}
add_action('admin_footer', 'admin_additional_scripts');
