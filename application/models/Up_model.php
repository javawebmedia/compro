<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Up_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing($id_client = FALSE)
	{
		$this->db->select('*');
		$this->db->from('up');
		if($id_client !== FALSE) {
            $this->db->where('id_client', $id_client);
        }
		$this->db->order_by('id_up', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total($id_client = FALSE)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('up');
		if($id_client !== FALSE) {
            $this->db->where('id_client', $id_client);
        }
		$this->db->order_by('id_up', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	// Listing
	public function detail($id_up)
	{
		$this->db->select('*');
		$this->db->from('up');
		$this->db->where('id_up', $id_up);
		$this->db->order_by('id_up', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah insert data
	public function tambah($data)
	{
		$this->db->insert('up',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_up',$data['id_up']);
		$this->db->update('up',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_up',$data['id_up']);
		$this->db->delete('up',$data);
	} 
}

/* End of file Up_model.php */
/* Location: ./application/models/Up_model.php */