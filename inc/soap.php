<?php 

/**
 * SOAP Requests
 * @since 0.4.2
 * https://stackoverflow.com/questions/11593623/how-to-make-a-php-soap-call-using-the-soapclient-class
 */

add_action( 'wp_ajax_nopriv_soap_request', 'soap_request' );
add_action( 'wp_ajax_soap_request', 'soap_request' );

function soap_request()
{
    // $data = $_POST;

    $url = 'https://www2.carwebuk.com/CarwebVrrB2Bproxy/CarwebVrrWebService.asmx?WSDL';

    $client = new SoapClient( $url );
    $functions = $client->__getFunctions();
    $types = $client->__getTypes();

    $action = 'http://ws.carwebuk.com/strVRRGetVehicle';

    $getVehicle = 'strVRRGetVehicle';
    $params = array(
        'strUserName' => 'username',
        'strPassword' => 'password',
        'strClientRef' => 'clientref',
        'strClientDescription' => 'clientdesc',
        'strKey1' => 'key1',
        'strKey2' => 'key2',
        'strVRM' => 'VRM',
        'strVIN' => 'VIN',
        'strVersion' => 'version'
    );

    $getVRM = 'strB2BGetVehicleByVRM';
    $params = array(
        'strUserName' => 'MBandG',
        'strPassword' => '77733888',
        'strClientRef' => 'ping',
        'strClientDescription' => 'ping',
        'strKey1' => 'validator',
        'strVRM' => 'RV58XUK', //DL15CUW //J67VWC //RV58XUK
        // 'strVersion' => '0.31.x',
        'strVersion' => '0.31.pingtest',
    );

    $function = $client->__soapCall($getVRM, array($params));
    $xml = simplexml_load_string($function->strB2BGetVehicleByVRMResult->any);
    // echo '<pre>'; print_r($xml->DataArea->Vehicles->Vehicle); echo '</pre>';
    $vehicle = $xml->DataArea->Vehicles->Vehicle;
    /* Send Back Data */
    wp_send_json_success( $vehicle );
	die();
}