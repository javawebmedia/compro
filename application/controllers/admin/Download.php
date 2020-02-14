<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('download_model');
		$this->load->model('kategori_download_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Halaman download
	public function index()	{
		$download = $this->download_model->listing();
		$data = array(	'title'			=> 'Download',
						'download'		=> $download,
						'isi'			=> 'admin/download/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_downloadnya		= $inp->post('id_download');

   			for($i=0; $i < sizeof($id_downloadnya);$i++) {
   				$download 	= $this->download_model->detail($id_downloadnya[$i]);
   				if($download->gambar !='') {
					unlink('./assets/upload/file/'.$download->gambar);
				}
				$data = array(	'id_download'	=> $id_downloadnya[$i]);
   				$this->download_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/download'),'refresh');
   		// PROSES SETTING DRAFT
   		}
   	}

	// Download file
	public function unduh($id_download) {
		$download = $this->download_model->detail($id_download);
		// Contents of photo.jpg will be automatically read
		$data = './assets/upload/file/'.$download->gambar;
		force_download($data, NULL);
	}

	// Tambah download
	public function tambah()	{
		$kategori_download = $this->kategori_download_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_download','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi download harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/file/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Tambah Download',
						'kategori_download'	=> $kategori_download,
						'error'    			=> $this->upload->display_errors(),
						'isi'				=> 'admin/download/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        $i 		= $this->input;

	        $data = array(	'id_kategori_download'=> $i->post('id_kategori_download'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_download'		=> $i->post('judul_download'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_download'		=> $i->post('jenis_download'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
	        				'website'			=> $i->post('website')
	        				);
	        $this->download_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('admin/download'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Tambah Download',
						'kategori_download'	=> $kategori_download,
						'isi'				=> 'admin/download/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit download
	public function edit($id_download)	{
		$kategori_download 	= $this->kategori_download_model->listing();
		$download 	= $this->download_model->detail($id_download); 

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_download','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi download harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/file/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Edit Download',
						'kategori_download'	=> $kategori_download,
						'download'			=> $download,
						'error'    			=> $this->upload->display_errors(),
						'isi'				=> 'admin/download/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        $i 		= $this->input;

	        $data = array(	'id_download'			=> $id_download,
	        				'id_kategori_download'=> $i->post('id_kategori_download'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_download'		=> $i->post('judul_download'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_download'		=> $i->post('jenis_download'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
	        				'website'			=> $i->post('website')
	        				);
	        $this->download_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/download'),'refresh');
		}}else{

			$i 		= $this->input;

	        $data = array(	'id_download'			=> $id_download,
	        				'id_kategori_download'=> $i->post('id_kategori_download'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_download'		=> $i->post('judul_download'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_download'		=> $i->post('jenis_download'),
	        				'website'			=> $i->post('website')
	        				);
	        $this->download_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/download'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Download',
						'kategori_download'	=> $kategori_download,
						'download'			=> $download,
						'isi'				=> 'admin/download/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}


	// Delete
	public function delete($id_download) {
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);

		$download = $this->download_model->detail($id_download);
		// Proses hapus gambar
		if($download->gambar != "") {
			unlink('./assets/upload/file/'.$download->gambar);
		}
		// End hapus gambar
		$data = array('id_download'	=> $id_download);
		$this->download_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/download'),'refresh');
	}
}

/* End of file Download.php */
/* Location: ./application/controllers/admin/Download.php */