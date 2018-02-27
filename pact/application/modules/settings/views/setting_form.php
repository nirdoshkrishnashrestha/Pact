<div class="titlebar" align="center"><h1 align="left">Edit Site Settings</h1></div>
<div class="table-wrapper form-wrapper">
<?php echo form_open_multipart('',array('id'=>'addEditform','name'=>'addEditform','class'=>'userpane'));?>
<input type="hidden" name="main_id" id="main_id" value="" />
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
  <td >Title</td>
  <td><input type="text" id="title" name="title" class="required txtinput" value="<?php echo $details->title?>"/></td>
</tr>
<tr>
  <td style="vertical-align:top;width:150px;">Description</td>
  <td><textarea id="description" name="description" class="required txtinput" style="height:100px;width:280px;" ><?php echo $details->description?></textarea></td>
</tr> 
<tr>
  <td >Value</td>
  <td><input type="text" id="setting_value" name="setting_value" class="required txtinput"  value="<?php echo $details->value?>"/></td>
</tr> 
<tr>
  <td >&nbsp;</td>
  <td><input type="submit" name="submit_detail" id="submit_detail" value="Submit" class="btn front-next" /></td>
</tr>   
</table>  
<?php echo form_close();?> 
</div>