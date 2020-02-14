<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$site 		= $this->konfigurasi_model->listing();
		$this->load->library('email');
		
		$config['protocol']     = $site->protocol;
		$config['smtp_host']    = $site->smtp_host;
		$config['smtp_port']    = $site->smtp_port;
		$config['smtp_timeout'] = $site->smtp_timeout;
		$config['smtp_user']    = $site->smtp_user;
		$config['smtp_pass']    = $site->smtp_pass;
		$config['charset']      = 'utf-8';
		$config['newline']      = "\r\n";
		$config['mailtype']     = 'html'; // or html
		$config['validation']   = FALSE;
		$this->email->initialize($config);
		$this->email->from($site->email,$site->namaweb);
		$this->email->to('javawebmedia@gmail.com'); 
		$this->email->subject('Contoh Pesan');
		$this->email->message('Contoh Pesan');  
		$this->email->send();
		
		echo $this->email->print_debugger();
	}

	// Coba
	public function coba()
	{
		$this->load->library('email');
		
		$this->email->from('contact@nuansaabadi.co.id', 'Name');
		$this->email->to('javawebmedia@email.com');
		
		$this->email->subject('subject');
		$this->email->message('message');
		
		$coba = $this->email->send();
		if(!$coba) {
			echo 'Error';
		}else{
			echo 'OK';
		}
		
		echo $this->email->print_debugger();
	}
}

/* End of file Kirim.php */
/* Location: ./application/controllers/Kirim.php */