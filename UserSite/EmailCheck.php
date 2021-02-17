<?php
session_start();
include 'connect.php';
  if(isset($_GET['email']))
  {
	      $p=$link->rawQueryOne("select * from UserTB where Email='".$_GET['email']."'");
		  if($link->count > 0)
		  {
	          echo "<font color='red'>Email Is Already Registerd</font>";  
		  }
		  else
		  { 
             echo ""; 
		  }  
  }
?>