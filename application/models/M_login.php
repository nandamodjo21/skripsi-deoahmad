<?php
 
class M_login extends CI_Model{
    
   public function cek_user($u,$p){
        $query = $this->db->query("SELECT id_login,nik,username,id_role FROM t_login where username = '$u' AND password =md5( '$p')"); 
        return $query->row();
    }  
}
?>