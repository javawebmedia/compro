<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		$this->load->model('bagian_model');
	}

	// Halaman utama
	public function index()
	{
		// Ambil data bagian
		$bagian 	= $this->bagian_model->listing();
		$total 	= $this->bagian_model->total();

		$data = array(	'title'		=> 'Bagian dan Unit Kerja ('.$total->total.' data)',
						'bagian'	=> $bagian,
						'isi'		=> 'admin/bagian/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$validasi = $this->form_validation;

		$validasi->set_rules('nama_bagian','Nama Bagian','required|is_unique[bagian.nama_bagian]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat nama baru'));

		$validasi->set_rules('kode_bagian','Kode Bagian','required|is_unique[bagian.kode_bagian]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat kode baru'));

		if($validasi->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Tambah Bagian Baru',
						'isi'		=> 'admin/bagian/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$inp = $this->input;

			$data = array(	'id_user'		=> 1,
							'kode_bagian'		=> $inp->post('kode_bagian'),
							'nama_bagian'		=> $inp->post('nama_bagian'),
							'status_bagian'	=> $inp->post('status_bagian'),
							'keterangan'	=> $inp->post('keterangan'),
							'wilayah'		=> $inp->post('wilayah'),
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->bagian_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/bagian'),'refresh');
		}
		// End masuk database
	}

	// Edit
	public function edit($id_bagian)
	{
		// Ambil data bagian yg akan diedit
		$bagian = $this->bagian_model->detail($id_bagian);

		// Validasi
		$validasi = $this->form_validation;

		$validasi->set_rules('nama_bagian','Nama Bagian','required',
			array(	'required'		=> '%s harus diisi'));

		$validasi->set_rules('kode_bagian','Kode Bagian','required',
			array(	'required'		=> '%s harus diisi'));

		if($validasi->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Bagian: '.$bagian->nama_bagian,
						'bagian'		=> $bagian,
						'isi'		=> 'admin/bagian/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$inp = $this->input;

			$data = array(	'id_bagian'		=> $id_bagian,
							'id_user'		=> 1,
							'kode_bagian'		=> $inp->post('kode_bagian'),
							'nama_bagian'		=> $inp->post('nama_bagian'),
							'status_bagian'	=> $inp->post('status_bagian'),
							'keterangan'	=> $inp->post('keterangan'),
							'wilayah'		=> $inp->post('wilayah'),
						);
			$this->bagian_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/bagian'),'refresh');
		}
		// End masuk database
	}

	// Proses
	public function proses()
	{
		$id_bagiannya	= $this->input->post('id_bagian');
		$pengalihan = $this->input->post('pengalihan');

		// Check id_bagian kosong atau tidak
		if($id_bagiannya == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect($pengalihan,'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_bagiannya);$i++)
			{
				$id_bagian = $id_bagiannya[$i];
				$data = array(	'id_bagian'		=> $id_bagian);
				$this->bagian_model->delete($data);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect($pengalihan,'refresh');

		}elseif(isset($_POST['aktifkan'])) {
			// Proses aktifkan diloop
			for($i=0;$i<sizeof($id_bagiannya);$i++)
			{
				$id_bagian = $id_bagiannya[$i];
				$data = array(	'id_bagian'		=> $id_bagian,
								'status_bagian'	=> 'Aktif');
				$this->bagian_model->edit($data);
			}
			// End proses aktifkan
			$this->session->set_flashdata('sukses', 'Data telah diaktifkan');
			redirect($pengalihan,'refresh');

		}elseif(isset($_POST['non_aktifkan'])) {
			// Proses non aktifkan diloop
			for($i=0;$i<sizeof($id_bagiannya);$i++)
			{
				$id_bagian = $id_bagiannya[$i];
				$data = array(	'id_bagian'		=> $id_bagian,
								'status_bagian'	=> 'Non Aktif');
				$this->bagian_model->edit($data);
			}
			// End proses non aktifkan
			$this->session->set_flashdata('sukses', 'Data telah di non aktifkan');
			redirect($pengalihan,'refresh');
		}
	}

	// Delete
	public function delete($id_bagian)
	{
		$data = array(	'id_bagian'		=> $id_bagian);
		$this->bagian_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/bagian'),'refresh');
	}
}

/* End of file Bagian.php */
/* Location: ./application/controllers/admin/Bagian.php */