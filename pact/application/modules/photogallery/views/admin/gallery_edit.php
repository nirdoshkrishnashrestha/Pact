<?php // echo ROOT?>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.stringToSlug.js"></script>
<script src="<?php echo base_url()?>assets/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/uploadify/swfobject.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/uploadify/uploadify.css">
<script>
$(document).ready( function() {
	$("#gallery_name").stringToSlug();
	
	$('.imagethumbs-form a.edit_title').live('click',function(){
		//alert($(this).attr("title"));
		$("#editBox input#img_title").val($(this).attr('title'));
		$("#editBox input#img_order").val($(this).attr('rel'));
		$("#editBox").children('form').attr('rel',$(this).attr('id').substr(11));
		}).fancybox({
		helpers : {
           	title	: null,
       	}
	});
	
	$('#edit_caption').bind('submit',function(){
		var _imgID = $(this).attr('rel');
		var _title = $('input#img_title').val();
		var _order = $('input#img_order').val();
		//alert(_order);
		$.post("<?php echo admin_url("photogallery/update_title");?>",{id:_imgID,title:_title,order:_order},
		function(result){
			if(result==1){
				//alert(result);
				$('a#edit_title_'+_imgID).attr('title',$('input#img_title').val());
				$('a#edit_title_'+_imgID).attr('rel',$('input#img_order').val());
				$('a#img_title_'+_imgID).attr('title',$('input#img_title').val());				
				$.fancybox("<h4>Record Successfully updated.</h4>");
				$('input#img_title').val('');
				setTimeout("$.fancybox.close()",2000);
			}else{
				$.fancybox("<h14>Oops! some Errors occurs.<br>Please try again later.</h4>");
				$("input#img_title").val('');
				setTimeout("$.fancybox.close()",2000);
			}
			
		});
		return false;
	});
});
	
</script>

