<?php
class Home_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
	
	function project_activity($limit,$auditor_id=0,$scope=0)
    {
		$this->db->select('project_log.*,project.*,user.nama as nama_user,user.alamat,user.avatar,clients.nama as nama_client');
		$this->db->from('project_log');
		$this->db->join('user', 'user.id = project_log.user_id','left');	
		$this->db->join('project', 'project.id = project_log.project_id');	
        $this->db->join('clients', 'clients.id = project.client_id');	
        $this->db->where('project.deleted',0);
        
        if($auditor_id != 0){
            $this->db->join('project_auditor',"project_auditor.project_id = project.id AND project_auditor.auditor_id = $auditor_id");
        }
        
        if($scope != 0){
            $this->db->where('clients.client_type', $scope);	
        }
        
		$this->db->order_by('project_log.tgl_log','DESC');
		$this->db->limit($limit);
		$query = $this->db->get(); 	
		return $query->result();
    }	
    
    function jumlah_audit($client_id=0,$auditor_id=0,$scope=0)
    {
        $this->db->select("SUM(CASE WHEN project.status = 1 THEN 1 END) as started,
                           SUM(CASE WHEN project.status = 2 THEN 1 END) as open_audit,
                           SUM(CASE WHEN project.status = 3 THEN 1 END) as closed_audit,
                           SUM(CASE WHEN project.status = 4 THEN 1 END) as open_ncr,
                           SUM(CASE WHEN project.status = 5 THEN 1 END) as review,
                           SUM(CASE WHEN project.status = 6 THEN 1 END) as closed_project",null,false);
        $this->db->from('project');
        $this->db->join('clients','project.client_id = clients.id');
        
        $this->db->where('project.deleted',0);
        
        if($auditor_id != 0){
            $this->db->join('project_auditor',"project_auditor.project_id = project.id AND project_auditor.auditor_id = $auditor_id");
        }
        
        if($client_id != 0){
            $this->db->where('project.client_id', $client_id);	
        }
        
        if($scope != 0){
            $this->db->where('clients.client_type', $scope);	
        }
        
        $query = $this->db->get();
        return $query->row_array();
        
    }
    
    function jumlah_ncr_audit($client_id=0,$auditor_id=0,$scope=0)
    {
        $this->db->select("SUM(CASE WHEN project_ncr.status = 0 AND DATEDIFF(project_ncr.dateline,CURDATE()) > 7 THEN 1 END) as ncr_open,
                           SUM(CASE WHEN project_ncr.status = 0 AND DATEDIFF(project_ncr.dateline,CURDATE()) BETWEEN 0 AND 7 THEN 1 END) as ncr_warning,
                           SUM(CASE WHEN project_ncr.status = 0 AND DATEDIFF(project_ncr.dateline,CURDATE()) < 0 THEN 1 END) as ncr_overdue,
                           SUM(CASE WHEN project_ncr.status = 0 THEN 1 END) as ncr_closed",null,false);
        $this->db->from('project_ncr');
        $this->db->join('project','project_ncr.project_id = project.id');
        
        $this->db->join('clients','project.client_id = clients.id');
        $this->db->where('project.deleted',0);
        
        if($auditor_id != 0){
            $this->db->join('project_auditor',"project_auditor.project_id = project.id AND project_auditor.auditor_id = $auditor_id");
        }
        
        if($client_id != 0){
            $this->db->where('project.client_id', $client_id);	
        }
        
        if($scope != 0){
            $this->db->where('clients.client_type', $scope);	
        }
       
        $query = $this->db->get();
        return $query->row_array();
        
    }
}

?>