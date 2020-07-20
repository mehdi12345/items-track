
       function getMap(la,lo) {
       var latitude =la;
       var longitude =lo ;
       var location = new google.maps.LatLng(latitude, longitude);
       var map = new google.maps.Map(document.getElementById("Map"), {
        zoom:15,
        center:location
    });
    var marker = new google.maps.Marker({ position:location, map:map });
        document.getElementById('lat').innerHTML=latitude;
        document.getElementById('lon').innerHTML=longitude;
       }




