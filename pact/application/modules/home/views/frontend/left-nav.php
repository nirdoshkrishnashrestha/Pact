<div class="left-part">

<div class="left-nav-box">
<h1>About Us</h1>

<li><a href="<?php echo base_url("tbl_post/introduction");?>">Introduction</a></li>
<li><a href="<?php echo base_url("tbl_post/company-profile");?>">Company Profile</a></li>
<li style="border-bottom:none;"><a href="<?php echo base_url("tbl_post/vision");?>">Vision</a></li>

<div class="clear"></div>
</div>

<div class="left-nav-box">
<h1>Products</h1>
  <?php 
			$sql_product = "select * from tbl_catagories";
			$query_products = $this->db->query($sql_product)->result();
			
			foreach($query_products as $query_product){
					if($query_product->page_slug == "himalayan-dog-chew" or $query_product->page_slug == "himalayan-dog-puffs"){
			 ?>
<li><a href="<?php echo base_url("tbl_products/products"."/".$query_product->page_slug);?>"><?php echo str_replace(" ", "&nbsp;",$query_product->page_title); ?></a></li>
<?php }else{ ?>
<li><a href="<?php echo base_url("tbl_products/products_2"."/".$query_product->page_slug);?>"><?php echo str_replace(" ", "&nbsp;",$query_product->page_title); ?></a></li>
<?php } } ?>
<div class="clear"></div>
</div>

<div class="left-nav-box">
<h1>Process</h1>

<li><a href="<?php echo base_url("tbl_post/manufacturing-process");?>">Manufacturing Process</a></li>
<li style="border-bottom:none;"><a href="<?php echo base_url("tbl_post/processing-of-chews");?>">Processing of Chews</a></li>

<div class="clear"></div>
</div>

<div class="clear"></div>
</div>