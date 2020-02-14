<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	// Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('peneliti_model');
		$this->load->model('provinsi_model');
            $this->load->model('kabupaten_model');
            $this->load->model('kecamatan_model');
            $this->load->model('kampus_model');
            $this->load->model('gelombang_model');
	}

      // Index
      public function index()
      {
            $site       = $this->konfigurasi_model->listing();
            $provinsi   = $this->provinsi_model->listing();
            $kabupaten  = $this->kabupaten_model->listing();
            $kecamatan  = $this->kecamatan_model->listing();
            $kampus     = $this->kampus_model->listing();
            $gelombang  = $this->gelombang_model->home();
            $aktivasi   = random_string('alnum', 64);

            // START VALIDASI
            $valid = $this->form_validation;
            $valid->set_rules('username', 'Username', 'required|is_unique[peneliti.username]', 
                  array(
                        'required'        => 'Form %s tidak boleh kosong', 
                        'is_unique'       => 'Username sudah digunakan, silahkan gunakan username lain'));
            $valid->set_rules('email', 'Email', 'required|is_unique[peneliti.email]',
                  array(
                        'required'        => 'Form %s tidak boleh kosong', 
                        'is_unique'       => 'Email sudah digunakan, silahkan gunakan email lain'));
            $valid->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]', 
                  array(
                        'required'        => 'Form %s tidak boleh kosong', 
                        'min_length'      => '%s minimal 6 karakter', 
                        'max_length'      => '%s maksimal 12 karakter'));
            $valid->set_rules('konfirmasi_password', 'Konfirmasi password', 'required|matches[password]', 
                  array(
                        'required'        => 'Form %s tidak boleh kosong', 
                        'matches'         => '%s salah, silahkan ulangi lagi'));
            // $valid->set_rules('id_kampus', 'Universitas/ Kampus', 'required', 
            //       array(
            //             'required'        => 'Form %s tidak boleh kosong'));
            $valid->set_rules('id_provinsi', 'Provinsi', 'required', 
                  array(
                        'required'        => 'Form %s tidak boleh kosong'));
            $valid->set_rules('id_kabupaten', 'Kabupaten', 'required', 
                  array(
                        'required'        => 'Form %s tidak boleh kosong'));
            $valid->set_rules('nama_peneliti', 'Nama Peneliti/ Lembaga Penelitian', 'required', 
                  array(
                        'required'        => 'Form %s tidak boleh kosong'));
            $valid->set_rules('alamat', 'Alamat Peneliti/ Lembaga Penelitian', 'required|min_length[15]', 
                  array(
                        'required'        => 'Form %s tidak boleh kosong',
                        'min_length'      => '%s minimal 15 karakter'
                  ));

            if($valid->run()===FALSE)
            {

                  $data = array(
                        'title'           => 'Pendaftaran Kemitraan',
                        'deskripsi'       => 'Pendaftaran '.$site->namaweb.' | '.$site->tagline.' '.$site->deskripsi,
                        'keywords'        => 'Pendaftaran '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
                        'provinsi'        => $provinsi,
                        'kabupaten'       => $kabupaten,
                        'kecamatan'       => $kecamatan,
                        'kampus'          => $kampus,
                        'gelombang'       => $gelombang,
                        'isi'             => 'pendaftaran/list'
                  );
                  $this->load->view('layout/wrapper', $data, FALSE);
            }
            else
            {
                  $i = $this->input;
                  $data = array(
                        'id_kampus'             => $i->post('id_kampus'),
                        'id_provinsi'           => $i->post('id_provinsi'),
                        'id_kabupaten'          => $i->post('id_kabupaten'),
                        'nama_kampus'           => $i->post('nama_kampus'),
                        'username'              => $i->post('username'),
                        'email'                 => $i->post('email'),
                        'password'              => sha1($i->post('password')),
                        'password_hint'         => $i->post('password'),
                        'nama_peneliti'         => $i->post('nama_peneliti'),
                        'alamat'                => $i->post('alamat'),
                        'telepon'               => $i->post('telepon'),
                        'status_peneliti'       => 'Pending',
                        'aktivasi'              => $aktivasi,
                        'tanggal_daftar'        => date('Y-m-d')
                  );

                  $this->peneliti_model->tambah($data);
                  /* Kirim Email ke Pelanggan */
                  $this->load->library('email');
                  $nama_peneliti    = $i->post('nama_peneliti');
                  $email            = $i->post('email');
                  $subject          = 'Pendaftaran Online '.$site->namaweb.' - '.$site->tagline;
                  $pesan      = '<html>
                  <head>
                  <meta charset="utf-8">

                  <style>
                  body {
                        background-color: #EEE; 
                  }
                  tr,td,th {
                        border: solid thin gray;
                        border-collapse: collapse;
                        padding: 10px 20px;
                  }
                  section {
                        background-color: #FFF;
                        width: 600px;
                        padding: 20px;
                        margin 20px auto;
                  }
                  </style>
                  </head>

                  <body>
                  <section>
                  '.
                  '<p>Berikut adalah link aktivasi akun Anda:</p><hr>'.
                  '<p><a href="'. base_url('pendaftaran/aktivasi/'.$aktivasi) .'">Aktivasi Akun</a></p><hr>'.
                  '<p>Anda dapat menyalin kode ini: <strong>'.base_url('pendaftaran/aktivasi/'.$aktivasi).'</strong> lalu Buka alamat tersebut melalui Browser'.
                  '<p>'.nl2br($site->namaweb).'</p>'.
                  '</section></body></html>';

                  $name                   = $site->namaweb.' - '.$site->tagline;
                  $cemail                 = $email;
                  $message                = $pesan;
                  $config['protocol']     = 'smtp';
                  $config['smtp_host']    = 'ssl://mail.pusdu.com';
                  $config['smtp_port']    = '465';
                  $config['smtp_timeout'] = '7';
                  $config['smtp_user']    = 'contact@pusdu.com';
                  $config['smtp_pass']    = 'rasulullah';
                  $config['charset']      = 'utf-8';
                  $config['newline']      = "\r\n";
                  $config['mailtype']     = 'html'; // or html
                  $config['validation']   = FALSE;

                  $this->email->initialize($config);
                  $this->email->from($site->email,$name);
                  $this->email->to($email); 
                  $this->email->subject($subject);

                  $this->email->message($message);  
                  $this->email->send();
                  /* End kirim email */
                  $this->session->set_flashdata('sukses', 'Terima kasih, telah melakukan peneliti. Periksa email (atau folder SPAM email Anda) untuk melakukan aktivasi Akun Pendaftaran.');
                  redirect(base_url('masuk'),'refresh');
            }
            // END MASUK DATBASE
      }

	public function tiga()
	{
            $this->load->library('email');
		$site 	= $this->konfigurasi_model->listing();
		$provinsi 	= $this->provinsi_model->aktif();
		$kabupaten	= $this->kabupaten_model->aktif();
		$kecamatan	= $this->kecamatan_model->aktif();
            $kampus     = $this->kampus_model->aktif();
            $gelombang  = $this->gelombang_model->home();

            // START VALIDASI
            $valid = $this->form_validation;
            $valid->set_rules('username', 'Username', 'required|is_unique[member.username]', 
                  array(      'required'        => 'Form %s tidak boleh kosong', 
                              'is_unique'       => 'Username sudah digunakan, silahkan gunakan username lain'));
            $valid->set_rules('password', 'Kata sandi', 'required|min_length[6]|max_length[12]', 
                  array(      'required'        => 'Form %s tidak boleh kosong', 
                              'min_length'      => '%s minimal 6 karakter', 
                              'max_length'      => '%s maksimal 12 karakter'));
            $valid->set_rules('password_confirm', 'Ulangi kata sandi', 'required|matches[password]', 
                  array(      'required'        => 'Form %s tidak boleh kosong', 
                              'matches'         => '%s salah, silahkan ulangi lagi'));
            $valid->set_rules('email', 'Email', 'required|is_unique[member.email]', 
                  array(      'required'        => 'Form %s tidak boleh kosong', 
                              'is_unique'       => 'Email sudah digunakan, silahkan gunakan email lain'));
            $valid->set_rules('nomor_identitas', 'Nomor Identitas', 'required|is_unique[member.nomor_identitas]', 
                  array(      'required'        => 'Form %s tidak boleh kosong', 
                              'is_unique'       => '%s sudah digunakan, silahkan periksa kembali nomor identitas Anda.'));
            $valid->set_rules('tanggal_tmt','Tanggal SPMT','required|callback_check_tanggal',
                  array(      'required'        => 'Tanggal SPMT harus diisi'));

            if($valid->run()) {
            if(!empty($_FILES->file_tmt->name)) {
                  $config->upload_path        = './assets/upload/members/';
                  $config->allowed_types      = 'jpg|jpeg|png|gif|pdf';
                  $config->max_size           = '2400'; // KB
                  $config->encrypt_name       = TRUE;
                  $config->file_ext_tolower   = TRUE;
                  $this->load->library('upload', $config);

                  if(! $this->upload->do_upload('file_tmt')) {
                        $data = array(
                              'title'           => 'Pendaftaran Kemitraan',
                              'deskripsi'       => 'Pendaftaran '.$site->namaweb.' | '.$site->tagline.' '.$site->deskripsi,
                              'keywords'        => 'Pendaftaran '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
                              'provinsi'        => $provinsi,
                              'kabupaten'       => $kabupaten,
                              'kecamatan'       => $kecamatan,
                              'kampus'          => $kampus,
                              'gelombang'       => $gelombang,
                              'error'           => $this->upload->display_errors(),
                              'isi'             => 'peneliti/registrasi'
                        );
                        $this->load->view('layout/wrapper', $data, FALSE);
            }else{
                  $upload_data      = array('uploads' =>$this->upload->data());
                  
                  $i                = $this->input;

                  $aktivasi         = random_string('alnum',32).sha1($i->post('username'));
                  // NOMOR DAN KODE PUSKESMAS
                  $id_gelombang     = $i->post('id_gelombang');
                  $id_puskesmas     = $i->post('id_puskesmas');
                  $pkm              = $this->puskesmas_model->detail($id_puskesmas);
                  $kode_puskesmas   = $pkm->kode_puskesmas;
                  $detail_gelombang = $this->gelombang_model->detail($id_gelombang);
                  $counter_member   = $this->counter_member_model->gelombang($id_gelombang);
                  if($counter_member) {
                        $jumlah = $counter_member->jumlah+1;
                        $data2 = array(   'id_gelombang'    => $id_gelombang,
                                          'jumlah'          => $jumlah);
                        $this->counter_member_model->edit_gelombang($data2);
                  }else{
                        $jumlah = 1;
                        $jumlah = $counter_member->jumlah+1;
                        $data2 = array(   'id_gelombang'    => $id_gelombang,
                                          'jumlah'          => $jumlah);
                        $this->counter_member_model->tambah_gelombang($data2);
                  }
                  // Buat nomor otomatis
                  $jml              = $this->counter_member_model->gelombang($id_gelombang);
                  $tahun_gelombang  = $detail_gelombang->tahun;
                  // Periode
                  if($detail_gelombang->id_gelombang < 10) {
                        $id_periode       = '00'.$id_gelombang;
                  }elseif($detail_gelombang->id_gelombang < 100) {
                        $id_periode      = '0'.$id_gelombang;
                  }elseif($detail_gelombang->id_gelombang < 1000) {
                        $id_periode      = $id_gelombang;
                  }
                  // Nomor urut
                  if($jml->jumlah < 10) {
                        $nomor_urut       = '0000'.$jml->jumlah;
                  }elseif($jml->jumlah < 100) {
                        $nomor_urut       = '000'.$jml->jumlah;
                  }elseif($jml->jumlah < 1000) {
                        $nomor_urut      = '00'.$jml->jumlah;
                  }elseif($jml->jumlah < 10000) {
                        $nomor_urut      = '0'.$jml->jumlah;
                  }elseif($jml->jumlah < 100000) {
                        $nomor_urut      = $jml->jumlah;
                  }
                  $id_provinsi      = $i->post('id_provinsi');
                  // Nomor member
                  $nomor_member     = 'PUSDU'.$tahun_gelombang.$id_provinsi.$id_periode.$nomor_urut;
                  // END NOMOR DAN KODE PUSKESMAS

                  $data = array(
                        'akses_level'           => 'Users',
                        // 'status_akun'           => 'Pending',
                        'status_akun'           => 'Active',
                        'aktivasi'              => $aktivasi,
                        'username'              => $i->post('username'),
                        'email'                 => $i->post('email'),
                        'password'              => sha1($i->post('password')),
                        'status'                => $i->post('status'),
                        'nama'                  => $i->post('nama'),
                        'nomor_identitas'       => $i->post('nomor_identitas'),
                        'telepon'               => $i->post('telepon'),
                        'alamat'                => $i->post('alamat'),
                        'id_provinsi'           => $i->post('id_provinsi'),
                        'id_kabupaten'          => $i->post('id_kabupaten'),
                        'id_kecamatan'          => $i->post('id_kecamatan'),
                        'kode_puskesmas'        => $kode_puskesmas,
                        'id_puskesmas'          => $i->post('id_puskesmas'),
                        'id_gelombang'          => $i->post('id_gelombang'),
                        'nomor_member'          => $nomor_member,
                        'id_kampus'             => $i->post('id_kampus'),
                        'tanggal_tmt'           => date('Y-m-d', strtotime($i->post('tanggal_tmt'))),
                        'file_tmt'              => $upload_data->uploads->file_name,
                        'tanggal_daftar_akun'   => date('Y-m-d H:i:s')
                  );

                  $this->peneliti_model->tambah($data);
                  /* Kirim Email ke Pelanggan */
                  $this->load->library('email');
                  $nama       = $i->post('nama');
                  $email      = $i->post('email');
                  $subject    = 'Pendaftaran Online '.$site->namaweb.' - '.$site->tagline;
                  $pesan      = '<html>
                  <head>
                  <meta charset="utf-8">

                  <style>
                  body {
                        background-color: #EEE; 
                  }
                  tr,td,th {
                        border: solid thin gray;
                        border-collapse: collapse;
                        padding: 10px 20px;
                  }
                  section {
                        background-color: #FFF;
                        width: 600px;
                        padding: 20px;
                        margin 20px auto;
                  }
                  </style>
                  </head>

                  <body>
                  <section>
                  '.
                  '<p>Berikut adalah link aktivasi akun Anda:</p><hr>'.
                  '<p><a href="'. base_url('pendaftaran/aktivasi/'.$aktivasi) .'">Aktivasi Akun</a></p><hr>'.
                  '<p>Anda dapat menyalin kode ini: <strong>'.base_url('pendaftaran/aktivasi/'.$aktivasi).'</strong> lalu Buka alamat tersebut melalui Browser'.
                  '<p>'.nl2br($site->namaweb).'</p>'.
                  '</section></body></html>';

                  $name                   = $site->namaweb.' - '.$site->tagline;
                  $cemail                 = $email;
                  $message                = $pesan;
                  $config['protocol']     = 'smtp';
                  $config['smtp_host']    = 'ssl://mail.pusdu.com';
                  $config['smtp_port']    = '465';
                  $config['smtp_timeout'] = '7';
                  $config['smtp_user']    = 'contact@pusdu.com';
                  $config['smtp_pass']    = 'rasulullah';
                  $config['charset']      = 'utf-8';
                  $config['newline']      = "\r\n";
                  $config['mailtype']     = 'html'; // or html
                  $config['validation']   = FALSE;
               

                  $this->email->initialize($config);
                  $this->email->from($site->email,$name);
                  $this->email->to($email); 
                  $this->email->subject($subject);

                  $this->email->message($message);  
                  $this->email->send();
                  /* End kirim email */
                  $this->session->set_flashdata('sukses', 'Terima kasih, telah melakukan peneliti. Periksa email (atau folder SPAM email Anda) untuk melakukan aktivasi Akun Pendaftaran.');
                  redirect(base_url('masuk'),'refresh');
            }}else{
                  $i          = $this->input;
                  $aktivasi   = random_string('alnum',32).sha1($i->post('username'));

                  // NOMOR DAN KODE PUSKESMAS
                  $id_gelombang     = $i->post('id_gelombang');
                  $id_puskesmas     = $i->post('id_puskesmas');
                  $pkm              = $this->puskesmas_model->detail($id_puskesmas);
                  $kode_puskesmas   = $pkm->kode_puskesmas;
                  $detail_gelombang = $this->gelombang_model->detail($id_gelombang);
                  $counter_member   = $this->counter_member_model->gelombang($id_gelombang);
                  if($counter_member) {
                        $jumlah = $counter_member->jumlah+1;
                        $data2 = array(   'id_gelombang'    => $id_gelombang,
                                          'jumlah'          => $jumlah);
                        $this->counter_member_model->edit_gelombang($data2);
                  }else{
                        $jumlah = 1;
                        $jumlah = $counter_member->jumlah+1;
                        $data2 = array(   'id_gelombang'    => $id_gelombang,
                                          'jumlah'          => $jumlah);
                        $this->counter_member_model->tambah_gelombang($data2);
                  }
                  // Buat nomor otomatis
                  $jml              = $this->counter_member_model->gelombang($id_gelombang);
                  $tahun_gelombang  = $detail_gelombang->tahun;
                  // Periode
                  if($detail_gelombang->id_gelombang < 10) {
                        $id_periode       = '00'.$id_gelombang;
                  }elseif($detail_gelombang->id_gelombang < 100) {
                        $id_periode      = '0'.$id_gelombang;
                  }elseif($detail_gelombang->id_gelombang < 1000) {
                        $id_periode      = $id_gelombang;
                  }
                  // Nomor urut
                  if($jml->jumlah < 10) {
                        $nomor_urut       = '0000'.$jml->jumlah;
                  }elseif($jml->jumlah < 100) {
                        $nomor_urut       = '000'.$jml->jumlah;
                  }elseif($jml->jumlah < 1000) {
                        $nomor_urut      = '00'.$jml->jumlah;
                  }elseif($jml->jumlah < 10000) {
                        $nomor_urut      = '0'.$jml->jumlah;
                  }elseif($jml->jumlah < 100000) {
                        $nomor_urut      = $jml->jumlah;
                  }
                  $id_provinsi      = $i->post('id_provinsi');
                  // Nomor member
                  $nomor_member     = 'PUSDU'.$tahun_gelombang.$id_provinsi.$id_periode.$nomor_urut;
                  // END NOMOR DAN KODE PUSKESMAS

                  $data = array(
                        'akses_level'           => 'Users',
                        // 'status_akun'           => 'Pending',
                        'status_akun'           => 'Active',
                        'aktivasi'              => $aktivasi,
                        'username'              => $i->post('username'),
                        'email'                 => $i->post('email'),
                        'password'              => sha1($i->post('password')),
                        'status'                => $i->post('status'),
                        'nama'                  => $i->post('nama'),
                        'nomor_identitas'       => $i->post('nomor_identitas'),
                        'telepon'               => $i->post('telepon'),
                        'alamat'                => $i->post('alamat'),
                        'id_provinsi'           => $i->post('id_provinsi'),
                        'id_kabupaten'          => $i->post('id_kabupaten'),
                        'id_kecamatan'          => $i->post('id_kecamatan'),
                        'id_puskesmas'          => $i->post('id_puskesmas'),
                        'kode_puskesmas'        => $kode_puskesmas,
                        'id_gelombang'          => $i->post('id_gelombang'),
                        'nomor_member'          => $nomor_member,
                        'id_kampus'             => $i->post('id_kampus'),
                        'tanggal_tmt'           => $i->post('tanggal_tmt'),
                        'tanggal_daftar_akun'   => date('Y-m-d H:i:s')
                  );
                  $this->peneliti_model->tambah($data);
                  /* Kirim Email ke Pelanggan */
                  $this->load->library('email');
                  $nama       = $i->post('nama');
                  $email      = $i->post('email');
                  $subject    = 'Pendaftaran Online '.$site->namaweb.' - '.$site->tagline;
                  $pesan      = '<html>
                  <head>
                  <meta charset="utf-8">

                  <style>
                  body {
                        background-color: #EEE; 
                  }
                  tr,td,th {
                        border: solid thin gray;
                        border-collapse: collapse;
                        padding: 10px 20px;
                  }
                  section {
                        background-color: #FFF;
                        width: 600px;
                        padding: 20px;
                        margin 20px auto;
                  }
                  </style>
                  </head>

                  <body>
                  <section>
                  '.
                  '<p>Berikut adalah link aktivasi akun Anda:</p><hr>'.
                  '<p><a href="'. base_url('pendaftaran/aktivasi/'.$aktivasi) .'">Aktivasi Akun</a></p><hr>'.
                  '<p>Anda dapat menyalin kode ini: <strong>'.base_url('pendaftaran/aktivasi/'.$aktivasi).'</strong> lalu Buka alamat tersebut melalui Browser'.
                  '<p>'.nl2br($site->namaweb).'</p>'.
                  '</section></body></html>';

                  $name                   = $site->namaweb.' - '.$site->tagline;
                  $cemail                 = $email;
                  $message                = $pesan;
                  $config['protocol']     = 'smtp';
                  $config['smtp_host']    = 'ssl://mail.pusdu.com';
                  $config['smtp_port']    = '465';
                  $config['smtp_timeout'] = '7';
                  $config['smtp_user']    = 'contact@pusdu.com';
                  $config['smtp_pass']    = 'rasulullah';
                  $config['charset']      = 'utf-8';
                  $config['newline']      = "\r\n";
                  $config['mailtype']     = 'html'; // or html
                  $config['validation']   = FALSE;

                  $this->email->initialize($config);
                  $this->email->from($site->email,$name);
                  $this->email->to($email); 
                  $this->email->subject($subject);

                  $this->email->message($message);  
                  $this->email->send();
                  /* End kirim email */
                 $this->session->set_flashdata('sukses', 'Terima kasih, telah melakukan peneliti. Periksa email (atau folder SPAM email Anda) untuk melakukan aktivasi Akun Pendaftaran.');
                  redirect(base_url('masuk'),'refresh');
            }}
            // End masuk database
            $data = array(    'title'           => 'Pendaftaran Online',
                              'deskripsi'       => 'Pendaftaran '.$site->namaweb.' | '.$site->tagline.' '.$site->deskripsi,
                              'keywords'        => 'Pendaftaran '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
                              'provinsi'        => $provinsi,
                              'kabupaten'       => $kabupaten,
                              'kecamatan'       => $kecamatan,
                              'kampus'          => $kampus,
                              'gelombang'       => $gelombang,
                              'isi'             => 'peneliti/registrasi'
                              );
            $this->load->view('layout/wrapper', $data, FALSE);
	}

      // Puskesmas
      public function puskesmas($id_kecamatan)
      {
            $puskesmas = $this->puskesmas_model->puskesmas($id_kecamatan);
           $id_puskesmas = $this->input->post('id_puskesmas');
            echo '<select name="id_puskesmas" class="form-control" id="id_puskesmas">
                  <option value="">Pilih Puskesmas</option>';
             foreach($puskesmas as $puskesmas) {
                      echo '<option value="'.$puskesmas->id_puskesmas.'">'.$puskesmas->kode_puskesmas.' - '.$puskesmas->nama_puskesmas.'</option>';
            }
            echo '</select>';
      }

      // Check tanggal
      function check_tanggal() {
            // $mulai            = date("2011-06-01");
            $gelombang        = $this->gelombang_model->home();
            $tanggal_tmt      = $this->input->post('tanggal_tmt');
            $mulai            = date($gelombang->tmt_minimal);
            $akhir            = date($gelombang->tmt_maksimal);

            $awal             = new DateTime($mulai);
            $tmt              = new DateTime($tanggal_tmt);

            if ($tmt >= $awal && $tmt <= $akhir) {
                  $this->form_validation->set_message('check_tanggal', 'Tanggal SPMT Anda melebihi 5 tahun terhitung pada bulan Juni 2016 '.$this->input->post('tanggal_tmt'));
                  // echo 'OK';
                  return FALSE;
            }else{
                  return TRUE;
                  // echo 'AKU';
            }
      }

      // Sukses
      public function sukses()
      {
            $site       = $this->konfigurasi_model->listing();
            $data = array(
                  'title'           => 'Pendaftaran Online',
                  'site'            => $site,
                  'deskripsi'       => 'Pendaftaran '.$site->namaweb.' | '.$site->tagline.' '.$site->deskripsi,
                  'keywords'        => 'Pendaftaran '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
                  'isi'             => 'peneliti/sukses'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
      }

      // Aktivasi akun
      public function aktivasi($key='')
      { 
            if($key == "")
            {
                  show_404();
            }
            $aktivasi = $this->peneliti_model->aktivasi($key);
            $this->session->set_flashdata('sukses', 'Terima kasih, telah melakukan aktivasi akun. Silahkan login untuk melanjutkan pengisiian data persyaratan peneliti.');
            redirect(base_url('masuk'),'refresh');
      }
}

/* End of file Contact.php */
/* Location: ./application/controllers/Pendaftaran.php */