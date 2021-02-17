<?php 
	session_start();
  	include "connect.php";

	$Lab_Logo=$_FILES['logo_file']['name'];


	if(isset($_FILES['logo_file']['name']))
	{
		$vendorlogo=$_FILES['logo_file']['name'];

		 $link->where('VendorID',$_SESSION['vid']);
	     $vendor=$link->update('vendortb',Array('Lab_Logo'=>$Lab_Logo));
		 move_uploaded_file($_FILES['logo_file']['tmp_name'], "./images/".$_FILES['logo_file']['name']);

	}
		 header("location:profile.php");
?>