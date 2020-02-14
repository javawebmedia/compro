<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model');
		$this->load->model('kategori_galeri_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Halaman galeri
	public function index()	{
		$galeri = $this->galeri_model->listing();
		$data = array(	'title'			=> 'Galeri',
						'galeri'		=> $galeri,
						'isi'			=> 'admin/galeri/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_galerinya		= $inp->post('id_galeri');

   			for($i=0; $i < sizeof($id_galerinya);$i++) {
   				$galeri 	= $this->galeri_model->detail($id_galerinya[$i]);
   				if($galeri->gambar !='') {
					unlink('./assets/upload/galeri/'.$galeri->gambar);
					unlink('./assets/upload/galeri/thumbs/'.$galeri->gambar);
				}
				$data = array(	'id_galeri'	=> $id_galerinya[$i]);
   				$this->galeri_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/galeri'),'refresh');
   		// PROSES SETTING DRAFT
   		}
	}

	// Tambah galeri
	public function tambah()	{
		$kategori_galeri = $this->kategori_galeri_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_galeri','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi galeri harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Tambah Galeri',
						'kategori_galeri'	=> $kategori_galeri,
						'error'    			=> $this->upload->display_errors(),
						'isi'				=> 'admin/galeri/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 500; // Pixel
	        $config['height']       	= 500; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

	        $i 		= $this->input;

	        $data = array(	'id_kategori_galeri'=> $i->post('id_kategori_galeri'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_galeri'		=> $i->post('judul_galeri'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_galeri'		=> $i->post('jenis_galeri'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
	        				'website'			=> $i->post('website'),
	        				'status_text'		=> $i->post('status_text'),
	        				'urutan'		=> $i->post('urutan')
	        				);
	        $this->galeri_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('admin/galeri'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Tambah Galeri',
						'kategori_galeri'	=> $kategori_galeri,
						'isi'				=> 'admin/galeri/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit galeri
	public function edit($id_galeri)	{
		$kategori_galeri 	= $this->kategori_galeri_model->listing();
		$galeri 	= $this->galeri_model->detail($id_galeri); 

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_galeri','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi galeri harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Edit Galeri',
						'kategori_galeri'	=> $kategori_galeri,
						'galeri'			=> $galeri,
						'error'    			=> $this->upload->display_errors(),
						'isi'				=> 'admin/galeri/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 360; // Pixel
	        $config['height']       	= 360; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

	        // Proses hapus gambar
			if($galeri->gambar != "") {
				unlink('./assets/upload/image/'.$galeri->gambar);
				unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
			}
			// End hapus gambar

	        $i 		= $this->input;

	        $data = array(	'id_galeri'			=> $id_galeri,
	        				'id_kategori_galeri'=> $i->post('id_kategori_galeri'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_galeri'		=> $i->post('judul_galeri'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_galeri'		=> $i->post('jenis_galeri'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
	        				'website'			=> $i->post('website'),
	        				'status_text'		=> $i->post('status_text'),
	        				'urutan'		=> $i->post('urutan')
	        				);
	        $this->galeri_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/galeri'),'refresh');
		}}else{
			$i 		= $this->input;

	        $data = array(	'id_galeri'			=> $id_galeri,
	        				'id_kategori_galeri'=> $i->post('id_kategori_galeri'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_galeri'		=> $i->post('judul_galeri'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_galeri'		=> $i->post('jenis_galeri'),
	        				'website'			=> $i->post('website'),
	        				'status_text'		=> $i->post('status_text'),
	        				'urutan'		=> $i->post('urutan')
	        				);
	        $this->galeri_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/galeri'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Galeri',
						'kategori_galeri'	=> $kategori_galeri,
						'galeri'			=> $galeri,
						'isi'				=> 'admin/galeri/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}


	// Delete
	public function delete($id_galeri) {
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);

		$galeri = $this->galeri_model->detail($id_galeri);
		// Proses hapus gambar
		if($galeri->gambar=="") {
		}else{
			unlink('./assets/upload/image/'.$galeri->gambar);
			unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
		}
		// End hapus gambar
		$data = array('id_galeri'	=> $id_galeri);
		$this->galeri_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/galeri'),'refresh');
	}
}

/* End of file Galeri.php */
/* Location: ./application/controllers/admin/Galeri.php */