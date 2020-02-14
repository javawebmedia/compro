<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_galeri_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('kategori_galeri');
		$this->db->order_by('id_kategori_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_kategori_galeri) {
		$this->db->select('*');
		$this->db->from('kategori_galeri');
		$this->db->where('id_kategori_galeri',$id_kategori_galeri);
		$this->db->order_by('id_kategori_galeri','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function read($slug_kategori_galeri) {
		$this->db->select('*');
		$this->db->from('kategori_galeri');
		$this->db->where('slug_kategori_galeri',$slug_kategori_galeri);
		$this->db->order_by('id_kategori_galeri','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('kategori_galeri',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_kategori_galeri',$data['id_kategori_galeri']);
		$this->db->update('kategori_galeri',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_kategori_galeri',$data['id_kategori_galeri']);
		$this->db->delete('kategori_galeri',$data);
	}
}

/* End of file Kategori_galeri_model.php */
/* Location: ./application/models/Kategori_galeri_model.php */