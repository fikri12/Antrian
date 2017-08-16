<?php
class Login extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('login_model','login');
	}
	
	function index(){
		if($this->session->userdata('logged_in') == true) redirect('admin/Dashboard');
		$data =  array('title' => 'Login Administrator', 'username' => '', 'remember' => FALSE, 'error' => '');
		$data = array_merge($data,admin_info());
		$this->load->view('admin/login/index',$data);
	}
	
	function do_login(){
		if($this->session->userdata('logged_in') == true) redirect('admin/Dashboard');
		if($this->login->login()){
			if($this->session->userdata('user_grup_id') == 0) {
				redirect('admin/Dashboard','location');
			} else {
				redirect('admin/Call_customer','location');
			}
		}else{
			$data =  array(
				'title' 	=> 'Login Administrator', 
				'username' 	=> $this->input->post('username'), 
				'error' 	=> 'Username atau password salah'
			);

			$data = array_merge($data,admin_info());
			$this->load->view('admin/login/index',$data);
		}
	}
	
	function logout(){
		$this->login->logout();
		redirect('admin/login','location');
	}	
   
    
	
}

/* End of file Login.php */
/* Location: ./system/application/controllers/Login.php */