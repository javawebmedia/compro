<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->order_by('id_konfigurasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Detail
	public function detail($id_konfigurasi) {
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->where('id_konfigurasi',$id_konfigurasi);
		$this->db->order_by('id_konfigurasi','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('konfigurasi',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_konfigurasi',$data['id_konfigurasi']);
		$this->db->update('konfigurasi',$data);
	}
	
	// Check delete
	public function check($id_konfigurasi) {
		$query = $this->db->get_where('produk',array('id_konfigurasi' => $id_konfigurasi));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_konfigurasi',$data['id_konfigurasi']);
		$this->db->delete('konfigurasi',$data);
	}
}