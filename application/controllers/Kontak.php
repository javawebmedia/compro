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

		$data = array(	'title'		=> 'Kontak '.$site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'isi'		=> 'kontak/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/Kontak.php */