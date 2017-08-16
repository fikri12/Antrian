<?php
class Layanan_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function get_mlayanan() {
    	$str_query = 'SELECT tb1.* from mlayanan as tb1';
    	return $this->db->query($str_query)->result();
    }


    function get_mlayanan_by_id($id) {
        $str_query = 'SELECT `tb1`.* from mlayanan as tb1 where `tb1`.`id` = '.$id;
        return $this->db->query($str_query)->row();        
    }
    
    function insert_mlayanan() {
        $object = array();
        $object['jenis_layanan'] = $this->input->post('jenis_layanan');
        if( $this->db->insert('mlayanan', $object) ){       
            return true;
        } else {  
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function update_mlayanan(){
        $this->jenis_layanan    = $this->input->post('jenis_layanan');
        if($this->db->update( 'mlayanan', $this, array('id' => $this->input->post('id') ) ) ) {
            return true;
        } else {
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function remove_mlayanan($id) {
        $this->db->where('id', $id);
        if($this->db->delete('mlayanan')) {
            return true;
        } else {
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }    
}