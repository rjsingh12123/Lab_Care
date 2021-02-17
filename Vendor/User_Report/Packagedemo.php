<?php
include '../connect.php';

$id=$_GET['id'];
$b=$link->rawQueryOne("SELECT u.*,u1.*,v.*,p.Reading FROM userreortpackagetb u,PackageTB p,UserTB u1,VendorTB v where u.Is_Active=1 and p.PackageID=u.PackageID and u.UserID=u1.UserID and u.VendorID=v.VendorID and u.UserReortPackage=".$_GET['id']);
   header("Content-type: application/vnd.ms-word");  
   header("Content-Disposition: attachment;Filename=sample.doc");  
   header("Pragma: no-cache");  
   header("Expires: 0"); 
?>

<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
</head>
<body>
<table width="100%">
   
   <tr>
   <th><h1><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $b['Lab_Name']; ?></b></h1></th>
   </tr>
<tr>
<td align="left">
    Name   :  <?php echo $b['First_Name']." ".$b['Last_Name']; ?>
</td>
<td align="right">
    Email   :   <?php echo $b['Email']; ?>
</td>
</tr>
<tr>
<td align="left">	
	Age    :  <?php echo $b['Age']." yrs"; ?>
</td>
<td align="right"> 
    Address : <?php echo $b['Address']; ?>
</td>
</tr>
<tr>
<td align="left">	
	Gender :  <?php  if(isset($b['Gender'])){if($b['Gender']==1){
	echo "Male";} else {echo "Female"; }
	} ?>
</td>
<td align="right">
    Mobile Number: <?php echo $b['Mobile_Number']; ?>
</td>
</tr>
</table>
<hr>
    Report : <!--<a href="../pages/Age/<?php // echo $b['Reading'];?>">link</a>  -->
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php
		$myFile = "../pages/Age/".$b['Reading'];
		$fh = fopen($myFile, 'r');
		$theData = fread($fh, 100000);
		fclose($fh);
		echo $theData;
    ?>	 
  
</body>
</html>