<?php
class Tiket extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->load->model('tiket_model','tiket_model');
	}
	
	function index()
	{
		// print_r('masuk');exit();
		$data = array();
		$data['template']       ='tiket';
		$data['last_cs']        = $this->tiket_model->last_antrian(1);
		$data['last_teller']    = $this->tiket_model->last_antrian(2);
		$data = array_merge($data,basic_info());
		$this->parser->parse('index',$data);
	}	
    function add_tiket(){
		$id=$this->tiket_model->get_antrian($this->input->post('kode'));
		print_r($id);exit();
		
	}
    
    function get_antrian(){
		$id = $this->tiket_model->get_antrian($this->input->post('kode'));
		$this->output->set_output(json_encode($id));
		
	}

	function getprint() {
		//constant
		$rn=chr(13).chr(10);
		$esc=chr(27);
		$cutpaper=$esc."m";
		$bold_on=$esc."E1";
		$bold_off=$esc."E0";
		$reset=pack('n', 0x1B30);

		 
		//printer setup
		$printer="/dev/usb/lp0";


		//formating data text:
		$string = "--test EAN-13 barcode wide--\n";
		$string .= "\x1d\x77\x04";   # GS w 4
		$string .= "\x1d\x6b\x02";   # GS k 2 
		$string .= "5901234123457\x00";  # [data] 00
		$string .= "-end-\n";

		//cut paper at end
		//$string.=$cutpaper;


		//send data to USB printer
		$fp=fopen($printer, 'w');
		fwrite($fp,$string);
		fclose($fp);



		//formating the 2nd data
		$string = "--test EAN-13 barcode wide--\n";
		$string .= "\x1d\x77\x04";   # GS w 4
		$string .= "\x1d\x6b\x02";   # GS k 2 
		$string .= "111114123457\x00";  # [data] 00
		$string .= "-end-\n";


		//send data via TCP/IP port : the printer has tcp interface
		$port = "9100";
		$host = "192.168.1.87";
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
		    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error    ()) . "\n";
		} else {
		    echo "OK.\n";
		}
		$result = socket_connect($socket, $host, $port);
		if ($result === false) {
		    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror    (socket_last_error($socket)) . "\n";
		} else {
		    echo "OK.\n";
		}
		socket_write($socket, $string, strlen($string));
		socket_close($socket);		
	}
    
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */