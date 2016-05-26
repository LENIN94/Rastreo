<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2016
 * Time: 16:09
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_usuario');
    }

    public function index()
    {
        $data = array
        (
            'inventario' => $this->mdl_usuario->CargaInventario(),
        );
        $this->load->view('usuario/view_usuario', $data);
    }
    
    public  function SelectID(){
        $ID = $this->input->get("ID");
        $Data= $this->mdl_usuario->GETOne($ID);
        echo json_encode($Data);
    }

    public function Insert(){
        $JSON = json_decode($this->input->post('UsuarioPost'));
        $response = array(
            "error_msg" => ""
        );
        $DATA = array(
            'vchNombre' => $JSON->vchNombre,
            'vchCorreo' => $JSON->vchCorreo,
            'vchUsuario'=>$JSON->vchUsuario,
            'intPrivilegio'=>$JSON->intPrivilegio
        );
        if( $this->mdl_usuario->Insert($DATA)) {
            $response["error_msg"] = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button> Informacion Guardada Correctamente<meta http-equiv='refresh' content='1'></div>";
        }else{
            $response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Lo sentimos ha ocurrido un error</div>";
        }
        echo json_encode($response);
    }

    public function Update(){
        $JSON = json_decode($this->input->post('UsuarioPost'));
        $response = array(
            "error_msg" => ""
        );
        $DATA = array(
            'vchNombre' => $JSON->vchNombre,
            'intEstatus' => $JSON->intEstatus,
            'vchCorreo' => $JSON->vchCorreo,
            'vchUsuario'=>$JSON->vchUsuario,
            'intPrivilegio'=>$JSON->intPrivilegio
        );
       if( $this->mdl_usuario->Update($JSON->intIdUsuario,$DATA)) {
           $response["error_msg"] = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button> Informacion Guardada Correctamente<meta http-equiv='refresh' content='1'></div>";
       }else{
           $response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Lo sentimos ha ocurrido un error</div>";

       }
        echo json_encode($response);
    }
    public function Delete(){
        $JSON = json_decode($this->input->post('UsuarioPost'));
        $id = $JSON->intIdUsuario;
        $response = array(
            "estatus" => false,
            "error_msg" => ""
        );
        $DATA=array(
            "intVisible"=>"0"
        );
        $this->mdl_usuario->Update($id,$DATA);
        $response["error_msg"] = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Usuario Eliminado Correctamente   <meta http-equiv='refresh' content='1'></div>";
        echo json_encode($response);
    }
}