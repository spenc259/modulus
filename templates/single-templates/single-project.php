<?php 

$title = get_the_title();
// $content = the_content();
$image = get_the_post_thumbnail( $post->ID, array(400, 400) ); 

$project_title = get_field('title');
$project_description = get_field('description');
$project_status = get_field('status');
$project_events = get_field('events');
$project_gallery = get_field('gallery');

/* 
Work out the status of a project - is it complete or in process? work out the percentage of completion ( completed / total number * 100 )
*/

?>

<div class="sub-page">
    <div class="col-sm-12">
        <?php echo $image; ?>
    </div>
    <div class="col-sm-6 <?php echo $class; ?>">
        <h2><?php echo $project_title; ?></h2>
        <p><?php echo $project_description; ?></p>
        <div class="status">
            <?php echo $project_status; ?>
        </div>
        <div class="events">
            <?php 
                foreach ( $project_events as $event ) { ?>
                    <div class="event">
                        <?php 
                        foreach ( $event as $details ) {
                            echo $details->post_title;
                        }
                        ?>
                    </div> <?php 
                }
            ?>
            <?php //echo '<pre>'; print_r($project_events); echo '</pre>'; ?>
        </div>
        <div class="gallery">
            <?php echo $project_gallery; ?>
        </div>
        <button class="primary rounded10">Get involved</a>
    </div>
</div>