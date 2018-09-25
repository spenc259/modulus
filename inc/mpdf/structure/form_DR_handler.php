<?php
ini_set('memory_limit','160M');
use Mpdf\Mpdf;
// require_once('mpdf/mpdf.php'); //6
require_once('mpdf7/src/Mpdf.php'); //7

$stylesheet = file_get_contents('style.css');

$header = file_get_contents('header_DR.html');
$output = file_get_contents('template_DR.html');
$footer = file_get_contents('footer_DR.html');

foreach ($_POST as $key => $value) {
	$header = str_replace('{{'.$key.'}}', $value, $header);
}
foreach ($_POST as $key => $value) {
	$output = str_replace('{{'.$key.'}}', $value, $output);
}
foreach ($_POST as $key => $value) {
	$footer = str_replace('{{'.$key.'}}', $value, $footer);
}

//$mpdf = new mPDF ([ string $mode [, mixed $format [, float $default_font_size [, string $default_font [, float $margin_left , float $margin_right , float $margin_top , float $margin_bottom , float $margin_header , float $margin_footer [, string $orientation ]]]]]])
//$mpdf = new mPDF('','','','','marg-left','marg-right','marg-top','marg-bottom','marg-header','marg-footer','');

//$mpdf = new mPDF('','','','','15','15','40','30','10','10',''); //6
$mpdf = new kev('','','','','15','15','40','30','10','10',''); //7

$mpdf->SetProtection(array(), 'zorbagr33k', 'dafg', 40);


$mpdf->SetDisplayMode('fullpage');

$mpdf->SetTitle('Corrective Action Report' . $_POST[website] . date('d/m/Y'));

$mpdf->SetHTMLHeader($header);

$mpdf->SetHTMLFooter($footer);

$mpdf->WriteHTML($stylesheet,1);


$mpdf->WriteHTML($output,2);

$mpdf->Output('DR' . '-' . $_POST[website] . '-' . date('dmY') . '.pdf','I');

exit;