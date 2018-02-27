<?php
	class Admin extends MX_Controller{    			
		
		function __construct(){
			parent::__construct();
			$this->load->model('loginmodel');			
		}	
    	
		function index(){
			if($this->session->userdata('admin_user_id')!="" && $this->session->userdata('admin_name')!=""){
				redirect('admin/home','location');
			}else{
				$this->load->view('login');
			}
		}
		//function to check valid user
		function checkuser($fromJs = false){		
			
			if($this->session->userdata('admin_user_id')!="" && $this->session->userdata('admin_name')!=""){
				echo 'admin/home';
			}else{				
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				/// $_SESSION['id'] = session_id();
				/// $_SESSION['user'] = $username;
					$query = $this->loginmodel->checkuser($username,$password);
					//die($this->db->last_query());
					if($query->num_rows()>0){
						$row = $query->row();
						$query->free_result();
						$value['logdetails']['userid'] = $row->admin_id;						
						$value['logdetails']['log_time'] = currentTimestamp();
						$value['logdetails']['ip_address'] = $_SERVER["REMOTE_ADDR"];						
						$lastid = $this->general_db_model->insert('userlog',$value['logdetails']);
											
						$userdata = array('admin_user_id'=>$row->admin_id,'admin_name'=>$row->username ,'logid'=>$lastid);
						$this->session->set_userdata($userdata);
						// To set cookie
						if(isset($_POST['rememberme']))
						{
							$this->load->helper('cookie');
							$cookie1 = array(
										 'name'   => 'login_name',
										 'value'  => $this->input->post('username'),
										 'expire' => '300',
									   );
			
							set_cookie($cookie1);
							$cookie2 = array(
										 'name'   => 'login_pass',
										 'value'  => $this->input->post('password'),
										 'expire' => '300',
									   );
			
							set_cookie($cookie2);
						}
						if($fromJs)
							echo 'admin/home';
						else
						 	redirect('admin/home');						
												
					}else{	
					
						if($fromJs)
						{
							echo 'admin/home';
						}
						else		
						{			
							$this->session->set_flashdata('error_message','Wrong username or password'); 
							redirect('admin/login');
						}
				}								
			}			
		}
		
		// when admin logs out . 
		function logout(){			
			$value['details']['log_off'] = currentTimestamp();			
			$logid	= $this->session->userdata('logid');
			$this->general_db_model->update('userlog',$value['details'],array('logid'=>$logid));
			$this->session->sess_destroy();			
			//redirect(admin_url('admin'));
			redirect('admin/login');
		}	
		
		function admin(){
			$this->load->view('admin');
		}
		
    }
?>
