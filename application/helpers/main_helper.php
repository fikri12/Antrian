<?php
/* Main Helper Audit TUV dan VLegal Indonesia TUV
   by. Are Fun
   Orisinil Buatan Sendiri :P
*/

/* Breadcrum Function */

function admin_breadcrum($data)
{
	$result = array();
	foreach($data as $row){	
		if($row[1] == '#'){ 
			$url = '<li><a href="#">'.$row[0].'</a></li>';
		}elseif($row[1] == ''){
			$url = '<li class="active">'.$row[0].'</li>';
		}else{
			$url = '<li><a href="'.site_url($row[1]).'">'.$row[0].'</a></li>';
		}			
		array_push($result,$url);
	}
	return implode("", $result);
}

/* END Breadcrum Function */

/* CMS Function  */

function display_permission($perm)
{
	$permission = array('0' => 'Private','1' => 'Public');
	return  $permission[$perm];
}

function display_publish($perm)
{
	$permission = array('0' => 'Unpublish','1' => 'Published');
	return  $permission[$perm];
}

/* END CMS Function  */

/* DATE Function */
function format_ymd($date){
    if($date == '0000-00-00' || $date == ''){
        return ''; 
    }else{
        return date_format(strtotime($date),'Y-m-d'); 
    }
}
function format_dmy($date){
	return date_format(date_create($date),'d-m-Y'); 
}
function human_date($date) 
{
	$date = date("j F Y",strtotime($date));
	return $date;
}

function human_date_leader($date) 
{
	$date = date("d F Y",strtotime($date));
	return $date;
}

function event_date($date) 
{
	$date = date("d M",strtotime($date));
	return $date;
}
function absen_date($date) 
{
	$date = date("d M Y",strtotime($date));
	return $date;
}
function format_hm($waktu) 
{
	$array3=explode(":",$waktu);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	return $jam.':'.$menit;
}
function konversi_minute_to_hm($minute){
	$jam= floor($minute / 60);
	$jam=str_pad($jam, 2, '0', STR_PAD_LEFT);
	$menit= $minute % 60;
	$menit=str_pad($menit, 2, '0', STR_PAD_LEFT);
	return $jam.':'.$menit;
}
function date_hour_minute($tanggal) 
{
	$array1=explode("-",$tanggal);
	$tahun=$array1[0];
	$bulan=$array1[1];
	$sisa1=$array1[2];
	$array2=explode(" ",$sisa1);
	$tanggal=$array2[0];
	$sisa2=$array2[1];
	$array3=explode(":",$sisa2);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	return $jam.':'.$menit.':'.$detik;
}
function date_hour_minute_second($tanggal) 
{
	$array1=explode("-",$tanggal);
	$tahun=$array1[0];
	$bulan=$array1[1];
	$sisa1=$array1[2];
	$array2=explode(" ",$sisa1);
	$tanggal=$array2[0];
	$sisa2=$array2[1];
	$array3=explode(":",$sisa2);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	return $jam.':'.$menit.':'.$detik;
}
/*
Untuk menghitung jumlah dalam satuan hari:

$jumlah_hari = floor($selisih_waktu/86400);

Untuk menghitung jumlah dalam satuan jam:
$sisa = $selisih_waktu % 86400;
$jumlah_jam = floor($sisa/3600);

Untuk menghitung jumlah dalam satuan menit:
$sisa = $sisa % 3600;
$jumlah_menit = floor($sisa/60);

Untuk menghitung jumlah dalam satuan detik:
$sisa = $sisa % 60;
$jumlah_detik = floor($sisa/1)*/
function selisih_hari($tgl1,$tgl2){	
	$selisih = strtotime($tgl2) -  strtotime($tgl1);
	$hari = $selisih/(60*60*24);
	return $hari;
}

