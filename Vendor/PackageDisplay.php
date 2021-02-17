<?php
include "connect.php"; 
session_start();
if(isset($_SESSION['semail']))
   {
$a=$link->rawQuery("SELECT * FROM packagetb where Is_Active=1 and VendorID=".$_SESSION["vid"]);
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
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>

<body>
  <?php include 'up.php';?>
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Package</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr align="center">
                            <th></th>
							<th>Package Name</th>
							<th>Package Category Name</th>
							<th>Report</th>
							
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $o=0;

					  foreach($a as $b)
					  { 
					  $o++;
					  ?>
                        <tr align="center">
                            <td><?php echo $o;?></td>
							<td><?php echo $b["Package_Name"];?></td>
							<td><?php echo $b["PackageCategoryName"];?></td>
							<td>



<table border="1" cellpadding="2" cellspacing="2" style="width:500px">
  <tbody>
      <?php $checked_test=$link->rawQuery("Select tb.TestID ,tb.Test_Name from package_test_matchtb ptm, testtb tb where tb.TestID= ptm.package_test_id and ptm.package_id=".$b['PackageID']); 
      foreach ($checked_test as $test) {?>
        <tr>
          <td style="text-align:center"><strong><span style="color:#0199ed"><?php echo $test['Test_Name']; ?></span></strong></td>

          <?php 

              $test_parameter=$link->rawQuery("Select tp.parameter from testparametermatchtb tpm, testparametertb tp where tp.id= tpm.test_parameter_id and tpm.test_id=".$test['TestID']);
           
              $param = "";

              foreach ($test_parameter as $parameter) {
                 $param = $param.$parameter['parameter']." , "; 
               }; 
           ?>
          <td style="text-align:center"><?php echo substr_replace($param, "", -2); ?></td>

        </tr>
      <?php } ?>
  </tbody>
</table>


              </td>
							<td><a href="PackageInsert.php?id3=<?php echo $b["PackageID"];?>"><h3><i class="mdi mdi-border-color" style="color:blue;"></h3></i></a></td>
							<td><a href="pages/ui-features/Delete.php?id3=<?php echo $b["PackageID"];?>"><h3><i class="mdi mdi-delete-forever" style="color:red;"></h3></i></a></td>
              <td><a href="demoPackage.php?id=<?php echo $b["PackageID"];?>"><h3><i class="mdi mdi-file-document" style="color:black"></h3></i></a></td>
					  <?php } ?>  
                        </tr>
                      </tbody>
                    </table>
                  </div>
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