<?php
class Laporan extends Admin_pages {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Laporan_model', 'Laporan');
	}

	function Data_antrian() {
		$data = array();
		if($this->input->get('aksi') == 'get_data_laporan_antrian') {
			$data['laporan'] = $this->Laporan->get_laporan_antrian();
		}
		$data['error'] = '';
		$data['title'] = 'Laporan Antrian';
		$data['template'] = 'admin/Laporan/Data_antrian';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("Call Customer",''),
								);
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
	}

	function Data_antrian_staff() {
		$data = array();
		if($this->input->get('aksi') == 'get_data_laporan_antrian_staff') {
			$data['laporan'] = $this->Laporan->get_laporan_antrian();
		}
		$data['error'] = '';
		$data['title'] = 'Laporan Antrian';
		$data['template'] = 'admin/Laporan/Data_antrian_staff';
		$data['breadcrum'] = array(
								array("Dashboard",'admin/Dashboard'),
								array("Data Antrian",''),
								);
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);		
	}

	function get_antrian_customer() {
		$id = $this->Laporan->get_list_belum_terlayani($this->input->post('jenis_panggilan'));
		$this->output->set_output(json_encode($id));		
	}
}

/* End of file Laporan.php */
/* Location: ./system/application/controllers/Laporan.php */