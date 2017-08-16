<?php
class Tiket_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
	
	function get_antrian($kode) 
	{	
		if ($kode=='1'){
			$init="A-";
			$init2="A";
		}else{
			$init="B-";
			$init2="B";
		}		
		$no_panggilan='0';
		// $init=$kode;
    	$query = $this->db->query("SELECT no_antrian FROM antrian_harian WHERE no_antrian like '$init%' AND antrian_harian.tanggal = CURDATE() ORDER BY no_antrian DESC LIMIT 1");    	
		if ($row = $query->row()){
			$hasil=$row->no_antrian ;
			$hasil = substr($hasil,2,3);
			$no_panggilan=$hasil;
			$hasil = $hasil + 1;
			$no_panggilan=$no_panggilan + 1;
			$hasil = $init.substr("000",0, 3 - strlen($hasil)).$hasil;	
			$no_panggilan=$init2.substr("000",0, 3 - strlen($no_panggilan)).$no_panggilan;	
		}else{
			$hasil=$init."001";
			$no_panggilan=$init2."001";
		}
		
		$this->cabang_id   		= '1'; 
		$this->no_antrian   	= $hasil; 
		$this->no_panggilan   	= $no_panggilan; 
		$this->tanggal   		= date('Y-m-d h:i:s'); 
		$this->ambil_antrian   	= date('Y-m-d h:i:s'); 
		$this->dilayani   	= date('Y-m-d h:i:s'); 
		$this->jenis_panggilan  = $kode; 
		$this->ruang_id  = '0'; 
		$this->st_panggil  = '0'; 
		$this->st_layanan  = '0'; 
		$this->layanan_id  = ''; 
		$this->st_upload  = '0'; 
		$this->prioritas  = '1'; 
		$this->status  = '0'; 
		
       
		if($this->db->insert('antrian_harian', $this)){			
			return $hasil;	
		}else{
			return '0';
		}
		
		
	}
    
    function last_antrian($kode){
        $query = $this->db->query("SELECT no_antrian FROM antrian_harian WHERE jenis_panggilan = $kode AND antrian_harian.tanggal = CURDATE() ORDER BY no_antrian DESC LIMIT 1");
        return (is_null($query->row('no_antrian')))? '-' : $query->row('no_antrian');
    }
    
}

?>