<?php
class Home extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		permission_basic_admin($this->session);
        $this->load->model('home_model');
	}
	
	function index()
	{
		$data = array();
		$data['first_title'] = 'Dashboard';		
		$data['second_title'] = 'Audit System TÜV Rheinland Indonesia';		
		$data['template'] = 'home';		
		$data['breadcrum'] = array(array("Aplikasi Audit TUV Rheinland",'home'),array("Dashboard",''));
        $data['project_activity'] = $this->home_model->project_activity(20);	
        $data['scope'] = 0;	
        
        if($this->session->userdata('role') == 'AD'){
            $data_audit = $this->home_model->jumlah_audit(0,$this->session->userdata('auditor_id'));
            $data_ncr   = $this->home_model->jumlah_ncr_audit(0,$this->session->userdata('auditor_id'));
        }elseif($this->session->userdata('role') == 'C'){
            $data_audit = $this->home_model->jumlah_audit($this->session->userdata('client_id'));
            $data_ncr   = $this->home_model->jumlah_ncr_audit($this->session->userdata('client_id'));
        }else{
            $data_audit = $this->home_model->jumlah_audit();
            $data_ncr   = $this->home_model->jumlah_ncr_audit();
        }   
        
        
		$data = array_merge($data,$data_audit,$data_ncr,admin_info());
		//	print_r($data );exit();
		$this->parser->parse('index',$data);
		
	}	
    
    function filter()
	{
		$data = array();
		$data['first_title'] = 'Dashboard';		
		$data['second_title'] = 'Audit System TÜV Rheinland Indonesia';		
		$data['template'] = 'home';		
		$data['breadcrum'] = array(array("Aplikasi Audit TUV Rheinland",'home'),array("Dashboard",''));
        
        $data['scope'] = $this->input->post('scope');	
        $scope = $data['scope'];	
        
        if($this->session->userdata('role') == 'AD'){
            $data_audit = $this->home_model->jumlah_audit(0,$this->session->userdata('auditor_id'),$scope);
            $data_ncr   = $this->home_model->jumlah_ncr_audit(0,$this->session->userdata('auditor_id'),$scope);
            $data['project_activity'] = $this->home_model->project_activity(20,$this->session->userdata('auditor_id'),$scope);
        }elseif($this->session->userdata('role') == 'C'){
            $data_audit = $this->home_model->jumlah_audit($this->session->userdata('client_id'),0,$scope);
            $data_ncr   = $this->home_model->jumlah_ncr_audit($this->session->userdata('client_id'),0,$scope);
            $data['project_activity'] = array();
        }else{
            $data_audit = $this->home_model->jumlah_audit(0,0,$scope);
            $data_ncr   = $this->home_model->jumlah_ncr_audit(0,0,$scope);
            $data['project_activity'] = $this->home_model->project_activity(20);
        }   
        
        
		$data = array_merge($data,$data_audit,$data_ncr,admin_info());
		//	print_r($data );exit();
		$this->parser->parse('index',$data);
		
	}	
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */