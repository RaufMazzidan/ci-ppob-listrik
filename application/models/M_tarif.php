<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tarif extends CI_Model {

	public function create()
	{
		$daya = $this->input->post('daya');
		$tarif = $this->input->post('kwh');

		$object = array(
			'daya' => $daya, 
			'tarifperkwh' => $tarif
		);
		return $this->db->insert('tarif', $object);
	}
	public function show_all()
	{
		return $this->db->get('tarif')->result();
	}
	public function get_data($a)
	{
		return $this->db->where('id_tarif', $a)->get('tarif')->row();
	}
	public function edit()
	{
		$daya = $this->input->post('u_daya');
		$tarif = $this->input->post('u_kwh');
		$id = $this->input->post('u_id_tarif');

		$object = array(
			'daya' => $daya, 
			'tarifperkwh' => $tarif
		);
		return $this->db->where('id_tarif', $id)->update('tarif', $object);
	}
	public function delete($a)
	{
		return $this->db->where('id_tarif', $a)->delete('tarif');
	}

}

/* End of file M_tarif.php */
/* Location: ./application/models/M_tarif.php */