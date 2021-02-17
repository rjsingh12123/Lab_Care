<?php
include 'connect.php'; 
 session_start();
   $j=$link->rawQuery("Select * from StateTB where Is_Active=1");

if(isset($_SESSION['Aid']))
{   
  /* if(isset($_POST['submit']))
   {
	   echo "Hello";
	   $n=$_POST['cname'];
	   $cn=$_POST['coname'];
	   $q=$link->insert('CityTB',Array('StateID'=>$cn,'City_Name'=>$n));
	   header("location:CityDisplay.php");
   }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>
function check()
{
    document.getElementById("s1").innerHTML="";
    var b=$("#st1").val();
    var a=$('#c1').val();
	$.ajax({
        type: "GET",
        url: "check.php?xy2="+a+"&city="+b,
        success: function (data){		  
		  $("#s2").html(data);
		},
        error: function () {
		  alert("error");
        }
    });
}
   function validate()
   {
	   var a1=0;
	   var a3=0;
	   var a2=0;
	   var name=document.form1.coname.value;
	   var name1=document.form1.cname.value;
	   document.getElementById("s1").innerHTML="";
	   document.getElementById("s2").innerHTML="";	    
	   pattern1=/^([a-zA-Z]|\s)*$/;
	   if(name=="")
	   {
		   a1=1;
	   }
	   if(name1=="")
	   {
		   a2=1;
	   }
	   else if(pattern1.test(name1)==false)
	   {
		   a3=1;
	   }
	   if(a1==1 || a2==1 || a3==1)
	   {
		   if(a1==1)
		   {
			   document.getElementById("s1").innerHTML="<font color='red'>Required State</font>";
		   }
		   if(a2==1)
		   {
			   document.getElementById("s2").innerHTML="<font color='red'>Required City</font>";
		   }
           if(a3==1)
		   {
			   document.getElementById("s2").innerHTML="<font color='red'>Please Enter correct City</font>";
		   }		   
		   return false;
	   }
	   return ( true );
   }
</script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>LabCare</title>
<link rel="shortcut icon" href="images/favicon.ico"/>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  
</head>

<body>

  <?php
    include 'up.php';
  ?>     
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">City</h2>
				  <?php if(isset($_GET["id2"]))	
				  {
					  $a=$_GET["id2"];
					  $b=$link->rawQueryOne("select c.*,s.* from CityTB c,StateTB s where s.StateID=c.StateID and c.CityID=".$a);
					  
					  ?>
					  <form class="forms-sample1" name="form1" action="Update.php?id2=<?php echo $a; ?>" method="post" onsubmit="return(validate());">
				   <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">StateName</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="coname">
							<option value="">-----select-----</option>
                              <?php  foreach($j as $e) { ?>
					     <option value="<?php echo $e['StateID'];?>" <?php if(isset($a)) { if($e['StateID']==$b["StateID"]) { ?>selected<?php } } ?> ><?php echo $e['State_Name'];?></option>
						 <?php } ?>
                            </select><span id="s1"></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">CityName</label>
                          <div class="col-sm-9">
                            <input type="text" name="cname" class="form-control" value="<?php echo $b["City_Name"]; ?>"><span id="s2"></span>
                          </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
				  <?php }else
				  {?>
                  
                  <form class="forms-sample1" name="form1" action="CityInsert.php" method="post" onsubmit="return(validate());">
				   <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">StateName</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="coname" id="st1">
							 <option value="" selected>----select----</option>
                              <?php  foreach($j as $e) { ?>
					     <option value="<?php echo $e['StateID'];?>"><?php echo $e['State_Name'];?></option>
						 <?php } ?>
                            </select><span id="s1"></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">CityName</label>
                          <div class="col-sm-9">
                            <input type="text" name="cname" onblur="check();" id="c1" class="form-control"><span id="s2"></span>
                          </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Save" class="btn btn-primary mr-2">
                  </form>
				  <?php } ?>
                </div>
              </div>
            </div>
			</div>
        </div>
		
        <!-- content-wrapper ends -->
<?php
  include 'down.php';
?>
</body>
</html>
<?php
   
   }
   else
   {	   
       header("location:login.php"); 
   }
?>