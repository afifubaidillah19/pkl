<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_berkas extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_mahasiswa();
		$this->load->model('berkas_model');
	}

    public function index()
	{
	    $data['title'] = 'Dashboard Mahasiswa';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		$data['berkas'] = $this->db->get_where('berkas', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		// $this->load->view('mahasiswa/index',$data);
		$this->load->view('mahasiswa/edit_berkas',$data);
		$this->load->view('templates/footer');
	}

	// public function edit_berkas()
	// {
	// 	$data['title'] = 'Edit Data Dokumen';
	// 	$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
	// 	$data['berkas'] = $this->db->get_where('berkas', ['email' => $this->session->userdata('email')])->row_array();
	// 	// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

	// 	$this->form_validation->set_rules('judul','Judul','required|trim');
	// 	$this->form_validation->set_rules('pembimbing1','Pembimbing 1','required|trim');
	// 	$this->form_validation->set_rules('pembimbing2','Pembimbing 1','required|trim');
	// 	$this->form_validation->set_rules('kompetensi','Kompetensi Tidak Boleh Kosong ','required|trim');
	// 	$this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');
	// 	$this->form_validation->set_rules('tipe_file','Tipe File ','required|trim');

	// 	if($this->form_validation->run() == false){
	// 		$this->load->view('templates/header',$data);
	// 		$this->load->view('templates/sidebar',$data);
	// 		$this->load->view('templates/topbar',$data);
	// 		$this->load->view('mahasiswa/edit_berkas',$data);
	// 		$this->load->view('templates/footer');
	// 	}
	// 	else{
	// 		$email = $this->session->userdata('email');
			
	// 		$judul = $this->input->post('judul');
	// 		$pembimbing1 = $this->input->post('pembimbing1');
	// 		$pembimbing2 = $this->input->post('pembimbing2');
	// 		$kompetensi = $this->input->post('kompetensi');
	// 		$deskripsi = $this->input->post('deskripsi');
	// 		$file_tipe = $this->input->post('tipe_file');

	// 		$upload_berkas = $_FILES['file']['name'];
	// 		if($upload_berkas){
	// 			$config['allowed_types'] = 'pdf|doc|dox';
	// 			$config['max_size'] 	 = '100000';
	// 			$config['upload_path']	 = './assets/dist/berkas/';

	// 			$this->load->library('upload',$config);

	// 			if($this->upload->do_upload('file'))
	// 			{
	// 				// gambar lama
	// 				$old_file = $data['berkas']['file'];
	// 				if($old_file != ''){
	// 					unlink(FCPATH . 'assets/dist/berkas/' . $old_file);
	// 				}
	// 				//

	// 				$new_file = $this->upload->data('file_name');
	// 				$this->db->set('file', $new_file);
	// 			}	
	// 			else
	// 			{
	// 				echo $this->upload->display_errors();
	// 			}
	// 		}
			

	// 		$this->db->set('judul', $judul);
	// 		$this->db->set('pembimbing1',$pembimbing1);
	// 		$this->db->set('pembimbing2',$pembimbing2);
	// 		$this->db->set('kompetensi',$kompetensi);
	// 		$this->db->set('tipe_file',$file_tipe);
	// 		$this->db->set('deskripsi',$deskripsi);
	// 		$this->db->where('id',$id);
	
	// 		$this->db->update('berkas');

	// 		$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Berhasil Update Data Berkas!
	// 			</div>');
	// 		redirect('mahasiswa/index');
	// 	}
	// }

	public function edit_file(){

		

		$data['title'] = 'Edit Data Dokumen';
		// $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		$data['berkas'] = $this->db->get_where('berkas', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->form_validation->set_rules('judul','Judul','required|trim');
		$this->form_validation->set_rules('pembimbing1','Pembimbing 1','required|trim');
		$this->form_validation->set_rules('pembimbing2','Pembimbing 1','required|trim');
		$this->form_validation->set_rules('kompetensi','Kompetensi Tidak Boleh Kosong ','required|trim');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');
		$this->form_validation->set_rules('tipe_file','Tipe File ','required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('mahasiswa/edit_berkas',$data);
			$this->load->view('templates/footer');

		}else{
			$id = $this->input->post('id');
			$judul = $this->input->post('judul');
			$deskripsi = $this->input->post('deskripsi');
			$pembimbing1 = $this->input->post('pembimbing1');
			$pembimbing2 = $this->input->post('pembimbing2');
			$kompetensi = $this->input->post('kompetensi');
			$tipe_file = $this->input->post('tipe_file');

			$data = array(
				'judul' => $judul,
				'deskripsi' => $deskripsi,
				'pembimbing1' => $pembimbing1,
				'pembimbing2' => $pembimbing2,
				'kompetensi' => $kompetensi,
				'tipe_file' => $tipe_file
			);

			$where = array(
				'id' => $id
			);

			$upload_berkas = $_FILES['file']['name'];
			
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size'] 	 = '100000';
				$config['upload_path']	 = './assets/dist/berkas/';

				$this->load->library('upload',$config);

				$old_file = $data['berkas']['file'];
				unlink(FCPATH . 'assets/dist/berkas/'.$old_file);

				if($this->upload->do_upload('file'))
				{
					

						$new_file = $this->upload->data('file_name');
						$this->db->set('file', $new_file);
				}	
				else
				{
					$error = array ('error'=> $this->upload->display_errors());
					$this->load->view('mahasiswa/edit_berkas',$data,$erorr);
				}
			

			$this->berkas_model->update_data($where,$data,'berkas');
			redirect('data_berkas');
		}
	}
}