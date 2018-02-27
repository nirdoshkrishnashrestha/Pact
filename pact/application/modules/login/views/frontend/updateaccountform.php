<style>
.edit-form label.error {
	background: url("images/errors.png") no-repeat scroll transparent!important;
    color: #FF0000;
    float: left;
	border: 1px none;
	margin-bottom: 7px;
	padding: 0 17px;
}
.edit-form .error {
	background: none repeat scroll 0 0 #FAEBE7 !important;
	border: 1px dashed #FF0000;
    /*border: 1px solid #A22115;*/
    border-radius: 2px 2px 2px 2px;
    color: #990000;
    font-size: 0.85em;
    font-weight: 400;
    margin: 1px 0 0;
	width: 250px;
}

.slidingDiv p{
padding:5px 0;
}
</style>
<script>
$(document).ready(function(){
		$(".slidingDiv").hide();
	$('.checkbox').click(function(){
		if($('.checkbox').attr('checked'))
		{
		$(".slidingDiv").slideDown();
		$('.pass').append('<input type="password" name="oldPassword" id="password1"/>');
		$('.new_pass').append('<input type="password" name="newPassword" id="newPassword" />');
		$('.con_pass').append('<input type="password" name="confPassword" id="Confirm_Password" />');
		}
		else
		{
		$(".slidingDiv").slideUp();	
		}
	});
});
</script>
<div class="right_part">
         <!-- Breadcum starts -->
	<div class="breadcum-container">
    	<div class="breadcum"> <span><a href="index.php">Home</a></span><strong>My Account</strong> </div>
  	</div>
    <!-- Breadcum ends -->
        <div class="dashboard">
            <h2>Update Account</h2>
          <p>Update your account information below:</p>
          <?php global_message();?>
        </div>
        <div class="dashboard "><?php //if(userDetails('gender')='male')echo 'yes';else echo'no';?>
          <div class="newsletter" style="width:650px;"> 
          <form name="updateaccount" class="updateaccount" method="post" action="userAccountUpdate">
          <ul class="myaccount-list">
            <li><strong>First Name:</strong> <input type="text" name="firstname" value="<?=userDetails('firstname');?>"  size="30"/></li>
            <li><strong>last Name:</strong> <input type="text" name="lastname" value="<?=userDetails('lastname');?>"  size="30"/></li>
            <li><strong>Gender:</strong>  <select name="gender"><option value="male" <?php if(userDetails('gender')=='male')echo 'selected=selected';?>>Male</option><option value="female" <?php if(userDetails('gender')=='female')echo 'selected=selected';?>>Female</option></select></li>
            <li><strong>Street Address 1:</strong> <input type="text" name="street_address" value="<?=userDetails('street_address');?>"  size="30"/></li>
            <li><strong>Street Address 2:</strong> <input type="text" name="street_address2" value="<?=userDetails('street_address2');?>"  size="30"/></li>
            <li><strong>City:</strong> <input type="text" name="city" value="<?=userDetails('city');?>"  size="30"/></li>
            <li><strong>Postal Code:</strong> <input type="text" name="pcode" value="<?=userDetails('pcode');?>"  size="30"/></li>
            <li><strong>Country:</strong> <input type="text" name="country" value="<?=userDetails('country');?>"  size="30"/></li>
            <li><strong>Phone:</strong> <input type="text" name="phone" value="<?=userDetails('phone');?>"  size="30"/></li>
            <li><strong>Change pasword:</strong> <input type="checkbox" class="checkbox" title="Change Password" onclick="setPasswordForm(this.checked)" value="1" id="change_password" name="change_password"></li>            
          </ul>
			<div class="slidingDiv">
                <p class="pass">
                <strong>*Current Password :</strong>
                </p>
                <p class="new_pass">
                <strong>*New Password :</strong>
                </p>
                <p class="con_pass">
                <strong>*Confirm Password :</strong>
                </p>
            </div>
          <input type="submit" value="Update"  />
          </form>
         </div> 
        </div>
</div>