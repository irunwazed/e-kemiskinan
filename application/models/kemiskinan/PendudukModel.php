<?php

class PendudukModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 4;
        $this->table = 'penduduk';
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

        $this->db->limit($jumlah,$awal); 
        if(!@$post['all']){
            $this->db->limit($jumlah,$awal); 
        }

        $query = $this->db->get($this->table)->result_array();
        // $query = $this->db->get_Where('tb_kecamatan, tb_kabupaten, tb_provinsi', array('tb_kecamatan.tb_provinsi_kode'=>'tb_provinsi.tb_provinsi_kode', 'tb_kecamatan.tb_kabupaten_kode'=>'tb_kabupaten.tb_kabupaten_kode'));
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        $data = array();
        // print_r($post['tgl_lahir']);
        if($this->cekInput($post)){
            $data = array(
                'nik' => $post['nik'],
                'penduduk_nama' => $post['penduduk_nama'],
                'jenis_kelamin' => $post['jenis_kelamin'],
                'tempat_lahir' => $post['tempat_lahir'],
                'tgl_lahir' => $post['tgl_lahir'],
                'alamat' => $post['alamat'],
                'kondisi_fisik' => $post['kondisi_fisik'],
                'jenis_keterampilan' => $post['jenis_keterampilan'],
                'hidup' => $post['hidup'],
                'id_status_pendidikan' => $post['id_status_pendidikan'],
                'id_status_perkawinan' => $post['id_status_perkawinan'],
                'id_pekerjaan' => $post['id_pekerjaan'],
                'id_agama' => $post['id_agama'],
                // 'tgl_input' => ,
            );
            $status = $this->db->insert($this->table, $data);
            $status = $this->setKepalaKeluarga($post);
            $status = $this->createKeluargaAnggota($post);
            if($status)
                $pesan = "Berhasil Menambah Data";
        }

        $kirim = array(
            'data' => $data,
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function setKepalaKeluarga($post){
        $this->db->where('no_kk', $post['no_kk']);
        $status = false;
        $data = $this->db->get('keluarga_anggota')->result_array();
        if(count($data) == 0){
            $this->db->where('no_kk', $post['no_kk']);
            $data = array(
                'nik_kepala' => $post['nik'],
            );
            $status = $this->db->update('keluarga', $data);
        }
        return $status;
    }

    public function createKeluargaAnggota($post){
        $data = array(
            'nik' => $post['nik'],
            'no_kk' => $post['no_kk'],
            'jabatan' => $post['jabatan'],
            'aktif' => 1,
        );
        $status = $this->db->insert('keluarga_anggota', $data);
        return $status;
    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->cekInput($post)){
            $this->db->where('nik', $post['nik']);
            $data = array(
                'nik' => $post['nik'],
                'penduduk_nama' => $post['penduduk_nama'],
                'jenis_kelamin' => $post['jenis_kelamin'],
                'tempat_lahir' => $post['tempat_lahir'],
                'tgl_lahir' => $post['tgl_lahir'],
                'alamat' => $post['alamat'],
                'kondisi_fisik' => $post['kondisi_fisik'],
                'jenis_keterampilan' => $post['jenis_keterampilan'],
                'hidup' => $post['hidup'],
                'id_status_pendidikan' => $post['id_status_pendidikan'],
                'id_status_perkawinan' => $post['id_status_perkawinan'],
                'id_pekerjaan' => $post['id_pekerjaan'],
                'id_agama' => $post['id_agama'],
            );
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
            // print_r($post);
            $this->db->where('nik', $post['nik']);
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