<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pekerjaan_model');
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

		$valid->set_rules('nama_pekerjaan','Nama pekerjaan','required|is_unique[pekerjaan.nama_pekerjaan]',
			array(	'required'		=> 'Nama pekerjaan harus diisi',
					'is_unique'		=> 'Nama pekerjaan sudah ada. Buat Nama pekerjaan baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Data Pekerjaan',
						'pekerjaan'	=> $this->pekerjaan_model->listing(),
						'isi'		=> 'admin/pekerjaan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_pekerjaan'),'dash',TRUE);

			$data = array(	'nama_pekerjaan'	=> $i->post('nama_pekerjaan'),
							'slug_pekerjaan'	=> $slug,
							'urutan'			=> $i->post('urutan'),
						);
			$this->pekerjaan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/pekerjaan'),'refresh');
		}
		// End proses masuk database
	}

	// Edit pekerjaan
	public function edit($id_pekerjaan)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_pekerjaan','Nama pekerjaan','required',
			array(	'required'		=> 'Nama pekerjaan harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Data Pekerjaan',
						'pekerjaan'	=> $this->pekerjaan_model->detail($id_pekerjaan),
						'isi'		=> 'admin/pekerjaan/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_pekerjaan'),'dash',TRUE);

			$data = array(	'id_pekerjaan'		=> $id_pekerjaan,
							'nama_pekerjaan'	=> $i->post('nama_pekerjaan'),
							'slug_pekerjaan'	=> $slug,
							'urutan'			=> $i->post('urutan'),
						);
			$this->pekerjaan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/pekerjaan'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_pekerjaan) {
		// Proteksi proses delete harus login
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);


		$data = array('id_pekerjaan'	=> $id_pekerjaan);
		$this->pekerjaan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pekerjaan'),'refresh');
	}
}

/* End of file Pekerjaan.php */
/* Location: ./application/controllers/admin/Pekerjaan.php */