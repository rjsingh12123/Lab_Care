<?php
   session_start();
      include "connect.php";
    
  if(isset($_SESSION['Aid']))
   {
      
    if(isset($_POST['save']))
    {
    
    $UserName=$_POST['UserName'];
    $Email=$_POST['Email'];
    $link->where('UserID',$_SESSION['Aid']);
    $admin=$link->update('admintb',Array('UserName'=>$UserName,'Email'=> $Email));
    
    if($admin)
    {
      header("location:index.php");
    }
    else
    {
      header("location:Profile.php");
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
<script>
    var a1=0;
  var a2=0;
  
  var UserName=document.form1.UserName.value;
  var Email=document.form1.Email.value;
  document.getElementById("v1").innerHTML="";
  document.getElementById("v2").innerHTML="";
  if(UserName=="")
  {
    a1=1;
  }
  if(Email=="")
  {
    a2=1;
  }
  if(a1==1 || a2==1 )
  {
    if(a1==1)
    {
      document.getElementById("v1").innerHTML="<font color='red'>Required User Name</font>";
    }
    if(a2==1)
    {
      document.getElementById("v4").innerHTML="<font color='red'>Required Email</font>";
    }
    return false;
  }
  return(true);
  }
</script>
<body>
  <?php include 'up.php';?>
      <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 >Profile</h2><br>
                  <form class="forms-sample" enctype="multipart/form-data" method="POST" action="Profile.php" name="form1" onsubmit="return(validate());">
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <img src="images/<?php echo $admin_detail["Profile"] ?>" alt="profile">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="FirstName" class="col-sm-3 col-form-label">User Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="User Name" value="<?php echo $admin_detail['UserName']; ?>" name="UserName" ><span id="v1"></span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="Email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" placeholder="Email" value="<?php echo $admin_detail['Email']; ?>" name="Email"><span id="v4"></span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="save" >Save</button>
                    
                  </form>
                </div>
              </div>
            </div>
     
            <?php include 'down.php';?>
</body></html>
<?php
   }
   else
   {
     header("location:login.php");
   }
?>