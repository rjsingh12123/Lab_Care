<?php
session_start();
include 'connect.php';
if(isset($_SESSION['UserID1']))
{
  $p=$link->rawQueryOne("select * from UserTB where UserID=".$_SESSION['UserID1']);
  if(isset($_POST['submit']))
  {
	  if($p['Password']==$_POST['oldpassword'])
	  {
		$link->where("UserID",$_SESSION['UserID1']);  
		$link->update("UserTB",Array("Password"=>$_POST['confirmpassword']));  
	  }
	  else
	  {
		  $err="Old Password Is Incorrect";
	  }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
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
		<link rel="shortcut icon" href="images/favicon.ico"/>
		
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
	<body>
		<?php include 'header.php'; ?>
		
		<div id="middle-slider" class="middle-slider flex-slider">
			<div class="slides clearfix">
				<div class="slide" style="background-image: url('images/background8.png');">
					<div class="inner">
						<div class="content">
							<h1>Lab Care</h1>
							<p>We know a lot about growth.</p>
						</div> <!-- end .content -->
					</div> <!-- end .inner -->
				</div> <!-- end .slide -->
				<div class="slide" style="background-image: url('images/background16.png');">
					<div class="inner">
						<div class="content">
							<h1> Advance Lab Care </h1>
							<p>Leading Popular Vendor.</p>
						</div> <!-- end .content -->
					</div> <!-- end .inner -->
				</div>
				<div class="slide" style="background-image: url('images/bg1.jpg');">
					<div class="inner">
						<div class="content">
							<h1>Premium Lab Care</h1>
							<p>Leading experts in the Lab field.</p>
						</div> <!-- end .content -->
					</div> <!-- end .inner -->
				</div> <!-- end .slide -->
			</div> <!-- end .slides -->
		</div> <!-- end .middle-slider -->
		<div class="section transparent white">
			<div class="inner">
				<div class="container">
						<h1>HOW  ITS  WORKS</h1>
							<div class="row">
								<div class="col-sm-6">
									<div class="service-number">
										<a href="Register.php">
											<span class="number">01.</span>
											<div class="content">
												<h2>Sign Up</h2>
												<p>User can Register/Signup his details in our website.</p>
											</div> <!-- end .content -->
										</a>
									</div> <!-- end .service-number -->
								</div> <!-- end .col-sm-6 -->
								<div class="col-sm-6">
									<div class="service-number"><a href="Login.php">
										<span class="number">02.</span>
										<div class="content">
											<h2> Login</h2>
											<p>User can Login in our website using username and password which user used in registration.</p>
										</div> <!-- end .content -->
									</a></div> <!-- end .service-number -->
								</div> <!-- end .col-sm-6 -->
								<div class="clearfix"></div>
								<div class="col-sm-6">
									<div class="service-number"><a href="Package.php">
										<span class="number">03.</span>
										<div class="content">
											<h2>Find Test / Package</h2>
											<p>User can Find Test or Package.</p>
										</div> <!-- end .content -->
									</a></div> <!-- end .service-number -->
								</div> <!-- end .col-sm-6 -->
								<div class="col-sm-6">
									<div class="service-number"><a href="Package.php">
										<span class="number">04.</span>
										<div class="content">
											<h2>Booking Test / Package</h2>
											<p>User can Book Test or Package.</p>
										</div> <!-- end .content -->
									</a></div> <!-- end .service-number -->
								</div> <!-- end .col-sm-6 -->
								<div class="clearfix"></div>
								<div class="col-sm-6">
									<div class="service-number"><a href="Payment.php">
										<span class="number">05.</span>
										<div class="content">
											<h2>Payment</h2>
											<p>User will Paid For the Booking of his Orders in our website.</p>
										</div> <!-- end .content -->
									</a></div> <!-- end .service-number -->
								</div> <!-- end .col-sm-6 -->
								<div class="col-sm-6">
									<div class="service-number"><a href="downloadreport.php">
										<span class="number">06.</span>
										<div class="content">
											<h2>Report</h2>
											<p>User view his own report in our website.</p>
										</div> <!-- end .content -->
									</a></div> <!-- end .service-number -->
								</div> <!-- end .col-sm-6 -->
							</div> <!-- end .row -->
						
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div>
       <div class="section white text-center tiny">
			<div class="inner">
				<div class="container">
					<div class="text-center"><h1>Tests</h1></div>
					<div class="service-slider owl-carousel">
					<?php
              $t=$link->rawQuery("select t.*,v.* from testtb t,VendorTB v where v.Is_Active=1 and v.VendorID=t.VendorID GROUP by Test_Name,Lab_Name");	
						foreach($t as $x)
						{
		?>
		
					
						<div class="item">
							<div class="service">
								<h4><?php echo $x['Test_Name'] ?></h4>
								<div class="icon drop-icon">
									<i class="fa fa-medkit"></i>
								</div>
								<h5>Lab Name:<?php echo $x['Lab_Name'] ?></h5>				
								<h5>Price:<?php echo $x['Price']; ?></h5>
							</div> <!-- end .service -->
						</div> <!-- end .item -->
						<?php } ?>
						
						
						
					</div> <!-- end .service-slider -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

		
		
		<div class="section transparent" style="background-image: url('images/background4.png');">
			<div class="inner" style="height:225px;">
				<div class="container" style="margin-top:70px;">
				    <div class="col-sm-10">
					<h1 class="large-heading"><small>Are easy to find so a visitor can quickly get in touch should they need it.</small></h1>
					 <!-- end countdown -->
					 </div>
				    <div class="col-sm-2">
					<a href="Contact_Us.php" class="button border-button">Contact Us</a>
					</div>
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->
		<?php
$p=$link->rawQuery("select p.*,v.* from PackageTB p,VendorTB v where p.Is_Active=1 and p.VendorID=v.VendorID Group By FirstName");	
	
		?>
		<div class="section transparent white no-padding" style="background-image: url('images/background5.png');">
			<div class="inner">
			
				<div class="container">
			<h1>PACKAGE</h1>
					<div class="row" align="center">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class="blog-post-slider owl-carousel">
								<?php 
								  foreach($p as $x){
								?>
								<div class="blog-post">
									<div class="blog-post-meta">
                                        <h1><?php echo $x['Package_Name']; ?></h1>									
										<div class="blog-post-image">
											<a href="viewpackage.php?cid=<?php echo $x['CityID'];?>&vid=<?php echo $x['VendorID'];?>"><img src="../Vendor/images/<?php echo $x['Lab_Logo'];?>" alt="blog post image" class="img-responsive"></a>
										</div>
										<table>
										<tr>
										   <th>PackageCategoryName</th>
										   <td><?php echo $x['PackageCategoryName']; ?></td>
										</tr>
										<tr>
										    <th>Lab Name</th>
											<td><?php echo $x['Lab_Name']; ?></td>
										</tr>
										<tr>
										    <th>Lab Address</th>
											<td><?php echo $x['Lab_Address']; ?></td>
										</tr>
                                        <tr>
                                             <th>Price</th>
                                             <td><?php echo $x['Price']; ?></td>
                                        </tr>											 
										   </table>
										
										
									</div><!--  end .blog-post-meta -->
									<a href="viewpackage.php?cid=<?php echo $x['CityID'];?>&vid=<?php echo $x['VendorID'];?>" class="button">VIEW PACKAGE</a>
								</div><!--  end .blog-post -->
										
									  <?php } ?>
									
							</div> <!-- end .blog-post-slider -->
						</div> 
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->
						<?php
	$f=$link->rawQuery("select f.*,u.* from FeedBackTB f,UserTB u where u.UserID=f.UserID");
    ?>
		<div class="section purple text-center">
			<div class="inner">
				<div class="container">
					<div class="large-testimonial-icon"></div>
					<div class="large-testimonial-slider owl-carousel">
					<?php foreach($f as $fb){ ?>
						<div class="item">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<p><?php echo $fb['Review']; ?></p>
									<h3><?php echo $fb['First_Name']; ?></h3>
								</div> <!-- end .col-sm-8 -->
							</div> <!-- end .row -->
							
						</div> <!-- end .item -->
						<?php } ?>
					</div> <!-- end .large-testimonial-slider -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->
			

		<div class="section white small">
			<div class="inner">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="contacts">
								<div class="icon"><i class="fa fa-map-marker"></i></div>
								<h4>Address</h4>
								<p>At. Sabargam, Post. Niyol, Taluka. Choryasi, Dist-Surat-394325.Gujarat State.India</p>
							</div> <!-- end .contacts -->
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3">
							<div class="contacts">
								<div class="icon"><i class="fa fa-phone"></i></div>
								<h4>phone numbers</h4>
								<p><b>Phone:</b>(+91) 89800 04848</p>
							</div> <!-- end .contacts -->
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3">
							<div class="contacts">
								<div class="icon"><i class="fa fa-clock-o"></i></div>
								<h4>working hours</h4>
								<p><b>Monday - Friday:</b> 7:00am - 10:00pm<br><b>Saturday -Sunday:</b> 10:00am - 8:00pm</p>
							</div> <!-- end .contacts -->
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3">
							<div class="contacts">
								<div class="icon"><i class="fa fa-paper-plane-o"></i></div>
								<h4>keep in touch</h4>
								<p>We are happy to answer your questions at <b>ambaba_college@yahoo.co.in</b></p>
							</div> <!-- end .contacts -->
						</div> <!-- end .col-sm-3 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div>
		
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.268679310445!2d72.91775951475032!3d21.181483085915854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0452fffffffff%3A0xffed0ea399687a7a!2sAmbaba%20Commerce%20College!5e0!3m2!1sen!2sin!4v1584001623966!5m2!1sen!2sin" width="100%" height="450" aria-hidden="false"></iframe>
		<?php include 'down.php'; ?>
	</body>
</html>