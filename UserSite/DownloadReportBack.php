<!--	<div class="section white">
			<div class="inner">
				<div class="container">
		<div class="findlab">
	<div class="wraper">
	
		<br>
		<form action="Book.php?id1=<?php // echo $_GET['ids'];?>" method="GET">
		<h1>Download Report</h1>
		<div class="search-results-table">
				<header class="search-results-table-header">
					<div class="row">
						<div class="col-sm-2">
							<span class="name" style="color:white;">ID</span>
						</div> <!-- end .col-sm-4 
						<div class="col-sm-3">
							<span class="name" style="color:white;">Name</span>
						</div> <!-- end .col-sm-4 
						<div class="col-sm-3">
													
						</div> 
						<div class="col-sm-2">
							<span class="name" style="color:white;">Download Report</span>	
						</div> 
						<div class="col-sm-2">
							
						</div> <!-- end .col-sm-4
					</div> <!-- end .row 
				</header> <!-- end .search-results-table-header 
				<div class="search-results-table-content">
					
					<div class="search-result">
					<?php 
					 /* $o=0;
					  $tot=0;
					  $tot1=0;
					  $cr=0;
					  $cpr=0;
					  $Disease=$link->rawQuery("select u.*,t.* from UserReportTB u,TestTB t where t.TestID=u.TestID and u.IsUpload=1 and UserID=".$_SESSION['UserID1']);  
					  //$link->rawQuery("SELECT carttb.UserID,cartpackagetb.UserID FROM carttb INNER JOIN cartpackagetb ON carttb.UserID=cartpackagetb.UserID");
					 			
					  foreach($Disease as $p)
					  {
						  //if($p)
						  //{
							$cr=1;
						  //}						  
						  $o++;*/
					?>
						<div class="row">
						    <div class="col-sm-2">
								<span class="specialty"><?php // echo $o;?></span>
							</div> <!-- end .col-sm-4 
							<div class="col-sm-3">
								<span class="specialty"><?php // echo $p['Test_Name'];?></span>
							</div> <!-- end .col-sm-4 
							<div class="col-sm-3">								
								
							</div> <!-- end .col-sm-4 
							<div class="col-sm-2">
                                <span class="specialty"><a href="../Vendor/pages/UserReport/<?php // echo $p['Report'];?>">Link</a></span>
							</div> <!-- end .col-sm-4
							<div class="col-sm-2">
                                
							</div> <!-- end .col-sm-4-
							<?php
							  // $tot=$tot+$p['Price'];
							?>
							<br>
							<br>
							
						</div>
					  <?php 
					  }  
					  // $package=$link->rawQuery("select p.*,u.*,a.* from userreortpackagetb u,packagereport a,PackageTB p where a.UserReportPackageID=u.UserReortPackage and p.PackageID=u.PackageID and u.IsUpload=1 and UserID=".$_SESSION['UserID1']);
					 
					 //foreach($package as $d)
					  //{ $o++;
						//if($d)
					//	{
						   $cpr=1;
						//}
   					  ?>
					        <!-- 
					  		<div class="row">
						    <div class="col-sm-2">
								<span class="specialty"><?php // echo $o;?></span>
							</div> <!-- end .col-sm-4
							<div class="col-sm-3">
								<span class="specialty"><?php // echo $d['Package_Name'];?></span>
							</div> <!-- end .col-sm-4 
							<div class="col-sm-3">
							
							</div> <!-- end .col-sm-4 
							<div class="col-sm-2">
						        <span class="specialty"><a href="../Vendor/pages/UserReport/<?php // echo $d['Report'];?>">Link</a></span>
							</div> <!-- end .col-sm-4 
							<div class="col-sm-2">
                                
							</div>  end .col-sm-4
							<br>
							<br>
							
						</div> 
						<?php 
					  //$tot1=$tot1+$d['Price'];
					  //}
							
						 /*


                     $package=$link->rawQuery("select p.*,u.* from userreortpackagetb u,PackageTB p where p.PackageID=u.PackageID and u.IsUpload=1 and UserID=".$_SESSION['UserID1']);
					 
					 foreach($package as $d)
					  { $o++;
						//if($d)
					//	{
						   $cpr=1;
						//}*/
   					  ?>
					         
					  		<div class="row">
						    <div class="col-sm-2">
								<span class="specialty"><?php // echo $o;?></span>
							</div> <!-- end .col-sm-4 
							<div class="col-sm-3">
								<span class="specialty"><?php // echo $d['Package_Name'];?></span>
							</div> <!-- end .col-sm-4
							<div class="col-sm-3">
							
							</div> <!-- end .col-sm-4 
							<div class="col-sm-2">
						        <span class="specialty"><a href="../Vendor/pages/UserReport/<?php // echo $d['Report'];?>">Link</a></span>
							</div> <!-- end .col-sm-4 
							<div class="col-sm-2">
                                
							</div> <!-- end .col-sm-4 
							<br>
							<br>
							
						</div>
						<?php 
					  //$tot1=$tot1+$d['Price'];
					  }
							?>
						 
						 
					 </div>
					</div> <!-- end .search-result
				<!-- end .search-result 
				</div> <!-- end .search-results-table-content 
		</form>
			</div>
			</div>
			</div>
			</div>
			</div>
 <!-- end .section -->
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
<div class="section white">
			<div class="inner">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="service-number-large">
								<span class="number">01</span>
								<h2>Frequent Reviews</h2>
								<p>Test reviews in order to evaluate if rapid care is needed also and very important.</p>
							</div> <!-- end .service-number-large -->
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-4">
							<div class="service-number-large">
								<span class="number">02</span>
								<h2>24/7 Monitor</h2>
								<p>Monitor fetal heart rate &amp; address fix any issues immediately without preparation.</p>
							</div> <!-- end .service-number-large -->
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-4">
							<div class="service-number-large">
								<span class="number">03</span>
								<h2>Good Records</h2>
								<p>Review your personal medical records with you and hospital to check everything.</p>
							</div> <!-- end .service-number-large -->
						</div> <!-- end .col-sm-4 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div>
