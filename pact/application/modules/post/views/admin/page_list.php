<?php 
	if($this->session->flashdata('display_message')!="") $display = '';else	$display = 'none';
	($pagetype!='')?$addlink='/?page='.$pagetype:$addlink='';
?>
  <div class="titlebar" align="center" >
        <h1 align="left">Manage <?php echo "post";//@$page_title?> 
         <span>View, edit or delete existing Member and
            <a href="<?php echo base_url('admin/post/add'.$addlink)?>" class="btn create-add" id="CreateNew">Create/add new Post </a>  	 as well.
            </span>           
        </h1>
        <div class="message" id="message" style="display:<?php echo $display?>">
            <div class="messages">
                <div class="icon-messages icon-success"></div>
                <div id="displayMsg"><?php echo @$this->session->flashdata('display_message')?></div>
                <a href="javascript:void()" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
            </div>               
        </div>
        
<div class="page-searchbar" align="left">    
            <form method="get" action="">             
                <select name="pagetype" id="status" onchange="form.submit();" class="selectType" style="display:none;">                
                <?php
                    $this->db->order_by('order','ASC');
                    $query = $this->db->get('tbl_static_pages_category');
                    //printquery();
                    foreach($query->result() as $q):
                ?>
                <option value="<?=$q->pc_name?>" <?php if($this->input->get('pagetype') == $q->pc_name) echo 'selected=selected';?>><?=ucwords($q->pc_name);?></option>
                <?php endforeach;?>
                </select>       
            
                <input name="searchpage" type="text" onblur="if(this.value=='') this.value='Search page ...';" onfocus="if(this.value=='Search page ...') this.value='';" placeholder="Search page ..." size="20" class="inputbox" title="Search this page only" />
                <input name="Search" type="submit" value="Search" class="searchbtn" />
            </form>
            
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
          <th style="text-align:left;" width="20%">Post  Name</th>
          <th style="text-align:left;" width="20%">Page Slug</th>
          
          <th width="9%">Order</th>
          <th width="17%" style="text-align:center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		if($total_pages!=0){
			$count = 1;
			
			foreach($pages as $row):
			$sqls0 = "select page_title from tbl_catagories where id = ".$row->cat_id;
   			$query_cat0 = $this->db->query($sqls0)->row();
			$row->status=='Publish'?$status_icon='icon-on':$status_icon='icon-off';
		?>
			<tr class="<?php echo ($count%2==0)?'even':'odd'?>">
			  <td style="text-align:left;"><?php echo $count?></td>            	
				<td style="text-align:left;"><?php echo $row->page_title?></td>
                <td style="text-align:left;"><?php echo $row->page_slug?></td>
               
				          
				<td><?php echo $row->order?></td>
											
				<td>
                	<span class="table-icons">
                    	<a href="<?php echo base_url()?>admin/post/edit/<?php echo $row->id?>" class="edit editRow icons-table-actions icon-edit-table-action" title="Edit">Edit</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>admin/post/delete/<?php echo $row->id?>" class="deleteRow icons-table-actions icon-delete-table-action" title="Delete" onclick="return confirm('Are you sure')">Delete</a>
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
        <tr><td colspan="6" style="text-align:center">No Pages Added.</td></tr>
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