<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
	}

	// Sitename
	public function namaweb()
	{
		$site = $this->CI->konfigurasi_model->listing();
		return $site->namaweb;
	}

	// Alamat
	public function logo()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$logo 	= base_url('assets/upload/image/'.$site->logo);
		return $logo;
	}

	// Alamat
	public function icon()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$icon 	= base_url('assets/upload/image/'.$site->icon);
		return $icon;
	}

	// Romawi
	public function romawi($bulan)
	{
		if($bulan=='01') {
			$romawi = 'I';
		}elseif($bulan=='02') {
			$romawi = 'II';
		}elseif($bulan=='03') {
			$romawi = 'III';
		}elseif($bulan=='04') {
			$romawi = 'IV';
		}elseif($bulan=='05') {
			$romawi = 'V';
		}elseif($bulan=='06') {
			$romawi = 'VI';
		}elseif($bulan=='07') {
			$romawi = 'VII';
		}elseif($bulan=='08') {
			$romawi = 'VIII';
		}elseif($bulan=='09') {
			$romawi = 'IX';
		}elseif($bulan=='10') {
			$romawi = 'X';
		}elseif($bulan=='11') {
			$romawi = 'XI';
		}elseif($bulan=='12') {
			$romawi = 'XII';
		}
		return $romawi;
	}

}

/* End of file Website.php */
/* Location: ./application/libraries/Website.php */