function selisih_waktu_jam($oldTime, $newTime) {
	$array1=explode("-",$oldTime);
	$tahun=$array1[0];
	$bulan=$array1[1];
	$sisa1=$array1[2];
	$array2=explode(" ",$sisa1);
	$oldTime=$array2[0];
	$sisa2=$array2[1];
	$array3=explode(":",$sisa2);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	$waktu_tua=mktime($jam,$menit,$detik,$bulan,$oldTime);
	
	$array1=explode("-",$newTime);
	$tahun=$array1[0];
	$bulan=$array1[1];
	$sisa1=$array1[2];
	$array2=explode(" ",$sisa1);
	$newTime=$array2[0];
	$sisa2=$array2[1];
	$array3=explode(":",$sisa2);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	$waktu_muda=mktime($jam,$menit,$detik,$bulan,$newTime);
	$selisih_waktu = $waktu_tua - $waktu_muda;
	$selisih_waktu = $selisih_waktu / 3600;
	
	return $selisih_waktu;
}
function selisih_waktu_menit($oldTime, $newTime) {
	$array1=explode("-",$oldTime);
	$tahun=$array1[0];
	$bulan=$array1[1];
	$sisa1=$array1[2];
	$array2=explode(" ",$sisa1);
	$oldTime=$array2[0];
	$sisa2=$array2[1];
	$array3=explode(":",$sisa2);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	$waktu_tua=mktime($jam,$menit,$detik,$bulan,$oldTime,$tahun);
	
	$array1=explode("-",$newTime);
	$tahun=$array1[0];
	$bulan=$array1[1];
	$sisa1=$array1[2];
	$array2=explode(" ",$sisa1);
	$newTime=$array2[0];
	$sisa2=$array2[1];
	$array3=explode(":",$sisa2);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	$waktu_muda=mktime($jam,$menit,$detik,$bulan,$newTime,$tahun);
	$selisih_waktu = $waktu_tua - $waktu_muda;
	$selisih_waktu = $selisih_waktu / 60;
	
	return $selisih_waktu;
}
function selisih_jam_menit($oldTime, $newTime) {
	//return $oldTime.'- new'.$newTime;
	$array3=explode(":",$oldTime);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	$waktu_tua=mktime($jam,$menit,$detik,1,1,2014);	
	$array3=explode(":",$newTime);
	$jam=$array3[0];
	$menit=$array3[1];
	$detik=$array3[2];
	
	$waktu_muda=mktime($jam,$menit,$detik,1,1,2014);	
	$selisih_waktu = $waktu_tua - $waktu_muda;
	$selisih_waktu = $selisih_waktu / 60;
	
	return $selisih_waktu;
}
function bulan_date($date) 
{
	$date = date("F Y",strtotime($date));
	return $date;
}

function tahun_date($date) 
{
	$date = date("Y",strtotime($date));
	return $date;
}

function home_date() 
{
	$date = date("l, j F Y");
	return $date;
}

function human_date_short($date) 
{
	if($date != '' && $date != '0000-00-00'){
        $date = date("d-m-Y",strtotime($date));
    }else{
        $date = '';
    }
	return $date;
}

function human_date_mid($date) 
{
	$date = date("j M Y",strtotime($date));
	return $date;
}

function human_date_time($date) 
{
	$date = date("d-m-Y h:i:s ",strtotime($date));
	return $date;
}

function sitemap_date($date) 
{
	$date = date("Y-m-d",strtotime($date));
	$time = date("h:i:s+07:00",strtotime($date));
	return $date."T".$time;
}

function last_login_date($date) 
{
	if($date != '' && $date != '0000-00-00 00:00:00'){
		$date = date("j F Y h:i:s",strtotime($date));
	}else{
		$date = 'First Login';
	}
	return $date;
}


function last_login_date_admin($date) 
{
	if($date != '' && $date != '0000-00-00 00:00:00'){
		$date = date("d-m-Y h:i:s",strtotime($date));
	}else{
		$date = '-';
	}
	return $date;
}

function human_date_full($date) 
{
	$date = date("l, j F Y",strtotime($date));
	return $date;
}

function human_date_admin($date) 
{
	$date = date("d-m-Y h:i",strtotime($date));
	return $date;
}

/* END DATE Function */


/* Permission Function */

function permission_basic_admin($session)
{
	//print_r($session->userdata('logged_in'));exi
    if(!$session->userdata('logged_in')){
		$session->set_flashdata('error',true);
		$session->set_flashdata('message_flash','Access Denied');
        $session->set_userdata(array('referer' => current_url()));
		redirect('user/login');
	}
}

function permission_admin_logged_in($session)
{
	if($session->userdata('logged_in')){
		$session->set_flashdata('error',true);
		$session->set_flashdata('message_flash','Access Denied');
		redirect('home');
	}
}

function permission_super_admin($session)
{
	if($session->userdata('role') !='A' && $session->userdata('role') !='SA'){
		$session->set_flashdata('error',true);
		$session->set_flashdata('message_flash','Access Denied');
        $session->set_userdata(array('referer' => current_url()));
		redirect('user/login');
	}
}

function type_user($level)
{	
	if($level !=''){
		$userlevel = array(	
					"SA" => "Super Admin",
					"A" => "Administrator",
					"AD" => "Auditor",
					"VL" => "V-Legal",
					"C" => "Client",
					"O" => "Operator",
					"R" => "Reviewer",
					);
		return $userlevel[$level];
	}else{
		return '';
	}
}

/* END Permission Function */

/* Paging Function */

function paging_front($row,$url,$urisegment=3,$perpage=10){
	$config = array();
	$config['base_url'] = site_url($url);
	$config['uri_segment'] = $urisegment;
	$config['total_rows'] = $row;
	$config['per_page'] = $perpage; 
	$config['first_link'] = false;
	$config['next_link'] = '<span class="linkbox">'.lang('next').'</span>';
	$config['prev_link'] = '<span class="linkbox">'.lang('prev').'</span>';
	$config['num_tag_open'] = '<span class="linkbox">';
	$config['num_tag_close'] = '</span>';
	$config['cur_tag_open'] = '<span class="linkbox">';
	$config['cur_tag_close'] = '</span>';
	return $config;
}

