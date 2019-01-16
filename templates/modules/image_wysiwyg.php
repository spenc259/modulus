<?php //echo '<pre>'; print_r($module); echo '</pre>'; ?>
<div class="image-wysiwyg <?php echo $module['class']; ?>">
    <?php 
        foreach ( $module as $key => $content ) {

            switch ($key) {
                case 'image':
                    echo 
                        "<img class='content-image' src=' " . $content . " ' />";
                    break;
                case 'wysiwyg':
                    echo 
                        "<div class='content-editor'>" . 
                        $content . 
                        "</div>";
                    break;
                
                default:
                    # code...
                    break;
            }
            
        }
    ?>
</div>