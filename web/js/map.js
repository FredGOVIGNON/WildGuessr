function initMap() {
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(position){
			
	    	var location = {lat: position.coords.latitude, lng: position.coords.longitude};	
			
			var map = new google.maps.Map(document.getElementById('map'), {
		      center: location,
		      scrollwheel: false,
		      zoom: 17
		    });
		   	var marker = new google.maps.Marker({
			    position: location,
			    map: map,
			    title: 'Vous êtes ici',
			    icon: markericon
			});
			console.log(places);
			for (i = 0 ; i < places.length ; i++ )
			{
				var point = {lat: places[i][0], lng: places[i][1]};
				var marker = new google.maps.Marker({
				    position: point,
				    map: map,
				    title: places[i][2]
				});
			}
		});
    }
        
}