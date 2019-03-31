<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_verifikasi extends CI_Model {

	public function show_all()
	{
		return $this->db->join('tagihan', 'tagihan.id_tagihan=pembayaran.id_tagihan')
						->join('penggunaan', 'penggunaan.id_penggunaan=tagihan.id_penggunaan')
						->join('pelanggan', 'pelanggan.id_pelanggan=penggunaan.id_pelanggan')
						->join('tarif', 'tarif.id_tarif=pelanggan.id_tarif')
						->where('status', '2')
						->get('pembayaran')
						->result();
	}
	public function accept($a)
	{
		$object = array('status_bayar' => 1, );
		
		if($this->db->where('id_pembayaran', $a)->update('pembayaran', $object)){

			$this->load->model('m_pembayaran');
			$data = $this->m_pembayaran->get_pembayaran($a);
			$array = array('status' => 1, );
			return $this->db->where('id_tagihan', $data->id_tagihan)->update('tagihan', $array);
		}
	}

	public function reject($a)
	{
		$object = array('status_bayar' => 0, );
		
		if($this->db->where('id_pembayaran', $a)->update('pembayaran', $object)){

			$this->load->model('m_pembayaran');
			$data = $this->m_pembayaran->get_pembayaran($a);
			$array = array('status' => 3, );
			return $this->db->where('id_tagihan', $data->id_tagihan)->update('tagihan', $array);
		}
	}
	

}

/* End of file M_verifikasi.php */
/* Location: ./application/models/M_verifikasi.php */