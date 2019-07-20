<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function index()
	{

        $this->load->view('include/head');
        $this->load->view('components/simple');
        $this->load->view('include/foot');
    }
    
    public function login(){
        $this->load->view('pages/login');
    }

    public function cekLogin(){
        $this->load->model('kemiskinan/LoginModel');
        $post = $this->input->post();
        $dataOneUser = $this->LoginModel->selectOneUserByUser(@$post['username']);
        $status = false;
        if(count($dataOneUser) > 0){
            if(password_verify($post['password'], $dataOneUser[0]['password'])) {
                $status = true;
                $data_session = array(
                    'id' => $dataOneUser[0]['id_user'],
                    'username'  => $dataOneUser[0]['username'],
                    'level' => $dataOneUser[0]['level'],
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($data_session);
                redirect(base_url()."beranda");
            }
        }
        $pesan = array(
            "pesan" => "Gagal melakukan Login",
            "status" => false,
        );
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url()."login");
    }

    public function logout(){
        session_destroy();
        redirect(base_url()."login");
    }
}
