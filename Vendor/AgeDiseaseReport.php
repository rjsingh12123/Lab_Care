<?php
include 'connect.php'; 
session_start();
  if(isset($_SESSION['semail']))
  {
   $a=$link->rawQuery("SELECT * FROM diseasecategorytb");
   $b=$link->rawQuery("SELECT * FROM TestTB");
   $c=$link->rawQuery("SELECT * FROM PackageTB");
   $e=$link->rawQuery("SELECT * FROM UserTB");
   
   $s=$_SESSION["vid"];
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
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  
</head>

<body>
  <?php include 'up.php';         ?>
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
               <div class="card-body">
                  <h2 class="card-title">User Report</h2>
				  <?php if(isset($_GET['id9']))  
					 {  $w=$_GET['id9'];
						 ?>
                  <form class="forms-sample1" action="pages/ui-features/Update.php?id9=<?php echo $w;?>" method="post" enctype="multipart/form-data">
				    <div class="col-md-6">
						<div class="col-md-6">
							<div class="form-group row">
							  <label class="col-sm-12 col-form-label">Report</label>
							  <div class="col-sm-12">
								<input type="file" name="file1" class="form-control">
							  </div>
							</div>
						</div>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
					 <?php } else {?>
					 <?php if(isset($_GET['id10']))  
					 {  $w=$_GET['id10'];
						 ?>
                  <form class="forms-sample1" action="ui-features/Update.php?id10=<?php echo $w;?>" method="post" enctype="multipart/form-data">
				    <div class="col-md-6">
						<div class="col-md-6">
							<div class="form-group row">
							  <label class="col-sm-12 col-form-label">Report</label>
							  <div class="col-sm-12">
								<input type="file" name="file1" class="form-control">
							  </div>
							</div>
						</div>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
					 <?php } } ?>
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