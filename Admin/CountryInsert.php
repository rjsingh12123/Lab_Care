<?php
include 'connect.php'; 
session_start();
if(isset($_SESSION['Aid']))
{
/*   if(isset($_POST['submit']))
   {
	   $n=$_POST['ciname'];
       $q=$link->insert('CountryTB',Array('Country_Name'=>$n));
	   header("location:CountryDisplay.php");
   }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>
function validate()
{
	var v1=0,v2=0;
	var name=document.form1.ciname.value;
	document.getElementById("s1").innerHTML="";
	if(name == "")
	{
	    document.getElementById("s1").innerHTML="<font color='red'> Required Country Name</font>";
	    return false;
	}
	else
	{
		var pattern2=/^[a-zA-Z]+$/;
		var mystr=document.form1.ciname.value;
		if(pattern2.test(mystr)==false)
		{
			document.getElementById("s1").innerHTML="<font color='red'>Please Enter correct Country Name</font>";
			return false;
		}
	}
	return ( true );
}
function check()
{
    document.getElementById("s1").innerHTML="";
    var a=$('#c1').val();
	$.ajax({
        type: "GET",
        url: "check.php?xy="+a,
        success: function (data){		  
		  $("#s1").html(data);
		},
        error: function () {
		  alert("error");
        }
    });
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
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="http://www.urbanui.com/">
  <!-- End plugin css for this page -->
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
                  <h2 class="card-title">Country</h2>
                  <?php 
				    if(isset($_GET['id']))
					{
				        $w=$_GET['id'];
	                    $p=$link->rawQueryOne("Select * from CountryTB where CountryID=".$w);
				  ?>
                  <form class="forms-sample1" name="form1" action="Update.php?id=<?php echo $w;?>" method="post" onsubmit="return(validate());">
				    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">CountryName</label>
                          <div class="col-sm-9">
                            <input type="text" name="ciname" class="form-control" onblur="check();" id="c1" value="<?php echo $p["Country_Name"];?>"><span id="s1"></span>
                          </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
					<?php  } else
					{
						?>
						<form class="forms-sample1" name="form1" action="CountryInsert.php" method="post" onsubmit="return(validate());">
				    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">CountryName</label> 
                          <div class="col-sm-9">
                            <input type="text" name="ciname" id="c1" onblur="check();" class="form-control"><span id="s1"></span>
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
       header("location: login.php"); 
   }
?>