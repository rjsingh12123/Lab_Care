<?php
   include 'connect.php';
   session_start();
   
   if(isset($_SESSION['userlogin']))
   {
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

</script>
	<body>
		<?php include 'header.php'; ?>
		
		
		
		
		<div class="section white">
			<div class="inner">
				<div class="container">
					<form action="Book.php?id1=<?php echo $_GET['ids'];?>" method="GET">
					<h1>Tracking</h1>
					<?php 
					  $o=0;
					  $tot=0;
					  $tot1=0;
					  $Disease=$link->rawQuery("select u.*,t.*,d.*,v.* from UserReportTB u,TestTB t,DiseaseCategoryTB d,VendorTB v where t.DiseaseID=u.DiseaseID and t.VendorID=v.VendorID and u.DiseaseID=d.DiseaseID and u.TestID=t.TestID and UserID=".$_SESSION['UserID1']);  
					 
					  // $package=$link->rawQuery("select u.*,p.*,v.* from userreortpackagetb u,PackageTB p,VendorTB v where u.PackageID=p.PackageID and v.VendorID=p.VendorID and u.UserID=".$_SESSION['UserID1']);  
					 
					 foreach($Disease as $p)
					  {
						  $o++;
					?>
					<div class="blog-post-horizontal">
						<div class="content">
							<h3 style="color: #0199ed;"><?php echo $p['Test_Name'];?></h3>
							<h3 style="content: ''; display: block; width: 54px;  height: 5px; border-radius: 5px; margin: 0 auto; background: #f2f2f2; margin-top: 4px; margin-left: 0px;"></h3>
							<br>
							<span><?php echo $p['Lab_Name']; ?>
							</span><br><span><?php echo $p['Lab_Address']; ?>
							</span>
							<br>
							<br>
							<a href="tracking.php?ids1=<?php echo $p['UserReportID'];?>" class="button text-button purple">Tracking Details</a>
						</div> <!-- end .content -->
						<div class="date">
							<h3 style="color: black;">
							<span style="color:#0199ed;">
							    Rs.
							</span>
							
							<span>
							<?php echo $p['Price']; ?>
							</span>
							</h3>
						</div> <!-- end .date -->
					</div> <!-- end .blog-post-horizontal -->
					  <?php } 
                    $package=$link->rawQuery("select u.*,p.*,v.* from userreportpackagetb u,PackageTB p,VendorTB v where p.VendorID=v.VendorID and u.PackageID=p.PackageID and u.UserID=".$_SESSION['UserID1']);  
					 
					 foreach($package as $d)
					  { $o++;
   					  ?>
					  <div class="blog-post-horizontal">
						<div class="content">
							<h3 style="color: #0199ed;"><?php echo $d['Package_Name'];?></h3>
							<h3 style="content: ''; display: block; width: 54px;  height: 5px; border-radius: 5px; margin: 0 auto; background: #f2f2f2; margin-top: 4px; margin-left: 0px;"></h3>
							<br>
							<span><?php echo $d['Lab_Name']; ?>
							</span><br><span><?php echo $d['Lab_Address']; ?>
							</span>
							<br>
							<br>
							<a href="tracking.php?ids2=<?php echo $d['UserReportPackageID'];?>" class="button text-button purple">Tracking Details</a>
						</div> <!-- end .content -->
						<div class="date">
							<h3 style="color: black;">
							<span style="color:#0199ed;">
							    Rs.
							</span>
							
							<span>
							<?php echo $d['Price']; ?>
							</span>
							</h3>
						</div> <!-- end .date -->
					</div> <!-- end .blog-post-horizontal -->
					  <?php } ?>
					</form>
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div>
	<?php include 'down.php'; ?>
	</body>


</html>
<?php
    }
else
{
	header("location:Login.php");
}	
?>