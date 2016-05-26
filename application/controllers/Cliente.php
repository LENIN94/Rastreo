<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2016
 * Time: 16:09
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

class Cliente extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_cliente');
    }

    public function index()
    {
        $data = array
        (
            'inventario' => $this->mdl_cliente->CargaInventario(),
        );
        $this->load->view('cliente/view_cliente', $data);
    }

    public  function SelectID(){
        $ID = $this->input->get("ID");
        $Data= $this->mdl_cliente->GETOne($ID);
        echo json_encode($Data);
    }

    public function Update(){
        $JSON = json_decode($this->input->post('ClientePost'));
        $response = array(
            "error_msg" => ""
        );

        $DATA = array(
            'vchEmpresa' => $JSON->vchEmpresa,
            'vchRFC' => $JSON->vchRFC,
            'vchCorreo' => $JSON->vchCorreo,
            'vchDireccion'=>$JSON->vchDireccion,
            'vchTel'=>$JSON->vchTel
        );
        if( $this->mdl_cliente->Update($JSON->intIdCliente,$DATA)) {
            $response["error_msg"] = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button> Informacion Guardada Correctamente<meta http-equiv='refresh' content='1'></div>";
        }else{
            $response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Lo sentimos ha ocurrido un error</div>";

        }
        echo json_encode($response);
    }
    public function Delete(){
        $JSON = json_decode($this->input->post('ClientePost'));
        $id = $JSON->intIdCliente;
        $response = array(
            "estatus" => false,
            "error_msg" => ""
        );
        $DATA=array(
            "intVisible"=>"0"
        );
        $this->mdl_cliente->Update($id,$DATA);
        $response["error_msg"] = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Cliente Eliminado Correctamente   <meta http-equiv='refresh' content='1'></div>";
        echo json_encode($response);
    }

    public function Insert(){
        $JSON = json_decode($this->input->post('ClientePost'));
        $response = array(
            "error_msg" => ""
        );

        $DATA = array(
            'vchEmpresa' => $JSON->vchEmpresa,
            'vchRFC' => $JSON->vchRFC,
            'vchCorreo' => $JSON->vchCorreo,
            'vchDireccion'=>$JSON->vchDireccion,
            'vchTel'=>$JSON->vchTel
        );
        if( $this->mdl_cliente->Insert($DATA)) {
            $response["error_msg"] = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button> Informacion Guardada Correctamente<meta http-equiv='refresh' content='1'></div>";
        }else{
            $response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Lo sentimos ha ocurrido un error</div>";

        }
        echo json_encode($response);
    }


}