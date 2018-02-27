<?php
	class Admin extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			//$this->load->model('slideshow_model');
		}

		function index()
		{
			if($this->input->post('submitDetail'))
			{
				$this->add_edit('1');
				die();
			}
			$data['details'] = $this->general_db_model->getAll('tbl_contacts');	
			$data['details'] = $this->general_db_model->getById('tbl_contacts' ,'id','1');
			//print_r($data['details']);
			$data['page_title'] = 'Edit Contact Details';
			$this->template->load('template','contact_form', $data);
		}
	
		function add_edit($id=NULL)
		{
			$not = array('submitDetail');		
			$post = $this->mylibrary->get_post_array($not);
			//dumparray($post);
			$this->general_db_model->update('tbl_contacts', $post, 'id = '.$id);
			$this->session->set_flashdata('display_message', 'Contact Details successfully updated.');
			redirect('admin/contacts');
		}
}
?>