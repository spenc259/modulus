<header id="site-header">
    <div class="container">
        <div class="row align-items-center mb-2">
            <div class="col-auto mr-auto" id="logo">
                <?php
                do_action('header_left');
                ?>
            </div>

            <div class="col-auto">
                <?php 
                do_action('header_middle'); 
                ?>
            </div>

            <div class="col-auto">
                <?php 
                do_action('header_right'); 
                ?>
            </div>
        </div>
    </div>
</header>