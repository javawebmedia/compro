<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_download extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_download_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_download','Nama kategori_download','required|is_unique[kategori_download.nama_kategori_download]',
			array(	'required'		=> 'Nama kategori_download harus diisi',
					'is_unique'		=> 'Nama kategori_download sudah ada. Buat Nama kategori_download baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Kategori download',
						'kategori_download'	=> $this->kategori_download_model->listing(),
						'isi'		=> 'admin/kategori_download/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_download'),'dash',TRUE);

			$data = array(	'nama_kategori_download'	=> $i->post('nama_kategori_download'),
							'slug_kategori_download'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_download_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kategori_download'),'refresh');
		}
		// End proses masuk database
	}

	// Edit kategori_download
	public function edit($id_kategori_download)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_download','Nama kategori_download','required',
			array(	'required'		=> 'Nama kategori_download harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Kategori download',
						'kategori_download'	=> $this->kategori_download_model->detail($id_kategori_download),
						'isi'		=> 'admin/kategori_download/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_download'),'dash',TRUE);

			$data = array(	'id_kategori_download'	=> $id_kategori_download,
							'nama_kategori_download'	=> $i->post('nama_kategori_download'),
							'slug_kategori_download'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_download_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kategori_download'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_kategori_download) {
		// Proteksi proses delete harus login
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);


		$data = array('id_kategori_download'	=> $id_kategori_download);
		$this->kategori_download_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori_download'),'refresh');
	}
}

/* End of file Kategori_download.php */
/* Location: ./application/controllers/admin/Kategori_download.php */