<?php

class KeluargaModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'keluarga';
    }

    public function getCount($search = '', $post = array()){

        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($page = 1, $search = '', $post = array()){
        $jumlah = $this->jumlah;
        $awal = ($page - 1)*$jumlah;

        // $this->db->limit($jumlah,$awal); 
        $this->db->select("*, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur");
        $this->db->join('penduduk', 'penduduk.nik = keluarga.nik_kepala', 'left');
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        
        if($this->cekInput($post)){

            $data = array(
                'no_kk' => $post['no_kk'],
                'nik_kepala' => $post['nik_kepala'],
            );
            $status = $this->db->insert($this->table, $data);
            if($status)
                $pesan = "Berhasil Menambah Data";
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->cekInput($post)){

            $data = array(
                'no_kk' => $post['no_kk'],
                'nik_kepala' => $post['nik_kepala'],
            );

            $this->db->where('no_kk', $post['no_kk']);
            $this->db->or_where('nik_kepala', $post['nik_kepala']);
            $status = $this->db->update($this->table, $data);
            if($status)
                $pesan = "Berhasil Mengubah Data";

            
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function delete($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menghapus Data";
        $status = False;
        
        if($this->cekInput($post)){
            $this->db->where('no_kk', $post['no_kk']);
            $dataKK = $this->db->get('keluarga_anggota')->result_array();

            foreach($dataKK as $row){
                $this->db->where('nik', $row['nik']);
                $status = $this->db->delete('penduduk');
            }

            $this->db->where('no_kk', $post['no_kk']);
            $status = $this->db->delete($this->table);
            if($status)
                $pesan = "Berhasil Menghapus Data";
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }
    
    public function cekInput($post){
        //ruang filter

        // $query = $this->db->get($this->table);
        return true;
    }
    

}