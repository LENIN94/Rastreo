/**
 * Created by HP on 24/05/2016.
 */
var geocoder = new google.maps.Geocoder();
var Lat,Long;
function mostrarUbicacion(position) {

    latitud = position.coords.latitude;
    longitud = position.coords.longitude;
  //  alert($('#tipoOp').val());
    if( $('#tipoOp').val()==1){

      //  alert("Entro 1");
        latitud = Lat;
        longitud = Long;
    }else {
        latitud = position.coords.latitude;
        longitud = position.coords.longitude;

    }

    initialize(latitud, longitud);
    //alert(latitud);
}
function map() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(mostrarUbicacion);
        // posicion=navigator.geolocation.getCurrentPosition();
        //  alert(navigator.geolocation.coords.latitude + "," );
        // initialize(latitud2, longitud2);
    } else {
        alert("¡Error! Este navegador no soporta la Geolocalización.");
    }
}
function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function (responses) {
        if (responses && responses.length > 0) {
            updateMarkerAddress(responses[0].formatted_address);
        } else {
            updateMarkerAddress('No pudimos determinar la localización.');
        }
    });
}
function updateMarkerPosition(latLng) {

    $("#txtLatitud").val(latLng.lat());
    $("#txtLongitud").val(latLng.lng());

}
function updateMarkerAddress(str) {
    document.getElementById('address').innerHTML = str;
}
infoWindow = new google.maps.InfoWindow();
function initialize(latitud, longitud) {
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
            'La posición del cliente es:',
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
        updateMarkerAddress('Buscando...');
    });

    google.maps.event.addListener(marker, 'drag', function () {

        updateMarkerPosition(marker.getPosition());
    });

    google.maps.event.addListener(marker, 'dragend', function () {

        geocodePosition(marker.getPosition());
    });
    google.maps.event.addListener(marker, 'click', function () {
        openInfoWindow(marker);
    });
}

$(document).ready(function () {

    $("#datatable-responsive tbody tr").on("click", function () {
        $('#txtID').val($(this).find("td:first").text());
        $('#tipoOp').val(1);
        $.getJSON(baseurl + "Cliente/SelectID", {ID: $("#txtID").val()}, function (JSON) {
            $('#txtRFC').val(JSON[0].vchRFC);
            $('#txtDir').val(JSON[0].vchDireccion);
            $('#txtTel').val(JSON[0].vchTel);
            $('#txtNombre').val(JSON[0].vchEmpresa);
            $('#txtEmail').val(JSON[0].vchCorreo);

            Lat=JSON[0].vchLatitud;
            Long=JSON[0].vchLongitud;

        });
        $('#myModal').modal('show');
        map();

    });


    // Al hacer click en el botón para guardar
    $("form#formulario").submit(function () {
        if ($("#tipoOp").val() == 0) {
            var ClienteObject = new Object();

            ClienteObject.vchEmpresa = $('input#txtNombre').val();
            ClienteObject.vchRFC = $('input#txtRFC').val();
            ClienteObject.vchDireccion = $('input#txtDir').val();
            ClienteObject.vchTel = $('input#txtTel').val();
            ClienteObject.vchCorreo = $('input#txtEmail').val();
            ClienteObject.vchLatitud = $('input#txtLatitud').val();
            ClienteObject.vchLongitud = $('input#txtLongitud').val();
            $("#mensaje").append("<div class='modal1'><div class='center1'> <center> <img src='" + baseurl + "/images/gif-load.gif'> Guardando Informacion...</center></div></div>");
            var DatosJson = JSON.stringify(ClienteObject);
            $.post(baseurl + 'Cliente/Insert',
                {
                    ClientePost: DatosJson
                },
                function (data, textStatus) {
                    $("#mensaje").html(data.error_msg);

                },
                "json"
            );

        } else {
            var ClienteObject = new Object();
            ClienteObject.intIdCliente = $('input#txtID').val();
            ClienteObject.vchEmpresa = $('input#txtNombre').val();
            ClienteObject.vchRFC = $('input#txtRFC').val();
            ClienteObject.vchDireccion = $('input#txtDir').val();
            ClienteObject.vchTel = $('input#txtTel').val();
            ClienteObject.vchCorreo = $('input#txtEmail').val();
            ClienteObject.vchLatitud = $('input#txtLatitud').val();
            ClienteObject.vchLongitud = $('input#txtLongitud').val();
            $("#mensaje").append("<div class='modal1'><div class='center1'> <center> <img src='" + baseurl + "/images/gif-load.gif'> Guardando Informacion...</center></div></div>");
            var DatosJson = JSON.stringify(ClienteObject);
            $.post(baseurl + 'Cliente/Update',
                {
                    ClientePost: DatosJson
                },
                function (data, textStatus) {
                    $("#mensaje").html(data.error_msg);

                },
                "json"
            );
        }
        return false;
    });

    $("#btnYesDelete").on("click", function () {
        $('#modalConfirm').modal('hide');
        document.getElementById('mensaje').innerHTML = "<div class='modal'><div class='center'> <center> <img src='" + baseurl + "/images/gif-load.gif'> Eliminando Cliente...</center></div></div>";
        var ClienteObject = new Object();
        ClienteObject.intIdCliente = $('input#txtID').val();

        var DatosJson = JSON.stringify(ClienteObject);
        $.post(baseurl + 'Cliente/Delete',
            {
                ClientePost: DatosJson
            },
            function (data, textStatus) {
                $("#mensaje").html(data.error_msg);
            },
            "json"
        );
    });

    $("#btnNew").on("click", function () {
        $('#myModal').modal('show');
        $('#divID').hide();
        $('#divEstatus').hide();
        $('#tipoOp').val(0);
        map();
    });


});



