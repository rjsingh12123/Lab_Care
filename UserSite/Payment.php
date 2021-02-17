<?php
   include 'connect.php';
   session_start();
//$link->insert("paymenttb",Array("UserID"=>$_SESSION['UserID1']));
  if(isset($_SESSION['userlogin']))
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
   $i1=$link->rawQueryOne("select UserReportID from UserReportTB where Is_Active=1 and UserID=".$_SESSION['UserID1']);
   
   $j1=$link->rawQuery("select UserReportPackageID from userreportpackagetb where Is_Active=1 and UserID=".$_SESSION['UserID1']);
   
   $conv='0.01368';
      
      //if(isset($_SESSION['payment'])) 
	  //{ $k=$_SESSION['payment']; 
   // }
  
  /* if(isset($i1['UserReportID']) && isset($j1['UserReortPackage']))
   { 
	   $x=$i1['UserReportID'];
	   $y=$j1['UserReortPackage'];
-	       header("location:Paypal.php?ids1=$x&ids2=$y");
   }
   else if(isset($i1['UserReportID']))
   {
		$x=$i1['UserReportID'];
	   header("location:Paypal.php?ids1=$x");
   }
   else if(isset($j1['UserReortPackage']))
   {
	   $y=$j1['UserReortPackage'];
	   header("location:Paypal.php?ids2=$y");
   }*/ 
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
	<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
	<?php 
   $op=$link->rawQueryOne("select * from PaymentTB where Is_Active=1 and UserID=".$_SESSION['UserID1']);
   $x1=$op['Total_Price'];
   $j=0.01; 
   $a=$x1*$j; ?>
<script type="text/javascript">
paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value:<?php echo $a;?>
						}
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
					<?php // unset($_SESSION['payment']); ?>
					window.location="paypal.php";
                });
            }
        }).render('#paypal-button-container');
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
		<h1>Payment Cart</h1>
		<div class="search-results-table">
				<header class="search-results-table-header">
					<div class="row">
						<div class="col-sm-2">
							<span class="specialty" style="color:white;">ID</span>
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-3">
							<span class="specialty" style="color:white;">Name</span>
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-3">
													
						</div> 
						<div class="col-sm-2">
							<span class="specialty" style="color:white;">Price</span>	
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
					  $Disease=$link->rawQuery("select c.*,d.*,t.* from CartTB c,DiseaseCategoryTB d,TestTB t where c.Is_Active=1 and d.DiseaseID=t.DiseaseID and c.DiseaseID=d.DiseaseID and c.TestID=t.TestID and c.UserID=".$_SESSION['UserID1']);  
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
								<span class="specialty" ><?php echo $o;?></span>
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
					   $package=$link->rawQuery("select c.*,p.* from cartpackagetb c,PackageTB p where c.Is_Active=1 and p.PackageID=c.PackageID and c.UserID=".$_SESSION['UserID1']);  
					 
					 foreach($package as $d)
					  { $o++;
						//if($d)
					//	{
						   $cpr=1;
						//}
   					  ?>
					         
					  		<div class="row">
						    <div class="col-sm-2">
								<span class="name"><?php echo $o;?></span>
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
							<hr style="border-top: 1px solid #0e0e0e;">
					  <div class="row">
					  	    <div class="col-sm-2">
						        
							</div>
					  	    <div class="col-sm-3">
							    
						        <h3><span class="specialty">Total Amount:</span></h3>
								
							</div>
							
						    <div class="col-sm-3">

							</div>
						    <div class="col-sm-2">
								<h3><span class="specialty"><?php echo "Rs. ".$tot2; ?></h3></span>
								<h5>(All Tax Included)</h5>
								<?php $_SESSION['payment']=$tot2; ?>
							</div>
						    <div class="col-sm-2">
							   <h4>
								 <div id="paypal-button-container" style="margin-left:-55px;"></div>
                               </h4>
						</div>
							<!-- end .col-sm-4 -->
					  </div>
						<?php } else { ?><div class="row">
						  <div class="col-sm-5">
						  </div>
						  <div class="col-sm-4">
						  <h2>PackageCart Is Empty</h2> 
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