<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Top Quality Admin Panel</title>

	<!-- Reset CSS -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" />

	<!-- Main CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

	<!-- Main CSS Dim Theme -->
    <link href="css/dim.css" rel="stylesheet" type="text/css" />
    
    <!-- Menu -->
    <script src="MainMenuAssets/main-menu.js" type="text/javascript"></script>
	<link href="MainMenuAssets/main-menu.css" rel="stylesheet" type="text/css" />
    
    <!-- Menu -->
	<link href="MainMenuAssets/menu-dim.css" rel="stylesheet" type="text/css" />
    
    <!--Custom Listbox -->
    <script type="text/javascript" src="CustomSelectBoxAssets/custom-form-elements.js"></script>
	<link href="CustomSelectBoxAssets/code.css" rel="stylesheet" type="text/css" />
	<link href="CustomSelectBoxAssets/form.css" rel="stylesheet" type="text/css" />
    
    <!-- Jquery Slide -->
    <!--<link href="QuickEditAssets/fx.slide.css" rel="stylesheet" type="text/css" /> -->   
	<script type="text/javascript" src="QuickEditAssets/jquery.js"></script>
	<script type="text/javascript">
	  function SlideEffect(id) {
			var id = "#"+id;
			$(id).slideToggle("fast");
	  }
	</script>
		
	<!-- Colorbox Popups -->
    <link type="text/css" media="screen" rel="stylesheet" href="ColorBoxAssets/colorbox.css" />
	<script type="text/javascript" src="ColorBoxAssets/jquery.min.js"></script>
	<script type="text/javascript" src="ColorBoxAssets/jquery.colorbox.js"></script>
	<script type="text/javascript" src="ColorBoxAssets/colorbox.js"></script>
    
    <!--Custom File Input Start-->
    <script type="text/javascript" src="CustomFileInputAssets/CustomFileInput.js"></script>
	<link href="CustomFileInputAssets/CustomFileInput.css" rel="stylesheet" type="text/css" />

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
    
    <form action="#" method="post" class="main-container">
    
   	  <div class="titlebar" align="center"> 	
            
            
            
        	<h1 align="left">Page Manager
            <span>View, edit or delete existing pages and
            <a href="#" class="btn create-add">Create/add new page</a> as well.
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
        
      <div class="table-wrapper">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="1%">
              <input name="selectrow" type="checkbox" class="inputreset" title="Select all items" />
            </th>
            <th width="1%">&nbsp;</th>
            <th class="table-item-name">
            	Page name
                <a href="#" class="ascending" title="Sort in ascending order">Sort in ascending order</a>
                <a href="#" class="descending" title="Sort in descending order">Sort in descending order</a>
            </th>
            <th>Banner image</th>
            <th>Description</th>
            <th width="1%"><a href="#" title="Save order" class="save-order">Order</a></th>
            <th width="1%">Status</th>
            <th width="1%" style="text-align: center;">Action</th>
            <th width="1%" style="text-align: center;">ID</th>
          </tr>
          <tr class="odd" id="quick-edit-expanded1">
            <td><input name="selectrow2" type="checkbox" class="inputreset" title="Select all items" /></td>
            
            <td class="quick-edit">
                
					<a href="#;"
                    id="expand2"
                    onclick="javascript:getElementById('expand2').style.display='none';
                    getElementById('minimize2').style.display='block';
                    getElementById('quick-edit-row2').className='quick-edit-row-visible';
                    getElementById('quick-edit-expanded1').className='odd quick-edit-expanded';"
                    class="icon-table-item-quickedit icon-expand"
                    title="Expand quick edit box">
                    Expand quick edit box
                    </a>
                        
					<a href="#"
					id="minimize2"
                    onclick="javascript:getElementById('minimize2').style.display='none';
                    getElementById('expand2').style.display='block';
                    getElementById('quick-edit-row2').className='quick-edit-row-hidden';
                    getElementById('quick-edit-expanded1').className='odd';"
					class="icon-table-item-quickedit icon-minimize"
					title="Minimize quick edit box"
					style="display: none;">
					Minimize quick edit box
					</a> 
                      
            </td>
            
            <td class="table-item-name">
            	<a href="#" title="Click to edit this item">Home page</a>
            </td>
            <td>
            <a href="popups/banner-quick-edit.php" class="banner-thumb-popup banner-quick-edit">
            home.jpg
            <span>
            <img src="images/temp/banner-thumb.png" alt="Image name" title="Click to view or update the image" />
            <ins></ins></span>
            </a>
            </td>
            <td>Lorem ipsum doler sit amet sed ed ....</td>
            <td>
            	<span class="order-input">
                	<input name="order1" type="text" value="1" />
                    <a href="#" title="Move up" class="order-up"></a>
                    <a href="#" title="Move down" class="order-down"></a>
                </span>
            </td>
            <td style="text-align: center;" ><input name="selectrow" type="checkbox" class="inputreset" title="Published, uncheck to unpublish." checked="checked" /></td>
            <td>
            	<span class="table-icons">
                	<a href="#" class="icons-table-actions icon-view-table-action" title="View">View</a>
                	<a href="#" class="icons-table-actions icon-edit-table-action" title="Edit">Edit</a>
                	<a href="#" class="icons-table-actions icon-delete-table-action" title="Delete">Delete</a>
                	<a href="#" class="icons-table-actions icon-verify-table-action" title="Verify">Verify</a>
                	<a href="#" class="icons-table-actions icon-restore-table-action" title="Restore">Restore</a>
                	<a href="#" class="icons-table-actions icon-permission-table-action" title="Restore">Permission</a>
                </span>
            </td>
            <td>1</td>
          </tr>
          <tr class="quick-edit-row-hidden" id="quick-edit-row2">
          <td colspan="2" class="blank-td">&nbsp;</td>
          <td colspan="3"><div class="quickeditbox"><div></div>
            <table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="80">Page name</td>
                <td><label for="pagename"></label>
                  <input name="pagename" type="text" id="pagename" value="Home page" /></td>
              </tr>
              <tr>
                <td>Page title</td>
                <td><input name="pagename2" type="text" id="pagename2" value="Top Quality Admin Panel" size="40" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><a href="#" class="btn front-next">Submit</a></td>
              </tr>
            </table>
          </div></td>
            <td colspan="4" class="blank-td">&nbsp;</td>
          </tr>
          
          
          <tr class="even" id="quick-edit-expanded2">
            <td><input name="selectrow3" type="checkbox" class="inputreset" title="Select all items" /></td>
            
           
            
            <td class="quick-edit">
                
					<a href="#;"
                    id="expand1"
                    onclick="javascript:getElementById('expand1').style.display='none';
                    getElementById('minimize1').style.display='block';
                    getElementById('quick-edit-row1').className='quick-edit-row-visible';
                    getElementById('quick-edit-expanded2').className='odd quick-edit-expanded';"
                    class="icon-table-item-quickedit icon-expand"
                    title="Expand quick edit box">
                    Expand quick edit box
                    </a>
                        
					<a href="#"
					id="minimize1"
                    onclick="javascript:getElementById('minimize1').style.display='none';
                    getElementById('expand1').style.display='block';
                    getElementById('quick-edit-row1').className='quick-edit-row-hidden';
                    getElementById('quick-edit-expanded2').className='even';"
					class="icon-table-item-quickedit icon-minimize"
					title="Minimize quick edit box"
					style="display: none;">
					Minimize quick edit box
					</a> 
                      
            </td>
            
            <td class="table-item-name">
            	<a href="#" title="Click to edit this item">Home page</a>
            </td>
            <td>
            <a href="#" class="banner-thumb-popup">
            home.jpg
            <span>
            <img src="images/temp/banner-thumb.png" alt="Image name" title="Click to view or update the image" />
            <ins></ins></span>
            </a>
            </td>
            <td>Lorem ipsum doler sit amet sed ed ....</td>
            <td>
            	<span class="order-input">
                	<input name="order1" type="text" value="1" />
                    <a href="#" title="Move up" class="order-up"></a>
                    <a href="#" title="Move down" class="order-down"></a>
                </span>
            </td>
            <td style="text-align: center;" ><input name="selectrow4" type="checkbox" class="inputreset" title="Published, uncheck to unpublish." checked="checked" /></td>
            <td class="odd"><span class="table-icons"> <a href="#" class="icons-table-actions icon-view-table-action" title="View">View</a> <a href="#" class="icons-table-actions icon-edit-table-action" title="Edit">Edit</a> <a href="#" class="icons-table-actions icon-delete-table-action" title="Delete">Delete</a> <a href="#" class="icons-table-actions icon-verify-table-action" title="Verify">Verify</a> <a href="#" class="icons-table-actions icon-restore-table-action" title="Restore">Restore</a> </span></td>
            <td>2</td>
          </tr>
          <tr class="quick-edit-row-hidden" id="quick-edit-row1">
          <td colspan="2" class="blank-td">&nbsp;</td>
            <td colspan="2">
            
      <div class="quickeditbox"><div></div>
       		 <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                          <td width="80">Page name</td>
                          <td><label for="pagename"></label>
                          <input name="pagename" type="text" id="pagename" value="Home page" /></td>
                </tr>
                <tr>
                  <td>Page title</td>
                  <td><input name="pagename2" type="text" id="pagename2" value="Top Quality Admin Panel" size="40" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><a href="#" class="btn front-next">Submit</a></td>
                </tr>
              </table>
                    </div>
          
          </td>  
          <td colspan="5" class="blank-td">&nbsp;</td>
          </tr>
         
          
          
        </table>
</div>
        
        <div class="table-footer">
            <a href="#" class="btn remove-delete">Delete selected</a>
            <a href="#" class="btn copy-duplicate">Duplicate selected</a>
            
            <div class="table-pagination">
            	Display:
            	<select name="countitem" id="itemcount" class="styled">                
                <option value="">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                </select> 
                
                <a href="#" class="btn btn-lefticon back-previous">Previous</a>
                <div class="page-numbers"> <a href="#">1</a> | <a href="#">2</a> | <a href="#">3</a><span>4</span><a href="#">5</a> | <a href="#">6</a> | <a href="#">7</a> </div>
                <a href="#" class="btn front-next">Next</a>
            </div>
            
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
