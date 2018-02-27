<script>
	$(document).ready(function(){
	//save reorder changes
	$('div.save_order').click(function(){
		var results = $("#sorty tbody").sortable("serialize",{
			'attribute' : 'rel'
		});
		//alert(results);
		$.post('<?php echo admin_url('slideshow/update_order')?>',results,function(data){
			//alert(data);
			if(data==1){
				alert('Slide Show successfully reordered.');
				$('div.save_order').fadeOut('3000');
			}
		});
	});
	//sortable
	var fixHelper = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};
	$(function() {
		$( "#sorty tbody" ).sortable({
			 helper: fixHelper,
			 cursor : 'move',
			 change : function(event, ui){
				//ui.css('color','black');
				//alert('a');
				$("div.save_order").fadeIn('slow');
				}
				}).css('cursor','move');
		$( "#sortable" ).disableSelection();
	});
	
	});
</script>
<?php if($this->session->flashdata('display_message')!="")
	$display = '';
else 
	$display = 'none'?>
  <div class="titlebar" align="center" >
        <h1 align="left">Manage Slides 
         <span>View, edit or delete existing Slides and
            <a href="<?php echo base_url('admin/slideshow/add')?>" class="btn create-add" id="CreateNew">Add new Slides</a>  	 as well.
            </span>           
        </h1>
        <div class="message" id="message" style="display:<?php echo $display?>">
            <div class="messages">
                <div class="icon-messages icon-success"></div>
                <div id="displayMsg"><?php echo @$this->session->flashdata('display_message')?></div>
                <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
            </div>               
        </div>
        
			<div class="page-searchbar" align="left">    
            	<div class="save_order">Click Here to Save Order</div>
            
            </div>
  </div>
  
  
  <div style="clear:both;height:1px"></div>
  <div class="table-wrapper form-wrapper" style="clear:left;">	
  <div >
  	<form name="frmSetting" id="frmSetting">    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" id="sorty">
      <thead>
        <tr>
          <th style="text-align:left;" width="4%">Sn.</th>                
          <th style="text-align:left;" width="18%">Title</th>
          <th style="text-align:left;" width="19%">Preview</th>
          <th width="26%">URL</th>
          <th width="9%">Status</th>
          <th width="15%" style="text-align:center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		if(!empty($details)){				
			$count = 1;
			foreach($details as $row):
			$row->status=='Publish'?$status_icon='icon-on':$status_icon='icon-off';
		?>
			<tr class="<?php echo ($count%2==0)?'even':'odd'?>" rel="ids_<?php echo $row->id;?>">
			  <td style="text-align:left;"><?php echo $count?></td>            	
				<td style="text-align:left;"><?php echo $row->title?></td>
				<td style="text-align:left;">
                <?php
					$imgname = $row->home_image;
					$img = explode(':',$imgname);
					//dumparray($img);
					$imgname = $img['0'];
				?>
		<div class="imagethumbs-form">
        <div id="add-image1" class="imagethumb-form additional-file-input">
            <a class="img-wrap" title="<?php echo $row->title?>" href="javascript:void()">
                <img src="assets/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/slides/<?php echo $imgname;?>&w=100&h=100" />
            </a>  
        </div></div>
        
                </td>
				<td><?php echo $row->url?></td>
				<td><a href="javascript:void();" onclick="status_pub('#<?php echo $row->id?>','slideshow/update_status')" id="<?php echo $row->id?>"><i title="<?=$row->status?>" class="<?=$status_icon?>"></i></a></td>							
				<td>
                	<span class="table-icons">
                    	<a href="admin/slideshow/edit/<?php echo $row->id?>" class="edit editRow icons-table-actions icon-edit-table-action" title="Edit">Edit</a>&nbsp;&nbsp;<a href="admin/slideshow/delete/<?php echo $row->id?>" class="deleteRow icons-table-actions icon-delete-table-action" title="Delete" onclick="return confirm('Are you sure')">Delete</a>
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
        <tr><td colspan="6" style="text-align:center">No slideshow Added.</td></tr>
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