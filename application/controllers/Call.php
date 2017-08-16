<?php
class Call extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->load->model('call_model');
	}
	
	function index()
	{
		$data = array();
		$data['list_loket'] = $this->call_model->list_loket();
		$data['template']   = 'call';
		$data = array_merge($data,basic_info());
	 // print_r($data['list_loket'] );exit();
		$this->parser->parse('index',$data);
		
	}	
   
    
    function call_antrian(){
		$id = $this->call_model->call_antrian($this->input->post('kode'));
		$this->output->set_output(json_encode($id));
	}	
    
    function recall_antrian(){
		$id = $this->call_model->recall_antrian($this->input->post('kode'));
		$this->output->set_output(json_encode($id));
	}
   
    
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */