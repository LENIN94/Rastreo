/**
 * Created by HP on 24/05/2016.
 */

$(document).ready(function () {
    $('#datatable-responsive ').DataTable( {
        "order": [[ 0, "desc" ]]
    } );

    $("#datatable-responsive tbody tr").on("click", function () {
        $('#txtID').val($(this).find("td:first").text());
        $.getJSON(baseurl + "Visita/SelectID", {ID: $("#txtID").val()}, function (JSON) {
            $('#txtVendedor').val(JSON[0].vchVendedor);
            $('#txtCliente').val(JSON[0].vchCliente);
            $('#txtDir').val(JSON[0].vchUbicacion);
            $('#txtComentario').val(JSON[0].txtComentario);
            $('#txtFecha').val(JSON[0].dtFecha);
            $('#txtHoraL').val(JSON[0].tmHoraE);
            $('#txtHoraT').val(JSON[0].tmHoraS);
            $('#txtLatitud').val(JSON[0].vchLatitud);
            $('#txtLongitud').val(JSON[0].vchLongitud);
            $('#btnMapa').attr("href", "https://maps.google.com/?q="+JSON[0].vchLatitud+","+JSON[0].vchLongitud);
        });
        $('#myModal').modal('show');
    });


   


});

