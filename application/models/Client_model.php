<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing($jenis_client = FALSE)
	{
		$this->db->select('*');
		$this->db->from('client');
		if($jenis_client !== FALSE) {
            $this->db->where('jenis_client', $jenis_client);
        }
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total($jenis_client = FALSE)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('client');
		if($jenis_client !== FALSE) {
            $this->db->where('jenis_client', $jenis_client);
        }
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	// Listing
	public function detail($id_client)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('id_client', $id_client);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah insert data
	public function tambah($data)
	{
		$this->db->insert('client',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_client',$data['id_client']);
		$this->db->update('client',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_client',$data['id_client']);
		$this->db->delete('client',$data);
	} 
}

/* End of file Client_model.php */
/* Location: ./application/models/Client_model.php */