<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	// Tambah
	public function tambah($data_kunjungan)
	{
		$this->db->insert('kunjungan',$data_kunjungan);
	}

	// Tambah
	public function data_log($data_log)
	{
		$this->db->insert('user_log',$data_log);
	}

	// Laporan harian
	public function harian()
	{
		$sekarang = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('kunjungan');
		$this->db->where('hari',$sekarang);
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan bulanan
	public function bulanan()
	{
		$sekarang = date('Y-m');
		$this->db->select('*');
		$this->db->from('kunjungan');
		$this->db->where('SUBSTR(hari,1,7)',$sekarang);
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan bulanan
	public function tahunan()
	{
		$sekarang = date('Y');
		$this->db->select('*');
		$this->db->from('kunjungan');
		$this->db->where('SUBSTR(hari,1,4)',$sekarang);
		$query = $this->db->get();
		return $query->result();
	}
	

}

/* End of file Kunjungan_model.php */
/* Location: ./application/models/Kunjungan_model.php */