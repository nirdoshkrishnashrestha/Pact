<title>Pact - Gallery</title>
<meta name="keywords" content="Pact,Photo Gallery,<?php echo $gallery->imgname; ?>,churpi,Silver Lining Inc,best for dog,best dog">
<meta name="description" content="<?php echo $gallery->imgname;?> Photo Gallery">
</head>

<body>



<div id="content-page">

<div class="right-part">
<h1>Photo Gallery</h1>

<?php 
$sql = "select * from tbl_gallery_images where gid = 10 limit 12";
$query = $this->db->query($sql)->result();
foreach($query as $gallery){
 ?>
<div class="thumb-image-box">
<div class="thumbImageDisplay">
<div class="thumbsize">
<a href="<?php echo base_url()."uploads/banners/".$gallery->imgname;?>"><img src="<?php echo base_url()."uploads/banners/".$gallery->imgname;?>" border="0" /></a>
</div>
</div>
<div class="clear"></div>
</div>
<?php } ?>

<div class="clear"></div>
</div>

<?php include('left-nav.php'); ?>


<div class="clear"></div>
</div>


