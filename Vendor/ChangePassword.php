<?php
  session_start();
  include 'connect.php';
   if(isset($_SESSION['vid']))
   {
    $p=$link->rawQueryOne("select * from VendorTB where VendorID=".$_SESSION["vid"]);
    if(isset($_POST['submit']))
    {
  	  if($p['Password']==$_POST['opass'])
  	  {
  		$link->where("Email",$p['Email']);  
  		$link->update("VendorTB",Array("Password"=>$_POST['pass']));  
  		header("location:index.php");
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
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>
<script>
    function validate()
	{
		var a1=0;
		var a2=0;
		var a3=0;
		var a4=0;
		var a5=0;
		var pass1=document.form1.opass.value;
		var pass2=document.form1.pass.value;
		var pass3=document.form1.cpass.value;
		document.getElementById("s1").innerHTML="";
		document.getElementById("s2").innerHTML="";
		document.getElementById("s3").innerHTML="";
		pattern1=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
		// pattern1=/^[a-zA-Z0-9]*$/;
		if(pass1=="")
		{
			a1=1;
		}		
		else if(pass2=="")
		{
			a2=1;
		}
    else if(pass3=="")
    {
      a3=1;
    }
    else if(pass3!==pass2)
    {
      a4=1;
    }
    else if(pattern1.test(pass2)==false)
   {
	   a5=1;
   }
		
		if(a1==1 || a2==1 || a3==1 || a4==1 || a5==1)
		{
			if(a1==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Required OldPassword</font>";
			}
			if(a2==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Required Password</font>";
			}
			if(a3==1)
			{
				document.getElementById("s3").innerHTML="<font color='red'>Required ConfirmPassword</font>";
			}
			if(a4==1)
			{
				document.getElementById("s3").innerHTML="<font color='red'>ConfirmPassword does not Match Password</font>";
			}
			if(a5==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'><span>password between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character</span></font>";
			}
            return false;			
		}
		return ( true );
	}	
</script>
<body>
<?php include 'up.php';        ?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="col-md-6 card-body">
                  <h4 class="card-title">Change Password</h4>
                  
                  <form name="form1" class="forms-sample" method="post" action="ChangePassword.php"  onsubmit="return(validate());">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Old Password</label>
                      <input type="password" class="form-control" name="opass" id="exampleInputChangePassword1" placeholder="Old Password"><span id="s1"></span>
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password"><span id="s2"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
                      <input type="password" class="form-control" name="cpass" id="exampleInputConfirmPassword1" placeholder="Password"><span id="s3"></span>
                    </div>
                    
					<input type="submit" class="btn btn-primary mr-2" name="submit" value="submit">
                    <a class="btn btn-light" href="index.php">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php include 'down.php';        ?>
</body>
</html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>