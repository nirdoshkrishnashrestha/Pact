<?php
class Photogallery_model extends CI_Model
{
	function __construct(){
			parent::__construct();			
			$table_name = 'tbl_gallery';
	}
	
	function gen_order($gid)
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get_where('tbl_gallery_images',array('gid'=>$gid),1);
		//echo $this->db->last_query();
		$get_order = $query->row();
		if($query->num_rows()==0)$in_order=0; else $in_order = $get_order->order;
		if(isset($in_order)==0) $order=1;else $order=$in_order+1;
		return $order;
	}
}
?>