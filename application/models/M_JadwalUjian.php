<?php 
class M_JadwalUjian extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getListData(){
        return $this->db->get('t_jadwalta')->result();
    }
}
?>