<?php
class Login extends MX_Controller{    			
	
	private $after_checkout_url = 'checkout_details';
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
	function userCheckoutLogin()
	{
		$this->authenticate->process_login($this->after_checkout_url);
		redirect('checkout');
	}
	
	function registerform()
	{
		$data['current']= $this->uri->segment(2);
		$data['featured']=$this->general_db_model->getAll('tbl_products','featured',array('featured !='=>0));
		$data['page_title'] = 'Checkout Details';
		$data['no_sidebar'] = true;
		$this->template->load('frontTemplate', 'frontend/register',$data);
	}
	
	function myaccount()
	{
		$data['current']= $this->uri->segment(2);
		$data['featured']=$this->general_db_model->getAll('tbl_products','featured',array('featured !='=>0));
		$data['page_title'] = 'My Account';

		$this->template->load('frontTemplate', 'frontend/myaccount',$data);
	}
	
	function updateAccountForm()
	{
		$data['current']= $this->uri->segment(2);
		$data['featured']=$this->general_db_model->getAll('tbl_products','featured',array('featured !='=>0));
		$data['page_title'] = 'Update Account';

		$this->template->load('frontTemplate', 'frontend/updateAccountform',$data);
	}
	
	function userRegister()
	{		
		//dumparray($this->input->post());		
		if($row = $this->db->get_where('tbl_members',array('userEmail'=>$this->input->post('userEmail')))->row_array())
		{//echo $row['userEmail']; exit;
			if(($row['userEmail'] == $this->input->post('userEmail')))
			{
			//email exists
			$this->session->set_flashdata('info_err', 'Sorry, that email address has already registered please choose another.!!!');
			redirect('register');
			}
		}
	
		$uinqueID = uniqueIdgen('tbl_members');
		$userEmail = $this->input->post('userEmail');
		$password = $this->input->post('password');
		$conf_password = $this->input->post('conf_password');
		
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');		
		$gender = $this->input->post('gender');
		$street_address = $this->input->post('street_address');
		$street_address2 = $this->input->post('street_address2');
		$city = $this->input->post('city');
		$country = $this->input->post('country');		
		$pcode = $this->input->post('pcode');
		$phone = $this->input->post('phone');//echo $phone; exit;
		$date = date('Y-m-d h:i:s');
		
		if($password == '' or $conf_password =='')
		{
			$this->session->set_flashdata('info_err', 'Invalid Password');
			redirect('register','refresh');
			return false;
		}
		
		if($password != $conf_password)
		{
			$this->session->set_flashdata('info_err', 'Invalid Password');
			redirect('register.php','location');
			return false;
		}	  
		//encrypt password
		//$password = md5($password);
		$insert_data = array('id'=>$uinqueID,'userEmail'=>$userEmail,'password'=>$password,'firstname'=>$firstname,'lastname'=>$lastname,'gender'=>$gender,'street_address'=>$street_address,'street_address2'=>$street_address2,'phone'=>$phone, 'city'=>$city,'country'=>$country,'pcode'=>$pcode,'date_registered'=>$date,'last_login'=>$date,'status'=>'Active');
		$this->db->insert('tbl_members',$insert_data);
		//echo $this->db->last_query(); exit;
		$this->session->set_flashdata('info_scs', 'Thank you for registration! Please <a href="checkout">sign-up</a> to continue');
		redirect('checkout');
	}

	
	function forgotten_details()
	{
	if($this->input->post('submit') && $this->input->post('Email_Address'))
	$my_data1 = $this->db->query("select * from login_details")->row_array();
	if($my_data1['email'] != $this->input->post('Email_Address'))
	{ 
		$this->session->set_flashdata('error_message', 'Sorry, there is no account associated with '.$this->input->post('Email_Address').'. Please check your email address and submit!!!');
		redirect(site_url('forgotpassword'));
	}
		else if($my_data1['email'] == $this->input->post('Email_Address'))
			{ 
			$my_data1 = $this->db->query("select * from login_details")->row_array();
			$forgotten_details = 'Here are the forgotten details of you.';
			$forgotten_details.= '<table border="2" align=\"center\" bgcolor=\"#FFFFFF\">
							<tr>
							<th valign="top">Full Name</th>
							<td>'.$my_data1['first_name'].' '.$my_data1['last_name'].'</td>
							</tr>
							<tr>
							<th valign="top">Email</th>
							<td>'.$my_data1['email'].'</td>
							</tr>
							<tr>
							<th valign="top">Password</th>
							<td>'.$my_data1['password'].'</td>
							</tr>
							</table>';
							
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($my_data1['email'],$my_data1['first_name']. $my_data1['last_name']);
			$this->email->subject("Forgotten Details Mail");
			$this->email->message($forgotten_details);
			$this->email->to('snap.nas@gmail.com');
			
			if($this->email->send())
			{
				$this->session->set_flashdata('success_message',"Your forgotten details are sent to your email. Please use your email and password to login. Thank You!!!");
				?><script>alert("Your username and password are sent to your email. Please use your username and password to login. Thank You!!!");</script><?php
			}
			else
			{
				$this->session->set_flashdata('error_message',"There is certain errors in sending your forgotten details to your email.");
				?><script>alert("Registration failed!!!");</script><?php
			}
			$this->session->unset_userdata('registerid');
			redirect('forgotpassword');
			}
	}

