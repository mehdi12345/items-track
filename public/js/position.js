var show = document.getElementById("latitude");
var show1 = document.getElementById("longitude");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    show.value = "Geolocation is not supported by this browser.";
    show1.value = "Geolocation is not supported by this browser.";
  }
}

function showPosition(pos) {
  show1.setAttribute('value',pos.coords.longitude) ;
  show.setAttribute('value',pos.coords.latitude) ;
}

getLocation();