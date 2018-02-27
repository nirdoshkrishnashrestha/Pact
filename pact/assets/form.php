<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Top Quality Admin Panel</title>

	<!-- Reset CSS -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" />

	<!-- Main CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    
    <!-- Menu -->
    <script src="MainMenuAssets/main-menu.js" type="text/javascript"></script>
	<link href="MainMenuAssets/main-menu.css" rel="stylesheet" type="text/css" />
    
    <!--Custom Listbox Start-->
    <script type="text/javascript" src="CustomSelectBoxAssets/custom-form-elements.js"></script>
	<link href="CustomSelectBoxAssets/code.css" rel="stylesheet" type="text/css" />
	<link href="CustomSelectBoxAssets/form.css" rel="stylesheet" type="text/css" />
    
    <!--Custom File Input Start-->
    <script type="text/javascript" src="CustomFileInputAssets/CustomFileInput.js"></script>
	<link href="CustomFileInputAssets/CustomFileInput.css" rel="stylesheet" type="text/css" />
    
    <!-- Jquery Slide -->
    <!--<link href="QuickEditAssets/fx.slide.css" rel="stylesheet" type="text/css" /> -->   
	<script type="text/javascript" src="QuickEditAssets/jquery.js"></script>
	<script type="text/javascript">
	  function SlideEffect(id) {
			var id = "#"+id;
			$(id).slideToggle("fast");
	  }
	</script>
    
    <!-- Date Picker -->
	<link rel="stylesheet" href="DatePickerAssets/css/datepicker.css" type="text/css" />
    <!--<link rel="stylesheet" media="screen" type="text/css" href="DatePickerAssets/css/layout.css" />-->
	<script type="text/javascript" src="DatePickerAssets/js/jquery.js"></script>
	<script type="text/javascript" src="DatePickerAssets/js/datepicker.js"></script>
    <script type="text/javascript" src="DatePickerAssets/js/eye.js"></script>
    <script type="text/javascript" src="DatePickerAssets/js/utils.js"></script>
    <script type="text/javascript" src="DatePickerAssets/js/layout.js?ver=1.0.2"></script>

</head>

<body><div class="wrapper">
	
    <div class="header">
    
    	<div class="logo">
        	<a href="#"><img src="images/logo.png" alt="Top Quality Admin Panel" /></a>
            Top Quality Internet Development
        </div>
        
        <div class="userinfo">
        	<div>Hello, John Doe !  You have 3 Messages  |  My account</div>
            <span><span></span><a href="#" title="Go to main site" class="view-main-site">View the Site</a><a href="#" class="logout" title="Logout">Logout</a></span>
            <ins></ins>
        </div>
    
    </div>
    
    <div class="menubar">
    <div class="whitetrans-10pc-across"></div>
    
    <form class="global-searchbar">
    <input name="searchadminpanel" type="text" onblur="if(this.value=='') this.value='Search admin panel ...';" onfocus="if(this.value=='Search admin panel ...') this.value='';" value="Search admin panel ..." size="20" class="inputbox" title="Search entire admin panel" />
             
            	<input name="Search" type="submit" value="Search" class="searchbtn" />
    </form>
    
    <ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a href="../home/">Home</a>      </li>
  <li><a href="#" class="MenuBarItemSubmenu">Company</a>
    <ul>
      <li><a href="aboutus.php"><strong>About us</strong></a></li>
      <li><a href="contactus.php"><strong>Contact us</strong></a></li>
      <li><a href="testimonials.php"><strong>Testimonials</strong></a></li>
</ul>
    </li>
  <li><a class="MenuBarItemSubmenu" href="#">Destination</a>
      <ul>
        <li>
        <a href="../home/destination.php">
        <strong>Page manager</strong>
        <span>View, edit or delete existing pages</span>
        </a>
        </li>
        
		<li>
        <a href="../home/destination.php">
        <strong>Add page</strong>
        <span>Create a new page</span>
        </a>
        </li>
        
		<li>
        <a href="../home/destination.php">
        <strong>Featured pages</strong>
        <span>Pages featured for spefic function</span>
        </a>
        </li>
      </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Travel Center</a>
    <ul>
      <li><a href="booking.php"><strong>Reservation</strong></a></li>
      <li><a href="terms.php"><strong>Terms and Condition</strong></a></li>
      <li><a href=hotels.php><strong>Hotels and Resorts</strong></a></li>
      <li><a href="request_catalog.php"><strong>Request Catalog</strong></a></li>
      <li><a href="gallery.php"><strong>Photo Gallery</strong></a></li>
      <li><a href="customize_trip.php"><strong>Custom Journey</strong></a></li>
    </ul>
    </li>
    <li><a href="customize_trip.php" class="MenuBarItemSubmenu">Custom Journey</a>
