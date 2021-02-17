<?php
   session_start();
      include "connect.php";
	  
	if(isset($_SESSION['semail']))
   {
		  
	  if(isset($_POST['save']))
	  {
	  
	  $FirstName=$_POST['FirstName'];
	  $LastName=$_POST['LastName'];
	  $PhoneNumber=$_POST['PhoneNumber'];
	  $Email=$_POST['Email'];
	  $Lab_Name=$_POST['Lab_Name'];
	  $Lab_Address=$_POST['Lab_Address'];
	 // $Lab_Logo=$_POST['Lab_Logo'];
	  //$LicenseID_Proof=$_POST['LicenseID_Proof'];
	  $link->where('VendorID',$_SESSION['vid']);
	  $vendor=$link->update('vendortb',Array('FirstName'=>$FirstName,'LastName'=>$LastName,'PhoneNumber'=> $PhoneNumber,'Email'=> $Email,'Lab_Name'=>$Lab_Name,'Lab_Address'=> $Lab_Address));
	//  $vendor=$link->update('vendortb',Array('FirstName'=>$FirstName,'LastName'=>$LastName,'PhoneNumber'=> $PhoneNumber,'Email'=> $Email,'Lab_Name'=>$Lab_Name,'Lab_Address'=> $Lab_Address,'Lab_Logo'=>$Lab_Logo,'LicenseID_Proof'=>$LicenseID_Proof));
	  
	  if($vendor)
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
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<script>

function validate() {
    var a1=0;
	var a2=0;
	var a3=0;
	var a4=0;
	var a5=0;
	var a6=0;
	var a7=0;
	var a8=0;
	
	var FirstName=document.form1.FirstName.value;
	var LastName=document.form1.LastName.value;
	var PhoneNumber=document.form1.PhoneNumber.value;
	var Email=document.form1.Email.value;
	var Lab_Name=document.form1.Lab_Name.value;
	var Lab_Address=document.form1.Lab_Address.value;
	var Lab_Logo=document.form1.Lab_Logo.value;
	var LicenseID_Proof=document.form1.LicenseID_Proof.value;
	document.getElementById("v1").innerHTML="";
	document.getElementById("v2").innerHTML="";
	document.getElementById("v3").innerHTML="";
	document.getElementById("v4").innerHTML="";
	document.getElementById("v5").innerHTML="";
	document.getElementById("v6").innerHTML="";
	document.getElementById("v7").innerHTML="";
	document.getElementById("v8").innerHTML="";
	if(FirstName=="")
	{
		a1=1;
	}
	if(LastName=="")
	{
		a2=1;
	}
	if(PhoneNumber=="")
	{
		a3=1;
	}
	if(Email=="")
	{
		a4=1;
	}
	if(Lab_Name=="")
	{
		a5=1;
	}
	if(Lab_Address=="")
	{
		a6=1;
	}
	if(Lab_Logo=="")
	{
		a7=1;
	}
	if(LicenseID_Proof=="")
	{
		a8=1;
	}
	if(a1==1 || a2==1 || a3==1|| a4==1 || a5==1 || a6==1 || a7==1 || a8==1)
	{
		if(a1==1)
		{
			document.getElementById("v1").innerHTML="<font color='red'>Required FirstName</font>";
		}
		if(a2==1)
		{
			document.getElementById("v2").innerHTML="<font color='red'>Required LastName</font>";
		}
		if(a3==1)
		{
			document.getElementById("v3").innerHTML="<font color='red'>Required PhoneNumber</font>";
		}
		if(a4==1)
		{
			document.getElementById("v4").innerHTML="<font color='red'>Required Email</font>";
		}
		if(a5==1)
		{
			document.getElementById("v5").innerHTML="<font color='red'>Required Lab_Name</font>";
		}
		if(a6==1)
		{
			document.getElementById("v6").innerHTML="<font color='red'>Required Lab_Address</font>";
		}
		if(a7==1)
		{
			document.getElementById("v7").innerHTML="<font color='red'>Required Lab_Logo</font>";
		}
		if(a8==1)
		{
			document.getElementById("v8").innerHTML="<font color='red'>Required LicenseID_Proof</font>";
		}
		return false;
	}
	return(true);
	}
function changeImage() {
	document.getElementById('my_logo').click();
}

function uploadImage() {
	document.getElementById('submit_image').click();
}

</script>
<body>
  <?php include 'up.php';?>
      <div class="content-wrapper">
          <div class="row">
	          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 >Profile</h2><br>
                  <?php $v=$link->rawQueryOne("SELECT * FROM vendortb where VendorID=".$_SESSION['vid']);?>
                  <form class="forms-sample" enctype="multipart/form-data" method="POST" action="Profile.php" name="form1" onsubmit="return(validate());">
                    <div class="form-group row">
                      <label for="FirstName" class="col-sm-3 col-form-label">FirstName</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="FirstName" value="<?php echo $v['FirstName']; ?>" name="FirstName" ><span id="v1"></span>
                    </div>
					</div>
                    <div class="form-group row">
                      <label for="LastName" class="col-sm-3 col-form-label">LastName</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="LastName" value="<?php echo $v['LastName']; ?>" name="LastName" ><span id="v2"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="PhoneNumber" class="col-sm-3 col-form-label">PhoneNumber</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="PhoneNumber" value="<?php echo $v['PhoneNumber']; ?>" name="PhoneNumber" ><span id="v3"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" placeholder="Email" value="<?php echo $v['Email']; ?>" name="Email"><span id="v4"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Lab_Name" class="col-sm-3 col-form-label">Lab_Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="Lab_Name" placeholder="Lab_Name" value="<?php echo $v['Lab_Name']; ?>" ><span id="v5"></span>
                      </div>
                    </div>
					<div class="form-group row">
                      <label for="Lab_Address" class="col-sm-3 col-form-label">Lab_Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="Lab_Address" placeholder="Lab_Address" value="<?php echo $v['Lab_Address']; ?>" ><span id="v6"></span>
                      </div>
                    </div>
					<!-- <div class="form-group row">
                      <label for="Lab_Logo" class="col-sm-3 col-form-label">Lab_Logo</label>
                      <div class="col-sm-9">
                        <input type="file"  name="Lab_Logo" placeholder="Lab_Logo"><span id="v7"></span>
                      </div>
                    </div>
					<div class="form-group row">
                      <label for="LicenseID_Proof" class="col-sm-3 col-form-label">LicenseID_Proof</label>
                      <div class="col-sm-9">
                        <input type="file" name="LicenseID_Proof" placeholder="LicenseID_Proof"><span id="v8"></span>
                      </div>
                    </div> -->                    
                    <button type="submit" class="btn btn-primary mr-2" name="save" >Save</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
	            	<div class="form-group row justify-content-center">
	                  <h4 class="col-form-label">Lab Logo</h4>
	                </div>
	        		<div class="form-group row justify-content-center">
	    			  <img name="lab_logo" src="images/<?php echo $vendor_detail["Lab_Logo"] ?>" style="width: 250px;height: 250px;" alt="profile">
	                </div>
	                <div class="form-group row justify-content-center">
                        <form action="changeVendorLogo.php" method="post" enctype="multipart/form-data">
	                	<input type="button" onclick="changeImage()" value="Change Image" class="btn btn-primary mr-2">
						<input name="logo_file" onchange="uploadImage()" style="display: none;" type="file" id="my_logo">
						<input style="display: none;" type="submit" id="submit_image">
					</form>
	                </div>
                </div>
              </div>
            </div>
     
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
            <?php include 'down.php';?>
  
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body></html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>

