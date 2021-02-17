<?php 
session_start();
include 'connect.php';
  if(isset($_GET['xy']))
  {
	if(isset($_SESSION['UserID1']))
	{
	      $p=$link->rawQueryOne("select * from UserTB where UserID=".$_SESSION['UserID1']." and Password='".$_GET['xy']."'");
		  if($link->count > 0)
		  {
			  echo "<font color='green'>Password Matched</font>";
		  }
		  else
		  {
	          echo "<font color='red'>Password Is Incorrect</font>";
		  }
	}  
  }

?>