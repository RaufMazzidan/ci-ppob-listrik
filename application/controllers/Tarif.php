<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tarif');
	}

	public function index()
	{
		$data['page']="Tarif";
		$data['content']= $this->m_tarif->show_all();
		$this->load->view('template', $data);
	}
	public function create()
	{
		$this->form_validation->set_rules('daya', 'Daya', 'trim|required');
		$this->form_validation->set_rules('kwh', 'Harga Per-KWH', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->m_tarif->create()) {
				$this->session->set_flashdata('pesan', 'Create Tarif Berhasil');
				redirect('tarif','refresh');
			}else{
				$this->session->set_flashdata('warn', 'Create Tarif Gagal');
				redirect('tarif','refresh');
			}
		}
		else{
			$this->session->set_flashdata('warn', validation_errors());
			redirect('tarif','refresh');
		}
	}
	public function get_data($a)
	{
		$data = $this->m_tarif->get_data($a);
		echo json_encode($data);
	}
	public function edit()
	{
		if ($this->m_tarif->edit()) {
			$this->session->set_flashdata('pesan_del', 'Edit Tarif Berhasil');
			redirect('tarif','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Edit Tarif Gagal');
			redirect('tarif','refresh');
		}
	}
	public function delete($a)
	{
		if ($this->m_tarif->delete($a)) {
			$this->session->set_flashdata('pesan_del', 'Delete Tarif Berhasil');
			redirect('tarif','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Delete Tarif Gagal');
			redirect('tarif','refresh');
		}
	}

}

/* End of file Tarif.php */
/* Location: ./application/controllers/Tarif.php */