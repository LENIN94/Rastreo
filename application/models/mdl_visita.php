<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2016
 * Time: 16:10
 */

class mdl_visita extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }


    public function CargaInventario(){
        $sql= "SELECT  * from view_visita";
        $query=$this->db->query($sql);
        return $query;
    }
    public function GETOne($ID){
        $sql = "select * from view_visita where intIdVisita=$ID;";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function Update($ID,$DATA){
            $this->db->trans_start();
            $this->db->where('intIdCliente', $ID);
            $this->db->update('tblCliente', $DATA);
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
        $this->db->insert('tblCliente', $DATA);
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){// Check if transaction result successful
            $this->db->trans_rollback();
            return FALSE;
        }else{

            return TRUE;
        }
    }
   

}