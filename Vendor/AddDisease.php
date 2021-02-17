<?php
  session_start();
  include 'connect.php';
    if(isset($_SESSION['semail']))
   {
  if(isset($_POST["submit"]))
  {
	   $dn=$_POST["dname"];
	   $d=$_POST["description"];
       $j=$link->insert("diseasecategorytb",Array("Disease_Name"=>$dn,"Description"=>$d,"VendorID"=>$_SESSION['vid']));   
  }
?>
<!DOCTYPE html>
<html lang="en">
head>
<script>
   function validate()
   {
	   var a1=0;
	   var a3=0;
	   var name=document.form1.dname.value;
	   document.getElementById("s1").innerHTML="";
	   pattern1=/^[a-zA-Z]*$/;
	   if(name=="")
	   {
		   a1=1;
	   }
	   else if(pattern1.test(name1)==false)
	   {
		   a3=1;
	   }
	   if(a1==1 || a3==1)
	   {
		   if(a1==1)
		   {
			   document.getElementById("s1").innerHTML="<font color='red'>Required Disease Name</font>";
		   }
           if(a3==1)
		   {
			   document.getElementById("s1").innerHTML="<font color='red'>Please Enter correct Disease Name</font>";
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
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>

<body>
  <?php include 'up.php';        ?>
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
               <div class="card-body">
                  <h2 class="card-title">Disease</h2>
                  <?php  
				      if(isset($_GET['id5']))
					  {
						$w=$_GET['id5'];
				        $d=$link->rawQueryOne("select * from diseasecategorytb where DiseaseID=".$w);
						  ?>
				  <form class="forms-sample" name="form1" method="POST" action="pages/ui-features/Update.php?id5=<?php echo $w;?>" onsubmit="return(validate());">
                    <div class="form-group">
                      <label for="exampleInputName1">Disease Name</label>
                      <input type="text" name="dname" class="form-control" id="exampleInputName1" value="<?php echo $d['Disease_Name']; ?>" placeholder="Name"><span id="s1"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1"  rows="4"><?php echo $d['Description']; ?></textarea>
                    </div>
					<input type="submit" class="btn btn-primary mr-2" name="submit" value="Update" href="AddDisease.php">
                    <button class="btn btn-light">Cancel</button>
                  </form>
				  <?php } else { ?>
				  <form class="forms-sample" name="form1" method="POST" action="AddDisease.php" onsubmit="return(validate());">
                    <div class="form-group">
                      <label for="exampleInputName1">Disease Name</label>
                      <input type="text" name="dname" class="form-control" id="exampleInputName1" placeholder="Name"><span id="s1"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                    </div>
					<input type="submit" class="btn btn-primary mr-2" name="submit" value="ADD" href="AddDisease.php">
                    <button class="btn btn-light">Cancel</button>
                  </form>
				  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include 'down.php';?>
</body>
</html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>