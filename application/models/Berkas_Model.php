<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas_Model extends CI_Model{

    	function __construct(){
			parent::__construct();
			$this->load->database();
		}
    // public function getAllBerkas()
    // {
    //     return $this->db->get('berkas')->result_array();
    // }

    // function store_data($data){
        
	// 	$insert_data['judul'] 	            = $data['judul'];
    //     $insert_data['deskripsi'] 		    = $data['deskripsi'];
    //     $insert_data['pembimbing1'] 		= $data['pembimbing1'];
    //     $insert_data['pembimbing2'] 		= $data['pembinbing2'];
    //     $insert_data['kompetensi'] 		    = $data['kompetensi'];
    //     $insert_data['deskripsi'] 		    = $data['deskripsi'];
	// 	$insert_data['file']		        = $data['file'];

	// 	$query = $this->db->insert('berkas', $insert_data);
	// }

	
	private $_table = "berkas";

		
	public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	public function getBerkasById($id)
	{
		return $this->db->get_where('berkas', ['id' => $id])->row_array();
	}

	public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }
	
	public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
 
	public function download($id){
		$query = $this->db->get_where('berkas',array('id'=>$id));
		return $query->row_array();
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
		
	}
}

