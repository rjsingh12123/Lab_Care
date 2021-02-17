<?php  
session_start();
  include "connect.php"; 
 if(isset($_POST["d"]))  
 {  

      $output = '';
      $t=$link->rawQueryOne("select t.*,d.*,v.* from TestTB t,DiseaseCategoryTB d,vendortb v where t.Is_Active=1 and t.DiseaseID=d.DiseaseID and v.VendorID=t.VendorID and v.VendorID=d.VendorID and TestID=".$_POST['d']);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
     
           $output .= '  
                <tr>  
                     <td width="30%"><label style="color:#0199ed;">Disease Name</label></td>  
                     <td width="70%">'.$t['Disease_Name'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label style="color:#0199ed;">Test Name</label></td>  
                     <td width="70%">'.$t['Test_Name'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label style="color:#0199ed;">Price</label></td>  
                     <td width="70%">'.$t['Price'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label style="color:#0199ed;">Description</label></td>  
                     <td width="70%">'.$t['Description'].'</td>  
                </tr>  
                ';  
       
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>