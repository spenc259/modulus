<?php 

require_once __DIR__ . '/vendor/autoload.php';

// add_action( 'wp_ajax_nopriv_generatePDF', 'generatePDF' );
// add_action( 'wp_ajax_generatePDF', 'generatePDF' );

function generatePDF2( $customer_id = '' ) 
{
    // get the customer details
    $customer_details = get_customer( $customer_id );

    $stylesheet = file_get_contents( __DIR__ . '/structure/style.css' );
    $header = file_get_contents( __DIR__ . '/structure/header.html');
    $output = file_get_contents( __DIR__ . '/structure/template.html');
    $footer = file_get_contents( __DIR__ . '/structure/footer.html');

    foreach ($customer_details as $key => $value) {
        $header = str_replace('{{'. $key .'}}', $value, $header);
    }

    foreach ($customer_details as $key => $value) {
        $output = str_replace('{{'. $key .'}}', $value, $output);
    }

    foreach ($customer_details as $key => $value) {
        $footer = str_replace('{{'. $key .'}}', $value, $footer);
    }

    $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp', 'margin_top' => 40]);
    $mpdf->SetDisplayMode( 'fullpage' );
    $mpdf->SetTitle( 'Policy documents' . date('d/m/Y') );
    $mpdf->SetHTMLHeader($header);
    $mpdf->SetHTMLFooter($footer);
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($output,2);
    $mpdf->Output(__DIR__ . '/pdfs/' . $customer_details['policy_number'] . '.pdf', \Mpdf\Output\Destination::FILE);

    return $customer_details;
}