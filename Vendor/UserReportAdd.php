<?php
include 'connect.php'; 
session_start();
if(isset($_SESSION['semail']))
   {

    $p=$link->rawQueryone("SELECT d.Disease_Name,ur.UserReportID,t.Test_Name,t.TestID,u1.First_Name,u1.Last_Name FROM diseasecategorytb d,TestTB t,UserReportTB ur,UserTB u1 where t.TestID=ur.TestID and d.DiseaseID=ur.DiseaseID and u1.UserID=ur.UserID and ur.UserReportID=".$_GET['id7']);


   $a=$link->rawQuery("SELECT tp.* FROM testparametertb tp , testparametermatchtb tpm , userreporttb ur Where ur.TestID = tpm.test_id and tpm.test_parameter_id = tp.id and ur.UserReportID = ".$_GET['id7']);
      

      if(isset($_POST["submit"]))
        {

          foreach ($a as $insert_utrpm) {

            $para_result = $_POST["result_".$insert_utrpm['id']];
            $q=$link->insert('user_test_report_parameter_matchtb',Array('user_report_id'=>$p['UserReportID'],'test_id'=>$p['TestID'],'test_parameter_id'=>$insert_utrpm['id'],'result'=>$para_result));
          }
          
          $link->where("UserReportID",$p['UserReportID']);
          $a=$link->update("userreporttb",Array("IsUpload"=>1));
          header("location:UserReportDisplay.php");   

          // print_r($para_result);
          // exit();
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
          <div class="row justify-content-center">
            <div class="col-md-6 col-lg-8 grid-margin stretch-card ">
              <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                <div class="card-body">
                  <h6 class="font-weight-normal"><?php echo $p['Disease_Name']; ?></h6>
                  <h6 class="font-weight-normal"><?php echo $p['Test_Name']; ?></h6>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
               <div class="card-body">
                  <h2 class="card-title">User Report</h2>
                  <label class="card-title" ><b>NAME : </b></label>
                  <label class="card-title" ><?php echo $p['Last_Name']."  ".$p['First_Name']; ?></label>
                <form class="forms-sample" name="form1" method="POST" onsubmit="return(validate());" action="userReportAdd.php?id7=<?php echo$_GET['id7']; ?>">

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
                           <?php  $o=0; foreach($a as $b) { $o++;  ?>
                            <tr align="center">
                              <td><?php echo $o; ?></td>
                              <td><?php echo $b["parameter"]; ?></td>
                              <td>
                                <input type="text" name="result_<?php echo $b['id']; ?>" class="form-control input_res" id="exampleInputName1" ><span class="s_result"></span>
                              </td>
                              <td><?php echo $b["Unit"];?></td>
                            </tr>
                          <?php } ?>  
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
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