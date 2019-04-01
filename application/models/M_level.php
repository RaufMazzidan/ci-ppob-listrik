<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_level extends CI_Model {

	public function create()
	{
		$level = $this->input->post('level');

		$object = array(
			'level' => $level, 
		);
		return $this->db->insert('level', $object);
	}
	public function show_all()
	{
		return $this->db->get('level')->result();
	}
	public function get_data($a)
	{
		return $this->db->where('id_level', $a)->get('level')->row();
	}
	public function edit()
	{
		$level = $this->input->post('u_level');
		$id = $this->input->post('u_id_level');

		$object = array(
			'level' => $level, 
			'levelperkwh' => $level
		);
		return $this->db->where('id_level', $id)->update('level', $object);
	}
	public function delete($a)
	{
		return $this->db->where('id_level', $a)->delete('level');
	}

}

/* End of file M_level.php */
/* Location: ./application/models/M_level.php */