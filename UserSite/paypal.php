<?php
include 'connect.php';
session_start();

	$link->where("UserID",$_SESSION['UserID1']);
	$x=$link->update("UserReportTB",Array('IsPaid'=>"Paid"));
	

	$link->where("UserID",$_SESSION['UserID1']);
	$y=$link->update("userreportpackagetb",Array("IsPaid"=>'Paid'));

	$link->insert("PaymentTB",Array('UserID'=>$_SESSION['UserID1'],'Total_Price'=>$_SESSION['payment']));
	
header("location:index.php");
?>
