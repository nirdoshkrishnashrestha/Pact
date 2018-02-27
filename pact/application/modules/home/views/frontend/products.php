<title>Silver Lining Inc Pvt. Ltd. - <?php echo $category->page_title; ?></title>
<meta name="keywords" content="Pact,products,<?php echo $category->page_title; ?>,churpi,Silver Lining Inc,best for dog,best dog">
<meta name="description" content="<?php echo $category->html_describe;?>">
</head>

<body>



<div id="content-page">

<div class="right-part">
<h1><?php echo $category->page_title; ?></h1>

<?php echo $category->html_describe; ?>

<br />
<div class="clear"></div>

<div class="products">
<h2>Chews for Small Dogs</h2>
<div class="clear"></div>

<?php 
	
	$sql_small = "select * from tbl_products where cat_id = ".$category->id." and dog_size = 'Small Size' order by `order` limit 3";
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

<div class="products">
<h2>Chews for Medium Dogs</h2>
<div class="clear"></div>

<?php 
	
	$sql_medium = "select * from tbl_products where cat_id = ".$category->id." and dog_size = 'Medium Size' order by `order` limit 3";
	$query_medium = $this->db->query($sql_medium)->result();
		foreach($query_medium as $medium){
 ?>

<div class="product-col">
    <img src="<?php echo base_url()."uploads/products/".$medium->home_image;?>" />
    
    
   <?php echo $medium->content; ?>
   
	<div class="clear"></div>
</div>

<?php } ?>

<div class="clear"></div>
</div>

<div class="products">
<h2>Chews for Large Dogs</h2>
<div class="clear"></div>

<?php 
	
	$sql_large = "select * from tbl_products where cat_id = ".$category->id." and dog_size = 'Large Size' order by `order` limit 3";
	$query_large = $this->db->query($sql_large)->result();
		foreach($query_large as $large){
 ?>
<div class="product-col">
    <img src="<?php echo base_url()."uploads/products/".$large->home_image;?>" />
    
    
   <?php echo $large->content; ?>
   
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


