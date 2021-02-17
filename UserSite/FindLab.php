<?php
   session_start();
   include 'connect.php'; 
  
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
	var v1 = 1;
	$.ajax({
        type: "GET",
        url: "insert.php?xid="+v1,
        success: function (data) {
		  $("#rowids").html(data);
		  
        },
        error: function () {
		  alert("errors");
        }
    });
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
	  $('#city').on('change',function(){
		   
		   var dis=$(this).val();
		   	document.getElementById("xy").value=dis;
		   if(dis)
		   {   
			   $.ajax({
				   type:'POST',
				   url:'getState.php',
				   data:'c6='+dis,
				   success:function(html){
				   $('#xy').html(html);
				   //alert();
				  // $("#x").html(data);
				   }
			   });
		   }
		   else
		   {
			  $('#xy').html('<option value="">FILTER BY CATEGORY</option>'); 
		   }
	   });
});
function fill()
{ 
	var aaa=document.getElementById("xy").value; 
	//alert(aaa);
	$.ajax({
        type: "GET",
        url: "insert.php?xid="+aaa,
        success: function (data) {
		  $("#rowids").html(data);
		  
        },
        error: function () {
		  alert("errors");
        }
    });
	//fill();
}
function feedback(d1)
{
	$.ajax({
        type: "GET",
        url: "feedback.php?dss="+d1,
        success: function (data) {
           $('#rowids1').html(data);
		   //alert("success");
		},
        error: function () {
		  alert("error");
        }
    });
}
function viewfeedback(d1)
{
	$.ajax({
        type: "GET",
        url: "feedback.php?a="+d1,
        success: function (data) {
           $('#rowids1').html(data);
		   //alert("success");
		},
        error: function () {
		  alert("error");
        }
    });
}
 
 fill();
</script>
	<body>
		<?php include 'header.php'; ?>
<div class="section white">
			<div class="inner">
				<div class="container">
		<div class="findlab">
	<div class="wraper">
	<h1>Find Center</h1>
				<header class="search-results-header">
				   <form class="forms-sample" name="form1" method="POST" action="FindLab.php">
					<div class="form-group">
						<label style="color:#0199ed;">Country</label>
						
	                    <input type="hidden" name="xy" id="xy">
						<select name="country" id="country">
							<option>---Select---</option>
							<?php
							  $country=$link->rawQuery("Select * from CountryTB where Is_Active=1");
							  foreach($country as $c)
							  {
							?>
							<option value="<?php echo $c['CountryID']; ?>"><?php echo $c['Country_Name']; ?></option>
							  <?php } ?>
						</select>
					</div> <!-- end .form-group -->
					<div class="form-group"> <!-- end .search-results-header -->
						<label style="color:#0199ed;">State</label> <!-- end .search-results -->
						<select name="state" id="state">
							<option>---Select---</option>
						</select>
					</div>
                   <div class="form-group"> <!-- end .search-results-header -->
						<label style="color:#0199ed;">City</label> <!-- end .search-results -->
						<select name="city" id="city">
							<option>---Select---</option>
						</select>
					</div>	
                   <div class="form-group">
                    <!-- <input type="submit" name="submit" value="Search" class="button">-->
                    <button type="button" name="submit" id="submit" class="button" onclick="fill();">Search</button>			
					</div>
					</form>
					<!-- end .form-group -->
				</header> <!-- end .search-results-header -->
	</div>
	<div class="clr"></div>
</div>
</div>
</div>
</div>

<div class="section light" style="margin-top:24px;">
			<div class="inner">
				<div class="container">
					<h1>Find Centre Near You</h1>
					<div class="row" id="rowids">
					      
					</div>
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div>
		<br>
		<br>
		<div class="section white" style="margin-top: -75px;">
						<div class="inner">
							<div class="container">
								<div class="row" id="rowids1">
								
								</div>
							</div>
						</div>
					</div>
		<br>
		<br>
		
<?php include 'down.php'; ?>
	</body>

</html>