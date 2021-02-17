<?php
include "connect.php"; 
 session_start();
if(isset($_SESSION['Aid']))
{
    $a=$link->rawQuery("SELECT u.UserID,c.Country_Name,s.State_Name,ci.City_Name,u.First_Name,u.Last_Name,u.Email,u.Age,u.Gender,u.Address,u.Mobile_Number,u.Password,u.Is_Active FROM UserTB u,CountryTB c,StateTB s,CityTB ci WHERE c.CountryID=u.CountryID and s.StateID=u.StateID and ci.CityID=u.CityID");

    if(isset($_GET['id']))
  {
    $b=$link->rawQueryOne("SELECT u.*,c.City_Name FROM UserTB u,CityTB c WHERE u.CityID=c.CityID and U.UserID=".$_GET['id']);
    if($b['Is_Active'] == 0)
    {
      $link->where("UserID",$_GET['id']);
      $j=$link->update("UserTB",Array("Is_Active"=>1));
      header("location:UserDetails.php");
    }
    else
    {
      $link->where("UserID",$_GET['id']);
      $j=$link->update("UserTB",Array("Is_Active"=>0));
      header("location:UserDetails.php");
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
              <h4 class="card-title">User table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
						              <th>Country</th>
                          <th>State</th>
                          <th>City</th>
                          <th>Address</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Mobile Number</th>
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
                            <td><?php echo $b["First_Name"];?></td>
							<td><?php echo $b["Last_Name"];?></td>
							<td><?php echo $b["Email"];?></td>
							<td><?php echo $b["Country_Name"];?></td>
							<td><?php echo $b["State_Name"];?></td>
							<td><?php echo $b["City_Name"];?></td>
							<td><?php echo $b["Address"];?></td>
							<td><?php echo $b["Age"];?></td>
							<td><?php echo $b["Gender"];?></td>
							<td><?php echo $b["Mobile_Number"];?></td>
              <td><a href="UserDetails.php?id=<?php echo $b["UserID"];?>"><?php if($b['Is_Active'] == 1){ echo "Block";}else{echo "Allow";}?></a></td>

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
        <!-- content-wrapper ends --><
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
