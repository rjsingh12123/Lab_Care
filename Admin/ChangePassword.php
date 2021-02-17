<?php
   session_start();
   include "connect.php";
    if(isset($_SESSION['Aid']))
   {
   if(isset($_POST['submit']))
   {
		$pass=$_POST["confirm_password"];
		$user=$_SESSION['Aid'];
		$j=$link->rawQuery("Select * from AdminTB");
		foreach($j as $k)
		{
			if($_POST['oldpassword']==$k['Password'])
			{  
			   $link->where("UserID",$user);
			   $link->update("AdminTB",Array("Password"=>$pass));   
		       header("location:index.php");
			}
			else
			{
			    $err1="Old password Is Invalid";
			}
		}  
   }
?>
<!DOCTYPE html>
<html lang="en"><head>
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
    function validate()
	{
		var a1=0;
		var a2=0;
		var a3=0;
		var a4=0;
		var a5=0;
		var pass1=document.form1.oldpassword.value;
		var pass2=document.form1.password.value;
		var pass3=document.form1.confirm_password.value;
		document.getElementById("s1").innerHTML="";
		document.getElementById("s2").innerHTML="";
		document.getElementById("s3").innerHTML="";
		pattern1=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
		if(pass1=="")
		{
			a1=1;
		}		
		if(pass2=="")
		{
			a2=1;
		}else if(pattern1.test(pass2)==false)
		   {
			   a5=1;
		   }
	    if(pass3!==pass2)
		{
			a4=1;
		}
		if(pass3=="")
		{
			a3=1;
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
				document.getElementById("s3").innerHTML="<font color='red'>ConfirmPassword Does Not Match</font>";
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
<?php 
  include 'up.php';
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Complete form validation</h4>
                  <form class="cmxform" name="form1" id="signupForm" method="POST" action="ChangePassword.php" onsubmit="return(validate());">
                    <fieldset>
                      <div class="form-group">
                        <label for="username">Old Password</label> 
                        <input id="username" class="form-control" name="oldpassword" type="password"><span id="s1"></span>
                      </div>
					   <div class="form-group">
                        <label for="password"> Password</label> 
                        <input id="password" class="form-control" name="password" type="password"><span id="s2"></span>
                      </div>
                      <div class="form-group">
                        <label for="confirm_password">Confirm password</label>
                        <input id="confirm_password" class="form-control" name="confirm_password" type="password"><span id="s3"></span>
                      </div>
                      <input class="btn btn-primary mr-2" type="submit" name="submit" value="submit">
                    </fieldset>
                  </form>
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