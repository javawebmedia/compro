<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_staff_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('kategori_staff');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_kategori_staff) {
		$this->db->select('*');
		$this->db->from('kategori_staff');
		$this->db->where('id_kategori_staff',$id_kategori_staff);
		$this->db->order_by('id_kategori_staff','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function read($slug_kategori_staff) {
		$this->db->select('*');
		$this->db->from('kategori_staff');
		$this->db->where('slug_kategori_staff',$slug_kategori_staff);
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('kategori_staff',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_kategori_staff',$data['id_kategori_staff']);
		$this->db->update('kategori_staff',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_kategori_staff',$data['id_kategori_staff']);
		$this->db->delete('kategori_staff',$data);
	}
}

/* End of file Kategori_staff_model.php */
/* Location: ./application/models/Kategori_staff_model.php */