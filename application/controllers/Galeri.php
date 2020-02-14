<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model');
		$this->load->model('kategori_galeri_model');
	}

	// Main page galeri
	public function index()	{
		$site 		= $this->konfigurasi_model->listing();
		$kategori 	= $this->galeri_model->kategori();

		// Galeri dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'galeri/index/';
		$config['total_rows'] 		= count($this->galeri_model->total_galeri());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 12;
		$config['first_url'] 		= base_url().'galeri/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$galeri 	= $this->galeri_model->galeri($config['per_page'], $page);
		// End paginasi

		$data = array(	'title'		=> 'Galeri - '.$site->namaweb,
						'deskripsi'	=> 'Galeri - '.$site->namaweb,
						'keywords'	=> 'Galeri - '.$site->namaweb,
						'pagin' 	=> $this->pagination->create_links(),
						'galeri'	=> $galeri,
						'kategori'	=> $kategori,
						'isi'		=> 'galeri/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Category
	public function kategori($slug_kategori_galeri)	{
		$site 					= $this->konfigurasi_model->listing();
		$kategori_galeri 		= $this->kategori_galeri_model->read($slug_kategori_galeri);
		
		if(count($kategori_galeri) < 1) {
			redirect(base_url('oops'),'refresh');
		}

		$id_kategori_galeri		= $kategori_galeri->id_kategori_galeri;

		
		
		
		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'galeri/kategori/'.$slug_kategori_galeri.'/index/';
		$config['total_rows'] 		= count($this->galeri_model->all_kategori($id_kategori_galeri));
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; First';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Last &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Next &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Prev';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 12;
		$config['first_url'] 		= base_url().'galeri/kategori/'.$slug_kategori_galeri.'/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
		$galeri 	= $this->galeri_model->kategori_galeri($id_kategori_galeri,$config['per_page'], $page);

		$data = array(	'title'				=> 'Kategori galeri: '.$kategori_galeri->nama_kategori_galeri,
						'deskripsi'			=> 'Kategori galeri: '.$kategori_galeri->nama_kategori_galeri,
						'keywords'			=> 'Kategori galeri: '.$kategori_galeri->nama_kategori_galeri,
						'galeri'			=> $galeri,
						'kategori'			=> $kategori_galeri,
						'pagin' 			=> $this->pagination->create_links(),
						'site'				=> $site,
						'isi'				=> 'galeri/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Read galeri
	public function read($id_galeri) {
		$site 		= $this->konfigurasi_model->listing();
		$galeri 	= $this->galeri_model->detail($id_galeri);
		$listing 	= $this->galeri_model->galeri_home();

		if(count($galeri) < 1) {
			redirect(base_url('oops'),'refresh');
		}
		
		// Update hit
		if($galeri) {
			$newhits = $galeri->hits + 1;
			$hit = array(	'id_galeri'	=> $galeri->id_galeri,
							'hits'		=> $newhits);
			$this->galeri_model->update_hit($hit);
		}
		//  End update hit

		$data = array(	'title'		=> $galeri->judul_galeri,
						'deskripsi'	=> $galeri->judul_galeri,
						'keywords'	=> $galeri->judul_galeri,
						'galeri'	=> $galeri,
						'listing'	=> $listing,
						'site'		=> $site,
						'isi'		=> 'galeri/read');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */