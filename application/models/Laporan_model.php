<?php
class Laporan_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function get_mruang() {
        $str_query = 'SELECT * FROM mruang';
        return $this->db->query($str_query)->result();
    }

    function get_mruang_staff() {
        $str_query = 'SELECT
        tb2.nama_ruang,
        tb2.kode
        from mruang_jenis as tb1
        inner join mruang as tb2 on tb1.id=tb2.jenis_id
        where tb1.id = '.$this->session->userdata('user_grup_id').'
        and tb2.kode = '.$this->session->userdata('kode_ruang');
        return $this->db->query($str_query)->row();
    }

    function get_mruang_jenis() {
        $str_query = 'SELECT * FROM mruang_jenis';
        return $this->db->query($str_query)->result();
    }

    function get_mlayanan() {
        $str_query = 'SELECT * FROM mlayanan';
        return $this->db->query($str_query)->result();
    }


    function get_laporan_antrian() {
        $str_select = 'SELECT 
        tb1.*,
        tb2.nama_ruang,
        tb3.jenis_ruang,
        tb4.jenis_layanan 
        FROM antrian_harian AS tb1
        INNER JOIN mruang AS tb2 ON tb1.ruang_id = tb2.id
        INNER JOIN mruang_jenis AS tb3 ON tb1.jenis_panggilan = tb3.id
        INNER JOIN mlayanan AS tb4 ON tb1.layanan_id = tb4.id';
        $where_status = 'tb1.status = 1 ';
        if($_POST['jenkel'] !== '#') {
            $where_jenkel = 'AND tb1.jenkel = '.$_POST['jenkel'].' ';
        } else {
            $where_jenkel = '';
        }
        $where_tanggal = 'AND (tb1.tanggal BETWEEN "'.$_POST['tgl_awal'].'" AND "'.$_POST['tgl_akhir'].'") ';

        $kriteria_panggilan = '';
        if(isset($_POST['panggilan'])){
            for($i=0; $i<count($_POST['panggilan']); $i++){
                $kriteria_panggilan .= "'".$_POST['panggilan'][$i]."',";
            }
            $kriteria_panggilan = 'AND tb1.jenis_panggilan in ('.substr($kriteria_panggilan, 0, -1).') ';
        } else {
            $kriteria_panggilan = '';
        }

        $kriteria_ruang = '';
        if(isset($_POST['ruang'])){
            $kriteria_ruang .= 'AND tb1.ruang_id ';
            if ( isset($_POST['exruang']) ) { $kriteria_ruang .= "not in ("; } else { $kriteria_ruang .= "in ("; }
            for($i=0; $i<count($_POST['ruang']); $i++){
                $kriteria_ruang .= "'".$_POST['ruang'][$i]."',";
            }
            $kriteria_ruang = substr($kriteria_ruang, 0, -1).') ';
        } else {
            $kriteria_ruang = '';
        }

        $kriteria_layanan = '';
        if(isset($_POST['layanan'])){
            $kriteria_layanan .= 'AND tb1.layanan_id ';
            if ( isset($_POST['exlayanan']) ) { $kriteria_layanan .= "not in ("; } else { $kriteria_layanan .= "in ("; }
            for($i=0; $i<count($_POST['layanan']); $i++){
                $kriteria_layanan .= "'".$_POST['layanan'][$i]."',";
            }
            $kriteria_layanan = substr($kriteria_layanan, 0, -1).') ';
        } else {
            $kriteria_layanan = '';
        }

        $str_query = $str_select.' WHERE '.$where_status.$where_jenkel.$where_tanggal.$kriteria_panggilan.$kriteria_ruang.$kriteria_layanan;
        return $this->db->query($str_query)->result();

    }
}