<?php
	class Admin extends MX_Controller{    			
		
	function __construct()
	{
		parent::__construct();			
		$this->load->library('form_validation');		
	}
	
	function index()
	{
		if($this->input->post('submit_detail'))
		{
			if($this->form_validation())
			{
				$updateArray = array('admin_name' => $this->input->post('fullname'),
									'username' => $this->input->post('username'),
									'password' => $this->input->post('password'), 
									'email'	=> $this->input->post('email'));																			
				$this->general_db_model->update('admins', $updateArray, array('admin_id' => $this->session->userdata('admin_user_id')));
				//die($this->db->last_query());
				redirect('admin/home');
			} 			
		}
		else
		{
			$data['validation_error'] = true;
			$data['details'] = $this->general_db_model->getById('admins', 'admin_id', $this->session->userdata('admin_user_id'));		
		}		
		
		$this->template->load('template','personal_form', @$data);
	}
			
	
	function form_validation()
	{
		$this->form_validation->set_rules('fullname', 'Admin Name', 'trim|required');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confrompassword]');
		$this->form_validation->set_rules('confrompassword','Conform password', 'trim|required');
		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
		if($this->form_validation->run()=== false)
		{
			return false;
		}
		else
		{
			return true;
		}	
	}		
}
?>
