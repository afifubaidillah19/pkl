<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
		is_logged_in();
		is_mahasiswa();
		$this->load->model('upload2_model');
		$this->load->helper(['url_helper', 'form']);
    	$this->load->library(['form_validation', 'session']);
	}

	/*public function index($page = 'home_view')
	{
		if(! file_exists(APPPATH.'views/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = 'Beranda';
		$data['jembut'] = 'LOL';

		$this->load->view($page, $data);
	}

	public function about($page = 'about')
	{
		if(! file_exists(APPPATH.'views/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = 'About';

		$this->load->view($page, $data);
	}*/

	public function lihatdata()
	{
		$data['berkas'] = $this->upload2_model->get_all_data();

		$data['title'] = "Data Berkas";

		// $this->load->view('templates/header', $data);
		// $this->load->view('tampildata', $data);
        // $this->load->view('templates/footer');
        
        // $data['title'] = 'Dashboard Mahasiswa';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		// $data['berkas'] = $this->db->get_where('berkas', ['email' => $this->session->userdata('email')])->result_array();
		// $data['berkas'] = $this->berkas_model->getBerkasById($id);
		// echo 'Selamat Datang Bro '.$data['user']['nama_user'];

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/data_berkas',$data);
		$this->load->view('templates/footer');

	}

	public function formtambah()
	{
		$data['title'] = "Upload Data Berkas";
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/upload_berkas',$data);
        $this->load->view('templates/footer');
        
	}

	public function tambah()
	{
		// $this->form_validation->set_message('is_unique', '{field} sudah terpakai');

		// $this->form_validation->set_rules('kdmobil', 'Kode Mobil', ['required', 'is_unique[mobil.kdmobil]']);

        // $this->validasi();

        $this->form_validation->set_rules('judul', 'Judul Proposal ', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Proposal', 'required');
		$this->form_validation->set_rules('pembimbing1', 'Pembimbing 1', 'required');
		$this->form_validation->set_rules('pembimbing2', 'Pembimbing 2', 'required');
		$this->form_validation->set_rules('kompetensi', 'Kompotensi', 'required');
		$this->form_validation->set_rules('tipe_file', 'Tipe Porposal', 'required|trim');

		if($this->form_validation->run() === FALSE)
		{
			$this->formtambah();
		}
		else
		{
            // 
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
            // 
			$this->upload2_model->tambah_();
			$this->session->set_flashdata('input_sukses','Data Berkas berhasil di input');
			redirect('/upload/lihatdata');
		}
	}

	public function hapusdata($id)
	{
		$this->upload2_model->hapus_($id);
		$this->session->set_flashdata('hapus_sukses','Data Berkas berhasil di hapus');
		redirect('/upload/lihatdata');
	}

	public function formedit($id)
	{
        $data['title'] = 'Edit Data Berkas';
        
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		$data['berkas'] = $this->upload2_model->edit_($id);

		// $this->load->view('templates/header', $data);
		// $this->load->view('formedit', $data);
        // $this->load->view('templates/footer');

        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('mahasiswa/edit_berkas',$data);
		$this->load->view('templates/footer');
	}

	public function update($id)
	{
        // $this->validasi();
        $this->form_validation->set_rules('judul','Judul','required|trim');
		$this->form_validation->set_rules('pembimbing1','Pembimbing 1','required|trim');
		$this->form_validation->set_rules('pembimbing2','Pembimbing 1','required|trim');
		$this->form_validation->set_rules('kompetensi','Kompetensi Tidak Boleh Kosong ','required|trim');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');
		$this->form_validation->set_rules('tipe_file','Tipe File ','required|trim');

		if($this->form_validation->run() === FALSE)
		{
			$this->formedit($id);
		}
		else
		{
            // 
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
            // 
			$this->upload2_model->update_();
			$this->session->set_flashdata('update_sukses', 'Data Berkas berhasil diperbaharui');
			redirect('/upload/lihatdata');
		}
    }
    
    public function download_file($id){
		$this->load->helper('download');
		$fileinfo = $this->upload2_model->download($id);
        $file = './assets/dist/berkas/'.$fileinfo['file'];
        force_download($file, NULL);
	}

	
}
?>