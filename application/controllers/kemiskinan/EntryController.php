<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EntryController extends CI_Controller {

	public function form()
	{
        $this->load->model('kemiskinan/DataModel');
        $foot['script'] = $this->load->view('components/entry/script', null, true);

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
        $this->load->view('components/entry/data', $data);
        $this->load->view('include/foot', $foot);
    }
}