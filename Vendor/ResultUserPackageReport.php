<?php
include 'connect.php';

   header("Content-type: application/vnd.ms-word");  
   header("Content-Disposition: attachment;Filename=sample.doc");  
   header("Pragma: no-cache");  
 
   header("Expires: 0");  
$package=$link->rawQueryOne("SELECT urp.* , p.Package_Name FROM userreportpackagetb urp , packagetb p where p.PackageId = urp.PackageId and urp.UserReportPackageID=".$_GET['id']);

$user=$link->rawQueryOne("SELECT * FROM userTB u where u.Is_Active=1 and u.UserID =".$package['UserID']);

$checked_test=$link->rawQuery("SELECT tb.TestID ,tb.Test_Name from package_test_matchtb ptm, testtb tb where tb.TestID= ptm.package_test_id and ptm.package_id=".$package['PackageID']);

foreach ($checked_test as $test) {

$vendor=$link->rawQueryOne("SELECT * FROM testTB u,VendorTB v where u.Is_Active=1 and u.VendorID=v.VendorID and u.TestID=".$test['TestID']);

$parameters=$link->rawQuery("SELECT uprpm.result,tp.* FROM testParameterTB tp,testParameterMatchTB tpm , user_package_report_parameter_matchtb uprpm where tp.id = uprpm.test_parameter_id and tp.id=tpm.test_parameter_id and tpm.test_id = uprpm.test_id and tpm.test_id=".$test['TestID']." and uprpm.user_report_package_id=".$package['UserReportPackageID']);

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
    <td align="right"><b><?php echo $package['Collection_Date']; ?></b></td>
  </tr>
  <tr>
    <td><b>Age : </b><?php echo $user['Age']; ?></td>
    <td align="center"><b>Sex : </b><?php echo $user['Gender']; ?></td>
    <td></td>
  </tr>
  </table><br><hr>

  <table  width="100%">   
    <tr>
      <td align="left"><b>Package : <u><?php echo $package['Package_Name']; ?></u><b></td>
      <td align="right"><b>Test : <u><?php echo $test['Test_Name']; ?></u><b></td>
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
      <td align="center" width="25%"><?php echo $para['result'];?></td>
      <td align="center" width="25%"><?php echo $para['Unit'];?></td>
      <td align="center" width="25%"><?php echo $para['reference_range'];?></td>
    </tr>
     <?php } ?>
  </table>
  <br style="page-break-before:always;">
</body>

<?php } ?>