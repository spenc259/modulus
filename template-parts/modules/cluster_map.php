<?php

/**
 * Cluster Map 
 * @since 0.3
 */

// echo '<pre>'; print_r($module); echo '</pre>';

/**
 * Get Map locations
 */
$projects_args = array(
    'posts_per_page' => -1,
    'post_type' => array( 
        'project'
    ),
);

$projects_query = new WP_Query( $projects_args );
$map_projects = array();

// The Loop
if ( $projects_query->have_posts() ) :
    while ( $projects_query->have_posts() ) : $projects_query->the_post();
		$map_projects[] = array( 
			'location' => get_field('location'), 
			'title' => get_field('title'), 
			'status' => get_field('status') 
		);
    endwhile;
endif;


// Reset Post Data
wp_reset_postdata();
// $map_projects = json_encode($map_projects);

// echo '<pre>'; print_r($map_projects); echo '</pre>';
?>

<div id="cluster-map" style="min-height: 400px; margin: 2rem 0 3rem;"></div>

<script type="text/javascript">

var locations = [];

var new_locations = <?php echo json_encode($map_projects); ?>;

for ( var i = 0; i < new_locations.length; i++ ){
    locations[i] = {lat: Number(new_locations[i].location.lat), lng: Number(new_locations[i].location.lng)};
}

// define zoom level (int) and center pos (object) with lat and lng properties
var center = {lat: <?php echo $module['location_anchors']['lat']; ?>, lng: <?php echo $module['location_anchors']['lng']; ?>};
var zoom = 13;

function clusterMap() {
	var map = new google.maps.Map(document.getElementById('cluster-map'), {
			zoom: zoom,
			center: center
        } );
    
    /* marker cluster */
    var markers = locations.map(function(location, i) {
        var content = '<h4>' + new_locations[i].title + '</h4>' + '<div class="status">Current Status: ' + new_locations[i].status + '</div>';
        
        var marker = new google.maps.Marker({
            position: location,
            content: content
        });

        var infoWindow = new google.maps.InfoWindow({
            content: marker.content
        });

        marker.addListener('click', function() {
            infoWindow.setContent(this.content);
            infoWindow.open(map, this);
        });

        return marker;
    });
    
    var markerCluster = new MarkerClusterer(map, markers, 
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'} );
}

</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfyOfkCEG42DnXoHSCwHbvC4rvcK6HSkw&callback=clusterMap"></script>


</script>