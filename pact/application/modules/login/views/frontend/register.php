<style>
.client_register label.error {
	background: url("images/errors.png") no-repeat scroll transparent!important;
	color: #FF0000;
	float: left;
	border: 1px none;
	margin-bottom: 7px;
	margin-left: 218px;
	padding-right: 603px;
	padding-left: 15px;
}


</style>
<script type="text/javascript">
$(document).ready(function() {
$(".client_register").validate();
});
</script>
    <!-- Breadcum starts -->
	<div class="breadcum-container">
    	<div class="breadcum"> <span><a href="index.php">Home</a></span><strong>Checkout Here</strong> </div>
  	</div>
    <!-- Breadcum ends -->
    
<div class="col-main-wrap">
        <div class="main-wrap">
<div class="your-basket-wrap checkout-wrap">
            <h2>Account Registration</h2>
<div class="account-form">
                <p>If you're a new customer who hasn't registered with us before, you can create an account to manage your payment methods and profile, to make your shopping experience quicker and easier.</p>
                <ul>
                  <li>Register a Henson product</li>
                  <li>Safely save your preferred addresses for a quicker checkout process</li>
                  <li>Receive regular news and updates</li>
                </ul>
                <form action="userRegister" method="post" enctype="application/x-www-form-urlencoded" class="client_register">
                <h3>Login Information</h3>
<?php global_message();?>
                  <p>
                    <label>Username (Email)* :</label>
                    <input type="text" name="userEmail" value="" class="required email" />
                  </p>
                  <p>
                    <label>Enter a password (min. 6 characters) * :</label>
                    <input type="password" name="password" value="" id="" class="required"  minlength="5"/>
                  </p>
                  <p>
                    <label>Confirm password * :</label>
                    <input type="password" name="conf_password" class="required" value="" id="" minlength="5" />
                  </p>
                  
                  <h3>Personal Information</h3>                  
                  <p>
                    <label>First Name * :</label>
                    <input type="text" name="firstname" class="required" value="" id="" />
                  </p>
                  <p>
                    <label>Last Name * :</label>
                    <input type="text" name="lastname" class="required" value="" id="" />
                  </p>
				  <p>
                    <label>Gender</label>
                    <select name="gender"><option value="male">Male</option><option value="female">Female</option></select>
                  </p>
                  <p>
                    <label>Street Address 1 * :</label>
                    <input type="text" name="street_address"  class="required" value="" id="" />
                  </p>
                  <p>
                    <label>Street Address 2 :</label>
                    <input type="text" name="street_address2"  class="required" value="" id="" />
                  </p>
                  <p>
                    <label>City * :</label>
                    <input type="text" name="city" class="required" value="" id="" />
                  </p>
                  <p>
                    <label>Country * :</label>
                    <input type="text" name="country" class="required" value="" id="" />
                  </p>
                  <p>
                    <label>Post Code * :</label>
                    <input type="text" name="pcode" class="required" value="" id="" />
                  </p>
                  <p>
                    <label>Contact Number :</label>
                    <input type="text" name="phone"  value="" id="" />
                  </p>
                  <p>
                    <label>&nbsp;</label>
                    <input type="submit" name="" value="Register" id="" class="submit" />
                  </p>
                </form>
              </div>

          </div>
          
        </div>
      </div>