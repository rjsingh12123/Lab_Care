<?php
include "connect.php"; 
session_start();
if(isset($_SESSION['Aid']))
{
   $a=$link->rawQuery("SELECT s.StateID,s.State_Name,c.Country_Name FROM StateTB s,CountryTB c where c.CountryID=s.CountryID and s.Is_Active=1");
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
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
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
              <h4 class="card-title">State Table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr align="center">
                          <th></th>
            							<th>State</th>
            							<th>Country</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $o=0;
					  foreach($a as $b)
					  { 
					  ?>
                        <tr align="center">
                            <td><?php $o++; echo $o; ?></td>
							<td><?php echo $b["State_Name"];?></td>
							<td><?php echo $b["Country_Name"];?></td>
		                    <td><a href="StateInsert.php?id1=<?php echo $b["StateID"];?>"><h3><i class="mdi mdi-border-color" style="color:blue;"></h3></i></a></td>
							<td><a href="Delete.php?id=<?php echo $b["StateID"];?>"><h3><i class="mdi mdi-delete-forever" style="color:red;"></h3></i></a></td>
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