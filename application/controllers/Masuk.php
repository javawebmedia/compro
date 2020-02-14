<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('peneliti_model');
	}
	
	// Index
	public function index() {
		$site		= $this->konfigurasi_model->listing();
		
		// Validasi
		$valid 		= $this->form_validation;
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');		
		if($valid->run()) {
			$this->simple_peneliti->login($username,$password);
		}
		// End validasi
		
		$data = array(	'title'		=> 'Login Peneliti',
						'deskripsi'	=> 'Login Peneliti',
						'keywords'	=> 'Login Peneliti',
						'site'		=> $site,
						'isi'		=> 'masuk/list');
		$this->load->view('layout/wrapper',$data);
	}
	
	// Lupa
	public function lupa() {
		$site		= $this->konfigurasi_model->listing();
		
		// Validasi
		$valid 		= $this->form_validation;
		$email		= $this->input->post('email');
		$password	= $this->input->post('password');
		$valid->set_rules('email','Username','required|valid_email',
			array(	'required'		=> 'Masukkan email Anda',
					'valid_email'	=> 'Email tidak valid'
					));
	
		if($valid->run()== FALSE) {
		
		$data = array(	'title'		=> 'Lupa Password',
						'deskripsi'	=> 'Lupa Password',
						'keywords'	=> 'Lupa Password',
						'site'		=> $site,
						'isi'		=> 'pendaftaran/lupa');
		$this->load->view('layout/wrapper',$data);
		// Proses
		}else{
			$email	= $this->input->post('email');
			$siswa	= $this->siswa_model->email($email);
			// Kalo ada
			if(count($siswa) > 0) {
				/* Kirim Email ke Pelanggan */
				$nama 		= $siswa->nama;
				$email 		= $siswa->email;
				$subject 	= 	"Reset Password - ".$site->namaweb;
				$pesan 		= 	'<p>Hai <strong>'.$siswa->nama.'</strong>. Terimakasih telah
								menjadi bagian dari '.$site->namaweb.'. 
								Bersama email ini kami kirimkan 
								link reset password Anda. Klik link di bawah ini.<hr>'.

								'Link reset: <a href="'.base_url('masuk/change/'.$siswa->password.'/'.$siswa->id_siswa).'">'.base_url('masuk/change/'.$siswa->password.'/'.$siswa->id_siswa).'</a>'.
								'<br>Terimakasih atas perhatian yang diberikan<hr>'.
								$site->namaweb.'<br>'.
								nl2br($site->alamat).
								'Phone: '.$site->telepon.'<br>'.
								'Email: '.$site->email.'<br>'.
								'Website: '.$site->website;
				
				$config['protocol'] 	= 'sendmail';
				$config['charset'] 		= 'utf-8';
				$config['mailpath'] 	= '/usr/sbin/sendmail';
				$config['smtp_port'] 	= 25;
				$config['priority'] 	= 1;
				$config['wordwrap'] 	= TRUE;
				$config['newline'] 		= "\r\n";
				
				
				$this->load->library('email', $config);
				$this->email->from($site->email, $site->namaweb);
				$this->email->to($email);
				$this->email->cc($site->email);
				$this->email->subject($subject);
				$this->email->message($pesan);
				$this->email->send();
				/* End kirim email */
				$this->session->set_flashdata('sukses',
					'Terimakasih, kami telah mengirimkan link reset password Anda. 
					Mohon cek di SPAM folder.');
				redirect(base_url('masuk/lupa'));
			}else{
				$this->session->set_flashdata('sukses','Email Anda tidak terdaftar');
				redirect(base_url('masuk/lupa'));
			}
		}
		// End proses
	}
	
	// Reset
	public function change($password,$id_siswa) {
		$password	= $this->uri->segment(3);
		$id_siswa	= $this->uri->segment(4);
		
		$site		= $this->konfigurasi_model->listing();
		$siswa		= $this->siswa_model->change($password,$id_siswa);
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('password','Password','required|min_length[6]|max_length[32]',
			array(	'required'		=> 'Password harus diisi',
					'min_length'	=> 'Password minimal 6 karakter',
					'max_length'	=> 'Password maksimal 32 karakter'));
		$v->set_rules('password2','Konfirmasi password','matches[password]',
			array(	'matches'		=> 'Password tidak sama'));
		
		if($v->run() == FALSE) {
				
		$data = array(	'title'		=> 'Ganti password',
						'deskripsi'	=> 'Ganti password '.$site->namaweb,
						'keywords'	=> $site['keywords'],
						'site'		=> $site,
						'siswa'		=> $siswa,
						'isi'		=> 'pendaftaran/reset');
		$this->load->view('layout/wrapper',$data);
		// Masuk database
		}else{				
			$i = $this->input;
			$data = array(	'id_siswa'		=> $id_siswa,
							'password'		=> sha1($i->post('password')),
							'password_hint'	=> $i->post('password'));
			$this->siswa_model->edit($data);
			$this->session->set_flashdata('sukses','Password telah diupdate. Silakan login dengan username/email dan password baru Anda');
			redirect(base_url('masuk'));
		}
	}
	
	// Logout
	public function logout() {
		$this->simple_peneliti->logout();
	}
	
}