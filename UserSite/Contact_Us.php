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
	 $MobileNumber=$_POST['MobileNumber'];
	 $Email=$_POST['Email'];
	 $Address=$_POST['Address'];
	// $country=$_POST['country'];
	 //$state=$_POST['state'];
	 $city=$_POST['city'];
	 $Query_Type=$_POST['Query_Type'];
	 $Write_Your_Query=$_POST['Write_Your_Query'];
	 
	 $j=$link->insert("contactus",Array("FirstName"=>$FirstName,"LastName"=>$LastName,"Mobile_Number"=>$MobileNumber,"EmailID"=>$Email,"Address"=>$Address,"CityID"=>$city,"Query_Type"=>$Query_Type,"Write_Your_Query"=>$Write_Your_Query)); 
	 
	 if($j)
	 {

		 header("location:ContactUsEmail.php?id=".$j);
	 }
     else
	 {
         header("location:Contact_Us.php");
	 }		 
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
		<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- Simple-Line-Icons-Webfont -->
		<link href="fonts/Simple-Line-Icons-Webfont/simple-line-icons.css" rel="stylesheet">
		<!-- FlexSlider -->
		<link href="scripts/FlexSlider/flexslider.css" rel="stylesheet">
		<!-- Owl Carousel -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.default.css" rel="stylesheet">
		<!-- noUiSlider -->
		<link href="css/jquery.nouislider.min.css" rel="stylesheet">
		<!-- Style.css -->
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/color.html" id="color-switcher">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

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
		var name2=document.form1.MobileNumber.value;
		var name3=document.form1.Email.value;
		var name4=document.form1.country.value;
		var name5=document.form1.state.value;
		var name6=document.form1.city.value;
		var name7=document.form1.Query_Type.value;
		var name8=document.form1.Address.value;
		var name9=document.form1.Write_Your_Query.value;
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
        pattern1=/^([a-zA-Z]|\s)*$/;
        pattern2=/^([a-zA-Z]|\s)*$/;
		pattern3=/^[9 | 8 | 7 | 6]{1}[0-9]{9}$/;
		//pattern4=/^[a-zA-Z0-9]+\@gmail\.com$/;
		pattern4=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		pattern5=/^[a-zA-Z]*$/;
		pattern6=/^([a-zA-Z]|\s)*$/;;
		pattern7=/^[a-z A-Z 0-9 @]*$/;
		pattern8=/^([a-zA-Z]|\s)*$/;
		if(name=="")
		{
			a1=1;
		}else if(pattern1.test(name)==false)
		   {
			   a11=1;
		   }

		if(name1=="")
		{
			a2=1;
		}else if(pattern2.test(name1)==false)
		   {
			   a12=1;
		   }
		if(name2=="")
		{
			a3=1;
		}else if(pattern3.test(name2)==false)
		   {
			   a13=1;
		   }
		
		if(name3=="")
		{
			a4=1;
		}
		else if(pattern4.test(name3)==false)
		   {
			   a14=1;
		   }
		if(name4=="")
		{
			a5=1;
		}
		if(name5=="")
		{
			a6=1;
		}
		if(name6=="")
		{
			a7=1;
		}
		if(name7=="")
		{
			a8=1;
		}else if(pattern5.test(name7)==false)
		   {
			   a15=1;
		   }
		if(name8=="")
		{
			a9=1;
		}else if(pattern1.test(name8)==false)
		   {
			   a16=1;
		   }
		if(name9=="")
		{
			a10=1;
		}else if(pattern1.test(name9)==false)
		   {
			   a17=1;
		   }
		if(a1==1 || a2==1 || a3==1 || a4==1 || a5==1 || a6==1 || a7==1 || a8==1 || a9==1 || a10==1 || a11==1 || a12==1 || a13==1 || a14==1 || a15==1 || a16==1 || a17==1)
		{
			if(a1==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Required FirstName</font>";
			}
			if(a2==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Required LastName</font>";
			}
			if(a3==1)
			{
				document.getElementById("s3").innerHTML="<font color='red'>Required MobileNumber</font>";
			}
			if(a4==1)
			{
				document.getElementById("s4").innerHTML="<font color='red'>Required Email</font>";
			}
			if(a5==1)
			{
				document.getElementById("s5").innerHTML="<font color='red'>Required Country</font>";
			}
			if(a6==1)
			{
				document.getElementById("s6").innerHTML="<font color='red'>Required State</font>";
			}
			if(a7==1)
			{
				document.getElementById("s7").innerHTML="<font color='red'>Required City</font>";
			}
			if(a8==1)
			{
				document.getElementById("s8").innerHTML="<font color='red'>Required Query_Type</font>";
			}
			if(a9==1)
			{
				document.getElementById("s9").innerHTML="<font color='red'>Required Address</font>";
			}
			if(a10==1)
			{
				document.getElementById("s10").innerHTML="<font color='red'>Required Write_Your_Query</font>";
			}
			if(a11==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Please Enter Correct FirstName</font>";
			}
			if(a12==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Please Enter Correct LastName</font>";
			}
			if(a13==1)
			{
				document.getElementById("s3").innerHTML="<font color='red'>Please Enter Correct MobileNumber</font>";
			}
			if(a14==1)
			{
				document.getElementById("s4").innerHTML="<font color='red'>Please Enter Correct Email</font>";
			}
			if(a15==1)
			{
				document.getElementById("s8").innerHTML="<font color='red'>Please Enter Correct Query_Type</font>";
			}
			if(a16==1)
			{
				document.getElementById("s9").innerHTML="<font color='red'>Please Enter Correct Address</font>";
			}
			if(a17==1)
			{
				document.getElementById("s10").innerHTML="<font color='red'>Please Enter Correct Write_Your_Query</font>";
			}
			return false;   			
		}
		return ( true );
}

  </script>
	<body>
	<?php include 'header.php'; ?>
		<div class="responsive-menu">
			<a href="#" class="responsive-menu-close"><i class="fa fa-times"></i></a>
			<nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
		</div> <!-- end .responsive-menu -->
		<div class="section white">
			<div class="inner">
				<div class="container">
					<div class="row aligned-cols">
						<div class="col-sm-7">
							<h2>Get in touch with us by filling the details below</h2>
							<form name="form1" method="post" onsubmit="return(validate1());">
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
										<input class="form-control" type="text" name="MobileNumber" value=""><span id="s3"></span>
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
									<input class="form-control" type="text" name="Email" value=""><span id="s4"></span>
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
									</select><span id="s5"></span>
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
									</select><span id="s6"></span>
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
									
									</select><span id="s7"></span>
								</div>
						    </div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Query Type</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="Query_Type" value=""><span id="s8"></span>
								</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Address</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="Address" value=""><span id="s9"></span>
								</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Write Your Query</label>
								</div>
								<div class="col-sm-8">
									<textarea name="Write_Your_Query"></textarea></span><span id="s10"></span>
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
								<input type="submit" class="button" name="submit" value="Submit">
							</div>
						    </div>
							</fieldset>
							</form>
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-5">
						<img src="images/slider2.png" alt="" class="img-responsive" draggable="false">
						</div>
						 <!-- end .col-sm-4 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

		

		
