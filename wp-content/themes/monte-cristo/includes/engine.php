<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

	$arr = (array)$_SESSION['products'];

	//add to cart
	if ($_POST['action'] == 'add_to_cart') {

		$id = (int)$_POST['id'];
		$q  = (int)$_POST['q'];

		if (array_key_exists($id, $arr))
			$arr[$id] = (int)$arr[$id] + $q;
		else
			$arr[$id] = $q;

		$_SESSION['products'] = $arr;

		echo getCartQuantity();
	}

	//remove from cart
	if ($_POST['action'] == 'remove_cart') {
		$id = (int)$_POST['id'];

		if (array_key_exists($id, $arr))
			unset($arr[$id]);

		$_SESSION['products'] = $arr;

		$cur = get_field('currency', 'option');

		$res['sum'] = getCartSummary() . ' ' . $cur;
		$res['total'] = (int)getCartSummary() + (int)get_field('cost_delivery', 'option') . ' ' . $cur;

		echo json_encode($res);
	}

	//form cart
	if (isset($_POST['cart_nonce'])) {
		if (wp_verify_nonce($_POST['cart_nonce'], 'cart_action')) {

			$to = get_option('admin_email');

			$subj = '[Monte Cristo] Новый заказ';

			$name = 'Имя: ' . sanitize_text_field($_POST['name']);
			$phone = '<br/>Телефон: ' . sanitize_text_field($_POST['phone']);
			$amount = '<br/>Сумма заказа: ' . sanitize_text_field($_POST['amount']);
			$delivery = '<br/>Доставка: ' . sanitize_text_field($_POST['delivery']);
			$total = '<br/>Всего: ' . sanitize_text_field($_POST['total']);
			$msg = !empty($_POST['msg']) ? '<br/>Сообщение: ' . sanitize_text_field($_POST['msg']) : '';

			$products = '';

			foreach ($arr as $key => $value)
			$products .= '<br/>' . get_the_title((int)$key) . ': ' . $value . ' шт.';

			$body = $name . $phone . $msg . $products;

			if (has_filter('custom_before_send_mail')) {
				$body = apply_filters('custom_before_send_mail', $body);
			}

			$res = wp_mail($to, $subj, $body);

			if ($res) {
				echo __('Спасибо! Заказ оформлен успешно', 'mc');
			} else {
				echo __('Ошибка отправки электронной почты');
			};

			$_SESSION['products'] = array();
		} else {
			echo 'Nonce Error';
		}
	}

	//simple form
	if (isset($_POST['simple_nonce'])) {
		if (wp_verify_nonce($_POST['simple_nonce'], 'simple_action')) {

			$to = sanitize_email($_POST['to']) ?: get_option('admin_email');

			$subj = '[mc] Новая заполненная форма';

			$name = 'Имя: ' . sanitize_text_field($_POST['name']);
			$phone = '<br/>Телефон: ' . sanitize_text_field($_POST['phone']);
			$msg = !empty($_POST['msg']) ? '<br/>Сообщение: ' . sanitize_text_field($_POST['msg']) : '';

			$source = '<br/>Источник заполнения формы: ' . get_home_url() . $_POST['_wp_http_referer'];

			$body = $name . $phone . $msg . $source;

			if (has_filter('custom_before_send_mail')) {
				$body = apply_filters('custom_before_send_mail', $body);
			}

			$res = wp_mail($to, $subj, $body);

			if ($res) {
        $success_text = get_field('text_success', 'option') ?: __('Спасибо! Заказ оформлен успешно', 'mc');
				echo $success_text;
			} else {
        $failed_text = get_field('text_failed', 'option') ?: __('Ошибка отправки электронной почты');
				echo $failed_text;
			};

			$_SESSION['products'] = array();
		} else {
			echo 'Nonce Error';
		}
	}
endif;
