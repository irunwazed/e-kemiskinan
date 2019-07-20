<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('kemiskinan/LaporanModel');
        $this->load->model('kemiskinan/DataModel');
        $this->load->library('Fungsi');
    }

    public function indikator(){
        $foot['script'] = $this->load->view('components/laporan/indikator/script', null, true);

        $data['dataRumahKepemilikan'] = $this->DataModel->selectRumahKepemilikan();
        $data['dataSumberAirMinum'] = $this->DataModel->selectSumberAirMinum();
        $data['dataAtap'] = $this->DataModel->selectAtap();
        $data['dataPenerangan'] = $this->DataModel->selectPenerangan();
        $data['dataDinding'] = $this->DataModel->selectDinding();
        $data['dataJamban'] = $this->DataModel->selectJamban();
        $data['dataKesejahteraan'] = $this->DataModel->selectKesejahteraan();
        $data['dataLantai'] = $this->DataModel->selectLantai();
        $data['dataAgama'] = $this->DataModel->selectAgama();
        $data['dataPendidikan'] = $this->DataModel->selectPendidikan();
        $data['dataPerkawinan'] = $this->DataModel->selectPerkawinan();
        $data['dataPekerjaan'] = $this->DataModel->selectPekerjaan();

        $this->load->view('include/head');
        $this->load->view('components/laporan/indikator/data', $data);
        $this->load->view('include/foot', $foot);
    }

    public function selectIndikator($save = ''){
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();
        $dataIndikator = array();
        $linkSavePDF = 'pdf/indikator';
        $nameFile = 'indikator';
        $pageStatus = 'miring';
        
        $data = $this->LaporanModel->selectIndikator($post);
        $pesan = "Berhasil Mendapatkan Data";
        $status = true;

        $kirim = array(
            "data" => $data,
            "status" => $status,
            "pesan" => $pesan,
        );

        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf($nameFile, $linkSavePDF, $kirim, $pageStatus);
            // $this->load->view($linkSavePDF, $kirim);
        }else if($save == 'print'){
            $kirim['print'] = true;
            $this->load->view($linkSavePDF, $kirim);
        }else if($save == 'excel'){
            $this->exportExcelIndikator($dataType, $nameFile, $kirim, $kirim);
        }else{
            echo json_encode($kirim);
        }
    }

    public function program(){
        $foot['script'] = $this->load->view('components/laporan/program/script', null, true);

        $data['dataDana'] = $this->DataModel->selectDana();

        $this->load->view('include/head');
        $this->load->view('components/laporan/program/data', $data);
        $this->load->view('include/foot', $foot);
    }

    public function selectProgram($save = ''){
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();
        $dataIndikator = array();
        $linkSavePDF = 'pdf/program';
        $nameFile = 'indikator';
        $pageStatus = 'miring';
        
        $data = $this->LaporanModel->selectProgram($post);
        $pesan = "Berhasil Mendapatkan Data";
        $status = true;

        $kirim = array(
            "data" => $data,
            "status" => $status,
            "pesan" => $pesan,
        );

        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf($nameFile, $linkSavePDF, $kirim, $pageStatus);
            // $this->load->view($linkSavePDF, $kirim);
        }else if($save == 'print'){
            $kirim['print'] = true;
            $this->load->view($linkSavePDF, $kirim);
        }else if($save == 'excel'){
            $this->exportExcelIndikator($dataType, $nameFile, $kirim, $kirim);
        }else{
            echo json_encode($kirim);
        }
    }
    
    public function kesejahteraan(){
        $foot['script'] = $this->load->view('components/laporan/program/script', null, true);
        
        $data['dataRumahKepemilikan'] = $this->DataModel->selectRumahKepemilikan();
        $data['dataSumberAirMinum'] = $this->DataModel->selectSumberAirMinum();
        $data['dataAtap'] = $this->DataModel->selectAtap();
        $data['dataPenerangan'] = $this->DataModel->selectPenerangan();
        $data['dataDinding'] = $this->DataModel->selectDinding();
        $data['dataJamban'] = $this->DataModel->selectJamban();
        $data['dataKesejahteraan'] = $this->DataModel->selectKesejahteraan();
        $data['dataLantai'] = $this->DataModel->selectLantai();
        $data['dataAgama'] = $this->DataModel->selectAgama();
        $data['dataPendidikan'] = $this->DataModel->selectPendidikan();
        $data['dataPerkawinan'] = $this->DataModel->selectPerkawinan();
        $data['dataPekerjaan'] = $this->DataModel->selectPekerjaan();
        $data['dataDana'] = $this->DataModel->selectDana();

        $this->load->view('include/head');
        $this->load->view('components/laporan/program/data', $data);
        $this->load->view('include/foot', $foot);
    }

    public function selectKesejahteraan($save = ''){
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();
        $dataIndikator = array();
        $linkSavePDF = 'pdf/program';
        $nameFile = 'indikator';
        $pageStatus = 'miring';
        
        $data = $this->LaporanModel->selectKesejahteraan($post);
        $pesan = "Berhasil Mendapatkan Data";
        $status = true;

        $kirim = array(
            "data" => $data,
            "status" => $status,
            "pesan" => $pesan,
        );

        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf($nameFile, $linkSavePDF, $kirim, $pageStatus);
            // $this->load->view($linkSavePDF, $kirim);
        }else if($save == 'print'){
            $kirim['print'] = true;
            $this->load->view($linkSavePDF, $kirim);
        }else if($save == 'excel'){
            $this->exportExcelIndikator($dataType, $nameFile, $kirim, $kirim);
        }else{
            echo json_encode($kirim);
        }
    }
    
    
    
}
