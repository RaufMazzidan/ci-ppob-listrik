<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pembayaran');
	}

	public function index()
	{
		
	}


	public function upload()
	{
		$config['upload_path'] = './assets/img/bukti/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '10000';
			$config['max_width']  = '102400';
			$config['max_height']  = '76800';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('DashUser','refresh');
			}
			else{
				$update=$this->m_pembayaran->update_bayar();
				if($update){
					$this->session->set_flashdata('pesan', 'Upload Bukti Sukses');
				} else {
					$this->session->set_flashdata('pesan', 'Upload Bukti Gagal');
				}
				redirect('DashUser','refresh');
			}	
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */