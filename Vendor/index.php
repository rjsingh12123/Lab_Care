<?php
   session_start();
      include "connect.php";
   if(isset($_SESSION['semail']))
   {
   ?>
<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LabCare</title>
<link rel="shortcut icon" href="images/favicon.ico"/>

  <!-- plugins:css -->
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>
<body>
  <?php include 'up.php';?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                <div class="card-body">
                  <h6 class="font-weight-normal">Disease</h6>
                  <h2 class="mb-0"><?php 
					  $i=0;
                        $j=$link->rawQuery("SELECT * FROM diseasecategorytb where Is_Active=1 and VendorID=".$_SESSION['vid']); 
					    foreach($j as $j1)
						{
							$i++;
						}
						echo $i;
					   ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                <div class="card-body">
                  <h6 class="font-weight-normal">Package</h6>
                  <h2 class="mb-0"><?php 
					  $i=0;
                        $j=$link->rawQuery("SELECT * FROM Packagetb where Is_Active=1 and VendorID=".$_SESSION['vid']); 
					    foreach($j as $j1)
						{
							$i++;
						}
						echo $i;
					   ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                <div class="card-body">
                  <h6 class="font-weight-normal">User</h6>
                  <h2 class="mb-0"><?php 
					  $i=0;
                    $j=$link->rawQuery("SELECT distinct u.UserID FROM Usertb u , UserReporttb ur , userreportpackagetb urp where (u.UserID= ur.UserID or u.UserID= urp.UserID ) and ur.VendorID=urp.VendorID=".$_SESSION['vid']);
					    foreach($j as $j1)
						{
							$i++;
						}
						echo $i;
					   ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card bg-gradient-info text-white text-center card-shadow-info">
                <div class="card-body">
                  <h6 class="font-weight-normal">User Report</h6>
                  <h2 class="mb-0"><?php 
					  $i=0;
             $j=$link->rawQuery("SELECT * FROM UserReporttb where VendorID=".$_SESSION['vid']);
						 $k=$link->rawQuery("SELECT * FROM userreportpackagetb ur where VendorID=".$_SESSION['vid']); 
					    foreach($j as $j1)
						{
							$i++;
						}
						foreach($k as $j1)
						{
							$i++;
						}
						
						echo $i;
					   ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
  <?php include 'down.php';?>
</body>

</html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>
