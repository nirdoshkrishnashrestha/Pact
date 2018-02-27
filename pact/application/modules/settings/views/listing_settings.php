  <?php if($this->session->flashdata('success_message')!="")
 		$display = '';
 else 
 	$display = 'none'?>
  <div class="titlebar" align="center" >
        <h1 align="left">Manage Settings            
        </h1>
        <div class="message" id="message" style="display:<?php echo $display?>">
            <div class="messages">
                <div class="icon-messages icon-success"></div>
                <div id="displayMsg"><?php echo @$this->session->flashdata('success_message')?></div>
                <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
            </div>               
        </div>
  </div>
  <div style="clear:both;height:1px"></div>
  <div class="table-wrapper" style="clear:left;">	
  <div >
  	<form name="frmSetting" id="frmSetting">
    
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>                
          <th style="text-align:left;" width="25%">Title</th>
          <th width="40%">Description</th>  
          <th width="15%">Value</th>                   
          <th width="20%" style="text-align:center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		if(isset($setting)){
			$count = 1;
			foreach($setting as $row):						
		?>
			<tr class="<?php echo ($count%2==0)?'even':'odd'?>">            	
				<td style="text-align:left;"><?php echo $row->title?></td>
				<td><?php echo $row->description?></td>	
				<td><?php echo $row->value?></td>							
				<td>
                	<span class="table-icons">
                    	<a href="<?php echo base_url()?>admin/settings/edit/<?php echo $row->id?>" class="edit editRow icons-table-actions icon-edit-table-action" title="Edit">Edit</a>
                        </span>
                </td>
                </tr>
    <?php
			$count++;
			endforeach;
		}
	  ?>     
     </tbody>
    </table> 
     
    </form>
    </div><div style="clear:both;height:1px"></div>
  </div>
</div>
<script>
$(function(){
	$('#message').delay(3000).fadeOut();
});
</script>