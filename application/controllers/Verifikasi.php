<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_verifikasi');
	}

	public function index()
	{
		$data['page']="verifikasi";
		$data['content']= $this->m_verifikasi->show_all();
		$this->load->view('template', $data);

		// echo json_encode($this->m_verifikasi->show_all());
	}

	public function accept($a)
	{
		if ($this->m_verifikasi->accept($a)) {
			$this->session->set_flashdata('pesan', 'Pembayaran  Berhasil Terverifikasi');
			redirect('verifikasi','refresh');
		}else{
			$this->session->set_flashdata('warn', 'Pembayaran Gagal Terverifikasi');
			redirect('verifikasi','refresh');
		}
	}
	public function reject($a)
	{
		if ($this->m_verifikasi->reject($a)) {
			$this->session->set_flashdata('pesan', 'Pembayaran  Berhasil Direject');
			redirect('verifikasi','refresh');
		}else{
			$this->session->set_flashdata('warn', 'Pembayaran Gagal Direject');
			redirect('verifikasi','refresh');
		}
	}
}

/* End of file Verifikasi.php */
/* Location: ./application/controllers/Verifikasi.php */