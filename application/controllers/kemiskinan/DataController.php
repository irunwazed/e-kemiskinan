<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataController extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->model('kemiskinan/DataModel');
        $this->load->model('kemiskinan/IndikatorModel');
        // $this->level = 5;
    }
	public function cekNoKK()
	{
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();
        $data = $this->DataModel->getDataNoKK($post['no_kk']);
        $dataIndikator = array();
        
        if(count($data)>0){
            $data = $this->DataModel->getAnggotaKeluargaByNoKK($post['no_kk']);
            $dataIndikator = $this->IndikatorModel->getData($post);
            $pesan = "Berhasil Mendapatkan Data";
            $status = true;
        }

        $kirim = array(
            "data" => $data,
            "dataIndikator" => $dataIndikator,
            "status" => $status,
            "pesan" => $pesan,
        );

        echo json_encode($kirim);
    }

    public function tambahNoKK()
	{
        $status = false;
        $pesan = "Gagal Menambah Data";
        $post = $this->input->post();
        $data = $this->DataModel->getDataNoKK($post['no_kk']);

        if(count($data)>0){
            $data = $this->DataModel->getAnggotaKeluargaByNoKK($post['no_kk']);
            $pesan = "Berhasil Menambah Data";
            $status = true;
        }

        $kirim = array(
            "status" => $status,
            "pesan" => $pesan,
        );

        echo json_encode($kirim);
    }
}