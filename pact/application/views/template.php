<!DOCTYPE html>
<html lang="en"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="ISO-8859-1"> 
<title><?php echo $this->config->item('site_name')?> - <?php echo @$page_title?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/images/favicon.ico">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/ddlevelsmenu.js"></script>

<!-- Reset CSS -->
<link href="<?php echo base_url()?>assets/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/css/ddlevelsmenu-base.css" rel="stylesheet" type="text/css" />

<!-- Main CSS -->
<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />
	
<!-- Menu -->
<script src="<?php echo base_url()?>assets/MainMenuAssets/main-menu.js" type="text/javascript"></script>
<link href="<?php echo base_url()?>assets/MainMenuAssets/main-menu.css" rel="stylesheet" type="text/css" />

<!--Custom Listbox -->
<script type="text/javascript" src="<?php echo base_url()?>assets/CustomSelectBoxAssets/custom-form-elements.js"></script>
<link href="<?php echo base_url()?>assets/CustomSelectBoxAssets/code.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/CustomSelectBoxAssets/form.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
	function SlideEffect(id) {
	ar id = "#"+id;
	(id).slideToggle("fast");
	}
</script>
       
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.8.17.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/ui-lightness/jquery-ui-1.8.18.custom.css" />
 
<!--sortable-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/sortable/themes/base/jquery.ui.all.css">
<!--<script src="../../jquery-1.9.1.js"></script>-->
<script src="<?php echo base_url()?>assets/sortable/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url()?>assets/sortable/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url()?>assets/sortable/ui/jquery.ui.mouse.js"></script>
<script src="<?php echo base_url()?>assets/sortable/ui/jquery.ui.sortable.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>

<script type="text/javascript" src="<?php echo $this->config->item('ckeditor')?>ckeditor.js"></script>

<!--  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.tablesorter.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/datatable.css" />
<script type="text/javascript" language="javascript" src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>-->
    
<script type="text/javascript" language="javascript" src="<?php echo base_url()?>assets/js/common.js"></script>
    

<script>
	var site_name = '<?php echo $this->config->item('site_name')?>';
	var base_url = '<?php echo base_url()?>';
	var webpath = '<?php echo base_url();?>';
</script>
    
<script>
function status_pub(selecter,action_url){
	var _id = $(selecter).attr('id'); //alert(_id);
        var _status = $(selecter).children('i').attr('title');
		$(selecter).children('i').removeClass();
      	$(selecter).html('<img src="<?php echo config_item('admin_images');?>ajax-loader.gif" />');
        var _this = $(selecter);
        $.get('<?php echo admin_url();?>'+action_url, {id : _id, status : _status},
		function(data){
			//alert(data);
			_this.html('<i></i>');
			_this.children("i").attr("title",data);
            if(data=='Publish' || data =='Active'){
				_this.children('i').addClass("icon-on");		
				_this.children('i').attr("title",data);		
			}else{
				_this.children('i').addClass("icon-off");
				_this.children('i').attr("title",data);
			}
        });
	
}
</script>
</head>
<body>
<div class="wrapper">
<?php $this->load->view('common/header');?>
<div class="main-container" id="js-main-container" style="min-height:400px;">
       <?php echo $contents;?> 
</div>
</div>
<?php $this->load->view('common/footer');?>
</body>
</html>