/**
 * Created by HP on 24/05/2016.
 */


$(document).ready(function(){

    $("form#loginform").submit(function()
    {
            var Login 		 = new Object();
            Login.UserName   = $('input#txtusuario').val();
            Login.Password   = $('input#txtpass').val();

            $("#mensaje").append("<div class='modal'><div class='center'> <center> <img src='"+ baseurl +"/images/gif-load.gif'> Iniciando Sessión...</center></div></div>");
            var DatosJson = JSON.stringify(Login);


            $.post(baseurl + 'Login/ValidaAcceso',
                {
                    LoginPost: DatosJson
                },
                
                
                function(data, textStatus) {

                    $("#"+data.campo+"").focus();
                    $("#mensaje").html(data.error_msg);
                    if(data.extra==1){
                        window.location = baseurl+data.Sesion;
                    }
                },
                "json"
            );
            return false;
    });

});


