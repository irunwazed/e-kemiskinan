<?php

class LaporanModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'keluarga';
    }

    public function getCount($post = array()){
        
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($page = 1, $post = array()){
        $jumlah = $this->jumlah;
        $awal = ($page - 1)*$jumlah;

        // $this->db->join('penduduk', 'penduduk.nik = keluarga_anggota.nik', 'left');
        $this->db->join('keluarga_indikator', 'keluarga_indikator.no_kk = keluarga.no_kk');
        // $this->db->join('keluarga_indikator', 'keluarga_indikator.no_kk = keluarga.no_kk');

        // $this->db->group_by('keluarga_anggota.no_kk'); 

        // $this->db->order_by('penduduk.tgl_input', 'asc'); 

        $this->db->order_by('keluarga_indikator.no_kk', 'asc'); 

        // $this->db->limit($jumlah,$awal); 
        
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function selectIndikator($post){

        $this->db->select("*, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur");
        $this->db->join('keluarga_indikator', 'keluarga_indikator.no_kk = keluarga.no_kk');
        $this->db->join('penduduk', 'penduduk.nik = keluarga.nik_kepala', 'left');

        $this->db->join('dinding', 'dinding.id_dinding = keluarga_indikator.id_dinding', 'left');
        $this->db->join('atap', 'atap.id_atap = keluarga_indikator.id_atap', 'left');
        $this->db->join('lantai', 'lantai.id_lantai = keluarga_indikator.id_lantai', 'left');
        $this->db->join('penerangan', 'penerangan.id_penerangan = keluarga_indikator.id_penerangan', 'left');
        $this->db->join('jamban', 'jamban.id_jamban = keluarga_indikator.id_jamban', 'left');
        $this->db->join('kesejahteraan', 'kesejahteraan.id_kesejahteraan = keluarga_indikator.id_kesejahteraan', 'left');
        $this->db->join('rumah_kepemilikan', 'rumah_kepemilikan.id_rumah_kepemilikan = keluarga_indikator.id_rumah_kepemilikan', 'left');
        $this->db->join('sumber_air_minum', 'sumber_air_minum.id_sumber_air_minum = keluarga_indikator.id_sumber_air_minum', 'left');

        $this->db->order_by('keluarga_indikator.no_kk', 'asc'); 

        if(@$post['id_rumah_kepemilikan'] > 0){
            $this->db->where("keluarga_indikator.id_rumah_kepemilikan", $post['id_rumah_kepemilikan']);
        }
        if(@$post['id_dinding'] > 0){
            $this->db->where("keluarga_indikator.id_dinding", $post['id_dinding']);
        }
        if(@$post['id_atap'] > 0){
            $this->db->where("keluarga_indikator.id_atap", $post['id_atap']);
        }
        if(@$post['id_lantai'] > 0){
            $this->db->where("keluarga_indikator.id_lantai", $post['id_lantai']);
        }
        if(@$post['id_penerangan'] > 0){
            $this->db->where("keluarga_indikator.id_penerangan", $post['id_penerangan']);
        }
        if(@$post['id_jamban'] > 0){
            $this->db->where("keluarga_indikator.id_jamban", $post['id_jamban']);
        }
        if(@$post['id_sumber_air_minum'] > 0){
            $this->db->where("keluarga_indikator.id_sumber_air_minum", $post['id_sumber_air_minum']);
        }
        if(@$post['id_kesejahteraan'] > 0){
            $this->db->where("keluarga_indikator.id_kesejahteraan", $post['id_kesejahteraan']);
        }
        if(@$post['tahun'] > 0){
            $this->db->where("keluarga_indikator.tahun", $post['tahun']);
        }
        
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function selectProgram($post){

        $this->db->select("*, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur");
        $this->db->join('penduduk', 'penduduk.nik = keluarga.nik_kepala', 'left');
        $this->db->join('keluarga_program', 'keluarga_program.no_kk = keluarga.no_kk');

        $this->db->join('sumber_dana', 'sumber_dana.id_sumber_dana = keluarga_program.kegiatan_sumber_dana', 'left');
        // kegiatan_tahun : kegiatan_tahun,
        // jenis_kelamin: jenis_kelamin,
        // kegiatan_sumber_dana: kegiatan_sumber_dana,
        // program_jenis: program_jenis,

        if(@$post['kegiatan_tahun'] > 0){
            $this->db->where("keluarga_program.kegiatan_tahun", $post['kegiatan_tahun']);
        }
        if(@$post['kegiatan_sumber_dana'] > 0){
            $this->db->where("keluarga_program.kegiatan_sumber_dana", $post['kegiatan_sumber_dana']);
        }
        if(@$post['program_jenis'] > 0){
            $this->db->where("keluarga_program.program_jenis", $post['program_jenis']);
        }
        if(@$post['jenis_kelamin'] > 0){
            $this->db->where("penduduk.jenis_kelamin", $post['jenis_kelamin']);
        }

        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function selectKesejahteraan($post){

        $this->db->select("*, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur");
        $this->db->join('penduduk', 'penduduk.nik = keluarga.nik_kepala', 'left');
        $this->db->join('keluarga_indikator', 'keluarga_indikator.no_kk = keluarga.no_kk');

        

        $query = $this->db->get($this->table)->result_array();
        return $query;
    }
    

}