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
		$data['page']= "Pelanggan";
		$data['tarif']= $this->m_tarif->show_all();
		$data['content']= $this->m_pelanggan->show_all();
		$this->load->view('template', $data);
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('meter', 'Nomor Meter', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		// $this->form_validation->set_rules('id_level', 'Level', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->m_pelanggan->create()) {
				$this->session->set_flashdata('pesan', 'Create Pelanggan Berhasil');
				redirect('pelanggan','refresh');
			}else{
				$this->session->set_flashdata('warn', 'Create Pelanggan Gagal');
				redirect('pelanggan','refresh');
			}
		}
		else{
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
		if ($this->m_pelanggan->edit()) {
			$this->session->set_flashdata('pesan_del', 'Edit Pelanggan Berhasil');
			redirect('pelanggan','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Edit Pelanggan Gagal');
			redirect('pelanggan','refresh');
		}
	}
	public function delete($a)
	{
		if ($this->m_pelanggan->delete($a)) {
			$this->session->set_flashdata('pesan_del', 'Delete Pelanggan Berhasil');
			redirect('pelanggan','refresh');
		}
		else{
			$this->session->set_flashdata('warn_del', 'Delete Pelanggan Gagal');
			redirect('pelanggan','refresh');
		}
	}

	public function auth()
	{
		$this->load->view('Auth_User');
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
					'username' => $data->username,
					'id_tarif' => $data->id_tarif
				);

				$this->session->set_userdata( $array );
				redirect('DashUser','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Username Atau Password Salah');
				redirect('pelanggan/auth','refresh');
			}
		} 
		else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('pelanggan/auth','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('pelanggan/auth','refresh');
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */