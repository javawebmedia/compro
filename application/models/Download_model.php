<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('download.*, kategori_download.nama_kategori_download, users.nama');
		$this->db->from('download');
		// Join dg 2 tabel
		$this->db->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
		$this->db->join('users','users.id_user = download.id_user','LEFT');
		// End join
		$this->db->order_by('id_download','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function populer() {
		$this->db->select('*');
		$this->db->from('download');
		$this->db->order_by('hits','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function slider() {
		$this->db->select('download.*, kategori_download.nama_kategori_download, users.nama');
		$this->db->from('download');
		// Join dg 2 tabel
		$this->db->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
		$this->db->join('users','users.id_user = download.id_user','LEFT');
		// End join
		$this->db->where('jenis_download','Homepage');
		$this->db->order_by('id_download','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function download() {
		$this->db->select('download.*, kategori_download.nama_kategori_download, users.nama, 
						kategori_download.slug_kategori_download');
		$this->db->from('download');
		// Join dg 2 tabel
		$this->db->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
		$this->db->join('users','users.id_user = download.id_user','LEFT');
		// End join
		$this->db->where('jenis_download','Download');
		$this->db->order_by('id_download','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function total() {
		$this->db->select('download.*, kategori_download.nama_kategori_download, users.nama');
		$this->db->from('download');
		// Join dg 2 tabel
		$this->db->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
		$this->db->join('users','users.id_user = download.id_user','LEFT');
		// End join
		$this->db->where('jenis_download','Download');
		$this->db->order_by('id_download','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Kategori
	public function kategori($id_kategori_download) {
		$this->db->select('download.*, kategori_download.nama_kategori_download, users.nama, 
						kategori_download.slug_kategori_download');
		$this->db->from('download');
		// Join dg 2 tabel
		$this->db->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download');
		$this->db->join('users','users.id_user = download.id_user','LEFT');
		// End join
		$this->db->where(array(	'jenis_download'				=> 'Download',
								'download.id_kategori_download'	=> $id_kategori_download));
		$this->db->order_by('id_download','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_download) {
		$this->db->select('*');
		$this->db->from('download');
		$this->db->where('id_download',$id_download);
		$this->db->order_by('id_download','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('download',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_download',$data['id_download']);
		$this->db->update('download',$data);
	}

	// Edit
	public function edit2($data2) {
		$this->db->where('id_download',$data2['id_download']);
		$this->db->update('download',$data2);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_download',$data['id_download']);
		$this->db->delete('download',$data);
	}
}

/* End of file Download_model.php */
/* Location: ./application/models/Download_model.php */