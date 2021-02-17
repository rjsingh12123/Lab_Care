<?php
   session_start();
   include 'connect.php'; 
   
   if(isset($_GET['dss']))
   { 
    if(isset($_POST['submit']))
	{	
       $link->insert("FeedBackTB",Array("VendorID"=>$_GET['dss'],"UserID"=>$_SESSION['UserID1'],"Review"=>$_POST['review'],"Rate"=>$_POST['estrellas']));
	   header("location:findlab.php"); 
    }
   }
?>