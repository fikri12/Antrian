<?php
class Layanan extends Admin_pages {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Layanan_model', 'Layanan');
	}
	
	function index(){
		$data = array();
		$data['error'] = '';
		$data['title'] = 'List Layanan';
		$data['template'] = 'admin/Layanan/index';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List Layanan",''),
								);
		$data['get_mlayanan'] = $this->Layanan->get_mlayanan();
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
	}

	function add_new() {
		$data = array(
				'id' 				=> '',
				'jenis_layanan' 	=> '',
			);
		$data['error'] 		= '';
		$data['title'] 		= 'Tambah Data Layanan';
		$data['template'] 	= 'admin/Layanan/manage';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List Layanan",'admin/Layanan'),
								array("Tambah Data",''),
								);
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);		
	}

	function edit() {
		if($this->uri->segment(4) != ''){
			$row = $this->Layanan->get_mlayanan_by_id($this->uri->segment(4));
			if(isset($row->id)){
				$data = array(
						'id' 				=> $row->id,
						'jenis_layanan' 	=> $row->jenis_layanan,
					);
				$data['error'] 		= '';	
				$data['title'] 		= 'Ubah Data Layanan';
				$data['template'] 	= 'admin/Layanan/manage';				
				$data['breadcrum'] = array(
										array("Dashboard",'admin/Dashboard'),
										array("List Layanan",'admin/Layanan'),
										array("Ubah Data",''),
										);
				$data = array_merge($data,admin_info());				
				$this->parser->parse('admin/default_template',$data);
			} else {
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','{notfoundmsg}');
				redirect('Layanan','location');
			}
		} else {
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','{notfoundmsg}');
			redirect('Layanan');
		}
	}

	function save(){
		$this->form_validation->set_rules('jenis_layanan', 'Jenis Layanan', 'trim|required|min_length[1]');		
		if ($this->form_validation->run() == TRUE){
			if($this->input->post('id') == '' ) {
				if($this->Layanan->insert_mlayanan()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','{savesuccesmsg}');
					redirect('admin/Layanan','location');
				}
			} else {
				if($this->Layanan->update_mlayanan()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','{updatesuccesmsg}');
					redirect('admin/Layanan','location');
				}
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}
	}

	function failed_save($id,$image=false){
		$data = $this->input->post();
		$data['error'] = validation_errors();
		$data['template'] = 'admin/Layanan/manage';
		if($image) $data['error'] .= $this->Layanan->error_message;
		
		if($id==''){
			$data['title'] 		= 'Tambah Data Layanan';		
			$data['breadcrum'] 	= array(array("Dashboard",'dashboard'),
									   array("Layanan",'admin/Layanan'),
									   array("Tambah Data",'')
						     );
		}else{
			$data['title'] = 'Ubah Data Layanan';		
			$data['breadcrum'] = array(array("Dashboard",'dashboard'),
									   array("Layanan",'#'),
									   array("Ubah Data",'')
						     );
		}
							 
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
		
	}	


	function Remove() {
		$this->Layanan->remove_mlayanan($this->uri->segment(4));
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','{deletesuccesmsg}');
		redirect('admin/Layanan','location');
	}
}

/* End of file Layanan.php */
/* Location: ./system/application/controllers/Layanan.php */