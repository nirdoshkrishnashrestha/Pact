<?php
class General_Db_Model extends CI_Model
{ 
	function __construct()
	{ 
		parent::__construct();
	}
	
	
	function show_home_page($id)
	{
		return $this->db->query("select * from tbl_post where id = ".$id)->row();		
	}
	

	
	function home_page($slug,$table) 
	{
		$sql = "select * from $table where page_slug like '".$slug."'";			
		$aboutUS = $this->db->query($sql)->row();
		return $aboutUS;
		
	}

	function about_us($slug)
	{
		$sql = "select * from tbl_post where page_slug = '".$slug."'";
		$aboutUS = $this->db->query($sql)->row();
		return $aboutUS;	
	}
	
	function gallery($id)
	{
		$sql = "select * from tbl_gallery_images where gid = ".$id;		
		$aboutUS = $this->db->query($sql)->result();
		return $aboutUS;	
	}

	
	function getAllrows($table)
	{
		return $this->db->query("select * from $table")->result();	
	}	
	  
	function getAllrowsBYLimit_Order($table,$order,$limit)
	{
		return $this->db->query("select * from $table order by $order desc limit $limit")->result();	
	}	
	  
	function insert( $table, $array)
	{ 	//echo "<pre>";var_dump($array); ;die;
		$this->db->set( $array );
		$this->db->insert($table);		
		return $this->db->insert_id(); 
	}
	
	function update( $table, $array ,$where)
	{ 
		$this->db->where($where);
		return  $this->db->update($table, $array);
	}
	
	function delete($table,$where)
	{
	  $this->db->where($where);
	  $this->db->delete($table);
	}

	function getByIds( $table, $fieldId, $id, $select='*')
	{ 	//echo $table.$fieldId.$id;die;
		$this->db->select($select);
		$this->db->where( $fieldId ." = '". $id ."'" ); 
		$query = $this->db->get( $table ); 
		return $query->result(); 
	}
	
	function img_getByIds( $table, $fieldId, $id)
	{ 	//echo $table.$fieldId.$id;die;
		$this->db->select("*");
		$this->db->where( $fieldId ." = '". $id ."'" ); 
		$this->db->order_by('id',"desc");
		$this->db->limit(4);
		$query = $this->db->get( $table ); 
		return $query->result(); 
	}
	
		function getById( $table, $fieldId, $id, $select='*')
	{ 	//echo $table.$fieldId.$id;die;
		$this->db->select($select);
		$this->db->where( $fieldId ." = '". $id ."'" ); 
		$query = $this->db->get( $table ); 
		return $query->row(); 
	}

	function getBySubPage($table,$fieldId,$id,$fieldId2,$id2)
	{ 	
		$this->db->select("*");
		$this->db->where($fieldId,$id);
		$this->db->where($fieldId2,$id2); 
		$query = $this->db->get( $table ); 
		return $query->row(); 
	}
	
	function getByDownload($table,$fieldId,$id)
	{ 	
		$this->db->select("*");
		$this->db->where($fieldId,$id);
		$this->db->order_by('order',"asc");
		$query = $this->db->get( $table ); 
		return $query->result(); 
	}
	
	function getByPage($table,$fieldId,$id,$fieldId2,$id2)
	{ 	//echo $table.' '.$fieldId.' '.$id.' '.$fieldId2.' '.$id2;die;
		$this->db->select("*");
		$this->db->where($fieldId,$id);
		$this->db->where($fieldId2,$id2); 
		$query = $this->db->get( $table ); 
		return $query->row(); 
	}
	
	
	function getAll( $table, $orderBy=NULL, $where=NULL, $select=NULL, $group_by=NULL)
	{ 
		if($select)
		 {
		   $this->db->select($select);
		 }
		
		if($where)
			$this->db->where($where);
		if ($orderBy)
			$this->db->order_by($orderBy);
		
		if($group_by)
		  $this->db->group_by($group_by);
		$query = $this->db->get( $table ); 
		
		return $query->result(); 
	}
	
		
	function getAll_cat( $table, $where)
	{ 
		
			$this->db->where($where);			
			$query = $this->db->get( $table ); 
		
		return $query->row();
		
		//$sql = "select * from $table where cat_id = (select id from tbl_catagories where page_slug = '$where') order by `order`";
		//$query = $this->db->query($sql)->result(); 
		//return $query; 
	}
	
	function getAll_array( $table, $orderBy=NULL, $where=NULL, $select=NULL, $group_by=NULL)
	{ 
		if($select)
		 {
		   $this->db->select($select);
		 }
		
		if($where)
			$this->db->where($where);
		if ($orderBy)
			$this->db->order_by($orderBy);
		
		if($group_by)
		  $this->db->group_by($group_by);
		$query = $this->db->get( $table ); 
		
		return $query->result_array(); 
	}    
	 
	 function get_all_menu_pages($table, $fieldId, $id, $select='id,page_title')
	 {
		$this->db->select($select);
		$this->db->where( $fieldId ." = '". $id ."'" ); 
		$query = $this->db->get( $table ); 
		return $query->result(); 
	 }
	 
	function get_with_limit( $table , $limit, $start ,$orderBy = NULL,$search=NULL) 
	{
		if($search)
		 $this->db->where($search);
		if ($orderBy)
		 $this->db->order_by($orderBy,'ASC');
		$query = $this->db->get( $table, $limit, $start );
		//print_r($this->db->last_query());exit;
		return $query->result();
		
	}
	
	function countTotal($table, $where=NULL)
	{		
		if($where)
			$this->db->where($where);
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	
	function countTotal_New($table,$slug)
	{	
			
		$sql = "select * from {$table} where page_slug = '$slug'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	function get_parentName($table, $where=NULL)
	{		
		if($where)
			$this->db->where($where);
		$parentName = $this->db->get($table)->row()->gallery_name;
		//print_r($this->db->last_query()); exit;
		return $parentName;
	}
	
	function getLast($table)
	{
		$query = $this->db->get($table);
		return $query->row();
	}

	function get_attribute($table,$attribute,$where) 
	{ 
		$this->db->select($attribute);
		$this->db->where($where);
		$query = $this->db->get( $table ); 
		if ($query->num_rows() == 1 ) 
			return $query->row(); 
		else if ($query->num_rows() > 1 ) 
			return $query->result(); 
	}
	
	function value_exist($table, $field, $value)
	{
		$this->db->where(''.$field.'', $value);
		$this->db->from($table);
		if($this->db->count_all_results() > 0)
			return true;
		else
			return false;
	}
	
	function runQuery($sql) {
		$this->db->query($sql);
	}
	
	function del_img($id,$table,$folder)
	{
		$img = $this->db->get_where($table,array('id'=>$id))->row()->home_image;
		$allimg=explode(':',$img);
		foreach($allimg as $del){
			$imgpath = $this->config->item('uploads').$folder.'/'.$del;//echo $imgpath; exit;
			if(file_exists($imgpath)){
				unlink($imgpath);
			}
			
		}
		return true;
	}
	
}//class closes 
?>