<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class JadwalUjian extends CI_Controller { 
	function __construct(){
		parent::__construct();
		$this->load->model('M_JadwalUjian');
	}

	public function index()
    {
        $data["t_jadwalta"] = $this->M_JadwalUjian->getListData();

        //$this->load->view("mahasiswa/Data_Jadwal_Ujian/index", $data);
        //$data["t_tugasakhir"] = $this->M_TugasAkhir->getAll();
        //$this->load->view("mahasiswa/Data_Tugas_Akhir/index", $data);*/
        $data['title'] = 'Jadwal Ujian';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang Bro '.$data['user']['nama_user'];

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('mahasiswa/Data_Jadwal_Ujian/index',$data);
        $this->load->view('templates/footer');
    }

	/*public function getData(){
		$data = $this->M_JadwalUjian->getListData();
		echo json_encode($data);
		//redirect ('mahasiswa/Data_Jadwal_Ujian/index');
	}
	public function index() { 
		$this->template->load('template','mahasiswa/Data_Jadwal_Ujian/index');
	}
	  */
}