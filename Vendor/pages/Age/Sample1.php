<?php
session_start();
include '../../connect.php';
$a=$link->rawQueryOne('SELECT t.Test_Name,d.Disease_Name,a.* FROM TestTB t,DiseaseCategoryTB d,agediseasetb a where d.DiseaseID=t.DiseaseID  and t.TestID=a.TestID and a.Is_Active=1 ');
   header("Content-type: application/vnd.ms-word");  
   header("Content-Disposition: attachment;Filename=sample.doc");  
   header("Pragma: no-cache");  
   header("Expires: 0");  
   echo '<h1></h1>';   
   echo '<table width="100%" style="">';   
  
   echo '<tr>';
   echo '<td align="center">Age_To: '.$_GET["AgeTo"].'</td>';
   echo '</tr>';
    
   echo '<tr>';
   echo '<td align="center">Disease_Name:'.$_GET["Disease"].'</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td align="center">Test_Name:'.$_GET["test"].'</td>';
   echo '</tr>';
  
   echo  '<tr>';
   echo  '<td align="center"> ABC Complete Blood</td>';
   echo  '</tr><tr>';
   echo  '<table width="100%">';   
   echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>';  
echo  '<tr><td align="center"> </td><td align="center">Parameter</td><td align="center">BioLogicalRefrenceRange</td><td align="center">Method</td><td align="center">Results</td></tr>'; 
      echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
	  echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
	  echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
echo  '<tr><td align="center"> </td><td align="center">HAEMOGLOBIN</td><td align="center">13.5-18 gm%</td><td align="center">Cyanide free SLS</td><td align="center"></td></tr>'; 
      echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
	  echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
	  echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
echo  '<tr><td align="center"> </td><td align="center">RBC COUNT</td><td align="center">4.5-5.5 mil/cmm</td><td align="center">Hydrodynamic   Electrical  Impedence</td><td align="center"></td></tr>'; 
      echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
	  echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
	  echo  '<tr><td align="center"> </td><td align="center"></td><td align="center"></td><td align="center"></td><td align="center"></td></tr>'; 
echo  '<tr><td align="center"> </td><td align="center">PCV</td><td align="center">40-50%</td><td align="center">Hydrodynamic   Electrical  Impedence</td><td align="center"></td></tr>'; 
   echo  '</table>';      
   echo '</tr></tr>';   
   echo '</table>';   
?>
