<?php

function tool_email($link) {
	$tool = anchor($link,'<span class="ibb-mail"></span>',array('title'=>'Resend Email'));
	return $tool;
}


function tool_edit($link) {
	$tool = anchor($link,'<span class="ibb-edit"></span>',array('title'=>'Edit'));
	return $tool;
}

function tool_audit($link) {
	$tool = anchor($link,'<span class="ibb-list"></span>',array('title' => "Input Audit Checklist"));
	return $tool;
}

function tool_qq($link) {
	$tool = anchor($link,'<span class="ibb-text_document"></span>',array('title' => "Input Q &amp; Q Check Detail"));
	return $tool;
}

function tool_submit_checklist($link) {
	$tool = anchor($link,'<span class="ibb-ok"></span>',array('title' => "Submit Checklist",'onClick' => 'return confirm(\'Submit Checklist ?\')'));
	return $tool;
}

function tool_approve_checklist($link) {
	$tool = anchor($link,'<span class="ibb-ok"></span>',array('title' => "Approve Checklist",'onClick' => 'return confirm(\'Approve Checklist ?\')'));
	return $tool;
}

function tool_reject_checklist($link) {
	$tool = anchor($link,'<span class="ibb-cancel"></span>',array('title' => "Reject Checklist",'onClick' => 'return confirm(\'Reject Checklist ?\')'));
	return $tool;
}
function tool_reject_ncr($link) {
	$tool = anchor($link,'<span class="ibb-cancel"></span>',array('title' => "Reject NCR"));
	return $tool;
}

function tool_remove($link) {
	$tool =  anchor($link, '<span class="ibb-delete"></span>',array('title' => 'Remove','onClick' => 'return confirm(\'Delete ?\')'));
	return $tool;
}
function tool_active($link) {
	$tool =  anchor($link, '<span class="ibb-ok"></span>',array('title' => 'Activate','onClick' => 'return confirm(\'Activate ?\')'));
	return $tool;
}
function tool_publish($link) {
	$tool =  anchor($link, '<span class="ibb-up"></span>',array('title' => 'Publish','onClick' => 'return confirm(\'Publish ?\')'));
	return $tool;
}

function tool_unpublish($link) {
	$tool =  anchor($link, '<span class="ibb-down"></span>',array('title' => 'Unpublish','onClick' => 'return confirm(\'Unpublish ?\')'));
	return $tool;
}
function tool_unactive($link) {
	$tool =  anchor($link, '<span class="ibb-cancel"></span>',array('title' => 'Inactivate','onClick' => 'return confirm(\'Inactivate ?\')'));
	return $tool;
}

function tool_download($link) {
	$tool =  anchor($link, '<span class="ibb-download"></span>', array('title' => 'Download File','target' => '_blank'));
	return $tool;
}

function tool_view($link) {
	$tool =  anchor($link, '<span class="ibb-folder"></span>', array('title' => 'View'));
	return $tool;
}

function tool_download_pdf($link) {
	$tool =  anchor($link, '<span class="ibb-download"></span>', array('title' => 'Download Checklist as PDF','target' => '_blank'));
	return $tool;
}

function tool_posisi($link) {
	$tool = anchor($link,'<span class="ibb-text_document"></span>',array('title' => "Cek Posisi Audit SPBU"));
	return $tool;
}

function tool_tahapan($link) {
	$tool = anchor($link,'<span class="ibb-list"></span>',array('title' => "Tambah / Ubah Tahapan Audit"));
	return $tool;
}
function tool_iui($link) {
	$tool = anchor($link,'<span class="ibb-text_document"></span>',array('title' => "Tambah / Ubah IUI"));
	return $tool;
}
function tool_add_auditor($link) {
	$tool = anchor($link,'<span class="ibb-users"></span>',array('title' => "Tambah / Ubah Auditor"));
	return $tool;
}
function tool_user($link) {
	$tool = anchor($link,'<span class="ibb-users"></span>',array('title' => "Tambah / Ubah Client User"));
	return $tool;
}

function tool_log_project($link) {
	$tool = anchor($link,'<span class="ibb-grid"></span>',array('title' => "Log Project"));
	return $tool;
}
function tool_auditor_spec($link) {
	$tool = anchor($link,'<span class="ibb-target"></span>',array('title' => "Add / Edit Auditor Spesifikasi"));
	return $tool;
}
function tool_client_stuff($link) {
	$tool = anchor($link,'<span class="ibb-brush"></span>',array('title' => "Add / Edit Client Stuffing"));
	return $tool;
}

