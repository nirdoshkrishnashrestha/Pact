<script>
$(function(){
	$('#addEditform').validate();
});

window.onload = function(){
	CKEDITOR.replace('content');
};

</script>
<div class="titlebar" align="center"><h1 align="left"><?php echo $template_title?></h1></div>
<div class="table-wrapper form-wrapper">
<?php echo form_open_multipart('',array('id'=>'addEditform','name'=>'addEditform','class'=>'userpane'));?>
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
  <td >Title</td>
  <td><input type="text" id="title" name="title" class="required" value="<?php echo @$details->title?>"/></td>
</tr>
<tr>
  <td >Slug</td>
  <td><input type="text" id="slug" name="slug" class="required" value="<?php echo @$details->slug?>"/></td>
</tr>
<tr>
  <td >Email Subject</td>
  <td><input type="text" id="subject" name="subject" class="required" value="<?php echo @$details->subject?>"/></td>
</tr>
<tr>
  <td style="vertical-align:top;width:150px;">Email Content<br /><br />(Use keyword like [keyword] which we have to replace before send mail.)</td>
  <td><textarea id="content" name="content" class="required" style="height:100px;width:280px;" ><?php echo @$details->content?></textarea></td>
</tr>
<tr>
  <td >&nbsp;</td>
  <td><input type="submit" name="submit_detail" id="submit_detail" value="Submit" class="btn front-next" /></td>
</tr>   
</table>  
<?php echo form_close();?> 
</div>