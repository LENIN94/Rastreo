<?php
$this->load->view('constant');
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <link rel="icon" type="image/<?php echo EXTENSION_IMAGEN_FAVICON; ?>"
          href="<?php echo base_url() ?>images/<?php echo NOMBRE_IMAGEN_FAVICON; ?>"/>

    <title><?php echo TITULO_PAGINA; ?></title>
    <!-- Bootstrap core CSS -->
    <meta name="theme-color" content="#1565c0" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jsLogin.js"></script>
    <script type="text/javascript">        var baseurl = "<?php echo base_url(); ?>";        </script>

</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form id="loginform" name="loginform" role="form">
                    <h1>Acceso</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Usuario" id="txtusuario"  />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" id="txtpass"  />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info "><span
                                class="glyphicon glyphicon-lock"></span> Ingresar
                        </button>
                        <a class="reset_pass" href="#">¿No recuerdas tu contraseña?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">


                        <div class="clearfix"></div>
                        <br />

                        <div class="form-group text-center">
                            <a href="<?php echo base_url() ?>app/.apk" class="btn btn-raised btn-success"><i
                                    class="fa fa-download"></i>&nbsp;&nbsp;APP&nbsp;&nbsp;<i class="fa fa-android" style="size: 50px"></i></a>
                        </div>

                        <div class="form-group text-center">

                            <p>©2016 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
                <div id="mensaje" name="mensaje"></div>
            </section>
        </div>


    </div>
</div>
</body>
</html>