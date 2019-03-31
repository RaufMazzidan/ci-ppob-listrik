<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	public function login()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		return $this->db->join('tarif', 'tarif.id_tarif = pelanggan.id_tarif')
						->where('username', $user)
						->where('password', $pass)
						->get('pelanggan');
	}
	public function create()
	{
		$nama = $this->input->post('nama');
		$meter = $this->input->post('meter');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$tarif = $this->input->post('tarif');

		$object = array(
			'nama' => $nama, 
			'no_meter' => $meter, 
			'email' => $email, 
			'alamat' => $alamat, 
			'username' => $user, 
			'password' => $pass, 
			'id_tarif' => $tarif, 
		);
		return $this->db->insert('pelanggan', $object);
	}
	public function show_all()
	{
		return $this->db->join('tarif', 'tarif.id_tarif = pelanggan.id_tarif')->get('pelanggan')->result();
	}
	public function get_data($a)
	{
		return $this->db->where('id_pelanggan', $a)->get('pelanggan')->row();
	}
	public function edit()
	{
		$nama = $this->input->post('u_nama');
		$user = $this->input->post('u_username');
		$pass = $this->input->post('u_password');
		$tarif = $this->input->post('u_tarif');
		$id = $this->input->post('u_id_pelanggan');
		$meter = $this->input->post('u_meter');
		$alamat = $this->input->post('u_alamat');
		$email = $this->input->post('u_email');

		$object = array(
			'nama' => $nama, 
			'no_meter' => $meter, 
			'email' => $email, 
			'alamat' => $alamat, 
			'username' => $user, 
			'password' => $pass, 
			'id_tarif' => $tarif, 
		);

		return $this->db->where('id_pelanggan',$id)->update('pelanggan', $object);
	}
	public function delete($a)
	{
		return $this->db->where('id_pelanggan', $a)->delete('pelanggan');
	}

}

/* End of file M_pelanggan.php */
/* Location: ./application/models/M_pelanggan.php */