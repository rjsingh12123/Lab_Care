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
        url: "PackagesView.php?xid="+aaa,
        success: function (data) {
		  $("#rowids").html(data);
        },
        error: function () {
		  alert("errors");
        }
    });
	//fill();
}
</script>
	<body>
		<?php include 'header.php'; ?>
			<div class="section white">
			<div class="inner">
			<div class="container">
			<div class="findlab">
				<div class="wraper">
				<h1 class="mainhd">Find Package</h1>
				<header class="search-results-header">
				   <form class="forms-sample" name="form1" method="POST" action="Package.php">
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
                    <!-- <input type="submit" name="submit" value="Search" class="button" onclick="fill();">		-->				
                    <?php // if(isset($_POST['city'])) { ?>
                    <button type="button" name="submit" id="submit" class="button" onclick="fill();">Search</button>	
					<?php // } ?>
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

<div class="section white">
			<div class="inner">
				<div class="container">
					<div class="row" name="rowids1" id="rowids">
					
					</div>
					<?php if(!isset($_POST['submit'])){  ?>
					<h1>Popular Package</h1>
					<div class="row">
					<?php
							//$p=$link->rawQuery("select p.*,v.* from PackageTB p,VendorTB v where p.Is_Active=1 and p.VendorID=v.VendorID group by v.FirstName");
							//$d=$link->rawQuery("select FirstName from VendorTB group by FirstName");
							//foreach($d as $pd){
							$p=$link->rawQuery("select p.*,v.* from PackageTB p,VendorTB v where p.Is_Active=1 and p.VendorID=v.VendorID Group By FirstName limit 3");
							?>  <?php
							$o=0; 
							
							foreach($p as $r)
							{  $o++;				
							?>	

							<div class="col-md-4">
						
							<div class="blog-post">
								<div class="blog-post-meta">
									<div class="number"><?php echo ".0".$o; ?></div>
									<div class="blog-post-image"><a href="#"><img src="../Vendor/images/<?php echo $r['Lab_Logo'];?>" alt="blog post image" class="img-responsive" style="height:215px;"></a></div>
									<h3><a href="#"><?php echo $r['Lab_Name'] ; ?></a></h3>
									<ul class="list-inline">
										
										<li><a href="#"><i class="fa fa-user"></i> </i><?php echo $r['FirstName']." ".$r['LastName']; ?> </a></li>
										
										
									</ul>
								</div> <!-- end .blog-post-meta -->
								<p><?php echo $r['Lab_Address']." "; ?> </p>
								<?php
								 //   $t=$link->rawQueryOne("select CityID from VendorTB where VendorID=".$r['VendorID']);
								?>
								<a href="ViewPackage.php?cid=<?php echo $r['CityID'];?>&vid=<?php echo $r['VendorID'];?>" class="text-button">View Package</a>
							</div> <!-- end .blog-post -->
						</div>
					
							<?php  } //} ?>
					</div>
					<?php } ?>
					<!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div>	
		<?php include 'down.php'; ?>
	</body>
</html>