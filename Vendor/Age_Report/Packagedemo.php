<?php
include '../connect.php';

$id=$_GET['id'];
$b=$link->rawQueryOne("SELECT u.*,u1.*,v.*,p.Reading FROM userreortpackagetb u,PackageTB p,UserTB u1,VendorTB v where u.Is_Active=1 and p.PackageID=u.PackageID and u.UserID=u1.UserID and u.VendorID=v.VendorID and UserReortPackage=".$_GET['id']);
?>

<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
</head>
<body>
<table border="1">
<tr>
<td>
    Name   :  <?php echo $b['First_Name']." ".$b['Last_Name']; ?>
</td>
</tr>
<tr>
<td>	
	Age    :  <?php echo $b['Age']." yrs"; ?>
</td>
</tr>
<tr>
<td>	
	Gender :  <?php echo $b['Gender']; ?>
</td>
</tr>
<table border="1">
  <tr>
  <td>
     Report : <!-- <a href="../pages/Age/<?php // echo $b['Reading'];?>">link</a>  -->
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