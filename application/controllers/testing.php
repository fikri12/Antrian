<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function get_str_query()
	{
        $str_select = 'SELECT tb1.* FROM antrian_harian AS tb1';
        $where_status = 'tb1.status = 1';
        $where_tanggal = '(tb1.tanggal BETWEEN "2016-11-01" AND "2016-11-30")';

        echo $str_select.' WHERE '.$where_status. ' AND '. $where_tanggal;
	}

}

/* End of file testing.php */
/* Location: ./application/controllers/testing.php */
