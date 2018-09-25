<table>
    <thead>
        <?php 
            foreach ( $module['table']['header'] as $heading ) :
                echo '<th>' . $heading['c'] . '</th>';
            endforeach; 
        ?>
    </thead>
    <tbody>
        <?php
            foreach ( $module['table']['body'] as $tr ) {
                echo '<tr>';
                foreach ( $tr as $td ) :
                    echo '<td>' . $td['c'] . '</td>';
                endforeach;
                echo '</tr>';
            }
        ?>
    </tbody>
</table>