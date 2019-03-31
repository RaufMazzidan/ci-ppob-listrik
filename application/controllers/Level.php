<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_level');
	}

	public function index()
	{
		$data['page']="level";
		$data['content']= $this->m_level->show_all();
		$this->load->view('template', $data);
	}
	public function create()
	{
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->m_level->create()) {
				$this->session->set_flashdata('pesan', 'Create Level Berhasil');
				redirect('level','refresh');
			}else{
				$this->session->set_flashdata('warn', 'Create Level Gagal');
				redirect('level','refresh');
			}
		}
		else{
			$this->session->set_flashdata('warn', validation_errors());
			redirect('level','refresh');
		}
	}
	public function get_data($a)
	{
		$data = $this->m_level->get_data($a);
		echo json_encode($data);
	}
	public function edit()
	{
		if ($this->m_level->edit()) {
			$this->session->set_flashdata('pesan_del', 'Edit Level Berhasil');
			redirect('level','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Edit Level Gagal');
			redirect('level','refresh');
		}
	}
	public function delete($a)
	{
		if ($this->m_level->delete($a)) {
			$this->session->set_flashdata('pesan_del', 'Delete Level Berhasil');
			redirect('level','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Delete Level Gagal');
			redirect('level','refresh');
		}
	}

}

/* End of file level.php */
/* Location: ./application/controllers/level.php */