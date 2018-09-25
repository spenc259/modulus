<?php

require get_template_directory() . '/inc/stripe/init.php';

// getters

function get_stripe_secret_key() {
	return get_field('secret_key', 'option');
}

function get_stripe_public_key() {
	return get_field('public_key', 'option');
}

function get_stripe_endpoint_secret() {
	return get_field('stripe_end_sk', 'option');
}

function get_stripe_customer_id() {
	return get_field('stripe_customer_id', 'user_' . wp_get_current_user()->ID);
}

function get_user_products() {
	return get_field('stripe_active_products', 'user_' . wp_get_current_user()->ID);
}

function has_advanced_operator_profile() {
	$products = get_field('stripe_active_products', 'user_' . wp_get_current_user()->ID);
	$active_products = array();
	if ($products) {
		foreach ($products as $v) {
			foreach ($v as $v2) {
				if ($v2 == 'adv_op_profile') {
					$active_products[] = 'adv_op_profile';
				}
			}
		}
	}
	if ($active_products) {
		return true;
	} else {
		return false;
	}
}

function get_stripe_products($limit = 99) {
	\Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$products = \Stripe\Product::all(array('limit' => $limit));
		return json_decode(json_encode($products));
	} catch (Exception $e) {
		return false;
	}
}

function get_stripe_product($id) {
	\Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$product = \Stripe\Product::retrieve($id);
		return json_decode(json_encode($product));
	} catch (Exception $e) {
		return false;
	}
}

function get_stripe_plans($limit = 99) {
	\Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$plans = \Stripe\Plan::all();
		return json_decode(json_encode($plans));
	} catch (Exception $e) {
		return false;
	}

}

function get_stripe_customer() {
	Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$customer = Stripe\Customer::retrieve(get_field('stripe_customer_id', 'user_' . wp_get_current_user()->ID));
		return json_decode(json_encode($customer));
	} catch (Exception $e) {
		return false;
	}
}

function get_stripe_default_source() {
	Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$customer = Stripe\Customer::retrieve(array("id" => get_field('stripe_customer_id', 'user_' . wp_get_current_user()->ID), "expand" => array("default_source")));
		return json_decode(json_encode($customer))->default_source;
	} catch (Exception $e) {
		return false;
	}
}

function get_stripe_customer_invoices($limit = 10) {
	Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$invoices = Stripe\Invoice::all(array('customer' => get_field('stripe_customer_id', 'user_' . wp_get_current_user()->ID), 'limit' => $limit));
		return json_decode(json_encode($invoices));
	} catch (Exception $e) {
		return false;
	}
}

function get_stripe_customer_invoice($inv_id) {
	Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$invoices = Stripe\Invoice::retrieve($inv_id);
		return json_decode(json_encode($invoices));
	} catch (Exception $e) {
		return false;
	}
}

function get_stripe_customer_charges($limit = 10) {
	Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$invoices = Stripe\Charge::all(array('customer' => get_stripe_customer_id(), 'limit' => 100));
		return json_decode(json_encode($invoices));
	} catch (Exception $e) {
		return false;
	}
}