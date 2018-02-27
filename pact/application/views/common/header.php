    <script type="text/javascript">

ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")

</script>
    
    <div class="header">
    
    	<div class="logo">
        	<a href="#"></a>
            <?php echo $this->config->item('site_name');?>
        </div>       
        <div class="userinfo">
        	<div>Hello, <?php echo $this->session->userdata('admin_name')?> !  |  <a href="<?php echo base_url()?>admin/personal">My account</a></div>
            <span><span></span><a href="<?php echo $this->config->item('site_link')?>" title="Go to main site" class="view-main-site" target="_blank">View the Site</a>
            <a href="<?php echo base_url()?>admin/login/logout" class="logout" title="Logout">Logout</a></span>
            <ins></ins>
        </div>    
    </div>
    
    
    
    
    <div class="menubar">
    <div class="whitetrans-10pc-across"></div>

    <?php $active = "MenuBarItemHover"; 
	$pageName = $this->uri->segment(2); ?>
    
    <div id="ddtopmenubar">
    <ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a href="<?php echo base_url()?>admin/home/" class= "MenuBarItemSubmenu <?php if($pageName == "home") echo $active; ?>">Home</a></li> <li><a href="<?php echo base_url('admin/catagories')?>" class="MenuBarItemSubmenu <?php if($pageName == "catagories") echo $active; ?>">Categories</a></li> 	
   <li><a href="<?php echo base_url('admin/products')?>" class="MenuBarItemSubmenu <?php if($pageName == "products") echo $active; ?>">Products</a></li>    
      <li><a href="<?php echo base_url('admin/post')?>" class="MenuBarItemSubmenu <?php if($pageName == "post") echo $active; ?>">Post</a></li> 
      <!--<li><a href="<?php echo base_url('admin/about')?>" class="MenuBarItemSubmenu <?php if($pageName == "about") echo $active; ?>">About Us</a></li>-->  
   <li><a href="<?php echo base_url('admin/photogallery')?>" class="MenuBarItemSubmenu <?php if($pageName == "photogallery") echo $active; ?>">Images</a></li>
   <!--<li><a href="<?php echo base_url('admin/download')?>" class="MenuBarItemSubmenu <?php if($pageName == "download") echo $active; ?>">Download</a></li>-->
        
</ul> 


</div>
    <div class="blacktrans-20pc-across"></div>
    </div>
    
    <script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
<div id="js-ajax-loading-text" style="display:none">Loading...</div>