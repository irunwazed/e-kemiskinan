<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('kemiskinan/UserModel');
        $this->load->library('Fungsi');
    }

    public function view(){
        $foot['script'] = $this->load->view('components/user/script', null, true);

        $this->load->view('include/head');
        $this->load->view('components/user/data');
        $this->load->view('include/foot', $foot);
    }

    public function getData($page = 1, $api = true){
        $jumDataAll = 0;
        $post = $this->input->post();
		$status = true;
		if($status){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }
            $data = $this->UserModel->getAll($page, $search);

            // $dataAll
            $jumDataAll = $this->UserModel->getCount($search);
            $jumlahDatainPage = $this->UserModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}else{
            $data = array();
            $jumlahPage = 1;
        }
        
		$kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
			'data' => $data,
			'status' => $status
        );
        if($api)
            echo json_encode($kirim);
        else
            return json_encode($kirim);
	}
	
	public function action($action = '', $id = null){
        $post = $this->input->post();
        // print_r($post);
		// $session = $this->myconfig->getSession(@$post['session'], True, $this->akun, $this->level);
        $status = true;
        
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        
        if($status){
			
			if($id != null){
				$post['id_user'] = $id;
			}
            $result = $this->UserModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }
    
}
