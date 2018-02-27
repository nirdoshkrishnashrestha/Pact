<?php
function dumparray($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
	exit;
}
function get_height($new_width,$img){
	list($width, $height) = getimagesize($img);	
	if($width>$new_width)$ratio =($width/$new_width);else $ratio=($new_width/$width);
	return $new_height =  ceil($height/$ratio);
}


function s()
{
	$CI = &get_instance();	
	if($CI->cart->total_items()>1) $s = 's'; else $s ='';
	return $s;
}

function displayContent($id,$fieldName='content',$tblName='tbl_static_pages')
{
	$CI =&get_instance();
	$result = $CI->db->get_where($tblName, array('id'=>$id),1)->row();
	return stripslashes(html_entity_decode($result->$fieldName,ENT_QUOTES,'utf-8'));
	//stripslashes(str_replace('../uploaded','uploaded', $data[$fieldName]));
}

function printQuery()
{
	$CI = &get_instance();
	echo $CI->db->last_query();
	exit;
}

function get_featured_category()
{
	$CI = &get_instance();
	$featured =$CI->db->get_where('tbl_category', array('featured'=>1,'status'=>'Publish'),5)->result();
	return $featured;
}
function generate_menu($tbl,$where=NULL,$order=NULL)
{
	$CI =&get_instance();
	$CI->db->select('*');
	if(isset($where) && !empty($where))
	$CI->db->where($where);
	if($order)
	$CI->db->order_by($order,'asc');
	return $CI->db->get($tbl)->result();//printQuery();
}
function generate_submenu($tbl,$where,$order=NULL)
{
	$CI =&get_instance();
	$CI->db->select('*');
	if(isset($where) && !empty($where))
	$CI->db->where($where);
	if($order)
	$CI->db->order_by($order,'asc');
	return $CI->db->get($tbl)->result();
}

//get category for featured products
function getCategory($catID){
	$CI = &get_instance();
	$CI->db->where('id',$catID);
	return $CI->db->get('tbl_category')->row()->category_name;
}

//check if the product is featured or not
function checkFeatured($id,$table='tbl_products')
{
	$CI = &get_instance();
	$CI->db->where('featured !=',0);
	$CI->db->where('id',$id);
	$CI->db->from($table);
	$CI->db->count_all_results()==1? $feat = 'Yes':$feat='No';
	return $feat;
}

//to display one main image among multiple products uploaede for the product
function displayImg($id)
{
	$CI = &get_instance();
	$CI->db->where('id',$id);
	$homeImg = $CI->db->get('tbl_products')->row()->home_image;
	$image = explode(':',$homeImg);
	return $image[0];
}

function admin_url($uri='')
{
	$CI = &get_instance();
	return site_url('admin').'/'.$uri;
}

function is_logged_in()
{
	$CI = &get_instance();
	if($CI->session->userdata('member_login_id'))
		return true;
	else
		return false;
}

//to navigate the user according to the login status.
function checkoutLink()
{
	$CI = &get_instance();
	$checkLink = 'checkout';
	switch($checkLink)
	{
	case($CI->cart->total_items()==0):
		$checkLink = 'carts';
		break;
	case(is_logged_in()):
		$checkLink = 'checkout_details';
		break;
	default:
		$checkLink = 'checkout';
		break;
			
	}
	return $checkLink;
}

//to genereate the unique id for customers members
function generate_unquie_no($pin_Length =10)
{
	$pin_Range = 1;
	$acceptednumbers= '123456789';
	$max = strlen($acceptednumbers)-1;
	$pin_num = null;
	for($x=0; $x <$pin_Range; $x++)
	{
		for($i=0; $i < $pin_Length; $i++)
		{
			$pin_num .= $acceptednumbers{rand(0, $max)};
		}
		$retrn_value=$pin_num;
		$pin_num = null;
	}
	return $retrn_value;
}


//HERE IS PROBLEM
function UniqueIdgen($table,$field='id')
{
	while(1)
	{
		$CI = &get_instance();
		$genId = generate_unquie_no();
		//$query = "SELECT * FROM $table WHERE `$field` = '$genId'";
		$CI->db->where($field,$genId);
		$query = $CI->db->from($table);
		//$query = $CI->db->get($table);
		//print_r($CI->db->last_query()); die;
		//echo $CI->db->count_all_results(); exit;		
		$num = $CI->db->count_all_results(); //echo $num; exit;
		if($num==0)break;
	}
	return $genId;
}

