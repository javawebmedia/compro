<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('video_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Index
	public function index() {
		$video	= $this->video_model->listing();
		
		$data = array(	'title'	=> 'Video',
						'video'	=> $video,
						'isi'	=> 'admin/video/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_videonya		= $inp->post('id_video');

   			for($i=0; $i < sizeof($id_videonya);$i++) {
   				$video 	= $this->video_model->detail($id_videonya[$i]);
   				if($video->gambar !='') {
					unlink('./assets/upload/file/'.$video->gambar);
				}
				$data = array(	'id_video'	=> $id_videonya[$i]);
   				$this->video_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/video'),'refresh');
   		// PROSES SETTING DRAFT
   		}
   	}
		
	// Tambah
	public function tambah() {
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('judul','Video title','required');
		
		if($v->run()=== FALSE) {
		$data = array(	'title'		=> 'Add Video',
						'isi'		=> 'admin/video/tambah');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				
			$i = $this->input;
			$data = array(	'judul'			=> $i->post('judul'),
							'posisi'		=> $i->post('posisi'),
							'keterangan'	=> $i->post('keterangan'),
							'video'			=> $i->post('video'),
							'urutan'		=> $i->post('urutan'),
							'id_user'		=> $this->session->userdata('id_user'),
							'bahasa'		=> $i->post('bahasa')
							);
			$this->video_model->tambah($data);
			$this->session->set_flashdata('sukses','Data added successfully');
			redirect(base_url('admin/video'));
		}
	}
	
	// Edit
	public function edit($id_video) {
		// Dari database
		$video		= $this->video_model->detail($id_video);
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('judul','Video title','required');
		
		if($v->run()=== FALSE) {
		$data = array(	'title'		=> 'Edit Video',
						'video'		=> $video,
						'isi'		=> 'admin/video/edit');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_video'		=> $video->id_video,
							'judul'			=> $i->post('judul'),
							'posisi'		=> $i->post('posisi'),
							'keterangan'	=> $i->post('keterangan'),
							'video'			=> $i->post('video'),
							'urutan'		=> $i->post('urutan'),
							'id_user'		=> $this->session->userdata('id_user'),
							'bahasa'		=> $i->post('bahasa')
							);
			$this->video_model->edit($data);
			$this->session->set_flashdata('sukses','Data updated successfully');
			redirect(base_url('admin/video'));
		}
	}
	
	// Delete
	public function delete($id_video) {
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);

		$video	= $this->video_model->detail($id_video);
		$data = array('id_video'	=> $id_video);
		$this->video_model->delete($data);		
		$this->session->set_flashdata('sukses','Data deleted successfully');
		redirect(base_url('admin/video'));

	}
}