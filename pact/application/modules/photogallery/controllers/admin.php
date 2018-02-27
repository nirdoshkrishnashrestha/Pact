<?php
	class Admin extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('photogallery_model');
		}
		
		function index()
		{
			$data['page_title'] = 'Images';		
			$data['total_gallery'] = $this->general_db_model->countTotal('tbl_gallery');
			//echo $query=$this->db->last_query(); exit;
			if(isset($_GET['id'])){
				$ignore = array(1,2);	
				$data['id'] = $_GET['id'];
			if($_GET['id'] != 3)
			$this->db->where("id",$_GET['id']);
			else
			$this->db->where_not_in("id",$ignore);
			}
			$this->db->order_by('order'); 
			
			$data['details'] = $this->general_db_model->get_with_limit( 'tbl_gallery' , $this->settings->item('rows_per_page'), @$_GET['page']);
			create_pagination(base_url().'admin/photogallery/index/?pagi=1',$data['total_gallery'], 4, $this->settings->item('rows_per_page'));																		
			$this->template->load('template','admin/gallery_list',$data);
			//$this->load->view('listing_pages',$data);
		}
						
		function add()
		{
			if($this->input->post('submitDetail'))
			{
				
				$this->add_edit();
				die();
			}
			
			$data['page_title'] = 'Add Gallery';
			$this->template->load('template','admin/gallery_add', @$data);
		}
	
		function edit($id)
		{
			if($this->input->post('submitDetail'))
			{
				$this->add_edit($id);
				die();
			}
			$data['details'] = $this->general_db_model->getById('tbl_gallery', 'id', $id);
			$where=array("gid"=>$id);
			$data['total_img'] = $this->general_db_model->countTotal('tbl_gallery_images',$where);
			//echo $query=$this->db->last_query(); exit;
			$data['img_details'] = $this->general_db_model->get_with_limit( 'tbl_gallery_images' , NULL,NULL,'order',$where);
			$data['gid'] = $id;
			$data['page_title'] = 'Edit Gallery';
			$this->template->load('template','admin/gallery_edit', $data);
		}
	
		function add_edit($id=NULL)
		{
			$not = array('submitDetail');
			
			$post = $this->mylibrary->get_post_array($not);
			$date = date('Y-m-d H:i:s');
			$post['date'] = $date;
			//dumparray($post);
			if($id)
			{
				$this->general_db_model->update('tbl_gallery', $post, 'id = '.$id);
				$this->session->set_flashdata('display_message', 'Gallery successfully updated.');
			}
			else
			{
				$this->general_db_model->insert('tbl_gallery', $post);
				$this->session->set_flashdata('display_message', 'Gallery successfully added.');
			}		
			redirect('admin/photogallery');
		}
	
		function delete($id)
		{
			$this->general_db_model->delete('tbl_gallery', 'id = '.$id);
			$this->session->set_flashdata('display_message', 'Gallery successfully deleted.');
			redirect(admin_url('photogallery'));
		}
		
		function update_status()
		{ 
			$id = $this->input->get('id');
			$status = $this->input->get('status');
			//echo $status; die();
			if($status == 'Publish')
				$data['status'] = 'Unpublish';
			else
				$data['status'] = 'Publish';
			$this->general_db_model->update('tbl_gallery', $data, 'id = '.$id);
		   
			echo $data['status'];
		}
		
##########################################################################################################
##########################################################################################################
	
		function insertImg()
		{
			$gid = $this->input->post('gid');
			$imgname = $this->input->post('imgname');
			$title = substr($imgname,11,-3);
			$date = date('Y-m-d H:i:s');
			$order = $this->photogallery_model->gen_order($gid);//echo $order; exit;
			$insertData = array('imgname' => $imgname,
								'gid' => $gid,
								'title'=> $title,
								'order'=> $order,
								'date'=> $date,
							);
							
			if($this->general_db_model->insert('tbl_gallery_images', $insertData)) echo mysql_insert_id();

		}
		
		function update_title()		
		{
			$imgID = $this->input->post('id');
			$data['title'] = $this->input->post('title');
			$data['order'] = $this->input->post('order');
			if($this->general_db_model->update('tbl_gallery_images',$data,'id =  '.$imgID))echo '1';else echo '0';
			
		}
		
		function delete_image()
		{
			$img = $this->input->post('imgName');
			$imgID = $this->input->post('id');
			$imgpath = $this->config->item('uploads').'gallery/'.$img;
			$this->general_db_model->delete('tbl_gallery_images', 'id = '.$imgID);
			if(file_exists($imgpath)){
				unlink($imgpath);
				echo 'Image successfully deleted!';
			}
			else
			{
				echo 'File does not exist!';
			}
		}
}
?>