function userDetails($fieldName,$table='tbl_members'){
	$CI = &get_instance();
	$userID = $CI->session->userdata('member_login_id');
	$CI->db->select($fieldName);
	$query = $CI->db->get_where($table,array('id'=>$userID),1);
	return $query->row()->$fieldName;
	
}

function trim_text($TEXT, $LIMIT, $TAGS = 0) 
{
    // TRIM TEXT
    $TEXT = trim($TEXT);
    // STRIP TAGS IF PREVIEW IS WITHOUT HTML
	if ($TAGS == 0) $TEXT = preg_replace('/\s\s+/', ' ', strip_tags($TEXT));

    // IF STRLEN IS SMALLER THAN LIMIT RETURN
    if (strlen($TEXT) < $LIMIT) return $TEXT;

    if ($TAGS == 0) return substr($TEXT, 0, $LIMIT) . " ...";
    else 
	{
        $COUNTER = 0;
        for ($i = 0; $i<= strlen($TEXT); $i++) 
		{
        	if ($TEXT{$i} == "<") $STOP = 1;
            if ($STOP != 1) { $COUNTER++; }
			
		if ($TEXT{$i} == ">") $STOP = 0;
        $RETURN .= $TEXT{$i};
		if ($COUNTER >= $LIMIT && $TEXT{$i} == " ") break;
        }
		return $RETURN . "...";
		
    }
}
	/**
	* Get current date
	* @return current date
	*/
	function currentDate(){ 
	
		return date('Y-m-d');
	}
	
	/**
	* Get current time	
	* @return current time
	*/
	function currentTime(){
	
		return date("G:i:s");
	}
	
	/**
	* Get current time	
	* @return current time
	*/
	function currentTimestamp(){
	
		return currentDate()." ".currentTime();
	}		


	/**
	* Format date
	* @param date $date	
	* @return formatted date
	*/		
	function getDateFormatted($date){
	
		if(trim($date) != null && $date != "0000-00-00 00:00:00")
		{
			//$date = date('g:i ad/m/Y H:i:s', strtotime($date));
			$date = date('M d, Y', strtotime($date));
		}
		else
		{
			$date = "N/A";
		}
		return $date;
	}
	
	
	/**
	* Format date
	* @param date $date	
	* @return formatted date
	*/		
	function getDateTmeFormatted($date){
	
		if(trim($date) != null && $date != "0000-00-00 00:00:00")
		{
			//$date = date('g:i ad/m/Y H:i:s', strtotime($date));
			$date = date('Y-m-d G:i:s', strtotime($date));
		}
		else
		{
			$date = "N/A";
		}
		return $date;
	}
	
	/**
	* Format time	
	* @param time $time	
	* @return formatted time
	*/
	function getTimeFormatted($time){
	
		$exptime = explode(":",$time);
		
		if($exptime[0] > 12){
			$hr = $exptime[0]-12;
			$ampm = "PM";
		}
		else{
			$hr = $exptime[0];
			$ampm = "AM";
		}
		
		$time = $hr.":".$exptime[1].":".$exptime[2]." ".$ampm;
		return $time;
	}
	
	
	function addDays ($days, $fmt="Y-m-d", $date=NULL) {
		// Adds days to date or from now // By JM, www.Timehole.com
		if ($date==NULL) { $t1 = time(); }
		else $t1 = strtotime($date);
		$t2 = $days * 86400; // make days to seconds
		return date($fmt,($t2+$t1));
	}

        function getDaysDiff($date1,$date2){
            $t1 = strtotime($date1);            
            $t2 = strtotime($date2);
            
            $diff = $t2-$t1;
           // echo $diff;
            $moddays = $diff % 86400;
           $days = $diff/86400;
            
            if($moddays>0)
                $added = 1;
            else
                $added = 0;
            $daysDiff = $days + $added;
            return $daysDiff;
        }
	/**
	* Generate random keys	
	* @param integer $length	
	* @return string $key
	*/
	function randomkeys($length){
	   $key='';
	   $i = '';
	   $pattern = '';
	   $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	   
	   for($i=0;$i<$length;$i++){
	   
		 $key .= $pattern{rand(0,62)};
	   }
	   return $key;
	}
	
	
	function create_pagination($baseurl, $totalRows, $uri_segment = 4, $per_page = REC_PER_PAGE,$segment='page')
	{
		$CI = &get_instance();
		$CI->load->library('pagination');						
		$config['base_url'] 		= $baseurl;
		$config['uri_segment'] 		= $uri_segment;
		$config['per_page'] 		= $per_page;
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '';
		$config['first_tag_close'] = '';
		$config['cur_tag_open'] 	= '<span>';
		$config['cur_tag_close'] 	= '</span>';
		$config['next_link'] 		= 'Next';
		$config['prev_link'] 		= 'Pervious';
		$config['next_tag_open'] 	= '';
		$config['next_tag_close'] 	= '';
		$config['prev_tag_open'] 	= '';
		$config['prev_tag_close'] 	= '';
		$config['num_tag_open'] 	= '';
		$config['num_tag_close'] 	= '';	
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['num_links'] = 5;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = $segment;
		
		$config['total_rows'] = $totalRows;
		$CI->pagination->initialize($config);	
	}	
	
	function subString($string, $limit)
	{
		if($limit)
		{
			$CI = &get_instance();
			$CI->load->helper('text');
			$short_text = character_limiter($string, $limit);
			
			return $short_text;
		}
		else
			return $string;
	}
	
	function textWrap($str,$strlen,$strpos=0){
	
		$text = "";
		if(strlen($str)>$strlen){		
			$rem = strlen($str);		
			while(true){
				$text .= substr(strip_tags(html_entity_decode($str)),$strpos,$strlen)."<br>";
				$rem -= $strlen;			
				$strpos += $strlen;
				if($rem<=0){
					$text = substr(strip_tags(html_entity_decode($text)),0,-4);
					break;
				}
			}
		}
		else
		{
			$text = strip_tags(html_entity_decode($str));
		}
		return $text;
	}
	
