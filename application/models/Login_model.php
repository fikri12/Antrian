<?php
class Login_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

	function login(){
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('user_admin');

		if($query->num_rows() > 0) {
			$row = $query->row();
			$newdata = array(
					   'userid'  		=> $row->id,
					   'username'  		=> $row->username,
					   'nama'  			=> $row->nama,
					   'kode_ruang'  	=> $row->kode_ruang,
					   'user_grup_id'  	=> $row->user_grup_id,
					   'user_avatar'  	=> $row->avatar,
					   'user_admin'  	=> TRUE,
					);
			$this->session->set_userdata($newdata);
			return true;
		} else {
			return false;
		}
	} 

	function logout() {
		return $this->session->sess_destroy();
	}   
}

?>