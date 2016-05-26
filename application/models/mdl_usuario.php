<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2016
 * Time: 16:10
 */

class mdl_usuario extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }


    public function CargaInventario(){
        $sql= "SELECT  * from view_vendedor";
        $query=$this->db->query($sql);
        return $query;
    }
    public function GETOne($ID){
        $sql = "select * from view_vendedor where intIdUsuario=$ID;";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function Update($ID,$DATA){
            $this->db->trans_start();
            $this->db->where('intIdUsuario', $ID);
            $this->db->update('tblusuario', $DATA);
            $this->db->trans_complete();
            if($this->db->trans_status() === FALSE){// Check if transaction result successful
                $this->db->trans_rollback();
                return FALSE;
            }else{
                return TRUE;
            }
    }
    public function Insert($DATA){
        $this->db->trans_start();
        $this->db->insert('tblusuario', $DATA);
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){// Check if transaction result successful
            $this->db->trans_rollback();
            return FALSE;
        }else{

            return TRUE;
        }
    }

}