<?php
@session_start();
if($this->session->flashdata('error_message')) 
{
	$display = '';
	$formClass = 'error';
}
else
{
	$display = 'none';
	$formClass = '';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->config->item('site_name');?> Admin Panel</title>

	<!-- Reset CSS -->
    <link href="<?php echo config_item('admin_css');?>reset.css" rel="stylesheet" type="text/css" />

	<!-- Main CSS -->
    <link href="<?php echo config_item('admin_css');?>style.css" rel="stylesheet" type="text/css" />

	<!-- Main CSS Dim Theme -->
    <link href="<?php echo config_item('admin_css');?>dim.css" rel="stylesheet" type="text/css" />
    
    <!--Custom Listbox Start-->
   
    <script type="text/javascript" src="<?php echo config_item('js');?>jquery-latest.js"></script>
    <script type="text/javascript" src="<?php echo config_item('site_js');?>login.js"></script>
    <script type="text/javascript" src="<?php echo config_item('js');?>jquery.validate.js"></script>
</head>

<body>

<div class="wrapper">
	
    <div class="header">
    
    	<div class="logo">
        	
            <?php echo $this->config->item('site_name');?> Admin Panel
        </div>
        
        <div class="userinfo">
        	<div>Hello Guest !  Please login to enter admin section.</div>
            <span><span></span><a href="<?php echo config_item('site_link')?>" title="Go to main site" class="view-main-site">View the Site</a></span>
            <ins></ins>
        </div>
    
    </div>
    
    <div class="menubar loginbar-only">
    <div class="whitetrans-10pc-across"></div></div>
    
  <div class="titlebar login-error" align="center"  style="display:<?php echo $display?>">
   	  		<div class="message" id="message">
                <div class="clear"></div>
                <div class="messages">
                	<div class="icon-messages icon-error"></div>
                	<span id="errorMsg">Wrong username or password ! Please re-enter.</span>
                	<a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
                </div>
            </div>
      </div>
      
      <br />
<br />


    <div class="login-container" align="center">
    
        <form action="<?php echo base_url()?>admin/login/checkuser" method="post" id="loginform" class="<?php echo $formClass?>">  	  
          <h1><span></span>Administrator login</h1> 
          <div class="outer">
            <p>Use a valid username and password to gain access to the administrator panel.</p>
            
            <label><span>Username:</span>
              <input type="text" name="username" id="username" class="inputbox" value="<?php echo @get_cookie('login_name')?>"/>
            </label>
            
            <label class="password"><span class="secondlast">Password:</span>
              <input type="password" name="password" id="password" class="inputbox" value="<?php echo @get_cookie('login_pass')?>"/>              
             <!-- <a href="#">Forgot password? <ins></ins></a>-->
            </label>            
            <!--<label class="last"><span>Go to page:</span>
              <select class="styled">
              	<option>Admin panel home</option>
              	<option>Add a page</option>
              	<option>Settings</option>
              </select>
            </label>-->            
                        
            <label><span></span>
            <input name="submit_login_info" type="submit" value="Login" id="loginBtn" class="btn front-next" />
            </label>            
            <br />
            <br />
          </div> 
        </form>

    </div> 

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

  
</div>
<div class="footer">
&copy <?php echo date("Y");?> . All rights reserved | 
<?php echo $this->config->item('site_name');?> Admin Panel | Version 6.4</div>
</body>
</html>