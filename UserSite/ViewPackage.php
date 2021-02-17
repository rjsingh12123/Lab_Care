<?php
   include 'connect.php';
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LabCare</title>

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
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "PackagesView.php?p1="+2+"&cid="+<?php echo $_GET['cid'];?>,
        success: function (data) {
         // alert("success");
		  $("#packages").html(data); 
		   //CartCounts();
		},
        error: function () {
		  alert("error");
        }
    });
});
function openPackage(PackageName) {
    $.ajax({
        type: "GET",
        url: "PackagesView.php?p1="+PackageName+"&cid="+<?php echo $_GET['cid'];?>,
        success: function (data) {
         // alert("success");
		  $("#packages").html(data); 
		   //CartCounts();
		},
        error: function () {
		  alert("error");
        }
    });
}
	</script>
	<body>
		<?php include 'header.php'; ?>
<div class="findlab">
	<div class="wraper">
		<div class="w3-bar w3-black">
			<div class="section white">
				<div class="inner">
					<div class="container">  
						<h1>Package</h1>				
						<div class="row">
				<?php 
			if(isset($_GET['cid'])){  
				$package=$link->rawQuery("select p.*,v.* from PackageTB p,VendorTB v where v.VendorID=p.VendorID and p.Is_Active=1 and v.CityID=".$_GET['cid']." and v.VendorID=".$_GET['vid']);  
			
			foreach($package as $p){
             ?>  

					<div class="col-sm-3">
				      <button class="button" style="height: 149px; width: 200px; background-color: #0199ed;line-height: 120px; border: none; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;" onclick="openPackage(<?php echo $p['PackageID'];?>);"><?php echo $p['Package_Name'];?></button>
			        </div>

				
		<?php } } ?>
						</div> <!-- end .row -->
					</div> <!-- end .container -->
				</div> <!-- end .inner -->
			</div> <!-- end .search-results-table-content -->			
		
			<div class="section white" style="margin-top: 90px;">
				<div class="inner">
					<div class="container">
						<div class="row" id="packages">
				 
						</div> <!-- end .row -->
					</div> <!-- end .container -->
				</div> <!-- end .inner -->
			</div> <!-- end .search-results-table-content -->
		</div> <!-- end .search-results-table-content -->
	</div>
</div>

 <!-- end .section -->
	<?php include 'down.php'; ?>
</body>
</html>