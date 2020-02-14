<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load user model
        $this->CI->load->model('user_model');
	}

	// Fungsi login
	public function login($username,$password)
	{
		// Check user yang login
		$user_login = $this->CI->user_model->login($username,$password);
		// Kalau ada, maka masuk ke halaman dashboard
		if($user_login) {
			$id_user 		= $user_login->id_user;
			$id_bagian 		= $user_login->id_bagian;
			$nama_bagian 	= $user_login->nama_bagian;
			$username 		= $username;
			$nama 			= $user_login->nama;
			$akses_level 	= $user_login->akses_level;
			// Create session utk login
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('id_bagian',$id_bagian);
			$this->CI->session->set_userdata('nama_bagian',$nama_bagian);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			// Lalu redirect masuk ke halaman dashboard
			$this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
			// Periksa user mengakses halaman mana sebelumnya
			if($this->CI->session->userdata('pengalihan')) {
				// Jika, ada alihkan
				$pengalihan = $this->CI->session->userdata('pengalihan');
				redirect($pengalihan,'refresh');
			}else{
				// Jika ga ada, default masuk ke halaman dasbor
				redirect(base_url('admin/dasbor'),'refresh');
			}
		}else{
			// Kalau ga ada user yg cocok, suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Username/password salah');
			redirect(base_url('login'),'refresh');
		}
	}

	// Fungsi logout
	public function logout()
	{
		// Meng-unset semua session
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('id_bagian');
		$this->CI->session->unset_userdata('nama_bagian');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('pengalihan');
		// Redirect ke halaman login
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}

	// Fungsi check login: seseorang sudah login atau belum
	public function check_login($pengalihan)
	{
		// Check status login (kita ambil status username dan akses level)
		if($this->CI->session->userdata('username') == "" && 
			$this->CI->session->userdata('akses_level') == "")
		{
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('login'),'refresh');
		}
	}

	// Fungsi check login: seseorang sudah login atau belum
	public function cek_login($pengalihan)
	{
		// Check status login (kita ambil status username dan akses level)
		if($this->CI->session->userdata('username') == "" && 
			$this->CI->session->userdata('akses_level') == "")
		{
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('login'),'refresh');
		}
	}
}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
