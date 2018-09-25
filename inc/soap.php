<?php 


/**
 * SOAP Requests
 * https://stackoverflow.com/questions/11593623/how-to-make-a-php-soap-call-using-the-soapclient-class
 */

add_action( 'wp_ajax_nopriv_soap_request', 'soap_request' );
add_action( 'wp_ajax_soap_request', 'soap_request' );

function soap_request( $data = '' )
{
    session_start();
    $url = 'https://www2.carwebuk.com/CarwebVrrB2Bproxy/CarwebVrrWebService.asmx?WSDL';

    $client = new SoapClient( $url );

    $action = 'http://ws.carwebuk.com/strVRRGetVehicle';
    $getVRM = 'strB2BGetVehicleByVRM';
    $params = array(
        'strUserName' => 'MBandG',
        'strPassword' => '77733888',
        'strClientRef' => 'ping',
        'strClientDescription' => 'ping',
        'strKey1' => 'mb56rd98',
        'strVRM' => str_replace(' ', '', $_POST['vehicle_registration']), //DL15CUW //J67VWC //RV58XUK //NG16 PJJ //OV60 HXD
        'strVersion' => '0.31.pingtest',
        'Combined_FuelType' => ''
    );

    $function = $client->__soapCall($getVRM, array($params));
    $xml = simplexml_load_string($function->strB2BGetVehicleByVRMResult->any);

    $vehicle = $xml->DataArea->Vehicles->Vehicle;

    $_SESSION['VIN'] = json_encode($vehicle->Combined_VIN);
    $_SESSION['DOFR'] = json_encode($vehicle->DateFirstRegistered);

    $current_year = getdate();
    $vehicle->vehicle_age = ($current_year['year'] - $vehicle->DVLAYearOfManufacture); 

    $vehicle->Combined_VIN = '';
    $vehicle->DateFirstRegistered = '';
    
    wp_send_json_success( $vehicle );
}