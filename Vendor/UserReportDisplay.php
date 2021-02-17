<?php
session_start();
include "connect.php"; 
if(isset($_SESSION['semail']))
   {
$v=$_SESSION['vid'];
//$a=$link->rawQuery("select * from UserReportTB where VendorID=".$_SESSION['vid']);
$a=$link->rawQuery("SELECT d.*,t.*,u.*,u1.*,v.* FROM diseasecategorytb d,TestTB t,UserReportTB u,UserTB u1,VendorTB v where u.TestID=t.TestID and u.DiseaseID=d.DiseaseID and u.UserID=u1.UserID and u.VendorID=v.VendorID and (u.Approve is null or u.Approve = 1 ) and u.VendorID=".$_SESSION['vid']);

if(isset($_GET['ids']))
{
	if($_GET['val']==1)
	{
	  $link->where("UserReportID",$_GET['ids']);
	  $j=$link->update("UserReportTB",Array("Approve"=>1));
	}
	else if($_GET['val']==0)
	{
	  $link->where("UserReportID",$_GET['ids']);
	  $j=$link->update("UserReportTB",Array("Approve"=>0));
	}
  header("location:UserReportDisplay.php");
}
if(isset($_GET['ids1']))
{	if($_GET['val']==1)
	{
	  $link->where("UserReportID",$_GET['ids1']);
	  $j=$link->update("UserReportTB",Array("Collection"=>1));
	}
  header("location:UserReportDisplay.php");
}
?>
<!DOCTYPE html>
<html lang="en">
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
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  
</head>

<body>
  <?php include 'up.php'; ?>
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">User Report</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr align="center">
                          <th></th>
            							<th>Disease</th>
            							<th>Test</th>
            							<th>User</th>
            							<th>Date</th>
            							<th>Time</th>
            							<th>Visit</th>
            							<th>Paid</th>
            							<th>Approve</th>
            							<th>Collection</th>
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
                            <td><?php echo $o; ?></td>
							<td><?php echo $b["Disease_Name"]; ?></td>
							<td><?php echo $b["Test_Name"];?></td>
							<td><?php echo $b["First_Name"]." ".$b["Last_Name"];?></td>
							<td><?php echo $b["Collection_Date"];?></td>
							<td><?php echo $b["From_Collection_Time"]." - ".$b["To_Collection_Time"]; ?></td>
							<td><?php if($b["Visit"]==0) { ?><h3><i class="mdi mdi-home" style="color:brown;"></i></h3><?php } else { ?><h3><i class="mdi mdi-hospital" ></i></h3></td><?php } ?></a></td>
							<td><?php if($b["IsPaid"]=="Paid") { ?><h3><i class="mdi mdi-check-circle" style="color:green;"></i></h3><?php } else { ?><h3><i class="mdi mdi-close-circle" style="color:red;"></i></h3></td><?php } ?></a></td>
							<td><?php if(is_null($b["Approve"])) { ?><a href="UserReportDisplay.php?ids=<?php echo $b["UserReportID"]."&val=1";?>"><h3><i class="mdi mdi-checkbox-marked-circle-outline" style="color:green;"></i></h3></a><a href="UserReportDisplay.php?ids=<?php echo $b["UserReportID"]."&val=0";?>"><h3><i class="mdi mdi-close-circle-outline" style="color:red;"></i></h3></a><?php }else{ ?><h3><i class="mdi mdi-checkbox-marked-circle-outline" style="color:green;"></i></h3><?php } ?></td>
							<td><?php if($b["Collection"]==0) { if($b["Approve"]==1){?><a href="UserReportDisplay.php?ids1=<?php echo $b["UserReportID"]."&val=1";?>"><h3><i class="mdi mdi-close-circle-outline" style="color:red;"></i></h3></a><?php }else{ ?><h3><i class="mdi mdi-close-circle-outline" style="color:grey;"></i></h3><?php } }else{ ?><h3><i class="mdi mdi-checkbox-marked-circle-outline" style="color:green;"></i></h3><?php } ?>
							<td><?php if($b["IsUpload"]==0) { if($b["Collection"]==1){?><a href="UserReportAdd.php?id7=<?php echo $b["UserReportID"];?>"><h3><i class="mdi mdi-border-color" style="color:blue;"></i></h3></a><?php }else{ ?><h3><i class="mdi mdi-border-color" style="color:grey;"></i></h3><?php }} else { ?> <a href="ResultUserTestReport.php?id=<?php echo $b["UserReportID"];?>"><h3><i class="mdi mdi-file-document" style="color:black;"></i></h3></a></td><?php } ?></td>
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