<?php
class Admin extends CI_Controller{
	function __construct()
	{
		parent::__construct();				
	}
	function index()
	{		
		redirect('login');
		exit();
	}
	
	
	

	
}//home extends closed
?>