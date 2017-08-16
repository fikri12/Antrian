<?php
class Ruang extends Admin_pages {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Ruang_model', 'Ruang');
	}
	
	function index(){
		$data = array();
		$data['error'] = '';
		$data['title'] = 'List Ruang';
		$data['template'] = 'admin/Ruang/index';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List Ruang",''),
								);
		$data['get_mruang'] = $this->Ruang->get_mruang();
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
	}

	function add_new() {
		$data = array(
				'id' 				=> '',
				'jenis_id' 			=> '',
				'nama_ruang' 		=> '',
				'kode' 				=> '',
			);
		$data['error'] 		= '';
		$data['title'] 		= 'Tambah Data Ruang';
		$data['template'] 	= 'admin/Ruang/manage';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List Ruang",'admin/Ruang'),
								array("Tambah Data",''),
								);
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);		
	}

	function edit() {
		if($this->uri->segment(4) != ''){
			$row = $this->Ruang->get_mruang_by_id($this->uri->segment(4));
			if(isset($row->id)){
				$data = array(
						'id' 				=> $row->id,
						'jenis_id' 			=> $row->jenis_id,
						'nama_ruang' 		=> $row->nama_ruang,
						'kode' 				=> $row->kode,
					);
				$data['error'] 		= '';	
				$data['title'] 		= 'Ubah Data Ruang';
				$data['template'] 	= 'admin/Ruang/manage';				
				$data['breadcrum'] = array(
										array("Dashboard",'admin/Dashboard'),
										array("List Ruang",'admin/Ruang'),
										array("Ubah Data",''),
										);
				$data = array_merge($data,admin_info());				
				$this->parser->parse('admin/default_template',$data);
			} else {
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','{notfoundmsg}');
				redirect('Ruang','location');
			}
		} else {
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','{notfoundmsg}');
			redirect('Ruang');
		}
	}

	function save(){
		$this->form_validation->set_rules('jenis_id', 'Jenis Ruang', 'trim|required|min_length[1]');		
		$this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'trim|required|min_length[1]');		
		$this->form_validation->set_rules('kode', 'Kode Ruang', 'trim|required|min_length[1]');		
		if ($this->form_validation->run() == TRUE){
			if($this->input->post('id') == '' ) {
				if($this->Ruang->insert_mruang()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','{savesuccesmsg}');
					redirect('admin/Ruang','location');
				}
			} else {
				if($this->Ruang->update_mruang()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','{updatesuccesmsg}');
					redirect('admin/Ruang','location');
				}
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}
	}

	function failed_save($id,$image=false){
		$data = $this->input->post();
		$data['error'] = validation_errors();
		$data['template'] = 'admin/Ruang/manage';
		if($image) $data['error'] .= $this->Ruang->error_message;
		
		if($id==''){
			$data['title'] 		= 'Tambah Data Ruang';		
			$data['breadcrum'] 	= array(array("Dashboard",'dashboard'),
									   array("Ruang",'admin/Ruang'),
									   array("Tambah Data",'')
						     );
		}else{
			$data['title'] = 'Ubah Data Ruang';		
			$data['breadcrum'] = array(array("Dashboard",'dashboard'),
									   array("Ruang",'#'),
									   array("Ubah Data",'')
						     );
		}
							 
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
		
	}	

	function Remove() {
		$this->Ruang->remove_mruang($this->uri->segment(4));
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','{deletesuccesmsg}');
		redirect('admin/Ruang','location');
	}	
}

/* End of file Ruang.php */
/* Location: ./system/application/controllers/Ruang.php */