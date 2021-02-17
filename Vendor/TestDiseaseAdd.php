<?php
  include 'connect.php';
  session_start();
  if(isset($_SESSION['semail']))
   {
  $dtb=$link->rawQuery("Select * from DiseaseCategoryTB where VendorID=".$_SESSION["vid"]);
  $test_parameter_tb=$link->rawQuery("Select parameter,id from testparametertb");

    
	$aa=$_SESSION["vid"];
  if(isset($_POST["submit"]))
  {
    $disease_id=$_POST["disease_id"];
		$test_name=$_POST["tname"];
		$price=$_POST["price"];

    if (isset($_POST['isAge'])) {
      $isAge = 1;
      $ageFrom = $_POST["Age_From"];
      $ageTo = $_POST['Age_To'];
    }else{
        $isAge = $ageFrom = $ageTo = 0;
    }

       $j=$link->insert("TestTB",Array("Test_Name"=>$test_name,"DiseaseID"=>$disease_id,"Price"=>$price,"is_age"=>$isAge,"age_from"=>$ageFrom,"age_to"=>$ageTo,"VendorID"=>$_SESSION['vid']));   

      foreach($test_parameter_tb as $a1){
          if(isset($_POST["chk_parameter".$a1['id']])){
              $last_test_parameter_match_id=$link->insert("testparametermatchtb",Array("test_id"=>$j,"test_parameter_id"=>$a1['id']));   
          }
     }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>
   $(document).ready(function(){
     $('#disease_id1').on("change",function(){
       var did=$(this).val();
       if(did){
         
         $.ajax({
           type:"POST",
           url:'ajaxdisease.php',
           data:'ids='+did,
           success:function(html){
           $('#tname1').html(html);
           }
         });
       }
       else
       {
        $('#tname1').html('<option value="">---Selectd---</option>'); 
       }
     });
     $('#tname1').on("change",function(){
       var did1=$(this).val();
     //  alert(did1);
       if(did1){
         
         $.ajax({
           type:"POST",
           url:'ajaxdisease.php',
           data:'htt='+did1,
           success:function(html){
             <?php  unset($_SESSION['xyz2']);  ?>
             
           }
         });
       }
       else
       {
        $('#tname1').html('<option value="">---Selectd---</option>'); 
       }
     });

     $('#chk_isAge').on("change",function(){
       var did=$(this).prop("checked");

       if(did){

          $('#agef').prop('disabled',false); 
          $('#age').prop('disabled',false); 

          // $('#gn_report').css('visibility','collapse'); 

       }
       else
       {
          $('#agef').prop('disabled',true); 
          $('#age').prop('disabled',true); 
       }
     });

     $('#chk_isAge_u').on("change",function(){
       var did=$(this).prop("checked");

       if(did){

          $('#agef_u').prop('disabled',false); 
          $('#age_u').prop('disabled',false); 

          // $('#gn_report').css('visibility','collapse'); 

       }
       else
       {
          $('#agef_u').prop('disabled',true); 
          $('#age_u').prop('disabled',true); 
       }
     });

   });

  
   function validate()
   {
		var disease_name=document.form1.disease_id.value;
		var test_name=document.form1.tname.value;
    var is_age = document.form1.isAge.checked;
    var age_from = document.form1.Age_From.value;
    var age_to = document.form1.Age_To.value;
		var price=document.form1.price.value;
    document.getElementById("s1").innerHTML="";
    document.getElementById("s3").innerHTML="";
    document.getElementById("s4").innerHTML="";
    document.getElementById("s5").innerHTML="";
    document.getElementById("s6").innerHTML="";

	   pattern2=/^[0-9]*$/;

	   if(disease_name=="")
	   {
       document.getElementById("s1").innerHTML="<font color='red'>Required Disease Name</font>";
       return false;
	   }

	   if(test_name=="")
	   {
       document.getElementById("s3").innerHTML="<font color='red'>Required Test Name</font>";
       return false;
	   }

     if(is_age){
        if(age_from==""){
          document.getElementById("s5").innerHTML="<font color='red'>Required Age </font>";
         return false;
       }

       if(age_to==""){
          document.getElementById("s6").innerHTML="<font color='red'>Required Age </font>";
         return false;
       }
     }

     if(price=="")
     {
       document.getElementById("s4").innerHTML="<font color='red'>Required Price</font>";
       return false;
     }
     else if(pattern2.test(price)==false)
     {
       document.getElementById("s4").innerHTML="<font color='red'>Please Enter correct Price</font>";
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
  <?php include 'up.php';?>
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
               <div class="card-body">
                  <h2 class="card-title">Test Disease</h2>
                  <?php 
				    if(isset($_GET['id4']))
					{
				        $w=$_GET['id4'];
						
	                    $e=$link->rawQueryOne("Select * from TestTB where VendorID='$aa' and TestID=".$w);
                      // print_r($e);
                      // exit();

                      $checked_parameter=$link->rawQuery("Select tp.id from testparametermatchtb tpm, testparametertb tp where tp.id= tpm.test_parameter_id and tpm.test_id=".$w);

				  ?>
                  <form name="form1" method="POST" class="forms-sample1" action="pages/ui-features/Update.php?id4=<?php echo $w; if(isset($_GET['page'])){ echo '&page='.$_GET['page']; } ?>" >
				    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Disease Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="disease_id">
							<option value="">-----select-----</option>
                              <?php  foreach($dtb as $a1) { ?>
					     <option value="<?php echo $a1['DiseaseID'];?>" <?php if(isset($w)) { if($e['DiseaseID']==$a1['DiseaseID']) { ?>selected <?php } ?>><?php echo $a1['Disease_Name'];?></option>
						 <?php } }?>
                            </select><span id="s1"></span>
                          </div>
                        </div>
                    </div>
					
					          <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Test Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="tname" class="form-control" value="<?php echo $e['Test_Name']; ?>"><span id="s3"></span>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Test Parameter</label>
                            <?php  foreach($test_parameter_tb as $a1) { ?>
                          <div class="col-sm-4">
                                <input type="checkbox" name="chk_parameter<?php echo $a1['id'] ?>" value="<?php echo $a1['parameter'] ?>" <?php 
                                      foreach($checked_parameter as $chk_para){  
                                          if(isset($w)) { if($chk_para['id']==$a1['id']) { ?>checked <?php } } 
                                        }
                                  ?>> <?php echo $a1['parameter']; ?>
                          </div>
                             <?php }?>
                        </div>
                    </div>

                    <div class="col-md-6">
                          <label class="col-sm-3 col-form-label card-title">Age </label>
                          <input type="Checkbox" name="isAge" id="chk_isAge_u" <?php if($e['is_age']){echo "checked"; } ?> >
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-10 col-form-label">Age From</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="Age_From" id="agef_u" <?php if(!$e['is_age']){echo "disabled"; } ?>>
                            <option value="" selected>-----select-----</option>
                            <?php for($i=1;$i<=100;$i++) { ?>
                              <option value="<?php echo $i;?>" <?php if(isset($w)){ if($e['age_from']==$i){ ?>selected <?php } } ?> ><?php echo $i; ?></option>
                            <?php } ?>
                          </select><span id="s5"></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-10 col-form-label">Age To</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="Age_To" id="age_u" <?php if(!$e['is_age']){echo "disabled"; } ?>>
                          <option value="" selected>-----select-----</option>
                            <?php for($j=1;$j<=100;$j++) { ?>
                              <option value="<?php echo $j;?>" <?php if(isset($w)){ if($e['age_to']==$j){ ?>selected <?php } } ?> ><?php echo $j; ?> </option>
                            <?php } ?>
                          </select><span id="s6"></span>
                        </div>
                      </div>
                    </div>

					          <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Price</label>
                          <div class="col-sm-9">
                            <input type="text" name="price" class="form-control" value="<?php echo $e['Price']; ?>"><span id="s4"></span>
                          </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>


				   <?php } else{ ?>  


				 <form name="form1" class="forms-sample1" action="TestDiseaseAdd.php" method="post" onsubmit="return(validate());">
				    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Disease Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="disease_id" id="disease_id1">
							<option value="" selected>-----select-----</option>
                              <?php  foreach($dtb as $a1) { ?>
					     <option value="<?php echo $a1['DiseaseID'];?>"><?php echo $a1['Disease_Name'];?></option>
						 <?php } ?>
                            </select><span id="s1"></span>
                          </div>
                        </div>
                    </div>
					
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">TestName</label>
                          <div class="col-sm-9">
                            <input type="text" name="tname" id="tname1" class="form-control"><span id="s3"></span>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Test Parameter</label>
                            <?php  foreach($test_parameter_tb as $a1) { ?>
                          <div class="col-sm-4">
                                <input type="checkbox" name="chk_parameter<?php echo $a1['id'] ?>" value="<?php echo $a1['parameter'] ?>"> <?php echo $a1['parameter']; ?>
                          </div>
                             <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                          <label class="col-sm-3 col-form-label card-title">Age </label>
                          <input type="Checkbox" name="isAge" id="chk_isAge" unchecked>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-10 col-form-label">Age From</label>
                        <div class="col-sm-9">
                         <select class="form-control" name="Age_From" id="agef" disabled >
                            <option value="" selected>-----select-----</option>
                            <?php for($i=1;$i<=100;$i++) { ?>
                              <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                            <?php } ?>
                          </select><span id="s5"></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-10 col-form-label">Age To</label>
                        <div class="col-sm-9">
                         <select class="form-control" name="Age_To" id="age" disabled>

                            <option value="" selected>-----select-----</option>
                            <?php for($j=1;$j<=100;$j++){ ?>
                                <option value="<?php echo $j;?>"><?php echo $j; ?></option>
                            <?php }  ?>
                          </select><span id="s6"></span>
                        </div>
                      </div>
                    </div>

					          <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Price</label>
                          <div class="col-sm-9">
                            <input type="text" name="price" class="form-control"><span id="s4"></span>
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
</body>
</html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>