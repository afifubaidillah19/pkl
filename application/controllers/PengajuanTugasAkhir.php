<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class PengajuanTugasAkhir extends CI_Controller { 
	function __construct(){
		parent::__construct();
		$this->load->model('M_PengajuanTugasAkhir');
	}
	public function index() { 
        //$this->load->view('mahasiswa/Pengajuan_Tugas_Akhir/index');
	    $data['title'] = 'Pengajuan Tugas Akhir';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		$data['t_tugasakhir'] = $this->db->get_where('t_tugasakhir', ['ta_nim' => $this->session->userdata('nim')])->result_array();
		//$data['mahasiswa'] = 
		//$data["t_jadwalta"] = $this->M_JadwalUjian->getListData();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/Pengajuan_Tugas_Akhir/index',$data);
		$this->load->view('templates/footer');
	
    }
	public function store(){
		
	$data['t_tugasakhir'] = $this->db->get_where('t_tugasakhir', ['ta_nim' => $this->session->userdata('nim')])->result_array();	

/*	$data['t_tugasakhir'] = $this->db->get_where('t_tugasakhir', ['ta_nim' => $this->session->userdata('nim')])->result_array();

		$data = array(
			'ta_nama' => $this->input->post('ta_nama'),
			'ta_nim' => $this->input->post('ta_nim'),
			'email' => $this->input->post('email'),
			'ta_ps' => $this->input->post('ta_ps'),
			'ta_thajaran' => $this->input->post('ta_thajaran'),
			'kompetensi' => $this->input->post('ta_kompetensi'),
			'ta_judul' => $this->input->post('ta_judul'),
			'ta_cp1' => $this->input->post('ta_cp1'),
			'ta_cp2' => $this->input->post('ta_cp2'),
		);
		

		
		$upload = $_FILES['file']['name'];
	
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size'] 	 = '10000';
				$config['upload_path']	 = 'assets/dist/berkas/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('file'))
				{
					$new_file = $this->upload->data('file_name');
					$this->db->set('file', $new_file);
				}	
				else
				{
					echo $this->upload->display_errors();
				}
	

		$result = $this->M_PengajuanTugasAkhir->store($data);

		$data['title'] = 'Pengajuan Tugas Akhir';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/Pengajuan_Tugas_Akhir/index',$data);
		$this->load->view('templates/footer');
		//$this->load->view('mahasiswa/Pengajuan_Tugas_Akhir/index');
*/


		$data = [
				'ta_nama' => $this->input->post('ta_nama'),
				'ta_nim' => $this->input->post('ta_nim'),
				'email' => $this->input->post('email'),
				'ta_ps' => $this->input->post('ta_ps'),
				'ta_thajaran' => $this->input->post('ta_thajaran'),
				'kompetensi' => $this->input->post('ta_kompetensi'),
				'ta_judul' => $this->input->post('ta_judul'),
				'ta_cp1' => $this->input->post('ta_cp1'),
				'ta_cp2' => $this->input->post('ta_cp2'),
			];

			//$upload_file = $_FILES['file']['name'];
			//if($upload_file){
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size'] 	 = '10000';
				$config['upload_path']	 = 'assets/dist/berkas/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('file'))
				{
					$new_file = $this->upload->data('file_name');
					$this->db->set('file', $new_file);
				}	
				else
				{
					echo $this->upload->display_errors();
				}
			//}

			//$this->db->insert('berkas',$data);
			$result = $this->M_PengajuanTugasAkhir->store($data);
			
			/*$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Data Berkas Berhasil Tersimpan
				</div>');
			redirect('data_berkas');*/
	}
	  
}