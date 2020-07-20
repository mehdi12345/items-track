
      function Position() {
       if(navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(getMap(), error);
       } else {
       alert("Your browser does not support HTML5 geolocation.");
       }
       }

       function getMap(la,lo) {
       var latitude =la;
       var longitude =lo ;
       var location = new google.maps.LatLng(latitude, longitude);
        document.getElementById('lat').innerHTML=latitude;
        document.getElementById('lon').innerHTML=longitude;
       }

       var map = new google.maps.Map(document.getElementById("Map"), {
           zoom:10,
           center:location
       });
       var marker = new google.maps.Marker({ position:location, map:map });

var result=document.getElementById('result');
       function error(error) {
        switch(error.code){
        case error.PERMISSION_DENIED :{
            result.innerHTML = "You refuse to share your position.";break;
        } case error.POSITION_UNAVAILABLE : {
            result.innerHTML = "unavailable information.";break;
        } case error.TIMEOUT : {
            result.innerHTML = "timed out.";break;
        } default:{
            result.innerHTML = "unknown error.";break;
        }
    }}
