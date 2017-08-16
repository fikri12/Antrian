<?php

class My_Controller extends CI_Controller
{ 
	function __construct() {
		parent::__construct();
	}
}

class Admin_pages extends MY_Controller 
{
	function __construct() {
		parent::__construct();

		if($this->session->userdata('user_admin') !== true) {
			$this->session->set_flashdata('error_access','Silahkan login terlebih dahulu!');			
			redirect('admin/login');
			return false;
		} else {
			return true;
		}
	}
}