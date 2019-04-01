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
			$data['page'] = "tarif";
			$data['content'] = $this->m_tarif->show_all();
			$this->load->view('template', $data);
		}

		public function create()
		{
			$this->form_validation->set_rules('daya', 'Daya', 'trim|required|numeric');
			$this->form_validation->set_rules('kwh', 'Tarif PerKWH', 'trim|required|numeric');
			if ($this->form_validation->run() == TRUE) {
				if ($this->m_tarif->create()) {
					$this->session->set_flashdata('pesan', 'Create Tarif Berhasil');
					redirect('tarif','refresh');
				}else{
					$this->session->set_flashdata('warn', 'Create Tarif Gagal');
					redirect('tarif','refresh');
				}
			} 
			else {
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
			$this->form_validation->set_rules('u_daya', 'Daya', 'trim|required|numeric');
			$this->form_validation->set_rules('u_kwh', 'Tarif PerKWH', 'trim|required|numeric');
			if ($this->form_validation->run() == TRUE) {
				if ($this->m_tarif->edit()) {
					$this->session->set_flashdata('pesan_tab', 'Update Tarif Berhasil');
					redirect('tarif','refresh');
				}else{
					$this->session->set_flashdata('warn_tab', 'Update Tarif Gagal');
					redirect('tarif','refresh');
				}
			} 
			else {
				$this->session->set_flashdata('warn_tab', validation_errors());
				redirect('tarif','refresh');
			}
		}

		public function delete($a)
		{
			if ($this->m_tarif->delete($a)) {
				$this->session->set_flashdata('pesan_tab', 'Delete Tarif Berhasil');
				redirect('tarif','refresh');
			}else{
				$this->session->set_flashdata('warn_tab', 'Delete Tarif Gagal');
				redirect('tarif','refresh');
			}
		}

	}

	/* End of file Tarif.php */
	/* Location: ./application/controllers/Tarif.php */