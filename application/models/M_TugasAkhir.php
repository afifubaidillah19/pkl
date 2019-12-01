<?php  
	defined('BASEPATH') OR exit('No Direct script access allowed');

	/**
	* 
	*/
	class M_TugasAkhir extends CI_Model
	{
		private $_table = "t_tugasakhir";

		public $ta_nim;
		public $ta_nama;
		public $kompetensi;
		public $ta_judul;
		public $ta_cp1;
		public $ta_cp2;
	    
		public function getAll(){
			return $this->db->get($this->_table)->result();
			//return $this->db->get_where('t_tugasakhir', ['email' => $this->session->userdata('email')])->row_array();
		}
		public function getById($ta_nim)
    	{
        return $this->db->get_where($this->_table, ["ta_nim" => $ta_nim])->row();
   		}

/*   		public function input(){
   			$nama = $this->input->post('nama');
   			$prodi = $this->input->post('prodi');
   			$jenjang = $this->input->post('jenjang');
   			$alamat = $this->input->post('alamat');
   			$data  = array('nama' => $nama, 'prodi' => $prodi, 'jenjang' => $jenjang, 'alamat' =>$alamat);
   			
   			$this->db->insert('anggota', $data);
    	}
    */
   		public function update($ta_nim)
	    {
	    	$post = $this->input->post();
	        $kompetensi = $this->input->post('kompetensi');
   			$ta_judul = $this->input->post('ta_judul');
   			$ta_cp1 = $this->input->post('ta_cp1');
   			$ta_cp2 = $this->input->post('ta_cp2');
   			$data  = array('kompetensi' => $kompetensi, 'ta_judul' => $ta_judul, 'ta_cp1' => $ta_cp1, 'ta_cp2' =>$ta_cp2);
	        $this->db->where('ta_nim',$ta_nim)->update('t_tugasakhir', $data);
			
	    }


    	public function delete($ta_nim)
	    {
	    	$this->db->delete('t_tugasakhir', array('ta_nim'=>$ta_nim));
	    }

   		}
?>