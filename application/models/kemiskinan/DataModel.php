<?php

class DataModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
    }

    public function selectRumahKepemilikan(){
        $data = $this->db->get("rumah_kepemilikan")->result_array();
        return $data;
    }

    public function selectSumberAirMinum(){
        $data = $this->db->get("sumber_air_minum")->result_array();
        return $data;
    }

    public function selectAtap(){
        $data = $this->db->get("atap")->result_array();
        return $data;
    }

    public function selectPenerangan(){
        $data = $this->db->get("penerangan")->result_array();
        return $data;
    }

    public function selectDinding(){
        $data = $this->db->get("dinding")->result_array();
        return $data;
    }
    
    public function selectJamban(){
        $data = $this->db->get("jamban")->result_array();
        return $data;
    }
    
    public function selectKesejahteraan(){
        $data = $this->db->get("kesejahteraan")->result_array();
        return $data;
    }
    
    public function selectLantai(){
        $data = $this->db->get("lantai")->result_array();
        return $data;
    }

    public function getDataNoKK($user){
        $this->db->where("no_kk", $user);
        $data = $this->db->get("keluarga")->result_array();
        return $data;
    }

    public function selectAgama(){
        $data = $this->db->get("agama")->result_array();
        return $data;
    }

    public function selectPendidikan(){
        $data = $this->db->get("status_pendidikan")->result_array();
        return $data;
    }

    public function selectPerkawinan(){
        $data = $this->db->get("status_perkawinan")->result_array();
        return $data;
    }

    public function selectPekerjaan(){
        $data = $this->db->get("pekerjaan")->result_array();
        return $data;
    }

    public function selectDana(){
        $data = $this->db->get("sumber_dana")->result_array();
        return $data;
    }

    public function getAnggotaKeluargaByNoKK($no_kk){
        
        $this->db->select("*, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur");
        $this->db->where("keluarga_anggota.no_kk", $no_kk);
        $this->db->join('penduduk', 'penduduk.nik = keluarga_anggota.nik', 'left');
        $this->db->join('status_pendidikan', 'status_pendidikan.id_status_pendidikan = penduduk.id_status_pendidikan', 'left');
        $this->db->join('status_perkawinan', 'status_perkawinan.id_status_perkawinan = penduduk.id_status_perkawinan', 'left');
        $this->db->order_by('penduduk.tgl_input', 'asc'); 
        $data = $this->db->get("keluarga_anggota")->result_array();
        return $data;
    }

    public function createNoKK($post){

    }

}