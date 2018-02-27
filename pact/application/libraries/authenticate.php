<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class CI_Authenticate
{ 
	private $CI;
	//private $member_pages = array('dashboard','profile','business','mynotice','message'); 
	function CI_Authenticate()
	{ 
		$this->CI =& get_instance();
		$this->CI->load->model('frontloginmodel');
		$this->check_admin_login();
	} 
	
	function check_admin_login()
	{ 	
		if ($this->CI->uri->segment(1) == 'admin' and $this->CI->uri->segment(2)!='login' ) 
		{ 
			if (!$this->CI->session->userdata('admin_user_id')) 
			{ 
				if($this->CI->uri->segment(2))
					$this->CI->session->set_userdata('admin_redirect_login_url', uri_string());
				
				redirect(admin_url('login'));
			}
			
		}
	
	}
	
	function process_login($link)
	{
		//echo $link;  exit;		
		if($this->CI->input->post('submitUserLogin'))
		{				
			$this->CI->load->library('form_validation');
			$this->CI->form_validation->set_rules('userEmail', ' Email', 'trim|required|xss_clean|valid_email');
			if ($this->CI->form_validation->run() == FALSE)
			{
				$this->CI->session->set_flashdata('info_err', 'Invalid/blank Username or password.');
				redirect('checkout');
			}
			 
			$username = htmlspecialchars(mysql_real_escape_string($this->CI->input->post('userEmail')),ENT_QUOTES,'utf-8');
			$password = $this->CI->input->post('password');//echo $password;exit;
			$result = $this->CI->frontloginmodel->authenticate('tbl_members', array('userEmail' => $username, 'password' => $password));
			//echo '<pre>';var_dump($result);exit;
			if($result)
			{
				if($result->status == 'Active')
				{				
					if($this->CI->session->userdata('details'))
					{
						$this->CI->session->unset_userdata('details');
						$this->CI->session->unset_userdata('email');
					}
					$this->CI->login_id = $result->id; 
					$this->CI->login_userEmail = $result->userEmail;
					
					 $this->set_session_var();
					 //echo $this->CI->session->userdata( "member_firstname");
					 //die();
					 if($this->CI->session->userdata('wishlist_pro_id'))
					 {
					 	$this->add_wish_list($this->CI->session->userdata('wishlist_pro_id'));
						$link='wishlist';
					 	redirect(site_url($link));
					 }else
					 {
						 redirect(site_url($link));
					 }
				}
				else
				{	
					$this->CI->session->set_flashdata('info_err', 'Your Account is not activated, Please correspond to the site administrater.');
					redirect('checkout');
				}
			}
			else
			{
				//die('invlaid login');
				$this->CI->session->set_flashdata('info_err', 'Invalid Username or Password.');
				//redirect(current_url());
			}
		}
	}
	
	function set_session_var()
	{ 
		//$this->CI->session->set_userdata( $this->CI->session_name, true) ;
		$this->CI->session->set_userdata( "member_login_id", $this->CI->login_id);
		$this->CI->session->set_userdata( "member_login_email", $this->CI->login_userEmail);
	}
	
	function add_wish_list($id)
	{
		$res = $this->CI->db->get_where('wishlist',array('pro_id'=>$id,'mem_id'=>$this->CI->session->userdata('member_login_id')))->row();			
		if(!$res)
		{
			$this->CI->general_db_model->insert('wishlist',array('pro_id'=>$id,'date'=>date('Y-m-d h:m:s'),'mem_id'=>$this->CI->session->userdata('member_login_id')));			
			if($this->CI->session->userdata('wishlist_pro_id'))
			$this->CI->session->unset_userdata('wishlist_pro_id');
			redirect('wishlist');
		}
		else
		{
			redirect('wishlist');
		}
	}
	
	function activate($verification)
	{
		
		if($verification)
		{
			if($this->CI->frontloginmodel->check_verification_code($this->table_name, array('verification'=>$verification ,'customer_status'=> "inactive")))
			{
				$data['customer_status'] = 'active';
				$this->CI->general_db_model->update($this->table_name, $data, array('verification'=>$verification, 'customer_status'=>"inactive"));
				$result = $this->CI->db->get_where($this->table_name,array('verification'=>$verification, 'customer_status'=>"active"))->row();
				//echo $this->CI->db->last_query();
				//echo debug_array($result);
				
				if($result)
				{
					//echo debug_array($result);
					 $this->CI->login_id = $result->customer_id; 
					 $this->CI->login_username = $result->email;
					 $this->CI->login_firstname = $result->first_name;
					 $this->CI->login_lastname = $result->last_name;
					 
					 $this->set_session_var();
					 redirect(site_url('memberdetails')); 
					
				}
				
				
			}else
			{
				show_error('Invalid Verification Code');
			}
			
			
		}
		else
			show_error('Invalid Verification Code');

	}
	
}//class closes
?>