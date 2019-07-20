<?php

class ProgramModel extends CI_Model
{
    private $jumlah, $table, $table1, $table2, $table3;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 4;
        $this->table = 'keluarga_program';
        $this->table1 = 'keluarga_program_terima';
        $this->table2 = 'keluarga_program_harapan';
        $this->table3 = 'keluarga_program_akan_terima';
    }

    public function getTable($no){
        $table = $this->table2;
        if($no == 1){
            $table = $this->table1;
        }else if($no == 2){
            $table = $this->table2;
        }else if($no == 3){
            $table = $this->table3;
        }
        return $table;
    }

    public function select($post){
        $jenis = $post['program_jenis'];
        $table = $this->getTable($jenis);
        $post = $this->security->xss_clean($post);
        $this->db->join('sumber_dana', 'sumber_dana.id_sumber_dana = '.$this->table.'.kegiatan_sumber_dana', 'left');
        $this->db->where('no_kk', $post['no_kk']);
        $this->db->where('program_jenis', $post['program_jenis']);
        $data = $this->db->get($this->table)->result_array();
        return $data;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $status = False;
        $data = array();
        
        if($this->cekInput($post)){
            $jenis = $post['program_jenis'];
            $data = array(
                'no_kk' => $post['no_kk'],
                'program_jenis' => $post['program_jenis'],
                'kegiatan_nama' => $post['kegiatan_nama'],
                'kegiatan_tahun' => $post['kegiatan_tahun'],
                'kegiatan_sumber_dana' => $post['kegiatan_sumber_dana'],
            );
            $status = $this->db->insert($this->table, $data);
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
            $jenis = $post['program_jenis'];
            $table = $this->getTable($jenis);
            $this->db->where('id_keluarga_program', $post['id_keluarga_program']);
            $this->db->where('program_jenis', $post['program_jenis']);
            $data = array(
                'no_kk' => $post['no_kk'],
                'kegiatan_nama' => $post['kegiatan_nama'],
                'kegiatan_tahun' => $post['kegiatan_tahun'],
                'kegiatan_sumber_dana' => $post['kegiatan_sumber_dana'],
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
        $status = False;
        
        if($this->cekInput($post)){
            $jenis = $post['program_jenis'];
            $this->db->where('id_keluarga_program', $post['id_keluarga_program']);
            $status = $this->db->delete($this->table);
        }

        return $status;
    }
    

    public function cekInput($post){
        //ruang filter

        // $query = $this->db->get($this->table);
        return true;
    }
    

}