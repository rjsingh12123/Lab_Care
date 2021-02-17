<?php
include '../connect.php';

$id=$_GET['id'];

$vendor=$link->rawQueryOne("SELECT * FROM UserReportTB u,VendorTB v where u.Is_Active=1 and u.VendorID=v.VendorID and u.UserReportID=".$_GET['id']);

$user=$link->rawQueryOne("SELECT * FROM UserReportTB ur,UserTb ut WHERE ur.UserID=ut.UserID and ur.UserReportID=".$_GET['id']);

$b=$link->rawQueryOne("SELECT u.*,u1.*,a.*,v.* FROM `userreporttb` u,usertb u1,agediseasetb a,diseasecategorytb d,testtb t,vendortb v WHERE u.UserID=u1.UserID and a.VendorID=u.VendorID and a.DiseaseID=u.DiseaseID and a.TestID=u.TestID and u.TestID=t.TestID and u.DiseaseID=d.DiseaseID and a.TestID=t.TestID and a.DiseaseID=d.DiseaseID and u.UserReportID=".$_GET['id']);


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
    <td align="right"><b><?php echo $user['Collection_Date']; ?></b></td>
  </tr>
  <tr>
    <td><b>Age : </b><?php echo $user['Age']; ?></td>
    <td><b>Sex : </b><?php echo $user['Gender']; ?></td>
    <td></td>
  </tr>
</table><br>
<hr>
   <!-- Report :  <a href="../pages/Age/<?php // echo $b['Reading'];?>">link</a>  -->
	<?php
	$myFile = "../pages/Age/".$b['Reading'];
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, 10000);
    fclose($fh);
    echo $theData;
?>	
</body>
</html>