<div class="titlebar" align="center"><h1 align="left"><?php echo $page_title?></h1></div>
<div class="table-wrapper form-wrapper">
<?php echo form_open_multipart('',array('id'=>'addEditform','name'=>'addEditform','class'=>'userpane'));?>
<input type="hidden" name="date" value="<?=date('Y-m-d H:i:s')?>" />
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
  <th width="228" align="left" class="table">Contact Headings</th>
  <th width="832" align="left"><span class="table">Contact Headings</span></th>
</tr>
<tr>
  <td width="228" class="table"><strong>Company Name</strong></td>
  <td><input name="company_name" type="text" class="required txtinput" id="" value="<?=$details->company_name;?>" size="75" required /></td>
</tr> 
<tr>
  <td class="table"><strong>Address</strong></td>
  <td>
  
  <textarea rows="5" cols="50" name="address1" required><?php echo $details->address1;?></textarea>

</tr>
<tr style="display:none;">
  <td class="table"><strong>Secondary Adress</strong></td>
  <td><i class="info">
    <input name="address2" type="textarea" class="txtinput" id="" value="<?=$details->address2;?>" size="75"/>
  </i></td>
</tr>
<tr>
  <td class="table"><strong>Phone No.</strong> (first)</td>
  <td><i class="info">
    <input name="phone1" type="text" class="txtinput" id="" value="<?=$details->phone1;?>" size="75"/>
  </i></td>
</tr>
<tr>
  <td align="left" class="table"><strong>Fax No</strong>.</td>
  <td><input name="fax" type="text" class="txtinput" id="" value="<?=$details->fax;?>" size="75"/></td>
</tr>
<tr>
  <td align="left" class="table"><strong>Email</strong></td>
  <td><input name="email1" type="text" class="txtinput" id="" value="<?=$details->email1;?>" size="75"/></td>
</tr>
<tr style="display:none">
  <td align="left" class="table"><strong>Email</strong>(Second)</td>
  <td><input name="email2" type="text" class="txtinput" id="" value="<?=$details->email2;?>" size="75"/></td>
</tr>
<tr>
  <td align="left" class="table"><strong>Website URL</strong></td>
  <td><input name="url" type="text" class="txtinput" id="" value="<?=$details->url;?>" size="75"/></td>
</tr>
<tr>
  <td >&nbsp;</td>
  <td><input type="submit" name="submitDetail" id="submitDetail" value="Submit" class="btn front-next" /></td>
</tr>   
</table>  
<?php echo form_close();?> 
</div>