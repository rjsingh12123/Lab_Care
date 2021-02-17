<?php
session_start();
include "connect.php"; 
if(isset($_SESSION['semail']))
   {
$o=$_SESSION['semail'];
$a=$link->rawQuery("SELECT t.*,d.Disease_Name FROM TestTB t,DiseaseCategoryTB d where d.DiseaseID=t.DiseaseID and t.Is_Active=1 and t.VendorID=".$_SESSION["vid"]);
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
  <?php include 'up.php'; ?>
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Test Disease</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
					 	                <th></th> 
                            <th>Disease Name</th>							
                            <th>Test Name</th>
							              <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $i=0;
					  foreach($a as $b)
					  { 
					     $i++;
					  ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $b["Disease_Name"];?></td>							
							<td><?php echo $b["Test_Name"];?></td>							
							<td><?php echo $b["Price"];?></td>
							<td><a href="TestDiseaseAdd.php?id4=<?php echo $b["TestID"];?>"><h3><i class="mdi mdi-border-color" style="color:blue;"></h3></i></a></td>
							<td><a href="pages/ui-features/Delete.php?id4=<?php echo $b["TestID"];?>"><h3><i class="mdi mdi-delete-forever" style="color:red;"></h3></i></a></td>
              <td><a href="demo.php?id=<?php echo $b["TestID"];?>"><h3><i class="mdi mdi-file-document" style="color:black"></h3></i></a></td>
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
        <?php include 'down.php'; ?>
</body>
</html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>