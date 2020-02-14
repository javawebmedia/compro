<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        date_default_timezone_set("Asia/Jakarta");
	}

	

}

/* End of file Waktu.php */
/* Location: ./application/libraries/Waktu.php */
