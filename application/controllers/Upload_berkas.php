<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_berkas extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_mahasiswa();
		$this->load->library('form_validation');
		$this->load->model('berkas_model');
		$this->load->library('session');
	}

    public function index()
	{
	    $data['title'] = 'Upload Berkas';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);

		// $this->load->view('mahasiswa/index',$data);
		$this->load->view('mahasiswa/upload_berkas');

		$this->load->view('templates/footer');
	}

	public function upload_file()
	{
		// if($this->session->userdata('email')){
		// 	redirect('upload_berkas');
		// }

		$data['title'] = 'Upload Berkas';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('judul', 'Judul Proposal ', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Proposal', 'required');
		$this->form_validation->set_rules('pembimbing1', 'Pembimbing 1', 'required');
		$this->form_validation->set_rules('pembimbing2', 'Pembimbing 2', 'required');
		$this->form_validation->set_rules('kompetensi', 'Kompotensi', 'required');
		$this->form_validation->set_rules('tipe_file', 'Tipe Porposal', 'required|trim');
		


		if($this->form_validation->run() == false){

			$data['title'] = 'Upload Berkas';
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('mahasiswa/upload_berkas');
			$this->load->view('templates/footer');

		}
		else{

			$data = [
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
				'pembimbing1' => $this->input->post('pembimbing1'),
				'pembimbing2' => $this->input->post('pembimbing2'),
				'kompetensi' => $this->input->post('kompetensi'),
				'tipe_file' => $this->input->post('tipe_file'),
				'email' => $this->input->post('email')
			];

			$upload_file = $_FILES['file']['name'];
			if($upload_file){
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
			}

			$this->db->insert('berkas',$data);
			
			$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Data Berkas Berhasil Tersimpan
				</div>');
			redirect('data_berkas');
		}
	}

	public function hapus($id)
	{

			// $where  = array('id' => $id);
			$this->db->delete('berkas', array('id' => $id)); 
			// $this->berkas_model->hapus_data($where,'berkas');
			redirect('data_berkas');
	
	}

	public function download_file($id){
		$this->load->helper('download');
		$fileinfo = $this->berkas_model->download($id);
        $file = './assets/dist/berkas/'.$fileinfo['file'];
        force_download($file, NULL);
	}

}