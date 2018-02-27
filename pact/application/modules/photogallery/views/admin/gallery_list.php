<?php if($this->session->flashdata('display_message')!="")
	$display = '';
else 
	$display = 'none'?>
  <div class="titlebar" align="center" > 
        <h1 align="left">Manage Image  
         <span>View and edit existing Images.
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
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th style="text-align:left;" width="5%">Sn.</th>                
          <th style="text-align:left;" width="30%">Name</th>
          <th width="27%"> Slug</th>         
         
          <th width="17%" style="text-align:center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		if(!empty($details)){				
			$count = 1;
			foreach($details as $row):
			$row->status=='Publish'?$status_icon='icon-on':$status_icon='icon-off';
			$where=array("gid"=>$row->id);
			$imgNum = $this->general_db_model->countTotal('tbl_gallery_images',$where);

		?>
			<tr class="<?php echo ($count%2==0)?'even':'odd'?>">
			  <td style="text-align:left;"><?php echo $count?></td>            	
				<td style="text-align:left;"><?php echo $row->gallery_name.' ('.$imgNum.')'?> </td>
				<td><?php echo $row->gallery_slug?></td>
				
				
				<td>
                	<span class="table-icons">
                    	<a href="<?php echo base_url()?>admin/photogallery/edit/<?php echo $row->id?>" class="edit editRow icons-table-actions icon-edit-table-action" title="Edit / View Images">Edit</a>&nbsp;&nbsp;
                        <?php if($imgNum>0){$aa = 'no_delete';}else{$aa ='delete_link';} ?>
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
        <tr>
          <td colspan="6" style="text-align:center">No Image Added.</td></tr>
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