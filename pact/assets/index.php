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
    
    <!--Custom Listbox Start-->
    <script type="text/javascript" src="CustomSelectBoxAssets/custom-form-elements.js"></script>
	<link href="CustomSelectBoxAssets/code.css" rel="stylesheet" type="text/css" />
	<link href="CustomSelectBoxAssets/form.css" rel="stylesheet" type="text/css" />

</head>

<body><div class="wrapper">
	
    <div class="header">
    
    	<div class="logo">
        	<a href="#"><img src="images/logo.png" alt="Top Quality Admin Panel" /></a>
            Top Quality Internet Development
        </div>
        
        <div class="userinfo">
        	<div>Hello Guest !  Please login to enter admin section.</div>
            <span><span></span><a href="#" title="Go to main site" class="view-main-site">View the Site</a></span>
            <ins></ins>
        </div>
    
    </div>
    
    <div class="menubar loginbar-only">
    <div class="whitetrans-10pc-across"></div></div>
    
    <div class="login-container" align="center">
        <form action="admin.php" method="post">  	  
            <h1><span></span>Administrator login</h1> 
          <div class="outer">
            <p>Use a valid username and password to gain access to the administrator panel.</p>
            
            <label><span>Username:</span>
              <input type="text" name="username" id="username" class="inputbox" />
            </label>
            
            <label class="password"><span class="secondlast">Password:</span>
              <input type="password" name="password" id="password" class="inputbox" />
              <a href="#">Forgot password? <ins></ins></a>
            </label>
            
            <label class="last"><span>Go to page:</span>
              <select class="styled">
              	<option>Admin panel home</option>
              	<option>Add a page</option>
              	<option>Settings</option>
              </select>
            </label>
            
            <label><span></span>
            <input name="rememberme" type="checkbox" value="Remember me !" /> Remember me !
            </label>
            
            <label><span></span>
            <input name="Login" type="submit" value="Login" class="btn front-next" />
            </label>
            
            </div> 
        </form>
    </div>
    
    <div class="titlebar login-error" align="center">
   	  		<div class="message" id="message">
                <div class="clear"></div>
                <div class="messages">
                	<div class="icon-messages icon-error"></div>
                	Wrong username or password ! Please re-enter.
                	<a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
                </div>
            </div>
        
  
        
      </div>
    
    <div class="login-container" align="center">
        <form action="#" method="post" class="error">  	  
            <h1><span></span>Administrator login</h1> 
          <div class="outer">
            <p>Use a valid username and password to gain access to the administrator panel.</p>
            
            <label><span>Username:</span>
              <input type="text" name="username" id="username" class="inputbox" />
            </label>
            
            <label class="password"><span class="secondlast">Password:</span>
              <input type="password" name="password" id="password" class="inputbox" />
              <a href="#">Forgot password? <ins></ins></a>
            </label>
            
            <label class="last"><span>Go to page:</span>
              <select class="styled">
              	<option>Admin panel home</option>
              	<option>Add a page</option>
              	<option>Settings</option>
              </select>
            </label>
            
            <label><span></span>
            <input name="rememberme" type="checkbox" value="Remember me !" /> Remember me !
            </label>
            
            <label><span></span>
            <input name="Login" type="submit" value="Login" class="btn front-next" />
            </label>
            
            </div> 
        </form>
    </div>

</div>

<div class="footer">
&copy 2012 TQID. All rights reserved | Top Quality Admin Panel | Version 1.0 | Designed by: <a href="http://www.tqid.com/" target="_blank"></a>
</div>

</body>
</html>
