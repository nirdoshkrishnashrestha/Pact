<?php
class Home extends CI_Controller{
	function __construct()
	{
		parent::__construct();		
		$this->load->model('homemodel');
		$this->load->model('general_db_model');
		session_start();
	}
	function index()
	{	
	
		////for nagivation 
		
		
		$where = array('status'=>'Publish');
		$where2 = array('page_slug' => 'greeting-from-the-himalayas-of-nepal');
		$data['home_pages'] = $this->general_db_model->show_home_page(36);
		$data['homepage']=$this->general_db_model->getById('tbl_catagories','page_slug','catagories');
		//$data['banners']=$this->general_db_model->getByIds('tbl_gallery_images','gid',10);
		$data['welcome'] = $this->general_db_model->getAll_cat("tbl_post", $where2);
		$data['gallery'] = $this->general_db_model->gallery(12);
		
		$data['current']= $this->uri->segment(3);
		$data['page_title'] = 'Homepage';
		$this->template->load('frontTemplate', 'frontend/homepage',$data);
	}
	
	function pages($table='',$slug,$id=''){	
		//// $id is used as slug
		$data['slug']= $slug; 
		
		$where=array("page_slug"=>$id);
		$data['category'] = $this->general_db_model->getAll_cat("tbl_catagories", $where);		
		$count = $this->general_db_model->countTotal_New($table,$slug);  
		//// Use 2 parameter(Like AboutUs,Packing,Process) for static_pages.php AND 3 parameters or wrong page_slug(Like Contact) for remaining
	
			if($count > 0)
			{
				//$data['display_post'] = $this->general_db_model->getByPage("tbl_catagories",'status','Publish','page_slug',$slug);
				$data['about_us'] = $this->general_db_model->about_us($slug);
				$data['page_title'] = $slug;							
				$this->template->load('frontTemplate','frontend/static_pages',$data);			
			}
			else
			{ 	
				$data['page_title'] = $slug;
				$data['mem']= $id;				
				$this->template->load('frontTemplate','frontend/'.$slug,$data);
			}

	}
	

	
	

###########################################################################################
###########################################################################################
	function send_feedback(){	

		$name=$_POST['name'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		$headers = "From: ".$email;
		if(isset($_POST['submit']))
		{
			mail("",$subject,$message,$headers);
			redirect(base_url());
			
		}
		

	}
	function mail()
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		//$headers = "From: ".$email;
		if(isset($_POST['submit']))
		{
			mail("nirdosh.shrestha@gmail.com","$email's message",$message);
			/*echo "<script>";
			echo "alert('Mail Send')";
			echo "</script>";*/
			
			
			}
		header("Location:http://localhost:8080/pact");
	}
}//home extends closed
?>