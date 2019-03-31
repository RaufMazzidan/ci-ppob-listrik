<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function show_all()
	{
		return $this->db->join('tagihan', 'tagihan.id_tagihan=pembayaran.id_tagihan')
						->join('penggunaan', 'penggunaan.id_penggunaan=tagihan.id_penggunaan')
						->join('pelanggan', 'pelanggan.id_pelanggan=penggunaan.id_pelanggan')
						->join('tarif', 'tarif.id_tarif=pelanggan.id_tarif')
						->join('admin', 'admin.id_admin=pembayaran.id_admin')
						->get('pembayaran')
						->result();
	}

}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */