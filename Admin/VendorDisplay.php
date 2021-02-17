<?php
include "connect.php"; 
 session_start();
if(isset($_SESSION['Aid']))
{
	$a=$link->rawQuery("SELECT v.*,c.City_Name FROM VendorTB v,CityTB c WHERE v.CityID=c.CityID");
	if(isset($_GET['id']))
	{
		$b=$link->rawQueryOne("SELECT v.*,c.City_Name FROM VendorTB v,CityTB c WHERE v.CityID=c.CityID and v.VendorID=".$_GET['id']);
		if($b['Is_Active'] == 0)
		{
		  $link->where("VendorID",$_GET['id']);
		  $j=$link->update("VendorTB",Array("Is_Active"=>1));
		  header("location:VendorDisplay.php");
		}
		else
		{
		  $link->where("VendorID",$_GET['id']);
		  $j=$link->update("VendorTB",Array("Is_Active"=>0));
		  header("location:VendorDisplay.php");
		}
	}
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
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Vendor table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th></th>
                            <th>First Name</th>
                            <th>Last Name</th>							
                            <th>Phone Number</th>
                            <th>City</th>
		              					<th>Email</th>
                            <th>Lab Name</th>
                            <th>Lab Address</th>
                            <th>Lab Logo</th>
                            <th>License</th>
                            
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $o=0;
					  foreach($a as $b)
					  { 
					  ?>
                        <tr>
                            <td><?php $o++; echo $o; ?></td>
                            <td><?php echo $b["FirstName"];?></td>
                            <td><?php echo $b["LastName"];?></td>							
							<td><?php echo $b["PhoneNumber"];?></td>
							<td><?php echo $b["City_Name"];?></td>
							<td><?php echo $b["Email"];?></td>
							<td><?php echo $b["Lab_Name"];?></td>
							<td><?php echo $b["Lab_Address"];?></td>
              <td><img src="../vendor/images/<?php echo $b["Lab_Logo"];?>"></td> 	        
							<td><a href="../vendor/images/<?php echo $b["LicenseID_Proof"];?>" data-fancybox="images" data-caption="images/vendor/<?php echo $b["LicenseID_Proof"];?>"><img src="images/vendor/<?php echo $b["LicenseID_Proof"];?>"></td>
							<td><a href="VendorDisplay.php?id=<?php echo $b["VendorID"];?>"><?php if(isset($_GET['id'])){ }else{if($b['Is_Active'] == 1){ echo "Block";}else{echo "Allow";}}?></a></td>
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