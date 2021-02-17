<?php
 include 'connect.php';
 session_start();
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LfhsqYUAAAAALTCw3D4848PU1aXweg4qP7LjQ2f',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        ?><script>alert('Please check the security CAPTCHA box');</script><?php $err1='<font color="red">Please check the security CAPTCHA box.</font><br>';
		
    } else {
        
	 $FirstName=$_POST['FirstName'];
	 $LastName=$_POST['LastName'];
	 $Gender=$_POST['GenderId'];
	 $MobileNumber=$_POST['MobileNumber'];
	 $Email=$_POST['Email'];
	 $Address=$_POST['Address'];
	 $country=$_POST['country'];
	 $state=$_POST['state'];
	 $city=$_POST['city'];
	 $Age=$_POST['Age'];
	 $Password=$_POST['Password'];
	 $confirm=$_POST['ConfirmPassword'];
	 $j=$link->insert("UserTB",Array("First_Name"=>$FirstName,"Last_Name"=>$LastName,"Gender"=>$Gender,"Gender"=>$Gender,"Mobile_Number"=>$MobileNumber,"Email"=>$Email,"Address"=>$Address,"CountryID"=>$country,"StateID"=>$state,"CityID"=>$city,"Age"=>$Age,"Password"=>$confirm)); 
	 
	 //$x=$link->insert("UserReportTB",Array("VendorID"=>0,"TestID"=>0,"DiseaseID"=>0,"PackageID"=>0,"Collection_Date"=>0,"From_Collection_Time"=>0,"To_Collection_Time"=>0,"IsPaid"=>'Pennding',"Status"=>"initial","Is_Active"=>0,"IsUpload"=>0));
	 //$x1=$link->insert("userreortpackagetb",Array("VendorID"=>0,"PackageID"=>0,"Collection_Date"=>0,"From_Collection_Time"=>0,"To_Collection_Time"=>0,"IsPaid"=>'Pennding',"Status"=>"initial","Is_Active"=>0,"IsUpload"=>0));
	 if($j)
	 {
		if(isset($err1))
		{
		   $err1='<font color="red">Please check the security CAPTCHA box.</font><br>';
		}
		else
		{
			header("location:Login.php");
		}
	 }
     else
	 {
         header("location:Login.php");
	 }
		
    //    echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }
} else { ?>
    
<!-- FORM GOES HERE -->
<form></form>

<?php } 
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
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
function check1()
{
//	 alert(a1);
    var a1=$('#e1').val();
	
	$.ajax({
        type: "GET",
        url: "EmailCheck.php?email="+a1,
        success: function (data) {		  
		  $("#s5").html(data);
		  
		},
        error: function () {
		  alert("error");
        }
    });
}

