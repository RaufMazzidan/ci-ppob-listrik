<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {

	public function index()
	{
		$data['page']="Dash";
		$this->load->view('template', $data);
	}
	

}

/* End of file C_Dash.php */
/* Location: ./application/controllers/C_Dash.php */