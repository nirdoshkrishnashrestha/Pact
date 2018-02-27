<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="ISO-8859-1"> 
<title><?php echo $this->config->item('site_name')?> - <?php echo @$page_title?>dsfs</title>


	<!-- Main CSS -->
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-latest.js"></script>

    <script type="text/javascript" language="javascript" src="<?php echo base_url()?>assets/js/common.js"></script>

    <!-- Main CSS -->

    <script>
		var site_name = '<?php echo $this->config->item('site_name')?>';
		var base_url = '<?php echo base_url()?>';
	</script>
</head>
<body>
<div class="wrapper">
<div class="main-container" id="js-main-container" style="min-height:400px;">
       <?php echo $contents;?> 
</div>
</div>
</body>
</html>
