<?php
   include 'connect.php';
   session_start();
  if(isset($_SESSION['UserID1']))
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
function DelCart1(d1)
{
	$.ajax({
        type: "GET",
        url: "RemoveCart.php?dss1="+d1,
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

		<div class="section light">
			<div class="inner">
				<div class="container">
				<form action="Book.php?id1=<?php echo $_GET['ids'];?>" method="GET">
					<h1>Download Report</h1>
					<?php 
					  $o=0;
					  $tot=0;
					  $tot1=0;
					  $cr=0;
					  $cpr=0;
					  $Disease=$link->rawQuery("select u.*,t.*,v.* from UserReportTB u,TestTB t,VendorTB v where t.TestID=u.TestID and t.VendorID=v.VendorID and u.IsUpload=1 and UserID=".$_SESSION['UserID1']);  
					  //$link->rawQuery("SELECT carttb.UserID,cartpackagetb.UserID FROM carttb INNER JOIN cartpackagetb ON carttb.UserID=cartpackagetb.UserID");
					 			
					  foreach($Disease as $p)
					  {
						  //if($p)
						  //{
							$cr=1;
						  //}						  
						  $o++;
					?>
					<div class="row aligned-cols">
						<div class="col-sm-12 aligned-bottom">
							<div class="service-number large">
								<span class="number"><?php echo $o; ?></span>
								<div class="content">
									<h2><?php echo $p['Test_Name'];?></h2>
									<p><?php echo $p['Lab_Name']; ?></p>
									<br>
									<p><a href="../Vendor/ResultUserTestReport.php?id=<?php echo $p['UserReportID'];?>" class="button text-button purple">Download Report</a></p>
								</div> <!-- end .content -->
							</div> <!-- end .service-number -->
						</div> <!-- end .col-sm-8 -->
					</div> <!-- end .row -->
					  <?php } 
                     $package=$link->rawQuery("select p.*,u.*,v.* from userreportpackagetb u,PackageTB p,VendorTB v where p.VendorID=v.VendorID and p.PackageID=u.PackageID and u.IsUpload=1 and UserID=".$_SESSION['UserID1']);
					 
					foreach($package as $d)
					{ $o++;
   					  ?>
					<div class="row aligned-cols">
						<div class="col-sm-12 aligned-bottom">
							<div class="service-number large">
								<span class="number"><?php echo $o; ?></span>
								<div class="content">
									<h2><?php echo $d['Package_Name'];?></h2>
									<p><?php echo $d['Lab_Name']; ?></p>
									<br>
									<p><a href="../Vendor/ResultUserPackageReport.php?id=<?php echo $d['UserReportPackageID'];?>" class="button text-button purple">Download Report</a></p>
								</div> <!-- end .content -->
							</div> <!-- end .service-number -->
						</div> <!-- end .col-sm-8 -->
					</div> <!-- end .row -->
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