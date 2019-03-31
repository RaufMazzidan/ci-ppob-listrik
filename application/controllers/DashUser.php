<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashUser extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penggunaan');
	}

	public function index()
	{
		$data['page']= "DashUser";
		$data['content']= $this->m_penggunaan->tagihan($this->session->userdata('id_pelanggan'));
		$this->load->view('template', $data);
	}

}

/* End of file DashUser.php */
/* Location: ./application/controllers/DashUser.php */