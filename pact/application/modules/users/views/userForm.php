<p class="error">&nbsp;</p>
<div class="table-wrapper form-wrapper">  
  <?php echo form_open_multipart('',array('id'=>'addEditform','name'=>'addEditform','class'=>'userpane'));?>
  <input type="hidden" name="main_id" id="main_id" value="<?php echo @$row->id ?>" />
  
  <table border="0" cellpadding="5" cellspacing="0" width="100%">
    <tr>
      <td style="width:100px;">First Name *</td>
      <td><input type="text" id="txtFirstName" name="txtFirstName" class="required txtinput" value="<?php echo @$row->first_name ?>" /></td>
    
      <td style="width:100px;">Last Name *</td>
      <td><input type="text" id="txtLastName" name="txtLastName" class="required txtinput" value="<?php echo @$row->last_name ?>" /></td>
    </tr>
   
     <tr>
      <td >Zone *</td>
      <td>
      <select name="selZone" id="selZone" class="required">
	  		<?php echo $this->mylibrary->DropDown('zone','id','zone',@$row->zone,"",'',true,'- Select zone -')?>
      </select>
      </td>
    
      <td >District *</td>
      <td><select name="selDistrict" id="selDistrict" class="required">
	  		<?php echo $this->mylibrary->DropDown('district','id','district',@$row->district,"",'',true,'- Select district -')?>
      </select></td>
    </tr>
     <tr>
      <td >Address *</td>
      <td><input type="text" id="txtAddress" name="txtAddress" class="required txtinput" value="<?php echo @$row->address ?>" /></td>
    
      <td >Email</td>
      <td><input type="text" id="txtEmail" name="txtEmail" class="txtinput" value="<?php echo @$row->email ?>" /></td>
    </tr>
     <tr>
      <td >Contact No</td>
      <td><input type="text" id="txtContactNo" name="txtContactNo" class="txtinput" value="<?php echo @$row->contact_no ?>" /></td>
   
      <td >Department *</td>
      <td>
      <select name="txtDepartment" id="txtDepartment" class="required">
	  		<?php echo $this->mylibrary->DropDown('department_name','id','tbl_departments',@$row->department_id,"",'',true,'- Select department -')?>
      </select>
     </td>
    </tr>
    <tr>
      <td >Employee Group *</td>
      <td>
      <select name="selGroup" id="selGroup" class="required">
	  		<?php echo $this->mylibrary->DropDown('group_name','id','user_group',@$row->user_group_id,"",'',true,'- Select user group -')?>
      </select>
     </td>   
      <td >Post *</td>
      <td><select id="selPost" name="selPost" class="required"><?php echo $this->mylibrary->DropDown('post','id','user_post',@$row->user_post,"",'',true,'- Select user post -')?></select></td>
    </tr>
     <tr>
      <td style="vertical-align:top;">Photo<?php if(@$row->photo!='') echo '<br><br />(Select another <br />to replace)'?></td>
      <td colspan="3"><?php if(@$row->photo!='') echo '<img src="'.base_url().'uploads/users/'.@$row->photo.'" width="100" height="100"/>';?><input type="file" name="txtPhoto" id="txtPhoto"><input type="hidden" name="filename" id="filename"></td>
              
    </tr>   
    <tr>
      <td style="vertical-align:top;">Description</td>
      <td colspan="3"><textarea id="description" name="description" class="required txtinput" style="height:100px;width:680px;" ><?php echo strip_tags(@$row->description) ?></textarea></td>
    </tr>
   
  </table>  
  <?php echo form_close();?> 
  </div>

<!--<script type="text/javascript" src="<?php //echo base_url();?>extra/uploadify/jquery-1.4.2.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url();?>extra/uploadify/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>extra/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<link href="<?php echo base_url();?>extra/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function() {
  $('#txtPhoto').uploadify({
    'uploader'  : '<?php echo base_url();?>extra/uploadify/uploadify.swf',
    'script'    : '<?php echo base_url();?>extra/uploadify/uploadify.php',
    'cancelImg' : '<?php echo base_url();?>extra/uploadify/cancel.png',
    'folder'    : 'uploads/users/',
    'auto'      : true,
	'multi'     : false,	
	'hideButton': false,
	'buttonImg' :  "<?php echo base_url()?>extra/uploadify/save_image.jpg",	
	'width'     : 142,
	'height'	: 28,
	'removeCompleted' : false,
  	'onComplete'  : function(event, ID, fileObj, response, data) {		
			$('#filename').val(response);
			$('.ui-button-text').each(function(){
				$(this).css('display','');
				if($('#main_id').val()=='' && $(this).text()=='Edit')
					$(this).css('display','none');
				if($('#main_id').val()!='' && $(this).text()=='Save')
					$(this).css('display','none');
							
			});								
    },
	'onOpen'      : function(event,ID,fileObj) {		
      	$('.ui-button-text').each(function(){			
				$(this).css('display','none');
				
		});	
    }
  });
});
function delete_image(name){
	var filelist = $('#filename').val();
	var filenames = filelist.split(',');
	$('#filename').val('');
	for(var i=0;i<filenames.length;i++)
	{
		var names = filenames[i].split('_');		
		if(names[1] != name)
		{	
			//returnText.replace(/^\s+|\s+/,"")	
			if($('#filename').val()=='')
				$('#filename').val(filenames[i]);
			else		
				$('#filename').val($('#filename').val()+','+filenames[i]);
		}		
	}
}
</script>