<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gelombang extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gelombang_model');
	}
	
	// Main page
	public function index()	{
		$site 	= $this->konfigurasi_model->listing();
		
		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'gelombang/index/';
		$config['total_rows'] 		= count($this->gelombang_model->total());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 12;
		$config['first_url'] 		= base_url().'gelombang/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$gelombang 	= $this->gelombang_model->gelombang($config['per_page'], $page);
		// End paginasi

		$data = array(	'title'		=> 'Periode Pendaftaran Online',
						'deskripsi'	=> 'Periode Pendaftaran Online - '.$site->namaweb,
						'keywords'	=> 'Periode Pendaftaran Online - '.$site->namaweb,
						'pagin' 	=> $this->pagination->create_links(),
						'gelombang'	=> $gelombang,
						'site'		=> $site,
						'isi'		=> 'gelombang/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Read gelombang detail
	public function read($slug)	{
		$site 		= $this->konfigurasi_model->listing();
		$gelombang 	= $this->gelombang_model->read($slug);

		$data = array(	'title'		=> $gelombang->judul,
						'deskripsi'	=> $gelombang->judul,
						'keywords'	=> $gelombang->judul,
						'gelombang'	=> $gelombang,
						'site'		=> $site,
						'isi'		=> 'gelombang/read');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}