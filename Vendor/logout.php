<?php
session_start();
unset($_SESSION['semail']);
header("location:Vendorlogin.php"); 
?>