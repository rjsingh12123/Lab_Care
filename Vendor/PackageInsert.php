<?php
include 'connect.php'; 
session_start();
if(isset($_SESSION['semail']))
   {

    $test_tb=$link->rawQuery("SELECT * from testtb where Is_Active = 1 AND VendorID =". $_SESSION['vid']);

   if(isset($_POST['submit']))
   {
	   $package=$_POST['pname'];
	   $Description=$_POST['Description'];
     $price = $_POST['price'];
	   $package_category=$_POST['pcname'];
	   
       $j=$link->insert('PackageTB',Array('Package_Name'=>$package,'PackageCategoryName'=>$package_category,'Description'=>$Description,'Price'=>$price,'VendorID'=>$_SESSION['vid']));

       foreach($test_tb as $a1){

          if(isset($_POST["chk_test".$a1['TestID']])){

              $last_test_parameter_match_id=$link->insert("package_test_matchtb",Array("package_id"=>$j,"package_test_id"=>$a1['TestID']));   
          }
     }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
   function validate()
   {
	   var a1=0;
	   var a2=0;
	   var a3=0;
	   var a4=0;
	   var name=document.form1.pname.value;
	   var name1=document.form1.pcname.value;
	   var price=document.form1.price.value;
	   document.getElementById("s1").innerHTML="";
	   document.getElementById("s2").innerHTML="";	   
	  document.getElementById("s3").innerHTML="";	   
	   pattern1=/^[a-zA-Z\s]*$/;
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
     if(price=="")
     {
       a4=1;
     }
	   if(a1==1 || a2==1 || a3==1 ||a4==1)
	   {
		   if(a1==1)
		   {
			   document.getElementById("s1").innerHTML="<font color='red'>Required Package Name</font>";
		   }
		   if(a2==1)
		   {
			   document.getElementById("s2").innerHTML="<font color='red'>Required PackageCategoryName</font>";
		   }
           if(a3==1)
		   {
			   document.getElementById("s2").innerHTML="<font color='red'>Please Enter correct PackageCategoryName</font>";
		   }		
       if(a4==1)
       {
         document.getElementById("s3").innerHTML="<font color='red'>Required Package Price</font>";
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
  <?php include 'up.php';       ?>
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
              <div class="card-body">
                  <h2 class="card-title">Package</h2>
                  <?php 
				    if(isset($_GET['id3']))
					{
				        $w=$_GET['id3'];
	                      $j=$link->rawQueryOne("Select * from PackageTB where Is_Active=1 and PackageID=".$w);

                        $checked_test=$link->rawQuery("Select tb.TestID from package_test_matchtb ptm, testtb tb where tb.TestID= ptm.package_test_id and ptm.package_id=".$w);
				  ?>
                      <form class="forms-sample1" name="form1" action="pages/ui-features/Update.php?id3=<?php echo $w;?>" method="post" onsubmit="return(validate());">
				    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Package Name</label>
                           <div class="col-sm-9">
                            <input type="text" name="pname" class="form-control" value="<?php echo $j['Package_Name']; ?>"><span id="s2"></span>
                          </div>
                        </div>
                    </div>

					          <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Package Category Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="pcname" class="form-control" value="<?php echo $j['PackageCategoryName']; ?>"><span id="s2"></span>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Test</label>
                            <?php  foreach($test_tb as $a1) { ?>
                          <div class="col-sm-4">
                                <input type="checkbox" name="chk_test<?php echo $a1['TestID'] ?>" value="<?php echo $a1['Test_Name'] ?>" <?php 
                                      foreach($checked_test as $chk_para){  
                                          if(isset($w)) { if($chk_para['TestID']==$a1['TestID']) { ?>checked <?php } } 
                                        }
                                  ?>> <?php echo $a1['Test_Name']; ?>
                          </div>
                             <?php }?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Price</label>
                          <div class="col-sm-9">
                            <input type="text" name="price" class="form-control" value="<?php echo $j['Price']; ?>"><span id="s3"></span>
                          </div>
                        </div>
                    </div>

					        <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="Description" id="ckeExample" rows="4"><?php echo $j["Description"]; ?></textarea>
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
				  <?php  } else
					{
						?>
						<form class="forms-sample1" name="form1" action="PackageInsert.php" method="post" onsubmit="return(validate());">
				    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Package Name</label>
                           <div class="col-sm-9">
                            <input type="text" name="pname" class="form-control"><span id="s1"></span>
                          </div>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Package Category Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="pcname" class="form-control" ><span id="s2"></span>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Test</label>
                            <?php  foreach($test_tb as $a1) { ?>
                          <div class="col-sm-4">
                                <input type="checkbox" name="chk_test<?php echo $a1['TestID'] ?>" value="<?php echo $a1['Test_Name'] ?>"> <?php echo $a1['Test_Name']; ?>
                          </div>
                             <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-10 col-form-label">Price</label>
                          <div class="col-sm-9">
                            <input type="text" name="price" class="form-control"><span id="s3"></span>
                          </div>
                        </div>
                    </div>

					<div class="col-md-6">
					   <div id="row">
                           
					  </div>
                    </div>
					<div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="Description" id="ckeExample" rows="4"></textarea><span id="s3"></span>
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
</body></html>
<?php
   }
   else
   {
	   header("location:Vendorlogin.php");
   }
?>