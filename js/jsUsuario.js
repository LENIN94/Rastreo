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
        $.getJSON(baseurl + "Usuario/SelectID", {ID: $("#txtID").val()}, function (JSON) {
            $('#txtUsuario').val(JSON[0].vchUsuario);
            $('#txtPass').val(JSON[0].vchPass);
            $('#txtNombre').val(JSON[0].vchNombre);
            $('#txtEmail').val(JSON[0].vchCorreo);
            $('#cmbEstatus').val(JSON[0].intEstatus);
            $('#cmbTipo').val(JSON[0].intPrivilegio);
        });
        $('#myModal').modal('show');
    });

    // Al hacer click en el botón para guardar
    $("form#formulario").submit(function () {

        if($("#tipoOp").val()==0){
          
            var Usuario = new Object();
            Usuario.vchNombre = $('input#txtNombre').val();
            Usuario.vchUsuario = $('input#txtUsuario').val();
            Usuario.vchPass = $('input#txtPass').val();
            Usuario.intPrivilegio = $('select#cmbTipo').val();
            Usuario.vchCorreo = $('input#txtEmail').val();
            $("#mensaje").append("<div class='modal1'><div class='center1'> <center> <img src='" + baseurl + "/images/gif-load.gif'> Guardando Informacion...</center></div></div>");
            var DatosJson = JSON.stringify(Usuario);
            $.post(baseurl + 'Usuario/Insert',
                {
                    UsuarioPost: DatosJson
                },
                function (data, textStatus) {
                    $("#mensaje").html(data.error_msg);
                },
                "json"
            );

        }else {
            var Usuario = new Object();
            Usuario.intIdUsuario = $('input#txtID').val();
            Usuario.vchNombre = $('input#txtNombre').val();
            Usuario.vchUsuario = $('input#txtUsuario').val();
            Usuario.vchPass = $('input#txtPass').val();
            Usuario.intEstatus = $('select#cmbEstatus').val();
            Usuario.intPrivilegio = $('select#cmbTipo').val();
            Usuario.vchCorreo = $('input#txtEmail').val();
            $("#mensaje").append("<div class='modal1'><div class='center1'> <center> <img src='" + baseurl + "/images/gif-load.gif'> Guardando Informacion...</center></div></div>");
            var DatosJson = JSON.stringify(Usuario);
            $.post(baseurl + 'Usuario/Update',
                {
                    UsuarioPost: DatosJson
                },
                function (data, textStatus) {
                    $("#mensaje").html(data.error_msg);
                },
                "json"
            );
        }
        return false;
    });

    $("#btnYesDelete").on("click",function () {
        $('#modalConfirm').modal('hide');
        document.getElementById('mensaje').innerHTML = "<div class='modal'><div class='center'> <center> <img src='" + baseurl + "/images/gif-load.gif'> Eliminando Cliente...</center></div></div>";
        var UsuarioObject = new Object();
        UsuarioObject.intIdUsuario = $('input#txtID').val();
        var DatosJson = JSON.stringify(UsuarioObject);
        $.post(baseurl + 'Usuario/Delete',
            {
                UsuarioPost: DatosJson
            },
            function (data, textStatus) {
                $("#mensaje").html(data.error_msg);
            },
            "json"
        );
    });

    $("#btnNew").on("click",function () {
        $('#myModal').modal('show');
        $('#divID').hide();
        $('#divEstatus').hide();
        $('#tipoOp').val(0);

    });





});

