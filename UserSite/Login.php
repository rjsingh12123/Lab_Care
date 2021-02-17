<?php
 include 'connect.php';
 session_start();
 $user=$link->rawQuery("select * from UserTB where Is_Active=1"); 
 if($link->count > 0)
 {
	if(isset($_SESSION['userlogin']))
	{
		header("location:index.php");
	}
	else
	{
		if(isset($_POST['submit']))
		{
			$a=$_POST['uemail'];
			$b=$_POST['upass'];
			if(isset($_POST['check']))
		   {			   
			if($_POST['check']=='1' || $_POST['check']=='on')
			{
				setcookie("usercookie2",$_POST['uemail']);
				setcookie("passcookie2",$_POST['upass']);				
			}
			else if(isset($_COOKIE['usercookie']))
			{
				setcookie("usercookie2","");
				setcookie("passcookie2","");				
			}
            else
			{
				$_COOKIE['usercookie2']="";
				$_COOKIE['passcookie2']="";
			}
           } 
			foreach($user as $u)
			{
				if(($_POST['uemail']==$u['Email']) && ($_POST['upass']==$u['Password']))
				{
					$_SESSION['userlogin']=$_POST['uemail'];
					$_SESSION['UserID1']=$u['UserID'];
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
 
?>
<!DOCTYPE html>
<html lang="en">
	
<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LabCare</title>
<link rel="shortcut icon" href="images/favicon.ico"/>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<!-- Simple-Line-Icons-Webfont -->
		<link href="css/simple-line-icons.css" rel="stylesheet">
		<!-- FlexSlider -->
		<link href="css/flexslider.css" rel="stylesheet">
		<!-- Owl Carousel -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.default.css" rel="stylesheet">
		<!-- noUiSlider -->
		<link href="css/jquery.nouislider.min.css" rel="stylesheet">
		<!-- Style.css -->
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/color.html" id="color-switcher">


	</head>
	<script>

	function validate1()
	{
		var a1=0;
		var a2=0;
		var name=document.form1.uemail.value;
		var name1=document.form1.upass.value;
		document.getElementById("s1").innerHTML="";
		document.getElementById("s2").innerHTML="";
		if(name=="")
		{
			a1=1;
		}
		if(name1=="")
		{
			a2=1;
		}
		if(a1==1 || a2==1)
		{
			if(a1==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Required UserName</font>";
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
				<?php include 'header.php'; ?>
		<div class="section white">
			<div class="inner">
				<div class="container">
					<div class="row aligned-cols">
						<div class="col-sm-4">
							<h2>Welcome to LabCare.</h2>
							<p>A convenient and secure way to manage your health & communicate with your doctor's office online.</p>
							<form name="form1" class="form-outline login-register" method="post" action="Login.php" onsubmit="return(validate1());">
								<h3>Login To Account</h3>
								<div class="form-group">
									<input type="text" name="uemail" placeholder="Email Address" value="<?php if(isset($_COOKIE['usercookie2'])){ echo $_COOKIE['usercookie2']; } ?>"><span id="s1"></span>
								</div> <!-- end .form-group -->
								<div class="form-group">
									<input type="password" name="upass" placeholder="Password" value="<?php if(isset($_COOKIE['passcookie2'])){ echo $_COOKIE['passcookie2']; } ?>"><span id="s2"></span>
								</div> <!-- end .form-group -->
								 <div class="form-group">
								  <span><font color="red"><?php if(isset($err1)){ echo $err1; }?></span>
								</div>	
								<input type="submit" name="submit" value="Secure Login" class="button">
								<div class="form-check">
									<label class="form-check-label text-muted" style="font-size: 16px; line-height: 24px; font-weight: 400; margin-bottom: 14px;">
									  <input type="checkbox" name="check" class="form-check-input">
									  Remember Me
									</label>
								</div>
								<div class="form-group">
									<a href="Register.php">New To LabCare Register</a>
								</div> <!-- end .form-group -->
								
							</form>
						</div> <!-- end .col-sm-4 -->
						
						<div class="col-sm-4 aligned-bottom">
							<img src="images/doctors3.png" alt="doctors3" class="img-responsive bottom-image left">
						</div> <!-- end .col-sm-4 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->
			<?php include 'down.php'; ?>
</html>
