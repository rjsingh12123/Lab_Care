<?php
//echo $_GET['id4'];
  session_start();
  include 'connect.php';
  if(isset($_SESSION['semail']))
   {
    $dt=$link->rawQuery("Select * from DiseaseCategoryTB where Is_Active=1 and VendorID=".$_SESSION["vid"]);
    $tt=$link->rawQuery("Select * from TestTB where Is_Active=1 and VendorID=".$_SESSION["vid"]);

  	$test_parameter_tb=$link->rawQuery("Select parameter,id from testparametertb");


    if(isset($_POST["submit"]))
	{   
	$v=$_SESSION["vid"];
	$d=$_POST["dname"];
	$t=$_POST["tname"];
	$af=$_POST["Age_From"];
	$at=$_POST["Age_To"];
	$ds=$_POST["description"];
/*	$r=$_FILES['Reading']['name'];
	
	$path=pathinfo($r,PATHINFO_EXTENSION);
	
	$ext="../../Age_Report/".$d." ".$t.".".$path;
	*/
	 //if(move_uploaded_file($_FILES['Reading']['tmp_name'],$ext))
	// {
        $j=$link->insert("agediseasetb",Array("VendorID"=>$v,"TestID"=>$t,"DiseaseID"=>$d,"Age_From"=>$af,"Age_To"=>$at,"Description"=>$ds,"VendorID"=>$_SESSION['vid'])); 


        foreach($test_parameter_tb as $a1){
          if(isset($_POST["chk_parameter".$a1['id']])){
              $last_test_parameter_match_id=$link->insert("testparametermatchtb",Array("test_id"=>$j,"test_parameter_id"=>$a1['id']));   
          }
     }  
	// }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>
   $(document).ready(function(){
	   $('#dname1').on("change",function(){
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
			  $('#tname1').html('<option value="">---Select---</option>'); 
		   }
	   });
	   $('#tname1').on("change",function(){
		   var did1=$(this).val(); 

		   if(did1){
			   
			   $.ajax({
				   type:"POST",
				   url:'ajaxdisease.php',
				   data:'htt='+did1,
				   success:function(html){
					   <?php  
					   unset($_SESSION['test_diesease']);  ?>
					   
				   }
			   });
		   }
		   else
		   {
			  $('#tname1').html('<option value="">---Select---</option>'); 
		   }
	   });
	   
	   $('#chk_isAge').on("change",function(){
		   var did=$(this).prop("checked");
		   if(did){

			  $('#agef').prop('disabled',false); 
			  $('#age').prop('disabled',false); 

			  $('#gn_report').css('visibility','collapse'); 

		   }
		   else
		   {

 				var test_did=$('#tname1').val();

 				if(test_did!=""){

			   	   $.ajax({
					   type:"POST",
					   url:'ajaxdisease.php',
					   data:'at=null',
					   success:function(data){
					   $('#row').html(data);
					   }
			  		 });
				}

			   
			  $('#agef').prop('disabled',true); 
			  $('#age').prop('disabled',true); 
		   }
	   });

	   $('#age').on("change",function(){
		   var did=$(this).val();
		   if(did){
			   
			   $.ajax({
				   type:"POST",
				   url:'ajaxdisease.php',
				   data:'at='+did,
				   success:function(data){
				   $('#row').html(data);
				   }
			   });
		   }
		   else
		   {
			  $('#age').html('<option value="">---Select---</option>'); 
		   }
	   });

   }); 
   function validate()
   {
		var a1=0;
		var a2=0;
		var a3=0;
		var a4=0;
		var a5=0;
		var a6=0;
		var name=document.form1.dname.value;
		var name1=document.form1.tname.value;
		var name2=document.form1.agef.value;
		var name3=document.form1.age.value;
	   document.getElementById("s1").innerHTML="";
	   document.getElementById("s2").innerHTML="";	 
	   document.getElementById("s3").innerHTML="";	 
	   document.getElementById("s4").innerHTML="";	 	   
	   pattern1=/^[a-zA-Z]*$/;
	   pattern2=/^[0-9]*$/;
	   if(name=="")
	   {
		   a1=1;
	   }
	   if(name1=="")
	   {
		   a2=1;
	   }
	   if(name2=="")
	   {
		   a3=1;
	   }
	   if(name3=="")
	   {
		   a4=1;
	   }
	   if(a1==1 || a2==1 || a3==1 || a4==1 || a5==1 || a6==1 )
	   {
		   if(a1==1)
		   {
			   document.getElementById("s1").innerHTML="<font color='red'>Required Disease Name</font>";
		   }
		   if(a2==1)
		   {
			   document.getElementById("s2").innerHTML="<font color='red'>Required Test Name</font>";
		   }
		   if(a3==1)
		   {
			   document.getElementById("s3").innerHTML="<font color='red'>Required Age To</font>";
		   }
		   if(a4==1)
		   {
			   document.getElementById("s4").innerHTML="<font color='red'>Required Age From</font>";
		   }
          	   
		   return false;
	   }
	   return ( true );
   }
   function d()
   {
	   <?php  unset($_SESSION['diesease']);  ?>
	   
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
                  <h2 class="card-title">Age Wise Test Disease</h2>
				 <!-- <h4>Sample Download For Upload Report</h4>
                  <h6><a href="Sample.php">Sample Download For Upload Report</a></h6> -->
                  <?php 
				    if(isset($_GET['id6']))
					{
				        $w=$_GET['id6'];
	                    $e=$link->rawQueryOne("Select * from agediseasetb where AgeDiseaseID=".$w);
				  ?>
                  <form name="form1" class="forms-sample1" action="ui-features/Update.php?id6=<?php echo $w;?>" method="post" enctype="multipart/form-data"onsubmit="return(validate());">
				    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Disease Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="dname">
							<option value="" selected>-----select-----</option>
                              <?php  foreach($dt as $a1) { ?>
					     <option value="<?php echo $a1['DiseaseID'];?>" <?php if(isset($w)){ if($e['DiseaseID']==$a1['DiseaseID']){ ?>selected<?php } } ?>><?php echo $a1['Disease_Name'];?></option>
						 <?php } ?>
                            </select><span id="s1"></span>
                          </div>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label"> Test Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="tname">
							<option value="" selected>-----select-----</option>
			            	<?php foreach($tt as $a2) { ?>
    <option value="<?php echo $a2['TestID'];?>" <?php if(isset($w)){ if($e['TestID']==$a2['TestID']){ ?>selected<?php } } ?> ><?php echo $a2['Test_Name'];?></option>
<?php } ?>
                           </select><span id="s2"></span>
                          </div>
                        </div>
                    </div>
                    
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Age_From</label>
                          <div class="col-sm-9">
                           <select class="form-control" name="Age_From" disabled>
							<option value="" selected>-----select-----</option>
                            <?php for($i=1;$i<=100;$i++)
							  { ?>
								  <option value="<?php echo $i;?>" <?php if(isset($w)){ if($e['Age_From']==$i){ ?>selected<?php } } ?> ><?php echo $i; ?></option>
							  <?php }
							  ?>
                            </select><span id="s2"></span>
                          </div>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Age_To</label>
                          <div class="col-sm-9">
                           <select class="form-control" name="Age_To" disabled>
							<option value="" selected>-----select-----</option>
                            <?php for($j=1;$j<=100;$j++)
							  { ?>
								  <option value="<?php echo $j;?>" <?php if(isset($w)){ if($e['Age_To']==$j){ ?>selected<?php } } ?> ><?php echo $j; ?> </option>
							  <?php }
							  ?>
                            </select><span id="s2"></span>
                          </div>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Reading</label>
                          <div class="col-sm-9">
                            <input type="file" name="Reading" class="form-control"><span id="s4"></span>
                          </div>
                        </div>
                    </div>
					<div class="form-group">
                      <label for="exampleTextarea1">Description</label>
					<textarea class="form-control" name="description" id="ckeExample" rows="4"><?php echo $e['Description'];?></textarea>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
				  <?php  } else
					{
						?>
				 <form name="form1" class="forms-sample1" action="AgeDiseaseAdd.php" method="post" enctype="multipart/form-data"onsubmit="return(validate());">
				    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Disease Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="dname" id="dname1">
							<option value="" selected>-----select-----</option>
                              <?php  foreach($dt as $a1) { ?>
					     <option value="<?php echo $a1['DiseaseID'];?>"><?php echo $a1['Disease_Name'];?></option>
						 <?php } ?>
                            </select><span id="s1"></span>
                          </div>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label"> Test Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="tname" id="tname1">
							
							<option value="" selected>-----select-----</option>
                            </select><span id="s2"></span>
                            
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
                          <label class="col-sm-3 col-form-label card-title">Age Test</label>
                          <input type="Checkbox" name="isAge" id="chk_isAge" checked>
                    </div>

					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Age_From</label>
                          <div class="col-sm-9">
                           <select class="form-control" name="Age_From" id="agef" >
							<option value="" selected>-----select-----</option>
                            <?php for($i=1;$i<=100;$i++)
							  { ?>
								  <option value="<?php echo $i;?>"><?php echo $i; ?></option>
							  <?php }
							  ?>
                            </select><span id="s3"></span>
                          </div>
                        </div>
                    </div>

					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Age_To</label>
                          <div class="col-sm-9">
                           <select class="form-control" name="Age_To" id="age" >
							<option value="" selected>-----select-----</option>
                            <?php for($j=1;$j<=100;$j++)
							  { ?>
								  <option value="<?php echo $j;?>"><?php echo $j; ?></option>
							  <?php }
							  ?>
                            </select><span id="s4"></span>
                          </div>
                        </div>
                    </div>

					<div class="col-md-6">
					   <div id="row">

					  </div>
                    </div>
					<div class="form-group">
                      <label for="exampleTextarea1">Description</label>
					<textarea class="form-control" name="description" id="ckeExample" rows="4"></textarea>
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
        <?php include 'down.php'; ?>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>
  <script>
var ckEditorID;

ckEditorID = 'ckeExample';

CKEDITOR.config.forcePasteAsPlainText = true;
CKEDITOR.replace( ckEditorID,
    {
        toolbar :
        [
         { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
		{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
		'/',
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
		{ name: 'about', items: [ 'About' ] }
        ]
      
    })
  
    
</script>
  
  <!-- End custom js for this page-->
</body>
</html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>
