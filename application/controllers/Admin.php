	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_admin');
			$this->load->model('m_level');
		}

		public function index()
		{
			$data['page'] = "admin";
			$data['content'] = $this->m_admin->show_all();
			$data['level'] = $this->m_level->show_all();
			$this->load->view('template', $data);
		}

		public function create()
		{
			$this->form_validation->set_rules('nama', 'Nama Admin', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->m_admin->create()) {
					$this->session->set_flashdata('pesan', 'Create Admin Berhasil');
					redirect('admin','refresh');
				}else{
					$this->session->set_flashdata('warn', 'Create Admin Gagal');
					redirect('admin','refresh');
				}
			} 
			else {
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
			$this->form_validation->set_rules('u_nama', 'Nama Admin', 'trim|required');
			$this->form_validation->set_rules('u_username', 'Username', 'trim|required');
			$this->form_validation->set_rules('u_password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->m_admin->edit()) {
					$this->session->set_flashdata('pesan_tab', 'Update Admin Berhasil');
					redirect('admin','refresh');
				}else{
					$this->session->set_flashdata('warn_tab', 'Update Admin Gagal');
					redirect('admin','refresh');
				}
			} 
			else {
				$this->session->set_flashdata('warn_tab', validation_errors());
				redirect('admin','refresh');
			}
		}

		public function delete($a)
		{
			if ($this->m_admin->delete($a)) {
				$this->session->set_flashdata('pesan_tab', 'Delete Admin Berhasil');
				redirect('admin','refresh');
			}else{
				$this->session->set_flashdata('warn_tab', 'Delete Admin Gagal');
				redirect('admin','refresh');
			}
		}

		public function signin()
		{
			$this->load->view('signin_admin');
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
					redirect('admin/signin','refresh');
				}
			} 
			else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('admin/signin','refresh');
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('admin/signin','refresh');
		}
		public function signup()
		{
			$data['level'] = $this->m_level->show_all();
			$this->load->view('signup_admin', $data);
		}
		public function register()
		{
			$this->form_validation->set_rules('nama', 'Nama Admin', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->m_admin->create()) {
					$this->session->set_flashdata('success', 'Pendaftaran Admin Berhasil');
					redirect('admin/signin','refresh');
				}else{
					$this->session->set_flashdata('pesan', 'Pendaftaran Admin Gagal');
					redirect('admin/signup','refresh');
				}
			} 
			else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('admin/signup','refresh');
			}
		}
	}

	/* End of file admin.php */
	/* Location: ./application/controllers/admin.php */