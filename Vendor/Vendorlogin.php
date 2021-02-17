<?php
    session_start();
    include 'connect.php';
	$r1=$link->rawQuery("select * from VendorTB where Is_Active=1");
if($r1)
{
	if($link->count > 0)
	{
		if(isset($_SESSION['semail']))
		{
			header("location: index.php");
		}
		else
		{
			if(isset($_POST['submit']))
			{
			   	if(isset($_POST['check']))
			   	{
				   	setcookie("vusercookie",$_POST['vUser'],time()+(30*24*60*60));
	      			setcookie("vpasscookie",$_POST['vpass']);       
		        }
		        else
		        {
		          setcookie("vusercookie","",time()-1);
		          setcookie("vpasscookie","",time()-1);        
		        }
				   
			  foreach($r1 as $r)	
			  {				
				if(($_POST['vUser']==$r['Email']) && ($_POST['vpass']==$r['Password']))
				{
					$_SESSION["semail"]=$_POST["vUser"];
					$_SESSION['vid']=$r['VendorID'];
					header("location:index.php");
				}
				else
				{
					$err1="UserName Or Password Are Invalid";
				}	
			  }
		    }		
		}	
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
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  
</head>
<script>
    function validate()
	{
		var a1=0;
		var a2=0;
		var users=document.form1.vUser.value;
		var pass1=document.form1.vpass.value;
		document.getElementById("s1").innerHTML="";
		document.getElementById("s2").innerHTML="";
		if(users=="")
		{
			a1=1;
		}	
		if(pass1=="")
		{
			a2=1;
		}
		if(a1==1 || a2==1)
		{
			if(a1==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Required VendorID</font>";
			}
			if(a2==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Required Password</font>";
			}
            return false;			
		}
		return ( true );
	}	
</script>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="images/Lablogo.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST" action="Vendorlogin.php" onsubmit="return(validate());" name="form1">
                <div class="form-group">
                  <input type="text" name="vUser" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" value="<?php if(isset($_COOKIE['vusercookie'])){ echo $_COOKIE['vusercookie']; } ?>"><span id="s1"></span>
                </div>
                <div class="form-group">
                  <input type="password" name="vpass" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" value="<?php if(isset($_COOKIE['vpasscookie'])){ echo $_COOKIE['vpasscookie']; } ?>"><span id="s2"></span>
                </div>
				<div class="form-group">
				  <span><font color="red"><?php if(isset($err1)){ echo $err1; }?></font></span>
				</div>	
                <div class="mt-3">
                  <input type="submit" name="submit" value="SIGN IN" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.php">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="check" class="form-check-input">
                      Remember Me
                    </label>
                  </div>
                  <!--<a href="#" class="auth-link text-black">Forgot password?</a>-->
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="VendorRegister.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>


</html>
