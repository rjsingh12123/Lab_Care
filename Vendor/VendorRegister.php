<?php 
 include 'connect.php';
    $q=$link->rawQuery("select * from CountryTB where Is_Active=1");
	$s=$link->rawQuery("select * from StateTB where Is_Active=1");
	$c=$link->rawQuery("select * from CityTB where Is_Active=1");			
 if(isset($_POST['submit']))
 {
	 $fn=$_POST['fname'];
	 $ln=$_POST['lname'];
	 $p=$_POST['mno'];
	 $e=$_POST['email'];
	 $lab_n=$_POST['labname'];
	 $lab_a=$_POST['ladd'];
	 $cp=$_POST['cpass'];
	 $i=$_POST["city"];
	 $lid=$_FILES['file1']['name'];
	 $path=pathinfo($lid,PATHINFO_EXTENSION);
     $ext="images/".$fn.".".$path;
	 $exts=$fn.".".$path;
	 $logo=$_FILES['file2']['name'];
	 $path1=pathinfo($logo,PATHINFO_EXTENSION);
	 $ext1="images/".$fn.".".$path1;
	 $ext2 = $fn.".".$path1;
	 if(move_uploaded_file($_FILES['file1']['tmp_name'],$ext))
	 {
		if(move_uploaded_file($_FILES['file2']['tmp_name'],$ext1))
		{
			if($link->insert("vendortb",Array("FirstName"=>$fn,"LastName"=>$ln,"PhoneNumber"=>$p,"Email"=>$e,"Password"=>$cp,"Lab_Name"=>$lab_n,"Lab_Address"=>$lab_a,"LicenseID_Proof"=>$exts,"Lab_Logo"=>$ext2,"Is_Active"=>0,"CityID"=>$i)))
			{
				header("location:Vendorlogin.php");
				echo "success";
			}
			else
		    {
				echo "error";
			}
		}
		else
		{
		  echo "not uploaded logo";	
	    }
	 }
	else
	{
    	echo "not uploaded";	
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
 
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	   $('#country').on('change',function(){	
	    var countryid=$(this).val();
		   if(countryid)
		   {   
	  
			   $.ajax({
				   type:'POST',
				   url:'getState.php',
				   data:'c='+countryid,
				   success:function(html){
				   $('#state').html(html);
				   }
			   });
		   }
		   else
		   {
			  $('#state').html('<option value="">---Selectd---</option>'); 
		   }
	   });
	   $('#state').on('change',function(){
		   var stateid=$(this).val();
		   if(stateid)
		   {   
			   $.ajax({
				   type:'POST',
				   url:'getState.php',
				   data:'c1='+stateid,
				   success:function(html){
				   $('#city').html(html);
				   }
			   });
		   }
		   else
		   {
			  $('#city').html('<option value="">---Selectd---</option>'); 
		   }
	   });
	   
});