</ul>
    
    <div class="blacktrans-20pc-across"></div></div>
    
    <form action="#" method="post" enctype="multipart/form-data" class="main-container">
    
   	  <div class="titlebar" align="center"> 	
            
            
            
        	<h1 align="left">Edit home page
            <span>Change or update home page.
            </span>
            </h1>
            
   	  		<div class="message" id="message">
            	<div class="messages">
                	<div class="icon-messages icon-success"></div>
                	Page updated successfully !
                	<a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
                </div>
                <div class="clear"></div>
                <div class="messages">
                	<div class="icon-messages icon-error"></div>
                	Error updating page !
                	<a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
                </div>
            </div>
        
  <div class="page-searchbar" align="left">     
            
            	<select name="status" id="status" class="styled">                
                <option value="">Select status</option>
                <option value="Enabled">Enabled</option>
                <option value="Disabled">Disabled</option>
                </select>       
            
            	<input name="searchpage" type="text" onblur="if(this.value=='') this.value='Search page ...';" onfocus="if(this.value=='Search page ...') this.value='';" value="Search page ..." size="20" class="inputbox" title="Search this page only" />
             
            	<input name="Search" type="submit" value="Search" class="searchbtn" />
            
            </div>
        
      </div>
        
<div class="table-wrapper form-wrapper">
        
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td width="180">Item ID</td>
				  <td><strong>23</strong></td>
			  </tr>
				<tr>
                    <td class="even"><strong>Page name</strong><span class="input-info">Unique name for page.</span></td>
                    <td>
                    <input name="pagename" type="text" size="20" /></td>
		    </tr>
				<tr class="error">
				  <td class="even"><strong>Page name</strong><span class="input-info">Unique name for page.</span></td>
				  <td>
                  		<input name="pagename2" type="text" size="20" class="inputbox" />                  
                    	<div class="error-msg">
                        <span>Please enter page name <ins></ins></span>
                        </div></td>
			  </tr>
				<tr>
				  <td>Select date</td>
				  <td>
                  <input class="inputDate" id="inputDate" value="<?php echo date('m/d/Y');  ?>" readonly="readonly" />
				  <!--<label id="closeOnSelect"><input type="checkbox" class="inputreset" /> Close on selection</label>-->
                  </td>
			  </tr>
				<tr>
                    <td><strong>Page title</strong><span class="input-info">Title that appears in titlebar of web browser.</span></td>
                        <td><input name="pagetitle" type="text" size="20" /></td>
	      </tr>
				<tr>
				  <td><strong>Meta tag</strong><span class="input-info">Tags that help the page to be found in search engines.</span></td>
				  <td><textarea name="metatag2" cols="30" rows="5"></textarea></td>
			  </tr>
				<tr class="error">
                    <td><strong>Meta tag error</strong><span class="input-info">Tags that help the page to be found in search engines.</span></td>
                    <td>
                        <textarea name="metatag" cols="30" rows="5"></textarea>
                    	<div class="error-msg">
                        <span>Please enter meta tag. <ins></ins></span>
                        </div></td>
				</tr>
				<tr>
                    <td><strong>Keywords</strong><span class="input-info">Keywords that help the page to be found in search engines.</span></td>
                    <td>
                        <input name="keywords" type="text" size="20" /></td>
				</tr>
				<tr>
				  <td>
                  <strong>Input file</strong>
                  <span class="input-info">Choose and image to change the image.</span>
                  </td>
				  <td>
                  
				    
				    <span class="file-wrapper">
				      <input type="file" name="photo2" id="photo2" />
				      <span class="btn choose-select btn-orange">Choose an image</span>
                    </span>
                  
                  <div class="imagethumbs-form">
                  
                  	<div class="imagethumb-form">
                        <span class="img-wrapper">Current image</span>
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a><br />
                        <ins class="input-wrap"><input name="uploadnewimg" type="checkbox" value="" class="inputreset" /> Delete this image</ins>
                    </div> 
                    
                    <div class="imagethumb-form">
                        <span class="img-wrapper">Selected image</span>
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                        <br />
                        <ins class="input-wrap"><input name="uploadnewimg" type="checkbox" value="" class="inputreset" onmouseover="javascript:getElementById('tooltip-text1').style.display='inline-block';getElementById('tooltip-text1').style.left='-125px';" onmouseout="javascript:getElementById('tooltip-text1').style.display='none';getElementById('tooltip-text1').style.left='7px';" /> Upload this image</ins>
                        
                        <a class="tooltip" onmouseover="javascript:getElementById('tooltip-text1').style.display='inline-block'" onmouseout="javascript:getElementById('tooltip-text1').style.display='none'">?<span id="tooltip-text1">Select this option only if you are sure to replace the image.<ins></ins></span></a>
                        
                    </div>
                    
                  </div>
			      </td>
			  </tr>
              
              <tr>
				  <td>
                  <strong>Additional images</strong>
                  <span class="input-info">Choose and image to change the image.</span>
                  </td>
				  <td>
                  
                  <div class="imagethumbs-form">
                  
                  	<div class="imagethumb-form additional-file-input" id="add-image1">
                    <a onclick="javascript:getElementById('add-image1').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div>
                    
                    <div class="imagethumb-form additional-file-input" id="add-image2">
                        <a onclick="javascript:getElementById('add-image2').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div> 
                    
                    <div class="imagethumb-form additional-file-input">
                    <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div>
                  
                  	<div class="imagethumb-form additional-file-input">
                    <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div>
                    
                    <div class="imagethumb-form additional-file-input">
                        <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div> 
                    
                    <div class="imagethumb-form additional-file-input">
                    <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div>
                  
                  	<div class="imagethumb-form additional-file-input">
                    <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div>
                    
                    <div class="imagethumb-form additional-file-input">
                        <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div> 
                    
                    <div class="imagethumb-form additional-file-input">
                    <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="Delete">
                        Delete
                        </a>
                        <a href="#" title="Click to view large image" class="img-wrap">
                        <img src="images/temp/banner-thumb.png" width="150" height="110" alt="Thumb" />
                        </a>
                    </div>
                    
                  <div class="clear"></div>
                  
                    <a href="#" class="btn create-add btn-blue">Add image</a>
				    <span class="file-wrapper">
				      <input type="file" name="photo2" id="photo2" />
				      <span class="btn choose-select btn-orange">Choose an image</span>
                    </span>
                  </div>
			      </td>
			  </tr>
              
				
				<tr>
				  <td><strong>Input file</strong></td>
				  <td>
                  
                  home.jpg - <a href="#" class="banner-thumb-popup" title="Click to view large image">
            view
            <span>
            <img src="images/temp/banner-thumb.png" alt="Image name" />
            <ins></ins></span>
            </a>
            <br />
			      
				    <span class="file-wrapper">
				      <input type="file" name="photo2" id="photo2" />
				      <span class="btn choose-select btn-orange">Choose an image</span>
                    </span>
                    <input name="deletephoto" type="checkbox" value="Delete current" class="inputreset" /> Delete current image
					</td>
			  </tr>
				<tr>
				  <td><strong>Status</strong><span class="input-info">Check to publish, uncheck to unpublish.</span></td>
				  <td>
						<label for="checkbox"><input type="checkbox" name="checkbox" id="checkbox" class="inputreset" /> Active</label></td>
			  </tr>
				<tr>
				  <td><strong>Radio</strong></td>
				  <td><p>
				    <label>
				      <input type="radio" name="Option" value="radio" id="Option_0" class="inputreset" />
				      Yes</label>
				    <label>
				      <input type="radio" name="Option" value="radio" id="Option_1" class="inputreset" />
			        No</label>
				    <br />
			      </p></td>
			  </tr>
				<tr>
				  <td><strong>Select box</strong><span class="input-info">Keywords that help the page to be found in search engines.</span></td>
				  <td>
                  <select name="selectbox" id="selectbox" class="styled">                
                <option value="">Select status</option>
                <option value="Enabled">Enabled</option>
                <option value="Disabled">Disabled</option>
                </select></td>
			  </tr>
				<tr class="error">
				  <td><strong>Select box</strong><span class="input-info">Keywords that help the page to be found in search engines.</span></td>
				  <td><select name="selectboxerror" id="selectboxerror" class="styled">
				    <option value="">Select status</option>
				    <option value="Enabled">Enabled</option>
				    <option value="Disabled">Disabled</option>
				    </select>
                    	<div class="error-msg">
                        <span>Please select status.<ins></ins></span>
                        </div></td>
			  </tr>
            </table>

        
</div>
        
        <div class="table-footer">
            <a href="#" class="btn front-next">Update</a>
       	  <a href="#" class="btn remove-delete">Cancel</a>
          <input type="submit" name="button" id="button" value="Submit" class="btn front-next" />
        </div>
        
    </form>
    
    
    <script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>

</div>

<div class="footer">
&copy 2012 TQID. All rights reserved | Top Quality Admin Panel | Version 1.0 | Designed by: <a href="http://www.tqid.com/" target="_blank"></a>
</div>

</body>
</html>
