<?php
	class Homemodel extends CI_Model{
	
		function __construct(){
			parent::__construct();
		}
		
		function pages($slug){
			$this->db->where("page_slug = '".$slug."'");
			$qry = $this->db->get('static_pages');
			$row = $qry->row();
			return $row;	
			
		}
	
	}		
?>