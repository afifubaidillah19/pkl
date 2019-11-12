<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('email')){
			redirect('mahasiswa');
		}

		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Login Mahasiswa Tugas Akhir';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login-mahasiswa');
			$this->load->view('templates/auth_footer');
		}
		else
		{
			$this->_loginMahasiswa();
		}
	}

	public function registrasiMahasiswa()
	{
		if($this->session->userdata('email')){
			redirect('mahasiswa');
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|min_length[10]|is_unique[mahasiswa.nim]',[
			'is_unique' => 'NIM sudah terdaftar',
			'min_length' => 'NIM minimal 10 digit!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[mahasiswa.email]',[
			'is_unique' => 'Email sudah terdaftar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

		if($this->form_validation->run() == false){
			$data['title'] = 'Registrasi Mahasiswa';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/regis-mahasiswa');
			$this->load->view('templates/auth_footer');
		}
		else{
			$email = $this->input->post('email',true);
			$data = [
				'nama_mahasiswa' => htmlspecialchars($this->input->post('nama', true)),
				'nim' => $this->input->post('nim'),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'is_active' => 0,
				'date_created' => time()
			];

			// siapkan token bilangan random
			$token = base64_encode(random_bytes(32)); //base64 untuk terjemahan
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('mahasiswa',$data);
			$this->db->insert('user_token',$user_token);

			$this->_sendEmail($token, 'verify');
			
			$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Selamat, Anda Berhasil Membuat Akun! Silahkan Aktivasi Akun Anda!
				</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'af.ubaidillah1@gmail.com',
			'smtp_pass' => '#katasandi19',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);  

		$this->email->from('af.ubaidillah1@gmail.com','Afif Programming');
		$this->email->to($this->input->post('email'));

		if($type == 'verify')
		{
			$this->email->subject('Account Verification Mahasiswa');
			$this->email->message('Click this link to verify your account : <a href="'.base_url().'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) .'">Acitvated</a>');
		}
		
		elseif($type == 'forgot')
		{
			$this->email->subject('Reset Password Mahasiswa');
			$this->email->message('Click this link to reset your password : <a href="'.base_url().'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) .'">Reset Password</a>');
		}

		if($this->email->send())
		{
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
			die;
		}
	}

//Verify Mahasiswa 
	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$mahasiswa = $this->db->get_where('mahasiswa', ['email' => $email])->row_array();

		if($mahasiswa){
			$user_token = $this->db->get_where('user_token',['token' => $token])->row_array();

			if($user_token)
			{
				if(time() - $user_token['date_created'] < (60*60*24))
				{
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('mahasiswa');

					$this->db->delete('user_token',['email' => $email]);

					$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert">'. $email .' Berhasil Diaktivasi! Silahkan Login!
						</div>');
					redirect('auth');
				}
				else{
					$this->db->delete('mahasiswa', ['email'=>$email]);
					$this->db->delete('user_token', ['email'=>$email]);
					$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert">Token Expired
						</div>');
					redirect('auth');
				}
			}
			else
			{
				$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert">Token Invalid!
				</div>');
				redirect('auth');	
			}
		}
		else{
			$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert"> Aktivasi Email Gagal! Email Salah!
				</div>');
			redirect('auth');
		}
	}

	private function _loginMahasiswa()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$mahasiswa = $this->db->get_where('mahasiswa', ['email' => $email])->row_array();

		if($mahasiswa != null)
		{
			if($mahasiswa['is_active'] == 1)
			{
				if(password_verify($password, $mahasiswa['password']))
				{
					$data = [
						'email' => $mahasiswa['email'],
						'nim' => $mahasiswa['nim'],
						'user' => 'mahasiswa'
					];
					$this->session->set_userdata($data);
					redirect('mahasiswa'); //index
				}
				else
				{
					$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert"> Passwod Salah!
					</div>');
					redirect('auth');
				}
			}
			else
			{
				$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert"> Email Belum Teraktivasi!
				</div>');
				redirect('auth');
			}
		}
		else{
			$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert"> Email Belum Teregistrasi!
				</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nim');
		$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert"> Anda Berhasil Logout!
				</div>');
		redirect('auth');
	}

	public function blocked()
	{ 
		$this->load->view('auth/blocked');
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if($this->form_validation->run() == false){
			$data['title'] = 'Lupa Password Mahasiswa';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot-password');
			$this->load->view('templates/auth_footer');			
		}
		else{
			$email = $this->input->post('email');
			$mahasiswa = $this->db->get_where('mahasiswa', ['email' => $email, 'is_active' => 1])->row_array();

			if($mahasiswa){
				$token = base64_encode(random_bytes(32));
				//siapkan data
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert">Cek Email anda untuk reset password! 
				</div>');
				redirect('auth/forgotpassword');
			}
			else{
				$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert">Email Belum Terdaftar atau Email Belum Teraktivasi!
				</div>');
				redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$mahasiswa = $this->db->get_where('mahasiswa',['email' => $email])->row_array();

		if($mahasiswa){
			$user_token = $this->db->get_where('user_token', ['token'=> $token])->row_array();
			
			if($user_token){
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			}
			else{
				$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert">Reset Password Gagal! Token Salah!
				</div>');
				redirect('auth');
			}
		}
		else{
			$this->session->set_flashdata('message',' <div class="alert alert-danger" role="alert">Reset Password Gagal! Email Salah!
				</div>');
			redirect('auth');
		}
	}

	public function changePassword()
	{
		if(!$this->session->userdata('reset_email')){
			redirect('auth');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

		if($this->form_validation->run() == false){
			$data['title'] = 'Change Password Mahasiswa';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		}
		else{
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('mahasiswa');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message',' <div class="alert alert-success" role="alert">Password Berhasil Diganti! Silahkan Login!
				</div>');
			redirect('auth');

		}
	}

}