<div class="section white">
			<div class="inner">
				<div class="container">
					<form action="Book.php?id1=<?php echo $_GET['ids'];?>" method="GET">
					<h1 class="heading">Download Report</h1>
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
					<div class="blog-post-horizontal">
						<div class="content">
							<h3 style="color: #0199ed;"><?php echo $p['Test_Name'];?></h3>
							<p><?php echo $p['Lab_Name']; ?></p>
						    <a href="../Vendor/pages/UserReport/<?php echo $p['Report'];?>" class="button text-button purple">Download Report</a>
						</div> <!-- end .content -->
						<div class="date">
							<h2 style="color: black;">
							<?php echo $p['Collection_Date']; ?>
							</h2>
						</div> <!-- end .date -->
					</div> <!-- end .blog-post-horizontal -->
					  <?php } 
                     $package=$link->rawQuery("select p.*,u.*,v.* from userreortpackagetb u,PackageTB p,VendorTB v where p.VendorID=v.VendorID and p.PackageID=u.PackageID and u.IsUpload=1 and UserID=".$_SESSION['UserID1']);
					 
					 foreach($package as $d)
					  { $o++;
   					  ?>
					  <div class="blog-post-horizontal">
						<div class="content">
							<h3 style="color: #0199ed;"><?php echo $d['Test_Name'];?></h3>
							<p><?php echo $d['Lab_Name']; ?></p>
						    <a href="../Vendor/pages/UserReport/<?php echo $d['Report'];?>" class="button text-button purple">Download Report</a>
						</div> <!-- end .content -->
						<div class="date">
							<h2 style="color: black;">
							<?php echo $d['Collection_Date']; ?>
							</h2>
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
<div class="section white">
			<div class="inner">
				<div class="container">
				<form action="Book.php?id1=<?php echo $_GET['ids'];?>" method="GET">
				<h1 class="heading">Download Report</h1>
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
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										<?php echo $p['Test_Name'];?><span class="icon"><i class="fa fa-plus"></i></span>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p><?php echo $p['Lab_Address']; ?></p>
						            <p><a href="../Vendor/pages/UserReport/<?php echo $p['Report'];?>" class="button text-button purple">Download Report</a></p>
								</div>
							</div>
						</div>
					</div> <!-- end #accordion -->
					 <?php } 
                     $package=$link->rawQuery("select p.*,u.*,v.* from userreortpackagetb u,PackageTB p,VendorTB v where p.VendorID=v.VendorID and p.PackageID=u.PackageID and u.IsUpload=1 and UserID=".$_SESSION['UserID1']);
					 
					foreach($package as $d)
					{ $o++;
   					  ?>
					 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingtwo">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="false" aria-controls="collapseOne">
										<?php echo $d['Package_Name'];?><span class="icon"><i class="fa fa-plus"></i></span>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p><?php echo $d['Lab_Address']; ?></p>
						            <p><a href="../Vendor/pages/UserReport/<?php echo $d['Report'];?>" class="button text-button purple">Download Report</a></p>
								</div>
							</div>
						</div>
					</div> <!-- end #accordion -->
					<?php } ?>
				</form>
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->