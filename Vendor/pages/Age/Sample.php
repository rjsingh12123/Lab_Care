<?php
session_start();
include '../../connect.php';
$a=$link->rawQueryOne('SELECT t.Test_Name,d.Disease_Name,a.* FROM TestTB t,DiseaseCategoryTB d,agediseasetb a where d.DiseaseID=t.DiseaseID  and t.TestID=a.TestID and a.Is_Active=1 ');
   header("Content-type: application/vnd.ms-word");  
   header("Content-Disposition: attachment;Filename=sample.doc");  
   header("Pragma: no-cache");  
   header("Expires: 0");
   echo '<center>';   
   echo '<h1>REPORT</h1>';   
   echo '<table>';   
   
  
    
   echo '<tr>';
   echo '<td align="center"><b>Disease Name:'.$_GET["Disease"].'<b></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td align="center"><b>Test Name:'.$_GET["test"].'<b></td>';
   echo '</tr>';
   echo '</table>';
   echo '<br>';
   echo '<br>';
  
   echo  '<table>';   
   echo  '<tr><th width="25%">Parameter</th><th width="25%">BioLogicalRefrenceRange</th><th width="25%">Method</th><th width="25%">Results</th></tr>'; 
   echo  '<tr><td width="25%">HAEMOGLOBIN</td><td width="25%">13.5-18 gm%</td><td width="25%">Cyanide free SLS</td><td width="25%"> </td></tr>'; 
   echo  '<tr><td width="25%">RBC COUNT</td><td width="25%">4.5-5.5 mil/cmm</td><td width="25%">Hydrodynamic   Electrical  Impedence</td><td width="25%"> </td></tr>'; 
   echo  '<tr><td width="25%">PCV</td><td width="25%">40-50%</td><td width="25%">Hydrodynamic   Electrical  Impedence</td><td width="25%"> </td></tr>'; 
   echo  '</table>';      
      
 
   echo '</center>';
?>
