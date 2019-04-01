<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
	}

	public function index()
	{
		$data['content']= $this->m_laporan->show_all();
		$data['page']= "laporan";
		$this->load->view('template', $data);
	}
	public function download()
	{
		$data['content']= $this->m_laporan->show_all();
		$data['page']= "laporan_down";
		$this->load->view('pdf', $data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */