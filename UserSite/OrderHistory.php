<?php
   include 'connect.php';
   session_start();
  if(isset($_SESSION['UserID1']))
  {
   if(isset($_GET['ids']))
   {
	   $q=$link->rawQueryOne("select * from CartTB where Is_Active=1 and UserID=".$_GET['ids']);
	   
	   if($link->count > 0)
	   {
	      if($qq=$link->rawQueryOne("select VendorID from TestTB where Is_Active=1 and DiseaseID=".$q['DiseaseID']." and TestID=".$q['TestID']))
	      {
	         $_SESSION['ids11']=$qq['VendorID'];
		  }
		  else if($qq=$link->rawQueryOne("select VendorID from TestTB where Is_Active=1 and PackageID=".$q['PackageID']))
		  {
			 $qq=$link->rawQueryOne("select VendorID from TestTB where Is_Active=1 and PackageID=".$q['PackageID']); 
		  }
	   }
	   else
	   {
            $err="Cart Is Empty";  		   
       }
   }
   $ce1=0;
   $cpe1=0;
   $ce=$link->rawQuery("select * from CartTB where UserID=".$_SESSION['UserID1']);
   if($link->count > 0)
   {
	   $ce1=1;
   }
   $cpe=$link->rawQuery("select * from CartPackageTB where UserID=".$_SESSION['UserID1']);
   if($link->count > 0)
   {
	   $cpe1=1;
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
		<div class="findlab">
	<div class="wraper">
	
		<br>
		<form action="Book.php?id1=<?php echo $_GET['ids'];?>" method="GET">
		<h1>Order History</h1>
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
					  $cr=0;
					  $cpr=0;
					//  $Disease=$link->rawQuery("select c.*,d.*,t.* from CartTB c,DiseaseCategoryTB d,TestTB t where c.Is_Active=0 and d.DiseaseID=t.DiseaseID and c.DiseaseID=d.DiseaseID and c.TestID=t.TestID and c.UserID=".$_SESSION['UserID1']);  
					  $Disease=$link->rawQuery("select u.*,t.*,d.* from UserReportTB u,TestTB t,DiseaseCategoryTB d where u.IsUpload=1 and t.DiseaseID=u.DiseaseID and u.DiseaseID=d.DiseaseID and u.TestID=t.TestID and UserID=".$_SESSION['UserID1']);  
					  //$link->rawQuery("SELECT carttb.UserID,cartpackagetb.UserID FROM carttb INNER JOIN cartpackagetb ON carttb.UserID=cartpackagetb.UserID");
					 			
					  foreach($Disease as $p)
					  {
						  //if($p)
						  //{
							$cr=1;
						  //}						  
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
                                
							</div> <!-- end .col-sm-4 -->
							<?php
							   $tot=$tot+$p['Price'];
							?>
							<br>
							<br>
							
						</div>
					  <?php 
					  }  
					   //$package=$link->rawQuery("select c.*,p.* from cartpackagetb c,PackageTB p where c.Is_Active=0 and p.PackageID=c.PackageID and c.UserID=".$_SESSION['UserID1']);  
					 $package=$link->rawQuery("select u.*,p.* from userreportpackagetb u,PackageTB p where u.IsUpload=1 and u.PackageID=p.PackageID and u.UserID=".$_SESSION['UserID1']);  
					 foreach($package as $d)
					  { $o++;
						//if($d)
					//	{
						   $cpr=1;
						//}
   					  ?>
					         
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
                                
							</div> <!-- end .col-sm-4 -->
							<br>
							<br>
							<?php 
							    $tot1=$tot1+$d['Price'];
							?>
						    
						</div>
						
					  <?php }
                        if(($cr==1) || ($cpr==1))
						{
					      $tot2=0; ?>
					  <?php
							    $tot2=$tot+$tot1;
								
							?>
							
						<?php } else { ?><div class="row">
						  <div class="col-sm-5">
						  </div>
						  <div class="col-sm-4">
						  <h2>Order Is Empty</h2> 
						  </div>
						  <div class="col-sm-3">
						  </div></div><?php  } ?>
					  </div>
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