<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('kemiskinan/PendudukModel');
    }

    public function action($action = '', $id = null){
		
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
		);
		$status = True;
        if($status){
			$post = $this->input->post();
			if($id != null){
				$post['nik'] = $id;
			}
            $result = $this->PendudukModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}