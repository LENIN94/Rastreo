<?php
/**
 * Created by PhpStorm.
 * User: LENIN
 * Date: 06/02/2016
 * Time: 11:54 AM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_login');
    }

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            $data = array
            (
                'inventario' => $this->mdl_login->CargaInventario(),

            );
            $this->load->view('main/view_main2');
        } else {
            $this->load->view('auth/view_acceso');
        }
    }

    function CerrarSesion()
    {
        /*destrozamos la sesion activay nos vamos al login de nuevo*/
        if ($this->session->userdata('is_logged_in')) {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }

    public function ValidaAcceso()
    {
        session_start();
        $Login = json_decode($this->input->post('LoginPost'));
        $response = array(
            "campo" => "",
            "error_msg" => "",
            "extra" => "",
            "Sesion" => ""
        );
        if ($Login->UserName == "") {
            $response["campo"] = "txtusuario";
            $response["error_msg"] = "<div class='alert alert-danger alert-dismissible fade in text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>El Usuario es Obligatorio</div>";
        } else if ($Login->Password == "") {
            $response["campo"] = "txtpass";
            $response["error_msg"] = "<div class='alert alert-danger alert-dismissible fade in text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>La Contraseña es Obligatoria</div>";
        } else {


            $user = $this->mdl_login->LoginBD($Login->UserName, $Login->Password);
            $existe = count($user);
            if (count($user) == 1) {



                $session = array(
                    'ID'           => $user->intIdUsuario,
                    'NOMUSUARIO'           => $user->vchUsuario,
                    'NOMBRE'       => $user->vchNombre,
                    'CORREO'=>$user->vchCorreo,
                    'is_logged_in' => TRUE,
                );


                $this->session->set_userdata($session);//Cargamos la sesion de datos del usuario logeado


                $response["Sesion"] = "";

                $response["error_msg"] = '<div><meta http-equiv="refresh" content="1"></div>';
                $response["extra"] = $existe;


            } else {
                $response["error_msg"] = "<div class='alert alert-danger alert-dismissible fade in text-center' role='alert' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>Los datos de sesión son incorrectos</div>";
            }
        }
        echo json_encode($response);
    }
}
