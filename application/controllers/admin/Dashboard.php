<?php
class Dashboard extends Admin_pages {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dashboard');
	}
	
	function index(){
		$data = array();
		$data['title'] = 'Dashboard';
		$data['template'] = 'admin/Dashboard/index';
		$data['breadcrum'] = array(array("Dashboard",''));
		$data['get_mlayanan'] = $this->dashboard->get_mlayanan();
		$data = array_merge($data,admin_info());
		$this->parser->parse('admin/default_template',$data);
	}
}

/* End of file Dashboard.php */
/* Location: ./system/application/controllers/Dashboard.php */