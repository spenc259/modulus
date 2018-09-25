<?php

if ( is_user_logged_in() ){

    $userid = get_current_user_id();

?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h3>My Documents</h3>
                <div class="documents">
                    <p>Please click on the documents below to download:</p>
                    <?php
                        $documents = get_field('documents', 'user_' . $userid);
                        echo '<a href="' . site_url('/wp-content/themes/intimation-pro/inc/mpdf/pdfs/') . $documents . '">' . $documents . '</a><br/>';
                    ?>
                        <a href="<?php echo site_url('/wp-content/themes/intimation-pro/inc/mpdf/pdfs/PING_Contract_of_Insurance-Road_Rescue_16-7-18.pdf'); ?>">Customer Wording</a><br/>
                        <a href="<?php echo site_url('/wp-content/themes/intimation-pro/inc/mpdf/pdfs/PING_IPID-Final_Branded.pdf'); ?>">IPID</a><br/>
                    <hr>
                    <a href="<?php echo wp_logout_url( site_url('login') ); ?>" class="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

<?php 
} else {
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="documents">
                    <h3>Please Login</h3>
                    <a href="<?php echo site_url('login'); ?>">login</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
