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
			  mapTypeControl: true,
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
 					showMarker (map, marker, idplace);
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
 		userposition[0].setMap(null);
    	var location = {lat: position.coords.latitude, lng: position.coords.longitude};	
	 	console.log(location);
	 	var myposition = new google.maps.Marker({
    		position: location,
    		map: map,
    		title: 'Vous êtes ici',
			icon: markericon
  		});
  		userposition[0]=myposition;
  	});
}
function showMarker(map, marker, idplace) {
	navigator.geolocation.getCurrentPosition(function(position){
	var latuser = position.coords.latitude;
	var lnguser = position.coords.longitude;
	var latplace = marker.latLng.lat(function(){});
	var lngplace = marker.latLng.lng(function(){});
	var distance = Math.abs(latuser-latplace)+Math.abs(lnguser-lngplace)*110574;
	if(distance<=20)
	{
		document.location.href=path+idplace;
	}
	else
	{
		alert('vous etes à '+distance+"m");
	}
	});
}