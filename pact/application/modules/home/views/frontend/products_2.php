<title>Silver Lining Inc Pvt. Ltd. - <?php echo $category->page_title; ?></title>
<meta name="keywords" content="Pact,products,<?php echo $category->page_title; ?>,churpi,Silver Lining Inc,best for dog,best dog">
<meta name="description" content="<?php echo $category->content;?>">
</head>

<body>

<div id="content-page">

<div class="right-part">
<h1><?php echo $category->page_title; ?></h1>

<?php echo $category->html_describe; ?>
<br />
<div class="clear"></div>


<div class="products">
<?php 
	
	$sql_small = "select * from tbl_products where cat_id = ".$category->id;
	$query_small = $this->db->query($sql_small)->result();
		foreach($query_small as $small){
 ?>
<div class="product-col">
     <img src="<?php echo base_url()."uploads/products/".$small->home_image;?>" />
    
    <?php echo $small->content; ?>
    
	<div class="clear"></div>
</div>

<?php } ?>
<div class="clear"></div>
</div>




<div class="clear"></div>
</div>

<?php include('left-nav.php'); ?>


<div class="clear"></div>
</div>