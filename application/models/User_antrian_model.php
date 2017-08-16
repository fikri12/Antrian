<?php
class User_antrian_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function get_user_ruang_layanan() {
        $str_query = 'SELECT
        tb1.*
        from antrian_harian as tb1
        where tb1.ruang_id = "'.$this->session->userdata('kode_ruang').'"
        and tb1.jenis_panggilan = "'.$this->session->userdata('user_grup_id').'"
        and tb1.st_layanan = 1
        and tb1.layanan_id = 0
        and tb1.`status` = 0';
        return $this->db->query($str_query)->result();   
    }

    function get_mlayanan() {
        $str_query = 'SELECT tb1.* from mlayanan as tb1';
        return $this->db->query($str_query)->result();
    } 
    
    function update_layanan_id($id, $layanan_id, $jenkel, $tipe_customer) {
        $this->layanan_id       = $layanan_id;
        $this->jenkel           = $jenkel;
        $this->tipe_customer    = $tipe_customer;
        $this->status           = 1;
        $this->dilayani_selesai = date('Y-m-d H:i:s');
        if( $this->db->update('antrian_harian', $this, array('id' => $id)) ) {
            return "Data berhasil disimpan!";
        } else {
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function update_dilayani($id) {
        $this->dilayani       = date('Y-m-d H:i:s');
        if( $this->db->update('antrian_harian', $this, array('id' => $id)) ) {
            return true;
        } else {
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function get_list_belum_terlayani($jenis_panggilan) {
        $str_query = 'SELECT
        no_antrian,
        ambil_antrian,
        TIMEDIFF(TIMESTAMP(ambil_antrian), NOW()) AS lama_tunggu
        from antrian_harian
        where jenis_panggilan = "'.$jenis_panggilan.'"
        and st_layanan = 0
        and tanggal = curdate()';
        return $this->db->query($str_query)->result();  
    }

    function call_antrian($kode, $jenis_id) 
    {   
        
        $query = $this->db->query("SELECT antrian_harian.id,
            antrian_harian.no_antrian,
            antrian_harian.st_call,
            antrian_harian.jenis_panggilan,mruang.kode
            FROM
            antrian_harian
            INNER JOIN mruang ON mruang.jenis_id = antrian_harian.jenis_panggilan
            where st_panggil=0 AND st_layanan=0 AND antrian_harian.tanggal = CURDATE() AND mruang.jenis_id=".$jenis_id." AND mruang.kode = ".$kode." 
            ORDER BY
            antrian_harian.no_antrian ASC
            Limit 1
            ");     
        if ($row = $query->row()){
            $this->ruang_id         = $row->kode; 
            $this->st_layanan       = '1'; 
            $this->st_call          = '1'; 
            $this->dilayani         = date('Y-m-d h:i:s'); 
            if($this->db->update('antrian_harian', $this, array('id' => $row->id))){
                return $row->no_antrian;
            }else{
                $this->error_message = "Penyimpanan Gagal";
                return false;
            }
        }   
    }

    function recall_antrian($jenis_id) 
    {   
        
        $query = $this->db->query("SELECT antrian_harian.id,
            antrian_harian.no_antrian,
            antrian_harian.jenis_panggilan,mruang.kode
            FROM
            antrian_harian
            INNER JOIN mruang ON mruang.jenis_id = antrian_harian.jenis_panggilan
            where antrian_harian.st_call=1
            AND antrian_harian.status=0
            AND antrian_harian.st_layanan=1 
            AND antrian_harian.tanggal = CURDATE() 
            AND antrian_harian.ruang_id = mruang.kode 
            AND mruang.jenis_id=".$jenis_id."
            ORDER BY
            antrian_harian.no_antrian DESC
            Limit 1
            ");     
        if ($row = $query->row()){
            $this->st_panggil       = '0'; 
            $this->dilayani         = date('Y-m-d h:i:s'); 
            if($this->db->update('antrian_harian', $this, array('id' => $row->id))){
                return $row->no_antrian;
            }else{
                $this->error_message = "Penyimpanan Gagal";
                return false;
            }
        }   
    }           
}