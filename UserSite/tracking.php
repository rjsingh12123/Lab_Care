<?php
   include 'connect.php';
   session_start();
   if(isset($_GET['ids1']))
   {
	   $cartid=$_GET['ids1'];
	   //$ab=$link->rawQueryOne("select * from CartTB where Is_Active=1 and CartID=".$cartid);
	  // $ab=$link->rawQueryOne("select * from PackageCartTB where Is_Active=1 and PackageCartID=".$cartid);
	      // $rr=$link->rawQueryOne("select * from UserReportTB where Is_Active=1 and DiseaseID=".$ab['DiseaseID']." and TestID=".$ab['TestID']." and UserID=".$ab['UserID']);
	       $rr=$link->rawQueryOne("select * from UserReportTB where UserReportID=".$cartid." and UserID=".$_SESSION['UserID1']);
   }
   if(isset($_GET['ids2']))
   {
	   $cartid=$_GET['ids2'];
	  // $ab1=$link->rawQueryOne("select * from CartPackageTB where Is_Active=1 and CartPackageID=".$cartid);
	  // $rr1=$link->rawQueryOne("select * from userreortpackagetb where Is_Active=1 and PackageID=".$ab1['PackageID']." and UserID=".$ab1['UserID']);
	   $rr1=$link->rawQueryOne("select * from userreportpackagetb where UserReportPackageID=".$cartid." and UserID=".$_SESSION['UserID1']);
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
		<link href="css/track.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- Simple-Line-Icons-Webfont -->
		<link href="fonts/Simple-Line-Icons-Webfont/simple-line-icons.css" rel="stylesheet">
		<!-- FlexSlider -->
		<link href="scripts/FlexSlider/flexslider.css" rel="stylesheet">
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
  </script>
	<body>
		<?php include 'header.php'; ?>
<div class="section white" style="margin-bottom: 100px;">
			<div class="inner">
				<div class="container">
					<div class="row">
						<?php if(isset($_GET['ids1'])){  ?>
						<div class="col-sm-12">
							<ol class="progtrckr" data-progtrckr-steps="5">
							    <li class="progtrckr-done">Booking Confirm</li>
								<?php if($rr['IsPaid']=='Paid')
								{	?>
							     <li class="progtrckr-done">Payment Success</li>
								 <?php } else { ?>
								 <li class="progtrckr-todo">Payment Success</li>
								<?php } ?>
								<?php if($rr['Approve']==1)
								{	?>
								<li class="progtrckr-done">Booking Approve</li>
								<?php } else { ?>
								<li class="progtrckr-todo">Booking Approve</li>
								<?php } ?>
								<?php if($rr['Collection']==1)
								{	?>
							     <li class="progtrckr-done">Sample Collection</li>
								 <?php } else { ?>
								 <li class="progtrckr-todo">Sample Collection</li>
								<?php } ?>
								<?php if($rr['IsUpload']==1)
								{	?>
							     <li class="progtrckr-done">Completion</li>
								 <?php } else { ?>
								 <li class="progtrckr-todo">Completion</li>
								<?php } ?>
							</ol>
                            </div>
						<?php } ?>
						<?php if(isset($_GET['ids2'])){  ?>
						<div class="col-sm-12">
							<ol class="progtrckr" data-progtrckr-steps="5">
							    <li class="progtrckr-done">Booking Confirm</li>
								<?php if($rr1['IsPaid']=='Paid')
								{	?>
							     <li class="progtrckr-done">Payment Success</li>
								 <?php } else { ?>
								 <li class="progtrckr-todo">Payment Success</li>
								<?php } ?>
								<?php if($rr1['Approve']==1)
								{	?>
								<li class="progtrckr-done">Booking Approve</li>
								<?php } else { ?>
								<li class="progtrckr-todo">Booking Approve</li>
								<?php } ?>
								<?php if($rr1['Collection']==1)
								{	?>
							     <li class="progtrckr-done">Sample Collection</li>
								 <?php } else { ?>
								 <li class="progtrckr-todo">Sample Collection</li>
								<?php } ?>
								<?php if($rr1['IsUpload']==1)
								{	?>
							     <li class="progtrckr-done">Completion</li>
								 <?php } else { ?>
								 <li class="progtrckr-todo">Completion</li>
								<?php } ?>
							</ol>
                            </div>
						<?php } ?>
</div>
</div>
</div>
</div>
	<?php include 'down.php'; ?>
	</body>

</html>