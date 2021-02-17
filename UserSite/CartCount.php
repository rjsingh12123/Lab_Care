<?php
session_start();
  include "connect.php";   
  if(isset($_SESSION['UserID1']))
  //if(isset($_SESSION['UserID2']))
  {
	$jkl=0;
	$jkl1=0;
	//$jk=$link->rawQuery("select * from CartTB where Is_Active=1 and UserID=".$_SESSION['UserID2']); 
	$jk=$link->rawQuery("select * from CartTB where Is_Active=1 and UserID=".$_SESSION['UserID1']); 
	$jk2=$link->rawQuery("select * from cartpackagetb where Is_Active=1 and UserID=".$_SESSION['UserID1']); 
	foreach($jk as $po)
	{
		$jkl++;
	}
	foreach($jk2 as $po1)
	{
		$jkl1++;
	}
	echo $jkl+$jkl1;
  }
?>