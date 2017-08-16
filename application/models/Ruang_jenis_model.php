<?php
class Ruang_jenis_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function get_mruang_jenis() {
    	$str_query = 'SELECT tb1.* from mruang_jenis as tb1';
    	return $this->db->query($str_query)->result();
    }


    function get_mruang_jenis_by_id($id) {
        $str_query = 'SELECT `tb1`.* from mruang_jenis as tb1 where `tb1`.`id` = '.$id;
        return $this->db->query($str_query)->row();        
    }
    
    function insert_mruang_jenis() {
        $object = array();
        $object['jenis_ruang']  = $this->input->post('jenis_ruang');
        $object['kode_ruang']   = $this->input->post('kode_ruang');
        if( $this->db->insert('mruang_jenis', $object) ){       
            return true;
        } else {  
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function update_mruang_jenis(){
        $this->jenis_ruang      = $this->input->post('jenis_ruang');
        $this->kode_ruang       = $this->input->post('kode_ruang');
        if($this->db->update( 'mruang_jenis', $this, array('id' => $this->input->post('id') ) ) ) {
            return true;
        } else {
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function remove_mruang_jenis($id) {
        $this->db->where('id', $id);
        if($this->db->delete('mruang_jenis')) {
            return true;
        } else {
            $this->error_message = "Hapus data Gagal";
            return false;
        }
    }    
}