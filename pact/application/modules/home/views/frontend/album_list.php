<div id="content-wrapper">

<div id="content-page">

<h1>Photo Gallery</h1>

<?php 

	foreach($picture as $pic){
		
		 $sql = "select imgname from tbl_gallery_images where gid = ".$pic->id." Limit 1";
		$query = $this->db->query($sql)->row();
		
		 ?>
		
		
<div class="photo-gallery-box">
<div class="imageDisplay">
<a href="<?php echo base_url(); ?>photo_list/tbl_gallery_images/<?php echo $pic->id; ?>"><img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $query->imgname; ?>" border="0" /></a>
</div>

<h2><a href="<?php echo base_url(); ?>photo_list/tbl_gallery_images/<?php echo $pic->id; ?>"><?php echo $pic->gallery_name; ?></a></h2>
<div class="clear"></div>
</div>

		
<?php
	}
?>

<div class="clear"></div>
</div>

<?php include('leftmenu.php'); ?>

<div class="clear"></div>
</div>