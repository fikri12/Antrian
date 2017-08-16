<?php
class Ruang_jenis extends Admin_pages {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Ruang_jenis_model', 'Ruang_jenis');
	}
	
	function index(){
		$data = array();
		$data['error'] = '';
		$data['title'] = 'List Ruang Jenis';
		$data['template'] = 'admin/Ruang_jenis/index';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List Ruang Jenis",''),
								);
		$data['get_mruang_jenis'] = $this->Ruang_jenis->get_mruang_jenis();
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
	}

	function add_new() {
		$data = array(
				'id' 				=> '',
				'jenis_ruang' 		=> '',
				'kode_ruang' 		=> '',
			);
		$data['error'] 		= '';
		$data['title'] 		= 'Tambah Data Ruang Jenis';
		$data['template'] 	= 'admin/Ruang_jenis/manage';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List Ruang Jenis",'admin/Ruang_jenis'),
								array("Tambah Data",''),
								);
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);		
	}

	function edit() {
		if($this->uri->segment(4) != ''){
			$row = $this->Ruang_jenis->get_mruang_jenis_by_id($this->uri->segment(4));
			if(isset($row->id)){
				$data = array(
						'id' 				=> $row->id,
						'jenis_ruang' 		=> $row->jenis_ruang,
						'kode_ruang' 		=> $row->kode_ruang,
					);
				$data['error'] 		= '';	
				$data['title'] 		= 'Ubah Data Ruang';
				$data['template'] 	= 'admin/Ruang_jenis/manage';				
				$data['breadcrum'] = array(
										array("Dashboard",'admin/Dashboard'),
										array("List Ruang",'admin/Ruang_jenis'),
										array("Ubah Data",''),
										);
				$data = array_merge($data,admin_info());				
				$this->parser->parse('admin/default_template',$data);
			} else {
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','{notfoundmsg}');
				redirect('Ruang_jenis','location');
			}
		} else {
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','{notfoundmsg}');
			redirect('Ruang_jenis');
		}
	}

	function save(){
		$this->form_validation->set_rules('jenis_ruang', 'Jenis Ruang', 'trim|required|min_length[1]');		
		$this->form_validation->set_rules('kode_ruang', 'Kode Ruang', 'trim|required|min_length[1]');		
		if ($this->form_validation->run() == TRUE){
			if($this->input->post('id') == '' ) {
				if($this->Ruang_jenis->insert_mruang_jenis()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','{savesuccesmsg}');
					redirect('admin/Ruang_jenis','location');
				}
			} else {
				if($this->Ruang_jenis->update_mruang_jenis()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','{updatesuccesmsg}');
					redirect('admin/Ruang_jenis','location');
				}
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}
	}

	function failed_save($id,$image=false){
		$data = $this->input->post();
		$data['error'] = validation_errors();
		$data['template'] = 'admin/Ruang_jenis/manage';
		if($image) $data['error'] .= $this->Ruang_jenis->error_message;
		
		if($id==''){
			$data['title'] 		= 'Tambah Data Ruang Jenis';		
			$data['breadcrum'] 	= array(array("Dashboard",'dashboard'),
									   array("List Ruang Jenis",'admin/Ruang_jenis'),
									   array("Tambah Data",'')
						     );
		}else{
			$data['title'] = 'Ubah Data Ruang Jenis';		
			$data['breadcrum'] = array(array("Dashboard",'dashboard'),
									   array("List Ruang Jenis",'#'),
									   array("Ubah Data",'')
						     );
		}
							 
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
		
	}

	function Remove() {
		$this->Ruang_jenis->remove_mruang_jenis($this->uri->segment(4));
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','{deletesuccesmsg}');
		redirect('admin/Ruang_jenis','location');
	}		
}

/* End of file Ruang.php */
/* Location: ./system/application/controllers/Ruang.php */