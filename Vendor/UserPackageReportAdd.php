<?php
include 'connect.php'; 
session_start();
if(isset($_SESSION['semail']))
   {

$package=$link->rawQueryOne("SELECT up.*, u1.First_Name,u1.Last_Name FROM userreportpackagetb up , UserTB u1 where u1.UserID=up.UserID and up.UserReportPackageID=".$_GET['id']);


    $package_test=$link->rawQuery("SELECT up.UserReportPackageID,t.Test_Name,t.TestID FROM userreportpackagetb up, TestTB t , package_test_matchtb ptm where  t.TestID=ptm.package_test_id and ptm.package_id = up.PackageID and up.UserReportPackageID=".$package['UserReportPackageID']);      

        if(isset($_POST["submit"]))
        {

          foreach ($package_test as $test ) {
            $parameter=$link->rawQuery("SELECT tp.* FROM testparametertb tp , testparametermatchtb tpm Where tpm.test_parameter_id = tp.id and tpm.test_id = ".$test['TestID']);

          foreach ($parameter as $insert_utrpm) {

            $para_result = $_POST["result_".$test['TestID'].$insert_utrpm['id']];
            $q=$link->insert('user_package_report_parameter_matchtb',Array('user_report_package_id'=>$package['UserReportPackageID'],'test_id'=>$test['TestID'],'test_parameter_id'=>$insert_utrpm['id'],'result'=>$para_result));

          }
      }
          
          $link->where("UserReportPackageID",$package['UserReportPackageID']);
          $a=$link->update("userreportpackagetb",Array("IsUpload"=>1));
          header("location:UserPackageReportDisplay.php");   

        }
   
   $s=$_SESSION["vid"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
<script>
  function validate() {

    var input_res = document.getElementsByClassName("input_res");
    var len = document.getElementsByClassName("input_res").length;
    var s_res = document.getElementsByClassName("s_result");

  if(len>0){
    
    for (var i = 0; i < len; i++) {
      if(input_res[i].value==""){
        s_res[i].innerHTML="<font color='red'>Required</font>";
        return false;
      }else{
        s_res[i].innerHTML="";
      }
    }
    return true;
  }
  }
</script>
<body>
  <?php include 'up.php'; ?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
               <div class="card-body">
                  <h2 class="card-title">User Package Report</h2>
                  <label class="card-title" ><b>NAME : </b></label>
                  <label class="card-title" ><?php echo $package['Last_Name']."  ".$package['First_Name']; ?></label>
                <form class="forms-sample" name="form1" method="POST" onsubmit="return(validate());" action="UserPackageReportAdd.php?id=<?php echo$_GET['id']; ?>">

                  <?php  
                 foreach($package_test as $test) {  
                
                   $parameter=$link->rawQuery("SELECT tp.* FROM testparametertb tp , testparametermatchtb tpm Where tpm.test_parameter_id = tp.id and tpm.test_id = ".$test['TestID']);

                  ?>

                  <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-8 grid-margin stretch-card ">
                      <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                        <div class="card-body">
                          <h6 class="font-weight-normal"><?php echo $test['Test_Name']; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr align="center">
                              <th></th>
                              <th>Parameter</th>
                              <th>Result</th>
                              <th>Unit</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  $o=0; foreach($parameter as $b) { $o++;  ?>
                            <tr align="center">
                              <td><?php echo $o; ?></td>
                              <td><?php echo $b["parameter"]; ?></td>
                              <td>
                                <input type="text" name="result_<?php echo $test['TestID'].$b['id']; ?>" class="form-control input_res" id="exampleInputName1" ><span class="s_result"></span>
                              </td>
                              <td><?php echo $b["Unit"];?></td>
                            </tr>
                            <?php } ?>  
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                <?php }?>
                  
                  <input type="submit" name="submit" value="submit" class="btn btn-primary ml-4">
                  
                </form>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include 'down.php'; ?>
</body>
</html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>