<div class="section white small">
			<div class="inner">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="contacts">
								<div class="icon"><i class="fa fa-map-marker"></i></div>
								<h4>Address</h4>
								<p>At. Sabargam, Post. Niyol, Taluka. Choryasi, Dist-Surat-394325.Gujarat State.India</p>
							</div> <!-- end .contacts -->
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3">
							<div class="contacts">
								<div class="icon"><i class="fa fa-phone"></i></div>
								<h4>phone numbers</h4>
								<p><b>Phone:</b>(+91) 89800 04848</p>
							</div> <!-- end .contacts -->
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3">
							<div class="contacts">
								<div class="icon"><i class="fa fa-clock-o"></i></div>
								<h4>working hours</h4>
								<p><b>Monday - Friday:</b> 7:00am - 10:00pm<br><b>Saturday -Sunday:</b> 10:00am - 8:00pm</p>
							</div> <!-- end .contacts -->
						</div> <!-- end .col-sm-3 -->
						<div class="col-sm-3">
							<div class="contacts">
								<div class="icon"><i class="fa fa-paper-plane-o"></i></div>
								<h4>keep in touch</h4>
								<p>We are happy to answer your questions at <b>ambaba_college@yahoo.co.in</b></p>
							</div> <!-- end .contacts -->
						</div> <!-- end .col-sm-3 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div>
		
		
		<?php include 'down.php'; ?>
</html>