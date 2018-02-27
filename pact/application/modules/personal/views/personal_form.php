<script>
$(function(){
	$('#frmPersonal').validate();
});
</script>
<?php if($this->session->flashdata('message')!=""){ ?>
  <span class="success"><?php echo $this->session->flashdata('message');?></span>
  <?php } ?>
    <div class="titlebar" align="center" >
  			<h1 align="left">Personal Details</h1>
            <div class="message" id="message" style="display:none">
                <div class="messages">
                    <div class="icon-messages icon-success"></div>
                    <div id="displayMsg">Record updated successfully !</div>
                    <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
                </div>               
            </div>
  </div>
  <div style="clear:both;height:1px"></div>
<div class="table-wrapper form-wrapper"> 
<?php echo form_open('admin/personal',array('id' => 'frmPersonal')); ?>

<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">	
	<tr>
    	<td width="13%">
        	<label>Admin Name</label></td>
		<td>
            <?php
			$full_name= set_value('fullname');
			if(isset($details->admin_name))
			{$full_name = $details->admin_name;}

			echo form_input(array("name"=>'fullname',"value"=>$full_name,"class"=>'required'));?>
           
           </td>
		<td width="63%">
            <div class="php-validation-error"><?php echo form_error('fullname'); ?></div></td>
    </tr>
    <tr>
    	<td width="13%">
        	<label>User Name</label></td>
		<td width="24%">
			<?php
			$username= set_value('username');
			if(isset($details->username))
			{$username = $details->username;}

			echo form_input(array("name"=>'username',"value"=>$username,"class"=>'required'));?>
            </td>
		<td width="63%">
            <div class="php-validation-error"><?php echo form_error('username'); ?></div></td>
    </tr>
	
	<tr>
    	<td width="13%">
        	<label>New Password</label></td>
		<td width="24%">
            <?php echo form_password(array("name"=>'password',"class"=>'required'));?>
            
           </td>
		<td width="63%">
           <div class="php-validation-error"><?php echo form_error('password'); ?></div></td>
    </tr>	
	<tr>
    	<td width="13%">
        	<label>Conform Password</label>	  </td>
		<td width="24%">
            
		<?php echo form_password(array("name"=>'confrompassword',"class"=>'required'));?>            	
              </td>
		<td width="63%">
            <div class="php-validation-error"><?php echo form_error('confrompassword'); ?></div></td>
    </tr>
    <tr>
    	<td width="13%">
        	<label>Email</label></td>
		<td width="24%">            
			<?php 
			$emails= set_value('email');
			if(isset($details->email))
			{$emails = $details->email;}
			echo form_input(array("name"=>'email',"class"=>'required',"value"=>$emails));?>
            </td>
		<td width="63%">
           <div class="php-validation-error"><?php echo form_error('email'); ?></div></td>
    </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td valign="top"><input type="submit" name="submit_detail" value="Update" class="btn front-next" /></td>
	  <td>&nbsp;</td>
    </tr>
</table>
<?php form_close();?>
</div>