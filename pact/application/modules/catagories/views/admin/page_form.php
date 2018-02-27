<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.stringToSlug.js"></script>
<script src="<?php echo base_url()?>assets/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/uploadify/swfobject.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/uploadify/uploadify.css">
<script>
$(document).ready( function() {
		$("#page_title").stringToSlug();
	});
</script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
	<script>
    CKEDITOR.replace('editor1',{
			filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
         filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?Type=Images',
         filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?Type=Flash',
         filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
         filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
         filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'		
		
		});
    </script>
<script>
$(function(){
	$('#addEditform').validate();
});

window.onload = function(){
	CKEDITOR.replace('content');
};
</script>
<script>
<?php $timestamp = time();?>
$(function(){
	$('#home_image').uploadify({
		formData     	: {
					'timestamp' : '<?php echo $timestamp;?>',
					'targetFolder' : 'uploads/categories',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
		height        	: 30,
		swf           	: '<?php echo base_url()?>assets/uploadify/uploadify.swf',
		uploader      	: '<?php echo base_url()?>assets/uploadify/uploadify.php',
		width         	: 120,
		cancelImg 	  	: '<?php echo base_url() ?>assets/uploadify/cancel.png',
		buttonText 		: 'Upload Image',
		buttonCursor 	: 'hand',
		multi			: false,
		fileTypeDesc 	: 'Images Only',
		fileSizeLimit 	: '9048KB',
		queueSizeLimit 	: 50,
        fileTypeExts 	: '*.gif; *.jpg; *.JPEG; *.png', 
		checkExisting 	: '<?php echo base_url()?>assets/uploadify/check-exists.php',
		onSelect		: function(file){
					//if($('#fileList').val()=='') return true; else return false;
					//alert('a');
					$('#submitDetail').val('Please wait while uploading...');
					$('#submitDetail').val('disabled','disabled');
    		},
	/*	//Default as provided by site: ITS ALWAYS SAME, THE ORDER NEEDS TO REMAIN SAME, NO MATTER THE NAME OF VARIABLE!
		onUploadSuccess : function(file, data, response) {
            alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
        } */
  		onUploadSuccess : function(file, data, response) {	//alert(file.name);
					if($('#fileList').val()!=''){//alert('full');
						$('#fileList').val($('#fileList').val()+':'+data);}
					else{//alert('blank');
						$('#fileList').val(data);}
						imagePath = "<?php echo str_replace("\\","/",ROOT);?>";
					$('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" > <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" title="'+data+'" class="img-wrap"><img src="'+"<?php echo base_url()?>"+'assets/createThumb/create_thumb.php?src='+imagePath+'uploads/banners/'+data+'&w=150&h=150" alt="'+data+'" /></a></div>');
					//alert($('#fileList').val());					
					$('#submitDetail').removeAttr('disabled');
					$('#submitDetail').val('Submit');
			}
  });
});
</script>
<script>
//THIS FUNCTION IS TRIGGERED WHILE UPLOADED IMAGE, IS REQUIRED TO DELETE:
$(function(){
	$('a#deleteImg').live('click',function(){		
		var _img = $(this).next().attr("title");//alert(_img);
		var _this = $(this).parent();
		delete_image(_img);
		$.post("<?php echo admin_url("catagories/delete_image");?>",{imgName:_img},
		function(data){
			$("i.info").text(data).fadeOut(1000);
			_this.fadeOut(1000, function () {			
			_this.remove();
			$("i.info").text('');
			$("i.info").removeAttr('style');
			  });
			});
		//$(this).parent().fadeOut(2500);
		//alert($('#fileList').val());
	});	
});

//THIS IS COMMON FUNCTION FOR DELETING FILE FORM THE LIST:
function delete_image(name){
	var filelist = $('#fileList').val();
	var filenames = filelist.split(':'); //alert(filenames.length);
	$('#fileList').val('');
	for(var i=0;i<filenames.length;i++)
	{
		if(filenames[i] != name)
		{	
			if($('#fileList').val()=='')
				$('#fileList').val(filenames[i]);
			else		
				$('#fileList').val($('#fileList').val()+':'+filenames[i]);
		}	
	}
}
</script>
<?php  $isEdit = isset($details) ? true : false;?>
<div class="titlebar" align="center"><h1 align="left"><?php echo $page_title?></h1></div>
<div class="table-wrapper form-wrapper">
<?php echo form_open_multipart('',array('id'=>'addEditform','name'=>'addEditform','class'=>'userpane'));?>
<input type="hidden" id="fileList" name="fileList" value="<?php if($isEdit) echo $details->home_image;?>" />
<input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s')?>" />
<input type="hidden" name="pack" value="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo str_replace($this->config->item('admin_path'),'',$_SERVER['HTTP_REFERER']);}?>" />
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr style="display: none;">
  <td ><strong>Page Segment Type</strong></td>
  <td>
                <select name="pc_id" class="selectType">
                <?php
                    $this->db->order_by('order','ASC');
                    $query = $this->db->get('tbl_static_pages_category');
                    //printquery();
                    foreach($query->result() as $q):
					if($isEdit){						
                ?>                
                <option value="<?php echo $q->id?>" <?php if($details->pc_id == $q->id) echo 'selected=selected';?>><?php echo ucwords($q->pc_name);?></option>
                <?php } else { ?>
                <option value="<?php echo $q->id?>" <?php if($pagetype == $q->pc_name) echo 'selected=selected';?>><?php echo ucwords($q->pc_name);?></option>
                <?php } endforeach;?>
                </select>
  </td>
</tr>
<tr>
  <td ><strong>Category Title</strong></td>
  <td><input name="page_title" type="text" class="required txtinput" id="page_title" value="<?php if($isEdit) echo $details->page_title;?>" size="50"/></td>
</tr>
<tr>
  <td ><strong>Page Slug</strong><span class="input-info">If unknown about this <br /><strong>Leave as it is.</strong></span></td>
  <td><input type="text" id="permalink" name="page_slug" class="required txtinput" value="<?php if($isEdit) echo $details->page_slug;?>" size="50"/></td>
</tr>

<tr>
  <td style="vertical-align:top;width:150px;"><strong>Short Description</strong><span class="input-info">If Required Only.</span></td>
  <td><textarea name="html_describe" cols="50" rows="5" class="txtinput" id="content" ><?php if($isEdit) echo $details->html_describe;?></textarea></td>
</tr>
 
<tr>
  <td valign="top"><strong>Order:</strong><span class="input-info">Arrange the order of category.</span></td>
  <td><input type="text" name="order" class="txtinput" value="<?php if($isEdit) echo $details->order;?>"/>
    <span style="margin-left:20px;">only integers</span></td>
</tr>
<tr>
  <td valign="top"><strong> Image:</strong><span class="input-info">Choose an image (Only one).</span></td>
  <td><input type="file" name="home_image" id="home_image" />
  <div class="imagethumbs-form">
<?php 
	if($isEdit){
		$imgname = $details->home_image;
		$img = explode(':',$imgname);
		//dumparray($img);
		if(!empty($imgname)){
	echo '';
			foreach($img as $i):
?>
      <div class="imagethumb-form additional-file-input" id="add-image1">
        	<a class="close-msg" title="Delete" id="deleteImg">
            	Delete
            </a>
            <a href="#" title="<?php echo $i;?>" class="img-wrap">
                <img src="<?php echo base_url()?>assets/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/categories/<?php echo $i;?>&w=150&h=150" />
            </a>  
        </div>
<?php endforeach;} }?>
    </div>
  </td>
</tr>
<tr>
  
 <input type="hidden" name="status" value="Publish"  />
</tr>


<tr>
  <td >&nbsp;</td>
  <td>
<i class="info"></i>
  </td>
</tr>
<tr>
  <td >&nbsp;</td>
  <td><input type="submit" name="submitDetail" id="submitDetail" value="Submit" class="btn front-next" /></td>
</tr>   
</table>  
<?php echo form_close();?> 
</div>