function validate1()
{
		var a1=0;
		var a2=0;
		var a3=0;
		var a4=0;
		var a5=0;
		var a6=0;
		var a7=0;
		var a8=0;
		var a9=0;
		var a10=0;
		var a11=0;
		var a12=0;
		var a13=0;
		var a14=0;
		var a15=0;
		var a16=0;
		var a17=0;
		var a18=0;
		var a19=0;
		var a20=0;
		var name=document.form1.FirstName.value;
		var name1=document.form1.LastName.value;
		var name3=document.form1.MobileNumber.value;
		var name4=document.form1.Email.value;
		var name5=document.form1.Address.value;
		var name9=document.form1.Age.value;
		var name10=document.form1.Password.value;
		var name11=document.form1.ConfirmPassword.value;
		
		document.getElementById("s1").innerHTML="";
		document.getElementById("s2").innerHTML="";
		document.getElementById("s3").innerHTML="";
		document.getElementById("s4").innerHTML="";
		document.getElementById("s5").innerHTML="";
		document.getElementById("s6").innerHTML="";
		document.getElementById("s10").innerHTML="";
		document.getElementById("s11").innerHTML="";
		document.getElementById("s12").innerHTML="";
		pattern1=/^([a-zA-Z]|\s)*$/;
		pattern2=/^[a-zA-Z]*$/;
		pattern3=/^[9 | 8 | 7 | 6]{1}[0-9]{9}$/;
		pattern4=/^[a-zA-Z0-9]+\@gmail\.com$/;
		pattern5=/^[a-z A-Z 0-9 - ,]*$/;
		pattern6=/^[0-9]*$/;
		pattern7=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
		if(name=="")
		{
			a1=1;
		}
		else if(pattern1.test(name)==false)
		   {
			   a13=1;
		   }
		if(name1=="")
		{
			a2=1;
		}
		else if(pattern2.test(name1)==false)
		   {
			   a14=1;
		   }
		if(name3=="")
		{
			a4=1;
		}
		else if(pattern3.test(name3)==false)
		   {
			   a15=1;
		   }
		
		if(name4=="")
		{
			a5=1;
		}
		else if(pattern4.test(name4)==false)
		   {
			   a16=1;
		   }
		
		if(name5=="")
		{
			a6=1;
		}
		else if(pattern5.test(name5)==false)
		   {
			   a17=1;
		   }
		
		
		if(name9=="")
		{
			a10=1;
		}
		else if(pattern6.test(name9)==false)
		   {
			   a18=1;
		   }
		
		if(name10=="")
		{
			a11=1;
		}
		else if(pattern7.test(name10)==false)
		   {
			   a19=1;
		   }
		if(name11=="")
		{
			a12=1;
		}
		else if(name10!=name11)
	    {
	 	   a20=1;
	    }
		if(a1==1 || a2==1 || a4==1 || a5==1 || a6==1 || a10==1 || a11==1 || a12==1 || a13==1 || a14==1 || a15==1 || a16==1 || a17==1 || a18==1 || a19==1 || a20==1)
		{
			if(a1==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Required FirstName</font>";
			}
			if(a2==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Required LastName</font>";
			}
			if(a4==1)
			{
				document.getElementById("s4").innerHTML="<font color='red'>Required MobileNumber</font>";
			}
			if(a5==1)
			{
				document.getElementById("s5").innerHTML="<font color='red'>Required Email</font>";
			}
			if(a6==1)
			{
				document.getElementById("s6").innerHTML="<font color='red'>Required Address</font>";
			}
			if(a10==1)
			{
				document.getElementById("s10").innerHTML="<font color='red'>Required Age</font>";
			}
			if(a11==1)
			{
				document.getElementById("s11").innerHTML="<font color='red'>Required Password</font>";
			}
			if(a12==1)
			{
				document.getElementById("s12").innerHTML="<font color='red'>Required ConfirmPassword</font>";
			}
            if(a13==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Please Enter Correct FirstName</font>";
			}
			if(a14==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Please Enter Correct LastName</font>";
			}
			if(a15==1)
			{
				document.getElementById("s4").innerHTML="<font color='red'>Please Enter Correct MobileNumber</font>";
			}
			if(a16==1)
			{
				document.getElementById("s5").innerHTML="<font color='red'>Please Enter Correct Email</font>";
			}
			if(a17==1)
			{
				document.getElementById("s6").innerHTML="<font color='red'>Please Enter Correct Address</font>";
			}
			if(a18==1)
			{
				document.getElementById("s10").innerHTML="<font color='red'>Please Enter Correct Age</font>";
			}
			if(a19==1)
			{
				document.getElementById("s11").innerHTML="<font color='red'><span>password between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character</span></font>";
			}
			if(a20==1)
			{
				document.getElementById("s12").innerHTML="<font color='red'>Password And ConfirmPassword Not Matched</font>";
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
						<div class="col-sm-7">
							<h2>Welcome to LabCare.</h2><br><h2 align="left"></h2><h3><a href="Login.php">Back To Login</a></h3>

							<form name="form1" method="post" action="Register.php" onsubmit="return(validate1());">
							<fieldset class="white">
							<div class="form-group">
								<div class="col-sm-3">
									<label> Name </label>
								</div>
								<div class="col-sm-4">
									<input placeholder="First Name" type="text"  name="FirstName"><span id="s1"></span>	
								</div>
								<div class="col-sm-4">
									<input placeholder="Last Name" type="text"  name="LastName"><span id="s2"></span>
								</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label> Gender </label>
								</div>
								<div class="col-sm-8">
									<label class="radio-inline">
										<input type="radio" value="Male" name="GenderId" checked>
										Male
									</label>
									<label class="radio-inline">
										<input type="radio" value="Female" name="GenderId">
										Female
									</label>
									<label class="radio-inline">
										<input type="radio" value="3" name="GenderId">
										Other
									</label><span id="s3"></span>
									<span class="text-danger row col-sm-9 field-validation-valid help-inline" data-valmsg-for="GenderId" data-valmsg-replace="true">
								</span></div>
							</div>							
							<br>
							<br>
							<div class="form-group">
							<div class="col-sm-3">
								<label>Mobile Number</label>
							</div>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-4">
										<div class="input-group">
											<label class="input-group-addon">
												<i class="fa fa-plus"></i>
											</label>
											<input class="form-control" placeholder="91" type="text" value="91" name="MobileNumbercode">
										</div>
									</div>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="MobileNumber" value=""><span id="s4"></span>
									</div>
								</div>
							</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Email Address</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="Email" id="e1" onblur="check1();"><span id="s5"></span>
								</div>
     						</div>
                    		<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Address</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="Address" value=""><span id="s6"></span>
								</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label> Country </label>
								</div>
								<div class="col-sm-8">
									<select id="country" class="form-control" name="country">
									<option value="">Select Country</option>
									<?php
									   $country1=$link->rawQuery("select * from CountryTB where Is_Active=1");
									   foreach($country1 as $c)
									   {
									?>
									<option value="<?php echo $c['CountryID'];?>" ><?php echo $c['Country_Name']; ?></option>
									   <?php } ?>
									</select>
								</div>
						    </div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label> State </label>
								</div>
								<div class="col-sm-8" >
									<select id="state" class="form-control" name="state">
									<option value="">Select State</option>
									</select>
								</div>
						    </div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label> City </label>
								</div>
								<div class="col-sm-8">
									<select id="city" class="form-control" name="city">
									<option value="">Select City</option>
									
									</select>
								</div>
						    </div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Age</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="Age" value=""><span id="s10"></span>
								</div>
     						</div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Password</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="Password" name="Password" value=""><span id="s11"></span>
								</div>
     						</div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Confirm-Password</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="Password" name="ConfirmPassword" value=""><span id="s12"></span>
								</div>
     						</div>
							<br>
							<br>
							<div class="form-group">
							<div class="col-sm-12">
							<div class="g-recaptcha" data-sitekey="6LfhsqYUAAAAAKVqooaBB8Io0VGXfH1RZWZ5BEnj"></div><span id="s14"><?php if(isset($err1)){echo $err1;} ?></span>
							</div>
							</div>
							<br>
							<br>

							<div class="form-group">
							 <div class="col-sm-6">
								<input type="submit" class="button" name="submit" value="Sing Up">
							 </div>
						    </div>
							</fieldset>
							</form>
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-5">
						    <img src="images/slider2.png" alt="" class="img-responsive" draggable="false">  
						</div>
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->
			<?php include 'down.php'; ?>
</html>