<?php
   include 'connect.php';
   session_start();
   
if(isset($_SESSION['UserID1']))
{
	
   if(isset($_POST['submit']))
   {  
	    $FirstName=$_POST['FirstName'];
	 $LastName=$_POST['LastName'];
	 if ($_POST['referral']==1) {
		 $Gender="Male";
	 }else{
		 $Gender="Female";
	 }
	 $MobileNumber=$_POST['MobileNumber'];
	 $Email=$_POST['Email'];
	 $Address=$_POST['Address'];
	 $Age=$_POST['Age'];
	 $link->where("UserID",$_SESSION['UserID1']);
	 $j=$link->update("UserTB",Array("First_Name"=>$FirstName,"Last_Name"=>$LastName,"Gender"=>$Gender,"Mobile_Number"=>$MobileNumber,"Email"=>$Email,"Address"=>$Address,"Age"=>$Age)); 
	 
	 if($j)
	 {
		 header("location:index.php");
	 }
     else
	 {
         header("location:EditProfile.php");
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		  /*alert($('#country').val());
		alert($('#state').val());
		alert($('#city').val());*/
	   $('#country').on('change',function(){
		  
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
</script>
	<body>
			<?php include 'header.php'; ?>
			<div class="section white">
			<div class="inner">
				<div class="container">
					<h1>My Profile</h1>
					<?php $user=$link->rawQueryOne("select * from UserTB where UserID=".$_SESSION['UserID1']); ?>
					 <form name="form1" method="post" action="EditProfile.php">
							<fieldset class="white">
							<div class="form-group">
								<div class="col-sm-3">
									<label> Name </label>
								</div>
								<div class="col-sm-4">
									<input placeholder="First Name" type="text"  name="FirstName" value="<?php echo $user['First_Name']; ?>"><span id="s1"></span>	
								</div>
								<div class="col-sm-4">
									<input placeholder="Last Name" type="text"  name="LastName" value="<?php echo $user['Last_Name']; ?>"><span id="s2"></span>
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
											<input type="radio" name="referral" value="1" <?php if(isset($user['Gender'])){ if($user['Gender']=="Male"){ ?> checked <?php } } ?> > Male
										</label>
										<label class="radio-inline">
											<input type="radio" name="referral" value="2" <?php if(isset($user['Gender'])){ if($user['Gender']=="Female"){ ?> checked <?php } } ?> > Female
										</label></div>
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
										<input class="form-control" type="text" name="MobileNumber" value="<?php echo $user['Mobile_Number']; ?>"><span id="s4"></span>
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
									<input class="form-control" type="text" name="Email" value="<?php echo $user['Email']; ?>"><span id="s5"></span>
								</div>
     						</div>
                    		<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Address</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="Address" value="<?php echo $user['Address']; ?>"><span id="s6"></span>
								</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<div class="col-sm-3">
									<label>Age</label>
								</div>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="Age" value="<?php echo $user['Age']; ?>"><span id="s10"></span>
								</div>
     						</div>

							<br>
							<br>
							<div class="form-group">
							 <div class="col-sm-6">
								<input type="submit" class="button" name="submit" value="Save">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 </div>
						    </div>
							
							
							</fieldset>
							</form>
						</div> 
						<?php // } ?><!-- end .col-sm-8 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
				</form>
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

		

	<?php include 'down.php'; ?>
	</body>

</html>
<?php
    }
else
{
	header("location:Login.php");
}	
?>