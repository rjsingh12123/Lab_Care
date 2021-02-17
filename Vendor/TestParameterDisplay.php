<?php
include "connect.php"; 
session_start();
if(isset($_SESSION['semail']))
   {
$a=$link->rawQuery("SELECT * FROM testparametertb ");
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/serein/template/demo/vertical-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2019 07:05:46 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LabCare</title>
<link rel="shortcut icon" href="images/favicon.ico"/><!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>

<body>
  <?php include 'up.php';?>
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Parameter</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr align="center">
                            <th></th>
							<th>Parameter</th>
							<th>Unit</th>
							<th>Reference Range</th>
			
							<th>Update</th>
							<th>Delete</th>
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
                            <td><?php echo $b["id"];?></td>
							<td><?php echo $b["parameter"];?></td>
							<td><?php echo $b["Unit"];?></td>
							<td><?php echo $b["reference_range"];?></td>
							
							<td><a href="TestParameterAdd.php?id11=<?php echo $b["id"];?>"><h3><i class="mdi mdi-border-color" style="color:blue;"></h3></i></a></td>
							<td><a href="pages/ui-features/Delete.php?id2=<?php echo $b["id"];?>"><h3><i class="mdi mdi-delete-forever" style="color:red;"></h3></i></a></td>
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