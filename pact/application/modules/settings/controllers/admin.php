<?php
	class Admin extends CI_Controller{
		
		function __construct(){
			parent::__construct();					
		}
		
		function index()
		{
			$data['setting'] = $this->general_db_model->getAll('site_settings');																
			$this->template->load('template','listing_settings',$data);
		}
		
		function edit($id=''){
			
			if($this->input->post('submit_detail'))
			{
				
				$updateArray = array('title' => $this->input->post('title'),
									'description' => $this->input->post('description'),
									'value' => $this->input->post('setting_value'));																			
				$this->general_db_model->update('site_settings', $updateArray, array('id' => $id));
				$this->session->set_flashdata('success_message', 'Settings successfully updated.');
				redirect('admin/settings');
				die(); 			
			}
			else
			{				
				$data['details'] = $this->general_db_model->getById('site_settings', 'id', $id);		
			}					
			$this->template->load('template','setting_form', @$data);																		
		} 
		
	}
?>
