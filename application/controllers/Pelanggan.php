	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pelanggan extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_pelanggan');
			$this->load->model('m_tarif');
		}

		public function index()
		{
			$data['page'] = "pelanggan";
			$data['content'] = $this->m_pelanggan->show_all();
			$data['tarif'] = $this->m_tarif->show_all();
			$this->load->view('template', $data);
		}

		public function create()
		{
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('meter', 'Nomor Meter', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->m_pelanggan->create()) {
					$this->session->set_flashdata('pesan', 'Create Pelanggan Berhasil');
					redirect('pelanggan','refresh');
				}else{
					$this->session->set_flashdata('warn', 'Create Pelanggan Gagal');
					redirect('pelanggan','refresh');
				}
			} 
			else {
				$this->session->set_flashdata('warn', validation_errors());
				redirect('pelanggan','refresh');
			}

		}
		public function get_data($a)
		{
			$data = $this->m_pelanggan->get_data($a);

			echo json_encode($data);
		}

		public function edit()
		{
			$this->form_validation->set_rules('u_nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('u_alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('u_meter', 'Nomor Meter', 'trim|required');
			$this->form_validation->set_rules('u_username', 'Username', 'trim|required');
			$this->form_validation->set_rules('u_password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->m_pelanggan->edit()) {
					$this->session->set_flashdata('pesan_tab', 'Update Pelanggan Berhasil');
					redirect('pelanggan','refresh');
				}else{
					$this->session->set_flashdata('warn_tab', 'Update Pelanggan Gagal');
					redirect('pelanggan','refresh');
				}
			} 
			else {
				$this->session->set_flashdata('warn_tab', validation_errors());
				redirect('pelanggan','refresh');
			}
		}

		public function delete($a)
		{
			if ($this->m_pelanggan->delete($a)) {
				$this->session->set_flashdata('pesan_tab', 'Delete Pelanggan Berhasil');
				redirect('pelanggan','refresh');
			}else{
				$this->session->set_flashdata('warn_tab', 'Delete Pelanggan Gagal');
				redirect('pelanggan','refresh');
			}
		}

		public function signin()
		{
			$this->load->view('signin_pelanggan');
		}
		public function login()
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->m_pelanggan->login()->num_rows() > 0) {
					$data =$this->m_pelanggan->login()->row();

					$array = array(
						'login' =>TRUE , 
						'id_pelanggan' => $data->id_pelanggan,
						'nama' => $data->nama,
						'id_tarif' => $data->id_tarif,
						'username' => $data->username
					);

					$this->session->set_userdata( $array );
					redirect('DashUser','refresh');
				}
				else{
					$this->session->set_flashdata('pesan', 'Username Atau Password Salah');
					redirect('pelanggan/signin','refresh');
				}
			} 
			else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('pelanggan/signin','refresh');
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('pelanggan/signin','refresh');
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

	/* End of file pelanggan.php */
	/* Location: ./application/controllers/pelanggan.php */