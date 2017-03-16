(function(){

    var map = new google.maps.Map(document.querySelector('#map'));
    var marker;
    var directionButton = document.querySelector("#get-directions");

        //directions service - draw a route on a map
    var directionService = new google.maps.DirectionsService();
    var directionsDisplay;
    var locations = [];


    

    function initMap() {

        locations[0] = { lat: 44.500026, lng: -81.373138 };
        console.log('helloooo');
        //Map is centered over Marine Hertiage Society
        map.setCenter({ lat: 44.500026, lng: -81.373138 });
        map.setZoom(13);

        //Marine Heritage Marker
        marker = new google.maps.Marker({
            position: { lat: 44.500026, lng: -81.373138 },
            map: map,
            title: "Marine Heritage Society"
        });

        //Chantry Island Marker
        marker = new google.maps.Marker({
            position: { lat: 44.491419, lng: -81.404225 },
            map: map,
            title: "Chantry Island"
        });
    }

    function getDirections(position){
        directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setMap(map);//tells it to show itself on "map" map, as defined below in codeAddress

        var address = document.querySelector('#address').value;

        geocoder.geocode( {'address' : address}, function(results,status){
            if (status === google.maps.GeocoderStatus.OK){//making sure it loads
                locations[1] = { lat: results[0].geometry.location.lat(), //create second location
                                lng: results[0].geometry.location.lng() };

                map.setCenter(results[0].geometry.location);

                if(marker){
                    marker.setMap(null);
                    marker = new google.maps.Marker({
                        map: map, //map name
                        position: results[0].geometry.location
                    });
                }

                calcRoute(results[0].geometry.location);//make up function calcRoute and pass data through

            } else {
                console.log('Geocoder was not successful for the following reason:',status);
            }
        });
        //debugger;
        console.log('address');
    }


    function calcRoute(codedLoc) {
        var request = {
            origin: locations[0],
            destination: locations[1],
            travelMode: 'DRIVING'
        };

        directionService.route(request, function(response,status){
            if(status==='OK'){
                directionsDisplay.setDirections(response);
            }
        });
    }

    /*function getDirections(position){
        directionsDisplay = new google.maps.DirectionsRenderer();
       
        var request = {
            origin: 'London,ON'//locations[1],
            destination: //locations[0],
            travelMode: 'DRIVING'
        };
        
        directionsDisplay.setMap(map);
        directionService.route(request, function(result,status){
            if(status==='OK'){
                directionsDisplay.setDirections(result);
            }
        });

        /*marker = new google.maps.Marker({
            position: { lat: position.coords.latitude, lng: position.coords.longitude },
            //position: { lat: 44.500026, lng: -81.373138 },
            map: map,
            title: "Marine Heritage Society"
        });
    }*/

    if (navigator.geolocation) {
        //navigator.geolocation.getCurrentPosition(initMap, handleError);
        navigator.geolocation.getCurrentPosition(getDirections, handleError);
    }else{ //give some kind of error message to the user
        console.log('Your browser does not have a geolocation');
    }

    function handleError(e){
        console.log(e);
    }



    directionButton.addEventListener ('click', getDirections, false);

    //initMap();//fires map function
})();