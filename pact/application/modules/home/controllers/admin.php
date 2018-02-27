<?php
class Admin extends MX_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('homemodel');
	}	
    	
	function index(){
		if(isset($this->session->userdata)){
		$this->template->set('title', 'Home');
		$data['page_title']='Admin Panel';
      	$this->template->load('template', 'admin/home',$data);}
		else{
			redirect('admin/login');
			}
	}		
}
?>