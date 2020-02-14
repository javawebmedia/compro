<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->model('kunjungan_model');
	}

	// Kunjungan
	public function counter($alamat_kunjungan)
	{
		date_default_timezone_set('Asia/Jakarta');
		if($this->CI->uri->segment(1) == "admin" || $this->CI->uri->segment(1) == "assets") {

		}else{ 
			$data_kunjungan = array(	'alamat'		=> $alamat_kunjungan,
										'ip_address'	=> $this->CI->input->ip_address(),
										'hari'			=> date('Y-m-d'),
										'waktu'			=> date('Y-m-d H:i:s')
						);
			$this->CI->kunjungan_model->tambah($data_kunjungan);
		}
	}

}

/* End of file Kunjungan.php */
/* Location: ./application/libraries/Kunjungan.php */
