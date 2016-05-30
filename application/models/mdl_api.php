<?php

/**
 * Created by PhpStorm.
 * User: OmarLenin
 * Date: 05/03/2016
 * Time: 11:02 AM
 */
date_default_timezone_set('America/Mexico_City');
class mdl_api extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function ClientesResult()
    {
        $response = array();
        $sql = "SELECT  * from view_cliente";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            $datos = $query->result();
            $response["error"] = false;
            $response["DATA"] = $datos;
        } else {
            $response["error"] = false;
            $response["message"] = "No se encontraron clientes registrados";
        }
        return $response;
    }

    public function createUser($ID)
    {

        $response = array();

        // First check if user already existed in db
        if (!$this->isUserExists($ID)) {
            // insert query
            $array = array(
                'intIdTecnico' => $ID
            );
            $this->db->trans_start();
            $this->db->insert('tbl_usuarios_notificaciones', $array);
            $result = $this->db->trans_complete();

            // Check for successful insertion
            if ($result) {
                // User successfully inserted
                $response["error"] = false;
                $response["user"] = $this->getUserByEmail($ID);
            } else {
                // Failed to create user
                $response["error"] = true;
                $response["message"] = "Oops! ha ocurrido un error";
            }
        } else {
            // User with same email already existed in the db
            $response["error"] = false;
            $response["user"] = $this->getUserByEmail($ID);
        }
        return $response;
    }

    private function isUserExists($ID)
    {
        $sql = "select * from tbl_usuarios_notificaciones where intIdTecnico=$ID;";
        $query = $this->db->query($sql);
        return $query->num_rows > 0;
    }

    public function getUserByEmail($ID)
    {
        $sql = "select intIdUsuario,intIdTecnico, vchKey from tbl_usuarios_notificaciones where intIdTecnico=$ID;";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            $datos = $query->result();
            $user = array();
            $user["user_id"] = $datos[0]->intIdUsuario;
            $user["tec"] = $datos[0]->intIdTecnico;
            // $user["email"] =   $query[0]->vchKey;
            return $user;
        } else {
            return NULL;
        }
    }


    public function updateGcmID($ID, $gcm)
    {
        $response = array();
        $sql = "update tbl_usuarios_notificaciones set vchKey='$gcm' where intIdTecnico=$ID;";
        if ($this->db->query($sql)) {
            // User successfully updated
            $response["error"] = false;
            $response["message"] = 'GCM registration ID updated successfully';
        } else {
            // Failed to update user
            $response["error"] = true;
            $response["message"] = "Failed to update GCM registration ID";
            $f = $this->db->query($sql);
            $f->error();
        }
        return $response;
    }


    public function RegVisita($ID, $Cliente, $Long, $Lat, $Dir)
    {
        $response = array();

        $Fecha = date("Y-m-d");
        $Hora = date("H:i:s");
        $sql = "insert into  tblVisita values (null,$ID, $Cliente, '$Dir','$Lat', '$Long',  null , '$Fecha', '$Hora',null ) ;";
        if ($this->db->query($sql)) {
            // User successfully u
            $response["error"] = false;
            $response["message"] = 'Visita almacenada d}en la bd correctamente';
        } else {
            // Failed
            $response["error"] = true;
            $response["message"] = "Error al intentar registrar la visita";
            $f = $this->db->query($sql);
            $f->error();
        }
        return $response;
    }


    public function borraGCM($ID)
    {
        $response = array();
        $sql = "update tbl_usuarios_notificaciones set vchKey='' where intIdTecnico=$ID;";
        if ($this->db->query($sql)) {
            // User successfully updated
            $response["error"] = false;
            $response["message"] = 'GCM borrado';
        } else {
            // Failed to update user
            $response["error"] = true;
            $response["message"] = "Ocurrio un Error";
            $f = $this->db->query($sql);
            $f->error();
        }
        return $response;
    }


    public function searchTec($ID)
    {
        $sql = "select intIdUsuario,intIdTecnico, vchKey from tbl_usuarios_notificaciones where intIdTecnico=$ID;";
        $query = $this->db->query($sql);
        return $query->result();
    }


}