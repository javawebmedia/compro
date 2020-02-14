<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		$this->load->model('project_model');
	}

	// Halaman utama
	public function index()
	{
		// Ambil data project
		$project 	= $this->project_model->listing();
		$total 	= $this->project_model->total();

		$data = array(	'title'		=> 'Project dan Wilayah ('.$total->total.' data)',
						'project'		=> $project,
						'isi'		=> 'admin/project/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$validasi = $this->form_validation;

		$validasi->set_rules('nama_project','Nama Project','required|is_unique[project.nama_project]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat nama baru'));

		$validasi->set_rules('kode_project','Kode Project','required|is_unique[project.kode_project]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat kode baru'));

		if($validasi->run()) {
			// Gambar ga wajib, tapi kalau gambar diupload, maka proses ini berjalan
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  		= '10000';
			$config['max_width'] 	 	= '10000';
			$config['max_height']  		= '10000';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Tambah Project Baru',
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/project/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			// Start upload file
			$upload_data = array('upload_gambar' => $this->upload->data());
			// Buat thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_data['upload_gambar']['file_name'];
			$config['new_image']		= './assets/upload/image/thumbs/'.$upload_data['upload_gambar']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['quality']			= "100%";
			$config['width']         	= 300;//pixel
			$config['height']       	= 300;//Pixel
			$config['x_axis']         	= 0;// titik awal
			$config['y_axis']       	= 0;// titik awal
			$config['thumb_marker']     = '';// marker gambar
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			// End buat thumbnail
			$inp = $this->input;

			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'kode_project'		=> $inp->post('kode_project'),
							'nama_project'		=> $inp->post('nama_project'),
							'status_project'	=> $inp->post('status_project'),
							'keterangan'		=> $inp->post('keterangan'),
							'gambar'			=> $upload_data['upload_gambar']['file_name'],
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->project_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/project'),'refresh');
		}}else{
			// Kalau ga upload gambar
			$inp = $this->input;

			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'kode_project'		=> $inp->post('kode_project'),
							'nama_project'		=> $inp->post('nama_project'),
							'status_project'	=> $inp->post('status_project'),
							'keterangan'		=> $inp->post('keterangan'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->project_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/project'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Project Baru',
						'isi'		=> 'admin/project/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_project)
	{
		// Ambil data project yg akan diedit
		$project = $this->project_model->detail($id_project);

		// Validasi
		$validasi = $this->form_validation;

		$validasi->set_rules('nama_project','Nama Project','required',
			array(	'required'		=> '%s harus diisi'));

		$validasi->set_rules('kode_project','Kode Project','required',
			array(	'required'		=> '%s harus diisi'));

		if($validasi->run()) {
			// Gambar ga wajib, tapi kalau gambar diupload, maka proses ini berjalan
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']  		= '10000';
			$config['max_width'] 	 	= '10000';
			$config['max_height']  		= '10000';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'			=> 'Edit Project: '.$project->nama_project,
						'project'		=> $project,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/project/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			// Edit data dan upload gambar baru
			// Start upload file
			$upload_data = array('upload_gambar' => $this->upload->data());
			// Buat thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_data['upload_gambar']['file_name'];
			$config['new_image']		= './assets/upload/image/thumbs/'.$upload_data['upload_gambar']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['quality']			= "100%";
			$config['width']         	= 300;//pixel
			$config['height']       	= 300;//Pixel
			$config['x_axis']         	= 0;// titik awal
			$config['y_axis']       	= 0;// titik awal
			$config['thumb_marker']     = '';// marker gambar
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			// End buat thumbnail

			// Hapus gambar lama
			if($project->gambar !="") {
				unlink('./assets/upload/image/'.$project->gambar);
				unlink('./assets/upload/image/thumbs/'.$project->gambar);
			}
			// End hapus gambar lama
			$inp = $this->input;

			$data = array(	'id_project'		=> $id_project,
							'id_user'			=> $this->session->userdata('id_user'),
							'kode_project'		=> $inp->post('kode_project'),
							'nama_project'		=> $inp->post('nama_project'),
							'status_project'	=> $inp->post('status_project'),
							'keterangan'		=> $inp->post('keterangan'),
							'gambar'			=> $upload_data['upload_gambar']['file_name'],
						);
			$this->project_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/project'),'refresh');
		}}else{
			// Edit data aja
			$inp = $this->input;

			$data = array(	'id_project'		=> $id_project,
							'id_user'			=> $this->session->userdata('id_user'),
							'kode_project'		=> $inp->post('kode_project'),
							'nama_project'		=> $inp->post('nama_project'),
							'status_project'	=> $inp->post('status_project'),
							'keterangan'		=> $inp->post('keterangan'),
						);
			$this->project_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/project'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Edit Project: '.$project->nama_project,
						'project'		=> $project,
						'isi'			=> 'admin/project/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Proses
	public function proses()
	{
		$id_projectnya	= $this->input->post('id_project');
		$pengalihan = $this->input->post('pengalihan');

		// Check id_project kosong atau tidak
		if($id_projectnya == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect($pengalihan,'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_projectnya);$i++)
			{
				$id_project = $id_projectnya[$i];
				// Proses hapus gambar
				$project = $this->project_model->detail($id_project);
				// Hapus gambar lama
				if($project->gambar !="") {
					unlink('./assets/upload/image/'.$project->gambar);
					unlink('./assets/upload/image/thumbs/'.$project->gambar);
				}
				// End hapus gambar lama
				$data = array(	'id_project'		=> $id_project);
				$this->project_model->delete($data);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect($pengalihan,'refresh');

		}elseif(isset($_POST['aktifkan'])) {
			// Proses aktifkan diloop
			for($i=0;$i<sizeof($id_projectnya);$i++)
			{
				$id_project = $id_projectnya[$i];
				$data = array(	'id_project'		=> $id_project,
								'status_project'	=> 'Aktif');
				$this->project_model->edit($data);
			}
			// End proses aktifkan
			$this->session->set_flashdata('sukses', 'Data telah diaktifkan');
			redirect($pengalihan,'refresh');

		}elseif(isset($_POST['non_aktifkan'])) {
			// Proses non aktifkan diloop
			for($i=0;$i<sizeof($id_projectnya);$i++)
			{
				$id_project = $id_projectnya[$i];
				$data = array(	'id_project'		=> $id_project,
								'status_project'	=> 'Non Aktif');
				$this->project_model->edit($data);
			}
			// End proses non aktifkan
			$this->session->set_flashdata('sukses', 'Data telah di non aktifkan');
			redirect($pengalihan,'refresh');
		}
	}

	// Delete
	public function delete($id_project)
	{
		// Proses hapus gambar
		$project = $this->project_model->detail($id_project);
		// Hapus gambar lama
		if($project->gambar !="") {
			unlink('./assets/upload/image/'.$project->gambar);
			unlink('./assets/upload/image/thumbs/'.$project->gambar);
		}
		// End hapus gambar lama
		$data = array(	'id_project'		=> $id_project);
		$this->project_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/project'),'refresh');
	}
}

/* End of file Project.php */
/* Location: ./application/controllers/admin/Project.php */