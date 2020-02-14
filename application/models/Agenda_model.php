<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();	
	}
	
	// Listing
	public function home() {
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->order_by('mulai','DESC');
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}
	
	// Panggil per item dan listing
	public function listing_agenda($id_agenda = FALSE) {
	if ($id_agenda === FALSE)	{
		$query = $this->db->query('SELECT * FROM agenda ORDER BY id_agenda DESC');
		return $query->result_array();
	}
	$query = $this->db->get_where('agenda', array('id_agenda' => $id_agenda));
	return $query->row_array();
	}
	
	// Add new User
	public function tambah($data) {
		return $this->db->insert('agenda', $data);
	}
	
	// Edit agenda
	public function edit($data) {
		$this->db->where('id_agenda', $data['id_agenda']);
		return $this->db->update('agenda', $data);
	}

	// Delete agenda
	public function delete($data) {
		$this->db->where('id_agenda', $data['id_agenda']);
		return $this->db->delete('agenda', $data);
	}
	
	// Listing data
	public function get_agenda($limit, $start) {
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->limit($limit, $start);
		$this->db->order_by('mulai','desc');
		
		$q = $this->db->get();
		
		if($q->num_rows() > 0) {
			return $q->result();
		}else{
			return false;
		}
	}
	
	
	// Total agenda
	public function total_agenda() {
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->order_by('id_agenda','desc');
		
		$q = $this->db->get();
		
		if($q->num_rows() > 0) {
			return $q->num_rows();
		}else{
			return false;
		}
	}
	
	// Agenda Internal
	public function agenda_internal($id_agenda = FALSE) {
	if ($id_agenda === FALSE)	{
		$query = $this->db->query('SELECT * FROM agenda WHERE jenis_agenda = "Internal" ORDER BY id_agenda DESC LIMIT 5');
		return $query->result_array();
	}
	$query = $this->db->get_where('agenda', array('id_agenda' => $id_agenda));
	return $query->row_array();
	}
	
	// Agenda Eksternal
	public function agenda_eksternal($id_agenda = FALSE) {
	if ($id_agenda === FALSE)	{
		$query = $this->db->query('SELECT * FROM agenda WHERE jenis_agenda = "External" ORDER BY id_agenda DESC LIMIT 3');
		return $query->result_array();
	}
	$query = $this->db->get_where('agenda', array('id_agenda' => $id_agenda));
	return $query->row_array();
	}
	
	// Daftar agenda 
	public function data_agenda($jenis) {
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->order_by('id_agenda','DESC LIMIT 15');
		$this->db->where(array('jenis_agenda'=>$jenis));
		$query = $this->db->get();
		return $query->result_array();
	}
		
	
}