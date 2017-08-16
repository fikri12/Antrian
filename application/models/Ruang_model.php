<?php
class Ruang_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function get_mruang() {
    	$str_query = 'SELECT 
        `tb1`.* ,
        `tb2`.`jenis_ruang`
        from mruang as tb1
        inner join mruang_jenis as tb2 on `tb1`.`jenis_id`=`tb2`.`id`';
    	return $this->db->query($str_query)->result();
    }


    function get_mruang_by_id($id) {
        $str_query = 'SELECT `tb1`.* from mruang as tb1 where `tb1`.`id` = '.$id;
        return $this->db->query($str_query)->row();        
    }
    
    function insert_mruang() {
        $object = array();
        $object['jenis_id']     = $this->input->post('jenis_id');
        $object['nama_ruang']   = $this->input->post('nama_ruang');
        $object['kode']         = $this->input->post('kode');
        if( $this->db->insert('mruang', $object) ){       
            return true;
        } else {  
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function update_mruang(){
        $object['jenis_id']     = $this->input->post('jenis_id');
        $object['nama_ruang']   = $this->input->post('nama_ruang');
        $object['kode']         = $this->input->post('kode');
        if($this->db->update( 'mruang', $object, array('id' => $this->input->post('id') ) ) ) {
            return true;
        } else {
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function remove_mruang($id) {
        $this->db->where('id', $id);
        if($this->db->delete('mruang')) {
            return true;
        } else {
            $this->error_message = "Hapus data Gagal";
            return false;
        }
    }    

    // other
    function get_mruang_jenis() {
        $str_query = 'SELECT tb1.* from mruang_jenis as tb1';
        return $this->db->query($str_query)->result();
    }



}