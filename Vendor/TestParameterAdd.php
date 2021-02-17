<?php
include 'connect.php'; 
session_start();
if(isset($_SESSION['semail']))
   {
   if(isset($_POST['submit']))
   {
     $parameter=$_POST['parameter'];
     $unit=$_POST['unit'];
     $reference_range=$_POST['reference_range'];
     
       $q=$link->insert('TestParameterTb',Array('parameter'=>$parameter,'Unit'=>$unit,'reference_range'=>$reference_range));
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>
<script>
   function validate()
   {
     var parameter=document.form1.parameter.value;
     document.getElementById("s1").innerHTML="";
     
     if(parameter=="")
     {
       document.getElementById("s1").innerHTML="<font color='red'>Required Parameter Name</font>";
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
  <?php include 'up.php';       ?>
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
              <div class="card-body">
                  <h2 class="card-title">Parameter</h2>
                  <?php 
            if(isset($_GET['id11']))
          {
                $w=$_GET['id11'];
                        $j=$link->rawQueryOne("Select * from TestParameterTb where ID=".$_GET['id11']);
          ?>
                      <form class="forms-sample1" name="form1" action="pages/ui-features/Update.php?id2=<?php echo $w;?>" method="post" onsubmit="return(validate());">
            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Parameter</label>
                           <div class="col-sm-9">
                            <input type="text" name="parameter" class="form-control" value="<?php echo $j['parameter']; ?>"><span id="s1"></span>
                          </div>
                        </div>
                    </div>
          <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Unit</label>
                          <div class="col-sm-9">
                            <input type="text" name="unit" class="form-control" value="<?php echo $j['Unit']; ?>"><span id="s2"></span>
                          </div>
                        </div>
                    </div>
          <div class="form-group">
          <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Reference Range</label>
                          <div class="col-sm-9">
                            <input type="text" name="reference_range" class="form-control" value="<?php echo $j['reference_range']; ?>" ><span id="s3"></span>
                          </div>
                        </div>
                    </div>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
          <?php  } else
          {
            ?>
            <form class="forms-sample1" name="form1" action="TestParameterAdd.php" method="post" onsubmit="return(validate());">
            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Paramter</label>
                           <div class="col-sm-9">
                            <input type="text" name="parameter" class="form-control"><span id="s1"></span>
                          </div>
                        </div>
                    </div>
          <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Unit</label>
                          <div class="col-sm-9">
                            <input type="text" name="unit" class="form-control" ><span id="s2"></span>
                          </div>
                        </div>
                    </div>
          <div class="col-md-6">
             <div id="row">
                           
            </div>
                    </div>
          <div class="form-group">
          <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Reference range</label>
                          <div class="col-sm-9">
                            <input type="text" name="reference_range" class="form-control" ><span id="s3"></span>
                          </div>
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
        <?php include 'down.php';?>
  <!-- End custom js for this page-->
</body></html>
<?php
   }
   else
   {
     header("location:Vendorlogin.php");
   }
?>