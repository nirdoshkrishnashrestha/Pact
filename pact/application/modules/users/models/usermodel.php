<?php
	class UserModel extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->table = "user_info";
			$this->mainId = "id";
		}
		//list all 
		function listings(){
			$this->db->select('UI.*,U.username,U.password,U.status,U.security_code,G.group_name,D.department_name,P.post');
			$this->db->from('tbl_user_info as UI');
			$this->db->join('users as U', 'U.employee_id = UI.id','left outer');
			$this->db->join('user_group as G', 'G.id = UI.user_group_id','left outer');
			$this->db->join('departments as D', 'D.id = UI.department_id','left outer');
			$this->db->join('user_post as P', 'P.id = UI.user_post','left outer');
			$this->db->order_by('UI.id','desc');									
			$query = $this->db->get();
			//echo $this->db->last_query();
			//die();
			return $query->result_array();
		}
		
		//insert new 
		function add($data){
			$this->db->insert($this->table,$data);
			
		}
		
		//update details
		function edit($id,$data){
			$this->db->where($this->mainId,$id);
			$this->db->update($this->table,$data);
			
		}
		
		//get details
		function details($id){			
			$this->db->select('UI.*,U.username,U.password,U.status,U.security_code,G.group_name,D.department_name,P.post,Z.zone as zone_name,DS.district as district_name');
			$this->db->from('tbl_user_info as UI');
			$this->db->join('users as U', 'U.employee_id = UI.id','left outer');
			$this->db->join('user_group as G', 'G.id = UI.user_group_id','left outer');
			$this->db->join('departments as D', 'D.id = UI.department_id','left outer');
			$this->db->join('user_post as P', 'P.id = UI.user_post','left outer');
			$this->db->join('zone as Z', 'Z.id = UI.zone','left outer');
			$this->db->join('district as DS', 'DS.id = UI.district','left outer');
			$this->db->where('UI.id',$id);											
			$qry = $this->db->get();
			return $qry->row();	
		}	
		
		
		function delete($id){
			$this->db->where_in($this->mainId,$id);
			$this->db->delete($this->table);
			//echo $this->db->last_query();
		}			
	}
?>