<script>
$(function(){
	$('#addEditform').validate();
});
</script>
<script>
<?php $timestamp = time();?>
$(function(){
	$('#home_image').uploadify({
		formData     	: {
					'timestamp' : '<?php echo $timestamp;?>',
					'targetFolder' : "uploads/banners",
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
		height        	: 30,
		swf           	: '<?php echo base_url()?>assets/uploadify/uploadify.swf',
		uploader      	: '<?php echo base_url()?>assets/uploadify/uploadify.php',
		width         	: 120,
		cancelImg 	  	: '<?php echo base_url() ?>assets/uploadify/cancel.png',
		buttonText 		: 'Upload Image',
		buttonCursor 	: 'hand',
		fileTypeDesc 	: 'Images Only',
		fileSizeLimit 	: '112048KB',
		queueSizeLimit 	: 50,
        fileTypeExts 	: '*.jpg;  *.jpeg; *.JPEG; *.JPG; *.PNG; *.png; *.gif;',
		checkExisting 	: '<?php echo base_url()?>assets/uploadify/check-exists.php',	
		onSelect		: function(file){
					//if($('#fileList').val()=='') return true; else return false;
					//alert('a');
					$('#submitDetail').val('Please wait while uploading...');
					$('#submitDetail').val('disabled','disabled');
    		},
  		onUploadSuccess : function(file, data, response) {	//alert(data);
					var _gid = <?php echo $gid;?>;
					$('#submitDetail').removeAttr('disabled');
					$('#submitDetail').val('Submit');
					$.post("<?php echo admin_url("photogallery/insertImg");?>",{gid:_gid,imgname:data},
					function(result){
						//alert(result);
						if(result!=''){
							imagePath = "<?php echo str_replace("\\","/",ROOT);?>";
						$('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" > <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" rel="'+data+'" id="img_title_'+result+'" class="img-wrap"> <img src="'+"<?php echo base_url()?>"+'assets/createThumb/create_thumb.php?src=uploads/banners/'+data+'&w=150&h=150" alt="'+data+'" /></a><span title="'+result+'"></span><br/><a class="edit_title" href="#editBox" title="" id="edit_title_'+result+'" rel="'+result+'">Edit Title</a></div>');							
						}
					});
			}
  });
});
</script>
<script>
//THIS FUNCTION IS TRIGGERED WHILE UPLOADED IMAGE, IS REQUIRED TO DELETE:
$(function(){
	$('a#deleteImg').live('click',function(){		
		var _id = $(this).next().next().attr("title");//alert(_id);
		var _img = $(this).next().attr("rel");//alert(_img);
		var _this = $(this).parent();
		$.post("<?php echo admin_url("photogallery/delete_image");?>",{imgName:_img,id:_id},
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
</script>
<?php $isEdit = isset($details) ? true : false;?>
<div class="titlebar" align="center"><h1 align="left"><?php echo $page_title?></h1></div>
<div class="table-wrapper form-wrapper">
<?php echo form_open_multipart('',array('id'=>'addEditform','name'=>'addEditform','class'=>'userpane'));?>
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
  <td ><strong>Image Name</strong></td>
  <td><input name="gallery_name" type="text" class="required txtinput" id="gallery_name" value="<?php if($isEdit) echo $details->gallery_name;?>" size="75"/></td>
</tr>
<tr style="display:none">
  <td ><strong>Image Slug</strong></td>
  <td><input type="text" id="permalink" name="gallery_slug" class="required txtinput" value="<?php if($isEdit) echo $details->gallery_slug;?>" size="50"/></td>
</tr>
<tr>
  <td style="vertical-align:top;width:150px;"><strong>Image Content</strong></td>
  <td><textarea id="content" name="content" class="txtinput" style="height:100px;width:400px;" ><?php if($isEdit) echo $details->content;?></textarea></td>
</tr> 


<tr>
  <td >&nbsp;</td>
  <td><input type="submit" name="submitDetail" id="submitDetail" value="Submit" class="btn front-next" /><?php echo form_close();?> </td>
</tr>
<tr>
  <td ><strong>Image Images:</strong></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="1" colspan="2" style="background-color:#0B6EB3; padding:0" > </td>
  </tr>
<tr>
  <td colspan="2" >
  <?php echo form_open_multipart('',array('id'=>'addEditform','name'=>'addEditform','class'=>'userpane'));?>
  	<input type="file" name="home_image" id="home_image" />
    <div class="imagethumbs-form">
<?php 
if(!empty($img_details)){				
	foreach($img_details as $row):				
?>
      <div class="imagethumb-form additional-file-input" id="add-image1">
        	<a class="close-msg" title="Delete" id="deleteImg">
            	Delete
            </a>
            <a href="#" rel="<?php echo $row->imgname;?>" title="<?php echo $row->title;?>" id="img_title_<?=$row->id?>" class="img-wrap">
                <img src="<?php echo base_url()?>assets/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/banners/<?php echo $row->imgname;?>&w=150&h=150" />
            </a>  <span title="<?php echo $row->id;?>"></span><br />
            <a class="edit_title" href="#editBox" title="<?php echo $row->title?>" id="edit_title_<?=$row->id?>" rel="<?php echo $row->order?>">Edit Title</a>
        </div>
        
<?php endforeach;}?>
    </div>
  <?php echo form_close();?> 
  </td>
  </tr>
<tr>
  <td colspan="2" ><i class="info"></i></td>
</tr>   
</table>  
</div>
	<div id="editBox" style="width:400px;display: none;">
        <form action="" method="post" id="edit_caption">
            <h4>Please Enter the Image Title &amp; orfer.</h4>
            <p>
                <label for="title">Image Title:&nbsp; </label>
                <input type="text" size="30" name="title" id="img_title">
            </p>
            <p style="padding-top:5px;">
                <label for="title">Image order: </label>
                <input type="text" size="30" name="order" id="img_order"> <span style="color:red; font-size:10px"> Only Integers</span>
            </p>
            <p>
                <input type="submit" value="Submit">
            </p>
            
        </form>
	</div>