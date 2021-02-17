<?php
include '../connect.php';

$id=$_GET['id'];
$b=$link->rawQueryOne("SELECT u.UserReportID,u1.Gender,t.Test_Name,d.Disease_Name,v.FirstName,v.LastName,u.Report,u1.First_Name,u1.Age,u1.Last_Name,u.Collection_Date,u.From_Collection_Time,u.To_Collection_Time,u.IsPaid,u.Status,u.Is_Active,u.IsUpload FROM diseasecategorytb d,TestTB t,UserReportTB u,UserTB u1,VendorTB v where u.Is_Active=1 and u.TestID=t.TestID and u.DiseaseID=d.DiseaseID and u.UserID=u1.UserID and u.VendorID=v.VendorID and UserReportID=".$id);
?>
<?php
   header("Content-type: application/vnd.ms-word");  
   header("Content-Disposition: attachment;Filename=sample.doc");  
   header("Pragma: no-cache");  
   header("Expires: 0");  
   echo '<h1></h1>';   
   echo '<table border="1">';   
   echo '<tr>';    
   echo '<td> Name  :  '.$b['First_Name']." ".$b['Last_Name'].'</td></tr><tr>';   
   echo '<td> Age   :  '.$b['Age']." yrs".'</td></tr><tr>';   
   echo '<td> Gender : '.$b['Gender'].'</td>';
   echo '</tr>';
   echo  '<tr>';
   echo  '<td> ABC Complete Blood Count</td>';
   echo  '</tr><tr>';
   echo  '<table border="1">';   
   echo  '<tr><td>Parameter</td><td>BioLogicalRefrenceRange</td><td>Method</td><td></td>Results</tr>'; 
   echo  '<tr><td>HAEMOGLOBIN</td><td>13.5-18 gm%</td><td>Cyanide free SLS</td><td></td></tr>'; 
   echo  '<tr><td>RBC COUNT</td><td>4.5-5.5 mil/cmm</td><td>Hydrodynamic   Electrical  Impedence</td><td></td></tr>'; 
   echo  '<tr><td>PCV</td><td>40-50%</td><td>Hydrodynamic   Electrical  Impedence</td><td></td></tr>'; 
   echo  '</table>';      
   echo '</tr></tr>';   
   echo '</table>';   
?>
