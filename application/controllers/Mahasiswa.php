<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_mahasiswa();
		$this->load->model('berkas_model');
		$this->load->library('session');
	}

    public function index()
	{
	    $data['title'] = 'Dashboard Mahasiswa';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/index',$data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['title'] = 'Profil Mahasiswa';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/profile',$data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profil Mahasiswa';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->form_validation->set_rules('nama','Fullname','required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('mahasiswa/edit',$data);
			$this->load->view('templates/footer');
		}
		else{
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');

			// cek jika ada gambara yang akan diupload
			$upload_image = $_FILES['image']['name'];
			// var_dump($upload_image);
			// die;

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] 	 = '2048';
				$config['upload_path']	 = './assets/dist/img/profile/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image'))
				{
					// gambar lama
					$old_image = $data['mahasiswa']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
					}
					//

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}	
				else
				{
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_mahasiswa', $nama);
			$this->db->where('email', $email);
			$this->db->update('mahasiswa');

			$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Berhasil Update Akun!
				</div>');
			redirect('mahasiswa/profile');
		}
	}

	public function changePassword()
	{
	    $data['title'] = 'Ganti Password Mahasiswa';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->form_validation->set_rules('current_password', 'Current Password','required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password','required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password','required|trim|min_length[3]|matches[new_password1]');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('mahasiswa/changepassword',$data);
			$this->load->view('templates/footer');
		}
		else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['mahasiswa']['password'])){
				$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert"> Password Lama Salah!
				</div>');
				redirect('mahasiswa/changepassword');
			}
			else{
				if($current_password == $new_password){
					$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert"> Password Baru Tidak Boleh Sama Dengan Password Lama!
					</div>');
					redirect('mahasiswa/changepassword');
				}
				else{
					// password ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('mahasiswa');

					$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Password Berhasil Diganti!
					</div>');
					redirect('mahasiswa/changepassword');
				}
			}
		}
	}

	public function edit_file(){

		
		$data['title'] = 'Edit Data Dokumen';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		// $data['berkas'] = $this->berkas_model->getBerkasById($id);
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

				// $old_file = $data['berkas']['file'];
				// unlink(FCPATH . 'assets/dist/berkas/'.$old_file);

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