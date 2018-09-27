<?php

add_action( 'wp_ajax_nopriv_stripe_webhook', 'stripe_webhook' );
add_action( 'wp_ajax_stripe_webhook', 'stripe_webhook' );

function stripe_webhook()
{
    \Stripe\Stripe::setApiKey(get_stripe_secret_key());
    // $endpoint_secret = get_stripe_endpoint_secret(); // whsec_BYeDq0dsQsUd5MiLqZTvFxHHX6sggyB7
    $endpoint_secret = 'whsec_BYeDq0dsQsUd5MiLqZTvFxHHX6sggyB7';

    $payload = @file_get_contents("php://input");
    $sig_header = $_SERVER["HTTP_STRIPE_SIGNATURE"];
    $event = null;

    try {
        $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
    } catch(\UnexpectedValueException $e) {
        http_response_code(400);
        exit();
    } catch(\Stripe\Error\SignatureVerification $e) {
        http_response_code(400);
        exit();
    }

    handle_event(json_decode($payload));
}


function handle_event( $event )
{
    switch ($event->type) {
        case 'customer.created':
            new_customer($event);
            break;
        case 'customer.source.created':
            # code...
            break;
        case 'customer.updated':
            # code...
            break;
        case 'invoice.created':
            # code...
            break;
        case 'invoice.payment_succeeded':
            send_policy_documents( $event );
            break;
        case 'charge.succeeded':
            # code...
            break;
        case 'customer.subscription.created':
            # code...
            break;

        default:
            # code...
            break;
    }

    testing($event->type, $event);
}

function new_customer( $event )
{

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'Bcc:paul.test@intimation.uk';
    $to = 'paul@intimation.uk';
    $subject = 'Ping Insure - New Customer';

    $body = 'We have a new Customer<br>';
    $body .= 'Customer Name: ' . $event->data->object->description . '<br>';
    $body .= 'Customer ID: ' . $event->data->object->id . '<br>';
    $body .= 'Customer Email: ' . $event->data->object->email . '<br>';
    $body .= 'Customer Policy Number: ' . $event->data->object->metadata->policy_num . '<br>';

    wp_mail( $to, $subject, $body, $headers );
    http_response_code(200);
}


function send_policy_documents( $event )
{
    // generate PDF
    $customer = generatePDF($event->data->object->customer);

    if (!attach_to_user($customer)) {
        http_response_code(500);
    }

    notify_admin_of_documents_by_post($customer, $event);

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'Bcc:paul.test@intimation.co.uk';
    $to = $customer['email'];
    $subject = 'Ping Insure - Your Documents';

    $body = 'Thank you for your payment, please find your documents attached to this email.<br>';
    $body .= 'Customer Number: ' . $event->data->object->customer . '<br>';
    $body .= 'Product: ' . $event->data->object->lines->data[0]->description . '<br>';
    $body .= 'Your copy of the invoice: ' . $event->data->object->invoice_pdf . '<br>';

    $attachments = array( WP_CONTENT_DIR . '/themes/intimation-pro/inc/mpdf/pdfs/' . $customer['policy_number'] . '.pdf', WP_CONTENT_DIR . '/themes/intimation-pro/inc/mpdf/pdfs/PING_Contract_of_Insurnce-Road_Rescue_16-7-18.pdf', WP_CONTENT_DIR . '/themes/intimation-pro/inc/mpdf/pdfs/PingIPID.docx' );

    wp_mail( $to, $subject, $body, $headers, $attachments );

    $user = get_user_by_email($customer['email']);
    wp_new_user_notification($user->ID, $deprecated = null, 'user');

    http_response_code(200);
}


function attach_to_user( $customer )
{
    $user = get_user_by_email($customer['email']);
    return update_field('documents', $customer['policy_number'] . '.pdf', 'user_' . $user->ID);
}

// function send_user_login_details( $customer )
// {
//     $user = get_user_by_email($customer['email']);

//     $headers = array('Content-Type: text/html; charset=UTF-8');
//     $headers[] = 'Bcc:paul.test@intimation.co.uk';
//     $to = $customer['email'];
//     $subject = 'Ping Insure - Your Login Details';

//     $body = 'Thank you for choosing Ping Breakdown Cover, please login to your account if you wish to retrieve your documents at a later date.<br>';
//     $body = 'You can login by visiting <a href="' . site_url('/login') . '">Your account<a><br>';
//     $body .= 'Username: ' . $user->user_login . '<br>';

//     wp_mail($to, $subject, $body, $headers);
//     wp_new_user_notification($user->ID, $deprecated = null, 'user');
// }


function notify_admin_of_documents_by_post($customer, $event)
{
    $user = get_user_by_email($customer['email']);
    $send = get_user_meta($user->ID, 'post_documents', true);

    if ( $send ) {
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $headers[] = 'Bcc:paul.test@intimation.uk';
        $to = 'paul.test@intimation.uk'; // get the admin email
        $subject = 'A Customer has requested to be sent their documents';

        $body = 'Please send the attached documents by post to the customer.<br>';
        $body .= 'Customer Number: ' . $event->data->object->customer . '<br>';
        $body .= 'Customer Name: ' . $customer['first_name'] . ' ' . $customer['last_name'] . '<br>';
        $body .= 'Customer Address: ' . $customer['address'] . '<br>';
        $body .= 'Customer Post Code: ' . $customer['postcode'] . '<br>';
        $body .= 'Customer Tel: ' . $customer['telephone'] . '<br>';

        $attachments = array( WP_CONTENT_DIR . '/themes/intimation-pro/inc/mpdf/pdfs/' . $customer['policy_number'] . '.pdf' );
        wp_mail( $to, $subject, $body, $headers, $attachments );

        // invoice the customer £2.50
        charge_the_postage($user->ID);
    }
}

function charge_the_postage( $userID )
{
    Stripe\Stripe::setApiKey( get_stripe_secret_key() );

    try {
        \Stripe\Charge::create(array(
			"amount" => 250,
			"currency" => "gbp",
			"customer" => get_field('customer_id', 'user_' . $userID),
			"description" => "Charge for Postage of Documents"
		));
    }

    catch ( Exception $e ) {

    }
}

// send entire web hook payload to Intimation for debug
function testing( $event, $event_data)
{
    $to = 'paul.test@intimation.uk';
    $subject = 'Ping Insure' . $event;
    $body = $payload;

    wp_mail( $to, $subject, $body, $headers );
    http_response_code(200);
}