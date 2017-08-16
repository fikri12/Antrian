<?
function basic_info() {
	$CI =& get_instance();
	$data = array(
		'site_url' 						=> site_url(),	
		'base_url' 						=> base_url(),
		'css_path' 						=> base_url().'assets/css/',
		'js_path' 						=> base_url().'assets/js/',
		'images_path' 					=> base_url().'assets/images/',
		'fonts_path' 					=> base_url().'assets/fonts/',

		
	);
	return $data;
}

function admin_info() {
	$CI =& get_instance();
	$data = array(
		'admin_url' 					=> site_url().'admin/',	
		'site_url' 						=> site_url(),	
		'base_url' 						=> base_url(),
		'current_url' 					=> current_url(),
		'assets_path' 					=> base_url().'admin_template/assets/',
		'css_path' 						=> base_url().'admin_template/css/',
		'js_path' 						=> base_url().'admin_template/js/',
		'img_path' 						=> base_url().'admin_template/img/',
		'audio_path' 					=> base_url().'admin_template/audio/',
		
		'current_date'					=> date("Y-m-d"),
		
		'avatar_path' 			        => base_url().'assets/avatar/',
		'avatar_thumbs_path' 			=> base_url().'assets/avatar/thumbs/',
        'auditor_avatar_path' 			=> base_url().'assets/avatar_auditor/',
		'auditor_avatar_thumbs_path' 	=> base_url().'assets/avatar_auditor/thumbs/',
		'doc_checklist_path'            => base_url().'assets/doc_checklist/',
		'review_path'                   => base_url().'assets/review/',
		
		'userid' 						=> $CI->session->userdata('userid'),
		'usr_username' 					=> $CI->session->userdata('username'),
		'user_nama' 					=> $CI->session->userdata('nama'),
		'user_avatar' 					=> $CI->session->userdata('avatar'),
		'user_alamat' 					=> $CI->session->userdata('alamat'),
		'user_last_login' 				=> ($CI->session->userdata('last_login') != null)? human_date_admin($CI->session->userdata('last_login')) : "First Login",
		'user_role' 					=> $CI->session->userdata('role'),
		'user_role_name' 			    => type_user($CI->session->userdata('role')),
		'server_time' 			        => date('d-m-Y H:i:s'),
		
		'notification_count'			=> $CI->config->item('notification_count'),

		'savesuccesmsg'					=> 'data telah berhasil disimpan.',
		'updatesuccesmsg'				=> 'data telah berhasil diubah.',
		'deletesuccesmsg'				=> 'data telah berhasil dihapus.',
		'deleteconfirmmsg'				=> 'Apakah anda yakin ingin menghapus data?',
		'notfoundmsg'					=> 'data tidak ditemukan.',
		'leavepagemsg'					=> 'Apakah anda yakin ingin berpindah halaman ?\nData yang sudah diinputkan akan dibatalkan.',
		
	);
	return $data;
}


function debug($var,$exit = false){
    print_r($var);
    if($exit) exit();

}


?>