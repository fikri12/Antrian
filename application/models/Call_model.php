<?php
class Call_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
	function list_loket(){
		// $this->db->from('mruang');
		$query = $this->db->get('mruang');
        //print_r($query->result());exit();
		return $query->result();
	}
	function call_antrian($kode) 
	{	
		
    	$query = $this->db->query("SELECT antrian_harian.id,
			antrian_harian.no_antrian,
			antrian_harian.jenis_panggilan,mruang.kode
			FROM
			antrian_harian
			INNER JOIN mruang ON mruang.jenis_id = antrian_harian.jenis_panggilan
			where st_panggil=0 AND st_layanan=0 AND antrian_harian.tanggal = CURDATE() AND mruang.id=".$kode." 
			ORDER BY
			antrian_harian.no_antrian ASC
			Limit 1
			");    	
		if ($row = $query->row()){
			$this->ruang_id 		= $row->kode; 
			$this->st_layanan 		= '1'; 
			$this->dilayani 		= date('Y-m-d h:i:s'); 
			if($this->db->update('antrian_harian', $this, array('id' => $row->id))){
				return $row->no_antrian;
			}else{
				$this->error_message = "Penyimpanan Gagal";
				return false;
			}
		}
		
		
	}
    
    function recall_antrian($kode) 
	{	
		
    	$query = $this->db->query("SELECT antrian_harian.id,
			antrian_harian.no_antrian,
			antrian_harian.jenis_panggilan,mruang.kode
			FROM
			antrian_harian
			INNER JOIN mruang ON mruang.jenis_id = antrian_harian.jenis_panggilan
			where st_panggil=1 AND st_layanan=1 AND antrian_harian.tanggal = CURDATE() AND antrian_harian.ruang_id = mruang.kode AND mruang.id=".$kode."
			ORDER BY
			antrian_harian.no_antrian DESC
			Limit 1
			");    	
		if ($row = $query->row()){
			$this->st_panggil 		= '0'; 
			$this->dilayani 		= date('Y-m-d h:i:s'); 
			if($this->db->update('antrian_harian', $this, array('id' => $row->id))){
				return $row->no_antrian;
			}else{
				$this->error_message = "Penyimpanan Gagal";
				return false;
			}
		}
		
		
	}
}

?>