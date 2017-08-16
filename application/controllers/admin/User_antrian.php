<?php
class User_antrian extends Admin_pages {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_antrian_model', 'User_antrian');
	}

	function Call_customer() {
		$data = array();
		$data['error'] = '';
		$data['title'] = 'Call Customer Ruang '.$this->session->userdata('nama');
		$data['template'] = 'admin/User_antrian/Call_customer';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("Call Customer",''),
								);
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);		
	}

	function Ruang_layanan() {
		$data['error'] = '';
		$data['title'] = 'Layanan ruang '.$this->session->userdata('nama');
		$data['template'] = 'admin/User_antrian/Ruang_layanan';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("List Antrian",''),
								);
		$data['get_mlayanan'] = $this->User_antrian->get_mlayanan();
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
	}

	function update_layanan_id() {
		$id = $this->input->post('id');
		$layanan_id = $this->input->post('layanan_id');
		$jenkel = $this->input->post('jenkel');
		$tipe_customer = $this->input->post('tipe_customer');
		$r = $this->User_antrian->update_layanan_id($id,$layanan_id,$jenkel,$tipe_customer);
		$this->output->set_output(json_encode($r));
	}

	function update_dilayani() {
		$id = $this->input->post('id');
		$r = $this->User_antrian->update_dilayani($id);
		$this->output->set_output(json_encode($r));
	}

    function call_antrian(){
		$id = $this->User_antrian->call_antrian($this->input->post('kode'), $this->input->post('jenis_id'));
		$this->output->set_output(json_encode($id));
	}
    
    function recall_antrian(){
		$id = $this->User_antrian->recall_antrian($this->input->post('jenis_id'));
		$this->output->set_output(json_encode($id));
	}

	function get_antrian_customer() {
		$id = $this->User_antrian->get_list_belum_terlayani($this->input->post('jenis_panggilan'));
		$this->output->set_output(json_encode($id));		
	}
}

/* End of file User_antrian.php */
/* Location: ./system/application/controllers/User_antrian.php */