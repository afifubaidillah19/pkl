<?php 
class M_PengajuanTugasAkhir extends CI_Model {
    public function __construct(){
        parent::__construct();
    }    
    public function store($data){
        $result = $this->db->insert('t_TugasAkhir',$data);
        return $result;
    }
}
?>