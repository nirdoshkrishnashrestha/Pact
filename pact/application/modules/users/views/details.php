<div class="table-wrapper form-wrapper">  
<table border="0" cellpadding="5" cellspacing="0" width="100%">
    <tr>
      <td style="width:100px;">First Name</td>
      <td><?php echo @$row->first_name ?></td>
    
      <td style="width:100px;">Last Name</td>
      <td><?php echo @$row->last_name ?></td>
    </tr>
   
     <tr>
      <td >Zone</td>
      <td><?php echo @$row->zone_name?>
      </td>
    
      <td >District </td>
      <td><?php echo @$row->district_name?>
      </select></td>
    </tr>
     <tr>
      <td >Address </td>
      <td><?php echo @$row->address ?></td>
    
      <td >Email</td>
      <td><?php echo @$row->email ?></td>
    </tr>
     <tr>
      <td >Contact No</td>
      <td><?php echo @$row->contact_no ?></td>
   
      <td >Department</td>
      <td>
     <?php echo @$row->department_name?>
      </select>
     </td>
    </tr>
    <tr>
      <td >User Group </td>
      <td>
     <?php echo @$row->group_name?>
      </select>
     </td>   
      <td >Post *</td>
      <td><?php echo @$row->post?></select></td>
    </tr>
     <tr>
      <td style="vertical-align:top;">Photo</td>
      <td colspan="3"><?php if(@$row->photo!='') echo '<a href="'.base_url().'uploads/users/'.@$row->photo.'" target="_blank"><img src="'.base_url().'uploads/users/'.@$row->photo.'" width="100" height="100"/></a>';?></td>              
    </tr>   
    <tr>
      <td style="vertical-align:top;">Description</td>
      <td colspan="3"><?php echo @$row->description ?></td>
    </tr>   
  </table>   
  </div>