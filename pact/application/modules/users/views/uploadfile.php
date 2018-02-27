<script type="text/javascript" src="<?php echo base_url()?>extra/uploadify/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>extra/uploadify/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>extra/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<link href="<?php echo base_url();?>extra/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
// <![CDATA[
$(document).ready(function() {
  $('#file_upload').uploadify({
    'uploader'  : '<?php echo base_url()?>extra/uploadify/uploadify.swf',
    'script'    : '<?php echo base_url()?>extra/uploadify/uploadify.php',
    'cancelImg' : '<?php echo base_url()?>extra/uploadify/cancel.png',
    'folder'    : '../uploads/users',
    'auto'      : true
  });
});
// ]]>
</script>

<form action="" name="frmUser" id="frmUser" enctype="multipart/form-data">
<input id="file_upload" type="file" name="file_upload" />
</form>

