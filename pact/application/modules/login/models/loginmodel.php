<?php
	class LoginModel extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->table = 'admins';
			$this->tbllog ='userlog';
			
		}
		
		//check valid username and password
		function checkuser($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			return $this->db->get($this->table);
		}						
	
	}
?>