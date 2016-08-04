function initMap() {
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(position){
			
	    	var location = {lat: position.coords.latitude, lng: position.coords.longitude};	
			var markersarray = [];
			var userposition = [];
			
			var mapOptions = {
			  center: location,
			  zoom: 18,
			  mapTypeControl: false,
			  zoomControl: false,
			  mapTypeId: google.maps.MapTypeId.TERRAIN,
			  scrollwheel: false,
			  streetViewControl: false,

			};

			var map = new google.maps.Map(document.getElementById('map'), mapOptions );
		   	var myposition = new google.maps.Marker({
			    position: location,
			    map: map,
			    title: 'Vous êtes ici',
			    icon: markericon
			});
		   	userposition.push(myposition);

			for (i = 0 ; i < places.length ; i++ )
			{
				var point = {lat: places[i][0], lng: places[i][1]};
				var marker = new google.maps.Marker({
				    position: point,
				    map: map,
				    title: places[i][2]
				});
				markersarray.push(marker);
	 			google.maps.event.addListener(marker, 'click', function(marker) {
 					var idplace = $(this)[0].title;
 					showMarker (map, idplace);
 				});
			}
			console.log(markersarray);
			map.addListener('bounds_changed', function() {
    			replaceMarker(map, userposition);
 			});
		});
	}
}
function replaceMarker(map, userposition) {
 	navigator.geolocation.getCurrentPosition(function(position){
 		console.log('');
 		userposition[0].setMap(null);
    	var location = {lat: position.coords.latitude, lng: position.coords.longitude};	
	 	var myposition = new google.maps.Marker({
    		position: location,
    		map: map,
    		title: 'Vous êtes ici',
			icon: markericon
  		});
  		userposition[0]=myposition;
  	});
}
function showMarker(map, idplace) {
	
	document.location.href=path+idplace;
}