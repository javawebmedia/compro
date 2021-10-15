<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	// Database
	public function __construct()
	{
		parent::__construct();
	}

	// Main page kontak
	public function index()	{
		$site 			= $this->konfigurasi_model->listing();

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama','required',
			array(	'required'		=> 'Nama harus diisi'));

		$valid->set_rules('subject','subject','required',
			array(	'required'		=> 'Subject harus diisi'));
		
		$valid->set_rules('email','Email','required',
			array(	'required'		=> 'Email harus diisi'));
		
		$valid->set_rules('pesan','Pesan','required',
			array(	'required'		=> 'Pesan harus diisi'));
		
		if($valid->run() === FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Kontak '.$site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'isi'		=> 'kontak/list');
		$this->load->view('layout/wrapper', $data, FALSE);
		//Kirim ke pemilik website
		}else{
			$i 			= $this->input;
			$email		= $i->post('email');
			$subject	= $i->post('subject').' - '.$site->namaweb;
			$message	= 'Nama pengirim: '.$i->post('nama').'<br>'.
						  'Nomor telepon: '.$i->post('telepon').'<br>
						  Email: '.$i->post('email').'<br>
						  Berikut isi pesan:<hr>'.
						  $i->post('pesan');
			$nama		= $i->post('nama');
			
			$this->load->library('email');

			$this->email->from($email, $nama);
			$this->email->to($site->email);
			$this->email->cc($email);
			$this->email->bcc($site->email);
			
			$this->email->subject($subject);
			$this->email->message($message);
			
			$this->email->send();
			
			// Redirect page
			$this->session->set_flashdata('sukses','Terimakasih, pesan Anda sudah terkirim');
			redirect(base_url('kontak'));
		}
		// End kirim
	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/Kontak.php */
