<div class="right_part">
         <!-- Breadcum starts -->
	<div class="breadcum-container">
    	<div class="breadcum"> <span><a href="index.php">Home</a></span><strong>My Account</strong> </div>
  	</div>
    <!-- Breadcum ends -->
            <h2>Dashboard</h2>
          <h4>Hello , <?=userDetails('firstname');?></h4>
          <p>From your My Account Dashboard you can view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
<!--          <div class="belt">
          	<span class="add"><a href="wishlist">My Wishlist</a></span>
          	<span class="add"><a href="updateAccount">View Order History</a></span>
          </div>-->
          <?php global_message();?>
        <div class="dashboard ">
          <div class="newsletter">
            <h3>Login Information</h3>
          
          <ul class="login-list">
            <li><strong>User Name</strong></li>
            <li><?=userDetails('userEmail')?></li>
            <li><strong>Password</strong></li>
            <li>**********</li>
            <li>&nbsp;</li>
            <li>&nbsp;</li><li>&nbsp;</li>
                <li>
                    <span class="add">
                    <a href="updateAccount">Update Account</a>
                    </span>
                </li>
          </ul>
          </div> 
        </div>
        <div class="dashboard">
           <div class="newsletter"> 
            <h3>Address Book </h3>
          
          <ul class="myaccount-list">
            <li><u>Default Billing Address</u></li>
            <li><strong>First Name:</strong> <?=userDetails('firstname');?></li>
            <li><strong>last Name:</strong> <?=userDetails('lastname');?></li>
            <li><strong>Gender:</strong> <?=userDetails('gender');?></li>
            <li><strong>Street Address 1:</strong> <?=userDetails('street_address');?></li>
            <li><strong>Street Address 2:</strong> <?=userDetails('street_address2');?></li>
            <li><strong>City:</strong> <?=userDetails('city');?></li>
            <li><strong>Postal Code:</strong> <?=userDetails('pcode');?></li>
            <li><strong>Country:</strong> <?=userDetails('country');?></li>
            <li><strong>Phone:</strong> <?=userDetails('phone');?></li>

          </ul>
         </div>
        </div>
</div>