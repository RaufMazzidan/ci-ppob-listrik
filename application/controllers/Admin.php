<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_level');

	}

	public function auth()
	{
		$this->load->view('Auth_Admin');
	}

	public function login()
	 {
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->m_admin->login()->num_rows() > 0) {
				$data =$this->m_admin->login()->row();

				$array = array(
					'login' =>TRUE , 
					'id_admin' => $data->id_admin,
					'nama' => $data->nama_admin,
					'username' => $data->username,
					'level' => $data->level,
				);

				$this->session->set_userdata( $array );
				redirect('Dash','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Username Atau Password Salah');
				redirect('admin/auth','refresh');
			}
		} 
		else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('admin/auth','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/auth','refresh');
	}

	// CRUD

	public function index()
	{
		$data['page']= "Admin";
		$data['level']= $this->m_level->show_all();
		$data['content']= $this->m_admin->show_all();
		$this->load->view('template', $data);
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		// $this->form_validation->set_rules('id_level', 'Level', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->m_admin->create()) {
				$this->session->set_flashdata('pesan', 'Create Admin Berhasil');
				redirect('admin','refresh');
			}else{
				$this->session->set_flashdata('warn', 'Create Admin Gagal');
				redirect('admin','refresh');
			}
		}
		else{
			$this->session->set_flashdata('warn', validation_errors());
			redirect('admin','refresh');
		}
	}
	public function get_data($a)
	{
		$data = $this->m_admin->get_data($a);
		echo json_encode($data);
	}
	public function edit()
	{
		if ($this->m_admin->edit()) {
			$this->session->set_flashdata('pesan_del', 'Edit Admin Berhasil');
			redirect('admin','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Edit Admin Gagal');
			redirect('admin','refresh');
		}
	}
	public function delete($a)
	{
		if ($this->m_admin->delete($a)) {
			$this->session->set_flashdata('pesan_del', 'Delete Admin Berhasil');
			redirect('admin','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Delete Admin Gagal');
			redirect('admin','refresh');
		}
	}


}

/* End of file C_Admin.php */
/* Location: ./application/controllers/C_Admin.php */