<?php 

/**
 * Map Module
 */

?>

<div id="map" style="min-height: 400px;"></div>


<script>

var map_location = <?php echo json_encode($module['location']); ?> // encode the array to pass to the JS;

// define zoom level (int) and center pos (object) with lat and lng properties
var center = {lat: <?php echo $module['location']['lat']; ?>, lng: <?php echo $module['location']['lng']; ?>};
var zoom = 12;

function initMap() {
	// console.log(map_locations);
	var SingleMap = new google.maps.Map(document.getElementById('map'), {
			zoom: zoom,
			center: center
        } );
        
    var marker = new google.maps.Marker({
        position: {lat: parseFloat(map_location.lat), lng: parseFloat(map_location.lng)},
        map: SingleMap,
        content: map_location.address
    });

    var infoWindow = new google.maps.InfoWindow({
        content: map_location.address
    });

    marker.addListener('click', function() {
        infoWindow.setContent(this.content);
        infoWindow.open(SingleMap, this);
    });
    
}

</script>

<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfyOfkCEG42DnXoHSCwHbvC4rvcK6HSkw&callback=initMap"></script>