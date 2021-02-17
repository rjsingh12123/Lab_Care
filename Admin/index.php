<?php
   include "connect.php";
   session_start();
   //echo $_SESSION['user1'];
   if(isset($_SESSION['Aid']))
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
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>
<body>
    <?php
      include 'up.php';
    ?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex align-items-baseline flex-wrap mt-3">
                <h2 class="mr-4 mb-0">Dashboard</h2>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-around align-items-center">
                    <div class="icon-rounded-primary">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>
                      <p>User</p>
                      <h3 class="mb-0"><?php 
					  $i=0;
                        $j=$link->rawQuery("SELECT * FROM UserTB where Is_Active=1"); 
					    foreach($j as $j1)
						{
							$i++;
						}
						echo $i;
					   ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-around align-items-center">
                    <div class="icon-rounded-primary">
                      <i class="fas fa-medkit"></i>
                    </div>
                    <div>
                      <p>Vendor</p>
                      <h3 class="mb-0"><?php 
                        $j=$link->rawQueryOne("SELECT count(VendorID) as num FROM VendorTB where Is_Active=1"); 
						echo $j['num'];
					   ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-around align-items-center">
                    <div class="icon-rounded-primary">
                      <i class="fas fa-file"></i>
                    </div>
                    <div>
                      <p>UserReport</p>
                      <h3 class="mb-0"><?php 
                        $j=$link->rawQueryOne("SELECT count(UserReportID) as num FROM UserReportTB where Is_Active=1"); 
						echo $j['num'];
					   ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

  <?php
      include 'down.php';
  ?>
</body>


</html>
<?php
   
   }
   else
   {	   
       header("location: login.php"); 
   }
?>
