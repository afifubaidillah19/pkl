<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TugasAkhir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_TugasAkhir');
    }

    public function index()
    {
        //$data["t_tugasakhir"] = $this->M_TugasAkhir->getAll();
        $data["t_tugasakhir"] = $this->db->get_where('t_tugasakhir', ['ta_nim' => $this->session->userdata('nim')])->result_array();
        //$this->load->view("mahasiswa/Data_Tugas_Akhir/index", $data);*/
        $data['title'] = 'Pengajuan Tugas Akhir';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
        //$data['t_tugasakhir'] = $this->db->get_where('t_tugasakhir', ['ta_nim' => $this->session->userdata('ta_nim')])->result_array();
        // echo 'Selamat Datang Bro '.$data['user']['nama_user'];

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('mahasiswa/Data_Tugas_Akhir/index',$data);
        $this->load->view('templates/footer');
    }
    
   public function edit($ta_nim = null)
    {

        if (!isset($ta_nim)) redirect('mahasiswa/Data_Tugas_Akhir/index');
       
        $t_tugasakhir = $this->M_TugasAkhir;
        $t_tugasakhir->update($ta_nim);
  
        $data["t_tugasakhir"] = $t_tugasakhir->getById($ta_nim);
        $data["t_tugasakhir"] = $this->M_TugasAkhir->getAll();
        //$this->load->view("mahasiswa/Data_Tugas_Akhir/index", $data);*/
        $data['title'] = 'Pengajuan Tugas Akhir';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang Bro '.$data['user']['nama_user'];

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('mahasiswa/Data_Tugas_Akhir/index',$data);
        $this->load->view('templates/footer');
        //$this->session->set_flashdata('message', 'Data berhasil diubah');    
        //$this->load->view("mahasiswa/Data_Tugas_Akhir/edit", $data);
        
    }

    public function delete($ta_nim){
        $this->M_TugasAkhir->delete($ta_nim);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');    
        //index();
        //$this->load->controllers('TugasAkhir/index');
        $data['title'] = 'Pengajuan Tugas Akhir';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('mahasiswa/index',$data);
        $this->load->view('templates/footer');
    }
}