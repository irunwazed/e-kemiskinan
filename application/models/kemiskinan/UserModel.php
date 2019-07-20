<?php

class UserModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'user';
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
        
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        
        if($this->cekInput($post)){
            $post['password'] = $this->fungsi->password_hash($post['password']);
            $data = array(
                'username' => $post['username'],
                'password' => $post['password'],
                'level' => $post['level'],
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

            $this->db->where('id_user', $post['id_user']);
            $dataOne = $this->db->get($this->table)->result_array();
            if(count($dataOne) == 1){

                if($dataOne[0]['password'] == $post['password']){
                    $data = array(
                        'username' => $post['username'],
                        'level' => $post['level'],
                    );
                }else{
                    $post['password'] = $this->fungsi->password_hash($post['password']);
                    $data = array(
                        'username' => $post['username'],
                        'password' => $post['password'],
                        'level' => $post['level'],
                    );
                }

                $this->db->where('id_user', $post['id_user']);
                $status = $this->db->update($this->table, $data);
                if($status)
                    $pesan = "Berhasil Mengubah Data";
            }

            
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
            $this->db->where('id_user', $post['id_user']);
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