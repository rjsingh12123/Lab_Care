<?php
include '../connect.php';

$id=$_GET['id'];
$b=$link->rawQueryOne("SELECT u.*,u1.*,a.* FROM `userreporttb` u,usertb u1,agediseasetb a,diseasecategorytb d,testtb t WHERE u.UserID=u1.UserID and a.VendorID=u.VendorID and a.DiseaseID=u.DiseaseID and a.TestID=u.TestID and u.TestID=t.TestID and u.DiseaseID=d.DiseaseID and a.TestID=t.TestID and a.DiseaseID=d.DiseaseID and u.UserReportID=".$_GET['id']);
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
<table width="100%" border="1">
   <!--<tr>
   <td align="left"><img src="../images/LabLogo.png"></td>
   </tr>--> 
<table width="100%" border="1">
<tr>
<td align="center">
    Name   :  <?php echo $b['First_Name']." ".$b['Last_Name']; ?>
</td>
</tr>
<tr>
<td align="center">	
	Age    :  <?php echo $b['Age']." yrs"; ?>
</td>
</tr>
<tr>
<td align="center">	
	Gender :  <?php echo $b['Gender']; ?>
</td>
</tr>

  <tr>
  <td align="center">
   <!-- Report :  <a href="../pages/Age/<?php // echo $b['Reading'];?>">link</a>  -->
	<?php
	$myFile = "../pages/Age/".$b['Reading'];
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, 10000);
    fclose($fh);
    echo $theData;
?>	
  </td>
  </tr>
</table>
</table>
</body>
</html>