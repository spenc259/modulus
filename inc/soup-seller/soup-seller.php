<?php 

/**
 * Get Soups
 */
function get_soups()
{
    /* get the associated soup fields */
    $soup->title = get_the_title($_POST['id']);
    $soup->description = get_field('description', $_POST['id']);
    $soup->image = get_field('image', $_POST['id']);
    $soup->ingredients = get_field('ingredients', $_POST['id']);
    $soup->allergens = get_field('allergens', $_POST['id']);
    $soup->nutritinal_information = get_field('nutritinal_information', $_POST['id']);

    foreach ($soup->allergens as $allergen) {
        $allergens .= $allergen['name'] . ', ';
    }

    foreach ($soup->ingredients as $ingredient) {
        $ingredients .= $ingredient['name'] . ', ';
    }

    foreach ($soup->nutritinal_information as $nutrient) {
        $nutrients[$nutrient['name']]['amount'] = $nutrient['amount'];
        $nutrients[$nutrient['name']]['percentage'] = $nutrient['percentage'];
        $nutrients[$nutrient['name']]['colour'] = $nutrient['colour'];
        $nutrients[$nutrient['name']]['level'] = $nutrient['level'];
    }

    $pdf['title'] = $soup->title;
    $pdf['description'] = $soup->description;
    $pdf['image'] = $soup->image['url'];
    $pdf['allergens'] = rtrim($allergens, ', ');
    $pdf['ingredients'] = rtrim($ingredients, ', ');
    $pdf['nutrients'] = $nutrients;

    $pdfinfo = generatePDF($pdf);

    wp_send_json_success($pdfinfo);
}
add_action('wp_ajax_nopriv_get_soups', 'get_soups');
add_action('wp_ajax_get_soups', 'get_soups');

// require get_template_directory() . '/inc/mpdf/vendor/autoload.php';

/**
 * Generate PDF
 *
 * @param string $customer_id
 * @return void
 */
function generatePDF( $data )
{
    $stylesheet = file_get_contents( get_template_directory() . '/inc/mpdf/structure/style.css' );
    $header = file_get_contents( get_template_directory() . '/inc/mpdf/structure/header.html' );
    $output = file_get_contents( get_template_directory() . '/inc/mpdf/structure/template.html' );
    $footer = file_get_contents( get_template_directory() . '/inc/mpdf/structure/footer.html' );

    foreach ($data as $key => $value) {
        $header = str_replace('{{' . $key . '}}', $value, $header);
    }

    foreach ($data as $key => $value) {
        $output = str_replace('{{' . $key . '}}', $value, $output);
    }

    foreach ($data['nutrients'] as $parentkey => $nutrient) {
        foreach ($nutrient as $key => $value) {
            $output = str_replace('{{' . $parentkey . ' ' . $key . '}}', $value, $output);
        }
    }

    foreach ($data as $key => $value) {
        $footer = str_replace('{{' . $key . '}}', $value, $footer);
    }

    $mpdf = new \Mpdf\Mpdf(['tempDir' => get_template_directory() . '/inc/mpdf/tmp', 'margin_top' => 40]);
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetTitle( $data['title'] );
    $mpdf->SetHTMLHeader($header);
    $mpdf->SetHTMLFooter($footer);
    $mpdf->WriteHTML($stylesheet, 1);
    $mpdf->WriteHTML($output, 2);
    $mpdf->Output(get_template_directory() . '/inc/mpdf/pdfs/' . $data['title'] . '.pdf', \Mpdf\Output\Destination::FILE);

    return $data;
}

/**
 * Soup Seller Scripts
 */
function ip_admin_soup_seller_scripts()
{
    wp_enqueue_script('soups-script', get_template_directory_uri() . '/inc/soup-seller/js/soupSeller.js', array('jquery'), false, true);

    global $post; // needed to get the current post ID to pass to the JS file
    if (isset($post->ID)) {
        $data = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'postID' => $post->ID
        );
        wp_localize_script('soups-script', 'get_soups', $data);
    } else {
        $data = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        );
        wp_localize_script('soups-script', 'get_soups', $data);
    }
    
}
add_action('admin_enqueue_scripts', 'ip_admin_soup_seller_scripts');