function global_message()
{ 
	$CI = &get_instance();
	if ($CI->session->flashdata('error_message'))
	{ 
		echo global_message_output($CI->session->flashdata('error_message') , 'error_message' ) ; 
	}
	if ($CI->session->flashdata('error_message1'))
	{ 
		echo global_message_output($CI->session->flashdata('error_message1') , 'error_message1' ) ; 
	}
	if ($CI->session->flashdata('success_message'))
	{ 
		echo global_message_output($CI->session->flashdata('success_message') , 'success_message' ) ; 
	}
	if ($CI->session->flashdata('success_message1'))
	{ 
		echo global_message_output($CI->session->flashdata('success_message1') , 'success_message1' ) ; 
	}
	if ($CI->session->flashdata('warning_message'))
	{ 
		echo global_message_output($CI->session->flashdata('warning_message') , 'warning_message' ) ; 
		
	}
	if($CI->session->flashdata('info_err')){
		echo global_message_output_info($CI->session->flashdata('info_err'),'info_bar_err');
	}
	
	if($CI->session->flashdata('info_scs')){
		echo global_message_output_info($CI->session->flashdata('info_scs'),'info_bar_scs');
	}
	// this is because to show the error when there is error in the insertion in the database. We cannot use session beaucas it does not support the object as the value. We we used the post data again as the source to conserve the data. 
	if ($CI->input->post('error_message')) 
	{ 
		echo global_message_output($CI->input->post('error_message') , 'error_message' ) ; 
	}     
}

function global_message_output_info($msg, $var_name)
{ 
	return    "<div class='".$var_name."'onclick='javascript:$(this).fadeOut(1000)'>".$msg."</div>";
}

function global_message_output($msg, $var_name)
{ 
	//echo $var_name; exit;
	if (is_string($msg))
	{ 
		//return    "<div class='".$var_name."' onclick='javascript:$(this).fadeOut(1000)'><span>".$msg."<span><span style='float:right'>x</span></div>"; 
		return    "<div class='".$var_name."' onclick='history.go(-1)'><span>".$msg."<span><span style='float:right'>x</span></div>";
	}
	else if (is_array($msg))
	{ 
		$message = "<ul class= '".$var_name."' style='list-style:disc' onclick='javascript:$(this).fadeOut(1000)'> "; 
		
		foreach ($msg as $ms) 
		{ 
			$message .= "<li>" . $ms . "</li>" ; 
		} 
		$message .= "</ul>"; 
		return $message; 
	}  
}

?>