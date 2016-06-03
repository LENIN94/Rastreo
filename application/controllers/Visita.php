<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2016
 * Time: 16:09
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

class Visita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_visita');
        $this->load->library('pdfrpt'); // Load library
        $this->pdfrpt->fontpath = 'font/'; // Specify font folder
    }
    function  PrintD(){

        $ID = $this->uri->segment(3);
        $Data= $this->mdl_visita->GETOne($ID);
        $this->pdfrpt->SetFont('Arial', '', 12); // definimos el tipo de letra y el tama�o
        $this->pdfrpt->AddPage(); // agregamos la pagina
        $this->pdfrpt->SetMargins(20, 20, 20); // definimos los margenes en este caso estan en milimetros
        $this->pdfrpt->Ln(5); // dejamos un peque�o espacio de 10 milimetros
        $this->pdfrpt->SetWidths(array(40, 133));
        $this->pdfrpt->Row(array(utf8_decode('Vendedor'), utf8_decode($Data[0]->vchVendedor)));
        $this->pdfrpt->Row(array('Cliente', utf8_decode($Data[0]->vchCliente)));
        $this->pdfrpt->Row(array(utf8_decode('Ubicacion'), utf8_decode( $Data[0]->vchUbicacion)));
        $this->pdfrpt->Row(array(utf8_decode('Fecha '), utf8_decode($Data[0]->dtFecha)));
        $this->pdfrpt->Row(array('Hora Inicio', utf8_decode($Data[0]->tmHoraE)));
        $this->pdfrpt->Row(array(utf8_decode('Hora Fin'), utf8_decode( $Data[0]->tmHoraS)));
        $this->pdfrpt->Row(array(utf8_decode('Comentario'), utf8_decode( $Data[0]->txtComentario)));
        $this->pdfrpt->Row(array(utf8_decode('Estatus'), utf8_decode( $Data[0]->intConcluido)));









        $this->pdfrpt->Output("Visita.pdf", 'I');
    }

    public function index()
    {
        $data = array
        (
            'inventario' => $this->mdl_visita->CargaInventario(),
        );
        $this->load->view('visita/view_visita', $data);
    }
    public function mapa()
    {

        $this->load->view('visita/view_mapa');
    }


    public  function SelectID(){
        $ID = $this->input->get("ID");
        $Data= $this->mdl_visita->GETOne($ID);
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
        if( $this->mdl_visita->Insert($DATA)) {
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
       if( $this->mdl_visita->Update($JSON->intIdUsuario,$DATA)) {
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
        $this->mdl_visita->Update($id,$DATA);
        $response["error_msg"] = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Usuario Eliminado Correctamente   <meta http-equiv='refresh' content='1'></div>";
        echo json_encode($response);
    }
}