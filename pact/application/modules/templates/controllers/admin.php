<?php
	class Admin extends CI_Controller{
		
		function __construct(){
			parent::__construct();					
		}
		
		function index()
		{			
			$data['total_templates'] = $this->general_db_model->countTotal('email_templates');
			$data['template'] = $this->general_db_model->get_with_limit( 'email_templates' , $this->settings->item('rows_per_page'), @$_GET['template']);			
			create_pagination(base_url().'admin/templates/index/?pagi=1',$data['total_templates'], 4, $this->settings->item('rows_per_page'));																		
			$this->template->load('template','listing_templates',$data);
		}
						
		function add()
		{
			if($this->input->post('submit_detail'))
			{
				$this->add_edit();
			}
			
			$data['template_title'] = 'Add Template';
			$this->template->load('template','template_form', @$data);
		}
	
		function edit($id)
		{
			if($this->input->post('submit_detail'))
			{
				$this->add_edit($id);
			}
					
			$data['details'] = $this->general_db_model->getById('email_templates', 'id', $id);	
			//print_r($data['details']);
			$data['template_title'] = 'Edit Template';
			$this->template->load('template','template_form', @$data);
		}
	
		function add_edit($id=NULL)
		{						
			$insertArray = array('title'=>$this->input->post('title'),
								'slug'=>$this->input->post('slug'),
								'subject'=>$this->input->post('subject'),
								'content'=>$this->input->post('content')									
								);
			
			if($id)
			{
				$this->general_db_model->update('email_templates', $insertArray, 'id = '.$id);
				$this->session->set_flashdata('display_message', 'Template successfully updated.');
			}
			else
			{
				$this->general_db_model->insert('email_templates', $insertArray);
				$this->session->set_flashdata('display_message', 'Template successfully added.');
			}		
			redirect('admin/templates');
		}
	
		function delete($id)
		{
			$this->general_db_model->delete('email_templates', 'id = '.$id);
			$this->session->set_flashdata('display_message', 'Template successfully deleted.');
			redirect(admin_url('templates'));
		}
		
}
?>
