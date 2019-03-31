<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function login()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		return $this->db->join('level', 'level.id_level = admin.id_level')
						->where('username', $user)
						->where('password', $pass)
						->get('admin');
	}
	public function create()
	{
		$nama = $this->input->post('nama');
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$level = $this->input->post('level');

		$object = array(
			'nama_admin' => $nama, 
			'username' => $user, 
			'password' => $pass, 
			'id_level' => $level, 
		);
		return $this->db->insert('admin', $object);
	}
	public function show_all()
	{
		return $this->db->join('level', 'level.id_level = admin.id_level')->get('admin')->result();
	}
	public function get_data($a)
	{
		return $this->db->where('id_admin', $a)->get('admin')->row();
	}
	public function edit()
	{
		$nama = $this->input->post('u_nama');
		$user = $this->input->post('u_username');
		$pass = $this->input->post('u_password');
		$level = $this->input->post('u_level');
		$id = $this->input->post('u_id_admin');

		$object = array(
			'nama_admin' => $nama, 
			'username' => $user, 
			'password' => $pass, 
			'id_level' => $level, 
		);

		return $this->db->where('id_admin',$id)->update('admin', $object);
	}
	public function delete($a)
	{
		return $this->db->where('id_admin', $a)->delete('admin');
	}

}

/* End of file M_Admin.php */
/* Location: ./application/models/M_Admin.php */