<?php

// update a members default funding source (card)

add_action( 'wp_ajax_update_stripe_source', 'update_stripe_source' );

function update_stripe_source() {

	Stripe\Stripe::setApiKey(get_stripe_secret_key());

	if (isset($_POST['token'])) {

		try {

			$cu = \Stripe\Customer::retrieve(get_stripe_customer_id());
			$cu->source = $_POST['token'];
			$cu->save();

			$card = get_stripe_default_source();

			$r['brand'] = $card->brand;
			$r['last4'] = $card->last4;
			$r['expires'] = $card->exp_month . '/' . $card->exp_year;
			$r['postcode'] = $card->address_zip;

			wp_send_json_success($r);

		}

		catch(Exception $e) {

			wp_send_json_error($e);

		}
	}
}

// add a subscription to a customer based on the plan and logged in user ID

add_action( 'wp_ajax_add_stripe_subscription', 'add_stripe_subscription' );

function add_stripe_subscription() {

	\Stripe\Stripe::setApiKey(get_stripe_secret_key());

	try {

		// TODO check does this member already own this subscription?
		// TODO check is this a valid plan?
		// TODO is there a default card?
		// TODO is there 3D secure? Hanlde 3D secure

		\Stripe\Subscription::create(array(
			"customer" => get_stripe_customer_id(),
			"items" => array(
				array(
					"plan" => $_POST['plan'],
				),
			)
		));

		wp_send_json_success();
	}

	catch(Exception $e) {

		wp_send_json_error($e);

	}
}

// disable auto renewals on a subscription

add_action( 'wp_ajax_remove_stripe_subscription', 'remove_stripe_subscription' );

function remove_stripe_subscription() {

	\Stripe\Stripe::setApiKey(get_stripe_secret_key());

	try {
		$sub = \Stripe\Subscription::retrieve($_POST['sub']);
		$sub->cancel(array('at_period_end' => true));
		wp_send_json_success();
	}

	catch(Exception $e) { 

		wp_send_json_error($e);

	}
}

// switch customer subscription

add_action('wp_ajax_transfer_stripe_subscription', 'transfer_stripe_subscription');

function transfer_stripe_subscription() {

	\Stripe\Stripe::setApiKey(get_stripe_secret_key());

	try {

		$subscription = \Stripe\Subscription::retrieve($_POST['sub']);
		$itemID = $subscription->items->data[0]->id;

		\Stripe\Subscription::update($_POST['sub'], array(
			"items" => array(
				array(
					"id" => $itemID,
					"plan" => $_POST['plan'],
				),
			),
		));

		$id = \Stripe\Invoice::create(array(
			"customer" => get_stripe_customer_id(),
		));

		$invoice = \Stripe\Invoice::retrieve($id->id);
		$invoice->pay();

		wp_send_json_success();

	}

	catch(Exception $e) {

		wp_send_json_error($e);

	}
}

// add product to users account

add_action( 'wp_ajax_add_stripe_product', 'add_stripe_product' );

function add_stripe_product() {

	\Stripe\Stripe::setApiKey(get_stripe_secret_key());

	try {

		$order_id = \Stripe\Order::create(array(
			'items' => array(
				array(
					'type' => 'sku',
					'parent' => $_POST['product']
				)
			),
			'currency' => 'gbp',
			'customer' => get_field('stripe_customer_id', 'user_' . wp_get_current_user()->ID)

		));

		$order_id = json_decode(json_encode($order_id))->id;

		$order = \Stripe\Order::retrieve($order_id);

		$order->pay(array(
			"customer" => get_field('stripe_customer_id', 'user_' . wp_get_current_user()->ID)
		));

		// TODO only add the product if Stripe returns true

		$row = array(
			'field_5a4e23137f350' => $_POST['product']
		);

		add_row('field_5a4e23137f34f', $row, 'user_' . wp_get_current_user()->ID);

		wp_send_json_success();

	}

	catch (Exception $e) {

		wp_send_json_error($e);

	}
}

// get an invoice for printing or whatever

add_action( 'wp_ajax_ajax_get_stripe_customer_invoice', 'ajax_get_stripe_customer_invoice' );

function ajax_get_stripe_customer_invoice() {
	get_stripe_customer_invoice('in_1C09E4KGem285x9o6SFexV6E');
}

// the first charge made to new memberships when they sign up
add_action( 'wp_ajax_nopriv_test_handle_new_signup', 'test_handle_new_signup' );
add_action( 'wp_ajax_test_handle_new_signup', 'test_handle_new_signup' );

function test_handle_new_signup() 
{ 
	session_start();
	Stripe\Stripe::setApiKey( get_stripe_secret_key() );

	try {
		// // check if username exists
		if ( username_exists( $_POST['username'] ) ) {
			wp_send_json_error( "Username exists, please choose another" );
		}

		// check if user exists already
		if ( email_exists( $_POST['email'] ) ) {
			wp_send_json_error("User already exists with that email, please use another email");
		} 

		// check if there is a valid plan
		if ( !check_stripe_plan( $_POST['plan'] ) ) {
			wp_send_json_error("There is no valid plan for your vehicle");
		}

		$user_data = array(
			'user_login' => $_POST['username'],
			'user_pass' => $_POST['password'],
			'user_email' => $_POST['email'],
			'first_name' => $_POST['forename'],
			'last_name' => $_POST['surname']
		);
		$user_id = wp_insert_user($user_data);

		if ( $user_id->errors ) {
			wp_send_json_error($user_id->errors);
		}

		// create user to get ID
		$data['policy'] = 'PING' . strtoupper( substr($_POST['forename'],0, 1) ) . strtoupper( substr($_POST['surname'],0, 1) ) . $_POST['vehicle_registration'] . '00' . $user_id;

		$customer = \Stripe\Customer::create(array(
			'email' => $_POST['email'],
			'source'  => $_POST['token'],
			'description'  => $user_data['first_name'] . ' ' . $user_data['last_name'],
			'metadata' => array('wp_id' => $user_id, 'policy_num' => $data['policy'])
		));
		$customer = json_decode(json_encode($customer));

		//add and charge plan
		$subscription = \Stripe\Subscription::create(array(
			"customer" => $customer->id,
			"items" => array(
				array(
					"plan" => $_POST['plan'],
				),
			)
		));

		if ( $_POST['auto_renew'] === 'false') {
			$_POST['auto_renew'] = true;
		} else {
			
			$cancelsub = \Stripe\Subscription::retrieve($subscription->id);
			$cancelsub->cancel_at_period_end = true;
			$cancelsub->save();

			// wp_send_json_success($cancelsub);
			$_POST['auto_renew'] = false;
		}

		if ( $_POST['post_docs'] === 'false') {
			$_POST['post_docs'] = false;
		} else {
			$_POST['post_docs'] = true;
		}

		$vin = json_decode($_SESSION['VIN']);
		foreach ($vin as $key => $value) {
			$_SESSION['VIN2'] = $value;
		}
		$dofr = json_decode($_SESSION['DOFR']);
		foreach ($dofr as $key => $value) {
			$_SESSION['DOFR2'] = $value;
		}

		//update remaining fields
		update_field('field_5b72b389c4690', $_POST['title'], 'user_' . $user_id);
		update_field('field_5b72b399c4691', $_POST['forename'], 'user_' . $user_id);
		update_field('field_5b72b3aec4692', $_POST['surname'], 'user_' . $user_id);
		update_field('field_5b72b3bbc4693', $_POST['address1'], 'user_' . $user_id);
		update_field('field_5b72b406c4694', $_POST['postcode'], 'user_' . $user_id);
		update_field('field_5b72b410c4695', $_POST['telephone'], 'user_' . $user_id);
		update_field('field_5b72b441c4697', $_POST['vehicle_registration'], 'user_' . $user_id);
		update_field('field_5b72b451c4698', $_SESSION['VIN2'], 'user_' . $user_id);
		update_field('field_5b72b45dc4699', $_POST['vehicle_make'], 'user_' . $user_id);
		update_field('field_5b72b467c469a', $_POST['model'], 'user_' . $user_id);
		update_field('field_5b72b46cc469b', $_POST['type'], 'user_' . $user_id);
		update_field('field_5b72b476c469c', $_POST['engine_size'], 'user_' . $user_id);
		update_field('field_5b72b481c469d', $_POST['fuel_type'], 'user_' . $user_id);
		update_field('field_5b72b489c469e', $_POST['transmission'], 'user_' . $user_id);
		update_field('field_5b72b492c469f', $_SESSION['DOFR2'], 'user_' . $user_id);
		update_field('field_5b72b4a3c46a0', $_POST['mileage'], 'user_' . $user_id);
		update_field('field_5b7c1927cbace', $data['policy'], 'user_' . $user_id);
		update_field('field_5b72b4bcc46a2', $_POST['policy_start_date'], 'user_' . $user_id);
		update_field('field_5b72b4d2c46a3', $_POST['cover_level'], 'user_' . $user_id);
		update_field('field_5b72b4dec46a4', $_POST['duration'], 'user_' . $user_id);
		update_field('field_5b72b4e8c46a5', $_POST['policy_cost_to_customer'], 'user_' . $user_id);
		update_field('field_5b8e4834639bd', $_POST['auto_renew'], 'user_' . $user_id);
		update_field('field_5b8e4855639be', $_POST['post_docs'], 'user_' . $user_id);
		update_field('field_5b72caaf14867', $customer->id, 'user_' . $user_id);

		$data['user_id'] = $user_id;

		// send success
		wp_send_json_success($data);

	} catch ( Exception $e ) {
		wp_send_json_error( $e->getMessage() );
	}

}

function check_stripe_plan($planid) {
	// get the price from stripe
	Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$plan = \Stripe\Plan::retrieve($planid);
		return true;

	} catch (Exception $e) {
		return false;
	}
}


function RemoveBS($Str) {
	$StrArr = str_split($Str); $NewStr = '';
	foreach ($StrArr as $Char) {
		$CharNo = ord($Char);
		if ($CharNo > 96 && $CharNo < 123 || $CharNo > 64 && $CharNo < 91) {
			$NewStr .= $Char;
		}
	}  
	return $NewStr;
}


add_action( 'wp_ajax_nopriv_getPolicyCost', 'getPolicyCost' );
add_action( 'wp_ajax_getPolicyCost', 'getPolicyCost' );

function getPolicyCost()
{
	$data = $_POST;

	switch ($data['age']) {
		case ( $data['age'] >= 20 ):
			$data = "Sorry your vehicle is not eligible for cover, due to its age";
			wp_send_json_error($data);
			break;
		default:
			$data['product'] = $data['level'] . $data['age'];
			break;
	}
	
	// get the price from stripe
	Stripe\Stripe::setApiKey(get_stripe_secret_key());
	try {
		$plan = \Stripe\Plan::retrieve($data['product']);
		$data['amount'] = $plan->amount;
		wp_send_json_success($data);

	} catch (Exception $e) {
		wp_send_json_error($e->getMessage());
	}
}