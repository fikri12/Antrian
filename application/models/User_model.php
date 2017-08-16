<?php
class User_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function get_user() {
    	$str_query = 'SELECT 
        `tb1`.* 
        from user as tb1';
    	return $this->db->query($str_query)->result();
    }


    function get_user_by_id($id) {
        $str_query = 'SELECT `tb1`.* from user as tb1 where `tb1`.`id` = '.$id;
        return $this->db->query($str_query)->row();        
    }
    
    function insert_user() {
        $object = array();
        $object['nama_depan']       = $this->input->post('nama_depan');
        $object['nama_belakang']    = $this->input->post('nama_belakang');
        $object['jenkel']           = $this->input->post('jenkel');
        $object['tgllahir']         = $this->input->post('tgllahir');
        $object['alamat']           = $this->input->post('alamat');
        if( $this->db->insert('user', $object) ){       
            return true;
        } else {  
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    }

    function update_user(){
        $object['nama_depan']       = $this->input->post('nama_depan');
        $object['nama_belakang']    = $this->input->post('nama_belakang');
        $object['jenkel']           = $this->input->post('jenkel');
        $object['tgllahir']         = $this->input->post('tgllahir');
        $object['alamat']           = $this->input->post('alamat');
        if($this->db->update( 'user', $object, array('id' => $this->input->post('id') ) ) ) {
            return true;
        } else {
            $this->error_message = "Penyimpanan Gagal";
            return false;
        }
    } 

    function remove_user($id) {
        $this->db->where('id', $id);
        if($this->db->delete('user')) {
            return true;
        } else {
            $this->error_message = "Hapus data Gagal";
            return false;
        }
    }      
}