function paging_admin($row,$url,$uri_segment = 3,$per_page = 5){
	$config = array();
	$config['base_url'] = site_url($url);
	$config['uri_segment'] = $uri_segment;
	$config['total_rows'] = $row;
	$config['per_page'] = $per_page; 	
	$config['num_links'] = 2;
	$config['full_tag_open'] = '<div class="dataTables_paginate paging_full_numbers">';
	$config['full_tag_close'] = '</div>';
	$config['first_link'] = 'First';
	$config['last_link'] = 'Last';
	$config['next_link'] = 'Next';
	$config['prev_link'] = 'Prev';
	$config['cur_tag_open'] = '<a class="paginate_active">';
	$config['cur_tag_close'] = '</a>';
	//$config['anchor_class'] = 'class="paginate_button"';
    $config['attributes'] = array('class' => 'paginate_button');
	//$config['anchor_class_first'] 	= 'class="first paginate_button"';
	//$config['anchor_class_next'] 	= 'class="next paginate_button"';
	//$config['anchor_class_prev']	= 'class="previous paginate_button"';
	//$config['anchor_class_last'] 	= 'class="last paginate_button"';

	
	return $config;
}
/* Paging Function */

/* WYSIWYG Function */

function replace_image_url($content){
    
	$isi=str_replace('"images/','"'.base_url().'images/',str_replace('../','',$content));
	return $isi;
}


function replace_image_url_asset($content){
	$isi=str_replace('../../',base_url(),$content);
	return $isi;
}

function replace_image_url2($content){
	$isi=str_replace('../','',$content);
	$isi = str_replace(' src="images', ' src="'.base_url().'images', $isi);
	return $isi;
}

/* END WYSIWYG Function */


/*Admin Error Message */
function error_success($session){
	if($session->flashdata('error')){
		return error_message($session->flashdata('message_flash'));
	}elseif($session->flashdata('confirm')){
		return succes_message($session->flashdata('message_flash'));
	}else{
		return '';
	}
}

function error_message($message){
	return '<div class="alert alert-error">
				<h4><strong>Error notification:</strong></h4>'.$message.'
			</div>';
}

function succes_message($message){
	return '<div class="alert alert-success">
					<h4><strong>Success notification:</strong></h4>'.$message.'
			</div>';
}

function error_success_front($session){
	if($session->flashdata('error')){
		return error_message_front($session->flashdata('message_flash'));
	}elseif($session->flashdata('confirm')){
		return succes_message_front($session->flashdata('message_flash'));
	}else{
		return '';
	}
}

function error_message_front($message){

	return '<div class="alert alert-error">
				<h4><strong>Error notification:</strong></h4>'.$message.'
			</div>';
}

function succes_message_front($message){
	return '<div class="alert alert-success">
				<h4><strong>Success notification:</strong></h4>'.$message.'
			</div>';
}


function format_angka($angka,$desimal){
	return number_format($angka,$desimal);
}

function hapus_koma($angka,$delimiter = ","){
	return str_replace($delimiter,"",$angka);
}

function periode_anggaran($text){
	$bulan = array('01' => "Januari",'02' => "Februari",'03' => "Maret",'04' => "April",'05' => "Mei",'06' => "Juni",'07' => "Juli",'08' => "Agustus",'09' => "September",'10' => "Oktober",'11' => "November",'12' => "Desember",);
	$bln = substr($text,-2);
	$thn = substr($text,0,4);
	return $bulan[$bln]." ".$thn;
}

function terbilang($x)
{
  $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . " Belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " Puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return " Seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " Ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return " Seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " Ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " Juta" . terbilang($x % 1000000);
  elseif ($x < 1000000000000)
	//print_r();exit();
    return terbilang($x / 1000000000) . " Milyar" . terbilang(fmod($x,1000000000));
}

function image_to_base64($path)
{
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	return $base64;
}

function to_mysql_date($date)
{
    return date_format(date_create($date),'Y-m-d');
}

function to_mysql_number($angka){
	return str_replace(",",".",str_replace(".","",$angka));
}

function check_date_null($date)
{
    if($date == '0000-00-00'){
        return $date;
    }else{
        return '';
    }
    

}
function gabung_no_ncr($ref,$no){
    $length =  (strlen($no) > 5)? strlen($no) : 5;
    return $ref.str_pad($no,$length,'0',STR_PAD_LEFT);
}

function permission_backend_logged_in($session){
	if($session->userdata('logged_in')){
		$session->set_flashdata('error',true);
		$session->set_flashdata('message_flash','Access Denied');
		redirect('dashboard');
	}
}   

?>