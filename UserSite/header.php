
<script type="text/javascript">
function validate()
{
		var a1=0;
		var a2=0;
		var a3=0;
		var a4=0;
		var a5=0;
		var pass1=document.form1.oldpassword.value;
		var pass2=document.form1.newpassword.value;
		var pass3=document.form1.confirmpassword.value;
		document.getElementById("s1").innerHTML="";
		document.getElementById("s2").innerHTML="";
		document.getElementById("s3").innerHTML="";
		pattern1=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
		if(pass1=="")
		{
			a1=1;
		}		
		if(pass2=="")
		{
			a2=1;
		}else if(pattern1.test(pass2)==false)
		   {
			   a5=1;
		   }
	    if(pass3!==pass2)
		{
			a4=1;
		}
		if(pass3=="")
		{
			a3=1;
		}
		if(a1==1 || a2==1 || a3==1 || a4==1 || a5==1)
		{
			if(a1==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Required OldPassword</font>";
			}
			if(a2==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Required Password</font>";
			}
			if(a3==1)
			{
				document.getElementById("s3").innerHTML="<font color='red'>Required ConfirmPassword</font>";
			}
			if(a4==1)
			{
				document.getElementById("s3").innerHTML="<font color='red'>Password Not Match</font>";
			}
			if(a5==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'><span>8 to 15 characters one lowercase letter,uppercase letter,numeric digit,special character</span></font>";
			}
            return false;			
		}
		return ( true );
}	
function check()
{
//	 alert(a1);
    document.getElementById("s1").innerHTML="";
    var a=$('#op').val();
	$.ajax({
        type: "GET",
        url: "Password.php?xy="+a,
        success: function (data) {		  
		  $("#s1").html(data);
		},
        error: function () {
		  alert("error");
        }
    });
}
function CartCounts()
{
//	 alert(a1);
	$.ajax({
        type: "GET",
        url: "CartCount.php",
        success: function (data) {
          //alert("error");		  
		  $("#cc1").html(data);
		},
        error: function () {
		  alert("error");
        }
    });
}
 CartCounts();
</script>

<header class="header header-simple  ">
	<div class="container clearfix " >
		<div class="logo"><a href="index.php"><img src="images/LabLogo.png" alt="MedicAid" class="img-responsive"></a></div> <!-- end .logo -->
		<nav class="main-nav ">
				<ul class="list-unstyled">
					<li><a href="index.php">Home</a></li>
					<li><a href="BookTest.php">Test</a></li>
					<li><a href="Package.php">Package</a></li>
					<li><a href="FindLab.php">Center Near Me</a></li>
					<li><a href="About_Us.php">About Us</a></li>
					<li><a href="Contact_Us.php">Contact Us</a></li>
					<li><a href="index.php">My Profile</a>
						<ul>
						<?php
							    if(isset($_SESSION['UserID1']))
                            { ?>
							<li><a href="EditProfile.php">Edit Profile</a></li>
							<?php } else { ?>
							<li><a href="EditProfile.php">Edit Profile</a></li>
							<?php } ?>
							<?php
							    if(isset($_SESSION['UserID1']))
                            { ?>
							<li><a href="ReportTracking.php">View Traking</a></li>
							<?php } else { ?>
							<li><a href="ReportTracking.php">View Traking</a></li>
							<?php } ?>
							<?php
							    if(isset($_SESSION['UserID1']))
                            { ?>
							<li><a href="OrderHistory.php">Order History</a></li>
							<?php } else { ?>
							<li><a href="OrderHistory.php">Order History</a></li>
							<?php } ?>
							<?php if(isset($_SESSION['UserID1']))
                            { ?>
							<li><a data-toggle="modal" href="#myModal" data-toggle="modal">Change Password</a></li>
							<?php } else { ?>
							<li><a href="Login.php">Change Password</a></li>
							<?php } ?>
							<?php
							    if(isset($_SESSION['UserID1']))
                            { ?>
							<li><a href="DownloadReport.php">Download Report</a></li>
							<?php } else { ?>
							<li><a href="DownloadReport.php">Download Report</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php if(!isset($_SESSION['userlogin']))
					{ ?>
					<li><a href="Login.php">Login</a>
					    <ul>
							<li><a href="Login.php">User Login</a></li>
							<li><a href="../Vendor/VendorLogin.php">Vendor Login</a></li>
						</ul>
					</li>
					<li><a href="Register.php">Singup</a>
						<ul>
							<li><a href="Register.php">User Singup</a></li>
							<li><a href="../Vendor/VendorRegister.php">Vendor Singup</a></li>
						</ul>
					</li>
					 &nbsp;
					 &nbsp;
					 &nbsp;
					 &nbsp;
					 <a href="login.php" class="text-muted">CART
				     <span> <img src="images/cart.png" width="30px" style="margin-top: 15px;"></span>
					 <span id="cc1" name="cc1">
					
					 </span>
					</a>
					
					<?php } else { ?>
					<li><a href="logout.php">Logout</a></li>
					<li>
					<span id="carts" name="carts">
					   <?php 
					      $xa=$link->rawQueryOne("select * from UserTB where UserID=".$_SESSION['UserID1']);
					   ?> 
					   <a href="MyCart.php?ids=<?php echo $xa['UserID']; ?>" class="text-muted">CART
				<span> <img src="images/cart.png" width="30px" style="margin-top: 15px;">
					<span id="cc1" name="cc1">
					</a>
					</span>
					</li>
					<?php
					} 
					?>
					
				</ul>
				<a href="#" class="responsive-menu-open"><i class="fa fa-bars"></i></a>
			</nav> <!-- end .main-nav -->
		<a href="#" class="responsive-menu-open"><i class="fa fa-bars"></i></a>
	</div> <!-- end .container -->
</header> 
<!-- end .header -->
<div class="responsive-menu">
	<a href="#" class="responsive-menu-close"><i class="fa fa-times"></i></a>
	<nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
</div> <!-- end .responsive-menu -->
	
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
	    <form name="form1" method="POST" action="index.php" onsubmit="return(validate());">
		    <br>
			<br>
		    <div class="form-group">
				<div class="col-sm-4">
					<label>Old Password </label>
				</div>
				<div class="col-sm-5">
					<input placeholder="Old Password" type="password" name="oldpassword" onblur="check();" id="op"><span id="s1"><?php // if(isset($err)){echo $err;} ?></span>	
				</div>
				</div class="col-sm-3">
				<div>
		    </div>
			<br>
			<br>
			<div class="form-group">
				<div class="col-sm-4">
					<label>New Password </label>
				</div>
				<div class="col-sm-5">
					<input placeholder="New Password" type="password" name="newpassword"><span id="s2"></span>	
				</div>
				</div class="col-sm-3">
				<div>
		    </div>
			<br>
			<br>
			<div class="form-group">
				<div class="col-sm-4">
					<label>Confirm Password </label>
				</div>
				<div class="col-sm-5">
					<input placeholder="Confirm Password" type="password" name="confirmpassword"><span id="s3"></span>	
				</div>
				</div class="col-sm-3">
				<div>
		    </div>
			<br>
			<br>
			<div class="form-group">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6" style="float: right;margin-top: 48px;">
				    <input type="submit" name="submit" class="button" value="Save">
				</div>
			</div>	
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>