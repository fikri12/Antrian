<?php
class User extends Admin_pages {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_model', 'User');
	}
	
	function index(){
		$data = array();
		$data['error'] = '';
		$data['title'] = 'List User';
		$data['template'] = 'admin/User/index';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List User",''),
								);
		$data['get_user'] = $this->User->get_user();
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
	}

	function add_new() {
		$data = array(
				'id' 				=> '',
				'nama_depan' 		=> '',
				'nama_belakang' 	=> '',
				'jenkel' 			=> '',
				'tgllahir' 			=> '',
				'alamat' 			=> '',
			);
		$data['error'] 		= '';
		$data['title'] 		= 'Tambah Data User';
		$data['template'] 	= 'admin/User/manage';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List User",'admin/User'),
								array("Tambah Data",''),
								);
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);		
	}

	function edit() {
		if($this->uri->segment(4) != ''){
			$row = $this->User->get_user_by_id($this->uri->segment(4));
			if(isset($row->id)){
				$data = array(
						'id' 				=> $row->id,
						'nama_depan' 		=> $row->nama_depan,
						'nama_belakang' 	=> $row->nama_belakang,
						'jenkel' 			=> $row->jenkel,
						'tgllahir' 			=> $row->tgllahir,
						'alamat' 			=> $row->alamat,
					);
				$data['error'] 		= '';	
				$data['title'] 		= 'Ubah Data User';
				$data['template'] 	= 'admin/User/manage';				
				$data['breadcrum'] = array(
										array("Dashboard",'admin/Dashboard'),
										array("List User",'admin/User'),
										array("Ubah Data",''),
										);
				$data = array_merge($data,admin_info());				
				$this->parser->parse('admin/default_template',$data);
			} else {
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','{notfoundmsg}');
				redirect('User','location');
			}
		} else {
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','{notfoundmsg}');
			redirect('User');
		}
	}

	function save(){
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'trim|required|min_length[1]|alpha');		
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim|required|min_length[1]|alpha');		
		$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'trim|required|min_length[1]|numeric');		
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'trim|required|min_length[1]');		
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[1]');		
		if ($this->form_validation->run() == TRUE){
			if($this->input->post('id') == '' ) {
				if($this->User->insert_user()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','{savesuccesmsg}');
					redirect('admin/User','location');
				}
			} else {
				if($this->User->update_user()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','{updatesuccesmsg}');
					redirect('admin/User','location');
				}
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}
	}

	function failed_save($id,$image=false){
		$data = $this->input->post();
		$data['error'] = validation_errors();
		$data['template'] = 'admin/User/manage';
		if($image) $data['error'] .= $this->User->error_message;
		
		if($id==''){
			$data['title'] 		= 'Tambah Data User';		
			$data['breadcrum'] 	= array(array("Dashboard",'dashboard'),
									   array("User",'admin/User'),
									   array("Tambah Data",'')
						     );
		}else{
			$data['title'] = 'Ubah Data User';		
			$data['breadcrum'] = array(array("Dashboard",'dashboard'),
									   array("User",'#'),
									   array("Ubah Data",'')
						     );
		}
							 
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
		
	}	

	function Remove() {
		$this->User->remove_user($this->uri->segment(4));
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','{deletesuccesmsg}');
		redirect('admin/Ruang','location');
	}	
}

/* End of file User.php */
/* Location: ./system/application/controllers/User.php */