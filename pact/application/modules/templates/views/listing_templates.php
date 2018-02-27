<?php if($this->session->flashdata('display_message')!="")
	$display = '';
else 
	$display = 'none'?>
  <div class="titlebar" align="center" >
        <h1 align="left">Manage Templates 
         <span>View, edit or delete existing templates and
            <a href="<?php echo base_url('admin/templates/add')?>" class="btn create-add" id="CreateNew">Create/add new  Templates</a>  	 as well.
            </span>           
        </h1>
        <div class="message" id="message" style="display:<?php echo $display?>">
            <div class="messages">
                <div class="icon-messages icon-success"></div>
                <div id="displayMsg"><?php echo @$this->session->flashdata('display_message')?></div>
                <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
            </div>               
        </div>
  </div>
  <div style="clear:both;height:1px"></div>
  <div class="table-wrapper form-wrapper" style="clear:left;">	
  <div >
  	<form name="frmSetting" id="frmSetting">
    
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>                
          <th style="text-align:left;" width="15%">Title</th>
          <th width="15%">Slug</th> 
          <th width="15%">Subject</th>
          <th width="40%">Content</th>                   
          <th width="15%" style="text-align:center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		if(!empty($template)){				
			$count = 1;
			foreach($template as $row):				
		?>
			<tr class="<?php echo ($count%2==0)?'even':'odd'?>">            	
				<td style="text-align:left;"><?php echo $row->title?></td>
				<td><?php echo $row->slug?></td>
                <td><?php echo $row->subject?></td>	
				<td><?php echo subString($row->content,200)?></td>							
				<td>
                	<span class="table-icons">
                    	<a href="<?php echo base_url()?>admin/templates/edit/<?php echo $row->id?>" class="edit editRow icons-table-actions icon-edit-table-action" title="Edit">Edit</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>admin/templates/delete/<?php echo $row->id?>" class="deleteRow icons-table-actions icon-delete-table-action" title="Delete" onclick="return confirm('Are you sure')">Delete</a>
                        </span>
                </td>
                </tr>
    <?php
			$count++;
			endforeach;
		}
		else
		{
		?>
        <tr><td colspan="4" style="text-align:center">No Templates Added.</td></tr>
        <?php	
		}
	  ?>     
     </tbody>
    </table> 
     
    </form>
    </div><div style="clear:both;height:1px"></div>
    <div class="table-footer">
          		<div class="table-pagination">
		<?php echo $this->pagination->create_links(); ?>
	</div> 
    </div>
  </div>
</div>
<script>
$(function(){
	$('#message').delay(3000).fadeOut();
});
</script>