<?php
include 'connect.php';

$id=$_GET['id'];


   header("Content-type: application/vnd.ms-word");  
   header("Content-Disposition: attachment;Filename=sample.doc");  
   header("Pragma: no-cache");  
 
   header("Expires: 0");  

$checked_test=$link->rawQuery("Select tb.TestID ,tb.Test_Name from package_test_matchtb ptm, testtb tb where tb.TestID= ptm.package_test_id and ptm.package_id=".$id);

foreach ($checked_test as $test) {

$vendor=$link->rawQueryOne("SELECT * FROM testTB u,VendorTB v where u.Is_Active=1 and u.VendorID=v.VendorID and u.TestID=".$test['TestID']);

$parameters=$link->rawQuery("SELECT tp.* FROM testParameterTB tp,testParameterMatchTB tpm where tp.id=tpm.test_parameter_id and tpm.test_id=".$test['TestID']);

$a=$link->rawQueryOne('SELECT t.Test_Name,d.Disease_Name FROM TestTB t,DiseaseCategoryTB d where d.DiseaseID=t.DiseaseID  and t.TestID='.$test['TestID']);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
</head>
<body>
  <table align="center" width="100%">
     <tr>
        <th align="left"><h1><?php echo $vendor['Lab_Name']; ?></h1></th>
        <th align="right"><h4><?php echo $vendor['FirstName']; ?></h4></th>
     </tr>
    <tr>
      <td align="left"><h4><?php echo $vendor['Email']; ?></h4></td>
      <td align="right"><h4><?php echo $vendor['PhoneNumber']; ?></h4></td>
    </tr>
  </table><br>

  <table width="100%">
    <tr>
      <td><b>Name : </b></td>
      <td></td>
      <td align="right"><b>YYYY / MM / DD</b></td>
    </tr>
    <tr>
      <td><b>Age : </b></td>
      <td align="center"><b>Sex : </b></td>
      <td></td>
    </tr>
  </table><br><hr>

  <table  width="100%">   
    <tr>
        <td align="left"><b>Test Name: <u><?php echo $a['Test_Name']; ?></u><b></td>
    </tr>
  </table>

  <table width="100%">  
     <tr>
       <th width="25%"><u>Parameter</u></th>
       <th width="25%"><u>Results</u></th><br>
       <th width="25%"><u>Unit</u></th>
       <th width="25%"><u>Reference-interval</u></th>
     </tr>

     <?php foreach ($parameters as $para ) { ?>
    
     <tr>
      <td align="center" width="25%"><?php echo $para['parameter'];?></td>
      <td align="center" width="25%"> </td>
      <td align="center" width="25%"><?php echo $para['Unit'];?></td>
      <td align="center" width="25%"><?php echo $para['reference_range'];?></td>
    </tr>
     <?php } ?>
  </table>
  <br style="page-break-before:always;">
</body>

<?php } ?>