function tool_start_project($link) {
	$tool = anchor($link,'<span class="ibb-power"></span>',array('title' => "Start Project",'onClick' => 'return confirm(\'Start Project ?\')'));
	return $tool;
}

function tool_open_audit($link) {
	$tool = anchor($link,'<span class="ibb-right_circle"></span>',array('title' => "Open Audit",'onClick' => 'return confirm(\'Open Audit ?\')'));
	return $tool;
}

function tool_close_audit($link) {
	$tool = anchor($link,'<span class="ibb-ok"></span>',array('title' => "Close Audit",'onClick' => 'return confirm(\'Close Audit ?\')'));
	return $tool;
}

function tool_close_ncr_item($link) {
	$tool = anchor($link,'<span class="ibb-ok"></span>',array('title' => "Close NCR",'onClick' => 'return confirm(\'Close NCR ?\')'));
	return $tool;
}

function tool_close_project($link) {
	$tool = anchor($link,'<span class="ibb-ok"></span>',array('title' => "Close Project",'onClick' => 'return confirm(\'Close Project ?\')'));
	return $tool;
}

function tool_log_audit($link) {
	$tool = anchor($link,'<span class="ibb-zoom"></span>',array('title' => "Log Audit"));
	return $tool;
}

function tool_progress($link) {
	$tool = anchor($link,'<span class="ibb-list"></span>',array('title' => "Progress Project"));
	return $tool;
}

function tool_observation($link) {
	$tool = anchor($link,'<span class="ibb-calc"></span>',array('title' => "Observation Report"));
	return $tool;
}

function tool_view_observation($link) {
	$tool = anchor($link,'<span class="ibb-calc"></span>',array('title' => "View Observation Report"));
	return $tool;
}

function tool_ncr($link) {
	$tool = anchor($link,'<span class="ibb-calendar"></span>',array('title' => "Non Confirmiance Report (NCR)"));
	return $tool;
}

function tool_view_ncr($link) {
	$tool = anchor($link,'<span class="ibb-calendar"></span>',array('title' => "View Non Confirmiance Report (NCR)"));
	return $tool;
}

function tool_open_ncr($link) {
	$tool = anchor($link,'<span class="ibb-unlock"></span>',array('title' => "Open NCR",'onClick' => 'return confirm(\'Open NCR ?\')'));
	return $tool;
}

function tool_close_ncr($link) {
	$tool = anchor($link,'<span class="ibb-lock"></span>',array('title' => "Close NCR",'onClick' => 'return confirm(\'Close NCR ?\')'));
	return $tool;
}

function tool_correction($link) {
	$tool = anchor($link,'<span class="ibb-settings"></span>',array('title' => "Correction and Corrective Action"));
	return $tool;
}

function tool_doc_checklist($link) {
	$tool = anchor($link,'<span class="ibb-empty_document"></span>',array('title' => "Document Checklist"));
	return $tool;
}

function tool_reporting($link) {
	$tool = anchor($link,'<span class="ibb-documents"></span>',array('title' => "Project Reporting"));
	return $tool;
}
function tool_review($link) {
	$tool = anchor($link,'<span class="ibb-text_document"></span>',array('title' => "Review Project"));
	return $tool;
}
function tool_sertifikat($link) {
	$tool = anchor($link,'<span class="ibb-picture"></span>',array('title' => "Download Surat Keputusan"));
	return $tool;
}

function tool_dismiss($link) {
	$tool = anchor($link,'<span class="icon-remove icon-white"></span>',array('title' => "Dismiss"));
	return $tool;
}

function tool_banding($link) {
	$tool = anchor($link,'<span class="ibb-refresh"></span>',array('title' => "Banding",'onClick' => 'return confirm(\'Banding Project ?\')'));
	return $tool;
}

function tool_project_auditor($link) {
	$tool = anchor($link,'<span class="ibb-plus"></span>',array('title' => "Add Auditor to Project",'onClick' => 'return confirm(\'Add Auditor to Project ?\')'));
	return $tool;
}
function tool_remove_auditor($link) {
	$tool =  anchor($link, '<span class="ibb-minus"></span>',array('title' => 'Remove Auditor From Project','onClick' => 'return confirm(\'Remove Auditor from Project ?\')'));
	return $tool;
}


?>