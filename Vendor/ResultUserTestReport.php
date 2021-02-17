<?php
include 'connect.php';

$id=$_GET['id'];

$user_report=$link->rawQueryOne("SELECT * FROM userreporttb ur where ur.Is_Active=1 and ur.UserReportID=".$_GET['id']);

$vendor=$link->rawQueryOne("SELECT * FROM VendorTB v where v.Is_Active=1 and v.VendorID =".$user_report['VendorID']);

$user=$link->rawQueryOne("SELECT * FROM userTB u where u.Is_Active=1 and u.UserID =".$user_report['UserID']);

$a=$link->rawQueryOne('SELECT t.Test_Name,d.Disease_Name FROM TestTB t,DiseaseCategoryTB d where d.DiseaseID=t.DiseaseID  and t.TestID='.$user_report['TestID']);

$parameters=$link->rawQuery("SELECT utrp.result,tp.* FROM testParameterTB tp,testParameterMatchTB tpm , user_test_report_parameter_matchtb utrp where tp.id = utrp.test_parameter_id and tp.id=tpm.test_parameter_id and tpm.test_id = utrp.test_id and tpm.test_id=".$user_report['TestID']." and utrp.user_report_id=".$user_report['UserReportID']);

   header("Content-type: application/vnd.ms-word");  
   header("Content-Disposition: attachment;Filename=sample.doc");  
   header("Pragma: no-cache");  
 
   header("Expires: 0");  
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
    <td><b>Name : </b><?php echo $user['Last_Name']." ".$user['First_Name']; ?></td>
    <td></td>
    <td align="right"><b><?php echo $user_report['Collection_Date']; ?></b></td>
  </tr>
  <tr>
    <td><b>Age : </b><?php echo $user['Age']; ?></td>
    <td align="center"><b>Sex : </b><?php echo $user['Gender']; ?></td>
    <td></td>
  </tr>
</table>
<hr><br>
<table  width="100%">   
  <tr>
      <td align="left"><b>Disease : <u><?php echo $a['Disease_Name']; ?></u><b></td>
      <td align="right"><b>Test : <u><?php echo $a['Test_Name']; ?></u><b></td>
  </tr>
</table><br>

<table width="100%">  
   <tr>
     <th width="25%"><u>Parameter</u></th>
     <th width="25%"><u>Results</u></th>
     <th width="25%"><u>Unit</u></th>
     <th width="25%"><u>Reference-interval</u></th>
   </tr>

   <?php foreach ($parameters as $para ) { ?>
  
   <tr>
    <td align="center" width="25%"><?php echo $para['parameter'];?></td>
    <td align="center" width="25%"><?php echo $para['result'];?></td>
    <td align="center" width="25%"><?php echo $para['Unit'];?></td>
    <td align="center" width="25%"><?php echo $para['reference_range'];?></td>
  </tr>
   <?php } ?>
</table>
</body>
