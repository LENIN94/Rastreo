<?php

/**
 * Created by PhpStorm.
 * User: OmarLenin
 * Date: 16/02/2016
 * Time: 12:14 PM
 */
require_once APPPATH . "/third_party/Slim/Slim.php";


\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

class wsRest extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_cliente');
        $this->load->model('mdl_login');
         $this->load->model('mdl_api');
    }
    function index(){
        echo "hola";
    }




    
    public function wsLogin(){
        global $app;
        $U = $app->request->post('usuario');
        $P = $app->request->post('pass');

        $user = $this->mdl_login->LoginMovil($U, $P);
        if (count($user) == 1) {
            $session = array(
                'ID' => $user->intIdUsuario,
                'USUARIO' => $user->vchUsuario,
                'PASS' => $user->vchPass,
                'NOMBRE' => $user->vchNombre,
                'IMAGEN' => $user->vchImagen,
                'CORREO' => $user->vchCorreo
            );
            $response["error"] = false;
            $response["user"] = $session;
        } else {
            $response["error"] = true;
            $response["message"] = "No tienes permisos para ingresar";
        }
        $this->echoRespnse(200, $response);
    }
    public function wsRegVisita(){
        global $app;
        $ID=$app->request->post('ID');
        $Long = $app->request->post('LONG');
        $Lat = $app->request->post('LAT');
        $Ubicacion=$app->request->post('UBICACION');
        $Cliente = $app->request->post('CLIENTE');
        $RESPONSE= $this->mdl_api->RegVisita($ID,$Cliente,$Long,$Lat,$Ubicacion);
        $this->echoRespnse(200, $RESPONSE);
    }
    public function wsGetClientes(){
        $RESPONSE= $this->mdl_api->ClientesResult();
        $this->echoRespnse(200, $RESPONSE);
    }




    public function login()
    {
        global $app;
        // reading post params
        $name = $app->request->post('ID');
        // validating email address
        $response = $this->mdl_api->createUser($name);
        // echo json response
        $this->echoRespnse(200, $response);
    }
    
    public function updateGCM()
    {
        global $app;
        $user_id = $app->request->post('id');
        $gcm_registration_id = $app->request->post('gcm_registration_id');
        $response = $this->mdl_api->updateGcmID($user_id, $gcm_registration_id);
        $this->echoRespnse(200, $response);
    }
     public function borraGCM()
    {
        global $app;
        $user_id = $app->request->post('id');
        $response = $this->mdl_api->borraGCM($user_id);
        $this->echoRespnse(200, $response);
    }

    public function echoRespnse($status_code, $response)
    {
        $app = \Slim\Slim::getInstance();
        // Http response code
        $app->status($status_code);

        // setting response content type to json
        $app->contentType('application/json');

        echo json_encode($response);
    }

    public function sendNotification(){
        global $app;
        $ID = $app->request->post('IdTecnico');
        $Mensaje = $app->request->post('Mensaje');
        $Datos=$this->mdl_api->searchTec($ID);


        $apiKey = 'AIzaSyCmvyB9ZvCAAW82UczhXEcxHLJKZMDUo-4';
        $token = $Datos[0]->vchKey;
        $image = false;

        $data = array();
        $data['title'] = 'TecnoCom Reporte';
        $data['message'] = $Mensaje;
        if ($image == 'true') {
            $data['image'] = 'http://tecnocom.com.mx/assets/images/logo_203x160.png';
        } else {
            $data['image'] = '';
        }
        $data['created_at'] = date('Y-m-d G:i:s');
		
		$data['intFolio']=$app->request->post('idReporte');
        $fields = array(
            'to' => $token,
            'data' => $data,
        );
        // Set POST variables
        $url = 'https://gcm-http.googleapis.com/gcm/send';

        $headers = array(
            'Authorization: key=' . $apiKey,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $response = array();
        $response['error'] = false;
        $response['message'] = 'Mensaje ENviado!';
        // Execute post
        $result = curl_exec($ch);
        // Close connection
        curl_close($ch);
        $this->echoRespnse(200, $response);
    }
}