function validate()
{
		var name=document.form1.fname.value;
		var name1=document.form1.lname.value;
		var name2=document.form1.mno.value;
		var name3=document.form1.email.value;
		var name4=document.form1.country.value;
		var name5=document.form1.state.value;
		var name6=document.form1.city.value;
		var name7=document.form1.labname.value;
		var name8=document.form1.ladd.value;
		var name9=document.form1.file1.value;
		var name10=document.form1.file2.value;
		var name11=document.form1.pass.value;
		var name12=document.form1.cpass.value;
	
	document.getElementById("s1").innerHTML="";
		document.getElementById("s2").innerHTML="";
		document.getElementById("s3").innerHTML="";
		document.getElementById("s4").innerHTML="";
		document.getElementById("s5").innerHTML="";
		document.getElementById("s6").innerHTML="";
		document.getElementById("s7").innerHTML="";
		document.getElementById("s8").innerHTML="";
		document.getElementById("s9").innerHTML="";
		document.getElementById("s10").innerHTML="";
		document.getElementById("s11").innerHTML="";
		document.getElementById("s12").innerHTML="";
		document.getElementById("s13").innerHTML="";
    	pattern1=/^([a-zA-Z]|\s)*$/;
		pattern2=/^([a-zA-Z]|\s)*$/;
		pattern3=/^[9 | 8 | 7 | 6]{1}[0-9]{9}$/;
		pattern4=/^[a-zA-Z0-9]+\@gmail\.com$/;
		pattern5=/^([a-zA-Z]|\s)*$/;
		pattern6=/^[a-z A-Z 0-9 - ,]*$/;
		pattern7=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
	
		if(name=="")
		{
				document.getElementById("s1").innerHTML="<font color='red'>Required FirstName</font>";
				return false;
		}else if(pattern1.test(name)==false)
		   {
				document.getElementById("s1").innerHTML="<font color='red'>Please Enter Correct FirstName</font>";
				return false;
		   }
		
		if(name1=="")
		{
			document.getElementById("s2").innerHTML="<font color='red'>Required LastName</font>";
			return false;
		}else if(pattern2.test(name1)==false)
	   {
			document.getElementById("s2").innerHTML="<font color='red'>Please Enter Correct LastName</font>";
			return false;
	   }

		if(name2=="")
		{
	    	document.getElementById("s3").innerHTML="<font color='red'>Required MobileNumber</font>";
	    	return false;
		}else if(pattern3.test(name2)==false)
	   {
			document.getElementById("s3").innerHTML="<font color='red'>Please Enter Correct MobileNumber</font>";
			return false;
	   }

		if(name3=="")
		{
				document.getElementById("s4").innerHTML="<font color='red'>Required Email</font>";
				return false;
		}else if(pattern4.test(name3)==false)
		   {
				document.getElementById("s4").innerHTML="<font color='red'>Please Enter Correct Email</font>";
				return false;
		   }

		if(name4=="")
		{
				document.getElementById("s5").innerHTML="<font color='red'>Required Country</font>";
				return false;
		}

		if(name5=="")
		{
				document.getElementById("s6").innerHTML="<font color='red'>Required State</font>";
				return false;
		}

		if(name6=="")
		{
				document.getElementById("s7").innerHTML="<font color='red'>Required City</font>";
				return false;
		}

        if(name7=="")
		{
				document.getElementById("s8").innerHTML="<font color='red'>Required Lab Name</font>";
				return false;
		}else if(pattern5.test(name7)==false)
		   {
				document.getElementById("s8").innerHTML="<font color='red'>Please Enter Correct Lab Name</font>";
				return false;
		   }

        if(name8=="")
		{
				document.getElementById("s9").innerHTML="<font color='red'>Required Lab Address</font>";
				return false;
		}else if(pattern6.test(name8)==false)
		   {
				document.getElementById("s9").innerHTML="<font color='red'>Please Enter Correct Lab Address</font>";
				return false;
		   }	

		if(name9=="")
		{
				document.getElementById("s10").innerHTML="<font color='red'>Required LicenseID_Proof</font>";
				return false;
		}

		if(name10=="")
		{
				document.getElementById("s11").innerHTML="<font color='red'>Required Logo</font>";
				return false;
		}

		if(name11=="")
		{
				document.getElementById("s12").innerHTML="<font color='red'>Required Password</font>";
				return false;
		}else if(pattern7.test(name11)==false)
		   {
				document.getElementById("s12").innerHTML="<font color='red'><span>password between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character</span></font>";
				return false;
		   }
		if(name12=="")
		{
				document.getElementById("s13").innerHTML="<font color='red'>Required ConfirmPassword</font>";
				return false;
		}else if(name11!=name12)
		   {
				document.getElementById("s13").innerHTML="<font color='red'>Password And ConfirmPassword Not Matched</font>";
				return false;
		   }
		return ( true );
}
  </script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-9 d-flex align-items-center justify-content-center" style="background-color:white;">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="images/LabLogo.png" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
              <form name="form1"  class="pt-3" method="POST" action="VendorRegister.php" enctype="multipart/form-data" onsubmit="return(validate());">
                <div class="form-group">
                  <label>First Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="fname" class="form-control form-control-lg border-left-0" placeholder="First Name"><span id="s1"></span>	
                  </div>
                </div>
				<div class="form-group">
                  <label>Last Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="lname" class="form-control form-control-lg border-left-0" placeholder="Last name"><span id="s2"></span>	
                  </div>
                </div>
                <div class="form-group">
                  <label>PhoneNumber</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="mno" class="form-control form-control-lg border-left-0" placeholder="Phone Number"><span id="s3"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" name="email" class="form-control form-control-lg border-left-0" placeholder="Email"><span id="s4"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Country</label>
					<select id="country" class="form-control" name="country">
									<option value="">Select Country</option>
									<?php
									   $country1=$link->rawQuery("select * from CountryTB where Is_Active=1");
									   foreach($country1 as $c)
									   {
									?>
									<option value="<?php echo $c['CountryID'];?>" ><?php echo $c['Country_Name']; ?></option>
									   <?php } ?>
									</select> <span id="s5"></span>
                </div>
				<div class="form-group">
                  <label>State</label>
                 <select id="state" class="form-control" name="state">
									<option value="">Select State</option>
									</select>
									<span id="s6"></span>

                </div>
				<div class="form-group">
                  <label>City</label>
                  <select id="city" class="form-control" name="city">
									<option value="">Select City</option>
									</select>
									<span id="s7"></span>
                </div>
				<div class="form-group">
                  <label>Lab Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="labname" class="form-control form-control-lg border-left-0" placeholder="Lab Name"><span id="s8"></span>
                  </div>
                </div>
				<div class="form-group">
                  <label>Lab Address</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="ladd" class="form-control form-control-lg border-left-0" placeholder="Lab Address"><span id="s9"></span>
                  </div>
                </div>
				<div class="form-group">
                  <label>LicenseID_Proof</label>
                  <div class="input-group">
                    <input type="file" name="file1" placeholder="LicenseID Proof"><span id="s10"></span>
                  </div>
                </div>
				<div class="form-group">
                  <label>Logo</label>
                  <div class="input-group">
                    <input type="file" name="file2" placeholder="Logo"><span id="s11"></span>
                  </div>
                </div>
				
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="pass" class="form-control form-control-lg border-left-0" id="pass1" placeholder="Password"><span id="s12"></span>                       
                  </div>
                </div>
				 <div class="form-group">
                  <label>Confirm Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="cpass" class="form-control form-control-lg border-left-0" id="cpass1" placeholder="Confirm Password"><span id="s13"></span>                        
                  </div>
                </div>
                <div class="mt-3">
				<input type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP" href="../../index1.php"/>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="Vendorlogin.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-3 register-half-bg d-flex flex-row" style="background-color:white;">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

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