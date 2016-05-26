/**
 * Created by HP on 24/05/2016.
 */

$(document).ready(function () {
    /* $("#datatable-responsive").on("click", "td", function() {
     alert($( this ).text());
     });*/
    $("#datatable-responsive tbody tr").on("click", function () {
        $('#txtID').val($(this).find("td:first").text());
        $('#tipoOp').val(1);
        $.getJSON(baseurl + "Cliente/SelectID", {ID: $("#txtID").val()}, function (JSON) {
            $('#txtRFC').val(JSON[0].vchRFC);
            $('#txtDir').val(JSON[0].vchDireccion);
            $('#txtTel').val(JSON[0].vchTel);
            $('#txtNombre').val(JSON[0].vchEmpresa);
            $('#txtEmail').val(JSON[0].vchCorreo);

        });
        $('#myModal').modal('show');
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

    });


});

