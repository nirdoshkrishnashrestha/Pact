<?php if($this->session->flashdata('message')!=""){ ?>
  <span class="success"><?php echo $this->session->flashdata('message');?></span>
  <?php } ?>
    <div class="titlebar" align="center" >
  			<h1 align="left">Manage Employees
            <span>View, edit or delete existing employees and
            <a href="javascript:;" class="btn create-add" rel="users/add" id="CreateNew">Create/add new  Employee</a>  	 as well.
            </span>
            </h1>
            <div class="message" id="message" style="display:none">
                <div class="messages">
                    <div class="icon-messages icon-success"></div>
                    <div id="displayMsg">Record updated successfully !</div>
                    <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
                </div>               
            </div>
  </div>
  <div style="clear:both;height:1px"></div>
  <div class="table-wrapper" style="clear:left;">	
  <div>
  	<form name="frmUser" id="frmUser">
    <table border="0" id="userstable" cellspacing="0" cellpadding="2" class="userData tablesorter">
      <thead>
        <tr style="background:#CCCCCC;color:#000;">
          <th width="1%">
              <input type="checkbox" onclick="ToggleAll(this, document.frmUser);" value="1" id="toggleAll" name="toggleAll">
          </th>         
          <th style="text-align:left;" width="15%">Employee Name</th>
          <th width="15%">address</th>
          <th width="15%">Contact No</th>  
          <th width="10%">Email</th>
          <th width="10%">Department</th>
          <th width="10%">Post</th> 
          <th width="15%">Added Date</th>                 
          <th width="10%" style="text-align:center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		if(isset($user)){
			foreach($user as $key=>$row):
				
				echo '<tr><td style="text-align:left;"><input type="checkbox" value="'.$row['id'].'" name="selected[]"></td>';			
				echo '<td style="text-align:left;">'.$row['first_name'].' '.$row['last_name'].'</td>';
				echo '<td>'.$row['address'].'</td>';	
				echo '<td>'.$row['contact_no'].'</td>';	
				echo '<td>'.$row['email'].'</td>';	
				echo '<td>'.$row['department_name'].'</td>';
				echo '<td>'.$row['post'].'</td>';	
				echo '<td>'.getDateTmeFormatted($row['added_date']).'</td>';				
				echo '<td><span class="table-icons"><a href="javascript:;" rel="users/details/'.$row['id'].'" class="icons-table-actions icon-view-table-action viewdetails" title="View">View</a>&nbsp;&nbsp;<a href="javascript:;" id="'.$row['id'].'" class="edit editRow icons-table-actions icon-edit-table-action" rel="users/edit/'.$row['id'].'" title="Edit">Edit</a>&nbsp;&nbsp;<a href="javascript:;" class="deleteRow icons-table-actions icon-delete-table-action" rel="users/delete/'.$row['id'].'" title="Delete">Delete</a></span></td></tr>';	
			endforeach;
		}
	  ?>     
    
      </tbody>
    </table>
    <div class="table-footer">
   		<a href="javascript:;" id="js-delete-selected" class="btn remove-delete">Delete selected</a>
    </div>
    </form>
    </div><div style="clear:both;height:1px"></div>
  </div>
  
</div>

<div id="dialog-form" title="Add Employee" style="display:none"></div>
<div id="user-details" title="Employee Details" style="display:none"></div>  
 
  <!-- Config div-->
  <div style="display:none" id="whatisthis">Employee</div>
  <div style="display:none" id="DefaultOrderBy">7</div>
  <div style="display:none" id="actionPath">users/add</div>
  <div style="display:none" id="formPath">users/loadForm</div>
  <div style="display:none" id="detailPagePath"></div>
  <!-- Close Config div-->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/site_js/user.js"></script>