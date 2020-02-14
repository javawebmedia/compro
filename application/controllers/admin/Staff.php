<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOAD EXCEL
require('./excel/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// END LOAD EXCEL

class Staff extends CI_Controller {

	// load data
	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Admin page
	public function index()
	{
		$staff 		= $this->staff_model->listing();
		$total 		= $this->staff_model->total();
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama staff','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/staff/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Staff &amp; Konsultan',
						'error'		=> $this->upload->display_errors(),
						'staff'		=> $staff,
						'isi'		=> 'admin/staff/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/staff/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/staff/thumbs/';
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
							'urutan'			=> $i->post('urutan'),
							'nama'				=> $i->post('nama'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'jabatan'			=> $i->post('jabatan'),
							'keahlian'			=> $i->post('keahlian'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_staff'		=> $i->post('status_staff'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->staff_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/staff'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'urutan'		=> $i->post('urutan'),
							'nama'				=> $i->post('nama'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'jabatan'	=> $i->post('jabatan'),
							'keahlian'		=> $i->post('keahlian'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'status_staff'		=> $i->post('status_staff'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->staff_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/staff'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Staff &amp; Konsultan',
						'staff'		=> $staff,
						'isi'		=> 'admin/staff/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama staff','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/staff/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Tambah Staff',
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/staff/add'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/staff/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/staff/thumbs/';
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
							'urutan'		=> $i->post('urutan'),
							'nama'				=> $i->post('nama'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'jabatan'	=> $i->post('jabatan'),
							'keahlian'		=> $i->post('keahlian'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_staff'		=> $i->post('status_staff'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->staff_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/staff'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'urutan'		=> $i->post('urutan'),
							'nama'				=> $i->post('nama'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'jabatan'	=> $i->post('jabatan'),
							'keahlian'		=> $i->post('keahlian'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'status_staff'		=> $i->post('status_staff'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->staff_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/staff'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Staff',
						'isi'		=> 'admin/staff/add'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_staff)
	{
		$staff = $this->staff_model->detail($id_staff);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama staff','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/staff/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Edit Staff: '.$staff->nama,
						'error'		=> $this->upload->display_errors(),
						'staff'	=> $staff,
						'isi'		=> 'admin/staff/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/staff/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/staff/thumbs/';
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
			$data = array(	'id_staff'			=> $id_staff,
							'id_user'			=> $this->session->userdata('id_user'),
							'urutan'		=> $i->post('urutan'),
							'nama'				=> $i->post('nama'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'jabatan'	=> $i->post('jabatan'),
							'keahlian'		=> $i->post('keahlian'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_staff'		=> $i->post('status_staff'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->staff_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$staff->nama.' telah diupdate');
			redirect(base_url('admin/staff'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_staff'			=> $id_staff,
							'id_user'			=> $this->session->userdata('id_user'),
							'urutan'		=> $i->post('urutan'),
							'nama'				=> $i->post('nama'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'jabatan'	=> $i->post('jabatan'),
							'keahlian'			=> $i->post('keahlian'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'status_staff'		=> $i->post('status_staff'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->staff_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$staff->nama.' telah diupdate');
			redirect(base_url('admin/staff'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Staff: '.$staff->nama,
						'staff'	=> $staff,
						'isi'		=> 'admin/staff/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($id_staff)
	{
		$staff = $this->staff_model->detail($id_staff);
		// End masuk database
		$data = array(	'title'		=> $staff->nama,
						'staff'	=> $staff,
						'isi'		=> 'admin/staff/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak
	public function cetak($id_staff)
	{
		$site 	= $this->konfigurasi_model->listing();
		$staff = $this->staff_model->detail($id_staff);
		// End masuk database
		$data = array(	'title'		=> $staff->nama,
						'staff'	=> $staff,
						'site'		=> $site,
					);
		// $this->load->view('admin/staff/cetak', $data, FALSE);
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->SetHTMLHeader('
				<div style="text-align: right; font-weight: bold;font-family: Arial; color: orange;border-bottom: solid thin #EEE; padding-bottom: 5px;">
				    '.strtoupper($site->namaweb.' | '.$site->telepon.' | '.$site->email).'
				</div>');
		$mpdf->SetHTMLFooter('
				<div style="text-align: center; font-weight: bold;font-family: Arial; color: orange;border-top: solid thin #EEE; padding-top: 5px;">
				    '.$site->website.'
				</div>');
	    $html = $this->load->view('admin/staff/cetak',$data,true);
	    $mpdf->WriteHTML($html);
	    $nama_file = $staff->nama.'.pdf';
	    $mpdf->Output($nama_file, 'I'); 
	    // $nama_file = 'disposisi-'.$disposisi->id_disposisi;
	    // $mpdf->Output($nama_file.'.pdf','D');
	}

	// Load data
	public function data()
	{
		header('Content-Type: application/json');
		$urutan = $this->uri->segment(4);
		if($urutan == FALSE) {
			$staff 	= $this->staff_model->listing();
			$total 		= $this->staff_model->total();
		}else{
			$staff 	= $this->staff_model->listing($urutan);
			$total 		= $this->staff_model->total($urutan);
		}
		echo '{"draw":10,"recordsTotal":'.$total->total.',"recordsFiltered":'.count($staff).',"data":';
		 echo json_encode($staff);
		echo '}';
	}


	// Delete
	public function approval($id_staff)
	{
		$staff = $this->staff_model->detail($id_staff);
		$this->load->helper('string');
		$password = strtolower(random_string('alnum', 8));

		if($staff->email=="") {
			$username 	= strtolower(str_replace(' ', '', $staff->nama));
		}else{
			$username 	= $staff->email;
		}
		$data = array(	'id_staff'		=> $id_staff,
						'id_user'		=> $this->session->userdata('id_user'),
						'email'			=> $username,
						'password'		=> sha1($password),
						'password_hint'	=> $password
					);
		$this->staff_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data '.$staff->nama.' telah disetujui dan diberi akses');
		redirect(base_url('admin/staff'),'refresh');
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_staffnya		= $inp->post('id_staff');

   			for($i=0; $i < sizeof($id_staffnya);$i++) {
   				$staff 	= $this->staff_model->detail($id_staffnya[$i]);
   				if($staff->gambar !='') {
					unlink('./assets/upload/staff/'.$staff->gambar);
					unlink('./assets/upload/staff/thumbs/'.$staff->gambar);
				}
				$data = array(	'id_staff'	=> $id_staffnya[$i]);
   				$this->staff_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/staff'),'refresh');
   		// PROSES EXPORT KE EXCEL
   		}elseif(isset($_POST['export'])) {
   			$inp 					= $this->input;
			$id_staffnya			= $inp->post('id_staff');

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

			for($i=1;$i<sizeof($id_staffnya);$i++) {
				$nomor 		= $i+6;
				$id_staff 	= $id_staffnya[$i];
				$staff 	= $this->staff_model->detail($id_staffnya[$i]);

   				$spreadsheet->setActiveSheetIndex(0)
				    ->setCellValue('A'.$nomor, $i)
				    ->setCellValue('B'.$nomor, $staff->nama)
				    ->setCellValue('C'.$nomor, $staff->urutan)
				    ->setCellValue('D'.$nomor, $staff->telepon)
				    ->setCellValue('E'.$nomor, $staff->email)
					->setCellValue('F'.$nomor, $staff->alamat)
					->setCellValue('G'.$nomor, $staff->status_staff)
					->setCellValue('H'.$nomor, $staff->jabatan)
					->setCellValue('I'.$nomor, $staff->keahlian)
					->setCellValue('J'.$nomor, $staff->status_baca)
					->setCellValue('K'.$nomor, $staff->status_siswa)
					->setCellValue('L'.$nomor, $staff->ip_address)
					;
   			}
			// END
			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);

			// Redirect output to a staff’s web browser (Xlsx)
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
			header("Location: ".base_url('admin/staff'));
   		}elseif(isset($_POST['exportAll'])) {
   			$staff 	= $this->staff_model->listing();

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
			foreach($staff as $staff) {
				$nomor = $i+1;
   				$spreadsheet->setActiveSheetIndex(0)
				    ->setCellValue('A'.$nomor, $i)
				    ->setCellValue('B'.$nomor, $staff->nama)
				    ->setCellValue('C'.$nomor, $staff->urutan)
				    ->setCellValue('D'.$nomor, $staff->telepon)
				    ->setCellValue('E'.$nomor, $staff->email)
					->setCellValue('F'.$nomor, $staff->alamat)
					->setCellValue('G'.$nomor, $staff->status_staff)
					->setCellValue('H'.$nomor, $staff->jabatan)
					->setCellValue('I'.$nomor, $staff->keahlian)
					->setCellValue('J'.$nomor, $staff->status_baca)
					->setCellValue('K'.$nomor, $staff->status_siswa)
					->setCellValue('L'.$nomor, $staff->ip_address)
					;
   			$i++;}
			// END
			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);

			// Redirect output to a staff’s web browser (Xlsx)
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
			header("Location: ".base_url('admin/staff'));
   		}
	}

	// Delete
	public function delete($id_staff)
	{
		$staff = $this->staff_model->detail($id_staff);
		if($staff->gambar !='') {
			unlink('./assets/upload/staff/'.$staff->gambar);
			unlink('./assets/upload/staff/thumbs/'.$staff->gambar);
		}
		$data = array(	'id_staff'	=> $id_staff);
		$this->staff_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/staff'),'refresh');
	}
}

/* End of file Staff.php */
/* Location: ./application/controllers/admin/Staff.php */