<?php
    session_start();
    include 'connect.php';
	if(isset($_POST['submit1']))
	{
		$link->insert("CartTB",Array("DiseaseID"=>$_GET['id'],"TestID"=>$_GET['id1'],"UserID"=>$_SESSION['UserID1']));
	}
	if(isset($_GET['id']))
	{
		$b=$link->rawQueryOne("SELECT v.*,c.City_Name FROM VendorTB v,CityTB c WHERE v.CityID=c.CityID and v.VendorID=".$_GET['id']);
		if($b['Is_Active'] == 0)
		{
		  $link->where("VendorID",$_GET['id']);
		  $j=$link->update("VendorTB",Array("Is_Active"=>1));
		  header("location:VendorDisplay.php");
		}
		else
		{
		  $link->where("VendorID",$_GET['id']);
		  $j=$link->update("VendorTB",Array("Is_Active"=>0));
		  header("location:VendorDisplay.php");
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
		/*	var disease_id=$(this).attr("id");
			alert(disease_id);
			
			$.ajax({
				   method:'GET',
				   url:'Description.php?d='+disease_id,
				   success:function(data){
				   $('#Disease_Details1').html(data);
				 
				   }
			   });*/
		
		  /*alert($('#country').val());
		alert($('#state').val());
		alert($('#city').val());
		 var countryid=$("#country").val();
		   
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
		   
		   var stateid=$("#state").val();
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
		   
			 var diseaseid=$("#city").val();
		   	//	   document.getElementById("h2").value=diseaseid;
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

		  var diseaseid1=$("#Disease").val();
	//document.getElementById("x").value=diseaseid1;
      if(diseaseid1)
		   {   
			   $.ajax({
				   type:'POST',
				   url:'getState.php',
				   data:'c4='+diseaseid1,
				   success:function(html){
				   $('#x').html(data);
				  // $("#x").html(data);
				   }
			   });
		   }
		   else
		   {
			  $('#x').html('category'); 
		   }
		
		*/
	   $('#country').on('change',function(){
		   var countryid=$(this).val();
		   document.getElementById("h").value=countryid;
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
		    document.getElementById("h1").value=stateid;
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
		   
		   var Cityid=$(this).val();
		   		   document.getElementById("h2").value=Cityid;
		   
		   if(Cityid)
		   {   
			   $.ajax({
				   type:'POST',
				   url:'getState.php',
				   data:'c2='+Cityid,
				   success:function(html){
				   $('#Disease').html(html);
				   
				  // $("#x").html(data);
				   }
			   });
		   }
		   else
		   {
			  $('#Disease').html('<option value="">FILTER BY CATEGORY</option>'); 
		   }
	   });
	   	   

	   $('#Disease').on('change',function(){
		var diseaseid1=$(this).val();
		document.getElementById("x").value=diseaseid1;
      if(diseaseid1)
		   {   
			   $.ajax({
				   type:'POST',
				   url:'getState.php',
				   data:'c4='+diseaseid1,
				   success:function(data){
				   $('#x').html(data);
				  // $("#x").html(data);
				   }
			   });
		   }
		   else
		   {
			  $('#x').html('category'); 
		   }
     });
        
});	
function fill()
{
	var aaa=document.getElementById("x").value; 
	$.ajax({
        type: "GET",
        url: "insert.php?id="+aaa,
        success: function (data) {
		  $("#rowids").html(data);
        },
        error: function () {
		  alert("error");
        }
    });
}
function AddCart(dh1,th1,pr1,v1)
{
	$.ajax({
        type: "GET",
        url: "insert.php?did1="+dh1+"&tid1="+th1+"&price="+pr1+"&vendor="+v1,
        success: function (data) {
		CartCounts();
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
	    <input type="hidden" id="x">
		<div class="section white">
			<div class="inner">
				<div class="container">
		<div class="search-bar clearfix">
			<h1 class="mainhd">Find Book A Test</h1>
			  
			<header class="search-results-header">
	   <form class="forms-sample" name="form1" method="POST" action="BookTest.php">
	   
		<div class="form-group">
			<label style="float: left; color:#0199ed;">Country</label>
			<select name="country1" id="country">
				<option value="">---Select---</option>
				<?php
				  $country=$link->rawQuery("Select * from CountryTB where Is_Active=1");
				  foreach($country as $c)
				  {
				?>
				  <option value="<?php echo $c['CountryID'];?>" <?php if(isset($_POST['country1'])){ if($_POST['country1']==$c['CountryID']){?>selected<?php } }  ?> ><?php echo $c['Country_Name']; ?></option><?php } ?>
				 <input type="hidden" name="h1" id="h">
			</select>
		</div> <!-- end .form-group -->
		<div class="form-group"> <!-- end .search-results-header -->
			<label style="float: left; color:#0199ed;">State</label> <!-- end .search-results -->
 			<select name="state1" id="state" >
                 <option value="">---Select---</option>
				
				<input type="hidden" name="h1" id="h1">
			</select>
		</div>
	   <div class="form-group"> <!-- end .search-results-header -->
			<label style="float: left; color:#0199ed;">City</label> <!-- end .search-results -->
			<select name="city1" id="city">
		        <option value="">---Select---</option>
				
				<input type="hidden" name="h2" id="h2">
				<!--<input type="text" name="h3" id="h3">-->
			</select>
		</div>	
		
		<!-- end .form-group -->
	</header>
	<div class="clr"></div>
  </div>
  </div>
  </div>
  </div>
	<div class="section white">
			<div class="inner">
				<div class="container">  	
	<div class="search-results-table">	
	 <header class="search-results-table-header" style="background:#E3ECF3;">
			<div class="row">
				<div class="col-sm-3">
					<select name="Disease1" id="Disease">
				     <option value="">FILTER BY CATEGORY</option><?php // } ?>
					</select>
				</div> <!-- end .col-sm-4 -->
				<div class="col-sm-3">
				
     				 <!-- <input type="submit" name="submit" id="submit" value="Search" class="button" onclick="fill();">	-->	
                   <button type="button" name="submit" id="submit" class="button" onclick="fill();">Search</button>				
				
				</div> <!-- end .col-sm-4 -->
				<div class="col-sm-4">
				</div>
				<div class="col-sm-2">				
				</div>

			</div>   
			</div> <!-- end .col-sm-4  end .row end .row -->
		</header> <!-- end .search-results-table-header -->
		
		<div class="search-results-table-content" style="background-color: #edf8ff !important;">
			<div class="search-result">
			     <div id="rowids">
					 <!-- end .col-sm-4 -->
				
				    <br>
				</div>
			</div> <!-- end .search-result -->
			 <!-- end .search-result -->
		</div> <!-- end .search-results-table-content -->
	 </form>
	</div>
	</div>
	</div>
	</div>
	
	
<div id="testResult" class="form-group" style="display: block;">
    


</div>

<div id="modalTestPopupId" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h4 class="modal-title" id="lblTestName"></h4>
            </div>
            <div class="modal-body">
                <div id="divTestDetails">
                    <b>TEST INFORMATION:</b> <br>
                    <span id="lblTestDescription"></span>
                </div>
                <div class="text-center">
                    <span class="hidden" id="spnNoDescription">Description not available</span>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>

                	<?php include 'down.php'; ?>
</html>