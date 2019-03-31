<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penggunaan extends CI_Model {

	public function create()
	{
		$id_pel = $this->input->post('u_id_pelanggan');
		$bulan = $this->input->post('u_bulan');
		$tahun = $this->input->post('u_tahun');
		$a = $this->input->post('u_metera');
		$b = $this->input->post('u_meterb');

		$object = array(
			'id_pelanggan' => $id_pel, 
			'tahun' => $tahun, 
			'bulan' => $bulan, 
			'meter_awal' => $a, 
			'meter_akhir' => $b
		);

		$insert_penggunaan = $this->db->insert('penggunaan', $object);
		if ($insert_penggunaan) {
			$penggunaan = $this->db->where('id_pelanggan',$id_pel)
			->order_by('id_penggunaan','desc')
			->limit(1)
			->get('penggunaan')
			->row();
			$tagihan_arr = array('id_penggunaan' => $penggunaan->id_penggunaan, 
				'jumlah_meter' => $b - $a,
				'status' => 0
			);
			return $this->db->insert('tagihan', $tagihan_arr);
		}
	}

	public function detail($a)
	{
		return $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
						->where('penggunaan.id_pelanggan', $a)
						->get('penggunaan')
						->result();
	}
	public function tagihan($a)
	{
		return $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
						->join('tagihan','tagihan.id_penggunaan=penggunaan.id_penggunaan')
						->where('penggunaan.id_pelanggan', $a)
						->get('penggunaan')
						->result();
	}
	public function delete($a)
	{
		return $this->db->where('id_penggunaan', $a)->delete('penggunaan');
	}

	public function cek_pembayaran($a)
	{
		return $this->db->where('id_tagihan', $a)->get('pembayaran')->row();
	}
	public function cek_penggunaan()
	{
		$bulan = $this->input->post('u_bulan');
		$tahun = $this->input->post('u_tahun');
		$id_pel = $this->input->post('u_id_pelanggan');

		$cek = $this->db->where('id_pelanggan',$id_pel)
					->where('bulan',$bulan)
					->where('tahun',$tahun)
					->get('penggunaan');
		if ($cek->num_rows() > 0 ) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file M_penggunaan.php */
/* Location: ./application/models/M_penggunaan.php */