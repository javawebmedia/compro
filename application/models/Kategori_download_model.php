<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_download_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('kategori_download');
		$this->db->order_by('id_kategori_download','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_kategori_download) {
		$this->db->select('*');
		$this->db->from('kategori_download');
		$this->db->where('id_kategori_download',$id_kategori_download);
		$this->db->order_by('id_kategori_download','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function read($slug_kategori_download) {
		$this->db->select('*');
		$this->db->from('kategori_download');
		$this->db->where('slug_kategori_download',$slug_kategori_download);
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('kategori_download',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_kategori_download',$data['id_kategori_download']);
		$this->db->update('kategori_download',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_kategori_download',$data['id_kategori_download']);
		$this->db->delete('kategori_download',$data);
	}
}

/* End of file Kategori_download_model.php */
/* Location: ./application/models/Kategori_download_model.php */