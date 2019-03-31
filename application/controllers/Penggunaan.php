<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penggunaan');
		$this->load->model('m_pelanggan');
	}

	public function index()
	{
		$data['page']= "Penggunaan";
		$data['content']= $this->m_pelanggan->show_all();
		$this->load->view('template', $data);
	}

	public function create()
	{
		// $this->form_validation->set_rules('u_metera', 'Mi', 'trim|required|min_length[5]|max_length[12]');
		if ($this->m_penggunaan->cek_penggunaan() == FALSE) {
			if ($this->m_penggunaan->create()) {
				$this->session->set_flashdata('pesan', 'Create Penggunaan Berhasil');
				redirect('penggunaan','refresh');
			}else{
				$this->session->set_flashdata('warn', 'Create Penggunaan Gagal');
				redirect('penggunaan','refresh');
			}
		}else{
			$this->session->set_flashdata('warn', 'Penggunaan Sudah Ada');
				redirect('penggunaan','refresh');
		}
	}

	public function detail($a)
	{
		$data['page']= "Penggunaan_Detail";
		$data['content']= $this->m_penggunaan->detail($a);
		$this->load->view('template', $data);
	}

	public function tagihan($a)
	{
		$data['page']= "Tagihan";
		$data['content']= $this->m_penggunaan->tagihan($a);
		$this->load->view('template', $data);
	}
	
	public function delete($a,$b)
	{
		if ($this->m_penggunaan->delete($a)) {
			$this->session->set_flashdata('pesan_del', 'Delete Penggunaan Berhasil');
			redirect('penggunaan/detail/'.$b.'','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Delete Penggunaan Gagal');
			redirect('penggunaan/detail/'.$b.'','refresh');
		}
	}
}

/* End of file Penggunaan.php */
/* Location: ./application/controllers/Penggunaan.php */