<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		$this->load->model('perkenalan_model');
		$this->load->model('client_model');
		$this->load->model('template_perkenalan_model');
		$this->load->model('staff_model');
		$this->load->model('nomor_surat_model');
	}

	public function index()
	{
		
	}

	// Unduh
	public function unduh($id_perkenalan)
	{
		$perkenalan = $this->perkenalan_model->detail($id_perkenalan);
		$site 		= $this->konfigurasi_model->listing();
		$id_template_perkenalan = $perkenalan->id_template_perkenalan;
		$template_perkenalan 	= $this->template_perkenalan_model->detail($id_template_perkenalan);
		$data = array(	'title'			=> 'Cetak Surat '.$perkenalan->perihal,
						'perkenalan'	=> $perkenalan,
						'template_perkenalan'	=> $template_perkenalan,
						'site'			=> $site,
					);
		// $this->load->view('admin/perkenalan/cetak', $data, FALSE);
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->SetHTMLHeader('
				<div style="text-align: left; font-weight: bold;font-family: Arial; color: #1ac6ff;padding-bottom: 5px;">
				    <img src="'.base_url('assets/upload/image/'.$site->logo).'" style="max-height: 40px; width: auto;">
				</div>');
		$mpdf->SetHTMLFooter('
				<div style="text-align: center; font-weight: bold;font-family: Arial; color: #1ac6ff;padding-top: 5px;">
				    '.$site->namaweb.'
				</div>');
	    $html = $this->load->view('admin/perkenalan/cetak', $data, true);
	    $mpdf->WriteHTML($html);
	    // $mpdf->Output(); 
	    $nama_file = url_title($perkenalan->perihal,'dash',true).'-'.time();
	    $mpdf->Output($nama_file.'.pdf','D');
	}

}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */