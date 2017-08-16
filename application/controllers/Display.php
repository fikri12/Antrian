<?php
class Display extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('display_model');
	}
	
	function index()
	{
		// print_r('masuk');exit();
		$data = array();
		$data['template'    ]   =   'display';
		$data['antrian_list']   =   $this->display_model->get_list_antrian(6);
		$data = array_merge($data,basic_info());
		//	print_r($data );exit();
		$this->parser->parse('index1',$data);
		
	}	
    
    function get_antrian()
    {
        $result  = $this->display_model->get_antrian();
        
        if(!is_null($result)){
            $result->antrian_list = $this->display_model->get_list_antrian(5);
        }
        
        $this->output->set_output(json_encode($result));
    }
    
    function update_antrian()
    {
        $this->display_model->update_antrian($this->input->post('id'));
        $this->output->set_output(json_encode("OK"));
    }
    
    
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */