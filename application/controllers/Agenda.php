<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	// Load database
	public function __construct() 	{
		parent::__construct();
		$this->load->model('agenda_model');
	}
	
	// Front End
	public function index(){
		$title	= $this->konfigurasi_model->listing();
		$judul	= $title->namaweb;
		
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'agenda/index/';
		$config['total_rows'] 		= $this->agenda_model->total_agenda();
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; Awal';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Akhir &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Sebelumnya';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 12;
		$config['first_url'] 		= base_url().'agenda/';
		
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$agenda = $this->agenda_model->get_agenda($config['per_page'], $page);
		
		$data = array(
					'title' 	=> 'Agenda '.$judul,
					'agenda'	=> $agenda,
					'deskripsi'	=> $judul,
					'keywords'	=> $judul,
					'pagin' 	=> $this->pagination->create_links(),
					'isi'		=> 'agenda/view_agenda'
					);
		$this->load->view('layout/wrapper',$data);
	}
	
	// Detail agenda
	public function detail($id_agenda) {
		$agd		= $this->agenda_model->agenda_internal($id_agenda);

		if(count($agd) < 1) {
			redirect(base_url('oops'),'refresh');
		}
		
		$judul		= $agd['nama'];
		$id_agenda	= $agd['id_agenda'];
		
		$jenis = $agd['jenis_agenda'];
		$agenda = $this->agenda_model->data_agenda($jenis);
		
		$data = array(
					'title' 	=> $judul,
					'deskripsi'	=> $judul,
					'keywords'	=> $judul,
					'detail'	=> $agd,
					'agenda'	=> $agenda,
					'isi'		=> 'agenda/read_agenda'
					);
		$this->load->view('layout/wrapper',$data);
	}
	
	// View agenda
	public function view($id_agenda) {
		$agd		= $this->agenda_model->agenda_internal($id_agenda);
		$judul		= $agd['nama'];
		$id_agenda	= $agd['id_agenda'];
		
		$jenis = $agd['jenis_agenda'];
		$agenda = $this->agenda_model->data_agenda($jenis);
		
		$data = array(
					'title' 	=> $judul,
					'detail'	=> $agd,
					'agenda'	=> $agenda,
					'isi'		=> 'agenda/view'
					);
		$this->load->view('layout/wrapper-detail',$data);
		
	}

	
}