	function updateAccount()
	{		
		$userEmail = $this->session->userdata('member_login_email');//echo $userEmail;exit;
		$query = $this->db->query("SELECT * FROM `tbl_members` WHERE `userEmail`='$userEmail'")->row_array();
		//echo $query['password'];exit;
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$gender = $this->input->post('gender');		
		$street_address = $this->input->post('street_address');
		$street_address2 = $this->input->post('street_address2');
		$city = $this->input->post('city');
		$pcode = $this->input->post('pcode');
		$country = $this->input->post('country');
		$phone = $this->input->post('phone');
		
		$oldPass = $this->input->post('oldPassword');
		$newPass = $this->input->post('newPassword');
		$confPass = $this->input->post('confPassword');
		
		$data = array('firstname'=>$firstname, 
						'lastname'=>$lastname,
						'gender'=>$gender,
						'street_address'=>$street_address,
						'street_address2'=>$street_address2,
						'city'=>$city,
						'pcode'=>$pcode,
						'country'=>$country,
						'phone'=>$phone);
						
		$datapass = array('firstname'=>$firstname, 
						'lastname'=>$lastname,
						'gender'=>$gender,
						'street_address'=>$street_address,
						'street_address2'=>$street_address2,
						'city'=>$city,
						'pcode'=>$pcode,
						'country'=>$country,
						'phone'=>$phone,
						'password'=>$newPass);
						
		if($oldPass!='' && $oldPass == $query['password'])
		{
			if($newPass == '' or $confPass =='')
			{
				$this->session->set_flashdata('info_err', 'Password Fields Cannot be blank!');
				redirect('updateAccount','refresh');
				return false;
			}
			elseif($newPass != $confPass)
			{
				$this->session->set_flashdata('info_err', 'The conformation password not matched');
				redirect('updateAccount','refresh');
				return false;
			}
			else
			{
				//dumparray($datapass);
				$this->general_db_model->update('tbl_members', $datapass, 'id = '.$query['id']);
				$this->session->set_flashdata('info_scs', 'The account information has been Updated.');
				redirect('myaccount');
			}
		}
		elseif($oldPass!='' && $oldPass!= $query['password'])
		{
			$this->session->set_flashdata('info_err', 'Current password Invalid.');
			redirect('updateAccount','refresh');
			return false;
		}
		elseif($oldPass=='' && ($newPass!='' or $confPass!=''))
		{
			$this->session->set_flashdata('info_err', 'Please Enter Current Password ');
			redirect('updateAccount','refresh');
			return false;
		}
		else
		{
			//dumparray($data);
			$this->general_db_model->update('tbl_members', $data, 'id = '.$query['id']);
			$this->session->set_flashdata('info_scs', 'The account information has been Updated.');
			redirect('myaccount');	
		}
	}
	//suman
/*	function logout()
	{
		$emails = $this->session->userdata('email');
		$passwords = $this->session->userdata('password');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('success_message',"You've been logged out!");
		redirect('logout_success'); 	
	}*///suman
	function logout()
	{
		//echo 'logout'; exit;
		if($this->input->cookie($this->cookie_name)== $this->cookie_value) 
		{ 
			$this->load->helper('cookie');
			// CI cookie helper function 
			delete_cookie($this->cookie_name);
		}
		$this->session->unset_userdata('member_login_name');
		$this->session->unset_userdata('member_login_id');
		$this->session->set_flashdata('info_scs',"You've been logged out Successfully!");
		redirect('checkout');
	}		
}//class closes
?>
