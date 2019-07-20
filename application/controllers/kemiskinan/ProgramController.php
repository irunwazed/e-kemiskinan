<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('kemiskinan/KKModel');
		$this->load->model('kemiskinan/ProgramModel');
    }

    public function action($function = '', $action = ''){
        // $status = $this->myconfig->check($this->input->post('session'), $this->level);
        
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
		);
		$status = True;
        if($status){
			$post = $this->input->post();
            $result = $this->$function($action, $post);
        }
        $kirim = $result;
		echo json_encode($kirim);
    }
    
    public function program($action, $post){
        $pesan = "Gagal Mengolah Data";
        $status = false;
		$data = array();
		
		$status = $this->ProgramModel->$action($post);
			if($status)
				$pesan = "Berhasil Mengolah Data";
        
        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function programSelect($action = '', $post){
        $pesan = "Berhasil Mengambil Data";
        $status = true;
        $data = array();
        
		$post['program_jenis'] = 1;
        $dataProgramTerima = $this->ProgramModel->select($post);
        
        $post['program_jenis'] = 2;
        $dataProgramHarap = $this->ProgramModel->select($post);
        
        $post['program_jenis'] = 3;
		$dataProgramAkan = $this->ProgramModel->select($post);
        // $dataProgramAkan = array();
        $kirim = array(
            'dataProgramTerima' => $dataProgramTerima,
            'dataProgramHarap' => $dataProgramHarap,
            'dataProgramAkan' => $dataProgramAkan,
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }
    
}