<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_galeri extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_galeri_model');
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

		$valid->set_rules('nama_kategori_galeri','Nama kategori_galeri','required|is_unique[kategori_galeri.nama_kategori_galeri]',
			array(	'required'		=> 'Nama kategori_galeri harus diisi',
					'is_unique'		=> 'Nama kategori_galeri sudah ada. Buat Nama kategori_galeri baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Kategori galeri',
						'kategori_galeri'	=> $this->kategori_galeri_model->listing(),
						'isi'		=> 'admin/kategori_galeri/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_galeri'),'dash',TRUE);

			$data = array(	'nama_kategori_galeri'	=> $i->post('nama_kategori_galeri'),
							'slug_kategori_galeri'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_galeri_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kategori_galeri'),'refresh');
		}
		// End proses masuk database
	}

	// Edit kategori_galeri
	public function edit($id_kategori_galeri)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_galeri','Nama kategori_galeri','required',
			array(	'required'		=> 'Nama kategori_galeri harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Kategori galeri',
						'kategori_galeri'	=> $this->kategori_galeri_model->detail($id_kategori_galeri),
						'isi'		=> 'admin/kategori_galeri/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_galeri'),'dash',TRUE);

			$data = array(	'id_kategori_galeri'	=> $id_kategori_galeri,
							'nama_kategori_galeri'	=> $i->post('nama_kategori_galeri'),
							'slug_kategori_galeri'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_galeri_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kategori_galeri'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_kategori_galeri) {
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);

		$data = array('id_kategori_galeri'	=> $id_kategori_galeri);
		$this->kategori_galeri_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori_galeri'),'refresh');
	}
}

/* End of file Kategori_galeri.php */
/* Location: ./application/controllers/admin/Kategori_galeri.php */