<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KKController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('kemiskinan/KKModel');
		$this->load->model('kemiskinan/IndikatorModel');
    }

    public function action($action = '', $id = null){
		// $status = $this->myconfig->check($this->input->post('session'), $this->level);
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
		);
		$status = True;
        if($status){
			$post = $this->input->post();
			if($id != null){
				$post['id_tb_kecamatan'] = $id;
			}
            $result = $this->KKModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

	}
	
	public function filter($action = '', $id = null){
		// $status = $this->myconfig->check($this->input->post('session'), $this->level);
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
		);
		$status = True;
        if($status){
			$post = $this->input->post();
			if($id != null){
				$post['no_kk'] = $id;
			}
            $result = $this->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

	}
	
	public function indikator($post){
		
        $pesan = "Gagal Menambah Data";
        $status = false;
		$data = array();
		
		$cek = $this->IndikatorModel->cekIndikator($post);
		if($cek){
			$status = $this->IndikatorModel->update($post);
			if($status)
				$pesan = "Berhasil Mengubah Data";
		}else{
			$status = $this->IndikatorModel->create($post);
			if($status)
				$pesan = "Berhasil Menambah Data";
		}
        
        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
	}

}