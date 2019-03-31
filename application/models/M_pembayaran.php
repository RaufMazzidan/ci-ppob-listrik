<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

	public function update_bayar()
	{
		$cek_bayar=$this->db
						->where('id_tagihan',$this->input->post('id_tagihan'))
						->get('pembayaran');

		$dt_tagihan=$this->db
						 ->where('id_tagihan',$this->input->post('id_tagihan'))
						 ->get('tagihan')->row();

		$tarif_perkwh=$this->db->where('id_tarif',$this->session->userdata('id_tarif'))->get('tarif')->row();

		$biaya_admin=2500;

		if($cek_bayar->num_rows()>0){
			$dt_bayar=$cek_bayar->row();
			$data=array(
				'bukti'=>$this->upload->data('file_name'),
			);

			 $zz = $this->db->where('id_pembayaran',$dt_bayar->id_pembayaran)->update('pembayaran',$data);
			 if ($zz) {
			 	$object = array('status' => '2');
			 	return $this->db->where('id_tagihan', $this->input->post('id_tagihan'))->update('tagihan', $object);
			 } 

		} else {
			$data=array(
				'id_tagihan'=>$this->input->post('id_tagihan'),
				'tanggal'=>date('Y-m-d'),
				'bulan_bayar'=>date('m'),
				'total_bayar'=>($biaya_admin+($dt_tagihan->jumlah_meter+$tarif_perkwh->tarifperkwh)),
				'status_bayar'=>'0',
				'bukti'=>$this->upload->data('file_name'),
				'id_admin'=> $this->session->userdata('id_admin'),
			);
			if ($this->db->insert('pembayaran',$data)) {
			 	$object = array('status' => '2');
			 	return $this->db->where('id_tagihan', $this->input->post('id_tagihan'))->update('tagihan', $object);
			 } 
			
		}
	}

	public function get_pembayaran($a)
	{
		return $this->db->where('id_pembayaran', $a)->join('tagihan', 'tagihan.id_tagihan=pembayaran.id_tagihan')->get('pembayaran')->row();
	}
	

}

/* End of file M_pembayaran.php */
/* Location: ./application/models/M_pembayaran.php */