<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mdl_login extends CI_Model {
	function __construct()
     {
          parent::__construct();
     }

      function LoginBD($username,$pass)
     {
          $this->db->where('vchUsuario', $username);
          $this->db->where('vchPass', $pass);

          return $this->db->get('view_acceso')->row();
     }


      public function CargaInventario(){
        $sql= "SELECT  * from tblUsuario";
        $query=$this->db->query($sql);
        return $query;
    }
}