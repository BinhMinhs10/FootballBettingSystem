@extends('layouts.background')

@section('content')
	<h1>Contact</h1>
	<form action="contact/submit" method="post">
		@csrf
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
		</div>
		<div class="form-group">
			<label for="email">Email Address:</label>
			<input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
		</div>
		<div class="form-group">
			<label for="message">Comment:</label>
			<textarea name="message" id="message" rows="5" class="form-control" placeholder="Enter message"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

	<br/>
	<br/>
	<br/>
	<br/>
	<div id="map" style="width:100%;height:400px;"></div>
	<script>
		var marker;
        function initMap() {
            var hn = {lat: 21.028511, lng: 105.804817};
            // Create a map object and specify the DOM element
            // for display.
            var map = new google.maps.Map(document.getElementById('map'), {
              	center: hn,
              	zoom: 15
			  	// 1: World
			    // 5: Landmass/continent
			    // 10: City
			    // 15: Streets
			    // 20: Buildings
            });
            // Create a marker and set its position.
            // image for maker
            var icon = {
			    url: "images/marker.png", // url
			    scaledSize: new google.maps.Size(40, 40), // scaled size
			    origin: new google.maps.Point(0,0), // origin
			    anchor: new google.maps.Point(0, 0) // anchor
			};
            marker = new google.maps.Marker({
              	map: map,
              	position: hn,
              	title: 'Football betting system',
              	icon: icon,
              	draggable: true,
              	animation: google.maps.Animation.DROP,

            });
            // animation 
            marker.addListener('click', toggleBounce);

        }
        // animation
        function toggleBounce() {
	        if (marker.getAnimation() !== null) {
	        	marker.setAnimation(null);
	        } else {
	        	marker.setAnimation(google.maps.Animation.BOUNCE);
	        }
	    }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiPaRl36sh9NMdWzthJZJj-RoFSuS2JfA&callback=initMap" async defer>
   	</script>
@endsection