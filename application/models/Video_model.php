<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing
	public function home() {
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by('id_video','DESC');
		$this->db->order_by('urutan','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing semua
	public function video($limit,$start) {
		$this->db->select('*');
		$this->db->from('video');
		$this->db->limit($limit, $start);
		$this->db->order_by('id_video','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing semua
	public function total_video() {
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by('id_video','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}	

	// Listing semua
	public function total() {
		$this->db->select('COUNT(*) AS total');
		$this->db->from('video');
		$this->db->order_by('id_video','DESC');
		$query = $this->db->get();
		return $query->row();
	}	
	
	// Detail
	public function detail($id_video) {
		$this->db->select('*');
		$this->db->from('video');
		$this->db->where('id_video',$id_video);
		$this->db->order_by('id_video','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('video',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_video',$data['id_video']);
		$this->db->update('video',$data);
	}
	
	// Check delete
	public function check($id_video) {
		$query = $this->db->get_where('produk',array('id_video' => $id_video));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_video',$data['id_video']);
		$this->db->delete('video',$data);
	}
}