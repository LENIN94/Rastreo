/**
 * Created by HP on 29/05/2016.
 */
var geocoder = new google.maps.Geocoder();
var latitud = "";
var longitud = "";
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(mostrarUbicacion);
} else {
    alert("¡Error! Este navegador no soporta la Geolocalización.");
}
function mostrarUbicacion(position) {
    var times = position.timestamp;
    latitud = position.coords.latitude;
    longitud = position.coords.longitude;
    var altitud = position.coords.altitude;
    var exactitud = position.coords.accuracy;
}


function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function (responses) {
        if (responses && responses.length > 0) {
            updateMarkerAddress(responses[0].formatted_address);
        } else {
            updateMarkerAddress('Cannot determine address at this location.');
        }
    });
}


function updateMarkerStatus(str) {
    document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {

    $("#txtLongitud").val(  latLng.lat());
    $("#txtLongitud").val(  latLng.lng());
}

function updateMarkerAddress(str) {
  //  document.getElementById('address').innerHTML = str;
}
infoWindow = new google.maps.InfoWindow();
function initialize() {
    var latLng = new google.maps.LatLng(latitud, longitud);
    var map = new google.maps.Map(document.getElementById('mapCanvas'), {
        zoom: 16,
        center: latLng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var marker = new google.maps.Marker({
        position: latLng,
        title: 'Ubicación del Cliente',
        map: map,

        draggable: true,
        icon: baseurl + 'images/marker.png' // null = default icon
    });


    function openInfoWindow(marker) {
        var markerLatLng = marker.getPosition();
        infoWindow.setContent([
            'La posicion del cliente es:',
            markerLatLng.lat(),
            ', ',
            markerLatLng.lng(),
            '<br><b>Arrastrame y suelta para actualizar la ubicación</b>'
        ].join(''));
        infoWindow.open(map, marker);
    }

    // Update current position info.
    updateMarkerPosition(latLng);
    geocodePosition(latLng);

    // Add dragging event listeners.
    google.maps.event.addListener(marker, 'dragstart', function () {
        updateMarkerAddress('Dragging...');
    });

    google.maps.event.addListener(marker, 'drag', function () {
        updateMarkerStatus('Dragging...');
        updateMarkerPosition(marker.getPosition());
    });

    google.maps.event.addListener(marker, 'dragend', function () {
        updateMarkerStatus('Drag ended');
        geocodePosition(marker.getPosition());
    });
    google.maps.event.addListener(marker, 'click', function () {
        openInfoWindow(marker);
    });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);