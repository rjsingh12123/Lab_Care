<?php
include 'connect.php'; 
session_start();
if(isset($_SESSION['Aid']))
{
   $j=$link->rawQuery("Select * from CountryTB where Is_Active=1");
  /* 
   if(isset($_POST['submit']))
   {
	   //echo "Hello";
	   $n=$_POST['sname'];
	   $cn=$_POST['coname'];
	   $q=$link->insert('StateTB',Array('CountryID'=>$cn,'State_Name'=>$n));
	   header("location:StateDisplay.php");
   }
      if(isset($_POST['submit']))
	  {
		$q=$link->insert('StateTB',Array('CountryID'=>$cn,'State_Name'=>$n));
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
        url: "check.php?xy1="+a+"&state="+b,
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
		var name=document.form1.coname.value;
		var name1=document.form1.sname.value;
		document.getElementById("s1").innerHTML="";
		document.getElementById("s2").innerHTML="";
		//	var pattern1=/^[a-zA-Z]$/;
		var a1=0;
		var a2=0;
		var a3=0;
		var pattern1=/^[a-zA-Z]*$/;
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
				document.getElementById("s1").innerHTML="<font color='red'>Required Country</font>";
			}
			if(a2==1)
			{
				document.getElementById("s2").innerHTML="<font color='red'>Required State</font>";		
			}
			if(a3==1)
			{
			    document.getElementById("s2").innerHTML="<font color='red'>Please Enter correct State Name</font>";	
			}
		    return false;
		}
		
		
		/*if(name1!="")
		{
			document.getElementById("s2").innerHTML="<font color='red'>Required State</font>";
			
			return false;
			document.getElementById("s2").innerHTML="";
			
		}
		
		if(name!="")
		{
			document.getElementById("s1").innerHTML="<font color='red'>Required Country</font>";
			return false;
		}
		
		 if(pattern1.test(name)==false)
			   {
				document.getElementById("s2").innerHTML="<font color='red'>Please Enter correct State Name</font>";
				return false;
		      }
			*/
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
                  <h2 class="card-title">State</h2>
                  
				  <?php if(isset($_GET["id1"]))
				  {
					$a=$_GET["id1"];
					$b=$link->rawQueryOne("SELECT s.*,c.* FROM Statetb s,Countrytb c WHERE c.CountryID=s.CountryID and StateID=".$a);
				  ?> 
				  
                  <form class="forms-sample1" name="form1" action="Update.php?id1=<?php echo $a; ?>" method="post" onsubmit="return(validate());">
				   <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">CountryName</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="coname">
							<option value="">-----select-----</option>
                              <?php  foreach($j as $e) { ?>
					     <option value="<?php echo $e['CountryID'];?>" <?php if(isset($_GET["id1"])){ if($e['CountryID']==$b["CountryID"]){ ?> selected <?php }  } ?> ><?php echo $e['Country_Name'];?></option>
						 <?php } ?>
                            </select><span id="s1"></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">StateName</label>
                          <div class="col-sm-9">
                            <input type="text" name="sname" class="form-control" value="<?php echo $b["State_Name"]; ?>"><span id="s2"></span>
                          </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
				  <?php }else{
					  ?>
                 <form name="form1" class="forms-sample1" action="StateInsert.php" method="post" onsubmit="return(validate());">
				   <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">CountryName</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="coname" id="st1">
							<option value="" selected>-----select-----</option>
                              <?php  foreach($j as $e) { ?>
					     <option value="<?php echo $e['CountryID'];?>"><?php echo $e['Country_Name'];?></option>
						 <?php } ?>
                            </select><span id="s1"></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">StateName</label>
                          <div class="col-sm-9">
                            <input type="text" name="sname" class="form-control" onblur="check();" id="c1"><span id="s2"></span>
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