<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') :
  require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

  if (isset($_POST['_wpnonce'])) :
    if (wp_verify_nonce($_POST['_wpnonce'])) {
      $message = sanitize_text_field($_POST['message']);

      foreach ($fields as $key => $field) {
        if ($_POST[$key]) $body .= $field . ': ' . sanitize_text_field($_POST[$key]) . '<br/>';
      }
      
      $to = get_option('admin_email');
      $headers[] = 'Content-type: text/html; charset=utf-8';

      $res = wp_mail($to, __('Request a service form'), $body, $headers);

      if ($res) {
        echo true;
      } else {
        echo false;
      }
    } else {
      wp_die('Do you try to hack the site? :)');
    }
  endif;
endif;
