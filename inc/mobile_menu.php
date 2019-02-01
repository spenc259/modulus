<?php 
function mobile_menu()
{
    ?>
<div class="mobile-menu-header d-block d-lg-none">

    <div class="top-row row align-items-center">
        <div class="mobile-logo mr-auto">
            <?php $branding = get_field('branding', 'option'); ?>
            <img src="<?php echo site_url('/wp-content/themes/intimation-pro/assets/img/Redemption-master-logo-white.png'); ?>" alt="Redemption Food" />
        </div>
        <div class="burger-container">
            <div id="burger">
                <div class="bar tBar"></div>
                <div class="bar mBar"></div>
                <div class="bar bBar"></div>
            </div>
        </div>
    </div>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'depth' => 2,
        'container' => false,
        'menu_class' => 'menu'
    ));
    ?>

</div>
<?php

}

add_action('mobile_menu', 'mobile_menu');