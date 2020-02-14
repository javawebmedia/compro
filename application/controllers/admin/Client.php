<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOAD EXCEL
require('./excel/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// END LOAD EXCEL

class Client extends CI_Controller {

	// load data
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
		$this->load->model('up_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Admin page
	public function index()
	{
		$client = $this->client_model->listing();
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama client','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/client/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Client Perusahaan dan Perorangan',
						'error'		=> $this->upload->display_errors(),
						'client'	=> $client,
						'isi'		=> 'admin/client/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/client/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/client/thumbs/';
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

			$i = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'jenis_client'		=> $i->post('jenis_client'),
							'nama'				=> $i->post('nama'),
							'pimpinan'			=> $i->post('pimpinan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'isi_testimoni'		=> $i->post('isi_testimoni'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_client'		=> $i->post('status_client'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->client_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/client'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'jenis_client'		=> $i->post('jenis_client'),
							'nama'				=> $i->post('nama'),
							'pimpinan'			=> $i->post('pimpinan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'isi_testimoni'		=> $i->post('isi_testimoni'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'status_client'		=> $i->post('status_client'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->client_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/client'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Client Perusahaan dan Perorangan',
						'client'	=> $client,
						'isi'		=> 'admin/client/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama client','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/client/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Tambah Client',
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/client/add'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/client/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/client/thumbs/';
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

			$i = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'jenis_client'		=> $i->post('jenis_client'),
							'nama'				=> $i->post('nama'),
							'pimpinan'			=> $i->post('pimpinan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'isi_testimoni'		=> $i->post('isi_testimoni'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_client'		=> $i->post('status_client'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->client_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/client'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'jenis_client'		=> $i->post('jenis_client'),
							'nama'				=> $i->post('nama'),
							'pimpinan'			=> $i->post('pimpinan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'isi_testimoni'		=> $i->post('isi_testimoni'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'status_client'		=> $i->post('status_client'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->client_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/client'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Client',
						'isi'		=> 'admin/client/add'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_client)
	{
		$client = $this->client_model->detail($id_client);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama client','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/client/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Edit Client: '.$client->nama,
						'error'		=> $this->upload->display_errors(),
						'client'	=> $client,
						'isi'		=> 'admin/client/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/client/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/client/thumbs/';
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

			$i = $this->input;
			$data = array(	'id_client'			=> $id_client,
							'id_user'			=> $this->session->userdata('id_user'),
							'jenis_client'		=> $i->post('jenis_client'),
							'nama'				=> $i->post('nama'),
							'pimpinan'			=> $i->post('pimpinan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'isi_testimoni'		=> $i->post('isi_testimoni'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_client'		=> $i->post('status_client'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$client->nama.' telah diupdate');
			redirect(base_url('admin/client'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_client'			=> $id_client,
							'id_user'			=> $this->session->userdata('id_user'),
							'jenis_client'		=> $i->post('jenis_client'),
							'nama'				=> $i->post('nama'),
							'pimpinan'			=> $i->post('pimpinan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'isi_testimoni'		=> $i->post('isi_testimoni'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'status_client'		=> $i->post('status_client'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$client->nama.' telah diupdate');
			redirect(base_url('admin/client'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Client: '.$client->nama,
						'client'	=> $client,
						'isi'		=> 'admin/client/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Up
	public function up($id_client)
	{
		$client = $this->client_model->detail($id_client);
		$up 	= $this->up_model->listing($id_client);
		$total 	= $this->up_model->total($id_client);
		
		// Validasi
		$validasi 	= $this->form_validation;

		$validasi->set_rules('nama_up','Nama CP','required',
			array(	'required'		=> '%s harus diisi'));

		$validasi->set_rules('email','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		if($validasi->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Data CP: '.$client->nama.' ('.
										$total->total.' data)',
						'client'	=> $client,
						'up'		=> $up,
						'isi'		=> 'admin/client/up'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$inp 	= $this->input;
			$jenis 	= $inp->post('jenis');

			if($jenis=='tambah') {
				$data = array(	'id_client'		=> $id_client,
								'id_user'		=> $this->session->userdata('id_user'),
								'nama_up'		=> $inp->post('nama_up'),
								'bagian'		=> $inp->post('bagian'),
								'email'			=> $inp->post('email'),
								'telepon'		=> $inp->post('telepon'),
								'keterangan'	=> $inp->post('keterangan'),
							);
				$this->up_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			}else{
				$data = array(	'id_up'			=> $inp->post('id_up'),
								'id_client'		=> $id_client,
								'id_user'		=> $this->session->userdata('id_user'),
								'nama_up'		=> $inp->post('nama_up'),
								'bagian'		=> $inp->post('bagian'),
								'email'			=> $inp->post('email'),
								'telepon'		=> $inp->post('telepon'),
								'keterangan'	=> $inp->post('keterangan'),
							);
				$this->up_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
			}
			
			redirect(base_url('admin/client/up/'.$id_client),'refresh');
		}
		// End masuk database
	}

	// Delete up
	public function delete_up($id_up,$id_client)
	{
		$data = array(	'id_up'			=> $id_up);
		$this->up_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/client/up/'.$id_client),'refresh');
	}

	// Detail
	public function detail($id_client)
	{
		$client = $this->client_model->detail($id_client);
		// End masuk database
		$data = array(	'title'		=> $client->nama,
						'client'	=> $client,
						'isi'		=> 'admin/client/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak
	public function cetak($id_client)
	{
		$site 	= $this->konfigurasi_model->listing();
		$client = $this->client_model->detail($id_client);
		// End masuk database
		$data = array(	'title'		=> $client->nama,
						'client'	=> $client,
						'site'		=> $site,
					);
		// $this->load->view('admin/client/cetak', $data, FALSE);
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->SetHTMLHeader('
				<div style="text-align: right; font-weight: bold;font-family: Arial; color: orange;border-bottom: solid thin #EEE; padding-bottom: 5px;">
				    '.strtoupper($site->namaweb.' | '.$site->telepon.' | '.$site->email).'
				</div>');
		$mpdf->SetHTMLFooter('
				<div style="text-align: center; font-weight: bold;font-family: Arial; color: orange;border-top: solid thin #EEE; padding-top: 5px;">
				    '.$site->website.'
				</div>');
	    $html = $this->load->view('admin/client/cetak',$data,true);
	    $mpdf->WriteHTML($html);
	    $nama_file = $client->nama.'.pdf';
	    $mpdf->Output($nama_file, 'I'); 
	    // $nama_file = 'disposisi-'.$disposisi->id_disposisi;
	    // $mpdf->Output($nama_file.'.pdf','D');
	}

	// Load data
	public function data()
	{
		header('Content-Type: application/json');
		$jenis_client = $this->uri->segment(4);
		if($jenis_client == FALSE) {
			$client 	= $this->client_model->listing();
			$total 		= $this->client_model->total();
		}else{
			$client 	= $this->client_model->listing($jenis_client);
			$total 		= $this->client_model->total($jenis_client);
		}
		echo '{"draw":10,"recordsTotal":'.$total->total.',"recordsFiltered":'.count($client).',"data":';
		 echo json_encode($client);
		echo '}';
	}


	// Delete
	public function approval($id_client)
	{
		$client = $this->client_model->detail($id_client);
		$this->load->helper('string');
		$password = strtolower(random_string('alnum', 8));

		if($client->email=="") {
			$username 	= strtolower(str_replace(' ', '', $client->nama));
		}else{
			$username 	= $client->email;
		}
		$data = array(	'id_client'		=> $id_client,
						'id_user'		=> $this->session->userdata('id_user'),
						'email'			=> $username,
						'password'		=> sha1($password),
						'password_hint'	=> $password
					);
		$this->client_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data '.$client->nama.' telah disetujui dan diberi akses');
		redirect(base_url('admin/client'),'refresh');
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_clientnya		= $inp->post('id_client');

   			for($i=0; $i < sizeof($id_clientnya);$i++) {
   				$client 	= $this->client_model->detail($id_clientnya[$i]);
   				if($client->gambar !='') {
					unlink('./assets/upload/client/'.$client->gambar);
					unlink('./assets/upload/client/thumbs/'.$client->gambar);
				}
				$data = array(	'id_client'	=> $id_clientnya[$i]);
   				$this->client_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/client'),'refresh');
   		// PROSES EXPORT KE EXCEL
   		}elseif(isset($_POST['export'])) {
   			$inp 					= $this->input;
			$id_clientnya			= $inp->post('id_client');

			// Export ke excel
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator($this->session->userdata('username'))
			    ->setLastModifiedBy($this->session->userdata('username'))
			    ->setTitle('Office 2007 XLSX Test Document')
			    ->setSubject('Office 2007 XLSX Test Document')
			    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
			    ->setKeywords('office 2007 openxml php')
			    ->setCategory('Test result file');

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A1', 'DATA CLIENT '.$site->namaweb)
			    ->setCellValue('B1', '')
			    ->setCellValue('C1', '')
			    ->setCellValue('D1', '')
			    ->setCellValue('E1', '')
				->setCellValue('F1', '')
				->setCellValue('G1', '')
				->setCellValue('H1', '')
				->setCellValue('I1', '')
				->setCellValue('J1', '')
				->setCellValue('K1', ':')
				->setCellValue('L1', '')
			     ;

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A2', 'DATA DIAMBIL PADA TANGGAL '.date('d-m-Y'))
			    ->setCellValue('B2', '')
			    ->setCellValue('C2', '')
			    ->setCellValue('D2', '')
			    ->setCellValue('E2', '')
				->setCellValue('F2', '')
				->setCellValue('G2', '')
				->setCellValue('H2', '')
				->setCellValue('I2', '')
				->setCellValue('J2', '')
				->setCellValue('K2', ':')
				->setCellValue('L2', '')
			     ;
			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A3', 'OLEH')
			    ->setCellValue('B3', '')
			    ->setCellValue('C3', '')
			    ->setCellValue('D3', '')
			    ->setCellValue('E3', '')
				->setCellValue('F3', '')
				->setCellValue('G3', '')
				->setCellValue('H3', '')
				->setCellValue('I3', '')
				->setCellValue('J3', '')
				->setCellValue('K3', ':')
				->setCellValue('L3', '')
			     ;

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A4', '')
			    ->setCellValue('B4', '')
			    ->setCellValue('C4', '')
			    ->setCellValue('D4', '')
			    ->setCellValue('E4', '')
				->setCellValue('F4', '')
				->setCellValue('G4', '')
				->setCellValue('H4', '')
				->setCellValue('I4', '')
				->setCellValue('J4', '')
				->setCellValue('K4', '')
				->setCellValue('L4', '')
			     ;

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A5', 'NO')
			    ->setCellValue('B5', 'NAMA')
			    ->setCellValue('C5', 'JENIS')
			    ->setCellValue('D5', 'TELEPON')
			    ->setCellValue('E5', 'EMAIL')
				->setCellValue('F5', 'ALAMAT')
				->setCellValue('G5', 'STATUS CLIENT')
				->setCellValue('H5', 'STATUS TESTIMONI')
				->setCellValue('I5', 'ISI TESTIMONI')
				->setCellValue('J5', 'STATUS BACA')
				->setCellValue('K5', 'STATUS SISWA')
				->setCellValue('L5', 'IP ADDRESS')
			     ;

			for($i=1;$i<sizeof($id_clientnya);$i++) {
				$nomor 		= $i+6;
				$id_client 	= $id_clientnya[$i];
				$client 	= $this->client_model->detail($id_clientnya[$i]);

   				$spreadsheet->setActiveSheetIndex(0)
				    ->setCellValue('A'.$nomor, $i)
				    ->setCellValue('B'.$nomor, $client->nama)
				    ->setCellValue('C'.$nomor, $client->jenis_client)
				    ->setCellValue('D'.$nomor, $client->telepon)
				    ->setCellValue('E'.$nomor, $client->email)
					->setCellValue('F'.$nomor, $client->alamat)
					->setCellValue('G'.$nomor, $client->status_client)
					->setCellValue('H'.$nomor, $client->status_testimoni)
					->setCellValue('I'.$nomor, $client->isi_testimoni)
					->setCellValue('J'.$nomor, $client->status_baca)
					->setCellValue('K'.$nomor, $client->status_siswa)
					->setCellValue('L'.$nomor, $client->ip_address)
					;
   			}
			// END
			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);

			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename=" DATA CLIENT '.$site->namaweb.' TANGGAL '.date('d-m-Y').'.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			// exit;
   			$this->session->set_flashdata('sukses', 'Data telah diexport');
			header("Location: ".base_url('admin/client'));
   		}elseif(isset($_POST['exportAll'])) {
   			$client 	= $this->client_model->listing();

			// Export ke excel
			$spreadsheet = new Spreadsheet();

			// Set document properties
			$spreadsheet->getProperties()->setCreator($this->session->userdata('username'))
			    ->setLastModifiedBy($this->session->userdata('username'))
			    ->setTitle('Office 2007 XLSX Test Document')
			    ->setSubject('Office 2007 XLSX Test Document')
			    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
			    ->setKeywords('office 2007 openxml php')
			    ->setCategory('Test result file');

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A1', 'DATA CLIENT '.$site->namaweb)
			    ->setCellValue('B1', '')
			    ->setCellValue('C1', '')
			    ->setCellValue('D1', '')
			    ->setCellValue('E1', '')
				->setCellValue('F1', '')
				->setCellValue('G1', '')
				->setCellValue('H1', '')
				->setCellValue('I1', '')
				->setCellValue('J1', '')
				->setCellValue('K1', ':')
				->setCellValue('L1', '')
			     ;

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A2', 'DATA DIAMBIL PADA TANGGAL '.date('d-m-Y'))
			    ->setCellValue('B2', '')
			    ->setCellValue('C2', '')
			    ->setCellValue('D2', '')
			    ->setCellValue('E2', '')
				->setCellValue('F2', '')
				->setCellValue('G2', '')
				->setCellValue('H2', '')
				->setCellValue('I2', '')
				->setCellValue('J2', '')
				->setCellValue('K2', ':')
				->setCellValue('L2', '')
			     ;
			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A3', 'OLEH')
			    ->setCellValue('B3', '')
			    ->setCellValue('C3', '')
			    ->setCellValue('D3', '')
			    ->setCellValue('E3', '')
				->setCellValue('F3', '')
				->setCellValue('G3', '')
				->setCellValue('H3', '')
				->setCellValue('I3', '')
				->setCellValue('J3', '')
				->setCellValue('K3', ':')
				->setCellValue('L3', '')
			     ;

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A4', '')
			    ->setCellValue('B4', '')
			    ->setCellValue('C4', '')
			    ->setCellValue('D4', '')
			    ->setCellValue('E4', '')
				->setCellValue('F4', '')
				->setCellValue('G4', '')
				->setCellValue('H4', '')
				->setCellValue('I4', '')
				->setCellValue('J4', '')
				->setCellValue('K4', '')
				->setCellValue('L4', '')
			     ;

			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			    ->setCellValue('A5', 'NO')
			    ->setCellValue('B5', 'NAMA')
			    ->setCellValue('C5', 'JENIS')
			    ->setCellValue('D5', 'TELEPON')
			    ->setCellValue('E5', 'EMAIL')
				->setCellValue('F5', 'ALAMAT')
				->setCellValue('G5', 'STATUS CLIENT')
				->setCellValue('H5', 'STATUS TESTIMONI')
				->setCellValue('I5', 'ISI TESTIMONI')
				->setCellValue('J5', 'STATUS BACA')
				->setCellValue('K5', 'STATUS SISWA')
				->setCellValue('L5', 'IP ADDRESS')
			     ;
			$i=1;
			foreach($client as $client) {
				$nomor = $i+1;
   				$spreadsheet->setActiveSheetIndex(0)
				    ->setCellValue('A'.$nomor, $i)
				    ->setCellValue('B'.$nomor, $client->nama)
				    ->setCellValue('C'.$nomor, $client->jenis_client)
				    ->setCellValue('D'.$nomor, $client->telepon)
				    ->setCellValue('E'.$nomor, $client->email)
					->setCellValue('F'.$nomor, $client->alamat)
					->setCellValue('G'.$nomor, $client->status_client)
					->setCellValue('H'.$nomor, $client->status_testimoni)
					->setCellValue('I'.$nomor, $client->isi_testimoni)
					->setCellValue('J'.$nomor, $client->status_baca)
					->setCellValue('K'.$nomor, $client->status_siswa)
					->setCellValue('L'.$nomor, $client->ip_address)
					;
   			$i++;}
			// END
			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);

			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename=" DATA CLIENT '.$site->namaweb.' TANGGAL '.date('d-m-Y').'.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			// exit;
   			$this->session->set_flashdata('sukses', 'Data telah diexport');
			header("Location: ".base_url('admin/client'));
   		}
	}

	// Delete
	public function delete($id_client)
	{
		$client = $this->client_model->detail($id_client);
		if($client->gambar !='') {
			unlink('./assets/upload/client/'.$client->gambar);
			unlink('./assets/upload/client/thumbs/'.$client->gambar);
		}
		$data = array(	'id_client'	=> $id_client);
		$this->client_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/client'),'refresh');
	}
}

/* End of file Client.php */
/* Location: ./application/controllers/admin/Client.php */