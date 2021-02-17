<?php
include '../connect.php';

$id=$_GET['id'];
$b=$link->rawQueryOne("SELECT u.*,p.*,v.*,u1.* FROM PackageTB p,userreortpackagetb u,UserTB u1,VendorTB v where u.PackageID=t.PackageID and u.UserID=u1.UserID and u.VendorID=v.VendorID and UserReortPackage=".$_GET['id']);
?>
<?php
   header("Content-type: application/vnd.ms-word");  
   header("Content-Disposition: attachment;Filename=sample.doc");  
   header("Pragma: no-cache");  
   header("Expires: 0");  
   echo '<h1></h1>';   
   echo '<table border="1">';   
   echo '<tr></tr>';   
   echo '<td>Accrete</td>';   
   echo '<td>Infotech</td>';   
   echo '<tr></tr>';   
   echo '</table>';   
?>
