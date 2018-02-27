<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.stringToSlug.js"></script>
<script>
$(document).ready( function() {
		$("#gallery_name").stringToSlug();
	});
</script>

<script>
$(function(){
	$('#addEditform').validate();
});

</script>

<?php $isEdit = isset($details) ? true : false;?>
<div class="titlebar" align="center"><h1 align="left"><?php echo $page_title?></h1></div>
<div class="table-wrapper form-wrapper">
<?php echo form_open_multipart('',array('id'=>'addEditform','name'=>'addEditform','class'=>'userpane'));?>
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
  <td width="200" ><strong>Image Name</strong></td>
  <td width="860"><input name="gallery_name" type="text" class="required txtinput" id="gallery_name" value="<?php if($isEdit) echo $details->gallery_name;?>" size="75"/></td>
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
  <td><input type="submit" name="submitDetail" id="submitDetail" value="Submit" class="btn front-next" /></td>
</tr>   
</table>  
<?php echo form_close();?> 
</div>