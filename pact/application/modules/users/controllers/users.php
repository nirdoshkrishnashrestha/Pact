<?php
	class Users extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->container = 'container';
			$this->load->model('usermodel');			
			if($this->session->userdata('userid')=='')
				redirect('login','location');			
		}
		
		function index(){						
			$this->manage();			
		}
		
		function manage(){	
												
			$data['user'] = $this->usermodel->listings();					
			$data['page_title'] = "Manage Users";
			$data['pagination'] = $this->pagination->create_links();
			$data['page'] = 'users/listing_users';
			$this->template->load('template','listing_users',$data);			
		}
		
		function add(){			
			$currentDate = currentTimestamp();			
			$mydata = array('first_name' => $this->input->post('txtFirstName'),
							'last_name' => $this->input->post('txtLastName'),
							'address' => $this->input->post('txtAddress'),
							'zone' => $this->input->post('selZone'),
							'district' => $this->input->post('selDistrict'),
							'contact_no' => $this->input->post('txtContactNo'),
							'description' => nl2br($this->input->post('description')),
							'department_id' => $this->input->post('txtDepartment'),
							'user_post' => $this->input->post('selPost'),
							'email' => $this->input->post('txtEmail'),
							'photo' => $this->input->post('filename'),
							'user_group_id'=>$this->input->post('selGroup'),
							'added_date' => $currentDate);
			$this->usermodel->add($mydata);			
			$lastid =$this->db->insert_id();	
			$row = $this->usermodel->details($lastid);														
				
				echo '<input type="checkbox" value="'.$lastid.'" id="selected" name="selected[]">^^'.$this->input->post('txtFirstName').' '.$this->input->post('txtLastName').'^^'.$this->input->post('txtAddress').'^^'.$this->input->post('txtContactNo').'^^'.$this->input->post('txtEmail').'^^'.$row->department_name.'^^'.$row->post.'^^'.getDateTmeFormatted($currentDate).'^^<span class="table-icons"><a href="javascript:;" rel="users/details/'.$lastid.'" class="icons-table-actions icon-view-table-action viewdetails" title="View">View</a>&nbsp;&nbsp;<a id="'.$lastid.'" href="javascript:;" class="edit editRow icons-table-actions icon-edit-table-action" rel="users/edit/'.$lastid.'" title="Edit">Edit</a>&nbsp;&nbsp;<a href="javascript:;" class="edit deleteRow icons-table-actions icon-delete-table-action" rel="users/delete/'.$lastid.'" title="Delete">Delete</a></span>';									
		}
		 
		//function for edit record
		
		function edit(){
			if($this->session->userdata('userid')!=""){
				
				$id = $this->input->post('main_id');
							
				$mydata = array('first_name' => $this->input->post('txtFirstName'),
							'last_name' => $this->input->post('txtLastName'),
							'address' => $this->input->post('txtAddress'),
							'zone' => $this->input->post('selZone'),
							'district' => $this->input->post('selDistrict'),
							'contact_no' => $this->input->post('txtContactNo'),
							'description' => nl2br($this->input->post('description')),
							'department_id' => $this->input->post('txtDepartment'),
							'user_post' => $this->input->post('selPost'),
							'email' => $this->input->post('txtEmail'),							
							'user_group_id'=>$this->input->post('selGroup'));
							
							if($this->input->post('filename')!='')
								$mydata['photo']= $this->input->post('filename');
						
										
					$this->usermodel->edit($id,$mydata);	
						$ssql = $this->db->last_query();			
					$row = $this->usermodel->details($id);													
					
					echo '<input type="checkbox" value="'.$id.'" id="selected" name="selected[]">^^'.$this->input->post('txtFirstName').' '.$this->input->post('txtLastName').'^^'.$this->input->post('txtAddress').'^^'.$this->input->post('txtContactNo').'^^'.$this->input->post('txtEmail').'^^'.$row->department_name.'^^'.$row->post.'^^'.getDateTmeFormatted($row->added_date).'^^<span class="table-icons"><a href="javascript:;" rel="users/details/'.$id.'" class="icons-table-actions icon-view-table-action viewdetails" title="View">View</a>&nbsp;&nbsp;<a id="'.$id.'" href="javascript:;" class="edit editRow icons-table-actions icon-edit-table-action" rel="users/edit/'.$id.'"  title="Edit">Edit</a>&nbsp;&nbsp;<a href="javascript:;" class="edit deleteRow icons-table-actions icon-delete-table-action" rel="users/delete/'.$id.'" title="Delete">Delete</a>';
				
			}else{
				echo 'login';	
			}		
		} 
		//delete blog details
		function delete($id){
			if($this->session->userdata('userid')!=""){
				//$id = $this->uri->segment(3);
				$this->usermodel->delete($id);				
				echo 'Record deleted successfully !';
			}else{		
				echo 'login';
			}
		}
		//delete blog details
		function deleteSelected(){	
			//$ids = implode(',',$_POST['selected']);		
			 $this->usermodel->delete($_POST['selected']);				
			echo 'Record deleted successfully !';		
		}
		//change status
		function changestatus(){
			if($this->session->userdata('userid')==''){
				redirect('login','location');
			}else{		
				$id = $this->uri->segment(4);
				$status = $this->uri->segment(3);
				if($status =='1'){
					$value['details']['status'] = '0';
				}else{
					$value['details']['status'] = '1';
				}				
				//$this->session->set_flashdata('message','Category Status Changed Successfully');
				$this->usermodel->edit($id,$value['details']);
				
				$newstatus = ($value['details']['status']==1)?"Published":"Unpublished";
				echo $newstatus.'^^users/changestatus/'.$value['details']['status'].'/'.$id;
			}
		}	
		function loadForm($editid=''){				
			if($editid!='')
				$data['row'] = $this->usermodel->details($editid);
			
			echo $this->load->view('userForm',@$data, true);	
		}
		
		function details($id=''){							
			$data['row'] = $this->usermodel->details($id);			
			echo $this->load->view('details',@$data, true);	
		}
		
		function testUploadify(){
			$this->template->load('template1','uploadfile');
		}
	}
?>
