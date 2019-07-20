<?php

class IndikatorModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 4;
        $this->table = 'keluarga_indikator';
    }

    public function getData($post){
        $status = False;
        
        if($this->cekInput($post)){
            
            $this->db->where('tahun', $post['tahun']);
            $this->db->where('no_kk', $post['no_kk']);
            $data = $this->db->get($this->table)->result_array();
        }
        return $data;
    }

    public function cekIndikator($post){
        $status = False;
        
        if($this->cekInput($post)){
            
            $this->db->where('tahun', $post['tahun']);
            $this->db->where('no_kk', $post['no_kk']);
            $data = $this->db->get($this->table)->result_array();
            if(count($data) == 1){
                $status = true;
            }
        }
        return $status;
    }

    public function convert_to_rupiah($angka)
	{
		return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
	}
		 
	public function convert_to_number($rupiah)
	{
		return intval(preg_replace('/,.*|[^0-9]/', '', $rupiah));
	}

    public function create($post){
        
        $status = False;
        
        if($this->cekInput($post)){
            $post['pendapatan_utama'] = $this->convert_to_number($post['pendapatan_utama']);
            $post['pendapatan_sampingan'] = $this->convert_to_number($post['pendapatan_sampingan']);
            $post['pengeluaran_total'] = $this->convert_to_number($post['pengeluaran_total']);
            
            $data = array(
                'no_kk' => $post['no_kk'],
                'tahun' => $post['tahun'],
                'pendapatan_utama' => $post['pendapatan_utama'],
                'pendapatan_sampingan' => $post['pendapatan_sampingan'],
                'pengeluaran_total' => $post['pengeluaran_total'],
                'jenis_aset' => $post['jenis_aset'],
                'rumah_ukuran' => $post['rumah_ukuran'],
                'id_rumah_kepemilikan' => $post['id_rumah_kepemilikan'],
                'id_dinding' => $post['id_dinding'],
                'id_atap' => $post['id_atap'],
                'id_lantai' => $post['id_lantai'],
                'id_penerangan' => $post['id_penerangan'],
                'id_jamban' => $post['id_jamban'],
                'id_sumber_air_minum' => $post['id_sumber_air_minum'],
                'id_kesejahteraan' => $post['id_kesejahteraan'],
                // 'tgl_input' => ,
            );
            $status = $this->db->insert($this->table, $data);
        }
        return $status;
    }

    public function update($post){
        
        $status = False;
        
        if($this->cekInput($post)){
            $this->db->where('tahun', $post['tahun']);
            $this->db->where('no_kk', $post['no_kk']);
            $post['pendapatan_utama'] = $this->convert_to_number($post['pendapatan_utama']);
            $post['pendapatan_sampingan'] = $this->convert_to_number($post['pendapatan_sampingan']);
            $post['pengeluaran_total'] = $this->convert_to_number($post['pengeluaran_total']);
            $data = array(
                'no_kk' => $post['no_kk'],
                'tahun' => $post['tahun'],
                'pendapatan_utama' => $post['pendapatan_utama'],
                'pendapatan_sampingan' => $post['pendapatan_sampingan'],
                'pengeluaran_total' => $post['pengeluaran_total'],
                'jenis_aset' => $post['jenis_aset'],
                'rumah_ukuran' => $post['rumah_ukuran'],
                'id_rumah_kepemilikan' => $post['id_rumah_kepemilikan'],
                'id_dinding' => $post['id_dinding'],
                'id_atap' => $post['id_atap'],
                'id_lantai' => $post['id_lantai'],
                'id_penerangan' => $post['id_penerangan'],
                'id_jamban' => $post['id_jamban'],
                'id_sumber_air_minum' => $post['id_sumber_air_minum'],
                'id_kesejahteraan' => $post['id_kesejahteraan'],
                // 'tgl_input' => ,
            );
            $status = $this->db->update($this->table, $data);
        }
        return $status;
    }

    public function cekInput($post){
        //ruang filter

        // $query = $this->db->get($this->table);
        return true;
    }

}