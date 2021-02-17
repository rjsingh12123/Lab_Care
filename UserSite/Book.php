<?php
   include 'connect.php';
   session_start();
   
   if(isset($_GET['id1']))
   {
	   $l=$_GET['id1'];
   }
   if(isset($_POST['submit']))
   {  
	   $a=$_POST['firstname'];
	   $b=$_POST['lastname'];
	   $c=$_POST['referral1'];
	   $d=$_POST['Email'];
	   $e=$_POST['Mobile'];
	   $f=$_POST['Age'];
	   $g=$_POST['startTimeID'];
	   $h=$_POST['endTimeID'];
	   $i=$_POST['address'];
	   $j=$_POST['cdate'];
	   $k=$_POST['opt'];
	 
	   $cart=$link->rawQuery("select * from CartTB where Is_Active=1 and UserID=".$_SESSION['UserID1']);
	   $cart1=$link->rawQuery("select * from CartPackageTB where Is_Active=1 and UserID=".$_SESSION['UserID1']);
	   //$aged=$link->rawQueryOne("select Reading from AgeDiseaseTB where VendorID=".$l);
	   
	   foreach($cart as $t)
	   {
		   
		   $link->insert("UserReportTB",Array("UserID"=>$_SESSION['UserID1'],"VendorID"=>$t['VendorID'],"Visit"=>$k,"TestID"=>$t['TestID'],"DiseaseID"=>$t['DiseaseID'],"IsPaid"=>'Pennding',"Is_Active"=>1,"IsUpload"=>0,"Collection_Date"=>$j,"From_Collection_Time"=>$g,"To_Collection_Time"=>$h));
		   
		   $link->where("UserID",$_SESSION['UserID1']);
		   $aa=$link->update("UserTB",Array("First_Name"=>$a,"Last_Name"=>$b,"Gender"=>$c,"Email"=>$d,"Mobile_Number"=>$e,"Age"=>$f,"Address"=>$i));
		   
		   $link->where("UserID",$_SESSION['UserID1']);
		   $bb=$link->update("UserReportTB",Array("Collection_Date"=>$j,"From_Collection_Time"=>$g,"To_Collection_Time"=>$h));
		   
		   $link->insert("BookTB",Array("UserID"=>$_SESSION['UserID1'],"Price"=>$t['Price'],"BookTestID"=>$t['TestID'],"BookPackageID"=>0));
	   }
	   foreach($cart1 as $t)
	   {
		    $link->insert("userreportpackagetb",Array("UserID"=>$_SESSION['UserID1'],"VendorID"=>$t['VendorID'],"PackageID"=>$t['PackageID'],"Visit"=>$k,"IsPaid"=>'Pennding',"Is_Active"=>1,"IsUpload"=>0,"Collection_Date"=>$j,"From_Collection_Time"=>$g,"To_Collection_Time"=>$h));  
			
			$link->where("UserID",$_SESSION['UserID1']);
			$aa=$link->update("UserTB",Array("First_Name"=>$a,"Last_Name"=>$b,"Gender"=>$c,"Email"=>$d,"Mobile_Number"=>$e,"Age"=>$f,"Address"=>$i));

			$link->where("UserID",$_SESSION['UserID1']);
			$bb=$link->update("userreportpackagetb",Array("Collection_Date"=>$j,"From_Collection_Time"=>$g,"To_Collection_Time"=>$h));
			
			
			$link->insert("BookTB",Array("UserID"=>$_SESSION['UserID1'],"Price"=>$t['Price'],"BookTestID"=>0,"BookPackageID"=>$t['PackageID']));
	   }
	     
		 $j1=$link->rawQuery("select UserReportPackageID from userreportpackagetb where UserID=".$_SESSION['UserID1']);
		 foreach($j1 as $jk)
		 {
				$link->insert("packagereport",Array("UserReportPackageID"=>$jk['UserReortPackage']));	
		 }
		/* $us=$link->rawQueryOne("select * from PaymentTB where UserID=".$_SESSION['UserID1']);
	   header("location:Payment.php?user=".$us['UserID']);*/
	    $rt=$link->rawQueryOne("SELECT PaymentID,UserID,Total_Price,Is_Active FROM paymenttb WHERE Is_Active=1 and UserID=".$_SESSION['UserID1']);
		if($rt)
		{
	  		$link->where("UserID",$_SESSION['UserID1']);
	        $df=$link->update("paymenttb",Array('Is_Active'=>0));				
		}
		            $link->insert("paymenttb",Array('UserID'=>$_SESSION['UserID1'],'Total_Price'=>$_GET['id11']));
	     
		
	   header("location:Payment.php");
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

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		  /*alert($('#country').val());
		alert($('#state').val());
		alert($('#city').val());*/
	   $('#country').on('change',function(){
		   alert("Hello");
		   var countryid=$(this).val();
		  // document.getElementById("h").value=countryid;
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
			  $('#state').html('<option value="">---Select---</option>'); 
		   }
	   });
	   $('#state').on('change',function(){
		   var stateid=$(this).val();
		   // document.getElementById("h1").value=stateid;
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
			  $('#city').html('<option value="">---Select---</option>'); 
		   }
	   });
	   $('#city').on('change',function(){
		   var diseaseid=$(this).val();
		   		   document.getElementById("h2").value=diseaseid;
		   if(diseaseid)
		   {   
			   $.ajax({
				   type:'POST',
				   url:'getState.php',
				   data:'c2='+diseaseid,
				   success:function(html){
				   $('#Disease').html(html);
				   }
			   });
		   }
		   else
		   {
			  $('#Disease').html('<option value="">FILTER BY CATEGORY</option>'); 
		   }
	   });
	   
});
/*function validate1()
{
		var a1=0;
		var a2=0;
		var a3=0;
		var a4=0;
		var a5=0;
		var a6=0;
		var a7=0;
		var v1=document.form2.firstname.value;
		var v2=document.form2.lastname.value;
		var v3=document.form2.Email.value;
		var v4=document.form2.Mobile.value;
		var v5=document.form2.Age.value;
		var v6=document.form2.Address.value;
		var v7=document.form2.cdate.value;
		if(v1=="")
		{
			a1=1;
		}		
		if(v2=="")
		{
			a2=1;
		}
	    if(v3=="")
		{
			a3=1;
		}
		if(v4=="")
		{
			a4=1;
		}
		if(v5=="")
		{
			a5=1;
		}
		if(v6=="")
		{
			a6=1;
		}
		if(v7=="")
		{
			a7=1;
		}
		if(a1==1 || a2==1 || a3==1 || a4==1 || a5==1 || a6==1 || a7==1)
		{
			if(a1==1)
			{
				document.getElementById("s1").innerHTML="<font color='red'>Required FirstName</font>";
			}
			if(a2==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Required Last Name</font>";
			}
			if(a3==1)
			{
				document.getElementById("s3").innerHTML="<font color='red'>Required Email</font>";
			}
			if(a4==1)
			{
				document.getElementById("s4").innerHTML="<font color='red'>Required Mobile Number</font>";
			}
			if(a5==1)
			{
				document.getElementById("s5").innerHTML="<font color='red'>Required Age</font>";
			}
			if(a6==1)
			{
				document.getElementById("s6").innerHTML="<font color='red'>Required Address</font>";
			}
			if(a7==1)
			{
				document.getElementById("s7").innerHTML="<font color='red'>Required Collection Date</font>";
			}
			return false;			
		}
		return ( true );	
}*/
</script>
	<body>
	<?php include 'header.php'; ?>		
	<div class="section white">
			<div class="inner">
				<div class="container">
					<h1>Appointment</h1>
					 <!--<form class="forms-sample" name="form2" method="POST" onsubmit="validate1();"> -->
					 <form class="forms-sample" name="form2" method="POST">
					<div class="row aligned-cols">
						<div class="col-sm-4 aligned-center">
							<img src="images/slider2.png" alt="slider2" class="img-responsive bottom-image left">
						</div> <!-- end .col-sm-4 -->
						<div class="col-sm-8">
						 <?php $a=$link->rawQueryOne("select * from UserTB where Is_Active=1 and UserID=".$_SESSION['UserID1']); ?>
							<form class="form-outline">
							<div class="row">
									<div class="col-sm-1">
									</div>
									<div class="col-sm-3">
											<label>Sample Collection:</label>
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-4">
										<div class="form-group">
											<select name="opt">
											   <option value="0">Home Collection</option>
											   <option value="1">Lab Visit</option>
											</select>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-4">
										
									</div> <!-- end .col-sm-6 -->
								</div> <!-- end .row -->
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>First Name:</label>
											<input type="text" name="firstname" value="<?php echo $a['First_Name']; ?>"><span id="s1"></span>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label>Last Name:</label>
											<input type="text" name="lastname" value="<?php echo $a['Last_Name']; ?>"><span id="s2"></span>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
								</div> <!-- end .row -->
								<div class="row">
									<div class="col-sm-6">
										<div class="referral">
									<label>Gender:</label><br>
									<div class="radio">
										<label class="radio-inline">
											<input type="radio" name="referral1" value="Male" <?php if(isset($a['Gender'])){ if($a['Gender']=="Male"){ ?> checked <?php } } ?> > Male
										</label>
										<label class="radio-inline">
											<input type="radio" name="referral1" value="Female" <?php if(isset($a['Gender'])){ if($a['Gender']=="Female"){ ?> checked <?php } } ?> > Female
										</label>
									</div> <!-- end .radio -->
								</div> <!-- end .referral --> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label>Email:</label>
											<input type="email" name="Email" value="<?php echo $a['Email']; ?>"><span id="s3"></span>
										</div> <!-- end .form-group -->
									</div> 
								</div> <!-- end .row -->
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Phone Number:</label>
											<input type="text" name="Mobile" value="<?php echo $a['Mobile_Number']; ?>"><span id="s4"></span>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label>Age:</label>
											<input type="text" name="Age" value="<?php echo $a['Age']; ?>"><span id="s5"></span>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
								</div> <!-- end .row -->
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Address:</label>
											<textarea name="address"><?php echo $a['Address']; ?></textarea><span id="s6"></span>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label>Collection Date:</label>
											<input type="Date" name="cdate" required><span id="s7"></span>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
								</div> <!-- end .row -->
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Collection Time From:</label>
											 <select id="startTimeID" name="startTimeID"><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option></select>&nbsp;&nbsp;
                                             <input type="hidden" id="hiddenstartTimeID" name="CollectionStartTimeId" value="0">
                       
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
									<div class="col-sm-6">
										<div class="form-group">
											<label>Collection Time To:</label>
											 <select id="endTimeID" name="endTimeID" ><option value="08:30 AM">08:30 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="08:00 PM">08:00 PM</option></select>
                                             <input type="hidden" id="hiddenendTimeID" name="CollectionEndTimeId" value="0">
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
								</div> <!-- end .row -->
								<input type="submit" name="submit" value="Submit Now" class="button">
								
							<!-- 	<button name="submit">Submit Now</button>-->
							</form>
						</div> 
						<?php // } ?><!-- end .col-sm-8 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
				</form>
			</div> <!-- end .inner -->
		</div> <!-- end .section --><br><br>

		<?php include 'down.php'; ?>
</html>