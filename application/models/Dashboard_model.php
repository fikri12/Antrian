<?php
class Dashboard_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function get_total_day() {
        $str_query = 'SELECT
        COUNT(id) AS total
        FROM antrian_harian
        WHERE status = 1
        AND tanggal = CURDATE()';
        return $this->db->query($str_query)->row()->total;
    }

    function get_total_month() {
        $str_query = 'SELECT
        COUNT(id) AS total
        FROM antrian_harian
        WHERE status = 1
        AND (tanggal BETWEEN DATE_FORMAT(CURDATE(),"%Y-%m-01") AND LAST_DAY(DATE_FORMAT(CURDATE(),"%Y-%m-01")) )';
        return $this->db->query($str_query)->row()->total;
    }

    function get_total_week() {
        $str_query = 'SELECT
        COUNT(id) AS total,
        DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) AS tgl_awal,
        DATE_ADD(CURDATE(), INTERVAL 7-DAYOFWEEK(CURDATE()) DAY) AS tgl_akhir
        FROM antrian_harian
        WHERE status = 1
        AND (tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) AND DATE_ADD(CURDATE(), INTERVAL 7-DAYOFWEEK(CURDATE()) DAY) )';
        return $this->db->query($str_query)->row();
    }

    function get_mlayanan() {
        $str_query = 'SELECT `tb1`.* from mlayanan tb1';
        return $this->db->query($str_query)->result();
    }

    function get_mlayanan_jenis_layanan() {
        $str_query = 'SELECT jenis_layanan FROM mlayanan';
        return $this->db->query($str_query)->result();
    }

    function get_total_perlayanan($layanan_id) {
        $str_query = 'SELECT
        COUNT(tb1.id) AS total_layanan
        FROM antrian_harian AS tb1
        WHERE tb1.layanan_id = "'.$layanan_id.'"';
        return $this->db->query($str_query)->row()->total_layanan;
    }

    function get_total_customer_jenkel($jenkel) {
        $str_query = 'SELECT
        COUNT(id) as total
        FROM antrian_harian
        WHERE jenkel="'.$jenkel.'"
        AND status=1';
        return $this->db->query($str_query)->row()->total;
    }

    function get_chart_layanan_cs() {
        $str_query = 'SELECT
        tb1.tanggal,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 1 THEN 1 ELSE 0 END
        ) AS tabungan,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 2 THEN 1 ELSE 0 END
        ) AS kartu_kredit,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 3 THEN 1 ELSE 0 END
        ) AS deposito,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 4 THEN 1 ELSE 0 END
        ) AS kliring,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 5 THEN 1 ELSE 0 END
        ) AS inkasio,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 6 THEN 1 ELSE 0 END
        ) AS kpr
        FROM antrian_harian tb1
        INNER JOIN mlayanan tb2 ON tb2.id=tb1.layanan_id
        WHERE tb1.jenis_panggilan = 1 AND status=1
        GROUP BY tb1.tanggal';
        return $this->db->query($str_query)->result();
    }

    function get_chart_layanan_teller() {
        $str_query = 'SELECT
        tb1.tanggal,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 1 THEN 1 ELSE 0 END
        ) AS tabungan,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 2 THEN 1 ELSE 0 END
        ) AS kartu_kredit,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 3 THEN 1 ELSE 0 END
        ) AS deposito,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 4 THEN 1 ELSE 0 END
        ) AS kliring,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 5 THEN 1 ELSE 0 END
        ) AS inkasio,
        SUM(
        CASE 
        WHEN tb1.layanan_id = 6 THEN 1 ELSE 0 END
        ) AS kpr
        FROM antrian_harian tb1
        INNER JOIN mlayanan tb2 ON tb2.id=tb1.layanan_id
        WHERE tb1.jenis_panggilan = 2 AND status=1
        GROUP BY tb1.tanggal';
        return $this->db->query($str_query)->result();
    }     

}