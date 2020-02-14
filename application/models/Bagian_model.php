<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian_model extends CI_Model {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->order_by('id_bagian', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('bagian');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	public function detail($id_bagian)
	{
		$this->db->select('*');
		$this->db->from('bagian');
		// where
		$this->db->where('id_bagian', $id_bagian);
		$this->db->order_by('id_bagian', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('bagian', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_bagian', $data['id_bagian']);
		$this->db->update('bagian', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_bagian', $data['id_bagian']);
		$this->db->delete('bagian', $data);
	}
}

/* End of file Bagian_model.php */
/* Location: ./application/models/Bagian_model.php */