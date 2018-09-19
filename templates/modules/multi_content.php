<?php

foreach ( $module as $key => $content ) {
    if ( $key !== 'acf_fc_layout' ) {
        echo $content;
    }
}