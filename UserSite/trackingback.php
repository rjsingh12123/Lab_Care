<?php
   include 'connect.php';
   session_start();
   
   if(isset($_SESSION['userlogin']))
   {
?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from metheme.biz/medicaid/html/04_Homepage-Laboratory.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2019 04:58:52 GMT -->
<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LabCare</title>
<link rel="shortcut icon" href="images/favicon.ico"/>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<!-- Simple-Line-Icons-Webfont -->
		<link href="css/simple-line-icons.css" rel="stylesheet">
		<!-- FlexSlider -->
		<link href="css/flexslider.css" rel="stylesheet">
		<!-- Owl Carousel -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.default.css" rel="stylesheet">
		<!-- noUiSlider -->
		<link href="css/jquery.nouislider.min.css" rel="stylesheet">
		<!-- Style.css -->
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/color.html" id="color-switcher">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script type="text/javascript">
function DelCart(d1)
{
	$.ajax({
        type: "GET",
        url: "RemoveCart.php?dss="+d1,
        success: function (data) {
          location.href = "MyCart.php";
		},
        error: function () {
		  alert("error");
        }
    });
}
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
</script>
	<body>
		<header class="header">
			<div class="top">
				<div class="container clearfix">
					
					<nav class="top-contacts">
						<ul class="list-unstyled">
							<li><a href="#"><i class="fa fa-phone"></i>Call Us Free: (012) 345-6789</a></li>
						</ul>
					</nav>
				</div> <!-- end .container -->
			</div> <!-- end .top -->
				<div class="bottom">
				   <div class="container clearfix">
					<div class="logo"><a href="index.php"><img src="images/LabLogo.png" alt="MedicAid" class="img-responsive"></a></div>
						<div class="navigation clearfix">
							<nav class="main-nav">
								<ul class="list-unstyled">
									<li class="active">
										<a href="index.php">Home</a>
										</li>
										
									<li>
										<a href="Package.php">Package</a>
								 </li>
								<li><a href="BookTest.php">Book A Test</a></li>
								<li><a href="About_Us.php">About Us</a></li>
								<li><a href="Contact_Us.php">Contact Us</a></li>
								<li><a href="FindLab.php">Find a Center</a></li>
								<li><a href="ReportTracking.php">My Profile</a>
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
							<li><a href="Login.php">Login</a></li>
							<li><a href="Register.php">Singup</a></li>
							 <li>
							 <a href="login.php" class="text-muted">CART
						     <span> <img src="images/cart.png" width="30px" style="margin-top: 15px;"></span>
							 <span id="cc1" name="cc1">
							
							 </span>
							</a>
							</li>
							<?php } else { ?>
							<li><a href="logout.php">Logout</a></li>
							<li>
							<span id="carts" name="carts">
							   <?php 
							        $xa=$link->rawQueryOne("select VendorID from VendorTB");
							   ?> 
							   <a href="MyCart.php?ids=<?php echo $xa['VendorID']; ?>" class="text-muted">CART
						<span> <img src="images/cart.png" width="30px" style="margin-top: 15px;">
							<span id="cc1" name="cc1">
							</a>
							</span>
							</li>
							<?php
							} 
							?>
							
							</ul>
							</nav> <!-- end .main-nav -->
							
							<a href="#" class="responsive-menu-open"><i class="fa fa-bars"></i></a>
						</div> <!-- end .navigation -->
					</div> <!-- end .container -->
				</div>		<!-- end .bottom -->
		</header>
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
				<div class="col-sm-6">
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
		<div class="section white">
			<div class="inner">
				<div class="container">
		<div class="findlab">
	<div class="wraper">
	
		<br>
		<form action="Book.php?id1=<?php echo $_GET['ids'];?>" method="GET">
		<h1>Tracking</h1>
		<div class="search-results-table">
				<header class="search-results-table-header">
					<div class="row">
						<div class="col-sm-2">
							<span class="name" style="color:white;">ID</span>
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-3">
							<span class="name" style="color:white;">Name</span>
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-3">
													
						</div> 
						<div class="col-sm-2">
							<span class="name" style="color:white;">Price</span>	
						</div> 
						<div class="col-sm-2">
							
						</div> <!-- end .col-sm-4 -->
					</div> <!-- end .row -->
				</header> <!-- end .search-results-table-header -->
				<div class="search-results-table-content">
					<div class="search-result">
					<?php 
					  $o=0;
					  $tot=0;
					  $tot1=0;
					  $Disease=$link->rawQuery("select u.*,t.*,d.* from UserReportTB u,TestTB t,DiseaseCategoryTB d where t.DiseaseID=u.DiseaseID and u.DiseaseID=d.DiseaseID and u.TestID=t.TestID and UserID=".$_SESSION['UserID1']);  
					 
					   $package=$link->rawQuery("select u.*,p.* from userreortpackagetb u,PackageTB p where u.PackageID=p.PackageID and u.UserID=".$_SESSION['UserID1']);  
					 
					 foreach($Disease as $p)
					  {
						  $o++;
					?>
						<div class="row">
						    <div class="col-sm-2">
								<span class="specialty"><?php echo $o;?></span>
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-3">
								<span class="specialty"><?php echo $p['Test_Name'];?></span>
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-3">								
								
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-2">
								<span class="specialty"><?php echo "Rs. ".$p['Price'];?></span>
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-2">
                                <span class="icon" id="a1"><a href="tracking.php?ids1=<?php echo $p['UserReportID'];?>">Tracking Details</a></span>
							</div> <!-- end .col-sm-4 -->
							<?php
							   $tot=$tot+$p['Price'];
							?>
							<br>
							<br>
							
						</div>
					  <?php 
					  }  foreach($package as $d)
					  { $o++; ?>
					         
					  		<div class="row">
						    <div class="col-sm-2">
								<span class="specialty"><?php echo $o;?></span>
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-3">
								<span class="specialty"><?php echo $d['Package_Name'];?></span>
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-3">
								
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-2">
								<span class="specialty"><?php echo "Rs. ".$d['Price'];?></span>								
							</div> <!-- end .col-sm-4 -->
							<div class="col-sm-2">
                                <span class="icon" id="a1"><a href="tracking.php?ids2=<?php echo $d['UserReortPackage'];?>">Tracking Details</a></span>
							</div> <!-- end .col-sm-4 -->
							<br>
							<br>
							<?php 
							    $tot1=$tot1+$d['Price'];
							?>
						</div>
					  <?php } $tot2=0; ?>
					  <?php
							    $tot2=$tot+$tot1;
								
							?>
						
					</div> <!-- end .search-result -->
				<!-- end .search-result -->
				</div> <!-- end .search-results-table-content -->
			</div>
			</form>
			</div>
			</div>
			</div>
			</div>
			</div>
 <!-- end .section -->
		<footer class="footer">
			<div class="top">
				<div class="container">
					<div class="row">
					
						<div class="col-sm-4">
							<h4>About Us</h5>
							<p>LabCare is the largest Diagnostics Company in World having an impressive 'Reach', providing superior quality diagnostics services to its customers through a very efficient network of labs and collection points. </p>
							 
							
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-4">
							<h4>QUICKS LINKS</h4>
							<a href="index.php">Home</a>
							<br>
							<a href="Package.php">Package</a>
						     <br>
							 <a href="BookTest.php">Book A Test</a>
							<br>
							<a href="Contact_Us.php">Contact Us</a>
							<br>
							<a href="FindLab.php">Find A Center</a>
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-4">
							<h4>Connect with Facebook</h4>
								<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Foceaninfotechs%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
						</div> <!-- end .col-sm-3 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .top -->
			<div class="bottom">
				<div class="container">
					<div class="copyright">© Copyright 2019 LabCare. All Rights Reserved</div>
					<div style="text-align:right;">Design & Developed by LabCare Team</div>
				</div> <!-- end .container -->
			</div> <!-- end .bottom -->
		</footer> <!-- end .footer -->

		<div class="color-switcher-wrapper">
			<span class="fa fa-gears trigger"></span>
			<div class="color-list">
				<h4>Select Color Scheme</h4>
				<ul class="b-clear">
					<li class="color blue" data-style="blue"></li>
					<li class="color purple" data-style="purple"></li>
					<li class="color green-light" data-style="green-light"></li>
					<li class="color brown" data-style="brown"></li>
				</ul>
			</div>
		</div>

		<!-- jQuery -->

		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- google maps -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<!-- FlexSlider -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Owl Carousel -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- CountTo -->
		<script src="js/jquery.countTo.js"></script>
		<!-- Countdown -->
		<script src="js/countdown.js"></script>
		<!-- noUiSlider -->
		<script src="js/jquery.nouislider.all.min.js"></script>
		<!-- Isotope -->
		<script src="js/isotope.pkgd.min.js"></script>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<!-- Tweetie -->
		<script src="js/tweetie.min.js"></script>
		<!-- Scripts.js -->
		<script src="js/scripts.js"></script>

	</body>

<!-- Mirrored from metheme.biz/medicaid/html/04_Homepage-Laboratory.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2019 04:58:52 GMT -->
</html>
<?php
    }
else
{
	header("location:Login.php");
}	
?>